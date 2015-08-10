<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emp  extends CI_Controller {

	function __construct(){
		parent::__construct();

     	$this->load->library('sessionclass');    
	}
	


    /**************************La historia de la empresa **************++*/
    function lahistoria(){

        
        $data = $this->validate_user_sesssion("Nuestra historia");        

        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('empresa/historia');
        $this->load->view('TemplateEnid/footer_template', $data);

                
        

    }/**************************La historia de la empresa  **************++*/


    function solicitatusartistaspreferidos(){
        $data = $this->validate_user_sesssion("Tus artistas preferidos a tu alcance");        
        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('empresa/solicita_artistas');
        $this->load->view('TemplateEnid/footer_template', $data);
    }
    
    function entuciudad(){
        $data = $this->validate_user_sesssion("Nosotros en tu ciudad");        
        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('empresa/en_tu_ciudad');
        $this->load->view('TemplateEnid/footer_template', $data);
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



	
		
}/*Termina el controlador */
 