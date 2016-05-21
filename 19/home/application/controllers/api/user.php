<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class User extends REST_Controller{
    function __construct(){
        parent::__construct();  


        $this->load->model("usuariogeneralmodel");        
        $this->load->library('sessionclass');        
    }   
    /**/
    function miembro_PUT(){

        $data  =  $this->put();    
        $db_response =  $this->usuariogeneralmodel->update_datos_miembro($data);
        $this->response($db_response);
    }
    /**/
    function miembro_GET(){

        $data = $this->get();
        $db_response = $this->usuariogeneralmodel->get_data_miembro($data);
        $this->response($db_response);
    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        
                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
    function miembro_descripcion_put(){

        $data  =  $this->put();    
        $db_response =  $this->usuariogeneralmodel->update_datos_miembro_descripcion($data);
        $this->response($db_response);
    }
    /**/
    function descripcion_escenario_GET(){
        $this->response("ok");
    }  
}
?>