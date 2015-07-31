<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Eventos extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->helper('generoshelp');
        $this->load->helper('accesos');
        $this->load->model("accesosmodel");
        $this->load->model('generosmusicalesmodel');
        $this->load->model("eventmodel");
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

         function pasados(){

            if( $this->sessionclass->is_logged_in() == 1){            
                    
                        $this->load->helper("timelineevent");

                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Pasados';

                        $idempresa =  $this->sessionclass->getidempresa();
                        
                        $arreglo_time_line = $this->eventmodel->get_time_events_byid($idempresa);
                        $data["time_line"] = get_time_line_event($arreglo_time_line);

                        

                        $this->load->view('TemplateEnid/header_template', $data);
                        $this->load->view('eventos/eventos_pasados' , $data);
                        $this->load->view('TemplateEnid/footer_template', $data);

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }   
    }/*Termina la función*/


/***********End pasados *End pasados *End pasados *End pasados *End pasados *End pasados *******/



        function nuevo(){

            if( $this->sessionclass->is_logged_in() == 1){            
                
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='Nuevo';


                        $idempresa =  $this->sessionclass->getidempresa();                        
                        $idevento = $this->input->get("evento");                        
                        $inicio = $this->input->get("start");                        
                        $termino = $this->input->get("end");


                        

                            if ($this->checkifexist($idevento , $idempresa) == 1 ) {

                                    $data["evento"] = $idevento;
                                    $data["inicio"] = $inicio;
                                    $data["termino"] = $termino;


                                    $carpeta_evento_img = base_url().'application/uploads/upload.php?e='.$idevento;                                   
                                    $data["carpeta_evento_img"]= $carpeta_evento_img;
                                    $responsedb = $this->generosmusicalesmodel->getDataByidEvent($idempresa, $idevento);                                    
                                    $data["list_generos"] = list_generos_musicales($responsedb);


                                    
                                    $this->load->view('TemplateEnid/header_template', $data);
                                    $this->load->view('eventos/publicar');
                                    $this->load->view('TemplateEnid/footer_template', $data);    

                            }else{
                                  header('Location:' . base_url('index.php/inicio/eventos'));
                            }

                        

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }
    }/*termina la función*/



    /*Pre visualizar  ********************** pre visualizar */











        function previsualizar(){

            if( $this->sessionclass->is_logged_in() == 1){            
                
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='';
                        $idempresa =  $this->sessionclass->getidempresa();                        
                        $idevento = $this->input->get("evento");                        
                          





                        

                            if ($this->checkifexist($idevento , $idempresa) == 1 ) {
                                    

                                    $this->load->helper('servicios');
                                    $this->load->helper('img_eventsh');

                                    $img_f = get_img_by_event_in_directory($idevento);                                    
                                    
                                    /*$data["img_second"]= $img_f[1]["name"];
                                    if (count($img_f) > 2) {                                        
                                        $num_img_aleatoria = rand ( 1 , count($img_f)  );
                                        $data["img_second"]= $img_f[$num_img_aleatoria]["name"];

                                    }*/
                                    

                                    $data["img_first"]= base_url() ."application/uploads/uploads/".$idevento."/" .$img_f[0]["name"];
                                    $data["img_second"]= base_url() ."application/uploads/uploads/".$idevento."/" .$img_f[1]["name"];



                                    $dataevent = $this->eventmodel->getEventbyid($idevento);
                                    $data["evento"] =  $dataevent[0];

                                    $array_servicios_includos = $this->eventmodel->get_servicios_evento_by_id($idevento);
                                    $data["servicios_evento"] = list_services_default_view($array_servicios_includos); 
                                    $data["idevento"] = $idevento;

                                    $this->load->view('TemplateEnid/header_template', $data);
                                    $this->load->view('eventos/previsualizarevent', $data);  
                                    $this->load->view('TemplateEnid/footer_template', $data);    

                            }else{
                                    header('Location:' . base_url('index.php/inicio/eventos'));
                            }

                        

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }
    }






/*termina la función pre visualizar */
 








        function puntosventa(){

            if( $this->sessionclass->is_logged_in() == 1){            
                
                        $menu = $this->sessionclass->generadinamymenu();            
                        $data["menu"] = $menu;
                        $nombre = $this->sessionclass->getnombre();
                        
                        $data["nombre"]= $nombre;
                        $data["perfilactual"] =  $this->sessionclass->getnameperfilactual(); 
                        $data['titulo']='';
                        $idempresa =  $this->sessionclass->getidempresa();                        
                        $idevento = $this->input->get("evento");                        
                          

                        

                            if ($this->checkifexist($idevento , $idempresa) == 1 ) {
                                    
                                    

                                    $data["idevento"] = $idevento;

                                    $accesosdata = $this->accesosmodel->get_acceso_by_event($idevento);    
                                    $data["accesos_evento"]= accesos_view_default($accesosdata);


                                    $this->load->view('TemplateEnid/header_template', $data);
                                    $this->load->view('eventos/puntos_venta', $data);  
                                    $this->load->view('TemplateEnid/footer_template', $data);    

                            }else{
                                    header('Location:' . base_url('index.php/inicio/eventos'));
                            }

                        

                }else{
            /*Terminamos la session*/
            $this->sessionclass->logout();
        }
    }
























    function checkifexist($idevento , $idempresa){

        return $this->eventmodel->checkifexist((int)$idevento , (int)$idempresa);
        
    }/*Termina la función*/


}/*Termina en controlador*/
