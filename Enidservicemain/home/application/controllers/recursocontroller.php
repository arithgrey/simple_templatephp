<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recursocontroller extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model("cuentageneralmodel");
		$this->load->library('sessionclass');  			
	}
	/**/
	function perfiles(){
		
			$data = $this->validate_user_sesssion("Perfiles");			
			$this->load->view('TemplateEnid/header_template', $data);						
			$this->load->view('perfiles/principal', $data);							
			$this->load->view('TemplateEnid/footer_template', $data);			
	}	
	function usuarios(){

			$perfil = $this->sessionclass->getperfiles();
			$data= $this->validate_user_sesssion("Miembros de la cuenta ");
				
			$iduser  = $this->sessionclass->getidusuario();
		    $integrantes  = $this->cuentageneralmodel->getintegrantesinforme($iduser);
								
		    $data["integrantes"]= $integrantes;
			$this->load->view('TemplateEnid/header_template', $data);
			$this->load->view(displayviewusuario( $perfil ), $data);	
			$this->load->view('TemplateEnid/footer_template', $data);
	}		
	function informacioncuenta(){
				
			$data = $this->validate_user_sesssion("Mi cuenta");		
			$this->load->view('TemplateEnid/header_template', $data);						
			$this->load->view('micuenta/principal' , $data);	
			$this->load->view('TemplateEnid/footer_template', $data);	
			
	}	
	/*Inicia perfil avanzado*/
	function perfilesavanzado(){
		
			$data = $this->validate_user_sesssion("Configuración perfiles");	
			$recurso = $this->input->get("moduloconfig");					
			$data["modulo"] = $recurso;
			
			$this->load->view('TemplateEnid/header_template', $data);		
			$this->load->view('modulo/moduloconfig.php' , $data);				
			$this->load->view('TemplateEnid/footer_template', $data);						
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





		
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */