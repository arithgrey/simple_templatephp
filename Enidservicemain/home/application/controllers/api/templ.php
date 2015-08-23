<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Templ extends REST_Controller{

    function __construct(){
            parent::__construct();
            $this->load->helper("plantillas");
            
            $this->load->model("templmodel");
            $this->load->library('sessionclass');
            
    }   

    


    function templates_descripcion_evento_post(){
        $this->validate_user_sesssion();
        /*De la plantilla */
        

        $iduser  = $this->sessionclass->getidusuario();            
        $tipo_templ = $this->post("tipo_templ");        
        $titulo_contenido_tmpl = $this->post("titulo_contenido_tmpl");
        $descripcion_templ = $this->post("descripcion_contenid_templ");
        $db_response = $this->templmodel->record_template_contenido($iduser , $tipo_templ, $titulo_contenido_tmpl , $descripcion_templ );
        $this->response($db_response);
    }





    /**/
    function templates_contenidos_get(){
        $this->validate_user_sesssion();       
        
        $tipo_templ = $this->get("tipo");
        $id_user  = $this->sessionclass->getidusuario();        
        $plantillas_descripcion = $this->templmodel->get_templates_contenido_user_type($id_user, $tipo_templ );
        $this->response(display_contenido_templ($plantillas_descripcion, 1 ));
    }
    /*get contenidos por plantilla */
    function templates_restriccion_get(){

        $this->validate_user_sesssion();       
        $id_user = $this->sessionclass->getidusuario();
        $plantillas_restriccion = $this->templmodel->get_templ_restricciones($id_user);

        $this->response(display_record_list($plantillas_restriccion));

    }

    /**/
    function templates_restriccion_post(){
        $this->validate_user_sesssion();
        /*De la plantilla */
        $iduser  = $this->sessionclass->getidusuario();            
        $descripcion_templ_restriccion = $this->post("restriccion_text");    
        $db_response = $this->templmodel->record_template_restriccion($iduser , $descripcion_templ_restriccion , 3 );
        $this->response($db_response);
    }
    /*Registra nuevo template id usuario */  
    
    /*Elimina contenidos por su id y el usuario*/
    function plantillarestriccion_delete(){


        $this->validate_user_sesssion();       
        $id_user= $this->sessionclass->getidusuario();
        $id_restriccion = $this->delete("restriccion");
        $status_delete = $this->templmodel->delete_plantilla_restriccion($id_restriccion);

        $this->response($status_delete);
        
    }
    function retriccion_evento_post(){
         
        $this->validate_user_sesssion();       
        $id_evento = $this->post("evento");
        $id_restriccion = $this->post("restriccion");
        $response_db = $this->templmodel->record_restriccion_evento($id_evento , $id_restriccion);
        $this->response($response_db);
    }
    /*Cuando queremos borran*/
    function retriccion_evento_delete(){

        $this->validate_user_sesssion();       
        $id_evento = $this->delete("evento");
        $id_restriccion = $this->delete("restriccion");
        $response_db = $this->templmodel->delete_restriccion_evento($id_evento , $id_restriccion);
        $this->response($response_db);
    }       
    /**/
    function retriccion_evento_get(){

        $this->validate_user_sesssion();       
        $id_evento = $this->get("evento");
        $response_db = $this->templmodel->get_restriciones($id_evento);
        $this->response( display_record_list($response_db) );
    }

    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        
                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
    
}
?>
