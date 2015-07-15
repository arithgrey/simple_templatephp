<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Event extends REST_Controller{
      
    function __construct(){
            parent::__construct();
            
            $this->load->model("eventmodel");                
            $this->load->library('sessionclass');
            
            

        }     

    

    function nuevo_evento_POST(){
                
        if ( $this->sessionclass->is_logged_in() == 1) {  
            /*Capturamos datos*/
                $generic_response = ["Nombre muy corto para el evento" , "Registre fecha"];        


                $nombre  = $this->post("nuevo_evento");
                $edicion = $this->post("nueva_edicion");
                $inicio = $this->post("nuevo_inicio");
                $termino = $this->post("nuevo_termino");

                $idusuario = $this->sessionclass->getidusuario();    
                $idempresa =  $this->sessionclass->getidempresa();
                $perfiles  =  $this->sessionclass->getperfiles();
                $data[0]= false;
                    
                    if (validatenotnullnotspace($nombre)) {
                        if (validatenotnullnotspace($inicio) ==  true && validatenotnullnotspace($termino)) {
                            

                                $dbresponse = $this->eventmodel->create( $nombre , $edicion , $inicio , $termino , $idusuario , $idempresa,  $perfiles  );
                                if (is_numeric($dbresponse)) {

                                    $data[0]= true;
                                    $data[1]= base_url('index.php/eventos/nuevo?evento='.$dbresponse);
                                    $this->response($data); 
                                }else{
                                    $this->response($generic_response[0]);             
                                } 
                                


                        }else{
                                $this->response($generic_response[1]);
                        }
                        
                            

                            
                                


                    }else{
                        $this->response($generic_response[0]);
                    }

                
                
        }else{
            $this->sessionclass->logout();
        
        }    
    }





    /*Termina rest*/

}
?>
