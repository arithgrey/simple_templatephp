<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Busqueda extends REST_Controller{
    function __construct(){
        parent::__construct();
            $this->load->helper("eventosh");   
        $this->load->helper("busqueda");
        $this->load->model("busquedamodel");            
        $this->load->library('sessionclass');    
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
    /**/
    function eventos_pasados_GET(){


        $id_empresa =  $this->sessionclass->getidempresa();        
        $extra =" where   date(e.fecha_registro) between DATE_ADD(CURRENT_DATE() , INTERVAL -14 DAY ) and  CURRENT_DATE()   and  e.idempresa = ". $id_empresa ." ";         
        $extra2 = "  and  2=2  ";
        $db_response =  $this->busquedamodel->get_eventos_dinamic($extra  ,  $extra2 );
        if (count($db_response) > 0 )  {
            $eventos =  get_last_events_empresa($db_response , 270 ,  1 , 1 , 1);                     
            $this->response($eventos);            
        }else{
            $this->response("No se han registrado eventos en los ultimos 14 días ");
        }        
    
    }
    /*listamos los eventos del día */     
    function eventos_dia_GET(){


        $extra =" where   e.fecha_inicio between CURRENT_DATE() and  DATE_ADD(CURRENT_DATE() , INTERVAL 7 DAY ) "; 
        $extra2 = "  and  2=2  ";
        $db_response =  $this->busquedamodel->get_eventos_dinamic($extra  ,  $extra2 );
        $eventos =  get_last_events_empresa($db_response , 270 ,  0 , 0 , 0);         
        $this->response($eventos);
    }    
    /*búsqueda dinámica*/    
    function evento_GET(){
        $param =  $this->get(); 
        $db_response = $this->busquedamodel->load_eventos_busqueda_enid($param);

        if ($db_response["elemento"] > 0) {
            $eventos =  get_last_events_empresa($db_response["eventos"] , 270 ,  0 , 0 , 0);         
            $this->response($eventos);    
        }else{
            $this->response("No existen eventos relacionados a la búsqueda, intente con otra palabra clave");    
        }
    }
    /**/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        
        }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*termina validar session */
}/*Termina rest*/
