<?php defined('BASEPATH') OR exit('No direct script access allowed');
class repomodel extends CI_Model {
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function getUsuariosCuenta($idempresa)
{
	$query_get =" select * from usuario where idempresa = '".$idempresa."' ";
	$result = $this->db->query($query_get);
	return $result ->num_rows();
	
}



}/*Termina la función */