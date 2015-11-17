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
/**/
function get_geros_empresa($id_empresa){

	$query_get = "SELECT g.* , egm.* FROM genero_musical g inner join  empresa_genero_musical egm on g.idgenero_musical = egm.idgenero_musical  and  egm.id_empresa =  '". $id_empresa."' ";
	$result =  $this->db->query($query_get);	
	return $result->result_array();
}
/**/
function get_generos_musicales(){
	$query_get =  "SELECT *  FROM genero_musical"; 	
	$result =  $this->db->query($query_get);	
	return $result->result_array();

}
/**/
function insert_genero_empresa($id_empresa , $param ){
	
	/**/
	$query_get ="SELECT * FROM genero_musical WHERE nombre ='". $param["genero_musical"]."' ";	
	$result =  $this->db->query($query_get);
	$id_genero = $result->result_array()[0]["idgenero_musical"];

		/*Verifica si existe*/
		$query_exist =  "SELECT *  FROM empresa_genero_musical WHERE id_empresa   ='". $id_empresa ."'  AND idgenero_musical = '". $id_genero."'  "; 
		$result_exist =  $this->db->query($query_exist);
		$re = $result_exist ->result_array();

		if(count($re) > 0 ){
			return 1;
		}else{
			/*Insertamos en la base de datos*/
			$query_insert = "INSERT INTO empresa_genero_musical VALUES('". $id_empresa ."' , '".  $id_genero  ."'   )";
			return $this->db->query($query_insert);

		}


}
/**/
function delete_genero_empresa($id_empresa , $id_genero){

	$query_delete ="DELETE FROM empresa_genero_musical WHERE id_empresa   ='". $id_empresa ."' AND idgenero_musical = '". $id_genero."' ";
	return $this->db->query($query_delete);
}
/*Termina modelo */
}