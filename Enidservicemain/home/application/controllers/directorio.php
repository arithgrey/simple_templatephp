<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Directorio  extends CI_Controller {
	function __construct(){
		parent::__construct();

        $this->load->helper("contacto");    
        $this->load->helper("img_eventsh");
        $this->load->model("contactmodel");
		$this->load->library('sessionclass');    

	}
	function proveedoresadv(){
				
                        $data = $this->validate_user_sesssion("Proveedor");                        
                       	$idproveedor = $this->input->get("p"); 	
                       	$data["proveedor"] = $idproveedor;

                        $this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('directorio/proveedores_directorio_avanzado', $data);
                        $this->load->view('TemplateEnid/footer_template', $data);
	}
    /*página principal , contactos */    

	function contactos(){    		

        $data = $this->validate_user_sesssion("Mis contactos");  
        $id_usuario =  $this->sessionclass->getidusuario();

        $base_path = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  )."application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/cu/".$id_usuario."/";    
        if ( create_dinamic_dic($base_path) ==  1 ) {
            $data["base_path"] = $base_path;
        }
        else{
            $data["base_path"] = "1";
        }        

        $data["base_path"]=  $base_path;
        $data["base_path_img"] =  "application/uploads/uploads/empresa/".$this->sessionclass->getidempresa()."/cu/".$id_usuario."/";    

        $data_contactos = $this->contactmodel->get_list_contactos($id_usuario);
        $data_tipos = $this->contactmodel->get_tipos_contactos($id_usuario);
        $data_repo_contactos = $this->contactmodel->get_repo_contactos($id_usuario);        
        $data["resumen"]=resumen_contactos( $data_repo_contactos);
        $data["list_contactos_name"] = list_contactos_names($data_contactos);
        $data["lista_tipo"] = filtro_tipo_contacto($data_tipos);
        $this->dinamic_view_event('directorio/principal_directorio', $data);    


	}/*Termina la función*/


    /*Validamos la session del usuario*/
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
 

    /*Desplegar views */  
    function dinamic_view_event($center_view , $data){
            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view($center_view, $data);                                      
            $this->load->view('TemplateEnid/footer_template', $data);    
    }		
}/*Termina el controlador */