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
	function usuarios(){

			$perfil = $this->sessionclass->getperfiles();
			$data= $this->validate_user_sesssion("Miembros de la cuenta");						
			$iduser  = $this->sessionclass->getidusuario();
			$id_empresa =  $this->sessionclass->getidempresa();                                            


			$data_resumen_usuarios = $this->cuentageneralmodel->get_resumen_usuarios_cuenta($id_empresa);
			$data["resumen_usuarios"]=  resumen_usuarios_cuenta($data_resumen_usuarios);
		    $integrantes  = $this->cuentageneralmodel->getintegrantesinforme($iduser, 0 , $id_empresa);								
		    $data["integrantes"] = lista_usuarios_cuenta($integrantes);			
			$data["integrantes_filtro"] = list_filtro_integrantes($integrantes);				   
			$this->dinamic_view_event(displayviewusuario( $perfil ), $data);				
	}	
	/*****Para el administrador de la cuenta *****************/
	function perfilconfig(){

		$data = $this->validate_user_sesssion("Configuración, perfiles y permisos");					
		$this->dinamic_view_event('perfiles/config.php' , $data);
	}	
	/**/


	function perfilconfigad($recurso){

		$data = $this->validate_user_sesssion("Configuración avanzada, accesos a los poerfiles por módulo");						
		$data["modulo"] = $recurso;			
		$this->dinamic_view_event('modulo/moduloconfig_g.php' , $data);			
	}
	/**/
	function informacioncuenta(){
				
			$data = $this->validate_user_sesssion("Pefil");					
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