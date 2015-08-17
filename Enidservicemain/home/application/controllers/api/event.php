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
    function update_status_post(){
       
        $this->validate_user_sesssion();            
        $id_usuario = $this->sessionclass->getidusuario();            
        $id_evento = $this->post("evento");
        $nuevo_status = $this->post("nuevo_status");

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
    function update_objeto_permitido_post(){
        $idevento = $this->post("evento");
        $idobjeto =  $this->post("objetopermitido");
        $responsedb = $this->eventmodel->update_obj_permitidobyId($idevento, $idobjeto);
        $this->response($responsedb);
    }    
    /**/
    function objetospermitidos_get(){        
        $idevento = $this->get("evento");
        $this->response( listobjetosp($this->eventmodel->getObjetosPermitidos($idevento ) ));
    }    
    /*Update url social */
    function updateurlbyid_post(){

        $this->validate_user_sesssion();                        
        $idevento = $this->post("evento_social");
        $nueva_url_fb  = $this->post("url_social_evento");            
        $url_social_evento_youtube =  $this->post("url_social_evento_youtube");

        $this->response($this->eventmodel->updateurl($nueva_url_fb , $url_social_evento_youtube , $idevento ) );

    }/*Termina la función*/    
    function updateurlyoutubebyid_post(){        

        $this->validate_user_sesssion();           
        $nueva_url = $this->post("url_social_evento_youtube");            
        $idevento = $this->post("evento_social_y");
        $this->response($this->eventmodel->updateurlyout($nueva_url , $idevento ) );
    }
    /**/
    function updategeneros_post(){     
        $this->validate_user_sesssion();            
        $nuevos_generos = $this->post("generos");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updategeneros($nuevos_generos , $idevento ) );

    }
    /**/
    function updateubicacion_post(){
        $this->validate_user_sesssion();            
        $nueva_ubicacion = $this->post("ubicacion");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updateUbicacion($nueva_ubicacion , $idevento ) );

    }   
    /**/
    function updatenombre_post(){
        $this->validate_user_sesssion();            
        $nuevo_nombre = $this->post("nombre");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updateNombre( validate_text($nuevo_nombre)  , $idevento ) );
    }    
    /**/
    function updateedicion_post(){
        $this->validate_user_sesssion();            
        $nuevo_edicion = $this->post("edicion");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updateEdicion( validate_text($nuevo_edicion) , $idevento ) );
    }    
    /**/
    function updatedescripcion_post(){

        $this->validate_user_sesssion();            
        $nueva_descripcion = $this->post("descripcion_evento");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updateDescripcion( validate_text( $nueva_descripcion)  , $idevento ) );

    }    
    /*updatepoliticas********+updatepoliticasupdatepoliticasupdatepoliticasupdatepoliticasupdatepolit*/
    function updatepoliticas_post(){
        $this->validate_user_sesssion();            
        $nueva_politica = $this->post("politicas_evento");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updatePoliticas( validate_text($nueva_politica) , $idevento ) );

    }    
    /**Load temántica *Load temántica *Load temántica *Load temántica *Load temántica *Load temántica **/
    function loadtematicabyid_get(){
        $idevento = $this->get("id_evento_tematica");
        $idempresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->getTematicaByid($idevento , $idempresa));
    }
    /*End tematica load End tematica load End tematica load End tematica load End tematica load */
    function update_tematica_by_id_post(){
        
        $this->validate_user_sesssion();            
        $idevento = $this->post("id_evento_tematica");
        $tematica_select = $this->post("tematica_select");
        $idempresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->update_tematicaby_id( $idevento , $tematica_select, $idempresa ));    
    }
    /*****************Permitido *Permitido *Permitido *Permitido *Permitido *Permitido *****/
    function updatepermitido_post(){

        $this->validate_user_sesssion();            
        $nuevo_permitido = $this->post("permitido_evento");
        $idevento = $this->post("evento");
        $this->response($this->eventmodel->updatePermitido( validate_text($nuevo_permitido)  , $idevento ) );
    }    
    /*restricciones **restricciones **restricciones **restricciones **restricciones ***/
    function updaterestricciones_post(){
        $this->validate_user_sesssion();            
        $nueva_restriccion = $this->post("restricciones_evento");
        $idevento = $this->post("evento");
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
    function update_eslogan_post(){

        $this->validate_user_sesssion();                    
        $id_evento= $this->post("evento");
        $eslogan = $this->post("eslogan");
        $this->response($this->eventmodel->update_eslogan($id_evento , validate_text($eslogan)) );
             

    }/*Termina rest*/
    /*Actualiza la fecha del evento */
    function update_date_by_id_post(){
        $this->validate_user_sesssion();          
        
        $id_evento = $this->post("evento");                           
        $nuevo_inicio = $this->post("nuevo_inicio");
        $nuevo_termino = $this->post("nuevo_termino");
        $this->response($this->eventmodel->update_date($id_evento , $nuevo_inicio , $nuevo_termino ));
    }
    function objetos_permitidos_all_update_get(){
            
        $this->validate_user_sesssion();                                
        $id_evento= $this->get("evento");                
        $this->response($this->eventmodel->update_all_in_event_obj_inter($id_evento) );        
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

