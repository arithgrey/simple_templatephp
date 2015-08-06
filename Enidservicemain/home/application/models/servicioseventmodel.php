<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class servicioseventmodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}



function getserviciosevento( $evento , $idempresa ){
	
	$query_select  = "select s.idservicio , s.servicio , ev.idservicio  as idserviciointer, ev.idevento as ideventointer  from servicio as s
					left outer join evento_servicio  as ev 
					on s.idservicio = ev.idservicio and ev.idevento = '".$evento."'   ";
	
	$servicios_result = $this->db->query($query_select);
	return  $servicios_result ->result_array();
	

}



function update( $evento , $idservicio ,  $idempresa ){


	$query_select  ="SELECT * FROM evento_servicio WHERE idevento='".$evento."'  AND idservicio ='".$idservicio."'   ";
	

	 $result =  $this->db->query($query_select);

	 $query_d="";
	$existe = $result->num_rows();		


	 if ($existe > 0 ) {
	  	
$query_d ="DELETE FROM evento_servicio WHERE idevento='".$evento."'  AND idservicio ='".$idservicio."' ";	
	 }else{



	 			$query_d = "INSERT INTO evento_servicio (idevento , idservicio ) VALUES('".$evento."'  , '".$idservicio."'  )";
	 }



	return  $this->db->query($query_d);
}


/*Termina modelo */
}



