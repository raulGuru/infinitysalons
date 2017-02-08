<?php
class Dashboard extends CI_Controller {

    public function index()
    {
        Common::checkUserHasAccess('home');
        $this->load->layout('welcome_message');
    }
}
