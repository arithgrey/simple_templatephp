<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesos extends CI_Controller {

	function __construct(){
		parent::__construct();

        $this->load->model("eventmodel");
        $this->load->model("accesosmodel");
        $this->load->helper("accesos");
		$this->load->library('sessionclass');    
	}
	
    /*****************************************************************************/

    /**************************Configuracion de Acceso  avanzado **************++*/
    function configuracionavanzada($id_acceso, $id_evento){


        $data_evento  = $this->eventmodel->getEventbyid($id_evento);
        $nombre_evento = $data_evento[0]["nombre_evento"];
        $data = $this->validate_user_sesssion("Acceso al evento ". $nombre_evento );        
        $data_accesos = $this->accesosmodel->get_acceso_by_event($id_evento);                                                                                                                      
        $data["evento"] = $id_evento;                
        $data["accesos_in_event"] = display_complete_info($data_accesos);
        $data["tipos_accesos"] =list_tipos_accesos( $this->accesosmodel->get_tipos_accesos());
        
        $this->dinamic_view_event('accesos/avanzado', $data);        

    }/**************************Termina Configuracion del acceso avanzado **************++*/

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
    /**/
     function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }





	
		
}/*Termina el controlador */
 