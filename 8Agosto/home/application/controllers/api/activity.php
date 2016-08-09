<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Activity extends REST_Controller{
    function __construct(){
            
            parent::__construct();            
            $this->load->helper("activity");
            $this->load->model("activitymodel");
            $this->load->library('sessionclass');        
    }     
    /**************************/    
    function eventos_administracion_GET(){        
        $this->validate_user_sesssion();     
        $id_empresa = $this->sessionclass->getidempresa();    
        $id_user = $this->sessionclass->getidusuario();  
        
        /**/

        $db_response = $this->activitymodel->get_actividades_evento_admin($id_empresa ,  $id_user);
        $activity =  actividad_eventos_admin($db_response);
        $this->response($activity);
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
?>