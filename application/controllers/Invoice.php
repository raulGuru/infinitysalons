<?php
class Invoice extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        //$this->load->model('sales_model');
        $this->user_id = $this->config->item('user_id');
    }
    
    function printinvoice() {

        $data['sale'] = $this->session->userdata('sale');
        $data['payment'] = $this->session->userdata('payment');
        
        $this->load->view('invoice/view_invoice',$data);
        
        
    }
}