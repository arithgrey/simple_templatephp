<?php defined('BASEPATH') OR exit('No direct script access allowed');

class eventmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}


function update_event_name($nuevonombre ,  $idempresa ){


    $insertuser = "INSERT INTO comentario (comentario, usuario) 
    VALUES ('".$comentario."' , '".$user."' )"; 
    
    $result = $this->db->query($insertuser);       
            
    return $result;

}/*Termina la función */



/*Termina modelo */
}



