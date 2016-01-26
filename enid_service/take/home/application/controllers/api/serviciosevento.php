<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Serviciosevento extends REST_Controller{      
    function __construct(){
        parent::__construct();
        $this->load->helper("servicios");    
        $this->load->model("servicioseventmodel");        
        $this->load->library('sessionclass');        
    }     
    /*update all services in event */    

    function update_all_in_event_post(){
        $this->validate_user_sesssion();
        $id_evento = $this->post("evento");                        
        $serviciodb = $this->servicioseventmodel->update_all_in_event($id_evento);
        $this->response($serviciodb);      
    }
    /**/
    function load_get(){
        
        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $evento = $this->get("evento");                        
        $serviciodb = $this->servicioseventmodel->getserviciosevento( $evento , $id_empresa );
        $this->response(serviciosevent($serviciodb ));    
    }
    /**/
    function update_post(){
        
        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $evento = $this->post("evento");                        
        $idservicio =  $this->post("idservicio");
        $serviciodb = $this->servicioseventmodel->update( $evento , $idservicio ,  $id_empresa );
        $this->response($serviciodb);
            
    }
    /**/
    function descripcion_PUT(){

        $this->validate_user_sesssion();
        $param =  $this->put();                 
        $db_serponse  = $this->servicioseventmodel->update_descripcion($param);
        $this->response($db_serponse);
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
