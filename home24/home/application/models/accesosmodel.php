<?php defined('BASEPATH') OR exit('No direct script access allowed');
class accesosmodel extends CI_Model {	
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function getDataByidEvent($idempresa, $evento){	

	$query_get ="SELECT * FROM acceso, tipo_acceso WHERE 
	 tipo_acceso.idtipo_acceso= acceso.idtipo_acceso AND acceso.idevento='". $evento . "' order by termino_acceso desc";
	$result_acceso = $this->db->query($query_get); 		 
	return $result_acceso->result_array();

}

function get_acceso_by_event($id_evento){


	$query_get ="SELECT i.* , a.idacceso , a.nombre ,   a.descripcion as nota , FORMAT(a.precio , 2) as precio, a.inicio_acceso, 
a.termino_acceso, a.status,  a.idevento , DATE_FORMAT(a.fecha_registro , '%d/%m/%Y' ) as fecha_registro , t.idtipo_acceso , 
t.tipo ,  t.descripcion ,  t.status  FROM acceso a inner join  tipo_acceso  t
on a.idtipo_acceso = t.idtipo_acceso
left outer join imagen_acceso ia on 
a.idacceso = ia.id_acceso
left outer join imagen i 
on  ia.id_imagen  = i.idimagen
WHERE 	
a.idevento='". $id_evento ."' order by a.termino_acceso desc";

	$result_acceso = $this->db->query($query_get); 
	return $result_acceso ->result_array();

}	
function load_tipo_accesos(){
	
	$query_get ="SELECT * FROM tipo_acceso";	
	$result = $this->db->query($query_get);       
	return $result ->result_array();
}
function insert( $nombre_acceso  , $precio , $inicio_acceso , $termino_acceso , $id_evento , $idtipo_acceso, $descripcion=''  , $id_empresa , $id_usuario , $nombre_usuario ){

	if ($precio< 1 ){		
		
		$precio = 1;		
	}	
	$query_insert ="INSERT INTO acceso( nombre  , precio , inicio_acceso ,  termino_acceso , idevento ,idtipo_acceso , descripcion  ) VALUES ( '$nombre_acceso' ,  $precio , '$inicio_acceso' , '$termino_acceso' , '$id_evento' , '$idtipo_acceso'  , '$descripcion')";	
	$db_response  =  $this->db->query($query_insert);

	if ($db_response ==  true ) {		
		/*Log evento */
		$actividad =  $nombre_usuario  . " h a registrado  una nueva promoción para el público con un precio de " . $precio; 
		$query_insert = "INSERT INTO log_evento (actividad, id_usuario , idempresa ,  id_evento , tipo , accion ) VALUES ( '".$actividad  ."' , '".$id_usuario ."' , '". $id_empresa  ."' , '". $id_evento."' , 3  , 'insert' ) "; 			
		$this->db->query($query_insert);		
	}
	return $db_response; 		
}
/*********************/
function deletebyid( $evento , $acceso ){

	$query_delete ="DELETE FROM imagen_acceso WHERE id_acceso = '". $acceso ."' ";	
	$this->db->query($query_delete);
	$query_delete ="DELETE FROM acceso WHERE idacceso = '".$acceso."'  limit 1";
	return  $this->db->query($query_delete);

}
/*Tipos de accesos */
function get_tipos_accesos(){

	$query_get ="select * from tipo_acceso";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/**/
function get_by_id(  $id_acceso ){

	$query_get = "SELECT a.idacceso, a.descripcion as nota  , a.precio , a.inicio_acceso , a.termino_acceso , a.status, a.idevento , a.idtipo_acceso                      	
	, a.fecha_registro  ,   t.idtipo_acceso , t.tipo , t.descripcion  , t.status        
 	FROM acceso as a , tipo_acceso  as  t WHERE
	t.idtipo_acceso= a.idtipo_acceso AND a.idacceso =   '".$id_acceso."' ";
	$result = $this->db->query($query_get);
	return $result ->result_array();
}
/**/
function update_all_by_id($id_acceso , $nuevo_precio , $nuevo_inicio_acceso , $nuevo_termino_acceso , $nueva_descripcion , $nuevo_tipo_acceso ){
	$query_update ="UPDATE acceso SET descripcion= '".$nueva_descripcion."'  ,  precio = '".$nuevo_precio. "'  
	, inicio_acceso   = '".$nuevo_inicio_acceso."' ,  termino_acceso  ='".$nuevo_termino_acceso."' , idtipo_acceso  = '". $nuevo_tipo_acceso ."' 
	WHERE idacceso = '". $id_acceso ."'  limit 1 ";
	return $this->db->query($query_update);
	
}
/**/

function get_accesos_tipo_evento($id_evento){
	$query_get = "select tipo,  idacceso  from tipo_acceso  inner join acceso on tipo_acceso.idtipo_acceso= acceso.idtipo_acceso and idevento='".$id_evento."'   ";
	$result = $this->db->query($query_get);	
	return $result ->result_array();	
}
/**/
function get_data_acceso_public($id_evento){

	$query_get ="select 
a.idacceso, 
a.inicio_acceso , 
a.termino_acceso , 
(case 
	
	when (a.termino_acceso) < CURRENT_DATE() then 'La oferta ha terminado' 
	when (a.inicio_acceso )  > CURRENT_DATE() then  'Próximamente'	
	else 'Actual' end) stado_oferta
, 
a.* , 

t.tipo , 
i.*  
from  acceso a 
inner  join  tipo_acceso t  on  a.idtipo_acceso =  t.idtipo_acceso
left outer join imagen_acceso ia  on ia.id_acceso =  a.idacceso
left  outer join   imagen i on   ia.id_imagen  = i.idimagen  
where a.idevento = '". $id_evento ."' ";

	$result =  $this->db->query($query_get);			
	return $result->result_array();

}
/**/

function load_estado_countries($id_country){
	$query_get ="SELECT * FROM estado  WHERE idCountry = '". $id_country ."' ";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*Termina modelo */
}