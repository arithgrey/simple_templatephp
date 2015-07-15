<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class escenariomodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}



function nuevo( $nombre , $evento ,  $idempresa  ){


	$query_insert ="INSERT INTO escenario (nombre , idevento, idtipo_escenario ) 
	values ('$nombre' , '$evento ' , '1' )";

	return $this->db->query($query_insert);



}	


/**/



function loadbyevent( $evento ,  $idempresa  ){


	$query_load ="SELECT * FROM escenario WHERE idevento = '".$evento."'";
	$result = $this->db->query($query_load);
	return $result->result_array();



}	




/**/


/*Termina modelo */
}



