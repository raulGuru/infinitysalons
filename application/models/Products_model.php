<?php
class Products_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }
    
    public function get($search, $sort, $direction) {
        
        /*if(!empty($search)) {
            $like = "AND `product_name` LIKE '%$search%'";
        }
        if($sort == 'updated_at') {
            $sort = 'timestamp';
        }
        if(!empty($sort)) {
            $order_by = "ORDER BY `$sort` $direction";
        }
        $query = $this->db->query( "SELECT * FROM `products` WHERE `user_id` = $this->user_id $like $order_by" );*/
        if(!empty($search))
            $like = "AND `product_name` LIKE '%$search%' OR `sku` LIKE '%$search%'";
        $query = $this->db->query( "SELECT * FROM `products` WHERE `user_id` = $this->user_id $like" );
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