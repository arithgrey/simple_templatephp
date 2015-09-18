<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Puntosventa extends REST_Controller{

  function __construct(){
        parent::__construct();              
        
        $this->load->helper("puntoventa"); 
        $this->load->model("puntoventamodel");
        $this->load->library('sessionclass');
            
  }  

  /*Actualiza todos los puntos de venta asociados ak evento */
  function punto_venta_evento_all_PUT(){
    
    $this->validate_user_sesssion();
    $id_empresa =  $this->sessionclass->getidempresa();  
    $id_evento= $this->put("evento");    

    $db_response= $this->puntoventamodel->update_all_in_event($id_evento, $id_empresa);
    $this->response($db_response);
    
  }


  /*Regresa los puntos de venta */
  function punto_get(){

    $this->validate_user_sesssion();
    $id_empresa =  $this->sessionclass->getidempresa();  
    $filtro = $this->get("filtro");
    $puntos_venta = $this->puntoventamodel->get_puntos_venta_empresa_usuario($id_empresa,  $filtro);
    $this->response(list_puntos_venta_administracion_empresa($puntos_venta));



  }
  /**/
  function punto_venta_evento_get(){

      $this->validate_user_sesssion();
      $id_user = $this->sessionclass->getidusuario();        
      $id_evento= $this->get("evento");
      $id_empresa =  $this->sessionclass->getidempresa();  
      $puntos_venta = $this->puntoventamodel->get_puntos_venta_evento( $id_evento , $id_user , $id_empresa);
      $this->response( list_puntos_venta_evento($puntos_venta) );  


  }

  /*update evento punto venta */
  function punto_venta_evento_put(){

    $this->validate_user_sesssion();
    $id_evento = $this->put("evento");
    $id_punto_venta =  $this->put("punto_venta");

    $db_response = $this->puntoventamodel->update_punto_venta_evento($id_evento, $id_punto_venta );
    $this->response($db_response);
  }
  /**/
  function puntoventacontacto_POST(){

    $this->validate_user_sesssion();
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