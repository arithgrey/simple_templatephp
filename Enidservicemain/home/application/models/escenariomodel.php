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



/************************RETORNA LOS DATOS DE UN ESCENARIO POR MEDIO DE SI ID**************************************/

function load_escenario_byid( $idescenario,  $idempresa ){

	$query_load ="SELECT * FROM escenario WHERE idescenario = '".$idescenario."' ";
	$result = $this->db->query($query_load);
	$data["general"] =  $result->result_array();

	$artistas_load = "SELECT * FROM artista as a , escenario_artista as ea WHERE  
	 ea.idartista =  a.idartista and ea.idescenario='". $idescenario."' ";

	$resultartistas = $this->db->query($artistas_load);
	$data["artistas"] =  $resultartistas->result_array();

	return $data;




}	


/******************************RETORNA EL RESUMEN DE LOS ESCENARIOS DE A CUERDO AL EVENTO ********************************/
function load_by_event( $id_evento ,  $idempresa  ){


	$query_load ="SELECT e.idescenario , e.nombre , e.descripcion ,   e.idevento , e.tipoescenario
					, e.portada_escenario  , e.status , e.fecha_presentacion_inicio , e.fecha_presentacion_termino 
					, count(a.idartista) as numero_artistas
					FROM escenario as e LEFT OUTER JOIN  escenario_artista as ea 
					ON e.idescenario = ea.idescenario
					LEFT OUTER JOIN artista as a 
					ON ea.idartista =  a.idartista
					WHERE e.idevento='". $id_evento ."'
					GROUP BY  e.idescenario";

	$result = $this->db->query($query_load);
	return $result->result_array();	   



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
	$query_delete ="call delete_escenacio_evento('". $idescenario ."')";
	return $this->db->query($query_delete);
	 
}
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
/*************************************** ****************************************/
function get_escenariobyId($id_escenario){

	$get_escenario ="SELECT * FROM escenario WHERE idescenario ='".$id_escenario."' ";
	$result = $this->db->query($get_escenario);
	return $result->result_array();	
}
/*Todos los escenarios menos uno*/
function get_escenarios_byidevent_menosuno($id_evento, $id_escenario){
	$query_select ="select e.idescenario , SUBSTRING( e.descripcion , 1,  135 ) 
	as descripcion_escenario ,  e.nombre, e.tipoescenario, e.portada_escenario ,   
	count(a.idartista) as num_artistas from escenario
	as e left outer join escenario_artista as ea  on e.idescenario = ea.idescenario 
	left outer join artista as a  
	on ea.idartista = a.idartista where e.idevento = '". $id_evento ."' and
	e.idescenario != '". $id_escenario ."' group by e.idescenario order by tipoescenario  desc";

	$result= $this->db->query($query_select);
	return $result-> result_array();
}
/*retorna la data de los escenarios dentro de un evento */
function get_escenarios_evento($id_evento){

	$query_get ="SELECT *  FROM escenario WHERE idevento = '".$id_evento ."' ";
	$result= $this->db->query($query_get);
	return $result->result_array();
}

/*Termina modelo */
}



