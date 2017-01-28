<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
  if( !function_exists('sendajaxresponse') ) {
    
    function sendajaxresponse($data) {
        $sucess = false;
        $error = false;
        $json = array();
        if(isset($data['success']) && !empty($data['success']))
            $json['status'] = 'success';
            
        
        $json = array("success" => $sucess, "error" => $error);
        echo json_encode($json);
    }
    
  }

?> 