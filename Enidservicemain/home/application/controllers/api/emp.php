<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Emp extends REST_Controller{      
    function __construct(){
            parent::__construct();			
			$this->load->helper("empresa");            	
           	$this->load->model("empresamodel"); 	                 
            $this->load->model("organizacionmodel");
            $this->load->library('sessionclass');                    
    }   
    function incidencia_POST(){

        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();         
        $id_user = $this->sessionclass->getidusuario();        
        $response_db = $this->empresamodel->insert_incidencia_empresa($id_empresa , $id_user ,  $this->post() );        
        $this->response($response_db);
    }
    function sub_tipo_incidencia_GET(){

        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();         
        $response_db= $this->empresamodel->get_sub_tipo_incidencia($id_empresa , $this->get());           
        $this->response(sub_tipos_inicidencia_options($response_db));

    }
    /**/
    function empresa_GET(){

        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();
        $response_db= $this->empresamodel->get_empresa_by_id($id_empresa);
        $this->response($response_db);

    }   
    /**/
    function empresa_contacto_resumen_GET(){
        $this->validate_user_sesssion();        
        $id_empresa= $this->sessionclass->getidempresa();
        $num = $this->empresamodel->get_contactos_empresanum($id_empresa);
        $this->response($num);
    }
    /**/
    function empresa_contacto_GET(){

    	$this->validate_user_sesssion();
        $id_empresa = $this->sessionclass->getidempresa();
        $id_user = $this->sessionclass->getidusuario();        
    	$contactos_empresa_data  = data_contactos_empresa($this->empresamodel->get_contactos_empresa($id_empresa, $id_user));   
    	$this->response($contactos_empresa_data );        
    }  

    function empresa_country_PUT(){

        $this->validate_user_sesssion();
        $id_empresa = $this->sessionclass->getidempresa();
        $response_db =  $this->empresamodel->update_country_empresa($id_empresa, $this->put()  );
        
        $this->response($response_db);
    }
    /**/
   	function empresa_contacto_PUT(){

        $this->validate_user_sesssion();
        $id_empresa= $this->sessionclass->getidempresa();
        $response_db = $this->empresamodel->update_contacto_empresa($id_empresa , $this->put() );
        $this->response($response_db);           
   		

    }
    function q_PUT(){

        $this->validate_user_sesssion();
        $id_empresa= $this->sessionclass->getidempresa();
        $response_db = $this->organizacionmodel->update_q($id_empresa , $this->put() );
        $this->response($response_db);           
    }
 /*Validar session para modificar datos*/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                        /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }/*termina validar session */
}?>