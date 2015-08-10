<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accesos extends CI_Controller {

	function __construct(){
		parent::__construct();

        
		$this->load->library('sessionclass');    
	}
	


    /**************************Configuracion de Acceso  avanzado **************++*/
    function configuracionavanzada($id_acceso){

        
        $data = $this->validate_user_sesssion("Acceso más configuraciones");        

        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('escenarios/configuracion_avanzado', $data);
        $this->load->view('TemplateEnid/footer_template', $data);

                
        

    }/**************************Termina Configuracion del acceso avanzado **************++*/

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



	
		
}/*Termina el controlador */
 