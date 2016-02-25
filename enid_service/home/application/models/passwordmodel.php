<?php defined('BASEPATH') OR exit('No direct script access allowed');
class passwordmodel extends CI_Model {
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function actualizarPassword($antes, $nuevo, $idPersona)
{	
	$existe = count($this->validarPassword($antes, $idPersona));
	if($existe != 1)
	{
		return "<strong>¡OH NO!</strong><br>La contraseña anterior no coincide...";
	}else{

		$query_update = "UPDATE usuario SET password = '".$nuevo."' WHERE idusuario = '".$idPersona."' limit 1";  
    	$dbresponse = $this->db->query( $query_update );     
    	return $dbresponse;
	}
	
}

function validarPassword($antes,$idPersona)
{
    $query_get = "SELECT password FROM usuario WHERE idusuario = '".$idPersona."' AND password = '".$antes."'";
    $result = $this->db->query( $query_get );     
    return $result ->result_array();
}


}/*Termina la función */