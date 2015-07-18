<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class escenariomodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}



function nuevo( $nombre , $evento ,  $idempresa  ){


	$query_insert ="INSERT INTO escenario (nombre , idevento  ) 
	values ('$nombre' , '$evento '  )";

	return $this->db->query($query_insert);



}	






/**************************************************************/


function loadescenariobyid( $idescenario,  $idempresa ){


	$query_load ="SELECT * FROM escenario WHERE idescenario = '".$idescenario."' ";
	$result = $this->db->query($query_load);
	$data["general"] =  $result->result_array();


	$artistas_load = "SELECT * FROM artista as a , escenario_artista as ea WHERE  
	 ea.idartista =  a.idartista and ea.idescenario='". $idescenario."' ";

	$resultartistas = $this->db->query($artistas_load);
	$data["artistas"] =  $resultartistas->result_array();

	return $data;




}	


/**************************************************************/

function loadbyevent( $evento ,  $idempresa  ){


	$query_load ="SELECT * FROM escenario WHERE idevento = '".$evento."'";
	$result = $this->db->query($query_load);
	return $result->result_array();



}	


function updatedescripcion( $nueva_descripcion , $evento , $idescenario,  $idempresa ) {

	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE idevento = '".$evento."' and  idescenario ='$idescenario' ";
	$result = $this->db->query($query_upload);
	return $result;	

}


function deleteescenariobyid( $idescenario,  $idempresa ){

	$query_deletebyid ="DELETE  FROM  escenario WHERE  idescenario ='$idescenario' ";
	$result = $this->db->query($query_deletebyid);
	return $result;	
}

/**/


/*Termina modelo */
}



