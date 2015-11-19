<?php defined('BASEPATH') OR exit('No direct script access allowed');
class repomodel extends CI_Model {
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function getUsuariosCuenta($idempresa)
{
	$getuserscuenta =" select * from usuario where idempresa = '".$idempresa."' ";
	$result = $this->db->query($getuserscuenta);
	return $result ->num_rows();
	
}



}/*Termina la función */