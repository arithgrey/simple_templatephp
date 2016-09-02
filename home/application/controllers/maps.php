<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maps extends CI_Controller{
    function __construct(){
        parent::__construct();  
        $this->load->model("mapsmodel");          
    }    
    /**/
    function map($id , $modulo , $public = 0  ,  $destination = 0 ){
        $modulos_enid =  ["event" , "contactos" ,  "puntosventa" ,  "user"];
        $data["identificador"] = $id;
        $data["info_locacion"] = $this->get_info_location($modulo , $data );   
        $data["public"] = $public; 
        $data["modulo"] = $modulos_enid[$modulo]; 
        $data["destination"] =  $destination;  
        $data["key_enid"]= "AIzaSyAVF0GA9R64Jnbd3ZX53TnLI-61vOqcq-4";
        $this->load->view("maps/new_map", $data);        
    }
    /**/
    function get_info_location($modulo , $data ){
        $data_response = array();
        switch ($modulo){
            case 0:
                $db_response = $this->mapsmodel->get_registro_evento($data); 
                $data_response = $db_response[0];           
                break;            
            case 1:
                $db_response = $this->mapsmodel->get_registro_contacto($data); 
                $data_response  = $db_response[0];   
                break;    
            case 2:
                $db_response = $this->mapsmodel->get_registro_pv($data); 
                $data_response = $db_response[0];        
                break;        
            case 3:
                $db_response = $this->mapsmodel->get_registro_user($data);  
                $data_response = $db_response[0];        
                break;        
            default:        
                break;
        }
        return  $data_response;
    }
    /**/
}/*Termina en controlador*/