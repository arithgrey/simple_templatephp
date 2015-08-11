<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Escenario  extends CI_Controller {

	function __construct(){
		parent::__construct();

        $this->load->model("eventmodel");
        $this->load->model("escenarioartistamodel");
        $this->load->model("escenariomodel");
        $this->load->helper("artistas");
        $this->load->helper("escenario");
		$this->load->library('sessionclass');    
	}
	


    /**************************Configuracion del escenario avanzado **************++*/

    function configuracionavanzada($id_escenario){
        
        $data = $this->validate_user_sesssion("Escenarios avanzado");        
        $this->dinamic_view_event( 'escenarios/configuracion_avanzado' , $data);            
    }
    /**************************Termina Configuracion del escenario avanzado **************++*/
	function inevento($id_escenario , $id_evento){

		$dataevent = $this->eventmodel->getEventbyid($id_evento);

        $data = $this->validate_user_session_event("Escenarios" , $dataevent[0]["status"]);
        $artistas_array = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $escenariodb= $this->escenariomodel->get_escenariobyId($id_escenario);
        $data["escenario"] =$escenariodb[0]; 
        $list_escenarios = $this->escenariomodel->get_escenarios_byidevent_menosuno($id_evento , $id_escenario);
        $data["otros_escenarios"]= list_resum_escenarios($list_escenarios, $id_evento);

        $data["artitas"]= get_artistas_default_template($artistas_array);
        $this->dinamic_view_event('escenarios/principal_escenario' , $data);
        
	}
    /**/
    function validate_user_sesssion($titulo_dinamico_page){

            if ( $this->sessionclass->is_logged_in() == 1) {                        
                    
                    
                    $menu = $this->sessionclass->generadinamymenu();
                    $nombre = $this->sessionclass->getnombre();                                         
                    $data['titulo']=$titulo_dinamico_page;              
                    $data["menu"] = $menu;              
                    $data["nombre"]= $nombre;                                               
                    $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                

                    return $data;

                }else{
                /*Terminamos la session*/
                $this->sessionclass->logout();
            }   
    }
    function validate_user_session_event($titulo_dinamico_page , $status_event ){

        if ( $this->sessionclass->is_logged_in() == 1) {                                        
                    
                    $menu = $this->sessionclass->generadinamymenu();
                    $nombre = $this->sessionclass->getnombre();                                         
                    $data['titulo']= $titulo_dinamico_page ." <span class='btn btn-info'>". get_statusevent($status_event . "</span>");              
                    $data["menu"] = $menu;              
                    $data["nombre"]= $nombre;                                               
                    $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                

                    return $data;

        }else{
            
            $data['titulo']=$titulo_dinamico_page;              
            return $data;
        }   

    }
    /**/
        /**/
    function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }




	
		
}/*Termina el controlador */
 