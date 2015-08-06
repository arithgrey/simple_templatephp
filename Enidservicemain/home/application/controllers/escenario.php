<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Escenario  extends CI_Controller {

	function __construct(){
		parent::__construct();

        $this->load->model("escenarioartistamodel");
        $this->load->model("escenariomodel");
        $this->load->helper("artistas");
        $this->load->helper("escenario");
		$this->load->library('sessionclass');    
	}
	

	function inevento($id_escenario , $id_evento){

		if ( $this->sessionclass->is_logged_in() == 1) {			
			
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Pre visualizando escenario';                       	
                       

        $artistas_array = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $escenariodb= $this->escenariomodel->get_escenariobyId($id_escenario);
        $data["escenario"] =$escenariodb[0]; 
        $list_escenarios = $this->escenariomodel->get_escenarios_byidevent_menosuno($id_evento , $id_escenario);
        $data["otros_escenarios"]= list_resum_escenarios($list_escenarios, $id_evento);


                        $data["artitas"]= get_artistas_default_template($artistas_array);

                        $this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('escenarios/principal_escenario', $data);
                        $this->load->view('TemplateEnid/footer_template', $data);

				
    	}else{
			/*Terminamos la session*/
			$this->sessionclass->logout();
		}			


	}



	
		
}/*Termina el controlador */
 