<?php

class Employees extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->model('employees_model');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    public function index() {

        Common::checkUserHasAccess('staff');

        $query = $this->db->get("staff");
        $data['staffs'] = $query->result_array();
        $this->load->layout('employees/index', $data);
    }

    public function newEmp() {

        $query = $this->db->get_where('services');
        $services = $query->result_array();
        foreach ($services as $service => $s) {
            $services[$service]['service_id'] = $s['id'];
        }
        $data['services'] = $services;
        $this->load->view('employees/add_employees', $data);
    }

    public function add() {

        $post = $_POST['employee'];
        if (empty($post['service_ids'])) {
            $q = 'Services must be selected (at least 1 required)';
        } elseif (empty($post['new_password']) && empty($post['confirm_password'])) {
            $q = 'Password is required.';
        } elseif ($post['new_password'] != $post['confirm_password']) {
            $q = 'Passwords do not match.';
        } else {

            $staff_id = $_POST['staff_id'];
            $start_date = date("Y-m-d", strtotime($post['employment_start_date']));
            if (!empty($post['employment_end_date']))
                $end_date = date("Y-m-d", strtotime($post['employment_end_date']));;

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
            if (!empty($staff_id)) {
                $q = $this->employees_model->update($staff_id, $employee);
                echo '<pre>', print_r($q), '</pre>';
                die;
                if ($q == 'true') {
                    $this->db->update('staffservices', array('allowed' => '0'), array('staff_id' => $staff_id));
                    foreach ($post['service_ids'] as $service_id) {
                        $this->db->update('staffservices', array('allowed' => '1'), array('staff_id' => $staff_id, 'service_id' => $service_id));
                    }
                    $staffservicecommision = array(
                        'service_commision' => !empty($post['service_commission']) ? $post['service_commission'] : 0,
                        'product_commision' => !empty($post['product_commission']) ? $post['product_commission'] : 0
                    );
                    $this->db->update('staffservicecommision', $staffservicecommision, array('staff_id' => $staff_id));

                    $userArr = array(
                        'staffid' => $staff_id,
                        'first_name' => $post['first_name'],
                        'last_name' => $post['last_name'],
                        'email' => $post['email'],
                        'password' => base64_encode($this->config->item('encryption_key') . "_" . $post['new_password']),
                        'mobile' => (!empty($post['mobile_number'])) ? $post['mobile_number'] : '0',
                        'status' => 'active',
                        'created_on' => date('Y-m-d H:i:s'),
                        'updated_on' => date('Y-m-d H:i:s'),
                    );

                    $this->db->update('user', $userArr, array('staffid' => $staff_id));
                }
            } else {
                $q = $this->employees_model->insert($employee);
                if ($q != 'Email is not unique') {
                    $staff_id = $q;
                    if (!empty($post['service_ids'])) {
                        foreach ($post['service_ids'] as $service_id) {
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
                        'userid' => $this->user_id,
                        'sunday' => '1',
                        'monday' => '1',
                        'tuesday' => '1',
                        'wednesday' => '1',
                        'thursday' => '1',
                        'friday' => '1',
                        'saturday' => '1'
                    );
                    $this->db->insert("staffroster", $staffroster);

                    $userArr = array(
                        'staffid' => $staff_id,
                        'first_name' => $post['first_name'],
                        'last_name' => $post['last_name'],
                        'email' => $post['email'],
                        'password' => base64_encode($this->config->item('encryption_key') . "_" . $post['new_password']),
                        'mobile' => (!empty($post['mobile_number'])) ? $post['mobile_number'] : '0',
                        'status' => 'active',
                        'created_on' => date('Y-m-d H:i:s'),
                        'updated_on' => date('Y-m-d H:i:s'),
                    );
                    $userid = $this->employees_model->insertUser($userArr);

                    if ($userid != 'Email is not unique') {
                        $userPermissions = array(
                            'userid' => $userid,
                            'home' => '1',
                            'calender' => '1',
                            'clients' => '1',
                            'services' => '1',
                            'products' => '1',
                            'staff' => '1',
                            'setup' => '1',
                        );
                        $this->db->insert("userpermissions", $userPermissions);
                    }
                    $q = 'true';
                }
            }
        }
        if ($q == 'true') {
            $res['success'] = true;
        } else {
            $res['error'] = $q;
        }
        echo json_encode($res);
    }

    public function edit() {

        $staff_id = $_GET['id'];
        $staff = $this->db->get_where('staff', array('id' => $staff_id))->row_array();

        $query_staffservices = $this->db->query("SELECT a.id AS id, a.id AS service_id, a.name, b.allowed
                                                FROM `services` a
                                                LEFT JOIN `staffservices` b
                                                ON a.id = b.service_id AND b.staff_id=$staff_id");
        $staffservices = $query_staffservices->result_array();

        $staffservicecommision = $this->db->get_where('staffservicecommision', array('staff_id' => $staff_id))->row_array();

        $staffpassword = $this->db->select('password')->get_where('user', array('staffid' => $staff_id))->row_array();
        $staffpassword['password'] = Common::pwdDecrypt($staffpassword['password']);

        $data['staff'] = $staff;
        $data['services'] = $staffservices;
        $data['staffservicecommision'] = $staffservicecommision;
        $data['staffpassword'] = $staffpassword;
        $this->load->view('employees/add_employees', $data);
    }

}
