<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Perfilrecursorestcontroller extends REST_Controller{

    function __construct(){
    	parent::__construct();
        $this->load->model("perfilmodel");            
        $this->load->library('sessionclass');        
    }         
    /**/
    function trydeleteperfilrecurso_POST(){

        $this->validate_user_sesssion();
        $idrecurso = $this->post("idrecurso");
        $idperfil = $this->post("idperfil");                                               
        $this->response( $this->deleteperfilrecurso($idperfil , $idrecurso) );

    }
    /**/
    function deleteperfilrecurso($idperfil , $idrecurso){

    	return $this->perfilmodel->deleteperfilrecurso($idperfil , $idrecurso );
    }
    /*******************************************Actualiza los perisos ************************************/
    function tryupdateperfilrecurso_POST(){

        $this->validate_user_sesssion();            
        $idrecurso = $this->post("idrecurso");
        $idperfil = $this->post("idperfil");                    
        $this->response( $this->updateperfilpermisopermiso( $idperfil , $idrecurso  ) );                                                            
    }
    /**/
    function updateperfilpermisopermiso( $idperfil , $idrecurso ){

       return $this->perfilmodel->updateperfilpermisopermisodb($idperfil , $idrecurso );                                  
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