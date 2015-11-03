<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Escenario  extends CI_Controller {
	function __construct(){
		parent::__construct();

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
    function configuracionavanzada($id_escenario){



        $evento =  $this->eventmodel->get_by_escenario($id_escenario);
        $nombre_evento = $evento[0]["nombre_evento"];        
        ///1
        $id_evento= $evento[0]["idevento"];
        $url_evento = base_url("index.php/eventos/nuevo") . "/". $id_evento ;





        $data = $this->validate_user_sesssion("Escenario del evento " . "<a href='".$url_evento ."'>" . $nombre_evento . "</a>");                                                         
        $base_path = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/ee/";
        $base_path_artista = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/ar/";
  



        $escenarios_data =  $this->escenariomodel->get_escenarios_evento($id_evento);
        $data["otros_escenarios"] =  escenarios_in_evento($escenarios_data , $id_escenario);

        if ( create_dinamic_dic($base_path) ==  1 ) {
            $data["base_path"] = $base_path;
        }
        else{
            $data["base_path"] = "1";
        }

        
        if (create_dinamic_dic($base_path_artista) ==  1 ) {
            $data["base_path_artista"] =  $base_path_artista;
        }else{
            $data["base_path_artista"]  = 1;

        }


      


        
        $img_data = $this->img_model->get_imgs_escenario($id_escenario);


        /***************************/
        $data["slider_principal_escenario"] =  get_slider_img($img_data);

        $data["nombre_evento"] =  $nombre_evento;
        
        $data_escenario = $this->escenariomodel->get_escenariobyId($id_escenario);                 
        $data["data_escenario"]=$data_escenario[0];

        $descripcion_escenario =trim($data_escenario[0]["descripcion"]);        

        if (empty( $descripcion_escenario)  || is_null($descripcion_escenario ) ||  strlen($descripcion_escenario) == 0   ){

            $data["descripcion_escenario"] =  "Describe la experiencia del escenario";

        }else{
            
            $data["descripcion_escenario"] =  $data_escenario[0]["descripcion"];        
        }
        

                                                   
        $data["base_path_img"] =  $path_img_base = "application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/ee/";
        $data["base_path_img_artista"] =  $path_img_base = "application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/ar/";



        $artitastas_data = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $data['artistas'] = list_artistas_escenario($artitastas_data, 'Artistas que se presentarán en este escenario' , 1 , $id_escenario);
        $data['id_escenario'] =  $id_escenario;

        $data['resumen_artistas'] = resumen_artistas_table($this->escenarioartistamodel->get_artistas_resumen($id_escenario, $data_escenario[0], $nombre_evento ));         

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