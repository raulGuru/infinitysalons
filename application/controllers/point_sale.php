<?php

class Point_sale extends CI_Controller {

    protected $user_id;
    
    function __construct() {
        parent::__construct();
        $this->load->model('sales_model');
        $this->user_id = $this->config->item('user_id');
    }

    public function index() {
//        $data = array();
//        $data['cancellations'] = $this->sales_model->getCancellationReasons('');
        $this->load->view('pointsale/index');
    }

    public function newTax() {
        $this->load->view('pointsale/add_tax');
    }

}
