<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Directorio  extends CI_Controller {
	function __construct(){
		parent::__construct();

        $this->load->helper("contacto");    
        $this->load->helper("img_eventsh");
        $this->load->model("contactmodel");
		$this->load->library('sessionclass');    

	}
	function proveedoresadv(){
				
        $data = $this->val_session("Proveedor");                        
        $id_proveedor = $this->input->get("p"); 	
        $data["proveedor"] = $id_proveedor;        
        $this->show_data_page( $data ,  'directorio/proveedores_directorio_avanzado');
	}
    /*página principal , contactos */        
	function contactos($limit=10){    	

        $data = $this->val_session("Mis contactos");  
        $id_usuario =  $this->sessionclass->getidusuario();                
        $data_contactos = $this->contactmodel->get_list_contactos($id_usuario);                        
        $data_repo_contactos = $this->contactmodel->get_repo_contactos($id_usuario);            
        $data["list_contactos_name"] = list_contactos_names($data_contactos);        
        $this->show_data_page($data , 'directorio/principal_directorio');    
	}
    /*Termina la función*/
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