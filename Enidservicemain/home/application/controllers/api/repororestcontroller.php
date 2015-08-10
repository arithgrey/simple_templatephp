<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Repororestcontroller extends REST_Controller{    
    function __construct(){
            parent::__construct();
            $this->load->model("repomodel");
            $this->load->library('sessionclass');
            
    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        

                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */

}
