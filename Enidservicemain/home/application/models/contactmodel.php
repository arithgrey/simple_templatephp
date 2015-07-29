<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class contactmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
   


function record_contact($idempresa , $empresa_contacto , $persona_contacto,   $tel_contacto , 
  $movil_contact , $email_contact , $tipo_proveedor ,  $nota_contact){


    $query_insert ="INSERT INTO proveedor (empresa_contacto , persona_contacto, tel_contacto , movil_contact , email_contact ,  nota_contact , idempresa , tipo_proveedor) VALUES( '".$empresa_contacto."' , '".$persona_contacto."'  , '".$tel_contacto ."' , '".$movil_contact."' , '".$email_contact."' , '".$nota_contact."'  , '".$idempresa ."' , '".$tipo_proveedor."' )";

    $result  = $this->db->query($query_insert);


    if ($result == true ){

      return  $this->db->insert_id();              
      
    }else{

      return false;
    }
    
}/*Termina la función */


/*Termina modelo */
}
