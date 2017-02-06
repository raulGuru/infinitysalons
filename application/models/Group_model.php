<?php
class Group_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function insert($group_name) {
        
        $ql = $this->db->select('id')->from('service_group')->where('group_name', $group_name)->get();
        if( $ql->num_rows() > 0 ) {
            return 'Name is not unique';
        } else {
            $data = array( 'user_id' => $this->user_id, 'group_name' => $group_name);
            if ($this->db->insert("service_group", $data)) { 
                return 'true'; 
             }
        }
      }
      
      public function update($id, $group_name) {
        
        $query = $this->db->get_where('service_group', array('id' => $id, 'user_id' => $this->user_id));
        $group = $query->row();        
        if($group->group_name == $group_name) {
            return 'Name is not unique';
        } else {
            $this->db->update('service_group', array('group_name' => $group_name), array('id' => $id));
            return 'true';
        }        
      }
      
      public function add_service($service) {
        
        $service['user_id'] = $this->user_id;        
        $ql = $this->db->select('id')->from('services')->where('name', $service['name'])->get();
        if( $ql->num_rows() > 0 ) {
            return 'Name is not unique';
        } else {
            if ($this->db->insert("services", $service)) { 
                return 'true'; 
             }
        }    
        
        //$sql = "INSERT INTO `services` (name, group_id, subcategory_id, extra_time_type, extra_time_in_seconds, gender, pricing_type, room_required, tax_rate_id, voucher_enabled, voucher_expiration_period, service_pricing_price, service_pricing_special_price, price)
                //SELECT * FROM (SELECT '".$service['name']."', '".$service['group_id']."', '".$service['subcategory_id']."', '".$service['extra_time_type']."', '".$service['extra_time_in_seconds']."', '".$service['gender']."', '".$service['pricing_type']."', '".$service['room_required']."', '".$service['tax_rate_id']."', '".$service['voucher_enabled']."', '".$service['voucher_expiration_period']."', '".$service['service_pricing_price']."', '".$service['service_pricing_special_price']."', '".$service['price']."') AS tmp
                //WHERE NOT EXISTS (
                    //SELECT name FROM `services` WHERE name = '".$service['name']."'
                //) LIMIT 1;";
                //print_r($sql); exit();
        //$query = $this->db->query($sql);
      }
      
      public function udpate_service($service_id, $values) {        
        $this->db->update('services', $values, array('id' => $service_id));
        return 'true';        
      }
    
   
}
?>