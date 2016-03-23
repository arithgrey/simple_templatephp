<?php defined('BASEPATH') OR exit('No direct script access allowed');
class eventos_model_cliente extends CI_Model{
function __construct(){

        parent::__construct();        
        $this->load->database();
}


/*Pŕoximos eventos de la organización */
function get_proximos($id_empresa , $id_evento){
	$query_get =  "select * from evento where fecha_inicio > CURRENT_DATE() AND idempresa  = '". $id_empresa ."'  
	and  idevento != '". $id_evento  ."' 
	limit 5";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/**/
function get_dias_faltantes($id_evento){


	$query_get ="select fecha_inicio , fecha_termino  from evento where idevento = '". $id_evento ."'  ";	
	$result = $this->db->query($query_get);
	$result_evento  = $result->result_array();		
	
	if ($result_evento[0]["fecha_inicio"] ==  $result_evento[0]["fecha_termino"] ) {

		$query_get ="select (fecha_inicio  - CURRENT_DATE())dias from evento where idevento = '". $id_evento ."'  ";	
	
	}else{
		$query_get ="select (fecha_termino  - CURRENT_DATE())dias from evento where idevento = '". $id_evento ."'  ";	
		
	}
	$result = $this->db->query($query_get);
	return $result->result_array();	


	
}


/*Termina modelo */
}