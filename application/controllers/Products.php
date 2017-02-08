<?php

class Products extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->model('products_model');
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    public function index() {
        
        Common::checkUserHasAccess('products');

        $products = $this->products_model->get($_GET['search'], $_GET['sort'], $_GET['direction']);
        $data['products'] = $products;
        $data['search'] = $_GET['search'];
        //$data['sort'] = $_GET['sort'];
        //$data['direction'] = $_GET['direction'];
        $this->load->layout('products/index', $data);
    }

    public function newProduct() {
        $this->load->view('products/add_product');
    }

    public function add() {

        $product = $_POST['product'];
        $product_id = $_POST['product_id'];
        $values = array(
            'product_name' => trim($product['product_name']),
            'sku' => trim($product['sku']),
            'description' => $product['description'],
            'cost_price' => !empty($product['cost_price']) ? round($product['cost_price'], 2) : 0,
            'full_price' => !empty($product['full_price']) ? round($product['full_price'], 2) : 0,
            'special_price' => (!empty($product['special_price']) ? round($product['special_price'], 2) : $product['full_price']),
            'tax_rate_id' => (empty($product['tax_rate_id']) ? '0' : $product['tax_rate_id']),
            'commission_enabled' => (empty($product['commission_enabled']) ? '0' : $product['commission_enabled']),
            'quantity' => !empty($product['quantity']) ? $product['quantity'] : 0
        );
        if (!empty($product_id)) {
            $q = $this->products_model->update($product_id, $values);
        } else {
            $q = $this->products_model->insert($values);
        }
        if ($q == 'true') {
            $res['success'] = true;
        } else {
            $res['error'] = $q;
        }
        echo json_encode($res);
    }

    public function edit() {
        $query = $this->db->get_where('products', array('id' => $_GET['id']));
        $data['product'] = $query->row_array();
        $data['mode'] = 'edit';
        $this->load->view('products/add_product', $data);
    }

    public function delete() {
        $this->db->delete('products', array('id' => $this->input->post('id')));
        echo 'true';
    }

}
