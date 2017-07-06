<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common {
    
    /*
     * appointment_id - get by appointment id other than canc and paid
     * where - false, to get irrespective of status
     */
    
    public static function getAppointmentDetails($appointment_id, $where = TRUE){
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
    
    public static function appointmentsByStaff($staffid) {
        
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
    
    public static function formatMoney() {
        return new NumberFormatter($locale = 'en_IN', NumberFormatter::CURRENCY);
    }
    
    public static function parseMoney($m) {
        //return floatval(preg_replace('/[^\d\.]/', '', $m));           commenting this as it is removing 0 from decimal second place
        return (preg_replace('/[^0-9.]/s', '', $m)); 
    }
    
    public static function formatMoneyToPrint($m) {
        return number_format((float)$m, 2, '.', '');
        //$fmt = Common::formatMoney();
        //return preg_replace('/[^0-9.]/s', '', $fmt->format($m));
    }
    
    public static function checkUserHasAccess($module) {
        return true;
        $CI = & get_instance();
        $useraccess = $CI->session->userdata['salon_user']['useraccess'];
        if($useraccess[$module]) {
            return true;
        }else {
            redirect('errors/denied');
        }
    }
    
    public static function pwdDecrypt($password) {
        $password = explode("_", (base64_decode($password)));
        
        if (count($password) > 2) {
            $returnPassword = implode("_", array_slice($password, 1, (count($password) - 1)));
        } else {
            $returnPassword = $password[1];
        }
        
        return $returnPassword;
    }
    
    public static function getInvoiceDetailsById($checkoutid) {
        $CI = & get_instance();

        $querycheckout = $CI->db->get_where('checkout', array('id' => $checkoutid));
        $checkout= $querycheckout->row_array();
        //$checkout['invoicenumber'] = strtotime($checkout['timestamp']) .'-I'.$checkoutid.'-A'.$checkout['appointmentid'].'-C'.$checkout['clientid'];
        $checkout['invoicenumber'] = $checkout['invoicenumber'];   //number_format($checkoutid,0,"","-");
        $data['checkout'] = $checkout;
        
        $queryclients = $CI->db->get_where('clients', array('id' => $checkout['clientid']));
        $clients = $queryclients->row_array();
        $data['client'] = $clients;
        
        $querycheckoutinvoice = $CI->db->get_where('checkoutinvoice', array('checkoutid' => $checkoutid));
        $checkoutcheckoutinvoice = $querycheckoutinvoice->row_array();
        $data['checkoutinvoice'] = $checkoutcheckoutinvoice;
        
        $querypayments = $CI->db->query("SELECT a.*, b.type
                                            FROM checkoutpayments a
                                            INNER JOIN businesspayments b ON a.paymenttypeid = b.id
                                            AND a.checkoutid='$checkoutid'");
        $payments = $querypayments->result_array();
        $data['checkoutpayments'] = $payments;        
        
        if($checkoutcheckoutinvoice['tax']) {
            $invoicedate =  $checkoutcheckoutinvoice['invoicedate'];
            $where = array(
                "validfrom <=" => $invoicedate,
                "validtill >=" => $invoicedate,
            );
            $querybusinesstax = $CI->db->get_where('businesstax', $where);
            $checkoutbusinesstax = $querybusinesstax->result_array();
            $data['taxes'] = $checkoutbusinesstax;
        }
        
//        $queryservices = $CI->db->query("SELECT a.quantity AS quantity, a.price AS price, b.special_price AS specialprice,
//                                    b.name AS servicename,
//                                    c.first_name AS stafffname, c.last_name AS stafflname,
//                                    d.name AS discountname, d.value AS discountvalue, d.discount_type AS discounttype
//                                    FROM checkoutservices a
//                                    INNER JOIN services b ON a.serviceid = b.id
//                                    INNER JOIN staff c ON a.staffid = c.id
//                                    LEFT JOIN discounts d ON a.discountid = d.id AND a.checkoutid='$checkoutid'");
//        $servicedetails = $queryservices->result_array(); 
//        $data['services'] = $servicedetails;
        
        $queryservices = $CI->db->query("SELECT a.quantity AS quantity, a.price AS price, a.discountid, b.special_price AS specialprice,
                                    b.name AS servicename,
                                    c.first_name AS stafffname, c.last_name AS stafflname
                                    FROM checkoutservices a
                                    INNER JOIN services b ON a.serviceid = b.id
                                    INNER JOIN staff c ON a.staffid = c.id
                                    AND a.checkoutid='$checkoutid'");
        $servicedetails = $queryservices->result_array();
        if(!empty($servicedetails)) {
            foreach($servicedetails as $k => $servicedetail) {
                $querydiscounts = $CI->db->get_where('discounts', array('id' => $servicedetail['discountid']));
                $discount = $querydiscounts->row_array();
                $servicedetails[$k]['discountname'] = $discount['name'];
                $value = ($discount['discount_type'] == 'percentage') ? ($discount['value'].'% off') : ('₹'.$discount['value'].' off');
                $servicedetails[$k]['discountvalue'] = $value;
            }
        }
        $data['services'] = $servicedetails;
        
        $querycheckoutproducts = $CI->db->get_where('checkoutproducts', array('checkoutid' => $checkoutid));
        $checkoutcheckoutproducts = $querycheckoutproducts->result_array();
        if(!empty($checkoutcheckoutproducts)) {
            foreach($checkoutcheckoutproducts as $key => $val) {
                $queryproducts = $CI->db->get_where('products', array('id' => $val['productid']));
                $product = $queryproducts->row_array();
                $checkoutcheckoutproducts[$key]['productname'] = $product['product_name'];
                $checkoutcheckoutproducts[$key]['specialprice'] = $product['special_price'];
                
                $querystaff = $CI->db->get_where('staff', array('id' => $val['staffid']));
                $staff = $querystaff->row_array();
                $checkoutcheckoutproducts[$key]['stafffname'] = $staff['first_name'];
                $checkoutcheckoutproducts[$key]['stafflname'] = $staff['last_name'];
                
                $querydiscounts = $CI->db->get_where('discounts', array('id' => $val['discountid']));
                $discount = $querydiscounts->row_array();
                $checkoutcheckoutproducts[$key]['discountname'] = $discount['name'];
                $value = ($discount['discount_type'] == 'percentage') ? ($discount['value'].'% off') : ('₹'.$discount['value'].' off');
                $checkoutcheckoutproducts[$key]['discountvalue'] = $value;
            }            
        }
        $data['products'] = $checkoutcheckoutproducts;
        
        $querycheckoutstafftip = $CI->db->query("SELECT a.first_name AS fname, a.last_name AS lname, b.price FROM staff a JOIN checkoutstafftip b ON a.id = b.staffid AND b.checkoutid='$checkoutid'");
        $tipdetails = $querycheckoutstafftip->row_array(); 
        $data['tipdetails'] = $tipdetails;
        
        return $data;        
    }
}