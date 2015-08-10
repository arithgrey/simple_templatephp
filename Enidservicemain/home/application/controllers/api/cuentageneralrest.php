<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Cuentageneralrest extends REST_Controller{
      
    function __construct(){
        parent::__construct();        
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
    function getintegrantesinfocuenta_GET(){
        
        $this->validate_user_sesssion();    
        $this->response($this->getintegrantesinformacion());            
    }
    /**/
    function getintegrantesinformacion(){
        
        $this->validate_user_sesssion();
        $iduser  = $this->sessionclass->getidusuario();
        $integrantes  = $this->cuentageneralmodel->getintegrantesinforme($iduser);
        return $integrantes;
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
