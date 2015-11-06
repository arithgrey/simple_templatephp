<?php defined('BASEPATH') OR exit('No direct script access allowed');
class escenarioartistamodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}

/**/
function get_escenario_artista($id_artista , $id_escenario){

	$query_get =  "select * from escenario_artista where idescenario= '". $id_escenario."'  and idartista = '".$id_artista."' ";
	
	$result = $this->db->query($query_get);
	return $result->result_array();
	
}
/**/
function get_info_artistas_in_escenario($id_escenario){

		$query_get_artistas ="SELECT * FROM artista  a inner join escenario_artista ea 
						ON a.idartista =  ea.idartista 
						left outer join imagen_artista ia  
						on a.idartista =  ia.id_artista 
						left outer join imagen i 
						on ia.id_imagen = i.idimagen
						WHERE ea.idescenario= '". $id_escenario ."' ";

	$result_artistas = $this->db->query($query_get_artistas);
	return $result_artistas ->result_array();
}

/**/
function registraartistaescenario($idescenario , $nuevoartista , $idempresa){

	$registroartista = $this->nuevoartista($nuevoartista);

	if ($registroartista[0] ==  true) {
		
		
		$idartista = $registroartista[1];

		return $this->nuevoescenarioartista($idescenario , $idartista);



	}else{
		return "Falla al registrar artista";
	}
	

		
}	


function nuevoartista($nuevoartista){
		/*Aquí validaremos que no éxista*/
		$query_insert ="INSERT INTO artista (nombre_artista) values ( '$nuevoartista' )";
		$data[0] = $this->db->query($query_insert);
		$idlastelement = $this->db->insert_id(); 							
		$data[1] = $idlastelement;
		return $data;
}


function nuevoescenarioartista($idescenario , $idartista){

		$query_insert ="INSERT INTO escenario_artista (idescenario , idartista ) 
		values ( '$idescenario', '$idartista' )";
		return  $this->db->query($query_insert);

}

/******************************************************************/
function deleteescenarioartosta($idescenario , $artista_quitar , $idempresa){

	$delet_escenario_artista ="DELETE FROM escenario_artista  WHERE idescenario = '".$idescenario."' and idartista ='".$artista_quitar."' ";
	return $this->db->query($delet_escenario_artista);
}



function updateinicioterminoartistabyid($idartista , $idescenario  , $hiartista  , $htartista , $idempresa){

	$query_update ="UPDATE  escenario_artista set hora_inicio = '". $hiartista ."' , hora_termino='".$htartista."' 
	WHERE   idescenario ='$idescenario' AND idartista='$idartista' ";
	$result = $this->db->query($query_update);
	return $result;	



}

/*Artistas en escenario */
function get_artistas_inevent($id_escenario){


	$query_get_artistas ="SELECT * FROM artista  a inner join escenario_artista ea 
						ON a.idartista =  ea.idartista 
						left outer join imagen_artista ia  
						on a.idartista =  ia.id_artista 
						left outer join imagen i 
						on ia.id_imagen = i.idimagen
						WHERE ea.idescenario= '". $id_escenario ."' ";

	$result_artistas = $this->db->query($query_get_artistas);
	return $result_artistas ->result_array();

	 
}
/**/
function get_artistas_resumen($id_escenario , $data_escenario, $nombre_evento){

	if ( strlen($data_escenario["descripcion"]) > 10 ) {
		
			$query_get ="select '".$nombre_evento."' evento  , 'Si' con_descripcion ,  count(0) artistas,  sum(case when url_social_youtube  is not null then 1 else 0 end) artistas_videos_youtube, 
							 sum(case when  url_sound_cloud    is not null then 1 else 0 end) artistas_pistas_sound,
							 sum(case when   hora_inicio is not null and   hora_termino  is not null  then 1 else 0 end) artistas_con_horario,
							 sum(case when  ea.status_confirmacion  = 'pendiente por confirmar' then 1 else 0 end) artistas_pendientes, 
							 sum(case when  ea.status_confirmacion  = 'Artista confirmado' then 1 else 0 end) artistas_conformado, 
							 sum(case when  ea.status_confirmacion  = 'Promesa de asistencia' then 1 else 0 end) artistas_prometen_asistencia
							 from artista a inner join escenario_artista ea  on a.idartista = ea.idartista where ea.idescenario = '". $id_escenario."' ";		
	 	
	 }else{
	 	$query_get ="select  '".$nombre_evento."' evento  , 'No' con_descripcion ,  count(0) artistas,  sum(case when url_social_youtube  is not null then 1 else 0 end) artistas_videos_youtube, 
							 sum(case when  url_sound_cloud    is not null then 1 else 0 end) artistas_pistas_sound,
							 sum(case when   hora_inicio is not null and   hora_termino  is not null  then 1 else 0 end) artistas_con_horario,
							 sum(case when  ea.status_confirmacion  = 'pendiente por confirmar' then 1 else 0 end) artistas_pendientes, 
							 sum(case when  ea.status_confirmacion  = 'Artista confirmado' then 1 else 0 end) artistas_conformado, 
							 sum(case when  ea.status_confirmacion  = 'Promesa de asistencia' then 1 else 0 end) artistas_prometen_asistencia
							 from artista a inner join escenario_artista ea  on a.idartista = ea.idartista where ea.idescenario = '". $id_escenario."' ";		
	 } 	

	$result_artistas =  $this->db->query($query_get);		
	return $result_artistas ->result_array();

}



/**/
function update_status($data){
	
	$query_update = "update escenario_artista set   status_confirmacion = '". $data["nuevo_status"]  ."' where idartista  = '". $data["artista"]."'  and  idescenario = '".$data["escenario"]."' ";
	return $this->db->query($query_update);


}



function update_nombre_artista($data){
	$query_update = "update artista set   nombre_artista = '". $data["nuevo_nombre"]  ."' where idartista  = '". $data["artista"]."'  ";
	return $this->db->query($query_update);

}
/*Termina modelo */
}