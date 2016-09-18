<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Enid extends REST_Controller{      
    function __construct(){

        parent::__construct();          
        $this->load->model("enidmodel");
        $this->load->helper("enid");
        $this->load->library('sessionclass');                    

    }
    /**/
    function prospectos_GET(){
        /**/
        $param = $this->get();    
        $data["prospectos"] =   $this->enidmodel->repo_prospectos($param);
        echo $this->load->view("empresa/enid/repo_prospectos" , $data);

    }
    
}?>
