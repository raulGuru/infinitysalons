<?php
class Errors extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function denied() {
        $this->load->view('errors/html/error_404');
    }
}

