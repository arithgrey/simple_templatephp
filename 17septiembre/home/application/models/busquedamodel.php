<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
	_e lo que pertenece a una empresa en específico  
	_r registrados ==  todo lo que ya ha pasado  
	_g global 
*/
class busquedamodel extends CI_Model {
function __construct(){
    parent::__construct();        
    $this->load->database();
}
/**/
function construye_info_eventos( $flag ,  $extra = '' ,  $extra2 = '' ,  $_num = 0 ){

	if($_num == 0 ) {
       $_num = mt_rand();       
    }      					
    
    $query_temporal_tables =  "call enidserv_eniddbbbb3.repo_eventos_public($flag , $_num ,  '".$extra."' , '". $extra2 ."' );"; 

	$this->db->query($query_temporal_tables);	
	return $_num;
}

/**/
function carga_img($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
}
/*********************************************************/

function eventos_e($param){	

	$_num =  get_random(); 
	$data_complete["num_eventos"] =  $this->create_tmp_registrados_e( $_num,  0 , $param["id_empresa"] );
	$f_enid =0; 
	if ($data_complete["num_eventos"] > 0 ) {
		$f_enid = $this->crea_temporales($_num ,  0);	
			$_num_img  =  $this->carga_img( 1 , 0 ); 		


			/*Conseguimos la data */

				$query_get ="
					select 
					e.escenarios,
					e.idevento ,
					e.nombre_evento , 
					e.descripcion_evento , 
					e.fecha_inicio, 
					e.fecha_termino, 
					e.descripcion_evento,
					e.eslogan,
					e.edicion, 
					e.tipo,
					e.reservacion_tel  ,
					e.reservacion_mail ,
					ea.artistas , 
					epv.evento_punto_venta, 	
					ra.accesos 
					, i.*    
					from repo_eventos_escenarios_$_num e
					left outer join  repo_escenarios_artistas_$_num ea 
					on e.idevento = ea.id_evento 
					left outer join repo_evento_puntos_venta_$_num epv 
					on  e.idevento =  epv.idevento
					
					left outer join reporte_evento_accesos_$_num ra 
					on e.idevento =  ra.idevento
					left outer join imagen_evento ie 
					on ie.id_evento =  e.idevento
					left outer join tmp_img_$_num_img   i 
					on ie.id_imagen =  i.idimagen
					group by e.idevento
					ORDER by e.idevento desc
				";

				$result = $this->db->query($query_get);
				$data_complete["eventos"]  =   $result ->result_array();      
			

			
			$this->carga_img( 1 , 1 , $_num_img); 	
		$this->crea_temporales($_num ,  1);
	}
	$this->create_tmp_registrados_e( $_num,  1 , $param["id_empresa"]);
	return $data_complete;
}
/**/
function crea_temporales($_num ,  $flag){

	$f_escenarios =  $this->create_tmp_escenarios($_num ,  $flag ); 
	$f_artista =  $this->create_tmp_artistas($_num ,  $flag ); 
	$f_punto_venta =  $this->create_tmp_puntos_venta($_num ,  $flag ); 
	$f_accesos = $this->create_tmp_accesos($_num ,  $flag ); 
	return $f_accesos;
}
/*simula procedimiento almacenado */
function create_tmp_registrados_e($random , $flag ,  $id_empresa ){
	/*Eliminamos antes de crear */
	$query_delete =  "DROP  TABLE  IF exists tmp_evento_r_e_".$random;
	$this->db->query($query_delete);
	$db_response = 0; 
	/*--*/
	if ($flag == 0 ) {		

		$query_create =  "CREATE TABLE 
						  tmp_evento_r_e_".$random ." AS  
						  SELECT e.idevento,		
								e.nombre_evento,	
								e.status,	
								e.edicion,	
								e.descripcion_evento,    	
								e.idempresa,	
								e.idusuario,
								e.fecha_inicio,	
								e.fecha_termino,	
								e.ubicacion,	
								e.url_social,	
								e.url_social_youtube,	
								e.eslogan,
								e.tipo ,
								e.reservacion_tel ,
								e.reservacion_mail

						  FROM evento e
						  WHERE idempresa = '$id_empresa'  AND DATE(fecha_registro)  
						  BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL - 1 MONTH ) AND  CURRENT_DATE() LIMIT 100; 						  
						  ";
		
		$this->db->query($query_create);					  				
		



		/*ahora la consulto para saber cuando eventos hay */
			$query_get =  "SELECT COUNT(*)num_eventos FROM tmp_evento_r_e_".$random;
			$result =  $this->db->query($query_get);
			$db_response =  $result->result_array()[0]["num_eventos"];

	}
	return $db_response;
}
/**/
function create_tmp_escenarios($_num ,  $flag ){
	
	
	$query_drop =  "DROP  TABLE  IF exists repo_eventos_escenarios_".$_num;		
	$this->db->query($query_drop);
	
	$db_response = "-";

	if ($flag == 0 ){

		$query_create = "CREATE TABLE  repo_eventos_escenarios_$_num AS
						select e.idevento,		
						e.nombre_evento,	
						e.status,	
						e.edicion,	
						e.descripcion_evento,    	
						e.idempresa,	
						e.idusuario,
						e.fecha_inicio,	
						e.fecha_termino,	
						e.ubicacion,	
						e.url_social,	
						e.url_social_youtube,	
						e.eslogan,
						e.tipo,
						e.reservacion_tel ,   
						e.reservacion_mail ,  
						sum(case when es.idescenario is not null then 1 else 0 end) escenarios from
						tmp_evento_r_e_$_num  e
						left outer join
						escenario es ON e.idevento = es.idevento            
						group by e.idevento";
		
		$db_response =  $this->db->query($query_create);					

	}
	return $db_response; 
}
/**/
function create_tmp_artistas($_num ,  $flag ){

	$query_drop =  "DROP TABLE IF exists repo_escenarios_artistas_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0  ) {
		$query_create = "
			CREATE TABLE repo_escenarios_artistas_$_num AS  
			SELECT 
			ea.id_evento  ,  count(*)artistas 
			FROM tmp_evento_r_e_$_num e 
			INNER JOIN evento_artista ea  ON  e.idevento =  ea.id_evento GROUP BY id_evento"; 	

		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 	
}
/**/
function create_tmp_puntos_venta($_num ,  $flag ){
	
	$query_drop =  "DROP TABLE IF exists repo_evento_puntos_venta_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0  ){

		$query_create = "
						CREATE TABLE  repo_evento_puntos_venta_$_num AS  
						SELECT e.idevento  , count(*)evento_punto_venta from tmp_evento_r_e_$_num  e 
						INNER JOIN evento_punto_venta p 
						ON e.idevento =  p.idevento ";
		$db_response  =  $this->db->query($query_create);				
	}
	return $db_response; 
}
/**/
function create_tmp_accesos($_num ,  $flag){

	$query_drop =  "DROP TABLE IF exists reporte_evento_accesos_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0 ){

		$query_create= "
		CREATE TABLE reporte_evento_accesos_$_num AS 
		SELECT e.idevento ,  count(*)accesos  FROM tmp_evento_r_e_$_num e 
		INNER JOIN acceso a ON e.idevento =  a.idevento GROUP BY e.idevento"; 
		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 

}
/**/
function eventos_enid($param){

	/*
	$_num =  get_random(); 
	return $this->create_tmp_registrados_g($_num , 0 , $param );
	*/

	
	$_num =  get_random(); 
	$data_complete["num_eventos"] =  $this->create_tmp_registrados_g( $_num,  0  ,  $param );
	$f_enid =0; 
	if ($data_complete["num_eventos"] > 0 ) {
		$f_enid = $this->crea_temporales_g($_num ,  0);	
			$_num_img  =  $this->carga_img( 1 , 0 ); 		


				$query_get ="
					select 
					e.escenarios,
					e.idevento ,
					e.nombre_evento , 
					e.descripcion_evento , 
					e.fecha_inicio, 
					e.fecha_termino, 
					e.descripcion_evento,
					e.eslogan,
					e.edicion, 
					e.tipo,
					e.reservacion_tel  ,
					e.reservacion_mail ,
					ea.artistas , 
					epv.evento_punto_venta, 	
					ra.accesos 
					, i.*    
					from repo_eventos_escenarios_g_$_num e
					left outer join  repo_escenarios_artistas_g_$_num ea 
					on e.idevento = ea.id_evento 
					left outer join repo_evento_puntos_venta_g_$_num epv 
					on  e.idevento =  epv.idevento					
					left outer join reporte_evento_accesos_g_$_num ra 					
					on e.idevento =  ra.idevento
					left outer join imagen_evento ie 
					on ie.id_evento =  e.idevento
					left outer join tmp_img_$_num_img   i 
					on ie.id_imagen =  i.idimagen
					group by e.idevento
					ORDER by e.idevento desc
				";
				$result = $this->db->query($query_get);
				$data_complete["eventos"]  =   $result ->result_array();      
			
			$this->carga_img( 1 , 1 , $_num_img); 	
		$this->crea_temporales_g($_num ,  1);
	}
	$this->create_tmp_registrados_g( $_num,  1  , $param);
	return $data_complete;
	

}
/**/
function create_tmp_registrados_g($random , $flag , $param ){

	/*Eliminamos antes de crear */
	$query_delete =  "DROP  TABLE  IF exists tmp_evento_f_g_".$random;
	$this->db->query($query_delete);
	$db_response = 0; 
	/*--*/
	if ($flag == 0 ){		
			if($param["filtro_flag"] == 0 ){
				$db_response =  $this->busqueda_global($random); 				
			}else{
				$db_response =  $this->busqueda_global_filtro($random ,  $param);				
			}			
	}
	return $db_response;
}
function busqueda_global($random){
	$query_create =  "CREATE TABLE  tmp_evento_f_g_".$random ." AS  
							  	SELECT 
								  	e.idevento,		
									e.nombre_evento,	
									e.status,	
									e.edicion,	
									e.descripcion_evento,    	
									e.idempresa,	
									e.idusuario,
									e.fecha_inicio,	
									e.fecha_termino,	
									e.ubicacion,	
									e.url_social,	
									e.url_social_youtube,	
									e.eslogan,
									e.tipo,
									e.reservacion_tel  ,
									e.reservacion_mail 

						  		FROM evento e
							  	WHERE fecha_inicio 
							  	BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH )";		
				$this->db->query($query_create);					  							
				/*ahora la consulto para saber cuando eventos hay */
				$query_get =  "SELECT COUNT(*)num_eventos FROM tmp_evento_f_g_".$random;
				$result =  $this->db->query($query_get);
				$db_response =  $result->result_array()[0]["num_eventos"];
				return $db_response;
}
/**/
function busqueda_global_filtro($_num ,  $param){

	$f = $param["tipo_busqueda"]; 
	$flag_keyword = 0; 



		$sql_extra = ""; 		
		$sql_def_keyword =  "evento e
							INNER  JOIN evento_palabra_clave_$_num p
							ON e.idevento =  p.id_evento
							WHERE fecha_inicio 
							BETWEEN DATE(CURRENT_DATE) AND DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH ) "; 			
	


		$query_create_tmp =  "CREATE TABLE  tmp_evento_f_g_".$_num ." AS  
							  	SELECT 
								  	e.idevento,		
									e.nombre_evento,	
									e.status,	
									e.edicion,	
									e.descripcion_evento,    	
									e.idempresa,	
									e.idusuario,
									e.fecha_inicio,	
									e.fecha_termino,	
									e.ubicacion,	
									e.url_social,	
									e.url_social_youtube,	
									e.eslogan,
									e.tipo, 
									e.reservacion_tel  ,
									e.reservacion_mail 
	


						  		FROM 
							  	";		

							  	
	switch ($param["tipo_busqueda"]) {

		case 1:
			$sql_extra =  "  evento e
							  	WHERE fecha_inicio 
							  	BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH )  AND  e.nombre_evento like  '". $param["q"] ."%'"; 			
			break;
		case 2:

			$sql  = "SELECT id_evento , genero  FROM  evento_genero	WHERE genero LIKE   '". $param["q"] ."%' GROUP BY id_evento";
			$this->create_tmp_keyword($_num ,  0  ,  $sql ); 
			$sql_extra = $sql_def_keyword; 
			$flag_keyword = 1; 
			break;
		case 3:	
			$sql  = "SELECT id_evento , artista  FROM  evento_artista WHERE artista LIKE   '". $param["q"] ."%' GROUP BY id_evento";
			$this->create_tmp_keyword($_num ,  0  ,  $sql ); 
			$sql_extra = $sql_def_keyword; 			
			$flag_keyword = 1; 

			
			break;

		case 4:
		
			$sql_extra =  "evento e
							  	WHERE fecha_inicio 
							  	BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH )   AND  e.ubicacion  like  '". $param["q"] ."%'"; 			
			break;
		case 5:
			$sql_extra =  "  evento e
							  	WHERE fecha_inicio 
							  	BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH )  
							  	AND  e.tipo = '".$param["qtipo"]."' "; 			
				
			break;	

		case 6:					

			$sql = "SELECT idevento , precio FROM  acceso WHERE termino_acceso BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH ) and precio = '".$param["precio_evento"]."'  GROUP BY idevento"; 
			$this->create_tmp_keyword($_num ,  0  ,  $sql ); 
			$sql_extra = $sql_def_keyword; 			
			$flag_keyword = 1; 
			break;	



		case 0:
			$sql = "SELECT id_evento , genero  FROM  evento_genero	WHERE genero LIKE   '". $param["q"] ."%' GROUP BY id_evento 
					UNION 
					SELECT id_evento , artista  FROM  evento_artista WHERE artista LIKE   '". $param["q"] ."%' GROUP BY id_evento
					UNION
					SELECT idevento , precio 
					FROM  acceso 
					WHERE termino_acceso BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH ) AND   precio = '".$param["precio_evento"]."'  GROUP BY idevento
					UNION 
					SELECT idevento , nombre_evento  FROM evento WHERE fecha_inicio  BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH )
					AND nombre_evento LIKE '". $param["q"] ."%'
					UNION 
					SELECT idevento , ubicacion  FROM evento WHERE fecha_inicio  BETWEEN DATE(CURRENT_DATE) AND  DATE_ADD(CURRENT_DATE(), INTERVAL  1 MONTH )
					AND ubicacion LIKE '". $param["q"] ."%' "; 


					$this->create_tmp_keyword($_num ,  0  ,  $sql ); 
					$sql_extra = $sql_def_keyword; 			
					$flag_keyword = 1; 
			break;		
			
		default:	
			break;
	}
	
	$query_create =  $query_create_tmp  . $sql_extra;
	return $this->db->query($query_create);
}
/**/
function create_tmp_keyword($_num ,  $flag  , $sql ){
	
	$query_drop = "DROP TABLE  IF exists evento_palabra_clave_$_num"; 
	$this->db->query($query_drop);

	$result = ''; 
	if ($flag == 0 ){
	
		$query_create = "CREATE TABLE evento_palabra_clave_$_num  
						AS 
						SELECT 
						* 
						FROM event_palabra_clave_default";
		$result  =  $this->db->query($query_create);

		$sql_key = "INSERT INTO evento_palabra_clave_$_num(id_evento , palabra_clave  )" . $sql;
		$this->db->query($sql_key);

	}
	
	return $result;

}
/**/
function crea_temporales_g($_num ,  $flag){

	$f_escenarios =  $this->create_tmp_escenarios_g($_num ,  $flag ); 
	$f_artista =  $this->create_tmp_artistas_g($_num ,  $flag ); 
	$f_punto_venta =  $this->create_tmp_puntos_venta_g($_num ,  $flag ); 
	$f_accesos = $this->create_tmp_accesos_g($_num ,  $flag ); 			
	return $f_accesos; 
}
function create_tmp_escenarios_g($_num ,  $flag ){
	
	
	$query_drop =  "DROP TABLE  IF exists repo_eventos_escenarios_g_".$_num;		
	$this->db->query($query_drop);
	
	$db_response = "-";

	if ($flag == 0 ){

		$query_create = "CREATE TABLE  repo_eventos_escenarios_g_$_num AS
						select e.idevento,		
						e.nombre_evento,	
						e.status,	
						e.edicion,	
						e.descripcion_evento,    	
						e.idempresa,	
						e.idusuario,
						e.fecha_inicio,	
						e.fecha_termino,	
						e.ubicacion,	
						e.url_social,	
						e.url_social_youtube,	
						e.eslogan,
						e.tipo,
						e.reservacion_tel , 
						e.reservacion_mail ,

						sum(case when es.idescenario is not null then 1 else 0 end) escenarios from
						tmp_evento_f_g_$_num  e
						left outer join
						escenario es ON e.idevento = es.idevento            
						group by e.idevento";
		
		$db_response =  $this->db->query($query_create);					

	}
	return $db_response; 
}
/**/
function create_tmp_artistas_g($_num ,  $flag ){

	$query_drop =  "DROP TABLE IF exists repo_escenarios_artistas_g_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0  ) {
		$query_create = "
			CREATE TABLE repo_escenarios_artistas_g_$_num AS  
			SELECT 
			ea.id_evento  ,  count(*)artistas 
			FROM tmp_evento_f_g_$_num e 
			INNER JOIN evento_artista ea  ON  e.idevento =  ea.id_evento GROUP BY id_evento"; 	

		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 

}
/**/
function create_tmp_puntos_venta_g($_num , $flag){

	$query_drop =  "DROP TABLE IF exists repo_evento_puntos_venta_g_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 
	if ($flag ==  0  ){

		$query_create = "
						CREATE TABLE  repo_evento_puntos_venta_g_$_num AS  
						SELECT e.idevento  , count(*)evento_punto_venta from tmp_evento_f_g_$_num   e 
						INNER JOIN evento_punto_venta p 
						ON e.idevento =  p.idevento ";
		$db_response  =  $this->db->query($query_create);				
	}
	return $db_response; 
}
/**/
function create_tmp_accesos_g($_num ,  $flag){

	$query_drop =  "DROP TABLE IF exists reporte_evento_accesos_g_$_num"; 
	$this->db->query($query_drop);
	$db_response = 0; 

	if ($flag ==  0 ){

		$query_create= "
		CREATE TABLE reporte_evento_accesos_g_$_num AS 
		SELECT e.idevento ,  count(*)accesos  FROM tmp_evento_f_g_$_num  e 
		INNER JOIN acceso a ON e.idevento =  a.idevento GROUP BY e.idevento"; 
		$db_response =  $this->db->query($query_create);		
	}
	return $db_response; 

}









/*Termina modelo */
}
