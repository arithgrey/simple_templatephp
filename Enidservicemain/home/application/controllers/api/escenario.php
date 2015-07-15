<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Escenario extends REST_Controller{
      
    function __construct(){
            parent::__construct();
                
            $this->load->helper("escenario");      
            $this->load->model("escenariomodel");                
            $this->load->library('sessionclass');
            
        }     


    function nuevo_POST(){
                
        if ( $this->sessionclass->is_logged_in() == 1) {  
            
                

                
                $evento =  $this->post("evento_escenario");
                $nombre= $this->post("nuevoescenario");    
                $idempresa =  $this->sessionclass->getidempresa();

                $this->response($this->escenariomodel->nuevo( $nombre , $evento ,  $idempresa  )  );


                                

                
        }else{
            $this->sessionclass->logout();
        
        }    

    }/*Termina la funcion*/







    function load_POST(){
                
        if ( $this->sessionclass->is_logged_in() == 1) {  
            
                
                $evento =  $this->post("evento_escenario");
                $idempresa =  $this->sessionclass->getidempresa();            


                $responsedbescenario = $this->escenariomodel->loadbyevent( $evento ,  $idempresa  );

                $this->response(listescenariosonloadevent($responsedbescenario));


                                

                
        }else{
            $this->sessionclass->logout();
        
        }    

    }/*Termina la funcion*/





    /*Termina rest*/

}
?>
