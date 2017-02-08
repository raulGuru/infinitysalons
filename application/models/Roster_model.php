<?php
class Roster_model extends CI_Model {
    protected $user_id;
    function __construct() {
        parent::__construct();
//        $this->user_id = $this->config->item('user_id');
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
    public function getUserById($id = '') {
//        $this->db->select('*');
        if (isset($id) && $id != '') {
            $this->db->where('staff.id', $id);
        }
        $this->db->from('staff');
        $this->db->join('staffroster', 'staff.id = staffroster.staffid', 'left');
//        $this->db->get_compiled_select();
        $result = $this->db->get();
        $returnArr = $result->result_array();
        return $returnArr;
    }
    public function updateAllRoster($id) {
        if (!empty($id)) {
            $columnArr = array(
                'sunday' => '0',
                'monday' => '0',
                'tuesday' => '0',
                'wednesday' => '0',
                'thursday' => '0',
                'friday' => '0',
                'saturday' => '0'
            );
            if ($this->db->update('staffroster', $columnArr, array('staffid' => $id))) {
                return 'true';
            } else {
                return 'false';
            }
        }
    }
    public function updateStaffRoster($id, $rosterColumns) {
        if (!empty($id) && !empty($rosterColumns)) {
            if ($this->db->update('staffroster', $rosterColumns, array('staffid' => $id))) {
                return 'true';
            } else {
                return 'false';
            }
        }
    }
}