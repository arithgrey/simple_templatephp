<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class ListarReportesRest extends REST_Controller{    
    function __construct(){
        parent::__construct();
        $this->load->model("reportemodel");            
        $this->load->library('sessionclass');            
    }        
    /**/
    function updatestatusrepo_get(){

        $this->validate_user_sesssion();
        $nuevo_status = $this->get("nuevo_status");
        $update_element_id =  $this->get("update_element_id");

        $data_respose = $this->reportemodel->updateStatusRepo($nuevo_status , $update_element_id );
        $this->response($data_respose);                
    }
    /***/
    function listmetricsgeneral_get(){ 
        $this->validate_user_sesssion();
        $data_respose = $this->reportemodel->getMetricasgGenerales();
        $this->response($data_respose);    
    }
    /**/
    function listarReportes_get(){
        $this->validate_user_sesssion();
        $respuestaDB = $this->reportemodel->listarReportes();
        $this->response($respuestaDB);
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {}else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */



}