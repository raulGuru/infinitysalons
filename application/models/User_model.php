<?php
class User_model extends CI_Model {
    protected $user_id;
    function __construct() {
        parent::__construct();
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
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
    public function getUserById($id = '') {
        $this->db->select('user.*, userpermissions.*');
        if (isset($id) && $id != '') {
            $this->db->where('user.id', $id);
        }
        $this->db->from('user');
        $this->db->join('userpermissions', 'user.id = userpermissions.userid', 'inner');
//        $this->db->get_compiled_select();
        $result = $this->db->get();
        $returnArr = $result->result_array();
        return $returnArr;
    }
    public function updateAllPermissions($id) {
        if (!empty($id)) {
            $columnArr = array(
                'home' => '0',
                'calender' => '0',
                'clients' => '0',
                'services' => '0',
                'products' => '0',
                'staff' => '0',
                'setup' => '0'
            );
            if ($this->db->update('userpermissions', $columnArr, array('userid' => $id))) {
                return 'true';
            } else {
                return 'false';
            }
        }
    }
    public function updateUserPermissions($id, $permissionCols) {
        if (!empty($id) && !empty($permissionCols)) {
            if ($this->db->update('userpermissions', $permissionCols, array('userid' => $id))) {
                return 'true';
            } else {
                return 'false';
            }
        }
    }
}
?>