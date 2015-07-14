<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Event extends REST_Controller{
      
    function __construct(){
            parent::__construct();
            
            $this->load->model("eventmodel");
            $this->load->library('sessionclass');
            
        }     

    
     function updatenameevent_POST(){
           
        if ( $this->sessionclass->is_logged_in() == 1) {  
            /*Capturamos datos*/
    
                $nuevonombre  = $this->post("nuevonombre");
                $this->response($this->eventmodel->update_event_name($nuevonombre) );                               
        }else{
            $this->sessionclass->logout();
        
        }    
    }


    /*Termina rest*/

}
?>
