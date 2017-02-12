<?php

class Group_model extends CI_Model {

    protected $user_id;

    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }

    public function insert($group_name) {

        $ql = $this->db->select('id')->from('service_group')->where('group_name', $group_name)->get();
        if ($ql->num_rows() > 0) {
            return 'Name is not unique';
        } else {
            $data = array('user_id' => $this->user_id, 'group_name' => $group_name);
            if ($this->db->insert("service_group", $data)) {
                return 'true';
            }
        }
    }

    public function update($id, $group_name) {

        $query = $this->db->get_where('service_group', array('id' => $id));
        $group = $query->row();
        if ($group->group_name == $group_name) {
            return 'Name is not unique';
        } else {
            $this->db->update('service_group', array('group_name' => $group_name, 'user_id' => $this->user_id), array('id' => $id));
            return 'true';
        }
    }

    public function add_service($service) {

        $service['user_id'] = $this->user_id;
        $ql = $this->db->select('id')->from('services')->where('name', $service['name'])->get();
        if ($ql->num_rows() > 0) {
            return 'Name is not unique';
        } else {
            if ($this->db->insert("services", $service)) {
                return 'true';
            }
        }
    }

    public function udpate_service($service_id, $values) {
        $values['user_id'] = $this->user_id;
        $this->db->update('services', $values, array('id' => $service_id));
        return 'true';
    }

}
