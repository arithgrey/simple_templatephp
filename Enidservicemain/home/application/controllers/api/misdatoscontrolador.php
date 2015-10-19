<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class MisDatosControlador extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("misdatosmodel");            
        $this->load->library('sessionclass');       
    }        
    /**/
    function actualizarNombre_post(){

        $this->validate_user_sesssion();
        $nuevoNombre = $this->post('name');
        $idUsuario= $this->sessionclass->getidusuario();
        $respuestaDB = $this->misdatosmodel->actualizarNombre($nuevoNombre,$idUsuario);
        $this->response($respuestaDB);

    }
    /**/
    function mostrarNombre_get(){
        $this->validate_user_sesssion();
        $idUsuario= $this->sessionclass->getidusuario();
        $respuestaDB = $this->misdatosmodel->mostrarNombre($idUsuario);
        $this->response($respuestaDB);

    }
    /**/
    function actualizarPuesto_post(){

        $this->validate_user_sesssion();
        $nuevoPuesto = $this->post('puesto');
        $idUsuario= $this->sessionclass->getidusuario();
        $respuestaDB1 = $this->misdatosmodel->actualizarPuesto($nuevoPuesto,$idUsuario);
        $this->response($respuestaDB1);     

    }
    /**/
    function mostrarPuesto_get(){

        $this->validate_user_sesssion();
        $idUsuario= $this->sessionclass->getidusuario();
        $respuestaDB = $this->misdatosmodel->mostrarPuesto($idUsuario);
        $this->response($respuestaDB);
    }
    /**/
    function actualizarDescripcion_post(){

        $this->validate_user_sesssion();
        $nuevoDescripcion = $this->post('descripcion');
        $idUsuario= $this->sessionclass->getidusuario();
        $respuestaDB2 = $this->misdatosmodel->actualizarDescripcion($nuevoDescripcion,$idUsuario);
        $this->response($respuestaDB2);
    }
    /**/
    function mostrarDescripcion_get(){

        $this->validate_user_sesssion();
        $idUsuario= $this->sessionclass->getidusuario();
        $respuestaDB = $this->misdatosmodel->mostrarDescripcion($idUsuario);
        $this->response($respuestaDB);            
    }
    /*************************************************************************************************************/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                    /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
    /*Termina rest*/
}