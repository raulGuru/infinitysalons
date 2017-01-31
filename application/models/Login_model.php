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
            $resultdata = array('status' => 1, 'data' => $query->row_array(), 'message' => 'active user found');
        } else {
            $this->db->select('*');
            $this->db->from('user');
            $where = "email='" . addslashes($data['email']) . "' AND password='" . addslashes($data['password']) . "' AND	status='disable'";
            $this->db->where($where);
            $query = $this->db->get();

            if ($query->num_rows() == 0) {
                $resultdata = array('status' => 2, 'data' => $query->row_array(), 'message' => 'no user found');
            } else {
                $resultdata = array('status' => 3, 'data' => $query->row_array(), 'message' => 'inactive user found');
            }
        }
        return $resultdata;
    }

    function userDetails($email, $password) {
        if (!empty($email)) {
            
        }
        $this->db->select('id,email,last_login_on,updated_on');
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
            $afilds = array('last_login_on' => $updateTime,
                'updated_on' => date('Y-m-d H:i:s'));

            $this->db->where('id', $id);
            $this->db->update('user', $afilds);
        }
        return $resultdata;
    }

    public function update_userSession($session_id, $user) {
        if (!empty($session_id) && !empty($user)) {
            //for login
            $session = array('session_id' => $session_id);
            if ($this->db->update('user', $session, array('id' => $user['id']))) {
                return 'true';
            } else {
                return 'false';
            }
        } elseif ($session_id == '' && !empty($user)) {
            //for logout
            if ($this->db->update('user', array('session_id' => $session_id), array('id' => $user['id']))) {
                return 'true';
            } else {
                return 'false';
            }
        } else {
            return 'true';
        }
    }

}
