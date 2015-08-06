<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class accesosmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}

function getDataByidEvent($idempresa, $evento){	
	$select_byid ="SELECT * FROM acceso, tipo_acceso WHERE 
	 tipo_acceso.idtipo_acceso= acceso.idtipo_acceso AND acceso.idevento='". $evento . "' order by termino_acceso desc";

	$result_acceso = $this->db->query($select_byid); 
	$data["tipo_acceso"] = $this->getTipoEscenario();
	$data["listaccesos"] = $result_acceso->result_array();
	return $data;

}

function get_acceso_by_event($id_evento){

	$select_byid ="SELECT * FROM acceso, tipo_acceso WHERE 
	 tipo_acceso.idtipo_acceso= acceso.idtipo_acceso AND
	  acceso.idevento='". $id_evento . "' order by termino_acceso desc";

	$result_acceso = $this->db->query($select_byid); 
	return $result_acceso ->result_array();

}	
function getTipoEscenario(){
	
	$get_tipo ="SELECT * FROM tipo_acceso";	
	$result = $this->db->query($get_tipo);       
	return $result ->result_array();
}
function insert( $precio , $inicio_acceso , $termino_acceso , $idevento , $idtipo_acceso){

	$query_inser="INSERT INTO acceso (precio , inicio_acceso , termino_acceso , idevento , idtipo_acceso) VALUES ( '$precio' , '$inicio_acceso' , '$termino_acceso' , '$idevento' , '$idtipo_acceso' )";
	return $this->db->query($query_inser);

}
/*********************/
function deletebyid( $evento , $acceso ){


	$query_delete ="DELETE FROM acceso WHERE idacceso = '$acceso'  ";
	return  $this->db->query($query_delete);
	

}
/*Termina modelo */
}



