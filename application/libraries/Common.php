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
    
    public function formatMoney() {
        return new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
    }
    
    public function parseMoney($m) {
        return floatval(preg_replace('/[^\d\.]/', '', $m));
    }
    
}



