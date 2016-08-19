<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Maps extends REST_Controller{
    function __construct(){
        parent::__construct();           
        $this->load->library('sessionclass');       
    } 
    /**/
    function puntoventa_GET(){
        $this->load->view("maps/puntos_venta");        
    }
    /*Termina rest*/
}