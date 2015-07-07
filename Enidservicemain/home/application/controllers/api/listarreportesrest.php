<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class ListarReportesRest extends REST_Controller{

    
    function __construct(){

            parent::__construct();

            $this->load->model("reportemodel");            
            $this->load->library('sessionclass');
            
    }        
    


    function listmetricsgeneral_get(){

        if ( $this->sessionclass->is_logged_in() == 1) {  

            $data_respose = $this->reportemodel->getMetricasgGenerales();

            $this->response($data_respose);

         }else{
            $this->sessionclass->logout();
        }

    }


    function listarReportes_get(){

    //$this->response("test correcto");
        if ( $this->sessionclass->is_logged_in() == 1) {  

        $respuestaDB = $this->reportemodel->listarReportes();

        $this->response($respuestaDB);


         }else{
            $this->sessionclass->logout();
        }

    }


}
