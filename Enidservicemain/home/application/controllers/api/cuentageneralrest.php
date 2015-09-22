<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Cuentageneralrest extends REST_Controller{
      
    function __construct(){
        parent::__construct();        
        $this->load->helper("recursos");
        $this->load->model('cuentageneralmodel');         
        $this->load->library('sessionclass');
            
    }     
    /*******************************Regresa el número de integrantes de la cuenta ***********************/
    function getnumintegrantescuenta_GET(){
        
        $this->validate_user_sesssion();   
        $this->response($this->getnumerointegrantesbyidusuario());            
    }
    /*Consultamos el número de integrantes en la cuenta por id del usuario */
    function getnumerointegrantesbyidusuario(){

       $this->validate_user_sesssion();
       $iduser  = $this->sessionclass->getidusuario();
       $numerointegrantes  = $this->cuentageneralmodel->getintegrantesbyidusuario($iduser);
       return $numerointegrantes;       
    }
    /*************************************************************************************************************/    
    function integrantescuenta_GET(){
        
        $this->validate_user_sesssion();    
        $integrantes = $this->input->get("filtro");        
        $iduser  = $this->sessionclass->getidusuario();
        $id_empresa =  $this->sessionclass->getidempresa(); 
        $integrantes_data  = $this->cuentageneralmodel->getintegrantesinforme($iduser, $integrantes, $id_empresa );
        $this->response(lista_usuarios_cuenta($integrantes_data));


    }
    /**/    
    function getlistperfilesfisponiblesbycuenta_get(){

        $this->validate_user_sesssion();
        $idempresa = $this->sessionclass->getidempresa();    
        $this->response( $this->getplanesbyempresa($idempresa)  );                               
    }
    /**/
    function getplanesbyempresa($idempresa){
        //select idplan from empresa where idempresa
        $this->validate_user_sesssion();
        $perfiles  = $this->cuentageneralmodel->getperfilesdelacuenta($idempresa);
        return $perfiles;      
    }
    /**/   
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {}else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
    

}/*Termina rest*/
?>
