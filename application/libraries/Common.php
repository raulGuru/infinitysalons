<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common {
    
    /*
     * appointment_id - get by appointment id other than canc and paid
     * where - false, to get irrespective of status
     */
    
    function getAppointmentDetails($appointment_id, $where = TRUE){
        $CI = & get_instance();
        
        if($where) {
            $where = "WHERE t.status != 'canc' AND t.status != 'paid' ";
        }
        
        if(!empty($appointment_id)) {
            $where = ' AND a.id='.$appointment_id.'';
        }

        $query = $CI->db->query("SELECT a.id AS appointment_id, a.clientid AS clientid, a.date AS appointment_date, a.notes AS booking_notes, t.status, t.cancelid, c.firstname AS fname_c, c.lastname AS lname_c, c.mobile, c.notes 
                        FROM appointment a
                        INNER JOIN appointmentstatus t ON a.id = t.appointmentid
                        INNER JOIN clients c ON a.clientid = c.id $where");
        $appointment_array = $query->result_array();

        $appointments = array();
        foreach($appointment_array as $key => $appointment) {

            $appointments[$key] = $appointment;

            $services = array();
            $squery = $CI->db->query("SELECT s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
                        FROM appointmentservices s 
                        INNER JOIN services v ON s.serviceid = v.id 
                        INNER JOIN staff f ON s.staffid = f.id
                        WHERE s.appointmentid = '".$appointment['appointment_id']."' ");
            $ser_array = $squery->result_array();
            foreach($ser_array as $k => $ser) {
                $services[$k] = $ser;

                $start_t = $ser['appointment_time'];  
                $end_t = date("Y-m-d H:i:s", (strtotime($start_t)+(60*$ser['duration'])));
                $services[$k]['start_time'] = $start_t; 
                $services[$k]['end_time'] = $end_t;
                $services[$k]['app_t_format'] = date('h:ia', strtotime($start_t)) ." - ".date('h:ia', strtotime($end_t));
            }
            $appointments[$key]['services'] = $services;
            $appointments[$key]['reference_id'] = 'REFAPP'.$appointment['appointment_id'].'CL'.$appointment['clientid'];
        }
        return $appointments;
    }
    
    public function appointmentsByStaff($staffid) {
        
        $CI = & get_instance();
        
        $query = $CI->db->query("SELECT a.appointmentid AS appointment_id, a.serviceid AS service_id,
                                b.clientid, b.date AS appointment_date,
                                c.status,
                                d.firstname AS fname_c, d.lastname AS lname_c, d.mobile
                                FROM appointmentservices a
                                INNER JOIN appointment b ON b.id = a.appointmentid
                                INNER JOIN appointmentstatus c ON c.appointmentid = a.appointmentid
                                INNER JOIN clients d ON d.id =b.clientid 
                                WHERE c.status != 'canc' AND c.status != 'paid' AND a.staffid=$staffid");
        $appointment_array = $query->result_array();

        $appointments = array();
        foreach($appointment_array as $key => $appointment) {

            $appointments[$key] = $appointment;
            
            $services = array();
            $squery = $CI->db->query("SELECT s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
                        FROM appointmentservices s 
                        INNER JOIN services v ON s.serviceid = v.id 
                        INNER JOIN staff f ON s.staffid = f.id
                        WHERE s.appointmentid = '".$appointment['appointment_id']."' AND s.serviceid = '".$appointment['service_id']."'");
            $ser_array = $squery->result_array();
            foreach($ser_array as $k => $ser) {
                $services[$k] = $ser;

                $start_t = $ser['appointment_time'];  
                $end_t = date("Y-m-d H:i:s", (strtotime($start_t)+(60*$ser['duration'])));
                $services[$k]['start_time'] = $start_t; 
                $services[$k]['end_time'] = $end_t;
                $services[$k]['app_t_format'] = date('h:ia', strtotime($start_t)) ." - ".date('h:ia', strtotime($end_t));
            }
            $appointments[$key]['services'] = $services;
            $appointments[$key]['reference_id'] = 'REFAPP'.$appointment['appointment_id'].'CL'.$appointment['clientid'];
        }
        return $appointments;
        
    }
    
    public function formatMoney() {
        return new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
    }
    
    public function parseMoney($m) {
        return floatval(preg_replace('/[^\d\.]/', '', $m));
    }
    
    public function checkUserHasAccess($module) {
        return true;
        $CI = & get_instance();
        $useraccess = $CI->session->userdata['salon_user']['useraccess'];
        if($useraccess[$module]) {
            return true;
        }else {
            redirect('errors/denied');
        }
    }
    
    public function pwdDecrypt($password) {
        $password = explode("_", (base64_decode($password)));
        
        if (count($password) > 2) {
            $returnPassword = implode("_", array_slice($password, 1, (count($password) - 1)));
        } else {
            $returnPassword = $password[1];
        }
        
        return $returnPassword;
    }
}



