<?php defined('BASEPATH') OR exit('No direct script access allowed');
class eventmodel extends CI_Model{
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function get_generos_evento($param){

	$query_get = "SELECT  eg.* FROM  evento_genero eg WHERE id_evento= '".$param["evento"] ."' ";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/**/
function contruye_tmp_evento_edit($id_evento , $f , $_num='0' ){

	if($_num == 0 ) {
       $_num = mt_rand();       
    }      												
    	
	$query_procedure = "call enidserv_eniddbbbb3.data_event_public($id_evento , $f , $_num );";	
	$this->db->query($query_procedure);
	return $_num; 
}
function get_resum_by_id_event($id_evento){

	$_num =  $this->contruye_tmp_evento_edit($id_evento , 0  ); 	
	

	$query_get ="
				select 
				ee.* , 
				ea. artistas , 
				ep.evento_punto_venta, 
				es.generos_musicales, 
				eserv.servicios 
				from    
				v_eventos_escena_e_$_num  ee 
				left outer join v_escenarios_artistas_e_$_num ea  on  ee.idevento  =   ea.idevento			
				left outer join v_evento_punto_v_$_num ep on ee.idevento = ep.idevento	
				left outer join  v_evento_sound_$_num es  on ee.idevento = es.idevento 
				left outer join v_event_serv_$_num   eserv  on  ee.idevento = eserv.idevento";
				

	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();
	$_num =  $this->contruye_tmp_evento_edit($id_evento , 1 , $_num ); 
	return $data_complete; 
}

/**/
function get_img_evento($id_evento){

	$_num =  $this->carga_img_base_enid( 1 , 0 ); 
	$query_get ="select 
				i.* 
				from 
				tmp_img_$_num i 
				inner join imagen_evento 
				ie on  i.idimagen =  ie.id_imagen 
				and ie.id_evento =   '". $id_evento."'				
				where ie.id_evento = '". $id_evento."' ";

	$result = $this->db->query($query_get);
	$data_complete =   $result->result_array();	
	$this->carga_img_base_enid( 1 , 1 , $_num); 
	return $data_complete; 
}
/**/
function getTematicaByid($idevento , $idempresa )
{
		
	$query_get ="SELECT t.* , et.idevento , et.idtematica as idtem 	
	FROM tematica as t LEFT OUTER JOIN  evento_tematica as et 
	ON t.idtematica = et.idtematica and et.idevento = '".$idevento."' ORDER BY  t.tematica_evento asc";

	$result = $this->db->query($query_get);
	return $result->result_array();

}
/**/
function update_tematicaby_id( $idevento , $idtematica, $idempresa ){
	
	$query_delete ="DELETE FROM evento_tematica WHERE idevento ='".$idevento."' limit 1";
	$resultado_count = $this->db->query($query_delete);
	$dinamic_query ="INSERT INTO evento_tematica VALUES( '".$idevento."' , '".$idtematica."' )";
	$r = $this->db->query($dinamic_query);
	return $r;
}
/*Actualiza los objetos permitidos dentro del evento*/
function update_obj_permitidobyId($idevento, $idobjeto){

	$query_exist ="SELECT * FROM evento_objetopermitido WHERE  idevento ='".$idevento."' AND  
	idobjetopermitido='". $idobjeto ."' ";

	$result_eventoobjto = $this->db->query($query_exist);
	$exist = $result_eventoobjto ->num_rows();

	if ($exist >0 ) {
		/*Delete */
		$dinamic_query ="DELETE FROM evento_objetopermitido WHERE idevento = '".$idevento."' 
		AND  idobjetopermitido = '". $idobjeto ."' ";


	}else{
		/*insert*/
		$dinamic_query ="INSERT INTO evento_objetopermitido (idevento , idobjetopermitido ) 
		VALUES('".$idevento."' , '". $idobjeto ."' )";		

	}
	return $this->db->query($dinamic_query);

}
/**/
function create( $nombre , $edicion , $inicio , $termino , $idusuario , $idempresa , $perfiles  ) {

	
	$query_insert ="INSERT INTO evento(nombre_evento , edicion , idempresa , idusuario , fecha_inicio , fecha_termino )
	 VALUES( '$nombre' , '$edicion' , '$idempresa' ,   '$idusuario' , '$inicio' , '$termino' )";

	$dbresponse =  $this->db->query($query_insert);
	/*Registramos log evento */
		if ($dbresponse) {		
			/*Registramos log */
			$id_ev = $this->db->insert_id(); 							
			$actividad =  "con fecha de inicio " .  $inicio; 
			$this->record_log($actividad  , $idusuario , $idempresa  ,$id_ev , 1 , "INSERT"); 		
			/**/
			$this->update_diferencias_dias($id_ev); 
			return $id_ev;

		}else{
			/**/
			return "Problemas al registrar reportar al administrador";
		}			
}
/**/

/*Los ultimos eventos vividos */
function get_last_events_experience( $num , $less ){

	$query_get ="SELECT  e.* , count(es.idescenario) as totalescenarios  FROM evento as e
	left outer join escenario as es on e.idevento = es.idevento 
    where e.idevento != '".$less."' and  e.idempresa = (SELECT idempresa FROM evento WHERE idevento = 1 ) 
    group by e.idevento ORDER BY e.fecha_registro DESC LIMIT $num";
	$result = $this->db->query($query_get);
	return $result ->result_array();      
	
}
/*Los últimos eventos registrados de la empresa*/
function get_last_events($id_empresa , $num ){

	/**/
	$_num =  $this->carga_base_img_event(0 , $id_empresa );
	$query_get ="
	select 
	e.*  , 
	ea.artistas , 
	epv.evento_punto_venta, es.servicios , 
	ra.accesos 
	, i.*    
	from repo_eventos_escenarios_$_num e
	left outer join  repo_escenarios_artistas_$_num ea 
	on e.idevento = ea.idevento 
	left outer join repo_evento_puntos_venta_$_num epv 
	on  e.idevento =  epv.idevento
	left outer join repo_evento_servicios_$_num  es 
	on e.idevento =  es.idevento
	left outer join reporte_evento_accesos_$_num ra 
	on e.idevento =  ra.idevento
	left outer join imagen_evento ie 
	on ie.id_evento =  e.idevento
	left outer join imagen  i 
	on ie.id_imagen =  i.idimagen
	group by e.idevento
	ORDER by e.idevento desc
	LIMIT $num ";


	$result = $this->db->query($query_get);
	$data_complete  =   $result ->result_array();      
	$this->carga_base_img_event(1 , $id_empresa , $_num  );
	return $data_complete; 
}
/*check if exist*/
function checkifexist($idevento){

	$query_exist ="SELECT * FROM evento where  idevento ='". $idevento ."' ";
	$result = $this->db->query($query_exist);
		
		$num =0;
		$num =  $result->num_rows();

		if ($num > 0 ) {
			return 1;
		}else{
			return 0;
		}
}/*Termina la función*/
function getEventbyid($id_evento){	
	$query_get ="SELECT * FROM evento WHERE idevento = '".$id_evento."' limit 1 ";
	$result = $this->db->query($query_get);
	return $result ->result_array();      
}
/**/
function updateNombre($nuevo_nombre , $id_evento , $id_usuario , $id_empresa ){	

	$query_update = "UPDATE evento SET nombre_evento = '". $nuevo_nombre."' WHERE idevento ='".$id_evento."' ";	
	$result = $this->db->query($query_update);
	/**/	
	if ($result == 1){
	
		$data_event =  $this->getEventbyid($id_evento)[0]; 			
		$nombre_evento =  $data_event["nombre_evento"];
		$actividad =" el nombre del evento  a " . $nuevo_nombre;		
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , 1 , "UPDATE");
	}
	/**/
	return $result; 	
}
function updateEdicion( $nuevo_edicion , $id_evento  , $id_usuario  ,  $id_empresa ){

	$query_update = "UPDATE evento SET edicion = '". $nuevo_edicion."' WHERE idevento ='".$id_evento."' limit 1";		
	$result =  $this->db->query($query_update);		

	if ($result ==  1 ){
		$actividad =" la edición del evento a ". $nuevo_edicion;
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , 1 , "UPDATE" );  			
	}
	return $result;
	/**/	
}
function updateDescripcion($nueva_descripcion , $id_evento  , $id_usuario , $id_empresa ) {
	
	$query_update = "UPDATE evento SET descripcion_evento='". $nueva_descripcion."' WHERE idevento ='".$id_evento."'  limit 1";				
	$result =  $this->db->query($query_update); 	
	if ( $result == 1 ) {		
		$actividad =" la descripcion del evento a ". $nueva_descripcion; 	
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , 1 , "UPDATE" );  	
	}
	return $result; 	
}
/*Actualiza el campo descripcion por uno que ya se encuentra registrado en un contenido*/
function update_descripcion_by_content($id_contenido , $id_evento  ,  $id_usuario ,  $id_empresa ){

	$query_update ="UPDATE evento SET descripcion_evento = (SELECT descripcion_contenido FROM contenido WHERE  idcontenido='". $id_contenido ."' ) WHERE idevento='".$id_evento."' limit 1";
	$result =  $this->db->query($query_update);	
	if ($result  ==  1 ){	
		$actividad =" la descripcion del evento mediante una de sus plantillas "; 	
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , 1 , "UPDATE" );  		
	} 
	return $result;
}
function updatePoliticas($nueva_politica , $idevento ){
	
	$query_update = "UPDATE evento SET  politicas='". $nueva_politica ."' WHERE idevento ='".$idevento."' limit 1";		
	return  $this->db->query($query_update);
}
function updatePermitido($nuevo_permitido , $idevento ){

	$query_update = "UPDATE evento SET  permitido='". $nuevo_permitido ."' WHERE idevento ='".$idevento."'  limit 1";		
	return  $this->db->query($query_update);
}
function updateRestricciones($nuevo_restriccion , $idevento ){

	$query_update = "UPDATE evento SET  restricciones ='". $nuevo_restriccion ."' WHERE idevento ='".$idevento."'  limit 1 ";		
	return  $this->db->query($query_update);
}
function updateUbicacion($nueva_ubicacion , $id_evento , $id_usuario , $id_empresa  ) {
	

	$query_update = "UPDATE evento SET ubicacion='". $nueva_ubicacion ."' WHERE idevento ='".$id_evento."' limit 1";		
	$result =   $this->db->query($query_update);
	
	if ($result == 1){		
		$actividad =" la ubicación del evento a  " . $nueva_ubicacion;
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , 1 , "UPDATE" ); 
	}
	return $result; 
}
function updategeneros($nuevos_generos , $idevento ){

	$query_update = "UPDATE evento SET genero_tupla='". $nuevos_generos ."' WHERE idevento ='".$idevento."'  limit 1";		
	return  $this->db->query($query_update);
}
function updateurl($nueva_url , $url_social_evento_youtube , $idevento ) {
	
	$query_update = "UPDATE evento SET url_social='". $nueva_url ."' , url_social_youtube='". $url_social_evento_youtube ."'   WHERE idevento ='".$idevento."'  limit 1";		
	return  $this->db->query($query_update);
}
	
