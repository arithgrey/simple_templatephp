<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Escenario extends REST_Controller{
      
    function __construct(){
            parent::__construct();
                
            $this->load->helper("escenario");      
            $this->load->model("escenariomodel");
            $this->load->model("escenarioartistamodel");                
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



    function updatedescripcionescenario_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  
            
                
                
                $nueva_descripcion =$this->post("nuevadescripcion");
                $evento =  $this->post("evento_escenario");
                $idescenario =  $this->post("idescenario");
                $idempresa =  $this->sessionclass->getidempresa();            


                
                $this->response($this->escenariomodel->updatedescripcion( $nueva_descripcion ,
                 $evento , $idescenario,  $idempresa ) );
                

        }else{

            $this->sessionclass->logout();        
        }    


    }/*Termina la función*/


/************************************************************************/

    function deleteescenario_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  
            
                
                $idescenario =  $this->post("idescenario");
                $idempresa =  $this->sessionclass->getidempresa();            


                $this->response($this->escenariomodel->deleteescenariobyid( $idescenario,  $idempresa ) );
                

        }else{

            $this->sessionclass->logout();        
        }    

    }

    /********************************/
    function loadescenariobyid_get(){
        if ( $this->sessionclass->is_logged_in() == 1) {  

                $idescenario =  $this->get("idescenario");
                $idempresa =  $this->sessionclass->getidempresa();                            
                $info =  $this->escenariomodel->loadescenariobyid( $idescenario,  $idempresa );



                $this->response( infoescenario($info)  ); 
                
        }else{

            $this->sessionclass->logout();        
        } 

    }/*Termina rest*/


/********************************************************/

    function registraartistaescenario_post(){
         
         if ( $this->sessionclass->is_logged_in() == 1) {  

                $idescenario =  $this->post("idescenario");
                $nuevoartista =  $this->post("nuevoartista");

                $idempresa =  $this->sessionclass->getidempresa();                            
                

                $responsedb = $this->escenarioartistamodel->registraartistaescenario($idescenario , $nuevoartista , $idempresa);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 
    }
    





}
?>
