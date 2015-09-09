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
      
      //ini_set('display_errors', '1');    

      $this->validate_user_sesssion();
      $nombre  =  $this->post("nombre");
      $organizacion  =  $this->post("organizacion");
      $telefono =  $this->post("telefono");
      $movil  = $this->post("movil");
      $correo =  $this->post("correo");
      $direccion = $this->post("direccion");
      $tipo =  $this->post("tipo");      
      $nota = $this->post("nota");
      $idusuario =  $this->sessionclass->getidusuario();
  
      $response_db =$this->contactmodel->record( $nombre , $organizacion , $telefono, $movil          
                    , $correo , $direccion, $tipo , $idusuario, $nota );      

      $this->response($response_db);

  }
  /*Retorna mis contactos*/
  function contacto_get(){
      $this->validate_user_sesssion();
      $idusuario =  $this->sessionclass->getidusuario();
      $response_db =  $this->contactmodel->get_contactos_user($idusuario);

      $this->response( table_contac($response_db));

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

