<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Perfilrestcontroller extends REST_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("perfilmodel");                      
        $this->load->model("usuariogeneralmodel");  
        $this->load->library('sessionclass');
            
    }
    /**/         	
    function estableceperfil_post(){
        $this->validate_user_sesssion();
        $idusuario = $this->post("iduser");        
        $responseb =$this->perfilmodel->recordusuarioperfilstandar($idusuario);
        $this->session->set_userdata('perfiles', $this->perfilmodel->getperfiluser($idusuario));        
        $this->response($responseb);
    }
    /**/
    function listperfiles_get(){

        $this->validate_user_sesssion();                
        $nombrerecurso = $this->get("recurso");                
        $datos=$this->perfilmodel->listperfilesrecursospermisos();                              
        $this->response($datos);        
    }
    /*Desplegamos todos los perfiles disponibles */
    function listperfilesinsystem_get(){

        $this->validate_user_sesssion();
        $this->response($this->listperfiles());
    }
    /**/
    function listperfiles(){
        $data = $this->perfilmodel->listallperfiles();  
        return $data;
    }
    /************************************Perfiles permisos modulos ********************************/
    /*Desplegamos todos los perfiles disponibles */
    function listperfilespermisosinsystem_get(){

        $this->validate_user_sesssion();
        $idrecurso= $this->get("recursoid");
        $this->response($this->listperfilesmodulopermisos($idrecurso));        
    }   

    /**/
    function list_perfiles_permisos_in_systemgeneral_get(){

        $this->validate_user_sesssion();
        $idrecurso= $this->get("recursoid");
        $this->response($this->perfilmodel->list_perfiles_modulo_permisos_general($idrecurso)    );        
    }   
    /**/
    function listperfilesmodulopermisos($idrecurso){
        $data = $this->perfilmodel->listperfilesmodulopermisos($idrecurso);  
        return $data;    
    }
    /*******************************Update perfil *************************************************/
     function updateinfoperfil_POST(){
        
        $this->validate_user_sesssion();   
        $idperfil =  $this->post("idperfil");
        $descripcion =  $this->post("descripcion");        
        $this->response( $this->updateperfil($idperfil , $descripcion) );                   
    }
    /**update perfil in database  */
    function updateperfil($idperfil , $descripcion){

        return  $this->perfilmodel->updateperfil($idperfil , $descripcion);           
    }
    /****************************************Insertar *************************************************************/
    function insertinfoperfil_POST(){
        $this->validate_user_sesssion();
        $nombre =  $this->post("nuevoperfil");
        $descripcionperfil  =  $this->post("descripcion_perfil_nuevo");                     
        $this->response( $this->insertperfil($nombre , $descripcionperfil ) );                     
    }
    /* Inserta en la base de datos */
    function insertperfil($nombre , $descripcionperfil ){
        return  $this->perfilmodel->insertperfil( trim($nombre) , trim($descripcionperfil)  );                                    
    } 
    /*************************************Eliminar perfil **************************************************/
    function deleteperfil_POST(){

        $this->validate_user_sesssion();                
        $idperfil =  $this->post("idperfil");        
        $this->response( $this->deleteperfilinfo($idperfil) );                            
    }
    /**/
    function deleteperfilinfo($idperfil){
         return  $this->perfilmodel->removeperfilbyid($idperfil);
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