<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventos extends CI_Controller{

    function __construct(){
        parent::__construct();


        
        $this->load->helper("plantillas");        
        $this->load->helper('servicios');
        $this->load->helper('img_eventsh');
        $this->load->helper('eventosh');
        $this->load->helper('generoshelp');
        $this->load->helper('accesos');
        $this->load->helper('escenario');
        $this->load->model("templmodel");
        $this->load->model("accesosmodel");
        $this->load->model('generosmusicalesmodel');
        $this->load->model("eventmodel");
        $this->load->model("escenariomodel");
        $this->load->model("servicioseventmodel");
        $this->load->library('sessionclass');      
    }



    function index(){

        $data = $this->validate_user_sesssion("Eventos");
       	$this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('TemplateEnid/footer_template', $data);

    }/*Termina la función*/
    function timeline(){

            $data = $this->validate_user_sesssion("Linea de tiempo");
            $this->load->helper("timelineevent");
            $idempresa =  $this->sessionclass->getidempresa();
            $longitud_descripcion_text = 400;
            $arreglo_time_line = $this->eventmodel->get_time_events_byid($idempresa);
            $data["time_line"] = get_time_line_event($arreglo_time_line, $longitud_descripcion_text);

            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view('eventos/eventos_pasados' , $data);
            $this->load->view('TemplateEnid/footer_template', $data);

            
    }/*Termina la función*/    
    function nuevo($id_evento){

        $status = $this->input->get("status");
        $text_status = get_statusevent($status);
        $data = $this->validate_user_sesssion($text_status);
        $idempresa =  $this->sessionclass->getidempresa();                                                
        
                        
        if ($this->checkifexist($id_evento) == 1 ) {

                $data["evento"] = $id_evento;
                    

                $id_user = $this->sessionclass->getidusuario();        
                $plantillas_descripcion = $this->templmodel->get_templ_contenido($id_user, 1 );
                $data["plantillas_descripcion"] = display_contenido_templ($plantillas_descripcion, 0 , 0 ,  "contenido-text-templ");



                /*plantilla de politicas */
                $plantillas_politicas = $this->templmodel->get_templ_contenido($id_user, 4);
                $data["plantilla_politicas"] = display_contenido_templ($plantillas_politicas ,  0 , 1 , 'new_politica_template');


                /*Plantilla de mis restricciones*/

                
                $plantillas_restriccion = $this->templmodel->get_templ_contenido($id_user, 3);        
                $data["plantilla_restricciones"]= display_contenido_templ($plantillas_restriccion, 0 , 1 ,  "new_restricciones_templ");


                $restricciones_data = $this->templmodel->get_evento_contenido($id_evento, 3);    
                $data["restricciones_record"]= display_contenido_templ($restricciones_data );






                $carpeta_evento_img = base_url().'application/uploads/upload.php?e='.$id_evento;                                   
                $data["carpeta_evento_img"]= $carpeta_evento_img;
                $responsedb = $this->generosmusicalesmodel->getDataByidEvent($idempresa, $id_evento);                                    
                $data["list_generos"] = list_generos_musicales($responsedb);
                $data_evento = $this->eventmodel->getEventbyid($id_evento);

                $data["data_evento"] = $data_evento[0];                
                $data["fecha_evento"]= get_date_event_format($data_evento[0]["fecha_inicio"] , $data_evento[0]["fecha_termino"]);
                                                
                $this->load->view('TemplateEnid/header_template', $data);
                $this->load->view('eventos/publicar');
                $this->load->view('TemplateEnid/footer_template', $data);    

            }else{
                header('Location:' . base_url('index.php/inicio/eventos'));
        }

                        

    }/*termina la función*/



/**********************************  *************************************************/



function diaevento($id_evento){
                                            
        if ($this->checkifexist($id_evento ) == 1 ) {

            $dataevent = $this->eventmodel->getEventbyid($id_evento);
            $data = $this->validate_user_session_event("El día del evento " , $dataevent[0]["status"] );            

            $data["evento"] =  $dataevent[0];

            $list_obj= $this->eventmodel->get_objetos_permitidosin_event($id_evento);    
            $array_servicios_incluidos = $this->servicioseventmodel->get_servicios_by_evento($id_evento);

            $data["list_obj_permitidos"] = get_list_objpermitidos( $list_obj );
            $data["list_servicios_incluidos"] = get_servicios_inclidos_event($array_servicios_incluidos);        


            $response_db_politicas   = $this->templmodel->get_contenido_evento($id_evento , 4 );
            $politicas_list = display_contenido_templ($response_db_politicas ) ;        
            $data["politicas_list"]= $politicas_list;
            /*restricciones list*/
            $response_db_restricciones  = $this->templmodel->get_contenido_evento($id_evento , 3 );
            $restricciones_list = display_contenido_templ($response_db_restricciones) ;        
            $data["restricciones_list"]= $restricciones_list;
            /* Vistas */
    


            
            $this->show_data_event($data, 'eventos/dia_evento' );

            

        }else{
            header('Location:' . base_url('index.php/inicio/eventos'));
        }                
}/*Termina la función */



/****************************** Accesos al evento ************************************/
function accesosalevento($id_evento , $status){
        
        if ($this->checkifexist($id_evento) == 1 ) {    
            
            

            $data = $this->validate_user_session_event("Accesos al evento " , $status);                
            $data_accesos_evento= $this->accesosmodel->get_acceso_by_event($id_evento);
            $data["accesos_evento"] = accesos_view_default($data_accesos_evento);            
            $data_eventos_experiencia = $this->eventmodel->get_last_events_experience(4 , $id_evento);                  

            $data["ultimos_eventos_experiencia"] = $data_eventos_experiencia;
            /* Vistas */
            $this->show_data_event($data, 'eventos/accesos_evento');            
            
            

        }else{
            header('Location:' . base_url('index.php/inicio/eventos'));
        }                
}
/****************************** Termina Accesos al evento  ************************************/


/*Pre visualizar  ********************** pre visualizar */
    function visualizar($id_evento){

        if ($this->checkifexist($id_evento) == 1 ) {

                $dataevent = $this->eventmodel->getEventbyid($id_evento);

                $data =  $this->validate_user_session_event($dataevent[0]["nombre_evento"] , $dataevent[0]["status"]);                                                                        
                $data["img_event"]=  get_img_by_event_in_directory($id_evento);                                    
                $data["base_img"]= base_url()."application/uploads/uploads/". $id_evento."/";                                    
                
                $list_escenarios = $this->escenariomodel->get_escenarios_byidevent($id_evento);
                $data["escenarios"] = list_resum_escenarios($list_escenarios, $id_evento , 200 , "blue-col-enid-more");
                $list_generosdb = $this->eventmodel->get_list_generos_musicales_byidev($id_evento);
                $data["generos_musicales_tags"] = get_tags_generos($list_generosdb);
                $data["evento"] =  $dataevent[0];

                $array_servicios_includos = $this->eventmodel->get_servicios_evento_by_id($id_evento);
                $data["servicios_evento"] = list_services_default_view($array_servicios_includos); 
                $data["idevento"] = $id_evento;
                    
                
                $this->show_data_event($data, 'eventos/previsualizarevent'  );   
                


            }else{
                header('Location:' . base_url('index.php/inicio/eventos'));
        }            
    }/*Termina la función */

    function checkifexist($idevento){
        return $this->eventmodel->checkifexist((int)$idevento );        
    }/*Termina la función*/


    /*Determina que vistas mostrar para los eventos*/
    function show_data_event($data, $center_page ){
        
        if ($data["in_session"] == 1) {
        
            
            $this->dinamic_view_event($center_page, $data);


        }else{  

            
            $this->load->view('TemplateEnid/header_template_all_user', $data);
            $this->load->view($center_page , $data);            
            $this->load->view('TemplateEnid/footer_template', $data);

        }                
      
    }


    function validate_user_session_event($titulo_dinamico_page , $status_event ){

        if ( $this->sessionclass->is_logged_in() == 1) {                                        
                    
                    $menu = $this->sessionclass->generadinamymenu();
                    $nombre = $this->sessionclass->getnombre();                                         
                    $data['titulo']= $titulo_dinamico_page . "<span class='btn btn-info edit-status-event'><a data-toggle='modal' data-target='#update-status-ev-modal'>" . get_statusevent($status_event) . " <i class='fa fa-edit'></i></span></a>";              
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



}/*Termina en controlador*/
