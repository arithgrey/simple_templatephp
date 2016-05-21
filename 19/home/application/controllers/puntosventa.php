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
    function administrar($limit=10){


        $data= $this->val_session("Puntos de venta frecuentemente utilizados por el empresa");    
        $id_empresa =  $this->sessionclass->getidempresa(); 
        $puntos_venta_resumen_data = $this->puntoventamodel->get_resumen_punto_venta($id_empresa);             
        $puntos_venta = $this->puntoventamodel->get_puntos_venta_empresa_usuario($id_empresa , $this->input->get() , $limit  );        

        $data["resumen_puntos_venta"] =  resumen_puntos_venta($puntos_venta_resumen_data);              
        $data["puntos_venta"]= list_puntos_venta_administracion_empresa($puntos_venta , $limit );
        $puntos_venta_data  = $this->puntoventamodel->get_estados_punto_venta();

        $data["puntos_venta_nombres"] =  lista_nombres_punto_venta($puntos_venta);
        $data["estados_puntos_venta"] =  list_estados_puntos_venta($puntos_venta_data);        
        $data["zonas_punto_venta"] =  lista_zonas_punto_venta();
        $this->show_data_page($data , "puntosventa/principal");        
    }
    /**/
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
}/*Termina en controlador*/