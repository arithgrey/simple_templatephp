<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {


	function __construct(){        
        parent::__construct();     


	        $this->load->helper("eventosh");       
	        $this->load->model("eventmodel");    
	        $this->load->library('sessionclass');
	    	
	    	
	        
    }     




function eventos($limit_events=3){

				$data = $this->validate_user_sesssion("Eventos");											
				$idempresa =  $this->sessionclass->getidempresa();	
				$data["pagination_event"] = get_paginarion_principal($limit_events);
				$data["ultimos_eventos"] =$this->eventmodel->get_last_events($idempresa , $limit_events );					

				$this->load->view('TemplateEnid/header_template', $data);		
				$this->load->view('principal/bienvenidaestratega' , $data);
				$this->load->view('TemplateEnid/footer_template', $data);	
}


	/*Termina la función*/
	






function administradorcuenta(){

		$data = $this->validate_user_sesssion("Bienvenido administrador");														
		$idempresa =  $this->sessionclass->getidempresa();								
		$this->load->view('TemplateEnid/header_template', $data);		
		$this->load->view('principal/bienvenidaAdmincuentaempresarial' , $data);
		$this->load->view('TemplateEnid/footer_template', $data);	
			

	}



























function administrador(){

	$data = $this->validate_user_sesssion("Bienvenido");
	$idempresa =  $this->sessionclass->getidempresa();	
	$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 				

	$data["ultimos_eventos"] =$this->eventmodel->get_last_events($idempresa , 5 );					
	$this->load->view('TemplateEnid/header_template', $data);		
	$this->load->view('principal/bienvenidauserprincipal' , $data);
	$this->load->view('TemplateEnid/footer_template', $data);	


	}



/**/

	
	
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


	function logout(){
	
		$this->session->sess_destroy();
		redirect(base_url());
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */