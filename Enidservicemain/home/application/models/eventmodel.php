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



/*Termina modelo */
}



