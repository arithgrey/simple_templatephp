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






function get_escenarios_byidevent($id_evento){
	$query_select ="select e.idescenario , SUBSTRING( e.descripcion , 1,  135 ) as descripcion_escenario , 
	e.nombre, e.tipoescenario, e.portada_escenario ,  
	count(a.idartista) as num_artistas
	from escenario as e
	left outer join escenario_artista as ea 
	on e.idescenario = ea.idescenario
	left outer join artista as a 
	on ea.idartista = a.idartista
	where e.idevento = '".$id_evento."'
	group by e.idescenario order by tipoescenario  desc";

	$result= $this->db->query($query_select);
	return $result-> result_array();

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
	$data["todos"] =   $result->result_array();


	$query_artistas = "select e.idescenario , a.idartista, count(*) as numeroartistas
	 from escenario as e  ,  artista as a,  escenario_artista  as ea 
	  where ea.idescenario = e.idescenario and ea.idartista = a.idartista and e.idevento= '".$evento."'  
	   group by idescenario";
	$result_artista  = $this->db->query($query_artistas);
	$data["conartistas"] = $result_artista ->result_array();
	   
	return $data;



}	


function updatedescripcion( $nueva_descripcion , $evento , $idescenario,  $idempresa ) {

	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE idevento = '".$evento."' and  idescenario ='$idescenario' ";
	$result = $this->db->query($query_upload);
	return $result;	

}




function updatedescripcionbyid( $nueva_descripcion , $idescenario,  $idempresa ){
	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE   idescenario ='$idescenario' ";
	$result = $this->db->query($query_upload);
	return $result;	

}


function deleteescenariobyid( $idescenario,  $idempresa ){

	/*
	$query_delete_artistas_escenario = "DELETE FROM escenario_artista   WHERE idescenario = $idescenario";
	$result_delete_escenario_artistas  = $this->db->query($query_delete_artistas_escenario );

	$query_deletebyid ="DELETE  FROM  escenario WHERE  idescenario ='$idescenario' ";
	$result = $this->db->query($query_deletebyid);
	*/

	$query_delete ="call delete_escenacio_evento('". $idescenario ."')";
	return $this->db->query($query_delete);
	 
}

/**/


function updateescenariotipobyid($idescenario , $tipoescenario , $idempresa){
	
	$query_upload ="UPDATE  escenario set tipoescenario = '$tipoescenario' WHERE   idescenario ='$idescenario' ";
	$result = $this->db->query($query_upload);
	return $result;	

}


function updateescenarionombrebyid($idescenario , $nuevonombre, $idempresa){
	$query_update ="UPDATE  escenario set nombre = '$nuevonombre' WHERE   idescenario ='$idescenario' ";
	$result = $this->db->query($query_update);
	return $result;	

}
/************************************************************************/

function updateescenarioinicioterminobyid($idescenario , $idempresa , $nuevoinicio , $nuevotermino){
	
	$query_update ="UPDATE  escenario set fecha_presentacion_inicio = '$nuevoinicio' , fecha_presentacion_termino='$nuevotermino' 
	WHERE   idescenario ='$idescenario' ";
	$result = $this->db->query($query_update);
	return $result;	

}


/*Termina modelo */
}



