<?php

class Referral extends CI_Controller {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->load->model('referral_model');
        $this->user_id = $this->config->item('user_id');
    }

    public function index() {
        $data = array();
        $data['referrals'] = $this->referral_model->getReferralSources('');

        $this->load->view('referrals/index', $data);
    }

}
