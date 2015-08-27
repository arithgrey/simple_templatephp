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
    /**/
    function nuevo_POST(){

        $this->validate_user_sesssion();
        $evento =  $this->post("evento_escenario");
        $nombre= $this->post("nuevoescenario");    
        $idempresa =  $this->sessionclass->getidempresa();
        $this->response($this->escenariomodel->nuevo( validate_text($nombre)  , $evento ,  $idempresa  )  );

    }
    /**/
    function load_POST(){

        $this->validate_user_sesssion();        
        $id_evento =  $this->post("evento_escenario");
        $id_empresa =  $this->sessionclass->getidempresa();            
        $response_db_escenario = $this->escenariomodel->load_by_event( $id_evento ,  $id_empresa  );
        $this->response(list_escenarios_on_loadevent($response_db_escenario));

    }
    /**/
    function updatedescripcionescenario_post(){
        
        $this->validate_user_sesssion();
        $nueva_descripcion =$this->post("nuevadescripcion");
        $evento =  $this->post("evento_escenario");
        $idescenario =  $this->post("idescenario");
        $idempresa =  $this->sessionclass->getidempresa();                    
        $this->response($this->escenariomodel->updatedescripcion( validate_text($nueva_descripcion ),
                 $evento , $idescenario,  $idempresa ) );
                
    }
    /*Termina la función*/
    function updatedescripcionescenariobyid_post(){
        
        $this->validate_user_sesssion();                        
        $nueva_descripcion =$this->post("nuevadescripcion");                
        $idescenario =  $this->post("idescenario");
        $idempresa =  $this->sessionclass->getidempresa();              
        $this->response($this->escenariomodel->updatedescripcionbyid(  validate_text($nueva_descripcion) , 
                    $idescenario,  $idempresa ) );
                
    }
    /***/
    function deleteescenario_post(){
        $this->validate_user_sesssion();
        $idescenario =  $this->post("idescenario");
        $idempresa =  $this->sessionclass->getidempresa();            
        $this->response($this->escenariomodel->deleteescenariobyid( $idescenario,  $idempresa ) );
    }
    /**/
    function loadescenariobyid_get(){
        
        $idescenario =  $this->get("idescenario");
        $idempresa =  $this->sessionclass->getidempresa();                            
        $info =  $this->escenariomodel->load_escenario_byid( $idescenario,  $idempresa );
        $this->response( infoescenario($info)  ); 
            
    }
    /**/
    function registraartistaescenario_post(){
        
        $this->validate_user_sesssion();
        $idescenario =  $this->post("idescenario");
        $nuevoartista =  $this->post("nuevoartista");
        $idempresa =  $this->sessionclass->getidempresa();                                        
        $responsedb = $this->escenarioartistamodel->registraartistaescenario($idescenario , validate_text($nuevoartista)  , $idempresa);
        $this->response($responsedb);                 
    }
    /*****************************************************************************************/
    function deleteartistaescenario_post(){    

        $this->validate_user_sesssion();
        $idescenario =  $this->post("idescenario");
        $artista_quitar =  $this->post("artista_quitar");
        $idempresa =  $this->sessionclass->getidempresa();                                        
        $responsedb = $this->escenarioartistamodel->deleteescenarioartosta($idescenario , $artista_quitar , $idempresa);
        $this->response($responsedb);         
    }/*Termina la función*/
    /**/
    function updatenombreescenariobyid_post(){

        $this->validate_user_sesssion();
        $idescenario =  $this->post("idescenario");
        $nuevonombre =  $this->post("nuevonombre");
        $idempresa =  $this->sessionclass->getidempresa();                                
        $responsedb = $this->escenariomodel->updateescenarionombrebyid($idescenario , validate_text($nuevonombre), $idempresa);
        $this->response($responsedb);                 
    }
    /*************************************************************************************/
    function updateinicioterminobyid_post(){
        
        $this->validate_user_sesssion();    
        $idescenario =  $this->post("idescenario");
        $nuevoinicio =  $this->post("nuevoinicio");
        $nuevotermino = $this->post("nuevotermino");                
        $idempresa =  $this->sessionclass->getidempresa();                                            
        $responsedb = $this->escenariomodel->updateescenarioinicioterminobyid($idescenario , $idempresa , $nuevoinicio , $nuevotermino);
        $this->response($responsedb);         
    }
    /*********************************************************/
    function updateescenariotipo_post(){
        
        $this->validate_user_sesssion();
        $idescenario =  $this->post("idescenario");
        $tipoescenario =  $this->post("tipoescenario");
        $idempresa =  $this->sessionclass->getidempresa();                                            
        $responsedb = $this->escenariomodel->updateescenariotipobyid($idescenario , $tipoescenario , $idempresa);
        $this->response($responsedb);                     
    }
    /**************************************************************************/
    function updateinicioterminoartistabyid_post(){

        $this->validate_user_sesssion();
        $idartista = $this->post("idartista");
        $idescenario =  $this->post("idescenario");
        $hiartista = $this->post("hiartista");
        $htartista = $this->post("htartista");
        $idempresa =  $this->sessionclass->getidempresa();                                            
        $responsedb = $this->escenarioartistamodel->updateinicioterminoartistabyid($idartista , $idescenario  , $hiartista  , $htartista , $idempresa);
        $this->response($responsedb);                 
    }/*Termina*/
    /**/
    function escenario_evento_get(){

        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");
        $db_response = $this->escenariomodel->get_escenarios_evento($id_evento);
        $this->response($db_response);
    }


    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {}else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */


}
?>
