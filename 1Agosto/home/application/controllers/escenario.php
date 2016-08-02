<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Escenario  extends CI_Controller {
	function __construct(){
		parent::__construct();

        $this->load->model("eventos_model_cliente");
        $this->load->model("img_model");
        $this->load->model("eventmodel");
        $this->load->model("escenarioartistamodel");
        $this->load->model("escenariomodel");
        $this->load->helper("artistas");
        $this->load->helper("escenario");
        $this->load->helper("img_eventsh");
		$this->load->library('sessionclass');    
	}
    /**************************Configuracion del escenario avanzado **************++*/
    function configuracionavanzada($id_escenario ,  $q ='' ){

        if (valida_session_enid($this->sessionclass->is_logged_in())) {
            
                $evento=  $this->eventmodel->get_by_escenario($id_escenario)[0];                
                $url_evento = base_url("index.php/eventos/nuevo") . "/". $evento["idevento"];
                $data = $this->val_session("");                                                         
                $data["evento"]=  $evento;
                $data["data_escenario"]=$this->escenariomodel->get_escenariobyId($id_escenario)[0]; 
                $data["q"] =  $q;
                $artitastas_data = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);        
                $this->show_data_page( 'escenarios/configuracion_avanzado' , $data);            
        }
           
    }    
    /**************************Termina Configuracion del escenario avanzado **************++*/
	function inevento($id_escenario , $id_evento){

		$dataevent = $this->eventmodel->getEventbyid($id_evento);            
        $url_editar =  base_url("index.php/escenario/configuracionavanzada/" . $id_escenario);
        $data = $this->val_session("");
        $data["evento"] =  $dataevent[0];    
        
        $data["escenario"] = $this->escenariomodel->get_escenariobyId($id_escenario)[0];
        $dias_restantes = $this->eventos_model_cliente->get_dias_faltantes($id_evento);
        $data["dias_restantes_evento"] = get_dias_restantes_evento( $dias_restantes);
        $this->show_data_page('escenarios/principal_escenario' , $data);

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
}/*Termina el controlador */
