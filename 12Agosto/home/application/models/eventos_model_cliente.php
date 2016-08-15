<?php defined('BASEPATH') OR exit('No direct script access allowed');
class eventos_model_cliente extends CI_Model{
function __construct(){
    parent::__construct();        
    $this->load->database();
}
/**/
function crea_tmp_prox_eventos( $f  , $condicion_extra ,  $_num = 0 ){
	
    if($_num == 0 ) {
       $_num = mt_rand();       
    }    
    $query_procedure = "CALL  proximos_eventos(  $_num , $f   ,  '". $condicion_extra  ."' );"; 
    $this->db->query($query_procedure);
    return $_num;

}
/*Pŕoximos eventos de la organización */
function get_proximos($param){
	/**/
	$id_empresa =  $param["id_empresa"];
	$id_evento =  $param["id_evento"];
	$condicion_extra =  " AND idempresa  =  $id_empresa  AND  idevento !=  $id_evento limit  5"; 
	$data_complete =   $this->create_data_otros($condicion_extra); 
	if (count($data_complete ) > 0 ){				
		return $data_complete; 
	}else{
		$condicion_extra =  "  AND  idevento !=  $id_evento limit  5 "; 
		$data_complete =   $this->create_data_otros($condicion_extra); 
		return $data_complete;
	}
}
/**/
function create_data_otros($condicion_extra){	

	$_num = $this->crea_tmp_prox_eventos( 0  , $condicion_extra ); 
	$query_get =  "select *  from  tmp_proximos_eventos_$_num "; 
	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();	
	if (count($data_complete) > 0 ){				
		$data_complete = $this->construye_data_complete_img($_num); 
	}
	$this->crea_tmp_prox_eventos( 1 , $condicion_extra,  $_num  ); 
	return $data_complete; 
}
/**/
function construye_data_complete_img($_num){
	/**/
	$_num2 =  $this-> base_img_eventos(1  , 0 ); 	
	$query_get =  "select e.* , i.*  from  tmp_proximos_eventos_$_num  e    
	left outer join imagen_evento ie 
	on ie.id_evento =  e.idevento
	left outer join tmp_img_$_num2  i 
	on ie.id_imagen =  i.idimagen  group by  e.idevento"; 
	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();	
	$this-> base_img_eventos(1  , 1  , $_num2 ); 	
	return $data_complete; 
}
/**/
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
/**/
function base_img_eventos($tipo , $f  , $_num = 0 ){      
    if($_num == 0 ){    	
       $_num = mt_rand();       
    }
	$query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
	$this->db->query($query_procedure);
	return $_num;
}




/*Termina modelo */
}