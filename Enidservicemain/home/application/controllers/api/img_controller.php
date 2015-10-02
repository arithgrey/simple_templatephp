<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Img_controller extends REST_Controller{

  function __construct(){
        parent::__construct();
        
        $this->load->model("img_model");
        $this->load->library('sessionclass');
            
  }     

  /**/
  function principal_escenario_post(){


      $this->validate_user_sesssion();            
      $id_usuario = $this->sessionclass->getidusuario();    
      $id_empresa =  $this->sessionclass->getidempresa();            
      $db_response = $this->img_model->insert_principal_escenario($this->post() , $id_usuario , $id_empresa );
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

