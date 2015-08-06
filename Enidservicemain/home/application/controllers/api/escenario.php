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

                $this->response($this->escenariomodel->nuevo( validate_text($nombre)  , $evento ,  $idempresa  )  );


                                

                
        }else{
            $this->sessionclass->logout();
        
        }    

    }/*Termina la funcion*/







    function load_POST(){
                
        if ( $this->sessionclass->is_logged_in() == 1) {  
            
                
                $id_evento =  $this->post("evento_escenario");
                $id_empresa =  $this->sessionclass->getidempresa();            
                $response_db_escenario = $this->escenariomodel->load_by_event( $id_evento ,  $id_empresa  );
                $this->response(list_escenarios_on_loadevent($response_db_escenario));


                                

                
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


                
                $this->response($this->escenariomodel->updatedescripcion( validate_text($nueva_descripcion ),
                 $evento , $idescenario,  $idempresa ) );
                

        }else{

            $this->sessionclass->logout();        
        }    


    }/*Termina la función*/































function updatedescripcionescenariobyid_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  
            
                
                
                $nueva_descripcion =$this->post("nuevadescripcion");                
                $idescenario =  $this->post("idescenario");
                $idempresa =  $this->sessionclass->getidempresa();            


                  
                $this->response($this->escenariomodel->updatedescripcionbyid(  validate_text($nueva_descripcion) , 
                    $idescenario,  $idempresa ) );
                

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

                $info =  $this->escenariomodel->load_escenario_byid( $idescenario,  $idempresa );
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
                

                $responsedb = $this->escenarioartistamodel->registraartistaescenario($idescenario , validate_text($nuevoartista)  , $idempresa);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 
    }





    /*****************************************************************************************/


    function deleteartistaescenario_post(){
        
        if ( $this->sessionclass->is_logged_in() == 1) {  




                $idescenario =  $this->post("idescenario");
                $artista_quitar =  $this->post("artista_quitar");

                $idempresa =  $this->sessionclass->getidempresa();                            
                

                $responsedb = $this->escenarioartistamodel->deleteescenarioartosta($idescenario , $artista_quitar , $idempresa);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 

    }/*Termina la función*/
    



    function updatenombreescenariobyid_post(){


        if ( $this->sessionclass->is_logged_in() == 1) {  




                $idescenario =  $this->post("idescenario");
                $nuevonombre =  $this->post("nuevonombre");
                $idempresa =  $this->sessionclass->getidempresa();                            
                

                $responsedb = $this->escenariomodel->updateescenarionombrebyid($idescenario , validate_text($nuevonombre), $idempresa);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 
    }

/*************************************************************************************/

    function updateinicioterminobyid_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  




                $idescenario =  $this->post("idescenario");
                $nuevoinicio =  $this->post("nuevoinicio");
                $nuevotermino = $this->post("nuevotermino");                
                $idempresa =  $this->sessionclass->getidempresa();                            
                

                $responsedb = $this->escenariomodel->updateescenarioinicioterminobyid($idescenario , $idempresa , $nuevoinicio , $nuevotermino);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 

    }


    /*********************************************************/


    function updateescenariotipo_post(){

        if ( $this->sessionclass->is_logged_in() == 1) {  




                $idescenario =  $this->post("idescenario");
                $tipoescenario =  $this->post("tipoescenario");

                $idempresa =  $this->sessionclass->getidempresa();                            
                

                $responsedb = $this->escenariomodel->updateescenariotipobyid($idescenario , $tipoescenario , $idempresa);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 

    }

/**************************************************************************/

    function updateinicioterminoartistabyid_post(){
        if ( $this->sessionclass->is_logged_in() == 1) {  



                 
                
                $idartista = $this->post("idartista");
                $idescenario =  $this->post("idescenario");
                $hiartista = $this->post("hiartista");
                $htartista = $this->post("htartista");
                $idempresa =  $this->sessionclass->getidempresa();                            
                

                $responsedb = $this->escenarioartistamodel->updateinicioterminoartistabyid($idartista , $idescenario  , $hiartista  , $htartista , $idempresa);

                $this->response($responsedb); 
                
        }else{

            $this->sessionclass->logout();        
        } 


    }/*Termina*/





}
?>
