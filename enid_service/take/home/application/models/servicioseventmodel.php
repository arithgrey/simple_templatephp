<?php defined('BASEPATH') OR exit('No direct script access allowed');
class servicioseventmodel extends CI_Model {
function __construct(){

        parent::__construct();        
        $this->load->database();
}
function get_servicios_by_evento($id_evento){

	$query_get = "SELECT s.servicio  FROM servicio  as s , evento_servicio as es , evento as e
	WHERE s.idservicio = es.idservicio  AND es.idevento = e.idevento
	AND e.idevento = '".$id_evento."' ";

	$result= $this->db->query($query_get);
	return $result->result_array();
}
/**/
function getserviciosevento( $evento , $id_empresa ){


	$query_get = "select  s.idservicio , s.servicio , ev.idservicio  as idserviciointer, ev.idevento as ideventointer  , ev.nota  from servicio as s
					left outer join evento_servicio  as ev 
					on s.idservicio = ev.idservicio and ev.idevento = '". $evento ."' ";	




	$result = $this->db->query($query_get);
	return  $result ->result_array();
}
/**/
function update( $evento , $id_servicio ,  $id_empresa ){

	$query_get  ="SELECT * FROM evento_servicio WHERE idevento='".$evento."'  AND idservicio ='".$id_servicio."' ";	
	$result =  $this->db->query($query_get);

	$query_d="";
	$existe = $result->num_rows();		


	 if ($existe > 0 ) {
	  	
		$query_d ="DELETE FROM evento_servicio WHERE idevento='".$evento."'  AND idservicio ='".$id_servicio."' ";	
	 }else{
	 	$query_d = "INSERT INTO evento_servicio (idevento , idservicio ) VALUES('".$evento."'  , '".$id_servicio."'  )";
	 }



	return  $this->db->query($query_d);
}


/*update all services in evento */
function update_all_in_event($id_evento){
	
	$query_prodedure ="call update_all_servicios_in_event($id_evento)";
	$result = $this->db->query($query_prodedure);
	return $result->result_array();

}
/**/
function update_descripcion($param){
	

	$query_update = "update evento_servicio set nota = '". $param["nota"] ."' WHERE idevento = '". $param["evento"] ."' AND idservicio = '". $param["servicio"] ."'   "; 
	return $this->db->query($query_update);
	
	

}
/*Termina modelo */
}