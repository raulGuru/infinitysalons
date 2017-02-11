<?php
class Employees_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];

    }
    
    public function insert($employee) {
        $ql = $this->db->select('id')
                    ->from('staff')
                    ->where('email', $employee['email'])
                    ->get();
        if( $ql->num_rows() > 0 ) {
            return 'Email is not unique';
        } else {
            if ($this->db->insert("staff", $employee)) { 
                return $this->db->insert_id(); 
             }
        }
    }
    
    public function update($staff_id, $staff) {
        $ql = $this->db->select('id')
                    ->from('staff')
                    ->where('email', $staff['email'])
                    ->get();
        if( $ql->num_rows() > 1 ) {
            return 'Email is not unique';
        } else {
            $this->db->update('staff', $staff, array('id' => $staff_id));
            return 'true'; 
        }
    }
    
    public function insertUser($user) {
        $ql = $this->db->select('id')
                    ->from('user')
                    ->where('email', $user['email'])
                    ->get();

        if( $ql->num_rows() > 0 ) {
            return 'Email is not unique';
        } else {
            if ($this->db->insert("user", $user)) { 
                return $this->db->insert_id(); 
             }
        }
    }
}

