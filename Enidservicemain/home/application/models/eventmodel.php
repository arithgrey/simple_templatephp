<?php defined('BASEPATH') OR exit('No direct script access allowed');

class eventmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}



function getTematicaByid($idevento , $idempresa )
{
	

	
	$query_get_byid ="SELECT t.idtematica , t.tematica_evento, t.status , t.descripcion, 
	et.idevento , et.idtematica as idtem 	
	FROM tematica as t
	LEFT OUTER JOIN  evento_tematica as et
	ON t.idtematica = et.idtematica and et.idevento = '".$idevento."' ";

	$result = $this->db->query($query_get_byid);
	return $result->result_array();

}

function update_tematicaby_id( $idevento , $idtematica, $idempresa ){

	
	
	$delete_query ="DELETE FROM evento_tematica WHERE idevento ='".$idevento."' ";
	$resultado_count = $this->db->query($delete_query);
	$dinamic_query ="INSERT INTO evento_tematica VALUES( '".$idevento."' , '".$idtematica."' )";
	$r = $this->db->query($dinamic_query);
	return $r;
}

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

function create( $nombre , $edicion , $inicio , $termino , $idusuario , $idempresa , $perfiles  ) {

	$portada ="application/img/example.jpg";
	$query_insert ="INSERT INTO evento (nombre_evento , edicion , idempresa , idusuario , fecha_inicio , fecha_termino, portada )
	 VALUES( '$nombre' , '$edicion' , '$idempresa' ,   '$idusuario' , '$inicio' , '$termino' ,  '$portada' )";
	$dbresponse =  $this->db->query($query_insert);


	if ($dbresponse) {
		
		/*Último elemento insertado*/
		$idlastelement = $this->db->insert_id(); 							
		return $idlastelement;

	}else{
		/**/
		return "Problemas al registrar reportar al administrador";
	}			
}


function get_last_events($idempresa , $num ){

	
	$query_select ="SELECT  e.idevento , e.nombre_evento, e.descripcion_evento, e.fecha_inicio , 
	e.fecha_termino ,
	e.url_social, e.url_social_youtube, e.portada , e.status  as estadoevento , e.edicion ,
	count(es.idescenario) as totalescenarios 
	FROM evento as e
	left outer join escenario as es 
	on e.idevento = es.idevento 
	where e.idempresa ='". $idempresa."' 
	group by e.idevento ORDER BY e.fecha_registro DESC LIMIT $num ";
	$result = $this->db->query($query_select);
	return $result ->result_array();      
}



/*check if exist*/
function checkifexist($idevento , $idempresa){



	$query_exist ="SELECT * FROM evento where idempresa='". $idempresa. "' AND idevento ='". $idevento ."' ";
	$result = $this->db->query($query_exist);
		
		$num =0;
		$num =  $result->num_rows();

		if ($num > 0 ) {
			return 1;
		}else{
			return 0;
		}


}/*Termina la función*/





function getEventbyid($idevento){

	$query_get_byid ="SELECT * FROM evento where idevento ='". $idevento ."' ";
	$result = $this->db->query($query_get_byid);
	return $result ->result_array();      
}




function updateNombre($nuevo_nombre , $idevento ){

	$update_nombre = "UPDATE evento SET nombre_evento = '". $nuevo_nombre."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_nombre);
	
}


function updateEdicion($nuevo_edicion , $idevento ){


	$update_nombre = "UPDATE evento SET edicion = '". $nuevo_edicion."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_nombre);
	
}



function updateDescripcion($nueva_descripcion , $idevento ) {
	
	$update_nombre = "UPDATE evento SET descripcion_evento='". $nueva_descripcion."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_nombre);

}







function updatePoliticas($nueva_politica , $idevento ){
	
	$update_nombre = "UPDATE evento SET  politicas='". $nueva_politica ."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_nombre);

}


function updatePermitido($nuevo_permitido , $idevento ){

	$update_nombre = "UPDATE evento SET  permitido='". $nuevo_permitido ."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_nombre);
}





