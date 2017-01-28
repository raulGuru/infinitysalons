<?php

class Cancellation_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }

    public function getCancellationReasons($id = "") {
        if (isset($id) && !empty($id)) {
            $this->db->where('id', $id);
        }
        $this->db->select('*');
        $this->db->from('businesscancels');

        $result = $this->db->get();
        $businesscancels = $result->result_array();
        return $businesscancels;
    }

}
