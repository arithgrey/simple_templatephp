<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Emp extends REST_Controller{      
    function __construct(){
        parent::__construct();			
        $this->load->helper("artistas");       
        $this->load->helper("empresa");       
        $this->load->helper("generoshelp");     	
        $this->load->model("generosmusicalesmodel");     
        $this->load->model("empresamodel"); 	                 
        $this->load->model("organizacionmodel");
        $this->load->library('sessionclass');                    
    }
    /**/
    function historias_publico_admin_GET(){
        $this->validate_user_sesssion();  
        $param["empresa"] =  $this->sessionclass->getidempresa();        
        $db_response =  $this->empresamodel->get_experiencias($param);                        
        $historias_cliente =  comentarios_administrador($db_response);
        $this->response($historias_cliente);     
    }
    /**/    
    function historias_publico_GET(){
        /**/
        $param = $this->get();        
        $db_response =  $this->empresamodel->get_experiencias($param);                        
        //$historias_cliente =  comentarios_clientes($db_response);
        $block =  experiencias($db_response);
        $this->response($block);     
    }
    /**/
    function objeto_GET(){
        $this->validate_user_sesssion();  
        $param =  $this->get();
        $db_response = $this->empresamodel->get_obj($param);
        $this->response($db_response);        
    }
    /**/
    function objeto_nota_PUT(){
        $this->validate_user_sesssion();  
        $param =  $this->put();
        $db_response = $this->empresamodel->update_descripcion_objeto_permitido($param);
        $this->response($db_response);           
    }
    /**/    
    function solicitud_ciudad_POST(){        
        $data = $this->post();
        $db_response = $this->empresamodel->solicitud_ciudad_cliente($data);
        $this->response($db_response );
    }
    /**/
    function solicitudartista_POST(){
        $db_response = $this->empresamodel->insert_solicidud_artista($this->post());
        $this->response($db_response );
    }
    /**/
    function laexperiencia_POST(){        
        $param = $this->post(); 
        $db_response = $this->empresamodel->insert_experiencia($param);        
        $this->response($db_response);    
    }
    /**/
    function genero_musical_DELETE(){
    
        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();                     
        $id_genero  =  $this->delete("genero");
        $db_response = $this->generosmusicalesmodel->delete_genero_empresa($id_empresa , $id_genero);
        $this->response($db_response);
    }   
    
    /**/
    function genero_musical_GET(){
    
        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();                     
        $this->response(list_generos_empresa($this->generosmusicalesmodel->get_geros_empresa($id_empresa)) );

    }   
    /**/
    function genero_musical_post(){
    
        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();         
        $db_response = $this->generosmusicalesmodel->insert_genero_empresa($id_empresa , $this->post() );
        $this->response($db_response );


    }   
    function incidencia_POST(){

        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();         
        $id_user = $this->sessionclass->getidusuario();        
        $response_db = $this->empresamodel->insert_incidencia_empresa($id_empresa , $id_user ,  $this->post() );        
        $this->response($response_db);
    }
    function sub_tipo_incidencia_GET(){

        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();         
        $response_db= $this->empresamodel->get_sub_tipo_incidencia($id_empresa , $this->get());           
        $this->response(sub_tipos_inicidencia_options($response_db));

    }
    /**/
    function empresa_GET(){

        $this->validate_user_sesssion();    
        $id_empresa= $this->sessionclass->getidempresa();
        $response_db= $this->empresamodel->get_empresa_by_id($id_empresa);
        $this->response($response_db);

    }   
    /**/
    function empresa_contacto_resumen_GET(){
        $this->validate_user_sesssion();        
        $id_empresa= $this->sessionclass->getidempresa();
        $num = $this->empresamodel->get_contactos_empresanum($id_empresa);
        $this->response($num);
    }
    /**/
    function empresa_contacto_GET(){

    	$this->validate_user_sesssion();
        $id_empresa = $this->sessionclass->getidempresa();
        $id_user = $this->sessionclass->getidusuario();        
    	$contactos_empresa_data  = data_contactos_empresa($this->empresamodel->get_contactos_empresa($id_empresa, $id_user));   
    	$this->response($contactos_empresa_data );        
    }  

    function empresa_country_PUT(){

        $this->validate_user_sesssion();
        $id_empresa = $this->sessionclass->getidempresa();
        $response_db =  $this->empresamodel->update_country_empresa($id_empresa, $this->put()  );
        
        $this->response($response_db);
    }
    /**/
   	function empresa_contacto_PUT(){

        $this->validate_user_sesssion();
        $id_empresa= $this->sessionclass->getidempresa();
        $response_db = $this->empresamodel->update_contacto_empresa($id_empresa , $this->put() );
        $this->response($response_db);           
   		

    }
    /**/
    function q_PUT(){

        $this->validate_user_sesssion();
        $id_empresa= $this->sessionclass->getidempresa();
        $response_db = $this->organizacionmodel->update_q($id_empresa , $this->put() );
        $this->response($response_db);           
    }    
    /**/
    function q_GET(){

        $this->validate_user_sesssion();
        $id_empresa= $this->sessionclass->getidempresa();
        $param =  $this->get();
        $response_db = $this->organizacionmodel->empresa_q($id_empresa , $param);
        $this->response($response_db);           
    }
    /**/
    function artistas_GET(){
        $db_response = $this->organizacionmodel->get_posibles_artitas($this->get());    
        $this->response(list_posible_artista($db_response) );
    }
    /**/
    function solicitud_artista_top_GET(){
        $id_empresa =  $this->get("empresa");
        $response_db = $this->organizacionmodel->get_top_artistas_cliente($id_empresa);
        $top= lista_top_artistas_cliente($response_db);
        $this->response($top);
    }
    /*Validar session para modificar datos*/
    function validate_user_sesssion(){
        if( $this->sessionclass->is_logged_in() == 1) {                        

            }else{
                        /*Terminamos la session*/
                $this->sessionclass->logout();
        }   
    }
    /*termina validar session */
    function mensaje_comunidad_PUT(){

        $this->validate_user_sesssion();
        $id_empresa= $this->sessionclass->getidempresa();
        $prm =  $this->put();
        $db_response  = $this->organizacionmodel->update_empresa_q($id_empresa , $prm );
        $this->response($db_response);   
    }
    /**/
    function laexperiencia_GET(){
        
       $param =  $this->get();        
       $data["experiencias"] =  $this->empresamodel->get_experiencias($param);      
       $data["param"] =  $param; 
       echo  $this->load->view("empresa/experiencias" ,  $data);
    }
    /**/
    function experienciaq_PUT(){        
        /**/        
        $param =  $this->put();
        $db_response =  $this->empresamodel->experienciaq($param);     
        $this->response($db_response);
    }
    /**/
}?>