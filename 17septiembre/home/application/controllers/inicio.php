<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inicio extends CI_Controller {
	function __construct(){        
        parent::__construct();    
        	
		$this->load->helper("repo");
	    $this->load->helper("eventosh");       
	    $this->load->model("eventmodel");    
	    $this->load->model("empresamodel");    
	    $this->load->model("repomodel");
	    $this->load->library('sessionclass');	     
    }    
    /**/
    function empresas(){
		
		$data = $this->val_session("Bienvenido");
		$id_empresa =  $this->sessionclass->getidempresa();		

		if ($id_empresa ==  1 ){
			$this->show_data_page( $data , 'empresa/empresas_enid.php');			
		}else{
			redirect(base_url());
		}		

		
    }
    /**/ 
	function eventos($q=''){

		if (valida_session_enid($this->sessionclass->is_logged_in())) {
			$data = $this->val_session("Eventos");		
			$data["id_empresa"] =  $this->sessionclass->getidempresa();
			$data["q"] = $q;
			$this->show_data_page( $data , 'principal/bienvenidaestratega' , $data );	
		}				

	}
	/*Termina la función*/	
	function index(){

		if (valida_session_enid($this->sessionclass->is_logged_in())) {

			$data = $this->val_session("Bienvenido");	
			$id_empresa =  $this->sessionclass->getidempresa();
			$data["id_empresa"] =  $id_empresa; 
			$data["nombre_user"]= $this->sessionclass->getnombre();
			$data["data_empresa"] =  $this->empresamodel->get_empresa($id_empresa);
			$this->show_data_page( $data , 'reporte/principal' );			
		}							
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