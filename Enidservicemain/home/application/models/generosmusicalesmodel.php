<?php defined('BASEPATH') OR exit('No direct script access allowed');

class generosmusicalesmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}


	
function getDataByidEvent($idempresa, $idevento){
	
	

	$query_generos ="SELECT gm.idgenero_musical , gm.nombre , egm.idgenero_musical as idg , egm.idevento  FROM  
	genero_musical as gm  left outer join evento_genero_musical  as egm  
	on gm.idgenero_musical = egm.idgenero_musical and egm.idevento = '".$idevento."' ";

	$result  = $this->db->query($query_generos);
	return $result->result_array();

}



function update_genero_evento($idempresa, $idevento , $idgenero ){


	$query_exist ="SELECT * FROM  evento_genero_musical WHERE idevento='".$idevento."' AND  idgenero_musical='".$idgenero."' ";
	$result  = $this->db->query($query_exist);
	$num = $result->num_rows();
	
	$dinamic_query ="";
		if ($num > 0 ) {

			$dinamic_query ="DELETE FROM evento_genero_musical WHERE idevento='".$idevento."' AND  idgenero_musical='".$idgenero."'";
		}else {
			$dinamic_query ="INSERT INTO evento_genero_musical VALUES ( '".$idevento."' ,  '".$idgenero."') ";
		}
		
	$result_dinamic_query = $this->db->query($dinamic_query);
	return $result_dinamic_query;



}
/*Termina modelo */
}



