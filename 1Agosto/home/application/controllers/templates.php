<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Templates extends CI_Controller {
	function __construct(){
		parent::__construct();        
        $this->load->model("templmodel");
        $this->load->helper("plantillas");
		$this->load->library('sessionclass');    
	}	
    /**/
    function eventos($q=''){     

        if (valida_session_enid($this->sessionclass->is_logged_in())) {
            $data = $this->val_session("");
            $id_user = $this->sessionclass->getidusuario();        
            $id_empresa =  $this->sessionclass->getidempresa();     
            $data["q"] =  $q;              
            $this->show_data_page( $data , "plantillas/principal_eventos" );    
        }    
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

   
    /**/

	
}/*Termina el controlador */
 