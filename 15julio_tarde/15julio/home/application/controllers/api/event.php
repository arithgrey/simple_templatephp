<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Event extends REST_Controller{
    function __construct(){
            parent::__construct();
            $this->load->model("eventos_model_cliente");                             
            $this->load->model("eventmodel");                
            $this->load->helper("eventosh");               
            $this->load->helper("generoshelp");
            $this->load->library('sessionclass');                    
    }   

    function imagenes_GET(){            
        $id_evento = $this->get("id_evento");     
        $data["imagenes_portada"] = $this->eventmodel->get_img_evento($id_evento);
        $data["param"] =  $this->get();
        echo  $this->load->view("eventos/slider" , $data );
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
        $id_evento = $this->put("evento");
        $id_objeto =  $this->put("objetopermitido");
        $responsedb = $this->eventmodel->update_obj_permitidobyId($id_evento, $id_objeto);
        $this->response($responsedb);
    }    
    /**/
    function objetospermitidos_get(){  

        $this->validate_user_sesssion();         
        $id_evento = $this->get("evento");
        $id_empresa =  $this->sessionclass->getidempresa();                    
        $obj =  $this->eventmodel->getObjetosPermitidos( $id_evento , $id_empresa  ); 
        $this->response( listobjetosp( $obj  , $id_evento ));
        
    }    
    /*Update url social */
    function urlbyid_put(){

        $this->validate_user_sesssion();                        
        $id_evento = $this->put("evento");
        $nueva_url_fb  = $this->put("url_social_evento");            
        $url_social_evento_youtube =  $this->put("url_social_evento_youtube");
        $db_response =  $this->eventmodel->updateurl($nueva_url_fb , $url_social_evento_youtube , $id_evento ); 
        $this->response($db_response);

    }/*Termina la función*/    
    function updateurlyoutubebyid_put(){        

        $this->validate_user_sesssion();           
        $nueva_url = $this->put("url_social_evento_youtube");            
        $id_evento = $this->put("evento_social_y");
        $this->response($this->eventmodel->updateurlyout($nueva_url , $id_evento ) );
    }
    /**/
    function servicios_GET(){

        $id_evento =  $this->get("evento");
        $this->response($this->eventmodel->get_servicios_evento_by_id($id_evento));
    }
    /**/
    function generos_musicales_complete_GET(){  

       $id_evento  =  $this->get("evento");            
       $db_response =  $this->eventmodel->get_list_generos_musicales_byidev($id_evento);
       $this->response(load_complete_genero($db_response));
    }
    /**/
    function generos_musicales_GET(){       
       $id_evento  =  $this->get("evento");     
       $this->response($this->eventmodel->get_list_generos_musicales_byidev($id_evento));
       
    }
    /**/
    function genero_put(){     
        $this->validate_user_sesssion();            
        $nuevos_generos = $this->put("generos");
        $id_evento = $this->put("evento");        
        $this->response($this->eventmodel->updategeneros($nuevos_generos , $id_evento ) );

    }
    function genero_delete(){
        $param =  $this->delete();
        $db_response =  $this->eventmodel->delete_genero($param); 
        $this->response($db_response);
    }
    /**/
    function genero_get(){
        $this->validate_user_sesssion(); 
        $id_empresa =  $this->sessionclass->getidempresa();
        $id_evento =  $this->get("evento");               
        $genero_filtro = $this->get("filtro");        
        
        //$response_db = $this->eventmodel->get_generos($id_empresa , $id_evento , $genero_filtro);                                            
        //$this->response(list_generos_musicales($response_db));
        $data["generos"]  =  $this->eventmodel->get_generos($id_empresa , $id_evento , $genero_filtro);                                            
        echo $this->load->view("eventos/list_generos" , $data);
    }
    /**/
    function genero_evento_GET(){

        $param = $this->get();     
        $db_response= $this->eventmodel->get_generos_evento($param);
        $this->response(registrados_config($db_response));
        
    }
    /**/
    function ubicacion_put(){
        $this->validate_user_sesssion();            
        $nueva_ubicacion = $this->put("ubicacion");
        $id_evento = $this->put("evento");
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->updateUbicacion($nueva_ubicacion , $id_evento , $id_usuario , $id_empresa )  );

    }   
    /**/
    function nombre_put(){
        
        $this->validate_user_sesssion();            
        $nuevo_nombre = $this->put("nombre");
        $id_evento = $this->put("evento"); 
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->updateNombre( validate_text($nuevo_nombre)  , $id_evento , $id_usuario , $id_empresa ) );
    }    
    /**/
    function edicion_put(){
        $this->validate_user_sesssion();            
        $nuevo_edicion = $this->put("edicion");        
        $id_evento = $this->put("evento");
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();        

        $db_response =  $this->eventmodel->updateEdicion( $nuevo_edicion , $id_evento  , $id_usuario , $id_empresa );
        $this->response($db_response );
    }    
    /**/
    function descripcion_put(){

        $this->validate_user_sesssion();            
        $nueva_descripcion = $this->put("descripcion_evento");
        $id_evento = $this->put("evento");
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();        
        $this->response($this->eventmodel->updateDescripcion( $nueva_descripcion , $id_evento  , $id_usuario , $id_empresa ) );
    }   
    /**/ 
    function descripcion_template_put(){
        $this->validate_user_sesssion();            
        $id_contenido  = $this->put("template_content");
        $id_evento = $this->put("evento");
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();        
        $response_up= $this->eventmodel->update_descripcion_by_content($id_contenido , $id_evento  ,  $id_usuario ,  $id_empresa );        
        $this->response($response_up);
    }
    /*updatepoliticas********+updatepoliticasupdatepoliticasupdatepoliticasupdatepoliticasupdatepolit*/
    function politicas_put(){
        $this->validate_user_sesssion();            
        $nueva_politica = $this->put("politicas_evento");
        $id_evento = $this->put("evento");
        $this->response($this->eventmodel->updatePoliticas( validate_text($nueva_politica) , $id_evento ) );

    }    
    /**Load temántica *Load temántica *Load temántica *Load temántica *Load temántica *Load temántica **/
    function tematica_get(){
        $id_evento = $this->get("evento");
        $id_empresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->getTematicaByid($id_evento , $id_empresa));
    }
    /*End tematica load End tematica load End tematica load End tematica load End tematica load */
    function tematica_put(){
        
        $this->validate_user_sesssion();            
        $id_evento = $this->put("evento");
        $tematica_select = $this->put("tematica_select");
        $id_empresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->update_tematicaby_id( $id_evento , $tematica_select, $id_empresa ));    
    }
    /*****************Permitido *Permitido *Permitido *Permitido *Permitido *Permitido *****/
    function permitido_put(){

        $this->validate_user_sesssion();            
        $nuevo_permitido = $this->put("permitido_evento");
        $id_evento = $this->put("evento");
        $this->response($this->eventmodel->updatePermitido( validate_text($nuevo_permitido)  , $id_evento ) );
    }    
    /*restricciones **restricciones **restricciones **restricciones **restricciones ***/
    function restricciones_put(){
        $this->validate_user_sesssion();            
        $nueva_restriccion = $this->put("restricciones_evento");
        $id_evento = $this->put("evento");
        $this->response($this->eventmodel->updateRestricciones( validate_text( $nueva_restriccion )  , $id_evento ) );
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

        $id_evento = $this->get("evento");
        $this->response($this->eventmodel->getEventbyid($id_evento));
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
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();
        $perfiles  =  $this->sessionclass->getperfiles();
        $data[0]= false;
                        
        if (validatenotnullnotspace($nombre)) {
           if (validatenotnullnotspace($inicio) ==  true && validatenotnullnotspace($termino)) {                                
                $dbresponse = $this->eventmodel->create(  $nombre , $edicion , $inicio , $termino , $id_usuario , $id_empresa,  $perfiles  );                                    
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
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();
        $this->response($this->eventmodel->update_eslogan($id_evento , validate_text($eslogan)  , $id_usuario , $id_empresa  ) );            
    }/*Termina*/
    function tipificacion_put(){
        $this->validate_user_sesssion();                    
        $id_evento= $this->put("evento");
        $tipo_evento =  $this->put("tipificacion_evento");
        $this->response($this->eventmodel->update_tipo_evento($id_evento , $tipo_evento ));
        
    }
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
        $id_empresa =  $this->sessionclass->getidempresa();
        $id_evento= $this->put("evento");                
        $this->response($this->eventmodel->update_all_in_event_obj_inter($id_evento , $id_empresa ) );        
    }
    /*Validar session para modificar datos*/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                        /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }/*termina validar session */
    function evento_DELETE(){

        $this->validate_user_sesssion();            
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();            
        $id_evento = $this->delete("evento");
        $responsedb = $this->eventmodel->delete_byid($id_evento , $id_usuario , $id_empresa );
        $this->response($responsedb);
    }
    /**/
    function form_evento_GET(){        
        $data["id_evento"] =  $this->get("evento");
        echo $this->load->view("imgs/evento_portada" , $data );
    }
    /**/
    function resumen_extra_GET(){

        $param =  $this->get();
        $data["param"] = $param;
        $data["resumen_artistas"] =  $this->eventmodel->get_resumen_artistas($param);
       // $data["resumen_acceso"] =  $this->eventmodel->get_resumen_accesos($param);
        echo $this->load->view("eventos/public/extra" , $data);
    }
    /**/
    function mapa_GET(){      
        /**/  
        $param =  $this->get();
        $data["param"] = $param;
        echo $this->load->view("eventos/public/mapa" , $data);
    }
    /**/
    function config_tipo_GET(){
        $param =  $this->get();
        $data["param"] = $param;
        echo $this->load->view("eventos/public/config_tipo_evento" , $data);   
    }
    function config_estatus_GET(){
        $param =  $this->get();
        $data["param"] = $param;
        echo $this->load->view("eventos/public/config_estado_evento" , $data);      
    }
    /**/
    function ficha_estatus_GET(){
        /*Tomamos catalogo de submotivos para la cancelación del evento */
        $param =  $this->get();
        $data["param"] = $param;
        $data["submotivos"] =  $this->eventmodel->get_submotivos();

        echo $this->load->view("eventos/public/ficha_estado" , $data);      
    }
    /**/
    function programacion_POST(){
        
        $this->validate_user_sesssion();                    
        $param =  $this->post();
        $param["id_usuario"] = $this->sessionclass->getidusuario();            
        $data["param"] = $param;
        $db_response =  $this->eventmodel->programa_evento($param); 
        $this->response($db_response);
    }
    /**/
    function cancelacion_PUT(){
        
        $param =    $this->put();
        $db_response =  $this->eventmodel->cancelar($param); 
        $this->response($db_response);
    }
    /**/
    function otros_GET(){
        $param =  $this->get();                                   
        $data["proximos_eventos"]=   $this->eventos_model_cliente->get_proximos($param);  

        echo $this->load->view("eventos/public/otros" , $data);
    }
    /**/
    function objetos_GET(){

        $id_evento =  $this->get("id_evento");        
        $data["objs"] = $this->eventmodel->get_obj_permitidos($id_evento);   
        $data["param"] =  $this->get();
        echo $this->load->view("servicios/permitidos" , $data);
        
    }



}/*Termina el controlador rest */
?>

