<?php
class Employees_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];

    }
    
    public function insert($employee) {
        $ql = $this->db->select('id')
                    ->from('staff')
                    ->where('first_name', $employee['first_name'])
                    ->where('last_name', $employee['last_name'])
                    ->get();
        if( $ql->num_rows() > 0 ) {
            return 'Name is not unique';
        } else {
            if ($this->db->insert("staff", $employee)) { 
                return $this->db->insert_id(); 
             }
        }
    }
    
    public function update($staff_id, $staff) {
        $ql = $this->db->select('id')
                    ->from('staff')
                    ->where('first_name', $staff['first_name'])
                    ->where('last_name', $staff['last_name'])
                    ->get();
        if( $ql->num_rows() > 1 ) {
            return 'Name is not unique';
        } else {
            $this->db->update('staff', $staff, array('id' => $staff_id));
            return 'true'; 
        }
    }
}

