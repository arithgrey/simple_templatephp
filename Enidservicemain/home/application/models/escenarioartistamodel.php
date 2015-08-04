<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class escenarioartistamodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}





function registraartistaescenario($idescenario , $nuevoartista , $idempresa){

	$registroartista = $this->nuevoartista($nuevoartista);

	if ($registroartista[0] ==  true) {
		
		
		$idartista = $registroartista[1];

		return $this->nuevoescenarioartista($idescenario , $idartista);



	}else{
		return "Falla al registrar artista";
	}
	

		
}	


function nuevoartista($nuevoartista){
		/*Aquí validaremos que no éxista*/
		$query_insert ="INSERT INTO artista (nombre_artista) values ( '$nuevoartista' )";
		$data[0] = $this->db->query($query_insert);
		$idlastelement = $this->db->insert_id(); 							
		$data[1] = $idlastelement;
		return $data;
}


function nuevoescenarioartista($idescenario , $idartista){

		$query_insert ="INSERT INTO escenario_artista (idescenario , idartista ) 
		values ( '$idescenario', '$idartista' )";
		return  $this->db->query($query_insert);

}




/******************************************************************/
function deleteescenarioartosta($idescenario , $artista_quitar , $idempresa){

	$delet_escenario_artista ="DELETE FROM escenario_artista  WHERE idescenario = '".$idescenario."' and idartista ='".$artista_quitar."' ";
	return $this->db->query($delet_escenario_artista);
}



function updateinicioterminoartistabyid($idartista , $idescenario  , $hiartista  , $htartista , $idempresa){

	$query_update ="UPDATE  escenario_artista set hora_inicio = '". $hiartista ."' , hora_termino='".$htartista."' 
	WHERE   idescenario ='$idescenario' AND idartista='$idartista' ";
	$result = $this->db->query($query_update);
	return $result;	



}

/*Artistas en escenario */

function get_artistas_inevent($id_escenario){

	$query_get_artistas ="SELECT * FROM artista as a, escenario_artista ea 
	WHERE a.idartista = ea.idartista AND  ea.idescenario= '". $id_escenario ."' ";

	$result_artistas = $this->db->query($query_get_artistas);
	return $result_artistas ->result_array();

	 
}
/**/


/*Termina modelo */
}



