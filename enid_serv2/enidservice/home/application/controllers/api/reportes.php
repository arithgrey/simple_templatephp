<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Reportes extends REST_Controller{
  function __construct(){
        parent::__construct();                      
        
        $this->load->helper("repo");
        $this->load->model("repomodel");    
        $this->load->library('sessionclass');      
  }  
  function global_administrador_GET(){
    /**/    
    $this->validate_user_sesssion();
    $id_empresa =  $this->sessionclass->getidempresa();   

    $param =  $this->get();
    $db_response =  $this->repomodel->reporte_cuadro_global_inicio_session($id_empresa ,  $param);
    $this->response(reporte_cuadro_global($db_response));
    //$this->response($db_response);
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
