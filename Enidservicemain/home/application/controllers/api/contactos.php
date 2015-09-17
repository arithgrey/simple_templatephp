<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Contactos extends REST_Controller{

  function __construct(){
        parent::__construct();
       
        $this->load->helper("contacto");    
        $this->load->model("contactmodel");
        $this->load->library('sessionclass');
            
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
      $idusuario =  $this->sessionclass->getidusuario();
  
      $response_db =$this->contactmodel->record( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web );      

      $this->response($response_db);

  }
  /*Retorna mis contactos*/
  function contacto_get(){

      $this->validate_user_sesssion();
      $idusuario =  $this->sessionclass->getidusuario();
      $contacto =  $this->get("contacto");
      $tipo = $this->get("tipo");
      $response_db =  $this->contactmodel->get_contactos_user($idusuario,  $contacto , $tipo);
      $this->response( table_contac($response_db));
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
      $idusuario =  $this->sessionclass->getidusuario();

      $response_db = $this->contactmodel->update( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web , $id_contacto);      

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

