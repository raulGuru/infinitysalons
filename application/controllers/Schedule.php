<?php
class Schedule extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('schedule_model');
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    
    public function index() {
        //$query = $this->db->get_where("schedule", array('user_id' => $this->user_id));
        //$data['schedule'] = $query->result_array();
        //print_r($data); exit();
        $this->load->layout('schedule/index');
    }
    
    public function newSchedule() {        
        $this->load->view('schedule/add_schedule');
    }
    
    public function addSchedule() {
        
        $schedule = $_POST['schedule'];
        $schedule_id = $_POST['schedule_id'];
        $values = array(
            'name' => trim($schedule['name']),
            'value' => trim($schedule['value']),
            'schedule_type' => $schedule['schedule_type'],
            'enabled_for_services' => $schedule['enabled_for_services'],
            'enabled_for_products' => $schedule['enabled_for_products'],
            'enabled_for_vouchers' => $schedule['enabled_for_vouchers']
        );
        if(!empty($schedule_id)) {
            $q = $this->schedule_model->update($schedule_id, $values);
        }else {
            $q = $this->schedule_model->insert($values);
        }        
        if($q == 'true'){
                $res['success'] = true;
        }else{
            $res['error'] = $q;
        }
        echo json_encode($res);
    }
    
    public function edit() {
        $query = $this->db->get_where('schedule', array('id' => $_GET['id']));
        $data['schedule'] = $query->row_array();
        $data['mode'] = 'edit';
        $this->load->view('schedule/add_schedule', $data);
    }
    
    public function delete() {
        $this->db->delete('schedule', array('id' => $this->input->post('id')));
        echo 'true';
    }
}
