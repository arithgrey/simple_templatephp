<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class accesosmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}




function getDataByidEvent($idempresa, $evento){
	
	$data["tipo_acceso"] = $this->getTipoEscenario();
	return $data;

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

/*Termina modelo */
}



