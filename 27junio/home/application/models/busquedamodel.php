<?php defined('BASEPATH') OR exit('No direct script access allowed');
class busquedamodel extends CI_Model {
function __construct(){
    parent::__construct();        
    $this->load->database();
}

function construye_keywods($param , $where_fecha ){
	
	$_num_palabra_clave = $this->busqueda_por_fechas_palabra_clave($param , $where_fecha , 0 ); 
	/*Consultamos sobre la semana */	 
	$data_palablas_clave  =  $this->exists_palabra_clave($_num_palabra_clave); 
	/*Las eliminamos*/
	$this->busqueda_por_fechas_palabra_clave($param , $where_fecha , 1 ,  $_num_palabra_clave  ); 
	return $data_palablas_clave;
	
}
/**/
function load_eventos_busqueda_enid($param){

	$where_fecha =" where e.fecha_inicio between CURRENT_DATE() and  DATE_ADD(CURRENT_DATE() , INTERVAL 7 DAY ) ";
	$data_palablas_clave =  $this->construye_keywods($param , $where_fecha ); 
	/*Los elementos encontrados en los próximos 7 días */
	$bloke = array();
	if (count($data_palablas_clave ) > 0 ) {					

		$bloke["elemento"] = count($data_palablas_clave ); 
		$bloke["eventos"]= $this->construye_sql_evento($data_palablas_clave, $where_fecha );

	}else{

		$where_fecha =" where e.fecha_inicio between CURRENT_DATE() and  DATE_ADD(CURRENT_DATE() , INTERVAL 3 MONTH ) ";
		$data_palablas_clave =  $this->construye_keywods($param , $where_fecha ); 		

		if (count($data_palablas_clave ) > 0 ) {
			$bloke["elemento"] = 1; 
			$bloke["eventos"]= $this->construye_sql_evento($data_palablas_clave, $where_fecha );

		}else{
			$bloke["elemento"] = 0; 
			$bloke["eventos"]= "";			
		}					
		
		
	}
	return $bloke;		
	
}
/**/
function construye_sql_evento($data_palablas_clave , $extra){
	/**/
	$extra2  = " and e.idevento in(";
	$flag = 0; 
	$total =  count($data_palablas_clave) -1; 
	foreach ($data_palablas_clave as $row){
		if ($flag ==  $total  ){
			$extra2 .=  "  ". $row["id_evento"]."  ";	
		}else{
			$extra2 .=  "  ". $row["id_evento"]."  , ";	
		}
		$flag++;		
	}

	$extra2 .=  " )";
	return $this->get_eventos_dinamic($extra  ,  $extra2 ); 	
}
/**/
function exists_palabra_clave($_num_palabra_clave){

	$query_get = "SELECT *  FROM evento_palabra_clave_$_num_palabra_clave  group by id_evento ";
	$result = $this->db->query($query_get);
	$e   =   $result ->result_array();      
	return $e;
}
/**/
function busqueda_por_fechas_palabra_clave($param , $where_fecha , $f  , $_num = 0  ){	

	if($_num == 0 ) {
        $_num = mt_rand();       
    }    
	$query_procedure = "call enidserv_eniddbbbb3.create_temp_palabra_clave( '". $where_fecha ."',   $_num  , $f  , '". $param["palabra_clave"] ."'  );"; 		
	$this->db->query($query_procedure);
	return $_num;
}
/*listamos los eventos del día */
function get_eventos_dinamic($extra  ,  $extra2   ){

	$_num =  $this->construye_info_eventos(0 , $extra ,  $extra2 );
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
	ea.artistas , 
	epv.evento_punto_venta, 
	es.servicios , 
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
	left outer join tmp_img_$_num_img   i 
	on ie.id_imagen =  i.idimagen
	group by e.idevento
	ORDER by e.idevento desc
	";

	$result = $this->db->query($query_get);
	$data_complete  =   $result ->result_array();      
	$this->construye_info_eventos(1 , $extra ,  $extra2 ,  $_num  );
	$this->carga_img( 1 , 1 , $_num_img); 
	return $data_complete; 
	
}
/**/
function construye_info_eventos( $flag ,  $extra = '' ,  $extra2 = '' ,  $_num = 0 ){

	if($_num == 0 ) {
       $_num = mt_rand();       
    }      					
    
    //call enidserv_eniddbbbb3.repo_eventos_public(0  , 0 ,  'where   e.fecha_inicio between CURRENT_DATE() and  DATE_ADD(CURRENT_DATE() , INTERVAL 7 DAY )' , ' AND e.idevento in("1")' );
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

/*Termina modelo */
}
