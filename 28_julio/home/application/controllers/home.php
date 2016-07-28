<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	function __construct(){        
        parent::__construct();            
        $this->load->library('sessionclass');
    }     
	function index(){


		if ( $this->sessionclass->is_logged_in() == true) {
			redirect(base_url('index.php/startsession/presentacion/'));			
		}else{					        
            $data = $this->val_session("");
            $this->show_data_page($data, "home");
			$this->session->sess_destroy();		
		}

	}
    /*Termina index*/
	function signup(){
		if ( $this->sessionclass->is_logged_in() == true) {
			redirect(base_url('home/index.php/inicio/administrador'));
		}else{				
			$data['titulo']='Registrar cuenta ahora';
			$this->show_data_page($data, 'user/usergeneralsignup');			
		}					
	}/*Termina la funcioón*/	
	function logout(){	
		$this->session->sess_destroy();
		redirect(base_url());
	}
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
    function show_landing($center_page , $data){
        $this->load->view('TemplateEnid/heade_landing_template', $data);
        $this->load->view($center_page , $data);            
        $this->load->view('TemplateEnid/footer_landing_template', $data);        
    }
}
