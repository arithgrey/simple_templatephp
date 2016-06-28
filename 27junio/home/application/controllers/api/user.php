<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class User extends REST_Controller{
    function __construct(){
        parent::__construct();  
        $this->load->model("cuentageneralmodel");
        $this->load->model("usuariogeneralmodel");        
        $this->load->library('sessionclass');        
    }   
    /**/
    function estado_PUT(){

        $this->validate_user_sesssion();   
        $id_empresa = $this->sessionclass->getidempresa(); 
        $id_user = $this->sessionclass->getidusuario();                        
        $param =  $this->put();        
        $param["id_empresa"] =  $id_empresa; 
        $param["id_usuario_modificador"] =  $id_user;         
        $db_response =  $this->usuariogeneralmodel->set_status($param);

        $response = "";
        if ($db_response ==  true ) {
            $response = "El estado del usuario ha sido modificado exitósamente .!" ; 
        }else{
            $response = "Error al actualizar el estado del usuario, notifique al admistrador" ; 
        }

        $this->response($response);
    }
    /**/    
    function template_estado_GET(){ 

        $this->validate_user_sesssion();   
        $id_usuario = $this->get("usuario"); 
        $id_empresa =  $this->sessionclass->getidempresa();
        $data["usuario"] =  $this->usuariogeneralmodel->get_usuario($id_usuario , $id_empresa ); 
        echo  $this->load->view("usuarioscuenta/config_estatus", $data);
    }
    /**/
    function miembro_PUT(){
        
        $this->validate_user_sesssion();    
        $data  =  $this->put();    
        $data["id_empresa"] = $this->sessionclass->getidempresa();            
        $db_response =  $this->usuariogeneralmodel->update_datos_miembro($data);
        $this->response($db_response);
    }
    /**/
    function miembro_GET(){

        $data = $this->get();
        if ($data["id_usuario"] != 0 ) {
            $db_response = $this->usuariogeneralmodel->get_data_miembro($data);                  
            $data["usuario"] =  $db_response[0];  
            $data["perfiles_disponibles"] =  $this->cuentageneralmodel->get_perfiles();
            echo  $this->load->view("user/modal/user_edith" , $data );                        

        }else{
            echo  $this->load->view("user/modal/user_new"  );                        
        }            
    }
    /**/
    function validate_user_sesssion(){
                if( $this->sessionclass->is_logged_in() == 1) {                        
                    }else{
                    /*Terminamos la session*/
                    $this->sessionclass->logout();
                }   
    }/*termina validar session */
    function miembro_descripcion_put(){

        $data  =  $this->put();    
        $db_response =  $this->usuariogeneralmodel->update_datos_miembro_descripcion($data);
        $this->response($db_response);
    }
    /**/
    function descripcion_escenario_GET(){
        $this->response("ok");
    }  
    /**/
    function q_PUT(){

        $param =  $this->put();
        $this->validate_user_sesssion();   
        $id_user = $this->sessionclass->getidusuario();  
        $db_response =  $this->usuariogeneralmodel->update_q($param ,  $id_user );         
        $this->response($db_response);       
    }
}
?>
