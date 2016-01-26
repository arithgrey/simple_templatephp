<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Accesos extends REST_Controller{
    function __construct(){
            
            parent::__construct();
            $this->load->helper("accesos");
            $this->load->helper("puntoventa");
            $this->load->model("accesosmodel");
            $this->load->model("puntoventamodel");
            $this->load->library('sessionclass');
            
        }     
    function resumen_accesos_punto_venta_evento_GET(){
        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");
        $resumen_puntos_venta_asociados =   get_resumen_puntos_venta_asociados($this->puntoventamodel->get_puntos_venta_asociadas($id_evento));
        $this->response($resumen_puntos_venta_asociados);

    }    

    /**/
    
    function resumen_accesos_evento_GET(){
        
        $this->validate_user_sesssion();
        $id_evento = $this->get("evento");
        $resumen_accesos =  resumen_puntos_venta_f($this->puntoventamodel->get_resumen_accesos($id_evento) );
        $this->response($resumen_accesos);

    }
    /**/
    function tipoacceso_get(){
     //
        $id_evento= $this->get("evento");
        $responsedb= $this->accesosmodel->get_accesos_tipo_evento($id_evento);
        $this->response($responsedb);
    }    
    /*update info acceso */    
    function udpate_acceso_id_PUT(){
        $this->validate_user_sesssion();        
        
        $id_evento = $this->put("evento");  
        $id_acceso = $this->put("acceso");
        $nuevo_precio =  $this->put("nuevo_precio");
        $nuevo_inicio_acceso =  $this->put("nuevo_inicio_acceso");
        $nuevo_termino_acceso =  $this->put("nuevo_termino_acceso");
        $nueva_descripcion =  $this->put("nueva_descripcion");
        $nuevo_tipo_acceso =  $this->put("nuevo_tipo_acceso");
        $responsedb = $this->accesosmodel->update_all_by_id($id_acceso , $nuevo_precio , $nuevo_inicio_acceso , $nuevo_termino_acceso , $nueva_descripcion , $nuevo_tipo_acceso );
        $this->response($responsedb);
    }
    function get_accesos_with_format_by_id_event_get(){

        $this->validate_user_sesssion();
        $id_evento = $this->input->get("evento");
        $data_accesos = $this->accesosmodel->get_acceso_by_event($id_evento);                                                                                                                              
        $accesos_in_event = display_complete_info($data_accesos);
        $this->response($accesos_in_event);
    }    
    function accesos_evento_GET(){

        $this->validate_user_sesssion();
        $id_empresa =  $this->sessionclass->getidempresa();                
        $id_evento = $this->get("evento");                        
        $responsedb = $this->accesosmodel->getDataByidEvent($id_empresa, $id_evento);
        $this->response(accesos_complete($responsedb)); 
    }/*Termina*/
    /***/        
    function load_post(){

            $this->validate_user_sesssion();
            $id_empresa =  $this->sessionclass->getidempresa();                
            $id_evento = $this->post("evento");                        
            $responsedb = $this->accesosmodel->getDataByidEvent($id_empresa, $id_evento);
            $this->response(list_accesos_edit($responsedb)); 
    }/*Termina*/
    function nuevo_post(){
        

        $this->validate_user_sesssion();                
        $idempresa =  $this->sessionclass->getidempresa();                    

        $nombre_acceso =  $this->post("nombre_acceso");
        $id_evento = $this->post("evaccesos");        
        $acceso_tipo = $this->post("tipo_acceso");                        
        $precio = $this->post("precio-acceso-modal");                        
        $inicio = $this->post("nuevo_inicio_acceso");
        $termino = $this->post("nuevo_termino_acceso");                                
        $dbrespose = $this->accesosmodel->insert( $nombre_acceso  , $precio , $inicio , $termino , $id_evento , $acceso_tipo);
        $this->response($dbrespose);             
    }

    /**/
    function acceso_post(){
        $this->validate_user_sesssion();
        
        $nombre =  $this->post("acceso_nombre");   
        $tipo = $this->post("tipo");        
        $precio = $this->post("precio");        
        $inicio = $this->post("inicio");        
        $termino =  $this->post("termino");
        $id_evento = $this->post("evento");        
        $descripcion  = $this->post("descripcion");
        
          
        $dbrespose = $this->accesosmodel->insert( $nombre , $precio  ,  $inicio  , $termino , $id_evento , $tipo , $descripcion);
        


        $this->response($dbrespose);
    }
    /*****************Elimina el acceso del evento **************/
    function deletebyid_post(){
        
        $this->validate_user_sesssion();               
        $id_evento = $this->post("evento");      
        $id_acceso = $this->post("acceso");                  
        $this->response($this->accesosmodel->deletebyid( $id_evento , $id_acceso ));         
    }
    /*Regresa la información de un sólo acceso mediante su id */
    function get_acceso_info_id_get(){        
        $id_acceso = $this->get("acceso");                  
        $this->response($this->accesosmodel->get_by_id( $id_acceso ));         
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