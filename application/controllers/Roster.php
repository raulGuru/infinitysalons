<?php
class Roster extends CI_Controller {
    
    protected $user_id;
    function __construct() {
        parent::__construct();
        $this->user_id = $this->config->item('user_id');
    }
    
    function index() {
        $this->load->layout('roster/index');
    }
    
    function add() {
        echo '<pre>', print_r($_POST), '</pre>';
        exit();
    }
}

