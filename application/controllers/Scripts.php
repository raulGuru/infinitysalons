<?php
class Scripts extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    function insertCheckoutPayments() {
        
        $querycheckoutinvoice = $this->db->get("checkoutinvoice");
        $checkoutinvoice = $querycheckoutinvoice->result_array();
        foreach($checkoutinvoice as $checkout) {
            $paymenttypeid = ($checkout['businesspaytype'] == 'Cash') ? 1 : 2; 
            $sql = "INSERT INTO `checkoutpayments` (`id`, `checkoutid`, `paymenttypeid`, `amount`) VALUES (NULL, ".$checkout['checkoutid'].", ".$paymenttypeid.", ".$checkout['totalprice'].");";
            echo $sql.'<br>';
        }
        exit();
    }
}

