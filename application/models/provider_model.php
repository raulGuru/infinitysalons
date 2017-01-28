<?php

class Provider_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }

    public function getUser($email) {

        $returnArr = array();
        $ql = $this->db->get_where('user', array('email' => $email['email']));
        $returnArr = $ql->result();

        if ($ql->num_rows() > 0) {
            return $returnArr;
        }
    }

    public function update($id, $group_name) {

        $query = $this->db->get_where('service_group', array('id' => $id, 'user_id' => $this->user_id));
        $group = $query->row();
        if ($group->group_name == $group_name) {
            return 'Name is not unique';
        } else {
            $this->db->update('service_group', array('group_name' => $group_name), array('id' => $id));
            return 'true';
        }
    }

    public function getReferralSources($id = "") {
        //        $id = 1;
        if (isset($id) && !empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->select('*');
        $this->db->from('businessreferral');

        $query = $this->db->get();
        $businessreferral = $query->result_array();
        return $businessreferral;
    }

    public function getCancellationReasons($id = "") {
        //        $id = 1;
        if (isset($id) && !empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->select('*');
        $this->db->from('businesscancels');

        $query = $this->db->get();
        $businesscancels = $query->result_array();
        return $businesscancels;
    }

    public function getPosPaymentTypes($id = "") {
        if (isset($id) && !empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->select('*');
        $this->db->from('businesspayments');
        $query = $this->db->get();
        $businesspayments = $query->result_array();

        return $businesspayments;
    }

    public function getPosTaxes($id = "") {
        if (isset($id) && !empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->select('*');
        $this->db->from('businesstax');
        $query = $this->db->get();
        $businesstax = $query->result_array();

        return $businesstax;
    }

}
