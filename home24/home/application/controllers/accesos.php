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
    function configuracionavanzada($id_acceso, $id_evento){

        $data_evento  = $this->eventmodel->getEventbyid($id_evento);        
        $nombre_evento = $data_evento[0]["nombre_evento"];


        $url_evento =  base_url('index.php/eventos/nuevo'). "/" . $data_evento[0]["idevento"];
        $data = $this->val_session("Accesos al evento ". "<a href='".$url_evento  ."'>" .$nombre_evento . "</a>");        
        $data_accesos = $this->accesosmodel->get_acceso_by_event($id_evento);  

        $id_user = $this->sessionclass->getidusuario();        
        $id_empresa =  $this->sessionclass->getidempresa();  
        //$puntos_venta = $this->puntoventamodel->load_puntos_venta_evento($id_evento);

        
        $data["resumen_accesos"] = resumen_puntos_venta_f($this->puntoventamodel->get_resumen_accesos($id_evento) );
        $data["resumen_puntos_venta_asociados"] = get_resumen_puntos_venta_asociados($this->puntoventamodel->get_puntos_venta_asociadas($id_evento));

        $data["evento"] = $id_evento;                
        $data["accesos_in_event"] = display_complete_info($data_accesos);
        
        
        $data["tipos_accesos"] = $this->accesosmodel->get_tipos_accesos(); 

        //$data["puntos_venta"]= list_puntos_venta_evento($puntos_venta);
        $data["empresa"] =  $id_empresa;
        $data["id_evento"] =  $id_evento;
        $data["nombre_evento"] =   $nombre_evento;

        /**/
        $base_path = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/a/".$id_user."/";    
        if ( create_dinamic_dic($base_path) ==  1 ) {
            $data["base_path"] = $base_path;
        }
        else{
            $data["base_path"] = "1";
        }        

        $data["base_path"]=  $base_path;
        $data["base_path_img"] =  "application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/a/".$id_user."/";    

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
 