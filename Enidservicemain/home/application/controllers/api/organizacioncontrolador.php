<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class OrganizacionControlador extends REST_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model("organizacionmodel");            
        $this->load->library('sessionclass');        
    }


    
    /**/
    function mostrarCiudades_get(){
        $this->validate_user_sesssion();
        $idEmpresa= $this->sessionclass->getidempresa();
        $respuestaDB = $this->organizacionmodel->mostrarCiudades($idEmpresa);
        $this->response($respuestaDB);        
    }
    /**/ 
    function actualizarCiudades_post(){

        $this->validate_user_sesssion();
        $nuevoIdCiudad = $this->post('nuevo');
        $idEmpresa= $this->sessionclass->getidempresa();
        $respuestaDB2 = $this->organizacionmodel->actualizarCiudades($idEmpresa,$nuevoIdCiudad);
        $this->response($respuestaDB2);
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