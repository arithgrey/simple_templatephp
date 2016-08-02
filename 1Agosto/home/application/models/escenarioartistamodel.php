<?php defined('BASEPATH') OR exit('No direct script access allowed');
class escenarioartistamodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}

/**/
function get_artista($id_artista){
	$query_get ="select *  from artista where idartista =  '".$id_artista ."' limit 1 "; 
	$result  = $this->db->query($query_get); 
	return $result->result_array();
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
  
function registraartistaescenario($id_escenario , $nuevoartista , $id_empresa, $id_evento , $id_usuario){

	$registroartista = $this->nuevoartista($nuevoartista);
	if ($registroartista[0] ==  true) {
		$idartista = $registroartista[1];
		return $this->nuevo_escenario_artista($id_escenario , $idartista , $id_evento , $nuevoartista , $id_usuario , $id_empresa );
	}else{
		return "Falla al registrar artista";
	}	
}	
/**/
function nuevoartista($nuevoartista){
		/*Aquí validaremos que no éxista*/
		$query_insert ="INSERT INTO artista (nombre_artista) values ( '$nuevoartista' )";
		$data[0] = $this->db->query($query_insert);
		$idlastelement = $this->db->insert_id(); 							
		$data[1] = $idlastelement;
		return $data;
}
/**/
		 
function nuevo_escenario_artista($id_escenario , $id_artista , $id_evento , $artista , $id_usuario  , $id_empresa ){

		$query_insert ="INSERT INTO escenario_artista (idescenario , idartista ) 
		values ( '$id_escenario', '$id_artista'  )";
		$result =  $this->db->query($query_insert);
		/*Insertamos en la tabla que nos sirve como palabra clave  en el futuro*/
		$query_insert = "INSERT INTO evento_artista(id_evento , id_artista, artista )VALUES( '". $id_evento ."' , '".$id_artista  ."' , '". $artista ."')";
		$result = $this->db->query($query_insert);

		if ($result ==  true) {
			
			$data_event =  $this->getEventbyid($id_evento)[0]; 
			$nombre_evento =  $data_event["nombre_evento"];			
			$actividad =  "Indicó que el artista " . $artista ." se presentará en el evento " . $nombre_evento; 							
			$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , "INSERT" , $id_artista);			
		}		
		return $result;
}
/******************************************************************/		 
function deleteescenarioartosta($id_escenario , $id_artista , $id_empresa , $id_evento , $id_usuario ){

	$delet_escenario_artista ="DELETE FROM escenario_artista  WHERE idescenario = '".$id_escenario."' 
	and idartista ='".$id_artista."' ";	
	$result_delete =  $this->db->query($delet_escenario_artista);

	$query_delete = "DELETE FROM evento_artista WHERE id_evento = '". $id_evento  ."' 
	AND id_artista = '". $id_artista ."'  ";
	$result = $this->db->query($query_delete);
	
	if ( $result == true){
		$actividad =  " al artísta "; 										 
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , "DELETE" , $id_artista );		
	}	
	return $result; 
}
function updateinicioterminoartistabyid($id_artista , $idescenario  , $hiartista  , $htartista , $id_empresa , $id_usuario , $id_evento  ){

	$query_update ="UPDATE  
					escenario_artista 
					set hora_inicio = '". $hiartista ."' ,
					hora_termino='".$htartista."' 
					WHERE   idescenario ='$idescenario' 
					AND 
					idartista='$id_artista' ";

	$result = $this->db->query($query_update);

	if ($result ==  true ){
		/*Cargamos log de  la actividad */
		$actividad = " el horario de presentación de " . $hiartista  . " a " .  $htartista ;
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento ,  'UPDATE' , $id_artista );
	}
	return $result;
}
/**/

/*Artistas en escenario */
function get_artistas_inevent($id_escenario){

	/*agilizamos la consulta reduciendo la tabla de contactos*/
	
	$_num =  $this->cargamos_base_img_artistas(7 , 0  , 0  );	

	/*Terminamos de agilizar la consulta */
	$query_get_artistas ="SELECT * FROM artista  a inner join escenario_artista ea 
						ON a.idartista =  ea.idartista 
						left outer join imagen_artista ia  
						on a.idartista =  ia.id_artista 
						left outer join tmp_img_$_num i 
						on ia.id_imagen = i.idimagen
						WHERE ea.idescenario= '". $id_escenario ."' ";

	$result_artistas = $this->db->query($query_get_artistas);
	$data_complete =  $result_artistas ->result_array();
	$this->cargamos_base_img_artistas(7 , 1  , $_num  );		
	return  $data_complete;

	 
}

function cargamos_base_img_artistas($tipo , $f  , $_num = 0 ){      
    if($_num == 0 ) {
       $_num = mt_rand();       
      }


	$query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
	$this->db->query($query_procedure);
	return $_num;
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
/**/
function update_nombre_artista($data){
	$query_update = "update artista set   nombre_artista = '". $data["nuevo_nombre"]  ."' where idartista  = '". $data["artista"]."'  ";
	return $this->db->query($query_update);

}
/**/
function get_list_artistas_evento($id_evento){

	$query_get =  "select a.* , ea.idescenario id_escenario from artista a  
				   inner join  escenario_artista ea  on a.idartista  =  ea.idartista 
				   inner join escenario e on ea.idescenario = e.idescenario where e.idevento =  '". $id_evento."' ";
	$result =  $this->db->query($query_get);
	return $result ->result_array();
}
/**/
function update_tipo_artista($param){

	$query_update = "UPDATE escenario_artista set tipo_artista =  '". $param["tipo_artista"] ."' WHERE idescenario = '". $param["escenario"] ."'  AND idartista = '". $param["artista"] ."' limit 1";  
	$result = $this->db->query($query_update);
	return $result;
}
/**/
/**/
function getEventbyid($id_evento){	
	$query_get ="SELECT * FROM evento WHERE idevento = '".$id_evento."' limit 1 ";
	$result = $this->db->query($query_get);
	return $result ->result_array();      
}
/**/
function get_artista_by_id($id_artista){
	
	$query_get = "select * from artista where idartista  = '". $id_artista ."' limit 1 "; 
	$result = $this->db->query($query_get);
	return $result ->result_array();      
}
/**/			
function record_url_artista($id_escenario , $id_artista , $url , $social , $id_usuario , $id_empresa , $id_evento  ){
	

	$query_update ="update escenario_artista set url_sound_cloud = '".$url."' WHERE idescenario = '".$id_escenario."'  AND idartista = '".$id_artista."'  ";	
	if ($social == "youtube") {
		$query_update ="update escenario_artista set url_social_youtube  = '".$url."' WHERE idescenario = '".$id_escenario."'  AND idartista = '".$id_artista."'  ";			
	}
		
	
	$result =  $this->db->query($query_update);	

	if ($result == true  ) {		
	
		$actividad = "la url de " . $social . " " . $url ." al escenario ";
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento ,  'UPDATE' , $id_artista );
	}
	return  $result;
	
}
/**/
function record_log($actividad , $idusuario , $id_empresa , $id_evento ,  $accion , $id_artista ){

	$query_insert="INSERT INTO  log_evento(
				actividad  , 
				id_usuario , 
				idempresa , 
				id_evento , 
				tipo , 
				accion , 
				id_artista ) 
				VALUES(
					'". $actividad."' , 
					'". $idusuario  ."' ,  
					'". $id_empresa ."' , 
					'". $id_evento ."' , 
					'4' , 
					'". $accion ."',
					'". $id_artista ."'
					 )";
	$this->db->query($query_insert);						
}	



/*Termina modelo */
}