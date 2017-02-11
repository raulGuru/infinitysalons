<?php
class Discounts extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('discount_model');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function index() {
        $query = $this->db->get_where("discounts", array('user_id' => $this->user_id));
        $data['discounts'] = $query->result_array();
        $this->load->layout('discounts/index', $data);
    }
    
    public function newDiscount() {        
        $this->load->view('discounts/add_discount');
    }
    
    public function addDiscount() {
        
        $discount = $_POST['discount'];
        $discount_id = $_POST['discount_id'];
        $values = array(
            'name' => trim($discount['name']),
            'value' => trim($discount['value']),
            'discount_type' => $discount['discount_type'],
            'enabled_for_services' => $discount['enabled_for_services'],
            'enabled_for_products' => $discount['enabled_for_products'],
            'enabled_for_vouchers' => (empty($discount['enabled_for_vouchers']) ? 0 : $discount['enabled_for_vouchers'])
        );
        if(!empty($discount_id)) {
            $q = $this->discount_model->update($discount_id, $values);
        }else {
            $q = $this->discount_model->insert($values);
        }        
        if($q == 'true'){
                $res['success'] = true;
        }else{
            $res['error'] = $q;
        }
        echo json_encode($res);
    }
    
    public function edit() {
        $query = $this->db->get_where('discounts', array('id' => $_GET['id']));
        $data['discount'] = $query->row_array();
        $data['mode'] = 'edit';
        $this->load->view('discounts/add_discount', $data);
    }
    
    public function delete() {
        $this->db->delete('discounts', array('id' => $this->input->post('id')));
        echo 'true';
    }
}
