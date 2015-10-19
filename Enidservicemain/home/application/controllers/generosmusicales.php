<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Generosmusicales extends REST_Controller{      
    function __construct(){
            parent::__construct();

            $this->load->helper('generoshelp');
            $this->load->model('generosmusicalesmodel');
            $this->load->library('sessionclass');
            
        }     


/* generosmusicales generosmusicales generosmusicales generosmusicales generosmusicales generosmusicales*/
    function get_byid_evento_get(){

        if ( $this->sessionclass->is_logged_in() == 1) {  

                $idempresa =  $this->sessionclass->getidempresa();                    
                $evento = $this->get("idevento");                     

                $responsedb = $this->generosmusicalesmodel->getDataByidEvent($idempresa, $evento);
                $this->response(list_generos_musicales($responsedb)); 

                
                //$this->response($responsedb);
                
        }else{

            $this->sessionclass->logout();        
        } 


    }/*Termina*/



    function update_genero_evento_post(){
        
        if ( $this->sessionclass->is_logged_in() == 1) {  

                $idempresa =  $this->sessionclass->getidempresa();                    
                $idevento = $this->post("evento");       
                $idgenero = $this->post("genero");                     

                $responsedb = $this->generosmusicalesmodel->update_genero_evento($idempresa, $idevento , $idgenero ); 
                $this->response($responsedb); 

               
        }else{

            $this->sessionclass->logout();        
        } 


    }

/* end generosmusicales end  generosmusicales end  generosmusicales end  generosmusicales generosmusicales generosmusicales*/    



}
?>