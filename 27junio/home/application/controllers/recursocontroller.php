<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recursocontroller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("recursos");
		$this->load->model("cuentageneralmodel");
		$this->load->library('sessionclass');  			
	}
	/********************Para el administrador **********************/
	function perfiles(){
		$data = $this->val_session("Perfiles");											
		$this->show_data_page( $data ,  'perfiles/principal');									
	}	
	/**/
	function usuarios_imgs(){

		$data= $this->val_session("Miembros de la cuenta");										
		$this->show_data_page($data ,  "imgs/user" );						

	}
	/**/
	function usuarios($limit=10){

		$perfil = $this->sessionclass->getperfiles();
		$data= $this->val_session("Miembros de la cuenta");										
		$id_empresa =  $this->sessionclass->getidempresa();
		$integrantes = $this->cuentageneralmodel->miembros_empresa_f($id_empresa);		
		$data["integrantes_filtro"] = list_filtro_integrantes($integrantes);				   		
		$id_empresa =  $this->sessionclass->getidempresa();                                            	   
		$data["id_empresa"] =  $id_empresa; 
		$this->show_data_page($data ,  "usuarioscuenta/paraadministradorcuenta" );						
	}	
	/*****Para el administrador de la cuenta *****************/
	function perfilconfig(){

		$data = $this->val_session("Configuración, perfiles y permisos");					
		$this->show_data_page( $data , 'perfiles/config');
	}	
	/**/
	function perfilconfigad($recurso){

		$data = $this->val_session("Configuración avanzada, accesos a los poerfiles por módulo");						
		$data["modulo"] = $recurso;			
		$this->show_data_page( $data , 'modulo/moduloconfig_g');			
	}
	/**/
	function informacioncuenta(){
				
		$data = $this->val_session("Configuración de la cuenta");					
		$id_usuario  = $this->sessionclass->getidusuario();			
		$data["data_user"] =  $this->cuentageneralmodel->get_data_user_by_id($id_usuario)[0];
		$this->show_data_page($data , 'micuenta/principal' );				
	}	
	/*Inicia perfil avanzado*/
	function perfilesavanzado(){
		
			$data = $this->val_session("Configuración perfiles");	
			$recurso = $this->input->get("moduloconfig");					
			$data["modulo"] = $recurso;			
			$this->show_data_page( $data , 'modulo/moduloconfig.php' );				
			
	}/*Termina perfil avanzado*/	
	function val_session($titulo_dinamico_page){

        if ( $this->sessionclass->is_logged_in() == 1) {                                                            
                $menu = $this->sessionclass->generadinamymenu();
                $nombre = $this->sessionclass->getnombre();                                         
                $data['titulo']= $titulo_dinamico_page;              
                $data["menu"] = $menu;              
                $data["nombre"]= $nombre;                                               
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                
                $data["in_session"] = 1;
                return $data;
        }else{            
            $data['titulo']=$titulo_dinamico_page;              
            $data["in_session"] = 0;
            return $data;
        }   
    }
    /*Determina que vistas mostrar para los eventos*/
    function show_data_page($data, $center_page){
        
        if ($data["in_session"] == 1){        

            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_page , $data);            
            $this->load->view('TemplateEnid/footer_template', $data);
        }else{          
            $this->load->view('TemplateEnid/header_template_all_user', $data);
            $this->load->view($center_page , $data);            
            $this->load->view('TemplateEnid/footer_template', $data);
        }                      
    }
    /**/

		
}

