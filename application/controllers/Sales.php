<?php
class Sales extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('sales_model');
        $this->user_id = $this->session->userdata['salon_user']['id'];
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
    
    function newServiceSale() {
        
        $data['services'] = $this->db->order_by("name","asc")->get("services")->result_array();
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $this->load->view('sales/new_service_sale', $data);
    }
    
    function addSale() {

        $sale = $_POST['sale'];
        
        if(!empty($sale['items_attributes'])) {
            $items = $sale['items_attributes'];
            foreach($items as $item) {
                if(empty($item['staff-id'])) {
                    return ;
                }
            }
        }
        
        $this->load->library('session');
        //$this->session->unset_userdata();
        $ses['sale'] = $sale;
        $this->session->set_userdata($ses);
        
        $data['sale'] = $sale;
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        $querytax = $this->db->get("businesstax");
        $data['taxes'] = $querytax->result_array();
        
        $this->load->view('sales/apply_payment', $data);
    }
    
    function appointmentSale() {

        $appointment_id = $_POST['appid'];
        if(empty($appointment_id))
            return;
        
        $appointmentdetails = Common::getAppointmentDetails($appointment_id);
        $appointment = $appointmentdetails[0];
        $data['appointment'] = $appointment;
        $data['services'] = $appointment['services'];
        
        $query = $this->db->get_where('products', array('quantity !=' => '0'));
        $data['products'] = $query->result_array();
        
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        
        $querysdiscounts = $this->db->get_where('discounts', array('enabled_for_services' => '1'));
        $data['servicediscounts'] = $querysdiscounts->result_array();
        
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();

        $this->load->view('sales/new_sale', $data);
    }
    
    public function appointmentServiceSale() {
        
        $appointment_id = $_POST['appid'];
        if(empty($appointment_id))
            return;
        
        $appointmentdetails = Common::getAppointmentDetails($appointment_id);
        $appointment = $appointmentdetails[0];
        $data['appointment'] = $appointment;
        //$data['appservices'] = $appointment['services'];
        
        $data['services'] = $this->db->order_by("name","asc")->get("services")->result_array();
        
        $querydiscounts = $this->db->get_where('discounts', array('enabled_for_products' => '1'));
        $data['discounts'] = $querydiscounts->result_array();
        
        $querysdiscounts = $this->db->get_where('discounts', array('enabled_for_services' => '1'));
        $data['servicediscounts'] = $querysdiscounts->result_array();
        
        $querystaff = $this->db->get_where('staff', array('active' => '1'));
        $data['staffs'] = $querystaff->result_array();
        
        $this->load->view('sales/new_service_sale', $data);
        
    }
    
    function addPayment() {
        
        $sale = $this->session->userdata('sale');        
        $payment = $_POST;
        
        $invoicedate = date('Y-m-d H:i:s', strtotime($sale['invoice_date']));
        
        $appointmentid = $sale['appointmentid'];
        $checkoutins = array(
            'appointmentid' => $appointmentid,
            'clientid' => (!empty($sale['customer_id'])) ? $sale['customer_id'] : 0,
            'userid' => $this->user_id,
            'invoicedate' => $invoicedate
        );
        $this->db->insert("checkout", $checkoutins);
        $checkoutid = $this->db->insert_id();
        
        $this->db->update('appointmentstatus', array('status' => 'paid', 'userid' => $this->user_id), array('appointmentid' => $appointmentid));
        
        $checkoutinvoice = array(
            'checkoutid' => $checkoutid,
            'invoicedate' => $invoicedate,
            'totalprice' => Common::parseMoney($payment['grand-total']),
            'sale' => Common::parseMoney($payment['sale-total']),
            'businesspaytype' => $payment['payment-method-name'],
            'notes' => NULL,
            'tax' => ($payment['include_tax']) ? '1' : '0',
            'status' => '1'
        );
        $this->db->insert("checkoutinvoice", $checkoutinvoice);
        $checkoutinvoiceid = $this->db->insert_id();
        
        if(!empty($sale['items_attributes'])) {
            /*
            $products = $sale['items_attributes'];
            foreach($products as $product) {
                $qnt = (!empty($product['quantity'])) ? $product['quantity'] : 0;
                $productid = $product['item_id'];
                $insp = array(
                    'checkoutid' => $checkoutid,
                    'productid' => $productid,
                    'staffid' => $product['staff-id'],
                    'quatity' => $qnt,
                    'price' => Common::parseMoney($product['special_price']),
                    'fullprice' => Common::parseMoney($product['full_price']),
                    'discountid' => (!empty($product['discount_id'])) ? $product['discount_id'] : NULL
                );
                $this->db->insert("checkoutproducts", $insp);
                
                $this->db->query("UPDATE `products` SET quantity = quantity-$qnt WHERE id=$productid");
            }
             * now sale items are services, so adding them after app services
             */
            
        }
        
        if(!empty($sale['service'])) {
            $services = $sale['service'];
            foreach($services as $service) {
                $checkoutservices = array(
                    'checkoutid' => $checkoutid,
                    'serviceid' => $service['item-id'],
                    'staffid' => $service['staff-id'],
                    'quantity' => $service['quantity'],
                    'price' => Common::parseMoney($service['special_price']),
                    'fullprice' => Common::parseMoney($service['full_price']),
                    'discountid' => (!empty($service['discount_id'])) ? $service['discount_id'] : NULL
                );
                $this->db->insert("checkoutservices", $checkoutservices);
            }            
        }
        
        if(!empty($sale['items_attributes'])) {
            $services = $sale['items_attributes'];
            foreach($services as $service) {
                $checkoutservices = array(
                    'checkoutid' => $checkoutid,
                    'serviceid' => $service['item_id'],
                    'staffid' => $service['staff-id'],
                    'quantity' => $service['quantity'],
                    'price' => Common::parseMoney($service['special_price']),
                    'fullprice' => Common::parseMoney($service['full_price']),
                    'discountid' => (!empty($service['discount_id'])) ? $service['discount_id'] : NULL
                );
                $this->db->insert("checkoutservices", $checkoutservices);
            }            
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
        
        $res['success'] = true;
        $res['checkoutid'] = $checkoutid;
        echo json_encode($res);
        
//        $data['checkoutid'] = $checkoutid;
//        $this->load->view('sales/sale_completed',$data);
    }
    
    function saleCompleted() {
        
    }
    
    
}

