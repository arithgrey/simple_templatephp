<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Emp  extends CI_Controller{
	function __construct(){
		parent::__construct();

        $this->load->helper("empresa");
        $this->load->helper("img_eventsh");
        $this->load->model("empresamodel");
     	$this->load->library('sessionclass');    
	}
	/**/    
    function incidencias(){

        $data = $this->validate_user_sesssion("Incidencias");                
        $id_empresa =  $this->sessionclass->getidempresa();  
        $id_user = $this->sessionclass->getidusuario();        

        $data_tipos_inicidencia    = $this->empresamodel->get_tipos_incidencias($id_empresa);
        $data["tipos_inicidencia"] = tipos_inicidencia_options($data_tipos_inicidencia);



        $data["reportados"]=  usuarios_reportados($this->empresamodel->get_reportados($id_empresa));


        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('empresa/incidentes');
        $this->load->view('TemplateEnid/footer_template', $data);
        

    }   
    /**************************La historia de la empresa **************++*/
    function lahistoria(){

        $data = $this->validate_user_sesssion("Nuestra historia");        
        $id_empresa =  $this->sessionclass->getidempresa();  
        $id_user = $this->sessionclass->getidusuario();        

        $data_empresa= $this->empresamodel->get_empresa_by_id($id_empresa)[0];
        $data["data_empresa"] =  $data_empresa;

        $data["logo_imagen"] =  base_url($data_empresa["base_path_img"].  $data_empresa["nombre_imagen"]);

        $data["contactos_empresa"] = data_contactos_empresa($this->empresamodel->get_contactos_empresa($id_empresa, $id_user));    
        $data["years"]= get_count_select(1 ,  50 , "Años"  , $data_empresa["años"] );
        $data["empresa_contactos_num"] =  $this->empresamodel->get_contactos_empresanum($id_empresa);

        $base_path = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/emp/";


        $data["base_path"]  =  $base_path;



        if ( create_dinamic_dic($base_path) ==  1 ) {
            $data["base_path"] = $base_path;
        }
        else{
            $data["base_path"] = "1";
        }

         $data["base_path_img"] =  "application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/emp/";    


        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('empresa/historia');
        $this->load->view('TemplateEnid/footer_template', $data);
        
    }/**************************La historia de la empresa  **************++*/


    function solicitatusartistaspreferidos($id_evento , $status){

        $data = $this->validate_user_session_event("Tus artistas preferidos a tu alcance" , $status ); 
        $this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('empresa/solicita_artistas');
        $this->load->view('TemplateEnid/footer_template', $data);
    }
    
    function entuciudad($id_evento , $status){
        $data = $this->validate_user_session_event("Nosotros en tu ciudad" , $status );         
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
    function validate_user_session_event($titulo_dinamico_page , $status_event ){

        if ( $this->sessionclass->is_logged_in() == 1) {                                        
                    
                    $menu = $this->sessionclass->generadinamymenu();
                    $nombre = $this->sessionclass->getnombre();                                         
                    $data['titulo']= $titulo_dinamico_page ." <span class='btn btn-info'>". get_statusevent($status_event . "</span>");              
                    $data["menu"] = $menu;              
                    $data["nombre"]= $nombre;                                               
                    $data["perfilactual"] =  $this->sessionclass->getnameperfilactual();                

                    return $data;

        }else{
            
            $data['titulo']=$titulo_dinamico_page;              
            return $data;
        }   

    }		
}/*Termina el controlador */
 