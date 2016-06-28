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
        $this->load->helper('puntoventa');
        $this->load->model("templmodel");
        $this->load->model("accesosmodel");
        $this->load->model('generosmusicalesmodel');
        $this->load->model("eventmodel");
        $this->load->model("escenariomodel");
        $this->load->model("servicioseventmodel");        
        $this->load->model("puntoventamodel");
        $this->load->model("eventos_model_cliente");
        $this->load->library('sessionclass');      
    }
    /*Búsqueda de eventos*/            
    function busqueda(){ 
        $data = $this->val_session("Encuentra tus eventos");                                                
        $this->show_data_page($data,"eventos/busqueda" );
    }
    /**/
    function index(){

        $data = $this->val_session("Eventos");
       	$this->load->view('TemplateEnid/header_template', $data);
        $this->load->view('TemplateEnid/footer_template', $data);

    }/*Termina la función*/
    function nuevo($id_evento){

        $status = $this->input->get("status");        
        $data = $this->val_session("");
        $idempresa =  $this->sessionclass->getidempresa();                                                
                        
        if ($this->checkifexist($id_evento) == 1 ) {

                $data["evento"] = $id_evento;
                $id_user = $this->sessionclass->getidusuario();                    
                $data["resumen_evento"] =   $this->eventmodel->get_resum_by_id_event($id_evento)[0];                
                $data_evento = $this->eventmodel->getEventbyid($id_evento);

                $data["data_evento"] = $data_evento[0];                
                $data["fecha_evento"]= get_date_event_format($data_evento[0]["fecha_inicio"] , $data_evento[0]["fecha_termino"]);                    
                /**/
                //$data_accesos= $this->accesosmodel->load_tipo_accesos();
                //$data["accesos_list"] = create_select($data_accesos , 'tipo_acceso' , 'form-control' , 'tipo_acceso' , 'tipo' , 'idtipo_acceso' );
                
                $this->show_data_page($data, 'eventos/publicar');

            }else{
                header('Location:' . base_url('index.php/inicio/eventos'));
        }            
    }/*termina la función*/





/**********************************  *************************************************/
function diaevento($id_evento){
    
    if ($this->checkifexist($id_evento ) == 1 ){

        $dataevent = $this->eventmodel->getEventbyid($id_evento);
        $data = $this->val_session("El día del evento");            
        $data["evento"] =  $dataevent[0];
        $list_obj= $this->eventmodel->get_objetos_permitidosin_event($id_evento);               
        $data["list_obj_permitidos"] = get_list_objpermitidos( $list_obj );            
        $response_db_politicas   = $this->templmodel->get_contenido_evento($id_evento , 4 );            
        /*restricciones list*/
        $response_db_restricciones  = $this->templmodel->get_contenido_evento($id_evento , 3 );
        $restricciones_list = display_contenido_templ($response_db_restricciones) ;        
        $data["restricciones_list"]= $restricciones_list;
        $servicios_incluidos_data= $this->servicioseventmodel->get_servicios_by_evento($id_evento);
        $data["servicios_incluidos"] =  listado_servicios_incluidos_client($servicios_incluidos_data); 
        /* Vistas */
        $dias_restantes = $this->eventos_model_cliente->get_dias_faltantes($id_evento);
        $data["dias_restantes_evento"] = get_dias_restantes_evento( $dias_restantes);
        $this->show_data_page($data, 'eventos/dia_evento' );

    }else{
        header('Location:' . base_url('index.php/inicio/eventos'));
    }                
}
/*Termina la función */
/********************************Próximos eventos de la organización*********************/
function get_proximos_eventos($id_empresa , $id_evento  ){
    /*Pŕoximos eventos*/
    $data_proximos_eventos =  $this->eventos_model_cliente->get_proximos($id_empresa , $id_evento  );
    /*Termina próximos*/
    return proximos_eventos($data_proximos_eventos);

}

/****************************** Accesos al evento ************************************/
function accesosalevento($id_evento){
    
        if ($this->checkifexist($id_evento) == 1 ) {                

            $data_evento =   $this->eventmodel->getEventbyid($id_evento)[0];    
            $data = $this->val_session("Adquiere tus accesos");    
            $data["proximos_eventos"] = $this->get_proximos_eventos($data_evento["idempresa"] , $id_evento );            
            $data_accesos  = $this->accesosmodel->get_data_acceso_public($id_evento);

            /**/            
            $data["data_evento"] = $data_evento;
            $resumen_event = $this->eventmodel->get_resum_by_id_event($id_evento);
            $data["resumen_event"] = resumen_cliente($resumen_event , $id_evento); 
            $data["accesos_evento"]=  lista_accesos_publicos($data_accesos);  
            $puntos_venta = $this->puntoventamodel->get_puntos_venta_cliente($id_evento);
            $data["puntos_venta"] =  list_puntos_venta_cliente($puntos_venta , $id_evento);


            
            $dias_restantes = $this->eventos_model_cliente->get_dias_faltantes($id_evento);
            $data["dias_restantes_evento"] = get_dias_restantes_evento( $dias_restantes);
            $this->show_data_page( $data , "accesos/evento_accesos_principal_client" );
            
        }else{
            header('Location:' . base_url('index.php/inicio/eventos'));
        }                
}



/****************************** Termina Accesos al evento  ************************************/
/*Pre visualizar  ********************** pre visualizar */
    function visualizar($id_evento){

        if ($this->checkifexist($id_evento) == 1 ) {

                $dataevent = $this->eventmodel->getEventbyid($id_evento);                
                $nombre_evento =  $dataevent[0]["nombre_evento"]; 

                $data =  $this->val_session($nombre_evento);     
                $imgs_evento =  $this->eventmodel->get_img_evento($id_evento); 
                $data["slider_evento_principal"]= get_slider_principal_evento($imgs_evento , $dataevent[0] );
                $data["evento"] =  $dataevent[0];

                /*
                   
                */
                $list_generosdb = $this->eventmodel->get_list_generos_musicales_byidev($id_evento);
                $data["generos_musicales_tags"] = get_tags_generos($list_generosdb);
                   

                $dias_restantes = $this->eventos_model_cliente->get_dias_faltantes($dataevent[0]["idevento"]);
                $data["dias_restantes_evento"] = get_dias_restantes_evento( $dias_restantes);
   
                $this->show_data_page($data, 'eventos/previsualizarevent'  );   
               
            }else{
                header('Location:' . base_url('index.php/inicio/eventos'));
        }            
    }/*Termina la función */

    function checkifexist($idevento){
        return $this->eventmodel->checkifexist((int)$idevento );        
    }/*Termina la función*/



    /*Determina que vistas mostrar para los eventos*/
    function config_eventos($id_evento){        
        $data = $this->val_session("Servicios que incluirá el evento"); 
        $data["evento"] =  $id_evento;
        $this->show_data_page( $data , 'eventos/accesos_configs');           
    }
    /**/
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
    /*Determina que vistas mostrar para los eventos*/
    function show_data_page($data, $center_page){
        
        if ($data["in_session"] == 1){        

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
    
    
}/*Termina en controlador*/
