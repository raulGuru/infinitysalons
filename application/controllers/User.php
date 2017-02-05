<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');

        $this->load->model('user_model');
    }

    public function account() {
        $data = $loggedUser = array();
        $loggedUser = $this->session->userdata('salon_user');
        $email = $loggedUser['email'];
        $data['user'] = $this->user_model->getUser($email);

        $this->load->layout('user/account', $data);
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
            redirect('user/account');
        }
    }

    public function permissions() {
        $data['users'] = $this->user_model->getUserById();
        $this->load->layout('user/permissions', $data);
    }

    public function updatePermissions() {
        if (!empty($_POST['userid']) && !empty($_POST['permissions'] && $_POST['commit'] == 'Save Changes')) {
            $userid = $_POST['userid'];
            $permissionColumns = $_POST['permissions'];

            $updateAll = $this->user_model->updateAllPermissions($userid);
            if ($updateAll == 'true') {
                $updateUserPerms = $this->user_model->updateUserPermissions($userid, $permissionColumns);
                $this->session->set_flashdata('user_perms_update_mesg', 'User permission information has been successfully updated.');
            } else {
                $this->session->set_flashdata('user_perms_update_mesg', 'Something went wrong!');
            }
        }
        redirect('user/permissions');
    }

    public function getUserPermissions() {
        $u = $this->user_model->getUserById($_GET['userid']);
        echo json_encode($u[0]);
    }

}
