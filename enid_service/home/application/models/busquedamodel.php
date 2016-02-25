<?php defined('BASEPATH') OR exit('No direct script access allowed');
class busquedamodel extends CI_Model {
function __construct(){
    parent::__construct();        
    $this->load->database();
}
/**/
function load_eventos_busqueda($param){

	/*Para la fecha*/
	$palabra_clave = $this->busqueda_por_palabra_clave($param); 
	$fecha_tramo =  $this->busqueda_por_fechas($param);	
	//$estado_tramo =  $this->busque_por_estado($param);	
	$query_get ="SELECT * FROM evento e " . $palabra_clave  . $fecha_tramo . " group by idevento limit 50";	
	$result = $this->db->query($query_get);
	$data["eventos"]=  $result->result_array();
	$data["query"] =  $query_get;
	return $data;
	
}
/***********************Palabra clave  ************************/
function busqueda_por_palabra_clave($param){

	$tramo_palabra_clave = ""; 
	if (strlen($param["palabra_clave"]) < 1 ){

		$tramo_palabra_clave ="";  

	}else{
		/*Construimos tabla de palabras clave temporal*/
		$this->busqueda_por_fechas_palabra_clave($param); 

		/**/		
		$tramo_palabra_clave =  " inner join evento_palabra_clave ep 
		on e.idevento =  ep.id_evento and  ep.palabra_clave like '%". $param["palabra_clave"] ."%' OR e.ubicacion  like '%". $param["palabra_clave"] ."%'  OR e.edicion like '%". $param["palabra_clave"] ."%' ";
		

	}
	return $tramo_palabra_clave; 
}
/**/
function busqueda_por_fechas_palabra_clave($param){

	$query_procedure =  ""; 
	$cuando  =  $param["cuando"];  		
	if ( $cuando == "Cualquiera" ){		
		/**/
		$cuando = 0; 
		$query_procedure = "call enidserv_eniddbbbb3.create_temp_palabra_clave( $cuando  , 0);"; 

	}elseif($cuando ==  "Del próximo mes" ){
			
		$cuando = 2; 
		$query_procedure = "call enidserv_eniddbbbb3.create_temp_palabra_clave( $cuando , 2 );"; 

	}elseif( $cuando ==  "Mas" ){
			
		$cuando = 3; 
		$query_procedure = "call enidserv_eniddbbbb3.create_temp_palabra_clave( $cuando , 3 );"; 

	}else{
		
		$cuando = 1; 
		$query_procedure = "call enidserv_eniddbbbb3.create_temp_palabra_clave( $cuando , 1 );"; 
	}
	$this->db->query($query_procedure);
}
/****************************** Para las fechas ***************************/
function busqueda_por_fechas($param){

	$tramo_fecha =  ""; 
	$cuando = $param["cuando"];
	if ($cuando  == "Cualquiera") {

		$tramo_fecha =  "WHERE fecha_inicio >= CURRENT_DATE()"; 		 

	}elseif($cuando ==  "Del próximo mes" ){
		
		$tramo_fecha =  "WHERE MONTH(fecha_inicio) = MONTH(CURRENT_DATE()) + 1"; 		 			
		
	}elseif( $cuando ==  "Más" ){

		$tramo_fecha =  "WHERE MONTH(fecha_inicio) = MONTH(CURRENT_DATE()) + 2 ";

	}else{
		$tramo_fecha =  "WHERE  fecha_inicio =  CURRENT_DATE() + " . $param["cuando"]; 
	}
	return $tramo_fecha;
}
/*listamos los eventos del día */
function get_eventos_dia(){
	/*Cambiar la consulta campo por campo */
	$query_get = "SELECT * FROM  evento WHERE fecha_inicio =  CURRENT_DATE() OR fecha_termino =  CURRENT_DATE() LIMIT 50";  
	$result = $this->db->query($query_get);
	return  $result->result_array();
	/**/
}
/*Termina modelo */
}
