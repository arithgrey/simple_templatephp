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


        $evento =  $this->eventmodel->get_by_escenario($id_escenario);
        $nombre_evento = $evento[0]["nombre_evento"];
        $data = $this->validate_user_sesssion("Escenario del evento " . $nombre_evento);      

        $data_escenario = $this->escenariomodel->get_escenariobyId($id_escenario);         
        $data["data_escenario"]=$data_escenario[0];
        $artitastas_data = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $data['artistas'] = list_artistas_escenario($artitastas_data, 'Artistas que se presentarán en este escenario' , 1 , $id_escenario);

        $this->dinamic_view_event( 'escenarios/configuracion_avanzado' , $data);            
    }
    /**************************Termina Configuracion del escenario avanzado **************++*/
	function inevento($id_escenario , $id_evento){

		$dataevent = $this->eventmodel->getEventbyid($id_evento);    
        
        $data = $this->validate_user_session_event("Escenarios" , $dataevent[0]["status"]);
        $data["evento"] =  $dataevent[0];
        $artistas_array = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $escenariodb= $this->escenariomodel->get_escenariobyId($id_escenario);
        $data["escenario"] =$escenariodb[0]; 
        $list_escenarios = $this->escenariomodel->get_escenarios_byidevent_menosuno($id_evento , $id_escenario);
        $data["otros_escenarios"]= list_resum_escenarios($list_escenarios, $id_evento, 200);
        $data["generos_tags"] = get_generos( $this->escenariomodel->get_generos($id_escenario, $id_evento) );

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
                    $data['titulo']= $titulo_dinamico_page . "<span class='btn btn-info edit-status-event'><a data-toggle='modal' data-target='#update-status-ev-modal'>" . get_statusevent($status_event) . " <i class='fa fa-edit'></i></span></a>";              
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
        /**/
    function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }




	
		
}/*Termina el controlador */
 