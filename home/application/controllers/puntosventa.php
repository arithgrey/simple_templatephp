<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Puntosventa extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->helper("img_eventsh");
        $this->load->helper("puntoventa");
        $this->load->model("puntoventamodel");
        $this->load->library('sessionclass');      
    }
    /*vista administrar puntos de venta*/        
    function administrar($q='' ,  $qmodal = ''){        
        
        if (valida_session_enid($this->sessionclass->is_logged_in())) {    
            
            $data= $this->val_session();    
            $id_empresa =  $this->sessionclass->getidempresa();                                 
            $data["q"] =  $q;
            $data["qmodal"] =   $qmodal;                        
            $data["zonas_punto_venta"] =  lista_zonas_punto_venta();
            $this->show_data_page($data , "puntosventa/principal");    
        }    
    }
    /**/
    function val_session($titulo_dinamico_page =  ""){

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
}/*Termina en controlador*/