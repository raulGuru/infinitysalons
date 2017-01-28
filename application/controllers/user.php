<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');

        $this->load->model('user_model');
    }

    public function account() {
        $data = $loggedUser = array();
        $loggedUser = $this->session->userdata('logged_in');

        if (isset($loggedUser)) {
            $email = $loggedUser['sess_useremail'];
            $data['user'] = $this->user_model->getUser($email);
            $data['user'] = json_decode(json_encode($data['user']), True);

            $this->load->layout('user/account', $data);
        } else {
            $this->load->view('login/index');
        }
    }

    public function saveAccount() {
        $updateArr = array();
        $id = $this->input->post('id');
        $updateArr['first_name'] = $this->input->post('first_name');
        $updateArr['last_name'] = $this->input->post('last_name');
        $updateArr['mobile'] = $this->input->post('mobile');

        if (!empty($this->input->post('password')) && ($this->input->post('password') == $this->input->post('password_confirmation'))) {
            $updateArr['current_password'] = $this->input->post('password');
        }

        if (isset($updateArr) && !empty($updateArr)) {
            $returnArr = $this->user_model->update($id, $updateArr);
        }
        if ($returnArr['error'] == '') {
            redirect('account');
        }
    }

}
