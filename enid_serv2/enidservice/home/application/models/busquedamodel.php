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
	$fecha_tramo =  $this->get_where_fecha($param["cuando"]);	
	//$estado_tramo =  $this->busque_por_estado($param);	
	$query_get ="SELECT * FROM evento e " . $palabra_clave  . " WHERE 1=1  AND ". $fecha_tramo . " group by idevento limit 50";	
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
		on e.idevento =  ep.id_evento and  
		ep.palabra_clave like '%". $param["palabra_clave"] ."%' 
		OR e.ubicacion  like '%". $param["palabra_clave"] ."%'  
		OR e.edicion like '%". $param["palabra_clave"] ."%' ";		
	}
	return $tramo_palabra_clave; 
}
/**/
function busqueda_por_fechas_palabra_clave($param){

	$where_fecha = $this->get_where_fecha($param["cuando"]);	
	$query_procedure = "call enidserv_eniddbbbb3.create_temp_palabra_clave(  '2=2' );"; 	
	$this->db->query($query_procedure);
}
/****************************** Para las fechas ***************************/

function get_where_fecha($cuando){

	$tramo_fecha ="";
	switch ($cuando) {
		case "Cualquiera":			
			$tramo_fecha ="  DATE_ADD(fecha_inicio , INTERVAL 5  MONTH)";

			break;						
		case "mas_uno":
			$tramo_fecha =  "  fecha_inicio = CURRENT_DATE() + 1 ";
			break;
		case "semana":
			$tramo_fecha =  "   yearweek(fecha_inicio) = yearweek(CURRENT_DATE())";
			break;		
		case 'mes':		
			$tramo_fecha ="  month(fecha_inicio) = month(current_date()) and  year(fecha_inicio) = year(current_date()) ";							
			break;		
		case "Del próximo mes":						
			$tramo_fecha ="   DATE_ADD(fecha_inicio , INTERVAL 1  MONTH) ";
			break;						
		default:
			/*Los del día*/
			$tramo_fecha ="   fecha_inicio = CURRENT_DATE()";
			break;
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
