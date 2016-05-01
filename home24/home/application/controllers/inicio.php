<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct(){        
        parent::__construct();    
        	
		$this->load->helper("repo");
	    $this->load->helper("eventosh");       
	    $this->load->model("eventmodel");    
	    $this->load->model("repomodel");
	    $this->load->library('sessionclass');	     
    }     
	function eventos($limit_events=3){
		
		$data = $this->val_session("Eventos");											
		$id_empresa =  $this->sessionclass->getidempresa();	
		$data["pagination_event"] = get_pagination_principal($limit_events);					
		$ultimos_eventos = $this->eventmodel->get_last_events($id_empresa , $limit_events );							
		$data["ultimos_eventos"] =  get_last_events_empresa($ultimos_eventos, 270 , 1 , 1 , 1);							
		$this->show_data_page( $data , 'principal/bienvenidaestratega'  );
	}
	/*Termina la función*/	
	function administradorcuenta(){

		$data = $this->val_session("Bienvenido administrador");														
		$id_empresa =  $this->sessionclass->getidempresa();													
		$global = $this->repomodel->reporte_general_inicio_session($id_empresa);
		$data["global"]=  r_gb_empresa($global); 			
		$this->show_data_page( $data , 'reporte/principal');										
	}
	function administrador(){

		$data = $this->val_session("Bienvenido");
		$id_empresa =  $this->sessionclass->getidempresa();	
		$data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 				
		$data["ultimos_eventos"] =$this->eventmodel->get_last_events($id_empresa , 5 );								
		$this->show_data_page( $data , 'principal/bienvenidauserprincipal');		
	}
	/**/
	function logout(){
	
		$this->session->sess_destroy();
		redirect(base_url());
	}	
	/**/
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