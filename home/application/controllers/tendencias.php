<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tendencias extends CI_Controller {
    function __construct(){
        parent::__construct();

        $this->load->helper("tenden");
        $this->load->model("eventmodel");
        $this->load->model("tendencias_model");
        $this->load->library('sessionclass');           
    }

    function comunidad(){

        $data = $this->val_session("Solicitudes");                
        $this->show_data_page( $data , 'tendencias/solicitudesempresa'  );                 
    }
    
    /**/
    function gestionar(){
        $data = $this->val_session("Actividades a gestionar");                
        $this->show_data_page( $data , 'tendencias/gestionar'  );            
    }
    /**/
    function miseventos(){
        $data = $this->val_session("Mis eventos");                
        $this->show_data_page( $data , 'tendencias/eventos_users'  );            
    }
    /**/
    function index(){
        $data = $this->val_session("Global");                
        $this->show_data_page( $data , 'tendencias/global'  );            
    }
    function eventosporusuario(){

        $data = $this->val_session("Eventos por usuario");        
        $id_empresa =  $this->sessionclass->getidempresa();        
        $this->show_data_page( $data , 'tendencias/user_events'  );        
    }
    /**/
    function lineatiempo(){

            $data = $this->val_session("Linea de tiempo");
            $this->load->helper("timelineevent");
            $id_empresa =  $this->sessionclass->getidempresa();
            $longitud_descripcion_text = 150;

            $arreglo_time_line = $this->eventmodel->get_last_events($id_empresa , 100 );
            $data["time_line"] = get_time_line_event($arreglo_time_line, $longitud_descripcion_text);

            $this->show_data_page($data ,  'eventos/eventos_pasados');
            
    }/*Termina la función*/    
    /********************Para el administrador **********************/    
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
       
}