function updateRestricciones($nuevo_restriccion , $idevento ){

	$update_nombre = "UPDATE evento SET  restricciones ='". $nuevo_restriccion ."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_nombre);
}






function updateUbicacion($nueva_ubicacion , $idevento ) {
	
	$update_ubicacion = "UPDATE evento SET ubicacion='". $nueva_ubicacion ."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_ubicacion);

}


function updategeneros($nuevos_generos , $idevento ){

	$update_genero = "UPDATE evento SET genero_tupla='". $nuevos_generos ."' WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_genero);
}

function updateurl($nueva_url , $idevento  ) {
	
	$update_url = "UPDATE evento SET url_social='". $nueva_url ."'  WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_url);
}
	
function updateurlyout($nueva_url , $idevento ){
	$update_url = "UPDATE evento SET url_social_youtube='". $nueva_url ."'  WHERE idevento ='".$idevento."'  ";		
	return  $this->db->query($update_url);

}




function getObjetosPermitidos($idevento ){

	$query_select = " select o.idobjetopermitido, nombre , eo.idobjetopermitido  as idpermitido , eo.idevento  from objetopermitido as o   left outer join evento_objetopermitido as eo 
	on o.idobjetopermitido = eo.idobjetopermitido and eo.idevento ='".$idevento."' group by o.nombre;";
	$result = $this->db->query($query_select);
	return $result ->result_array();      
	
}



/*Pasados **Pasados **Pasados **Pasados **Pasados **Pasados **Pasados */

function get_time_events_byid($idempresa ){


	$query_select ="SELECT  e.idevento , e.nombre_evento, e.descripcion_evento , e.fecha_inicio , 
	e.fecha_termino ,
	e.url_social, e.url_social_youtube, e.portada , e.status  as estadoevento , e.edicion ,
	count(es.idescenario) as totalescenarios 
	FROM evento as e
	left outer join escenario as es 
	on e.idevento = es.idevento 
	where e.idempresa ='". $idempresa."' 
	group by e.idevento";
	$result = $this->db->query($query_select);
	return $result ->result_array();   
}


/**End Pasados **End Pasados **End Pasados **End Pasados **End Pasados **/
function get_servicios_evento_by_id($id_evento){

	$query_servicios_list ="select * from servicio as s, evento_servicio as es
	 where es.idevento = '".$id_evento."' and s.idservicio = es.idservicio";
	$result = $this->db->query($query_servicios_list);
	return $result->result_array();
}




/*********************        **************************               *****************/

function delete_byid($id_evento , $id_usuario , $id_empresa ){

	$query_delete_event="call delete_evento_all_data('". $id_evento ."'  , '". $id_usuario ."' )";
	return $this->db->query($query_delete_event);
	


}



function get_list_generos_musicales_byidev($id_evento){

	$generos_list ="select g.idgenero_musical, g.nombre  from genero_musical as g 
		inner join evento_genero_musical as egm
		on   g.idgenero_musical = egm.idgenero_musical 
		where egm.idevento = '".$id_evento. "'";

	$result = $this->db->query($generos_list);				
	return $result->result_array();
	

}
/****************** ****************** ****************** ****************** ****************** */

function update_eslogan($id_evento , $eslogan){
	$query_update_eslogan ="UPDATE evento SET eslogan= '$eslogan' WHERE idevento = '".$id_evento."' ";
	return $this->db->query($query_update_eslogan);

}


/* get listobjetos permitidos del evento */


function get_objetos_permitidosin_event($id_evento){
	$query_get_objeto = "SELECT op.idobjetopermitido ,  op.nombre FROM  objetopermitido AS op 
	INNER JOIN  evento_objetopermitido eop 
	ON  op.idobjetopermitido = eop.idobjetopermitido 
	WHERE  eop.idevento='". $id_evento."' ORDER BY  nombre";
	
	$result_obj = $this->db->query($query_get_objeto);
	return $result_obj->result_array();

}




/*Termina modelo */
}



