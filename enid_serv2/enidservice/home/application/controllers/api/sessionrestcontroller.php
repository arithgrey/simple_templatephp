<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Sessionrestcontroller extends REST_Controller{
    function __construct(){
            parent::__construct();
            $this->load->model("usuariogeneralmodel");                      
    }         
    /**/
    function startsessionusergeneral_post(){

        $secret = $this->post("secret");        
        $mail = $this->post("mail");
        $responsedata = $this->isuserexistrecord(trim($mail), trim($secret));        
        $this->response($responsedata);
    }
    /*Validamos que los caracteres no se encuentre en blanco*/
    /*Verifica en la base de datos que exista el usuario por nombre*/
    function isuserexistrecord($mail, $secret){

        $responsedb = $this->usuariogeneralmodel->validauserrecord($mail , $secret);
        /*Validamos que exista el usuario en la db*/        
        if (count($responsedb) == 1){
            /*Crear session*/                                 
                $id_usuario = $responsedb[0]["idusuario"];
                $nombre = $responsedb[0]["nombre"];
                $email =  $responsedb[0]["email"];                
                $fecha_registro = $responsedb[0]["fecha_registro"]; 
            /*Response url*/        
            return $this->createsession($id_usuario, $nombre , $email , $fecha_registro);            

        }else{
            /*Response data error*/        
            return "Error en en los datos de acceso"; 
        }               
    }     
    function createsession($id_usuario, $nombre , $email , $fecha_registro){

        /*Obtenermos los datos del perfil por usuario*/
        $this->load->model("perfilmodel");
        /*Creamos la session*/
        $newdatasession = array(
            "idusuario" => $id_usuario , 
            "nombre" => $nombre ,
            "email" => $email ,
            "fecha_registro"=> $fecha_registro ,
            "perfiles" => $this->perfilmodel->getperfiluser($id_usuario) ,
            "perfildata" => $this->perfilmodel->getperfildata($id_usuario),
            "idempresa" => $this->perfilmodel->getidempresabyidusuario($id_usuario),
            'logged_in' => TRUE
        );   

        $this->session->set_userdata($newdatasession);                                          
        return 1;
    }    
	/*Termina rest*/
}