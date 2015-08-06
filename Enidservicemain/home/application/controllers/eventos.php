<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventos extends CI_Controller {

    function __construct(){
        parent::__construct();



        $this->load->helper('servicios');
        $this->load->helper('img_eventsh');
        $this->load->helper('eventosh');
        $this->load->helper('generoshelp');
        $this->load->helper('accesos');
        $this->load->helper('escenario');
        $this->load->model("accesosmodel");
        $this->load->model('generosmusicalesmodel');
        $this->load->model("eventmodel");
        $this->load->model("escenariomodel");
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





/*Pasados ** Pasados ***  Pasados ** Pasados ** PasadosPasados*Pasados ** Pasados ***  Pasados ** Pasados ** PasadosPasados*/
         function timeline(){

            if( $this->sessionclass->is_logged_in() == 1){            
                    
                        $this->load->helper("timelineevent");

                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Linea de tiempo';

                        $idempresa =  $this->sessionclass->getidempresa();
                        $longitud_descripcion_text = 400;
                        $arreglo_time_line = $this->eventmodel->get_time_events_byid($idempresa);
                        $data["time_line"] = get_time_line_event($arreglo_time_line, $longitud_descripcion_text);

                        

                        $this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('eventos/eventos_pasados' , $data);
                        $this->load->view('TemplateEnid/footer_template', $data);

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*Termina la función*/


/***********End pasados *End pasados *End pasados *End pasados *End pasados *End pasados *******/



        function nuevo($id_evento){

                        $data = $this->validate_user_sesssion("Edición");
                        $idempresa =  $this->sessionclass->getidempresa();                                                
                        $inicio = $this->input->get("start");                        
                        $termino = $this->input->get("end");


                        
                        
                            if ($this->checkifexist($id_evento , $idempresa) == 1 ) {

                                    $data["evento"] = $id_evento;
                                    $data["inicio"] = $inicio;
                                    $data["termino"] = $termino;


                                    $carpeta_evento_img = base_url().'application/uploads/upload.php?e='.$id_evento;                                   
                                    $data["carpeta_evento_img"]= $carpeta_evento_img;
                                    $responsedb = $this->generosmusicalesmodel->getDataByidEvent($idempresa, $id_evento);                                    
                                    $data["list_generos"] = list_generos_musicales($responsedb);


                                    
                                    $this->load->view('TemplateEnid/header_template', $data);
                                    $this->load->view('eventos/publicar');
                                    $this->load->view('TemplateEnid/footer_template', $data);    

                            }else{
                                  header('Location:' . base_url('index.php/inicio/eventos'));
                            }

                        

    }/*termina la función*/



/**********************************  *************************************************/



function diaevento($id_evento){

    $data = $this->validate_user_sesssion("'previsualizando evento, día del evento'");                        
    $idempresa =  $this->sessionclass->getidempresa();                        
                        
                        
        if ($this->checkifexist($id_evento , $idempresa) == 1 ) {


            $dataevent = $this->eventmodel->getEventbyid($id_evento);
            $data["evento"] =  $dataevent[0];

            $list_obj= $this->eventmodel->get_objetos_permitidosin_event($id_evento);    
            $data["list_obj_permitidos"] = get_list_objpermitidos( $list_obj );

            $this->load->view('TemplateEnid/header_template', $data);
            $this->load->view('eventos/dia_evento', $data);  
            $this->load->view('TemplateEnid/footer_template', $data);    



            }else{
                header('Location:' . base_url('index.php/inicio/eventos'));
            }

                        

}/*Termina la función */



    /*Pre visualizar  ********************** pre visualizar */
        function previsualizar($id_evento){
            

                        $data = $this->validate_user_sesssion("Visualizando antes de hacer público el evento");
                        $idempresa =  $this->sessionclass->getidempresa();                        
                        
                        
                            if ($this->checkifexist($id_evento , $idempresa) == 1 ) {
                                    

                                    

                                    
                                    $data["img_event"]=  get_img_by_event_in_directory($id_evento);                                    
                                    $data["base_img"]= base_url()."application/uploads/uploads/". $id_evento."/";                                    
                                    $dataevent = $this->eventmodel->getEventbyid($id_evento);
                                    $list_escenarios = $this->escenariomodel->get_escenarios_byidevent($id_evento);
                                    $data["escenarios"] = list_resum_escenarios($list_escenarios, $id_evento);
                                    $list_generosdb = $this->eventmodel->get_list_generos_musicales_byidev($id_evento);
                                    $data["generos_musicales_tags"] = get_tags_generos($list_generosdb);
                                    $data["evento"] =  $dataevent[0];

                                    $array_servicios_includos = $this->eventmodel->get_servicios_evento_by_id($id_evento);
                                    $data["servicios_evento"] = list_services_default_view($array_servicios_includos); 
                                    $data["idevento"] = $id_evento;

                                    $this->load->view('TemplateEnid/header_template', $data);
                                    $this->load->view('eventos/previsualizarevent', $data);                                      
                                    $this->load->view('TemplateEnid/footer_template', $data);    

                            }else{
                                    header('Location:' . base_url('index.php/inicio/eventos'));
                            }

                        

    }






/*termina la función pre visualizar */
 





    function checkifexist($idevento , $idempresa){

        return $this->eventmodel->checkifexist((int)$idevento , (int)$idempresa);
        
    }/*Termina la función*/




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



}/*Termina en controlador*/
