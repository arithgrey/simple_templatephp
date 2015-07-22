<?php defined('BASEPATH') OR exit('No direct script access allowed');

class eventmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}


function create( $nombre , $edicion , $inicio , $termino , $idusuario , $idempresa , $perfiles  ) {

	
	$query_insert ="INSERT INTO evento (nombre_evento , edicion , idempresa , idusuario , fecha_inicio , fecha_termino )
	 VALUES( '$nombre' , '$edicion' , '$idempresa' ,   '$idusuario' , '$inicio' , '$termino'  )";
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


function getLastEvents($idempresa , $num ){

	
	$query_select ="select * from evento where idempresa='$idempresa' LIMIT $num ";
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

/*Termina modelo */
}



