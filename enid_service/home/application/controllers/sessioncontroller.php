<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sessioncontroller extends CI_Controller {
	function __construct(){        
        parent::__construct();            
                    
        $this->load->library('sessionclass');        
    }         
    function iniciosessionuser(){

    	if ( $this->sessionclass->is_logged_in() == 1) {			    		
    		redirect(base_url('index.php/sessioncontroller/presentacion/'));
    	}else{

    		$data['titulo']='Sign In';    		
			$this->load->view('TemplateEnid/header_template_all_user', $data);
			$this->load->view('user/signin', $data);
			$this->load->view('TemplateEnid/footer_template', $data);							
    	}

    }
	function presentacion(){									
		/*Validamo session*/
		if( $this->sessionclass->is_logged_in() == 1){				

			$first =$this->input->get("first");
				if ($first == 1) {
						
					/*Redirect plan */		
					$next =  site_url("plan");
					redirect($next , $method = 'location', 302);
				}else{
					$this->usuarioregistrado();	
				}			
		}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}	
	}/**/
	function usuarioregistrado(){

		if ( $this->sessionclass->is_logged_in() == 1) {			
						
			$perfil = $this->sessionclass->getperfiles();							
			$idperfilnow =  $perfil[0]["idperfil"];
			switch ($idperfilnow) {
				case 5:
				redirect( base_url('index.php/inicio/eventos') );	
					break;																								
				case 3:
					redirect( base_url('index.php/inicio/administrador') );	
					break;														
				case 4:
					redirect( base_url('index.php/inicio/administradorcuenta') );	
					break;							
				default:
					break;
				}		
				
			}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}	

	}/*Termina la función */

	function logout(){						
		$this->sessionclass->logout();		
	}	

}