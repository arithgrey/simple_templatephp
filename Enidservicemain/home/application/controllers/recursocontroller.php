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
			$this->dinamic_view_event('perfiles/principal', $data);							
			
	}	
	function usuarios(){

			$perfil = $this->sessionclass->getperfiles();
			$data= $this->validate_user_sesssion("Miembros de la cuenta ");				
			$iduser  = $this->sessionclass->getidusuario();
		    $integrantes  = $this->cuentageneralmodel->getintegrantesinforme($iduser);								
		    $data["integrantes"]= $integrantes;			
			$this->dinamic_view_event(displayviewusuario( $perfil ), $data);	
			
	}		
	function informacioncuenta(){
				
			$data = $this->validate_user_sesssion("Mi cuenta");					
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

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */