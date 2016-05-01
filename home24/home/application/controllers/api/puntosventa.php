<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Puntosventa extends REST_Controller{
  function __construct(){
        parent::__construct();              
        $this->load->helper("contacto");
        $this->load->helper("puntoventa"); 
        $this->load->model("puntoventamodel");
        $this->load->library('sessionclass');      
  }  
  /**/
  function evento_icon_GET(){
    
    $this->validate_user_sesssion();  
    $db_response =  $this->puntoventamodel->load_puntos_venta_evento_icon($this->get("evento"));
    $icon =  puntos_venta_admin($db_response);
    $this->response($icon);
  }
  /**/
  function asocia_evento_PUT(){

    $this->validate_user_sesssion();
    $param =  $this->put();
    $db_response =  $this->puntoventamodel->asocia_evento($param);
    $this->response($db_response);
  }
  /**/
  function punto_venta_nota_PUT(){
    $this->validate_user_sesssion();
    $param = $this->put();
    $db_response =  $this->puntoventamodel->update_punto_venta_nota($param);
    $this->response($db_response);
  }
  /**/
  function punto_venta_GET(){
    $this->validate_user_sesssion();
    $param = $this->get();
    $db_response =  $this->puntoventamodel->get_punto_venta($param);
    $this->response($db_response);
  }
  function  evento_POST(){

    $data =  $this->post();
    $db_response = $this->puntoventamodel->asociar_evento_empresa($data);
    $this->response($db_response);

  }
  /**/
  function busqueda_empresa_GET(){

    $data =  $this->get(); 
    $db_response =  $this->puntoventamodel->busqueda_empresa($data , 5);    
    
    
    $filtro = filtro_enid_busqueda_punto_venta($db_response,  "punto-venta-evento-result" , "idpunto_venta" );
    $this->response($filtro);    
    


  }
  /**/
  function puntoventaresumen_GET(){

    $this->validate_user_sesssion();
    $id_empresa =  $this->sessionclass->getidempresa();   
    $puntos_venta_resumen_data = $this->puntoventamodel->get_resumen_punto_venta($id_empresa);             
    $resumen_puntos_venta =  resumen_puntos_venta($puntos_venta_resumen_data);              
    $this->response($resumen_puntos_venta);


  }
  /*Elimina del evento el punto de venta */
  function punto_venta_evento_DELETE(){

    $this->validate_user_sesssion();  
    $id_evento= $this->delete("evento");  
    $id_punto_venta = $this->delete("punto_venta");  
    $db_response= $this->puntoventamodel->delete_punto_venta_evento($id_evento , $id_punto_venta);
    $this->response($db_response);

  }

  /*Actualiza todos los puntos de venta asociados ak evento */
  function punto_venta_evento_all_PUT(){
    
    $this->validate_user_sesssion();
    $id_empresa =  $this->sessionclass->getidempresa();  
    $id_evento= $this->put("evento");    

    $db_response= $this->puntoventamodel->update_all_in_event($id_evento, $id_empresa);
    $this->response($db_response);
    
  }
  /**/
  function puntoconfig_GET(){
    /**/ 
    $this->validate_user_sesssion();
    $param  =  $this->get();
    $db_response = $this->puntoventamodel->get_punto_venta($param);
    $this->response($db_response);
    
    /**/
    
  }

  /*Regresa los puntos de venta */
  function punto_GET(){

    $this->validate_user_sesssion();
    $id_empresa =  $this->sessionclass->getidempresa();      
    $puntos_venta = $this->puntoventamodel->get_puntos_venta_empresa_usuario($id_empresa ,  $this->get() , 10 );
    $this->response(list_puntos_venta_administracion_empresa($puntos_venta , 10 ));
    
  }
  /**/
    function punto_venta_evento_complete_get(){

      $this->validate_user_sesssion();
      $id_evento= $this->get("evento");      
      $puntos_venta = $this->puntoventamodel->load_puntos_venta_evento($id_evento);

      $this->response( load_puntos_venta_complete($puntos_venta) );  
  }
  /**/
  function punto_venta_evento_get(){

      $this->validate_user_sesssion();
      $id_evento= $this->get("evento");      
      $puntos_venta = $this->puntoventamodel->load_puntos_venta_evento($id_evento);
      $this->response( list_puntos_venta_evento($puntos_venta) );  
  }/**/
  function punto_venta_evento_q_get(){

      $this->validate_user_sesssion();
      $id_evento= $this->get("evento");  
      $q=  $this->get("q");    
      $puntos_venta = $this->puntoventamodel->q_evento($id_evento, $q);
      $this->response($puntos_venta);  
  }
  /*update evento punto venta */
  function punto_venta_evento_put(){

    $this->validate_user_sesssion();
    $id_evento = $this->put("evento");
    $id_punto_venta =  $this->put("punto_venta");

    $db_response = $this->puntoventamodel->update_punto_venta_evento($id_evento, $id_punto_venta );
    $this->response($db_response);
  }




  function puntoventacontacto_DELETE(){
    $this->validate_user_sesssion();
    $contacto = $this->delete("contacto");
    $punto_venta  =  $this->delete("punto_venta");
    $response_db =  $this->puntoventamodel->delete_punto_venta_contacto( $punto_venta , $contacto);
    $this->response($response_db);        
  }
  //**/
  
  function puntoventacontacto_PUT(){

    $this->validate_user_sesssion();
    $contacto = $this->put("contacto");
    $punto_venta  =  $this->put("punto_venta");
    $response_db =  $this->puntoventamodel->insert_punto_venta_contacto( $punto_venta , $contacto);
    $this->response($response_db);    

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
    /**/    
    $response_db= $this->puntoventamodel->get_contactos_in_punto_venta_filtro($id_usuario , $punto_venta  );    
    $this->response(contactos_punto_venta_filter($response_db));
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
        $status         = $this->post("status");              
        $descripcion    = $this->post("descripcion");
        $zona =  $this->post("zona");

        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();            

        $response_db =  $this->puntoventamodel->insert($razon_social,                                                     
                                                        $status ,                                                                                                      
                                                        $descripcion, 
                                                        $zona,
                                                        $id_usuario, 
                                                        $id_empresa );


        $this->response($response_db);
    

    
  
  }



  function punto_put(){



    $this->validate_user_sesssion();

        $razon_social = $this->put("nrazon_social");        
        $status         = $this->put("nstatus");        
        $descripcion    = $this->put("ndescripcion");
        $id_punto_venta =  $this->put("punto_venta");
        $zona =  $this->put("nzona"); 
        $id_usuario = $this->sessionclass->getidusuario();    
        $id_empresa =  $this->sessionclass->getidempresa();            



        $response_db =  $this->puntoventamodel->update($razon_social,                                                        
                                                        $status ,
                                                        $descripcion,
                                                        $zona,  
                                                        $id_usuario,                                                         
                                                        $id_empresa , $id_punto_venta);

        $this->response($response_db);

        


  }

  /**/
  function contacto_GET(){

    $id_punto_venta = $this->get("punto_venta");
    $db_response = $this->puntoventamodel->get_contactos($id_punto_venta);
    $this->response(contactos_list($db_response));

  }
  /**/


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
