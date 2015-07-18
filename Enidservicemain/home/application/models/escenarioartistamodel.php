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


/*Termina modelo */
}



