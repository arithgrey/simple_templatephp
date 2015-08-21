<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Templates extends CI_Controller {

	function __construct(){
		parent::__construct();
        
        $this->load->model("templmodel");
        $this->load->helper("plantillas");
		$this->load->library('sessionclass');    
	}	
    function eventos(){
        
        $data = $this->validate_user_sesssion("Mis plantillas");
        $id_user = $this->sessionclass->getidusuario();        

        $plantillas_descripcion = $this->templmodel->get_templates_contenido_user_type($id_user, 1);
        $plantillas_restricciones = $this->templmodel->get_templates_contenido_user_type($id_user, 2);
        $data["plantillas_descripcion"] = display_contenido_templ($plantillas_descripcion);
        $data["plantillas_restricciones"] =  display_contenido_templ($plantillas_restricciones);

        $this->dinamic_view_event("plantillas/principal_eventos" , $data);

    }
    /*****************************************************************************/
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





	
		
}/*Termina el controlador */
 