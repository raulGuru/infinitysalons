<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * custom loader  file extends CI_Loader
 */
 
class MY_Loader extends CI_Loader {
    public function layout($template_name, $vars = array(), $return = FALSE)
    {
    if($return):
        $content  = $this->view('common/header', $vars, $return);
        $content .= $this->view($template_name, $vars, $return);
        $content .= $this->view('common/footer', $vars, $return);

        return $content;
    else:
        $CI = & get_instance();
        if ($CI->session->userdata('salon_user')) {
            $vars['useraccess'] = $CI->session->userdata['salon_user']['useraccess'];
        }
        $this->view('common/header', $vars);
        $this->view($template_name, $vars);
        $this->view('common/footer', $vars);
    endif;
    }
}