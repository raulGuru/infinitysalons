<?php

class Cancellation_reasons extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->model('cancellation_model');
        $this->user_id = $this->config->item('user_id');
    }

    public function index() {
        $data = array();
        $data['cancellations'] = $this->cancellation_model->getCancellationReasons('');

        $this->load->view('cancellations/index', $data);
    }

}
