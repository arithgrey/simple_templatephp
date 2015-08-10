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

        if ( $this->sessionclass->is_logged_in() == 1) {  
                

                $id_evento = $this->post("evento");                        
                $serviciodb = $this->servicioseventmodel->update_all_in_event($id_evento);
                $this->response($serviciodb);
              
                
        }else{

            $this->sessionclass->logout();        
        } 



    }

    function load_get(){
        if ( $this->sessionclass->is_logged_in() == 1) {  

                $idempresa =  $this->sessionclass->getidempresa();                    
                $evento = $this->get("evento");                        



                
                $serviciodb = $this->servicioseventmodel->getserviciosevento( $evento , $idempresa );



                $this->response(serviciosevent($serviciodb ));
              
                
        }else{

            $this->sessionclass->logout();        
        } 


    }/*Termina*/



     


     function update_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  

                $idempresa =  $this->sessionclass->getidempresa();                    
                $evento = $this->post("evento");                        
                $idservicio =  $this->post("idservicio");


                
                $serviciodb = $this->servicioseventmodel->update( $evento , $idservicio ,  $idempresa );


                $this->response($serviciodb);
                
                
        }else{

            $this->sessionclass->logout();        
        } 



     }

   
                








}
?>
