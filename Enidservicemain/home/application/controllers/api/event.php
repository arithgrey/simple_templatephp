<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Event extends REST_Controller{
      
    function __construct(){
            parent::__construct();
                             
            $this->load->model("eventmodel");                
            $this->load->helper("eventosh");               
            $this->load->library('sessionclass');                    
    }     
    /**/
    function update_status_put(){
       
        $this->validate_user_sesssion();            
        $id_usuario = $this->sessionclass->getidusuario();            
        $id_evento = $this->put("evento");
        $nuevo_status = $this->put("nuevo_status");

        $responsedb = $this->eventmodel->update_status_by_id( $id_evento , $nuevo_status ,  $id_usuario );
        $this->response($responsedb);
        
    }       
    /*Elimina*/
    function delete_byid_post(){
        $this->validate_user_sesssion();            
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();            
        $id_evento = $this->post("evento");

        $responsedb = $this->eventmodel->delete_byid($id_evento , $id_usuario , $id_empresa );
        $this->response($responsedb);
    }    

    /*update objetos permitidos del evento */
    function objeto_permitido_put(){
        $idevento = $this->put("evento");
        $idobjeto =  $this->put("objetopermitido");
        $responsedb = $this->eventmodel->update_obj_permitidobyId($idevento, $idobjeto);
        $this->response($responsedb);
    }    
    /**/
    function objetospermitidos_get(){  
        
        $this->validate_user_sesssion();         
        $id_evento = $this->get("evento");
        $id_empresa =  $this->sessionclass->getidempresa();            
        $this->response( listobjetosp($this->eventmodel->getObjetosPermitidos( $id_evento , $id_empresa  ) ));
    }    
    /*Update url social */
    function urlbyid_put(){

        $this->validate_user_sesssion();                        
        $idevento = $this->put("evento_social");
        $nueva_url_fb  = $this->put("url_social_evento");            
        $url_social_evento_youtube =  $this->put("url_social_evento_youtube");

        $this->response($this->eventmodel->updateurl($nueva_url_fb , $url_social_evento_youtube , $idevento ) );

    }/*Termina la función*/    
    function updateurlyoutubebyid_put(){        

        $this->validate_user_sesssion();           
        $nueva_url = $this->put("url_social_evento_youtube");            
        $idevento = $this->put("evento_social_y");
        $this->response($this->eventmodel->updateurlyout($nueva_url , $idevento ) );
    }
    /**/
    function genero_put(){     
        $this->validate_user_sesssion();            
        $nuevos_generos = $this->put("generos");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updategeneros($nuevos_generos , $idevento ) );

    }
    /**/
    function ubicacion_put(){
        $this->validate_user_sesssion();            
        $nueva_ubicacion = $this->put("ubicacion");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updateUbicacion($nueva_ubicacion , $idevento ) );

    }   
    /**/
    function nombre_put(){
        $this->validate_user_sesssion();            
        $nuevo_nombre = $this->put("nombre");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updateNombre( validate_text($nuevo_nombre)  , $idevento ) );
    }    
    /**/
    function edicion_put(){
        $this->validate_user_sesssion();            
        $nuevo_edicion = $this->put("edicion");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updateEdicion( validate_text($nuevo_edicion) , $idevento ) );
    }    
    /**/
    function descripcion_put(){

        $this->validate_user_sesssion();            
        $nueva_descripcion = $this->put("descripcion_evento");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updateDescripcion( validate_text( $nueva_descripcion)  , $idevento ) );

    }   
    /**/ 
    function descripcion_template_put(){
        $this->validate_user_sesssion();            
        $id_contenido  = $this->put("template_content");
        $id_evento = $this->put("evento");
        $response_up= $this->eventmodel->update_descripcion_by_content($id_contenido , $id_evento );
        $this->response($response_up);
    }
    /*updatepoliticas********+updatepoliticasupdatepoliticasupdatepoliticasupdatepoliticasupdatepolit*/
    function politicas_put(){
        $this->validate_user_sesssion();            
        $nueva_politica = $this->put("politicas_evento");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updatePoliticas( validate_text($nueva_politica) , $idevento ) );

    }    
    /**Load temántica *Load temántica *Load temántica *Load temántica *Load temántica *Load temántica **/
    function loadtematicabyid_get(){
        $idevento = $this->get("id_evento_tematica");
        $idempresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->getTematicaByid($idevento , $idempresa));
    }
    /*End tematica load End tematica load End tematica load End tematica load End tematica load */
    function tematica_by_id_put(){
        
        $this->validate_user_sesssion();            
        $idevento = $this->put("id_evento_tematica");
        $tematica_select = $this->put("tematica_select");
        $idempresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->update_tematicaby_id( $idevento , $tematica_select, $idempresa ));    
    }
    /*****************Permitido *Permitido *Permitido *Permitido *Permitido *Permitido *****/
    function permitido_put(){

        $this->validate_user_sesssion();            
        $nuevo_permitido = $this->put("permitido_evento");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updatePermitido( validate_text($nuevo_permitido)  , $idevento ) );
    }    
    /*restricciones **restricciones **restricciones **restricciones **restricciones ***/
    function restricciones_put(){
        $this->validate_user_sesssion();            
        $nueva_restriccion = $this->put("restricciones_evento");
        $idevento = $this->put("evento");
        $this->response($this->eventmodel->updateRestricciones( validate_text( $nueva_restriccion )  , $idevento ) );
    }   
    /************************Dinamic select From event *****************************************************/    
    function get_event_texts_get(){

        $id_evento = $this->get("evento");
        $campo = $this->get("text");
        $null_msj = $this->get("null_msj");
        $sin_text_msj = $this->get("sin_text_msj");

        $response_db = $this->eventmodel->get_event_text_by_id($id_evento , $campo );
        
        $this->response( valida_text_replace( $response_db[0][$campo] , $null_msj , $sin_text_msj  ) );
    }       
    /**/
    function get_event_by_id_get(){

        $idevento = $this->get("evento");
        $this->response($this->eventmodel->getEventbyid($idevento));
    }
    /**/        
    function nuevo_evento_POST(){                        
        /*Capturamos datos*/
        $this->validate_user_sesssion();            
        $generic_response = ["Nombre muy corto para el evento" , "Registre fecha"];        

        $nombre  = $this->post("nuevo_evento");
        $edicion = $this->post("nueva_edicion");
        $inicio = $this->post("nuevo_inicio");
        $termino = $this->post("nuevo_termino");
        $idusuario = $this->sessionclass->getidusuario();    
        $idempresa =  $this->sessionclass->getidempresa();
        $perfiles  =  $this->sessionclass->getperfiles();
        $data[0]= false;
                        
        if (validatenotnullnotspace($nombre)) {
           if (validatenotnullnotspace($inicio) ==  true && validatenotnullnotspace($termino)) {                                
                $dbresponse = $this->eventmodel->create(  $nombre , $edicion , $inicio , $termino , $idusuario , $idempresa,  $perfiles  );                                    
                    if (is_numeric($dbresponse)) {

                            $data[0]= true;
                            $extra = $this->create_directorio($dbresponse); 
                            $data[1]= base_url('index.php/eventos/nuevo/'.$dbresponse);                                        
                            $this->response($data); 
                        }else{
                            $this->response($generic_response[0]);             
                            } 
                                    
                        }else{
                            $this->response($generic_response[1]);
                        }
                    
                    }else{
                    $this->response($generic_response[0]);
                }
    }

    /****************************** ******************************* **************************/
    function create_directorio($id_event){
        
            $this->validate_user_sesssion();            
            $storeFolder = 'uploads';           
            $directorio = dirname(dirname( __FILE__ )). "/". $storeFolder."/".$storeFolder."/".$id_event."/";            
            return $directorio;
    }
    /**/
    function eslogan_put(){

        $this->validate_user_sesssion();                    
        $id_evento= $this->put("evento");
        $eslogan = $this->put("eslogan");
        $this->response($this->eventmodel->update_eslogan($id_evento , validate_text($eslogan)) );
             

    }/*Termina rest*/
    /*Actualiza la fecha del evento */
    function date_by_id_put(){
        $this->validate_user_sesssion();          
        
        $id_evento = $this->put("evento");                           
        $nuevo_inicio = $this->put("nuevo_inicio");
        $nuevo_termino = $this->put("nuevo_termino");
        $this->response($this->eventmodel->update_date($id_evento , $nuevo_inicio , $nuevo_termino ));
    }
    function all_objetos_permitidos_put(){
            
        $this->validate_user_sesssion();   
        $idempresa =  $this->sessionclass->getidempresa();
        $id_evento= $this->put("evento");                
        $this->response($this->eventmodel->update_all_in_event_obj_inter($id_evento , $idempresa ) );        
    }
    /*Validar session para modificar datos*/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                        /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }/*termina validar session */

}/*Termina el controlador rest */
?>