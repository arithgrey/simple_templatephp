<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Escenario extends REST_Controller{      
    function __construct(){
            parent::__construct();
    
            $this->load->helper("artistas");                    
            $this->load->helper("escenario");      
            $this->load->model("escenariomodel");
            $this->load->model("escenarioartistamodel");                
            $this->load->library('sessionclass');            
    }     

    function resumen_artistas_get(){

        $this->validate_user_sesssion();
        $id_escenario = $this->get("escenario");
        $data_escenario = $this->escenariomodel->get_escenariobyId($id_escenario);                 
        $nombre_evento =  $this->get("nombre_evento");
        $resumen_artistas = resumen_artistas_table($this->escenarioartistamodel->get_artistas_resumen($id_escenario, $data_escenario[0], $nombre_evento ));         
        $this->response($resumen_artistas); 

    }
    function artista_nombre_PUT(){

        $this->validate_user_sesssion();
        $responsedb   = $this->escenarioartistamodel->update_nombre_artista($this->put());
        $this->response($responsedb);
    
    }
    function escenario_artista_status_PUT(){
    
        $this->validate_user_sesssion();
        $responsedb   = $this->escenarioartistamodel->update_status($this->put());
        $this->response($responsedb);


    }


    function artista_escenario_GET(){

        $this->validate_user_sesssion();
        $responsedb   = $this->escenariomodel->get_artista_in_escenario($this->get() );
        $this->response($responsedb);

    }
    /*retorna el valor de un  campo del escenario*/
    function evento_escenario_campo_get(){
        $campo = $this->get("campo");
        $id_escenario = $this->get("escenario");
        $db_response = $this->escenariomodel->get_campo_escenario($campo , $id_escenario);

        $this->response($db_response[0][$campo]);


    }
    /**/
    function escenario_evento_POST(){

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
    function escenario_artista_social_post(){
      
        $this->validate_user_sesssion();
        $id_escenario =  $this->post("escenario");
        $id_artista =  $this->post("artista");
        $url = $this->post("url");
        $social = $this->post("social");
        $this->response($this->escenariomodel->record_url_artista($id_escenario , $id_artista , $url , $social ));

    }
    /**/
    function escenario_artista_post(){
        
        $this->validate_user_sesssion();
        $idescenario =  $this->post("idescenario");
        $nuevoartista =  $this->post("nuevoartista");
        $idempresa =  $this->sessionclass->getidempresa();                                        
        $responsedb = $this->escenarioartistamodel->registraartistaescenario($idescenario , validate_text($nuevoartista)  , $idempresa);
        $this->response($responsedb);                 
    }


    /**/
    function escenario_artista_get(){

        $id_escenario= $this->get("escenario");
        $db_response= $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $response = list_artistas_escenario($db_response, 'Artistas que se presentarán en este escenario' , 1 , $id_escenario);
        $this->response($response);
    }
    function escenario_artistas_get(){

        $id_escenario= $this->get("escenario");
        $db_response= $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $response = list_artistas_escenario($db_response, 'Artistas que se presentarán en este escenario' , 1 , $id_escenario);
        $this->response($response);
    }
    /*****************************************************************************************/
    function escenario_artista_delete(){    

        $this->validate_user_sesssion();
        $idescenario =  $this->delete("idescenario");
        $artista_quitar =  $this->delete("idartista");
        $idempresa =  $this->sessionclass->getidempresa();                                        
        $responsedb = $this->escenarioartistamodel->deleteescenarioartosta($idescenario , $artista_quitar , $idempresa);
        $this->response($responsedb);         
    }/*Termina la función*/

    /*actualiza el nombre del escenario */    
    function escenario_campo_put(){

        $this->validate_user_sesssion();
        $campo = $this->put("campo");
        $idescenario =  $this->put("escenario");
        $nuevonombre =  $this->put("nuevonombre");        
        $idempresa =  $this->sessionclass->getidempresa();                                
        $responsedb = $this->escenariomodel->update_campo($idescenario , validate_text($nuevonombre), $campo ,  $idempresa);
        $this->response($responsedb);                 
    }


    /***********************inicio y termino fecha para el escenario*************************************************************/
    function inicio_termino_put(){
        
        $this->validate_user_sesssion();    
        $id_escenario =  $this->put("escenario");
        $nuevo_inicio =  $this->put("nuevoinicio");
        $nuevo_termino = $this->put("nuevotermino");                
        $id_empresa =  $this->sessionclass->getidempresa();                                            
        $responsedb = $this->escenariomodel->updateescenarioinicioterminobyid($id_escenario , $id_empresa , $nuevo_inicio , $nuevo_termino);
        $this->response($responsedb);         
    }
    /**************************Actualiza el tipo de escenario *******************************/
    function escenario_tipo_put(){
        
        $this->validate_user_sesssion();
        $idescenario =  $this->put("idescenario");
        $tipoescenario =  $this->put("tipoescenario");
        $idempresa =  $this->sessionclass->getidempresa();                                            
        $responsedb = $this->escenariomodel->updateescenariotipobyid($idescenario , $tipoescenario , $idempresa);
        $this->response($responsedb);                     
    }
    /**************************************************************************/
    function inicioterminoartista_put(){

        $this->validate_user_sesssion();
        $idartista = $this->put("artista");
        $idescenario =  $this->put("escenario");
        $hiartista = $this->put("hiartista");
        $htartista = $this->put("htartista");
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