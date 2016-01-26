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
    function administrar(){


        $data= $this->validate_user_sesssion("Puntos de venta frecuentemente utilizados por el empresa");    
        $id_empresa =  $this->sessionclass->getidempresa(); 
        $puntos_venta_resumen_data = $this->puntoventamodel->get_resumen_punto_venta($id_empresa);             


        $puntos_venta = $this->puntoventamodel->get_puntos_venta_empresa_usuario($id_empresa , $this->input->get()  );
        

        $base_path = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/pv/";    
        if ( create_dinamic_dic($base_path) ==  1 ) {
            $data["base_path"] = $base_path;
        }
        else{
            $data["base_path"] = "1";
        }        

        $data["base_path"]=  $base_path;
        $data["base_path_img"] = "application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/pv/";    



        
        $data["resumen_puntos_venta"] =  resumen_puntos_venta($puntos_venta_resumen_data);              
        $data["puntos_venta"]= list_puntos_venta_administracion_empresa($puntos_venta);

        $data["puntos_venta_nombres"] =  lista_nombres_punto_venta($puntos_venta);
        $data["estados_puntos_venta"] =  list_estados_puntos_venta($this->puntoventamodel->get_estados_punto_venta());
        $this->dinamic_view_event("puntosventa/principal" , $data);        
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
    /**/
    function dinamic_view_event($center_view , $data){

            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }
}/*Termina en controlador*/