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

    public function addInvoiceNumber()
    {
        echo "script start time is " . date("Y-m-d h:i:s") ."<br>";
        $query = $this->db->get('checkout');
        $checkouts = $query->result_array();
        foreach ($checkouts as $checkout) {

            $id = $checkout['id'];
            $wflag = TRUE;
            while($wflag == TRUE)
            {
                $invoicenumber = random_string('numeric', 9);      //mt_rand(100000000,999999999);
                $query = $this->db->get_where('checkout', array('invoicenumber' => $invoicenumber));
                if($query->num_rows() == 0)
                {
                    $wflag = FALSE;
                }
            }
            $this->db->update('checkout', array('invoicenumber' => $invoicenumber), array('id' => $id));
            echo "id: ".$id." --> invoicenumber: ".$invoicenumber."<br>";
        }
        echo "script end time is " . date("Y-m-d h:i:s");
    }
}

