<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Puntosventa extends REST_Controller{

  function __construct(){
        parent::__construct();              
        
        $this->load->helper("puntoventa"); 
        $this->load->model("puntoventamodel");
        $this->load->library('sessionclass');
            
  }   

  function puntoventacontactoooo_GET(){
    $arrayName = array('ta' =>  1 , 'asldk' => 2  );
    $this->response($arrayName);
  }
  function puntoventacontacto_POST(){

    $contacto = $this->post("contacto");
    $punto_venta  =  $this->post("punto_venta");
    $response_db =  $this->puntoventamodel->update_punto_venta_contacto($contacto , $punto_venta);
    $this->response($response_db);
    

  }
  function puntoventacontacto_GET(){

    $this->validate_user_sesssion();
    $id_usuario =  $this->sessionclass->getidusuario();
    $punto_venta = $this->get("punto_venta");
    $response_db= $this->puntoventamodel->get_contactos_in_punto_venta($id_usuario , $punto_venta  );

    $this->response(list_contactos_punto_venta($response_db));
  }
  /*Elimina el punto venta*/
  function punto_DELETE(){

        $punto_venta= $this->delete("punto_venta");
        $response_db  = $this->puntoventamodel->delete($punto_venta);
        $this->response($response_db);

  }      
  /**/
  function punto_POST(){
      
    $this->validate_user_sesssion();

        $razon_social = $this->post("razon_social");
        $direccion      = $this->post("direccion");
        $status         = $this->post("status");
        $telefono       = $this->post("telefono");
        $url_pagina_web = $this->post("url_pagina_web");     
        $descripcion    = $this->post("descripcion");

        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();            

        $response_db =  $this->puntoventamodel->insert($razon_social, 
                                                       $direccion,
                                                        $status ,
                                                         $telefono ,
                                                         $url_pagina_web,
                                                         $descripcion, 
                                                         $id_usuario, 
                                                         $id_empresa );


        $this->response($response_db);
    

    
  
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