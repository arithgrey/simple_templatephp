<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportecontrolador extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model("reportemodel");                    
        $this->load->library('sessionclass');          
        
    }

    function index(){

        $data = $this->validate_user_sesssion("Ayudanos a mejorar el sistema ");               
        $this->dinamic_view_event('reporte/reportes', $data);
        
    }

     function listarReportes(){
        
        $data= $this->validate_user_sesssion("Reportes y mejoras del sistema");
        $list_repo_system = $this->reportemodel->listarReportes();                    
        $data["list_repo_system"] = $list_repo_system;
        
        $this->dinamic_view_event('reporte/listarReportes/listado' , $data);
        
    }    
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
