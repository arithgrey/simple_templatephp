<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Accesos extends REST_Controller{

    function __construct(){
            parent::__construct();

            $this->load->helper("accesos");
            $this->load->model("accesosmodel");
            $this->load->library('sessionclass');
            
        }     

    function load_post(){
            $this->validate_user_sesssion();
            $idempresa =  $this->sessionclass->getidempresa();                
            $evento = $this->post("evento");                        
            $responsedb = $this->accesosmodel->getDataByidEvent($idempresa, $evento);
            $this->response(getData($responsedb)); 
    }/*Termina*/
    function nuevo_post(){
        
        $this->validate_user_sesssion();
        $idempresa =  $this->sessionclass->getidempresa();                    
        $evento = $this->post("evaccesos");        
        $acceso_tipo = $this->post("acceso-tipo-modal");                        
        $precio = $this->post("precio-acceso-modal");                        
        $inicio = $this->post("nuevo_inicio_acceso");
        $termino = $this->post("nuevo_termino_acceso");                                
        $dbrespose = $this->accesosmodel->insert( $precio , $inicio , $termino , $evento , $acceso_tipo);
        $this->response($dbrespose);             
    }
    /*****************Elimina el acceso del evento **************/
    function deletebyid_post(){
        
        $this->validate_user_sesssion();
               
        $evento = $this->post("evento");      
        $acceso = $this->post("acceso");                  
        $this->response($this->accesosmodel->deletebyid( $evento , $acceso ));         
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
