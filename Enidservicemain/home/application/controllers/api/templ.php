<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Templ extends REST_Controller{

    function __construct(){
            parent::__construct();
            $this->load->model("templmodel");
            $this->load->library('sessionclass');
            
    }   
    /*Registra nuevo template id usuario */  
    function registra_templ_usuario_post(){
        $this->validate_user_sesssion();

        /*De la plantilla */
        $iduser  = $this->sessionclass->getidusuario();    
        $nombre_tmpl = $this->post("nombre_tmpl");
        $tipo_templ = $this->post("tipo_templ");

        /*De su contenido*/        
        $titulo_contenido_tmpl = $this->post("titulo_contenido_tmpl");
        $descripcion_templ = $this->post("descripcion_contenid_templ");
        

        $db_response = $this->templmodel->record_template_contenido($iduser ,  $nombre_tmpl  , $tipo_templ, $titulo_contenido_tmpl , $descripcion_templ ) ;
        $this->response($db_response);

    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        
                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
}
?>
