<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Busqueda extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper("busqueda");
        $this->load->model("busquedamodel");            
        $this->load->library('sessionclass');    
    }   
    /*listamos los eventos del día */     
    function eventos_dia_GET(){
        $db_response =  $this->busquedamodel->get_eventos_dia();
        $bloque_busqueda = bloque_completo($db_response);                   
        $this->response($bloque_busqueda);
    }    
    /*búsqueda dinámica*/    
    function evento_GET(){

        $db_response = $this->busquedamodel->load_eventos_busqueda($this->get());
        $bloque_busqueda =  bloque_completo($db_response);                   
        $this->response($bloque_busqueda);
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        
        }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
}/*Termina rest*/
