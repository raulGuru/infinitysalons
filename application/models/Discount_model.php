<?php
class Discount_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function insert($discount) {
        $discount['user_id'] = $this->user_id;
        $ql = $this->db->select('id')->from('discounts')->where('name', $discount['name'])->get();
        if( $ql->num_rows() > 0 ) {
            return 'Name is not unique';
        } else {
            if ($this->db->insert("discounts", $discount)) { 
                return 'true'; 
             }
        }
    }
    
    public function update($discount_id, $discount) {
        $discount['user_id'] = $this->user_id;
        $ql = $this->db->get_where("discounts", array('user_id' => $this->user_id, 'name' => $discount['name']));
        if( $ql->num_rows() > 1 ) {
            return 'Name is not unique';
        } else {
            $this->db->update('discounts', $discount, array('id' => $discount_id));
            return 'true'; 
        }
    }
      
}