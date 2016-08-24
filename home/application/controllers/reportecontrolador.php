<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportecontrolador extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper("repo");
        $this->load->model("reportemodel");                    
        $this->load->library('sessionclass');                  
    }
    function index(){
        $data = $this->val_session("Ayudanos a mejorar nuestros servicios");               
        $this->show_data_page( $data , 'reporte/reportes');        
    }
    /**/
    function listarReportes(){
        
        $data= $this->val_session("Reportes y mejoras del sistema");
        $list_repo_system = $this->reportemodel->listarReportes();                    
        $data["list_repo_system"] = $list_repo_system;
        
        $this->show_data_page($data , 'reporte/listarReportes/listado');
        
    }    
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
}