<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_auth {

    function initializeData() {
        $CI = & get_instance();

        // Load Session
        $CI->load->library('session');

        if (!$CI->session->userdata('salon_user')) {
            if ($CI->router->class == 'login') {
                return;
            } else {
                redirect('login');
                exit();
            }
        }
    }

}
