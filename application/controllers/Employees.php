<?php
class Employees extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('employees_model');
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function index() {
        
        Common::checkUserHasAccess('staff');
        
        $query = $this->db->get("staff");
        $data['staffs'] = $query->result_array();
        $this->load->layout('employees/index', $data);
    }
    
    public function newEmp() {
        
        $query = $this->db->get_where('services', array('user_id' => $this->user_id));
        $services = $query->result_array();
        foreach($services as $service => $s) { 
            $services[$service]['service_id'] = $s['id']; 
            
        }
        $data['services'] = $services;
        $this->load->view('employees/add_employees', $data);
    }
    
    public function add() {
        
        $post = $_POST['employee'];
        if(empty($post['service_ids'])) {
            $q = 'Services must be selected (at least 1 required)';
        }else{
            
            $staff_id = $_POST['staff_id'];
            $start_date = date("Y-m-d",strtotime($post['employment_start_date']));
            if(!empty($post['employment_end_date']))
                $end_date = date("Y-m-d",strtotime($post['employment_end_date']));;

            $employee = array(
                'first_name' => $post['first_name'],
                'last_name' => $post['last_name'],
                'mobile_number' => (!empty($post['mobile_number'])) ? $post['mobile_number'] : NULL,
                'email' => $post['email'],
                'notes' => $post['notes'],
                'start_date' => $start_date,
                'end_date' => (!empty($post['employment_end_date'])) ? $end_date : NULL,
                'active' => '1'
            );
            if(!empty($staff_id)) {
                $q = $this->employees_model->update($staff_id, $employee);
                if($q == 'true') {
                    $this->db->update('staffservices', array('allowed' => '0'), array('staff_id' => $staff_id));
                    foreach($post['service_ids'] as $service_id) {
                        $this->db->update('staffservices', array('allowed' => '1'), array('staff_id' => $staff_id, 'service_id' => $service_id));                   
                    }
                    $staffservicecommision = array(
                        'service_commision' => !empty($post['service_commission']) ? $post['service_commission'] : 0,
                        'product_commision' => !empty($post['product_commission']) ? $post['product_commission'] : 0
                    );
                    $this->db->update('staffservicecommision', $staffservicecommision, array('staff_id' => $staff_id));
                }
            }else
            {
                $q = $this->employees_model->insert($employee);
                if($q != 'Name is not unique') {
                    $staff_id = $q;
                    if(!empty($post['service_ids'])) {
                        foreach($post['service_ids'] as $service_id) {
                            $staffservices = array(
                                'staff_id' => $staff_id,
                                'service_id' => $service_id,
                                'allowed' => '1'
                            );
                            $this->db->insert("staffservices", $staffservices);
                        }
                    }
                    $staffservicecommision = array(
                        'staff_id' => $staff_id,
                        'service_commision' => !empty($post['service_commission']) ? $post['service_commission'] : 0,
                        'product_commision' => !empty($post['product_commission']) ? $post['product_commission'] : 0
                    );                
                    $this->db->insert("staffservicecommision", $staffservicecommision);
                            
                    $staffroster = array(
                        'staffid' => $staff_id,
                        'sunday' => '1',
                        'monday' => '1',
                        'tuesday' => '1',
                        'wednesday' => '1',
                        'thursday' => '1',
                        'friday' => '1',
                        'saturday' => '1'
                    );
                    $this->db->insert("staffroster", $staffroster);
                    $q = 'true';
                }

            }            
        }
        if($q == 'true'){
            $res['success'] = true;
        }else{
            $res['error'] = $q;
        }
        echo json_encode($res);
    }
    
    public function edit() {
        
        $staff_id = $_GET['id'];
        $staff = $this->db->get_where('staff', array('id' => $staff_id))->row_array();
        
        $query_staffservices = $this->db->query("SELECT a.id AS id, a.service_id as service_id, a.allowed as allowed, b.name FROM staffservices a, services b WHERE a.staff_id = $staff_id and a.service_id = b.id");
        $staffservices = $query_staffservices->result_array();
        
        $staffservicecommision = $this->db->get_where('staffservicecommision', array('staff_id' => $staff_id))->row_array();
        
        $data['staff'] = $staff;
        $data['services'] = $staffservices;
        $data['staffservicecommision'] = $staffservicecommision;
        $this->load->view('employees/add_employees', $data);
        
    }
}

