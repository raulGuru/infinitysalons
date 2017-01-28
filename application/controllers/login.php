<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('login_model');
    }

    // Show login page
    public function index() {
        $this->load->view('login/index');
    }

    // Check for user login process
    public function user_login_process() {
        redirect('/services'); exit();
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            if (empty($this->session-userdata('logged_in'))) {
                redirect('/login');
            } else {
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                $result = $this->login_model->loginAuthentication($data);

                if ($result == 0) {
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $resultdata = $this->login_model->userDetails($email, $password);
                    if ($resultdata != false) {

                        $session_data['sess_userid'] = $resultdata[0]->id;
                        $session_data['sess_username'] = $resultdata[0]->email;
                        $session_data['sess_password'] = $resultdata[0]->password;
                        $session_data['sess_first_name'] = $resultdata[0]->first_name;
                        $session_data['sess_last_name'] = $resultdata[0]->last_name;
                        $session_data['sess_useremail'] = $resultdata[0]->email;
                        $session_data['sess_usercanadd'] = $resultdata[0]->can_add;
                        $session_data['sess_usercanupdate'] = $resultdata[0]->can_update;
                        $session_data['sess_usercandelete'] = $resultdata[0]->can_delete;
                        $session_data['sess_userlastlogin'] = $resultdata[0]->last_login_on;

                        // Add user data in session
                        $this->session->set_userdata('logged_in', $session_data);
                        //$this->load->layout('services/index');
                        redirect('/services');
                    }
                } else {
                    $data = array(
                        'error_message' => 'Invalid Username or Password'
                    );
                    $this->load->view('login/index', $data);
                }
            }
        }
    }

    public function logout() {

        // Removing session data
        $this->session->unset_userdata('logged_in');
        session_destroy();
        //$data['message_display'] = 'Successfully Logout';
        $this->load->view('login/index');
    }

}
