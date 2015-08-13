<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Accesos extends REST_Controller{

    function __construct(){
            parent::__construct();

            $this->load->helper("accesos");
            $this->load->model("accesosmodel");
            $this->load->library('sessionclass');
            
        }     

    /*update info acceso */    
    function udpate_acceso_id_post(){
        $this->validate_user_sesssion();
        
        
        $id_evento = $this->input->post("evento");  
        $id_acceso = $this->input->post("acceso");
        $nuevo_precio =  $this->input->post("nuevo_precio");
        $nuevo_inicio_acceso =  $this->input->post("nuevo_inicio_acceso");
        $nuevo_termino_acceso =  $this->input->post("nuevo_termino_acceso");
        $nueva_descripcion =  $this->input->post("nueva_descripcion");
        $nuevo_tipo_acceso =  $this->input->post("nuevo_tipo_acceso");
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
    /***/        
    function load_post(){
            $this->validate_user_sesssion();
            $idempresa =  $this->sessionclass->getidempresa();                
            $evento = $this->post("evento");                        
            $responsedb = $this->accesosmodel->getDataByidEvent($idempresa, $evento);
            $this->response(getData($responsedb)); 
    }/*Termina*/
    function nuevo_post(){
        
        $this->validate_user_sesssion();
        $idempresa =  $this->sessionclass->getidempresa();                    
        $evento = $this->post("evaccesos");        
        $acceso_tipo = $this->post("acceso-tipo-modal");                        
        $precio = $this->post("precio-acceso-modal");                        
        $inicio = $this->post("nuevo_inicio_acceso");
        $termino = $this->post("nuevo_termino_acceso");                                
        $dbrespose = $this->accesosmodel->insert( $precio , $inicio , $termino , $evento , $acceso_tipo);
        $this->response($dbrespose);             
    }
    /*****************Elimina el acceso del evento **************/
    function deletebyid_post(){
        
        $this->validate_user_sesssion();
               
        $evento = $this->post("evento");      
        $acceso = $this->post("acceso");                  
        $this->response($this->accesosmodel->deletebyid( $evento , $acceso ));         
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
