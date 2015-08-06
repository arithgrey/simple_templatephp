<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Contactos extends REST_Controller{

    function __construct(){
            parent::__construct();
           
            $this->load->model("contactmodel");
            $this->load->library('sessionclass');
            
        }         
	function index(){}        




/********************************************************************************************************/

function registra_nuevo_post(){

    
    if ( $this->sessionclass->is_logged_in() == 1) {            

            
           $idempresa =  $this->sessionclass->getidempresa();
           $empresa_contacto =  $this->input->post("empresa_contacto");
           $persona_contacto =  $this->input->post("persona_contacto");
           $tel_contacto =  $this->input->post("tel_contacto");
           $movil_contact = $this->input->post("movil_contact");
           $email_contact =  $this->input->post("email_contact");
           $tipo_proveedor = $this->input->post("tipo_proveedor");
           $nota_contact = $this->input->post("nota_contact");
          



           $responsedb = $this->contactmodel->record_contact($idempresa , $empresa_contacto ,
            $persona_contacto,   $tel_contacto , $movil_contact , $email_contact , $tipo_proveedor,
             $nota_contact);  


           if($responsedb != false) {

              $next_url = base_url("index.php/directorio/proveedoresadv?p=". $responsedb ); 

              $this->response($next_url);
              
           }else{

              $this->response(false);
           }
           


       }else{
            $this->sessionclass->logout();
        }


}/*Termina la función*/






/**********************************************************************************/

	/*Termina rest*/
}

