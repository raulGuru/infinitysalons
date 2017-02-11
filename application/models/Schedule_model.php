<?php
class Schedule_model extends CI_Model {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->session->userdata['salon_user']['id'];
    }
}

