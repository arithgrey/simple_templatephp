<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Planes  extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('sessionclass');    
	}
	/**/
	function registro(){
	
		$data = $this->val_session("");        
		$this->show_data_page('plan/config' , $data);			

	}
	/**/
	function show_data_page( $center_page , $data ){
        
        if ($data["in_session"] == 1) {
        
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
    function val_session($titulo_dinamico_page ){

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
	/**/
	function index(){
		if ( $this->sessionclass->is_logged_in() == 1) {			

			$data['titulo']='Planes empresariales';
			$data['titulo_sistema']='Enid service';
			$data['nombreadministrador'] = $this->sessionclass->getnombre();
				
			$this->load->view('Template/header_white', $data);	
			$this->load->view("plan/userplan" , $data);							
			$this->load->view('Template/footerwhite', $data);			

    	}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}			
	}/*Termina la función*/
}/*Termina el controlador */