function updateurlyout($nueva_url , $idevento ){
	$query_update = "UPDATE evento SET url_social_youtube='". $nueva_url ."'  WHERE idevento ='".$idevento."' limit 1";		
	return  $this->db->query($query_update);

}
function getObjetosPermitidos($id_evento , $id_empresa){

	$query_get = "select  o.* , eo.idempresa , evo.idevento 	
	from objetopermitido as o 
	inner join empresa_objetopermitido as eo 
	on o.idobjetopermitido = eo.idobjetopermitido
	and eo.idempresa=  '". $id_empresa."' 
	left outer join evento_objetopermitido as evo 
	on eo.idobjetopermitido = evo.idobjetopermitido
	and evo.idevento = '".$id_evento."' group by o.nombre";
	$result = $this->db->query($query_get);
	return $result ->result_array();      
	
}
/*Pasados **Pasados **Pasados **Pasados **Pasados **Pasados **Pasados */
function get_time_events_byid($idempresa ){


	$query_get ="SELECT  e.idevento , e.nombre_evento, e.descripcion_evento , e.fecha_inicio , 
	e.fecha_termino ,
	e.url_social, e.url_social_youtube, e.portada , e.status  as estadoevento , e.edicion ,
	count(es.idescenario) as totalescenarios 
	FROM evento as e
	left outer join escenario as es 
	on e.idevento = es.idevento 
	where e.idempresa ='". $idempresa."' 
	group by e.idevento";
	$result = $this->db->query($query_get);
	return $result ->result_array();   
}
/**End Pasados **End Pasados **End Pasados **End Pasados **End Pasados **/
function get_servicios_evento_by_id($id_evento){

	$query_get ="select * from servicio as s, evento_servicio as es
	 where es.idevento = '".$id_evento."' and s.idservicio = es.idservicio";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*********************        **************************               *****************/
function delete_byid($id_evento , $id_usuario , $id_empresa ){

	$query_procedure="call enidserv_eniddbbbb3.delete_evento_all_data('". $id_evento ."'  , '". $id_usuario ."' );";
	return $this->db->query($query_procedure);
}
/**/
function get_list_generos_musicales_byidev($id_evento){

	$query_get ="select g.idgenero_musical, g.nombre  from genero_musical as g 
		inner join evento_genero_musical as egm
		on   g.idgenero_musical = egm.idgenero_musical 
		where egm.idevento = '".$id_evento. "'";

	$result = $this->db->query($query_get);				
	return $result->result_array();
}
/****************** ****************** ****************** ****************** ****************** */
function update_eslogan($id_evento , $eslogan , $id_usuario , $id_empresa ){

	/*UPDATE*/
	$query_update ="UPDATE evento SET eslogan= '$eslogan' WHERE idevento = '". $id_evento ."' limit 1";	
	$result =   $this->db->query($query_update);

	if ($result == true){
		
		$actividad =  " el slogan del evento a " . $eslogan;
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento , 1 , "UPDATE" ); 
	}
	return $result;  
}
/**/
function update_tipo_evento($id_evento , $tipo_evento ){

	$query_update ="UPDATE evento SET tipo= '$tipo_evento' WHERE idevento = '".$id_evento."' limit 1";
	return $this->db->query($query_update);
}
/* get listobjetos permitidos del evento */

