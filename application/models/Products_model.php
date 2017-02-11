<?php
class Products_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function get() {
        $query = $this->db->query( "SELECT * FROM `products`" );
        return $query->result_array();
    }
    
    public function insert($product) {
        $product['user_id'] = $this->user_id;
        $ql = $this->db->select('id')->from('products')->where('product_name', $product['product_name'])->get();
        if( $ql->num_rows() > 0 ) {
            return 'Name is not unique';
        } else {
            if ($this->db->insert("products", $product)) { 
                return 'true'; 
             }
        }
    }
    
    public function update($product_id, $product) {
        $product['user_id'] = $this->user_id;
        $ql = $this->db->get_where("products", array('user_id' => $this->user_id, 'product_name' => $product['product_name']));
        if( $ql->num_rows() > 1 ) {
            return 'Name is not unique';
        } else {
            $this->db->update('products', $product, array('id' => $product_id));
            return 'true'; 
        }
    }
      
}