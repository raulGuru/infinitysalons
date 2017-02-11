<?php
class Customers_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function insert($customer) {
        
        $ql = $this->db->select('id')
                        ->from('clients')
                        ->where('firstname', $customer['firstname'])
                        ->where('lastname', $customer['lastname'])
                        ->get();
        if( $ql->num_rows() > 0 ) {
            return 'Name is not unique';
        } else {
            if ($this->db->insert("clients", $customer)) {
                return 'true'; 
             }
        }        
    }
    
    public function update($customer_id, $customer) {
        
        $ql = $this->db->select('id')
                    ->from('clients')
                    ->where('firstname', $customer['firstname'])
                    ->where('lastname', $customer['lastname'])
                    ->get();
        if( $ql->num_rows() > 1 ) {
            return 'Name is not unique';
        } else {
            $this->db->update('clients', $customer, array('id' => $customer_id));
            return 'true'; 
        }
    }
}