function get_objetos_permitidosin_event($id_evento){
	$query_get = "SELECT op.idobjetopermitido ,  op.nombre  , op.* FROM  objetopermitido AS op 
	INNER JOIN  evento_objetopermitido eop 
	ON  op.idobjetopermitido = eop.idobjetopermitido 
	WHERE  eop.idevento='". $id_evento."' ORDER BY  nombre";
	
	$result_obj = $this->db->query($query_get);
	return $result_obj->result_array();

}
/**/
function update_all_in_event_obj_inter($id_evento , $id_empresa ){

	$query_procedure ="call enidserv_eniddbbbb3.update_all_obj_in_event( $id_evento , $id_empresa );";		
	$result = $this->db->query($query_procedure);			
	return $result->result_array();
}
/**/
function update_status_by_id( $id_evento , $nuevo_status ,  $id_usuario ){

	$query_procedure ="call enidserv_eniddbbbb3.onupdate( '".$nuevo_status."', ". $id_evento  . ", ".$id_usuario." );";
	$r = $this->db->query($query_procedure);
	return $r->result_array();
}
/**/
function get_event_text_by_id( $id_evento , $campo ){
	

	$query_get = "SELECT $campo FROM evento WHERE idevento = '". $id_evento ."' ";
	$result = $this->db->query($query_get);
	return $result ->result_array();
}
function update_date($id_evento , $nuevo_inicio , $nuevo_termino ){
	/**/
	$query_update ="UPDATE evento SET fecha_inicio = '". $nuevo_inicio."' , fecha_termino ='".$nuevo_termino."' WHERE idevento='".$id_evento."'  limit 1";	
	$r =   $this->db->query($query_update);
	return  $this->update_diferencias_dias($id_evento); 

}
function update_diferencias_dias($id_evento)
{	
	/**/
	$query_update =  "SELECT datediff(fecha_registro , fecha_inicio)dif_dias from  evento  WHERE idevento='".$id_evento."'  limit 1";	
	$result =  $this->db->query($query_update);
	$num_dias =  $result->result_array()[0]["dif_dias"];
	//$num_dias =  variant_abs($num_dias);
	/*update*/
	$query_update ="UPDATE evento SET periodo_publicacion = ". $num_dias ."  WHERE idevento='".$id_evento."'  limit 1";	
	$result =   $this->db->query($query_update);
	return $result;
}
/*retorna el escenairo por el id del escenario*/
function get_by_escenario($id_escenario){

	$query_get ="select 
				*  
				from evento e  
				inner join 
				escenario esc on e.idevento = esc.idevento  
				where esc.idescenario = '".$id_escenario."' limit 1 ";	
	$result =  	$this->db->query($query_get);
	return $result->result_array();
}
/**/
function get_generos($id_empresa , $id_evento , $genero_filtro){

	$query_get ="select g.* , egm.idevento  , egm.idgenero_musical  idg  from genero_musical g 
	left outer join evento_genero_musical egm 	
	on g.idgenero_musical =  egm.idgenero_musical  and egm.idevento = '".$id_evento."'
	where nombre like '".$genero_filtro."%' LIMIT 3";		

	$result  = $this->db->query($query_get);
	return $result->result_array();

}
/**/
function get_days_to_event($fecha_inicio){

	$query_get = "SELECT DATEDIFF( '". $fecha_inicio."' , CURRENT_DATE() ) AS DateDiff";
	$result = $this->db->query($query_get); 
	return $result->result_array(); 
}
/**/
/**/
function record_log($actividad , $idusuario , $idempresa , $id_evento , $tipo , $accion ){

	$query_insert="INSERT INTO  log_evento(
				actividad  , 
				id_usuario , 
				idempresa , 
				id_evento  , 
				tipo , 
				accion ) 
				VALUES(
					'". $actividad."' , 
					'". $idusuario  ."' ,  
					'". $idempresa ."' , 
					'". $id_evento ."' , 
					'". $tipo ."' , 
					'". $accion ."' )";

	$this->db->query($query_insert);						
}	
/**/
  function carga_base_img_event( $flag  , $id_empresa , $_num = 0 ){
      
    if($_num == 0 ) {
       $_num = mt_rand();       
    }      												
    
    $query_temporal_tables =  "call enidserv_eniddbbbb3.repo_eventos_admin($_num , $flag  , $id_empresa);"; 
	$this->db->query($query_temporal_tables);	
	return $_num;

  }
  function carga_img_base_enid($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
  }
/*Termina modelo */
}



