<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Sound  extends REST_Controller{
    function __construct(){

        parent::__construct();      

    }   
    function getAutocomplete_get(){

        $nombreartista =  $this->get("nombreartista");
        $this->response($nombreartista);

    }      
	/*Termina rest*/
}