<?php
class Sales extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('sales_model');
        $this->user_id = $this->config->item('user_id');
    }
    
    function newSale() {
        
        $query = $this->db->get_where('products', array('quantity !=' => '0'));
        $data['products'] = $query->result_array();
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $this->load->view('sales/new_sale', $data);
    }
    
    function addSale() {

        $sale = $_POST['sale'];
        
        $this->load->library('session');
        //$this->session->unset_userdata();
        $ses['sale'] = $sale;
        $this->session->set_userdata($ses);
        
        $data['sale'] = $sale;
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $data['invoice_num'] = date('Y-m-d') .'-'.time();
        $querytax = $this->db->get("businesstax");
        $data['taxes'] = $querytax->result_array();
        
        $this->load->view('sales/apply_payment', $data);        
    }
    
    function appointmentSale() {

        $appointment_id = $_POST['appid'];        
        $queryaap = $this->db->query("SELECT a.id AS appointment_id, a.clientid AS clientid, a.date AS appointment_date, a.notes AS booking_notes, s.serviceid AS service_id, s.staffid AS staff_id, s.time AS appointment_time, s.duration, t.status, t.cancelid, c.firstname AS fname_c, c.lastname AS lname_c, c.mobile, c.notes, v.name AS service, v.price, v.special_price, f.first_name AS fname_s, f.last_name AS lname_s
                                FROM appointment a
                                INNER JOIN appointmentservices s ON a.id = s.appointmentid
                                INNER JOIN appointmentstatus t ON a.id = t.appointmentid
                                LEFT JOIN clients c ON a.clientid = c.id
                                INNER JOIN services v ON s.serviceid = v.id
                                INNER JOIN staff f ON s.staffid = f.id AND a.id='$appointment_id'");
        $data['appointmentdetails'] = $queryaap->row_array();
        
        $query = $this->db->get_where('products', array('quantity !=' => '0'));
        $data['products'] = $query->result_array();
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $this->load->view('sales/new_sale', $data);        
    }
    
    function addPayment() {
        
        $sale = $this->session->userdata('sale');
        
        $payment = $_POST;
        $ses['payment'] = $payment;
        $this->session->set_userdata($ses);
        
        $invoicedate = date('Y-m-d H:i:s', strtotime($sale['invoice_date']));
        
        $appointmentid = $sale['appointmentid'];
        $checkoutins = array(
            'appointmentid' => $appointmentid,
            'clientid' => $sale['customer_id'],
            'invoicedate' => $invoicedate
        );
        $this->db->insert("checkout", $checkoutins);
        $checkoutid = $this->db->insert_id();
        
        $this->db->update('appointmentstatus', array('status' => 'paid'), array('appointmentid' => $appointmentid));
        
        $checkoutinvoice = array(
            'checkoutid' => $checkoutid,
            'invoicedate' => $invoicedate,
            'totalprice' => $payment['grand-total'],
            'businesspaytypeid' => $payment['payment-method-id'],
            'notes' => NULL,
            'tax' => ($payment['include_tax']) ? '1' : '0',
            'status' => '1'
        );
        $this->db->insert("checkoutinvoice", $checkoutinvoice);
        $checkoutinvoiceid = $this->db->insert_id();
        
        if(!empty($sale['items_attributes'])) {
            $products = $sale['items_attributes'];
            foreach($products as $product) {
                $qnt = (!empty($product['quantity'])) ? $product['quantity'] : 0;
                $productid = $product['item_id'];
                $insp = array(
                    'checkoutid' => $checkoutid,
                    'productid' => $productid,
                    'staffid' => $product['staff-id'],
                    'quatity' => $qnt,
                    'price' => $product['special_price'],
                    'fullprice' => $product['full_price'],
                    'discountid' => $product['discount_id']
                );
                $this->db->insert("checkoutproducts", $insp);
                
                $this->db->query("UPDATE `products` SET quantity = quantity-$qnt WHERE id=$productid");
            }
        }
        
        if(!empty($sale['service'])) {
            $service = $sale['service'];
            $checkoutservices = array(
                'checkoutid' => $checkoutid,
                'serviceid' => $service['item-id'],
                'staffid' => $service['staff-id'],
                'quantity' => $service['quantity'],
                'price' => $service['special_price'],
                'fullprice' => $service['full_price'],
                'discountid' => $service['discount_id']
            );
            $this->db->insert("checkoutservices", $checkoutservices);
        }
        
        if(!empty($payment['tip-amount'])) {
            $checkoutstafftip = array(
                'checkoutid' => $checkoutid,
                'staffid' => $payment['tip-staff-id'],
                'price' => $payment['tip-amount']
            );
            $this->db->insert("checkoutstafftip", $checkoutstafftip);
        }
        
//        if($q == 'true'){
//            $res['success'] = true;
//        }else{
//            $res['error'] = $q;
//        }
        
        //$res['success'] = true;
        $res['checkoutid'] = $checkoutid;
        echo json_encode($res);
        
        
    }
    
    
}

