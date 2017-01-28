<?php
class Services extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('group_model');
        $this->user_id = $this->config->item('user_id');
    }

	public function index()
	{
            $data = array();
            $query = $this->db->get_where("service_group", array('user_id' => $this->user_id));
            $data['groups'] = $query->result_array();
            foreach ($query->result_array() as $row => $r) {
                    $service_group_id = $r['id'];
                    $squery = $this->db->get_where('services', array('group_id' => $service_group_id));
                    $data['groups'][$row]['services'] = $squery->result_array();
            }

            $this->load->layout('services/index', $data);
	}
    
    public function addGroup() {
        $res = array();
        $group_name = trim($this->input->post('group_name'));
        if(!empty($group_name)) {
            $group_id = $this->input->post('group_id');
            if(!empty($group_id)) {
                $q = $this->group_model->update($group_id, $group_name);                
            }else {
                $q = $this->group_model->insert($group_name);   
            }
            if($q == 'true'){
                $res['success'] = true;
            }else{
                $res['error'] = $q;
            }
        }else {
            $res['error'] = 'Name is required';            
        }
        echo json_encode($res);
    }
    
    public function newGroup() {
        $this->load->view('services/add_group');
    }
    
    function editGroup() {
        $query = $this->db->get_where('service_group', array('id' => $_GET['id']));
        $data['service'] = $query->row();
        $this->load->view('services/add_group', $data);
    }
    
    public function deleteGroup() {
        $this->db->delete('service_group', array('id' => $this->input->post('group_id')));
        echo 'true';
    }
    
    public function newService() {
        $data['group_id'] = $_GET['id'];
        $this->load->view('services/add_service', $data);
    }
    
    public function addService() {
        
        $service = $_POST['service'];
        $service_id = $service['id'];
        $service_pricing = $service['service_pricing_levels_attributes'][0];        
        $values = array(
                'name' => $service['name'],
                'group_id' => $service['group_id'],
                'subcategory_id' => $service['subcategory_id'],
                'extra_time_type' => $service['extra_time_type'],
                'extra_time_in_seconds' => $service['extra_time_in_seconds'],
                'gender' => $service['gender'],
                'pricing_type' => $service['pricing_type'],
                'tax_rate_id' => (empty($service['tax_rate_id']) ? "0" : $service['tax_rate_id']),
                'voucher_enabled' => ($service['voucher_enabled']) ? $service['voucher_enabled'] : 0,
                'voucher_expiration_period' => ($service['voucher_expiration_period']) ? $service['voucher_expiration_period'] : 0,
                'price' => $service_pricing['service_pricing_price'],
                'special_price' => $service_pricing['service_pricing_special_price'],
                'duration' => $service_pricing['duration_value'],
                'description' => $service['description']
            );
        if(!empty($service_id)) {
            $q = $this->group_model->udpate_service($service_id, $values);
        }else {
           $q = $this->group_model->add_service($values); 
        }        
        if($q == 'true'){
                $res['success'] = true;
        }else{
            $res['error'] = $q;
        }
        echo json_encode($res);
    }
    
    public function editService() {
        
        $query = $this->db->get_where('services', array('id' => $_GET['id']));
        $data['service'] = $query->row_array();
        $data['group_id'] = $query->row()->group_id;
        $data['mode'] = 'edit';
        $this->load->view('services/add_service', $data);
    }
    
    public function deleteService() {
        $this->db->delete('services', array('id' => $this->input->post('id')));
        echo 'true';
    }
    
 }