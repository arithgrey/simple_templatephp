<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class accesosmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}

function getDataByidEvent($idempresa, $evento){	
	$select_byid ="SELECT * FROM acceso, tipo_acceso WHERE 
	 tipo_acceso.idtipo_acceso= acceso.idtipo_acceso AND acceso.idevento='". $evento . "' order by termino_acceso desc";

	$result_acceso = $this->db->query($select_byid); 
	$data["tipo_acceso"] = $this->getTipoEscenario();
	$data["listaccesos"] = $result_acceso->result_array();
	return $data;

}

function get_acceso_by_event($id_evento){

	$select_byid ="SELECT a.idacceso ,   a.descripcion as nota , FORMAT(a.precio , 2) as precio, a.inicio_acceso, 
	a.termino_acceso, a.status,  a.idevento , DATE_FORMAT(a.fecha_registro , '%d/%m/%Y' ) as fecha_registro , t.idtipo_acceso , 
	t.tipo ,  t.descripcion ,  t.status  
	FROM acceso as a , tipo_acceso  as t WHERE 	
	t.idtipo_acceso= a.idtipo_acceso AND
	a.idevento='". $id_evento . "' order by termino_acceso desc";

	$result_acceso = $this->db->query($select_byid); 
	return $result_acceso ->result_array();

}	
function getTipoEscenario(){
	
	$get_tipo ="SELECT * FROM tipo_acceso";	
	$result = $this->db->query($get_tipo);       
	return $result ->result_array();
}
function insert( $precio , $inicio_acceso , $termino_acceso , $idevento , $idtipo_acceso, $descripcion=''){

	$query_inser="INSERT INTO acceso(precio , inicio_acceso , termino_acceso , idevento , idtipo_acceso , descripcion  ) VALUES ( '$precio' , '$inicio_acceso' , '$termino_acceso' , '$idevento' , '$idtipo_acceso'  , '$descripcion')";
	return $this->db->query($query_inser);

}
/*********************/
function deletebyid( $evento , $acceso ){


	$query_delete ="DELETE FROM acceso WHERE idacceso = '$acceso'  ";
	return  $this->db->query($query_delete);
	

}
/*Tipos de accesos */
function get_tipos_accesos(){

	$query_select ="select * from tipo_acceso";
	$result = $this->db->query($query_select);
	return $result->result_array();
}
/**/
function get_by_id(  $id_acceso ){

	$query_select = "SELECT a.idacceso, a.descripcion as nota  , a.precio , a.inicio_acceso , a.termino_acceso , a.status, a.idevento , a.idtipo_acceso                      	
	, a.fecha_registro  ,   t.idtipo_acceso , t.tipo , t.descripcion  , t.status        
 	FROM acceso as a , tipo_acceso  as  t WHERE
	t.idtipo_acceso= a.idtipo_acceso AND a.idacceso =   '".$id_acceso."' ";
	$result = $this->db->query($query_select);
	return $result ->result_array();
}
/**/
function update_all_by_id($id_acceso , $nuevo_precio , $nuevo_inicio_acceso , $nuevo_termino_acceso , $nueva_descripcion , $nuevo_tipo_acceso ){
	$query_update ="UPDATE acceso SET descripcion= '".$nueva_descripcion."'  ,  precio = '".$nuevo_precio. "'  
	, inicio_acceso   = '".$nuevo_inicio_acceso."' ,  termino_acceso  ='".$nuevo_termino_acceso."' , idtipo_acceso  = '". $nuevo_tipo_acceso ."' 
	WHERE idacceso = '". $id_acceso ."'   ";
	return $this->db->query($query_update);
	
}
/**/

function get_accesos_tipo_evento($id_evento){
	$query_get = "select tipo,  idacceso  from tipo_acceso  inner join acceso on tipo_acceso.idtipo_acceso= acceso.idtipo_acceso and idevento='".$id_evento."'   ";
	$result = $this->db->query($query_get);	
	return $result ->result_array();	
}
/*Termina modelo */
}



