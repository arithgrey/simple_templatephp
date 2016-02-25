<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tendencias extends CI_Controller {
    function __construct(){
        parent::__construct();

        $this->load->helper("tenden");
        $this->load->model("eventmodel");
        $this->load->model("tendencias_model");
        $this->load->library('sessionclass');           
    }
    function eventosporusuario(){

        $data = $this->validate_user_sesssion("Eventos por usuario");        
        $id_empresa =  $this->sessionclass->getidempresa();        
        $this->dinamic_view_event('tendencias/user_events' , $data);        
    }
    /**/
    function lineatiempo(){

            $data = $this->validate_user_sesssion("Linea de tiempo");
            $this->load->helper("timelineevent");
            $id_empresa =  $this->sessionclass->getidempresa();
            $longitud_descripcion_text = 150;

            $arreglo_time_line = $this->eventmodel->get_last_events($id_empresa , 100 );
            $data["time_line"] = get_time_line_event($arreglo_time_line, $longitud_descripcion_text);

            $this->dinamic_view_event('eventos/eventos_pasados' , $data);
            
    }/*Termina la función*/    
    /********************Para el administrador **********************/
    
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
    /**/
    function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }





        
}