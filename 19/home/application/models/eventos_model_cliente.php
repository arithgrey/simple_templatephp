<?php defined('BASEPATH') OR exit('No direct script access allowed');
class eventos_model_cliente extends CI_Model{
function __construct(){

        parent::__construct();        
        $this->load->database();
}

function crea_tmp_prox_eventos( $f  , $id_empresa  ,  $id_evento   , $_num = 0 ){


    if($_num == 0 ) {
       $_num = mt_rand();       
    }    

    $query_procedure = "CALL  proximos_eventos( $id_empresa  , $_num , $f   ,  $id_evento  );"; 
    $this->db->query($query_procedure);
    return $_num;

}
/*Pŕoximos eventos de la organización */
function get_proximos($id_empresa , $id_evento){

	$_num = $this->crea_tmp_prox_eventos( 0  , $id_empresa  ,  $id_evento ); 
	$query_get =  "select *  from  tmp_proximos_eventos_$_num"; 
	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();	
	$this->crea_tmp_prox_eventos( 1 , $id_empresa  ,  $id_evento , $_num  ); 
	return $data_complete; 

	/*
		$query_get =  "select * from evento where fecha_inicio > CURRENT_DATE() AND idempresa  = '". $id_empresa ."'  
		and  idevento != '". $id_evento  ."' 
		limit 5";
		

		$result = $this->db->query($query_get);
		return $result->result_array();
	**/

}
/**/
function get_dias_faltantes($id_evento){
	$query_get ="select fecha_inicio , fecha_termino  from evento where idevento = '". $id_evento ."'  ";	
	$result = $this->db->query($query_get);
	$result_evento  = $result->result_array();		
	if ($result_evento[0]["fecha_inicio"] ==  $result_evento[0]["fecha_termino"] ) {
		$query_get ="select (fecha_inicio  - CURRENT_DATE())dias from evento where idevento = '". $id_evento ."'  ";	
	}else{
		$query_get ="select (fecha_termino  - CURRENT_DATE())dias from evento where idevento = '". $id_evento ."'  ";			
	}
	$result = $this->db->query($query_get);
	return $result->result_array();		
}


/*Termina modelo */
}