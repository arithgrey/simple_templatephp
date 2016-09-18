<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Sessionrestcontroller extends REST_Controller{
    function __construct(){
            parent::__construct();
            $this->load->model("usuariogeneralmodel");                      
    } 
    /**/        
    /**/
    function start_post(){
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
                $responsedb =  $responsedb[0];                                
                $id_usuario = $responsedb["idusuario"];
                $nombre = $responsedb["nombre"];
                $email =  $responsedb["email"];                
                $fecha_registro = $responsedb["fecha_registro"]; 
            /*Response url*/        
            return $this->createsession($id_usuario, $nombre , $email);            

        }else{
            /*Response data error*/        
            return "Error en en los datos de acceso"; 
        }               
    }     
    function createsession($id_usuario, $nombre , $email ){
        /*Obtenermos los datos del perfil por usuario*/
        $this->load->model("perfilmodel");
        /*Creamos la session*/        
        $id_empresa =  $this->perfilmodel->getidempresabyidusuario($id_usuario); 
        $perfiles =  $this->perfilmodel->getperfiluser($id_usuario); 
        $perfildata =  $this->perfilmodel->getperfildata($id_usuario); 

        $newdatasession = array(
            "idusuario" => $id_usuario , 
            "nombre" => $nombre ,
            "email" => $email ,            
            "perfiles" => $perfiles ,  
            "perfildata" => $perfildata ,
            "idempresa" => $id_empresa,
            'logged_in' => TRUE
        );   
        $this->session->set_userdata($newdatasession);                                          
        return 1;
    }    
	/*Termina rest*/
}