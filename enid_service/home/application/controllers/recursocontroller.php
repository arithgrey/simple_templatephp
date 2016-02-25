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

			$data = $this->validate_user_sesssion("Perfiles");											
			$this->dinamic_view_event('perfiles/principal', $data);							
			
	}	
	/**/
	function usuarios($limit=10){

		$perfil = $this->sessionclass->getperfiles();
		$data= $this->validate_user_sesssion("Miembros de la cuenta");						
		$id_user  = $this->sessionclass->getidusuario();
		$id_empresa =  $this->sessionclass->getidempresa();                                            
			

		$data_resumen_usuarios = $this->cuentageneralmodel->get_resumen_usuarios_cuenta($id_empresa);
		$data["resumen_usuarios"]=  resumen_usuarios_cuenta($data_resumen_usuarios);
	    $integrantes  = $this->cuentageneralmodel->getintegrantesinforme($id_user, 0 , $id_empresa , $limit );								
	    $data["integrantes"] = lista_usuarios_cuenta($integrantes , $limit);			
		$data["integrantes_filtro"] = list_filtro_integrantes($integrantes);				   
		$perfiles  =  $this->cuentageneralmodel->get_perfiles();
		
//		 create_select($data , $name , $class , $id , $text_option , $val );


		$data["id_empresa"] =  $id_empresa; 
		$this->dinamic_view_event("usuarioscuenta/paraadministradorcuenta" , $data );						
	}	
	/*****Para el administrador de la cuenta *****************/
	function perfilconfig(){

		$data = $this->validate_user_sesssion("Configuración, perfiles y permisos");					
		$this->dinamic_view_event('perfiles/config' , $data);
	}	
	/**/


	function perfilconfigad($recurso){

		$data = $this->validate_user_sesssion("Configuración avanzada, accesos a los poerfiles por módulo");						
		$data["modulo"] = $recurso;			
		$this->dinamic_view_event('modulo/moduloconfig_g' , $data);			
	}
	/**/
	function informacioncuenta(){
				
		$data = $this->validate_user_sesssion("Pefil");					
		$id_usuario  = $this->sessionclass->getidusuario();			
		$data["data_user"] =  $this->cuentageneralmodel->get_data_user_by_id($id_usuario)[0];
		$this->dinamic_view_event('micuenta/principal' , $data);				
	}	
	/*Inicia perfil avanzado*/
	function perfilesavanzado(){
		
			$data = $this->validate_user_sesssion("Configuración perfiles");	
			$recurso = $this->input->get("moduloconfig");					
			$data["modulo"] = $recurso;			
			$this->dinamic_view_event('modulo/moduloconfig.php' , $data);				
			
	}/*Termina perfil avanzado*/	
	function validate_user_sesssion($titulo_dinamico_page){

            if ( $this->sessionclass->is_logged_in() == 1) {                        
          
                    $menu = $this->sessionclass->generadinamymenu();
                    $nombre = $this->sessionclass->getnombre();                                         
                    $data['titulo']=$titulo_dinamico_page;              
                    $data["menu"] = $menu;              
                    $data["nombre"]= $nombre;                                               
                    $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                

                    return $data;

                }else{
                /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }
    /**/
    function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }
		
}