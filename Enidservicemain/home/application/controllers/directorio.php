<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Directorio  extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('sessionclass');    
	}
	

	function proveedoresadv(){

		if ( $this->sessionclass->is_logged_in() == 1) {			
			
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Proveedor';

                       	$idproveedor = $this->input->get("p"); 	
                       	$data["proveedor"] = $idproveedor;

                        $this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('directorio/proveedores_directorio_avanzado', $data);
                        $this->load->view('TemplateEnid/footer_template', $data);

				
    	}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}			


	}



	function proveedores(){
		if ( $this->sessionclass->is_logged_in() == 1) {			


			
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Proveedores';
                        $idempresa =  $this->sessionclass->getidempresa();
                        
                      
                       

                        

                        $this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('directorio/proveedores_directorio', $data);
                        $this->load->view('TemplateEnid/footer_template', $data);

				
    	}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}			



	}/*Termina la función*/



		
}/*Termina el controlador */
 