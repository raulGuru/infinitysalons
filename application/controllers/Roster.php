<?php

class Roster extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->helper('form');

        $this->load->model('roster_model');
//        $this->user_id = $this->config->config;
//        print_r($this->user_id); die;
    }

    function index() {
        $data['staffs'] = $this->roster_model->getUserById();
        $this->load->layout('roster/index', $data);
    }

    public function getUserRoster() {
        $u = $this->roster_model->getUserById($_GET['staffid']);
        echo json_encode($u[0]);
    }

    public function add() {
        if (!empty($_POST['staff_id']) && !empty($_POST['roster'] && $_POST['commit'] == 'Save Changes')) {
            $staffid = $_POST['staff_id'];
            $rosterColumns = $_POST['roster'];

            $updateAll = $this->roster_model->updateAllRoster($staffid);
            if ($updateAll == 'true') {
                $updateUserPerms = $this->roster_model->updateStaffRoster($staffid, $rosterColumns);
                $this->session->set_flashdata('roster_days_update_mesg', 'Roster information has been successfully updated.');
            } else {
                $this->session->set_flashdata('roster_days_update_mesg', 'Something went wrong!');
            }
        }
        redirect('roster');
    }

}
