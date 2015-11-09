<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Contactos extends REST_Controller{
  function __construct(){
        parent::__construct();
       
        $this->load->helper("contacto");    
        $this->load->model("contactmodel");
        $this->load->library('sessionclass');
            
  }     
  function contactos_resumen_GET(){
    
      $this->validate_user_sesssion();
      $id_usuario =  $this->sessionclass->getidusuario();
      $data_repo_contactos = $this->contactmodel->get_repo_contactos($id_usuario);        
      $this->response(resumen_contactos( $data_repo_contactos));              
  }      
  /**/
  function contacto_post(){
  
      $this->validate_user_sesssion();
      $nombre  =  $this->post("nombre");
      $organizacion  =  $this->post("organizacion");
      $telefono =  $this->post("telefono");
      $movil  = $this->post("movil");
      $correo =  $this->post("correo");
      $direccion = $this->post("direccion");
      $tipo =  $this->post("tipo");      
      $nota = $this->post("nota");
      $pagina_web = $this->post("pagina_web");
      $pagina_fb  = $this->post("pagina_fb");
      $pagina_tw  = $this->post("pagina_tw");

      $idusuario =  $this->sessionclass->getidusuario();
  
      $response_db = $this->contactmodel->record( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web ,
                     $pagina_fb  , $pagina_tw );      

      $this->response($response_db);

  }
  /*Retorna mis contactos*/
  function contacto_get(){

      $this->validate_user_sesssion();
      $idusuario =  $this->sessionclass->getidusuario();
      
      $response_db =  $this->contactmodel->get_contactos_user($idusuario, $this->get());
      $this->response( table_contac($response_db));  
  }

  /**/
  function contacto_id_GET(){

      $this->validate_user_sesssion();
      $idusuario =  $this->sessionclass->getidusuario();      
      $response_db =  $this->contactmodel->get_contactos_id($this->get());
      $this->response($response_db);   
      
  }
  /**/
  function contacto_put(){

      $this->validate_user_sesssion();
      $id_contacto= $this->put("idcontacto");
      $nombre  =  $this->put("nnombre");
      $organizacion  =  $this->put("norganizacion");
      $telefono =  $this->put("ntelefono");
      $movil  = $this->put("nmovil");
      $correo =  $this->put("ncorreo");
      $direccion = $this->put("ndireccion");
      $tipo =  $this->put("ntipo");      
      $nota = $this->put("nnota");
      $pagina_web = $this->put("npagina_web");
      $pagina_fb = $this->put("npagina_fb");
      $pagina_tw = $this->put("npagina_tw");

      $idusuario =  $this->sessionclass->getidusuario();

      $response_db = $this->contactmodel->update( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web , $id_contacto , $pagina_fb , $pagina_tw);      

      $this->response($response_db);

  

  }
  /*Terminal la función*/
    /**/
    function validate_user_sesssion(){
                  if( $this->sessionclass->is_logged_in() == 1) {                        

                      }else{
                      /*Terminamos la session*/
                      $this->sessionclass->logout();
                  }   
      }/*termina validar session */
}