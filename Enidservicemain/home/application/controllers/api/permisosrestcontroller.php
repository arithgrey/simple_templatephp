<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Permisosrestcontroller extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("permisomodel");
        $this->load->library('sessionclass');
            
    }         
    /*******************************Update permisos*************************************************/
    function updatepermiso_POST(){
           
        $this->validate_user_sesssion();
        $idperfil =  $this->post("idperfil");
        $idpermiso  =  $this->post("idpermiso");                                
        $this->response($this->updatepermiso($idperfil , $idpermiso));                

    }/*Termina función */
    /**update permiso in database  */
    function updatepermiso($idperfil , $idpermiso){
        return  $this->permisomodel->updatepermiso($idperfil , $idpermiso);           
    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        

                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
    

	/*Termina rest*/
}