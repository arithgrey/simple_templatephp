<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reportecontrolador extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->model("reportemodel");            
        $this->load->model("model_pdf" , "pdf");
        $this->load->library('sessionclass');  
        
        
    }

    function index()
    {



            if ( $this->sessionclass->is_logged_in() == 1) {            
                
                $menu = $this->sessionclass->generadinamymenu();            
                $data["menu"] = $menu;
                $nombre = $this->sessionclass->getnombre();
                //$data["datosperfil"] = $this->sessionclass->getuserdataperfil();          
                $data["nombre"]= $nombre;
                $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                $data['titulo']='Mejora continua';

                        $data['titulo']='Informe de error';

                    	$this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('reporte/reportes');
                        $this->load->view('TemplateEnid/footer_template', $data);

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   



    	
    }

     function listarReportes()
    {

                
                $data= $this->validate_user_sesssion("Reportes y mejoras del sistema");
                $list_repo_system = $this->reportemodel->listarReportes();                    
                $data["list_repo_system"] = $list_repo_system;
                $this->load->view('TemplateEnid/header_template', $data);
                $this->load->view('reporte/listarReportes/listado');
                $this->load->view('TemplateEnid/footer_template', $data);


            

    }
    

     function exportaPDF(){
        $data['titulo']='PDF de Reportes';

        $data["reportesystema"] = $this->pdf->getReportes();

        $this->load->view('Template/header_general', $data);
        $this->load->view('reporte/exportaPDF/documento');
        $this->load->view('Template/footer', $data);
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


}
