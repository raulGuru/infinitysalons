<?php

class Login_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }

    function loginAuthentication($data) {
        $this->db->select('*');
        $this->db->from('user');
        $where = "email='" . addslashes($data['email']) . "' AND password='" . addslashes($data['password']) . "' AND	status='active'";
        $this->db->where($where);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            $resultdata = 0;
        } else {
            $this->db->select('*');
            $this->db->from('user');
            $where = "email='" . addslashes($data['email']) . "' AND password='" . addslashes($data['password']) . "' AND	status='disable'";
            $this->db->where($where);
            $query = $this->db->get();

            if ($query->num_rows() == 0) {
                $resultdata = 1;
            } else {
                $resultdata = 2;
            }
        }
        return $resultdata;
    }

    function userDetails($email, $password) {
        $this->email = $email;
        $this->password = $password;

        $this->db->select('id,first_name,last_name,password,email,last_login_on,can_add,can_update,can_delete,updated_on');
        $this->db->from('user');
        $where = "email='" . $this->email . "' AND password='" . $this->password . "' AND	status='active'";
        $this->db->where($where);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $resultdata[] = $value;
                $updateTime = $value->updated_on;
                $id = $value->id;
            }
            date_default_timezone_set("Asia/Kolkata");
            $afilds = array('last_login_on' => $updateTime,
                'updated_on' => date('Y-m-d H:i:s'));

            $this->db->where('id', $id);
            $this->db->update('user', $afilds);
        }
        return $resultdata;
    }

}

?>