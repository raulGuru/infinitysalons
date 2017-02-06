<?php

class Sales_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    public function getReferralSources($id = "") {
        if (isset($id) && !empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->select('*');
        $this->db->from('businessreferral');

        $result = $this->db->get();
        $businessreferrals = $result->result_array();
        return $businessreferrals;
    }

}
