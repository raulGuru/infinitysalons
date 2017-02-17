<?php

date_default_timezone_set("Asia/Kolkata");

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->model('login_model');
    }

    public function index() {
        if ($this->session->userdata['salon_user']) {
            redirect('/dashboard');
        } else {
            // Check for user login process
            $userarr = $this->input->post();
            if (isset($userarr) && !empty($userarr)) {
                $result = $this->login_model->loginAuthentication($userarr);

                if (!empty($result) && $result['status'] == 1) {
                    $data = array(
                        'id' => $result['data']['id'],
                        'email' => $result['data']['email'],
                        'first_name' => $result['data']['first_name'],
                        'last_name' => $result['data']['last_name'],
                        'last_login_on' => $result['data']['last_login_on'],
                        'mobile' => $result['data']['mobile'],
                        'staffid' => $result['data']['staffid'],
                        'status' => $result['data']['status'],
                    );
                    $session_id = md5($data['id'] . "_" . $data['email']);

                    $update_user = $this->login_model->update_userSession($session_id, $data);
                    if ($update_user == 'true') {
                        $data['sessionId'] = $session_id;

                        $q = $this->db->get_where('userpermissions', array('id' => $data['id']));
                        $data['useraccess'] = $q->row_array();

                        $this->session->set_userdata('salon_user', $data);

                        if (!empty($this->session->userdata['salon_user']['useraccess'])) {
                            $userAccessArr = $this->session->userdata['salon_user']['useraccess'];

                            switch ($userAccessArr) {
                                case ($userAccessArr['home'] == 1):
                                    redirect('/dashboard');
                                    break;
                                case ($userAccessArr['calendar'] == 1):
                                    redirect('/calendar');
                                    break;
                                case ($userAccessArr['clients'] == 1):
                                    redirect('/customers');
                                    break;
                                case ($userAccessArr['services'] == 1):
                                    redirect('/services');
                                    break;
                                case ($userAccessArr['products'] == 1):
                                    redirect('/products');
                                    break;
                                case ($userAccessArr['staff'] == 1):
                                    redirect('/employees');
                                    break;
                                case ($userAccessArr['setup'] == 1):
                                    redirect('/provider');
                                    break;
                                default:
                                    redirect('/errors/denied');
                            }
                        }
                    } else {
                        $this->session->set_flashdata('flash_data', 'Something went wrong!');
                        redirect('login');
                    }
                } elseif (!empty($result) && $result['status'] == 3) {
                    $this->session->set_flashdata('flash_data', 'User is inactive.');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('flash_data', 'Email or password is wrong!');
                    redirect('login');
                }
            }

            // Show login page
            $this->load->view('login/index');
        }
    }

    public function logout() {
        if (!empty($this->session->userdata('salon_user'))) {
            // Removing session data
            $update_user = $this->login_model->update_userSession('', $this->session->userdata('salon_user'));

            if ($update_user == 'true') {
                $this->session->unset_userdata('salon_user');
//            session_destroy();

                $this->session->set_flashdata('flash_data', 'Successful logout!');
                redirect('login');
            } else {
                $this->session->set_flashdata('flash_data', 'Something went wrong!');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('flash_data', '');
            redirect('login');
        }
    }

}
