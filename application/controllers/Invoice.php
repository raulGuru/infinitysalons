<?php
class Invoice extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }
    
    function printinvoice() {
        
        $checkoutid = $_GET['id'];
        $querycheckout = $this->db->get_where('checkout', array('id' => $checkoutid));
        $checkout= $querycheckout->row_array();
        $checkout['invoicenumber'] = strtotime($checkout['timestamp']) .'-I'.$checkoutid.'-A'.$checkout['appointmentid'].'-C'.$checkout['clientid'];
        $data['checkout'] = $checkout;

//        if($checkout['appointmentid'] != 0) {
//            $appointmentid = $checkout['appointmentid'];            
//            $queryaap = $this->db->query("SELECT a.id AS appointment_id, a.clientid AS clientid, a.date AS appointment_date, a.notes AS booking_notes, s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, t.status, t.cancelid, c.firstname AS fname_c, c.lastname AS lname_c, c.mobile, c.notes, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
//                                FROM appointment a
//                                INNER JOIN appointmentservices s ON a.id = s.appointmentid
//                                INNER JOIN appointmentstatus t ON a.id = t.appointmentid
//                                LEFT JOIN clients c ON a.clientid = c.id
//                                INNER JOIN services v ON s.serviceid = v.id
//                                INNER JOIN staff f ON s.staffid = f.id AND a.id='$appointmentid'");
//            $appointmentdetails = $queryaap->row_array();            
//        }
//        
//        if($checkout['clientid'] != 0) {            
//            $queryclients = $this->db->get_where('clients', array('id' => $checkout['clientid']));
//            $clients= $queryclients->row_array();
//            $appointmentdetails['fname_c'] = $clients['firstname'];
//            $appointmentdetails['lname_c'] = $clients['lastname'];
//            $appointmentdetails['mobile'] = $clients['mobile'];
//        }
//        
//        $data['appointmentdetails'] = $appointmentdetails;
        
        $queryclients = $this->db->get_where('clients', array('id' => $checkout['clientid']));
        $clients = $queryclients->row_array();
        $data['client'] = $clients;
        
        $querycheckoutinvoice = $this->db->get_where('checkoutinvoice', array('checkoutid' => $checkoutid));
        $checkoutcheckoutinvoice = $querycheckoutinvoice->row_array();
        $data['checkoutinvoice'] = $checkoutcheckoutinvoice;
        
        if($checkoutcheckoutinvoice['tax']) {
            $querybusinesstax = $this->db->get_where('businesstax');
            $checkoutbusinesstax = $querybusinesstax->result_array();
            $data['taxes'] = $checkoutbusinesstax;
        }
        
//        $queryservices = $this->db->query("SELECT a.quantity AS quantity, a.price AS price, b.special_price AS specialprice,
//                                    b.name AS servicename,
//                                    c.first_name AS stafffname, c.last_name AS stafflname,
//                                    d.name AS discountname, d.value AS discountvalue, d.discount_type AS discounttype
//                                    FROM checkoutservices a
//                                    INNER JOIN services b ON a.serviceid = b.id
//                                    INNER JOIN staff c ON a.staffid = c.id
//                                    LEFT JOIN discounts d ON a.discountid = d.id AND a.checkoutid='$checkoutid'");
//        $servicedetails = $queryservices->result_array(); 
//        $data['services'] = $servicedetails;
        
        $queryservices = $this->db->query("SELECT a.quantity AS quantity, a.price AS price, a.discountid, b.special_price AS specialprice,
                                    b.name AS servicename,
                                    c.first_name AS stafffname, c.last_name AS stafflname
                                    FROM checkoutservices a
                                    INNER JOIN services b ON a.serviceid = b.id
                                    INNER JOIN staff c ON a.staffid = c.id
                                    AND a.checkoutid='$checkoutid'");
        $servicedetails = $queryservices->result_array();
        if(!empty($servicedetails)) {
            foreach($servicedetails as $k => $servicedetail) {
                $querydiscounts = $this->db->get_where('discounts', array('id' => $servicedetail['discountid']));
                $discount = $querydiscounts->row_array();
                $servicedetails[$k]['discountname'] = $discount['name'];
                $value = ($discount['discount_type'] == 'percentage') ? ($discount['value'].'% off') : ('₹'.$discount['value'].' off');
                $servicedetails[$k]['discountvalue'] = $value;
            }
        }
        $data['services'] = $servicedetails;
        
        $querycheckoutproducts = $this->db->get_where('checkoutproducts', array('checkoutid' => $checkoutid));
        $checkoutcheckoutproducts = $querycheckoutproducts->result_array();
        if(!empty($checkoutcheckoutproducts)) {
            foreach($checkoutcheckoutproducts as $key => $val) {
                $queryproducts = $this->db->get_where('products', array('id' => $val['productid']));
                $product = $queryproducts->row_array();
                $checkoutcheckoutproducts[$key]['productname'] = $product['product_name'];
                $checkoutcheckoutproducts[$key]['specialprice'] = $product['special_price'];
                
                $querystaff = $this->db->get_where('staff', array('id' => $val['staffid']));
                $staff = $querystaff->row_array();
                $checkoutcheckoutproducts[$key]['stafffname'] = $staff['first_name'];
                $checkoutcheckoutproducts[$key]['stafflname'] = $staff['last_name'];
                
                $querydiscounts = $this->db->get_where('discounts', array('id' => $val['discountid']));
                $discount = $querydiscounts->row_array();
                $checkoutcheckoutproducts[$key]['discountname'] = $discount['name'];
                $value = ($discount['discount_type'] == 'percentage') ? ($discount['value'].'% off') : ('₹'.$discount['value'].' off');
                $checkoutcheckoutproducts[$key]['discountvalue'] = $value;
            }            
        }
        $data['products'] = $checkoutcheckoutproducts;
        
        $querycheckoutstafftip = $this->db->query("SELECT a.first_name AS fname, a.last_name AS lname, b.price FROM staff a JOIN checkoutstafftip b ON a.id = b.staffid AND b.checkoutid='$checkoutid'");
        $tipdetails = $querycheckoutstafftip->row_array(); 
        $data['tipdetails'] = $tipdetails;
        
//        echo '<pre>', print_r($data), '</pre>';
//        exit();
        
        $this->load->view('invoice/print_invoice',$data);
    }
}