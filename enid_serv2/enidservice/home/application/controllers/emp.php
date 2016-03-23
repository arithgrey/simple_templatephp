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
        $data = $this->val_session("Nuestra historia" , 2);                                        
        $this->show_data_event($data, 'eventos/busqueda');   
    }
	/**/    
    function incidencias(){

        $data = $this->validate_user_sesssion("Incidencias");                
        $id_empresa =  $this->sessionclass->getidempresa();  
        $id_user = $this->sessionclass->getidusuario();        

        $data_tipos_inicidencia    = $this->empresamodel->get_tipos_incidencias($id_empresa);
        $data["tipos_inicidencia"] = tipos_inicidencia_options($data_tipos_inicidencia);
        $data["reportados"]=  usuarios_reportados($this->empresamodel->get_reportados($id_empresa));
        $this->dinamic_view_event('empresa/incidentes' , $data );    
    }   
    /**************************La historia de la empresa **************++*/
    function lahistoria($id_empresa){

        $data = $this->val_session("Nuestra historia" , 2);                                
        $data_empresa= $this->empresamodel->get_empresa_by_id($id_empresa)[0];
        $data["data_empresa"] =  $data_empresa;
        $data["logo_imagen"] =  base_url($data_empresa["base_path_img"].  $data_empresa["nombre_imagen"]);    
        $data["years"]= get_count_select(1 ,  50 , "Años"  , $data_empresa["years"] );
        $data["empresa_contactos_num"] =  $this->empresamodel->get_contactos_empresanum($id_empresa);    
        $data["evento_publicados"] = $this->empresamodel->get_eventos_publicados($id_empresa);
        $data["generos_musicales_emp"] = $this->empresamodel->get_generos_musicales_empresa($id_empresa);

        $data["list_paices"] = $this->empresamodel->get_paices($id_empresa);


        $base_path = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$id_empresa."/emp/";
        $data["base_path"]  =  $base_path;


        if ( create_dinamic_dic($base_path) ==  1 ) {
            $data["base_path"] = $base_path;
        }
        else{
            $data["base_path"] = "1";
        }

        $data["base_path_img"] =  "application/uploads/uploads/empresa/".$id_empresa."/emp/";            

        $data["contacto"] =   $this->contactmodel->get_contacto_empresa($id_empresa);
        $this->load->view("empresa/historia_contactos_modal");
        
        $g = $this->generosmusicalesmodel->get_geros_empresa($id_empresa);        
        $data["tags_generos"]= get_tags_generos($g);


        /*Lista de ciudaddes */
        $data["ciudades_list"] =$this->empresamodel->get_cidades();        
        $this->show_data_event($data, 'empresa/historia');   
        
        
    }/**************************La historia de la empresa  **************++*/


    function entuciudad($id_evento , $status){
        $data = $this->val_session("Nosotros en tu ciudad" , $status );         
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
    


    function val_session($titulo_dinamico_page , $status_event ){

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
    function show_data_event($data, $center_page ){
        
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
    /**/
     function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }
	
}/*Termina el controlador */