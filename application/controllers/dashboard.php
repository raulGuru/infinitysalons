<?php
class Dashboard extends CI_Controller {

    public function index()
    {
        $this->load->layout('welcome_message');
    }
}
