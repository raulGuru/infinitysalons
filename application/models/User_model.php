<?php

class User_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }

    public function getUser($email) {
        $returnArr = array();
        $ql = $this->db->get_where('user', array('email' => $email));
        $returnArr = $ql->row_array();

        if ($ql->num_rows() > 0) {
            return $returnArr;
        }
    }

    public function update($id, $updateArr) {
        $returnArr = array();

        $query = $this->db->get_where('user', array('id' => $id, 'email' => $updateArr['email']));
        $email = $query->result_array();

        if (isset($email) && !empty($email) && ($email[0]['email'] == $updateArr['email'])) {
            $returnArr['error'] = 'Email is not unique';
        } else {
            $this->db->where('id', $id);
            $this->db->update('user', $updateArr);
            $returnArr['error'] = '';
        }

        return $returnArr;
    }

}

?>