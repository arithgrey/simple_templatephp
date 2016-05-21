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
    function configuracionavanzada($id_escenario){

        $evento =  $this->eventmodel->get_by_escenario($id_escenario);
        $nombre_evento = $evento[0]["nombre_evento"];                
        $id_evento= $evento[0]["idevento"];
        $url_evento = base_url("index.php/eventos/nuevo") . "/". $id_evento ;

        $data = $this->val_session("");                                                         
        $escenarios_data =  $this->escenariomodel->get_escenarios_evento($id_evento);
        $data["otros_escenarios"] =  escenarios_in_evento($escenarios_data , $id_escenario);        

       
        $data["nombre_evento"] =  $nombre_evento;    
        $data_escenario = $this->escenariomodel->get_escenariobyId($id_escenario);                 
        $data["data_escenario"]=$data_escenario[0];

        $descripcion_escenario =trim($data_escenario[0]["descripcion"]);        

        if (empty( $descripcion_escenario)  || is_null($descripcion_escenario ) ||  strlen($descripcion_escenario) == 0   ){
            $data["descripcion_escenario"] =  "Describe la experiencia del escenario";
        }else{            
            $data["descripcion_escenario"] =  $data_escenario[0]["descripcion"];        
        }
        $artitastas_data = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);        
        $data['id_escenario'] =  $id_escenario;        
        $data["tipo_escenario_start"] =   get_start($data_escenario[0]["tipoescenario"] , "Principal"); 
        $this->show_data_page( 'escenarios/configuracion_avanzado' , $data);            
           
    }    
    /**************************Termina Configuracion del escenario avanzado **************++*/
	function inevento($id_escenario , $id_evento){

		$dataevent = $this->eventmodel->getEventbyid($id_evento);            
        $url_editar =  base_url("index.php/escenario/configuracionavanzada/" . $id_escenario);
        $data = $this->val_session("<a href='".$url_editar ."'>Editar</a>");
        $data["evento"] =  $dataevent[0];    

        $artistas_array = $this->escenarioartistamodel->get_artistas_inevent($id_escenario);
        $escenariodb= $this->escenariomodel->get_escenariobyId($id_escenario);
        $data["escenario"] =$escenariodb[0];                 

        $img_data = $this->img_model->get_imgs_escenario($id_escenario);


        $data_escenario["nombre_escenario"] =  $escenariodb[0]["nombre"];
        $data["slider_principal_escenario"] =  get_slider_img($img_data , $data_escenario , 1);

        $list_escenarios = $this->escenariomodel->get_escenarios_byidevent_menosuno($id_evento , $id_escenario);
        $data["otros_escenarios"]= list_resum_escenarios($list_escenarios, $id_evento, 200);
        $data["generos_tags"] = get_generos( $this->escenariomodel->get_generos($id_escenario, $id_evento) );


        $data["artitas"]= get_artistas_default_template($artistas_array);
        $data["artistas_info"] =  get_info_artistas_escenario_user($artistas_array);

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
