<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesos extends CI_Controller {
	function __construct(){
		parent::__construct();

        $this->load->model("puntoventamodel");
        $this->load->helper("img_eventsh");
        $this->load->helper("puntoventa");                
        $this->load->model("eventmodel");
        $this->load->model("accesosmodel");
        $this->load->helper("accesos");
		$this->load->library('sessionclass');    
	}	    
    /**************************Configuracion de Acceso  avanzado **************++*/    
    function configuracionavanzada($id_acceso, $id_evento , $q='' , $q2= ''){
        
        valida_session_enid($this->sessionclass->is_logged_in());  
        $data_evento  = $this->eventmodel->getEventbyid($id_evento);        
        $data = $this->val_session("");        
        $data["data_evento"] =  $data_evento[0]; 
        $id_user = $this->sessionclass->getidusuario();        
        $id_empresa =  $this->sessionclass->getidempresa();  
        $data["tipos_accesos"] = $this->accesosmodel->get_tipos_accesos();         
        $data["empresa"] =  $id_empresa;    
        $data["q"] =  $q;
        $data["q2"] =  $q2; 
        $this->show_data_page( $data , 'accesos/avanzado');        

    }/**************************Termina Configuracion del acceso avanzado **************++*/

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

}/*Termina el controlador */
 