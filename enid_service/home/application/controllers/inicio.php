<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct(){        
        parent::__construct();     
	        $this->load->helper("eventosh");       
	        $this->load->model("eventmodel");    
	        $this->load->library('sessionclass');	     
    }     
	function eventos($limit_events=3){

			//date_default_timezone_set( 'Europe/Paris' );
			$data = $this->validate_user_sesssion("Eventos");											
			$id_empresa =  $this->sessionclass->getidempresa();	
			$data["pagination_event"] = get_pagination_principal($limit_events);			
		
			$ultimos_eventos = $this->eventmodel->get_last_events($id_empresa , $limit_events );							
			$data["ultimos_eventos"] =  get_last_events_empresa($ultimos_eventos, 270 , 1 , 1 , 1);
			
			$this->dinamic_view_event('principal/bienvenidaestratega' , $data);
	}
	/*Termina la función*/
	function administradorcuenta(){

			$data = $this->validate_user_sesssion("Bienvenido administrador");														
			$id_empresa =  $this->sessionclass->getidempresa();													
			$this->dinamic_view_event('principal/bienvenidaAdmincuentaempresarial' , $data);			

	}
	function administrador(){

			$data = $this->validate_user_sesssion("Bienvenido");
			$id_empresa =  $this->sessionclass->getidempresa();	
			$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 				

			$data["ultimos_eventos"] =$this->eventmodel->get_last_events($id_empresa , 5 );					
			
			$this->dinamic_view_event('principal/bienvenidauserprincipal' , $data);
			


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
	/**/
	function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                                  
            $this->load->view('TemplateEnid/footer_template', $data);    
    }
	
}