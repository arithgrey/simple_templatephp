<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventos extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->library('sessionclass');      
    }

    function index(){

            if( $this->sessionclass->is_logged_in() == 1){            
                
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Eventos';

                        

                    	$this->load->view('TemplateEnid/header_template', $data);

                        $this->load->view('TemplateEnid/footer_template', $data);

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*Termina la función*/





    function nuevo(){

            if( $this->sessionclass->is_logged_in() == 1){            
                
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Nuevo';

                        

                        $this->load->view('TemplateEnid/header_template', $data);

                        $this->load->view('TemplateEnid/footer_template', $data);

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*Termina la función*/












}/*Termina en controlador*/
