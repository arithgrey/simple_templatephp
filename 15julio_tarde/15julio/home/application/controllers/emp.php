<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emp  extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->helper("empresa");
        $this->load->helper("img_eventsh");
        $this->load->helper("generoshelp");
        $this->load->model("generosmusicalesmodel");
        $this->load->model("contactmodel");
        $this->load->model("empresamodel");
     	$this->load->library('sessionclass');    
	}
    /**/
    function nuestroseventos(){        
        $data = $this->val_session("Nuestra historia" );                                        
        $this->show_data_page('eventos/busqueda'  , $data );   
    }
	/**/    
    function incidencias(){

        $data = $this->val_session("Incidencias");                
        $id_empresa =  $this->sessionclass->getidempresa();  
        $id_user = $this->sessionclass->getidusuario();        
        $data_tipos_inicidencia    = $this->empresamodel->get_tipos_incidencias($id_empresa);
        $data["tipos_inicidencia"] = tipos_inicidencia_options($data_tipos_inicidencia);
        $data["reportados"]=  usuarios_reportados($this->empresamodel->get_reportados($id_empresa));
        $this->show_data_page('empresa/incidentes' , $data );    
    }   
    /**/    
    function cuentanostuhistoria($id_empresa){
        
        $data = $this->val_session("Cuentanos tu historia" ); 
        $data_empresa= $this->empresamodel->get_empresa_by_id($id_empresa)[0];
        $data["data_empresa"] =  $data_empresa;
        $this->show_data_page('empresa/cuentanos_tu_historia' , $data);
    }
    /***********************/
    function solicitatuartista($id_empresa){
        
        $data = $this->val_session("Solicita tu artista" ); 
        $data_empresa= $this->empresamodel->get_empresa_by_id($id_empresa)[0];
        $data["data_empresa"] =  $data_empresa;
        $data["ciudades_list"] =$this->empresamodel->get_cidades();        
        $this->show_data_page('empresa/solicita_artista' , $data );
    }
    /**************************La historia de la empresa ***************/    
    function lahistoria($id_empresa){        

        $data = $this->val_session("Nuestra historia" ); 
        $data_empresa= $this->empresamodel->get_empresa_by_id($id_empresa)[0];        
        /**/
           
        
            $iconos_experiencia =  $this->empresamodel->get_iconos_sociales($id_empresa);        
            $data["iconos_experiencia_cliente"] =  contruye_iconos_experiencia_cliente($iconos_experiencia); 
        


            $data["data_empresa"] =  $data_empresa;        
            $data["years"]= get_count_select(1 ,  50 , "Años"  , $data_empresa["years"] );
            $data["empresa_contactos_num"] =  $this->empresamodel->get_contactos_empresanum($id_empresa);    
            $data["evento_publicados"] = $this->empresamodel->get_eventos_publicados($id_empresa);
            $data["generos_musicales_emp"] = $this->empresamodel->get_generos_musicales_empresa($id_empresa);            
            $data["contacto"] =   $this->contactmodel->get_contacto_empresa($id_empresa);        
            $g = $this->generosmusicalesmodel->get_geros_empresa($id_empresa);        
            $data["tags_generos"]= get_tags_generos($g);        
        $this->show_data_page( 'empresa/historia' , $data );   
            
    }/**************************La historia de la empresa  **************++*/

    function entuciudad($id_evento , $status){
        $data = $this->val_session("Nosotros en tu ciudad" );         
        show_data_page("empresa/en_tu_ciudad" , $data );         
    }
    /**/
    function val_session($titulo_dinamico_page ){        
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
    function show_data_page( $center_page , $data ){
        
        if ($data["in_session"] == 1) {
        
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_page , $data);            
            $this->load->view('TemplateEnid/footer_template', $data);

        }else{  
        
            $this->load->view('TemplateEnid/header_template_all_user', $data);
            $this->load->view($center_page , $data);            
            $this->load->view('TemplateEnid/footer_template', $data);
        }                
      
    }
    
}/*Termina el controlador */