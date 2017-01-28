<?php
class Customers extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->load->model('customers_model');
        $this->user_id = $this->config->item('user_id');
    }
    
    public function index() {
        
        $query = $this->db->get("clients");
        $data['customers'] = $query->result_array();
        $this->load->layout('customers/index', $data);
    }
    
    public function newCustomer() {
        $this->load->view('customers/add_customer');
    }
    
    public function add() {
        
        $customer = $_POST['customer'];
        if(!empty($customer['first_name'])) {            
            $values = array(
                'firstname' => trim($customer['first_name']),
                'lastname' => trim($customer['last_name']),
                'mobile' => (!empty($customer['mobile']) ? $customer['mobile'] : NULL),
                'telephone' => (!empty($customer['telephone']) ? $customer['telephone'] : NULL),
                'email' => $customer['email'],
                'referral_id' => $customer['referral_id'],
                'gender' => (!empty($customer['gender']) ? $customer['gender'] : 'f'),
                'notes' => $customer['notes'],
                'birthday' => (!(empty($customer['birthday'])) ? date("Y-m-d",strtotime($customer['birthday'])) : NULL),
                'address' => $customer['address'],
                'area' => $customer['area'],
                'city' => $customer['city'],
                'state' => $customer['state'],
                'postcode' => (!empty($customer['post_code']) ? $customer['post_code'] : NULL)
            );
            $customer_id = $_POST['customer_id'];
            if(!empty($customer_id)) {
                $q = $this->customers_model->update($customer_id, $values);
            }else {
                $q = $this->customers_model->insert($values);
            }            
        }
        else {
            $q = 'First name is required';
        }                
        if($q == 'true'){
            $res['success'] = true;
        }else{
            $res['error'] = $q;
        }
        echo json_encode($res);
    }
    
    public function view() {
        
        $customer_id = $_REQUEST['id'];
        if(!empty($customer_id)) {
            $query = $this->db->get_where('clients', array('id' => $customer_id));
            $data['customer'] = $query->row_array();
            $this->load->layout('customers/view_customer', $data);
        }else {
            $this->load->view('errors/html/error_404');
        }
    }
    
    public function edit() {
        if(!empty($_GET['id'])) {
            $customer_id = $_GET['id'];
            $data['customer'] = $this->db->get_where('clients', array('id' => $customer_id))->row_array();
        }
        $this->load->view('customers/add_customer', $data);
    }
    
    public function delete() {
        $this->db->delete('clients', array('id' => $this->input->post('id')));
        echo 'true';
    }
    
    public function getClients() {
        
        $t = $_GET['term'];
        
        $query = $this->db->query("SELECT * FROM `clients` "
                                    . "WHERE `firstname` LIKE '%$t%' "
                                    . "OR `lastname` LIKE '%$t%' "
                                    . "OR `mobile` LIKE '%$t%'");
        $result['clients'] = $query->result_array();
        echo json_encode($result);
    }
    
    
}

