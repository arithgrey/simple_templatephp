<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class puntoventamodel extends CI_Model {
	function __construct(){
	        parent::__construct();        
	        $this->load->database();
	}


	/*Actualiza todo los puntos de venta asociados al evento */
    function update_all_in_event($id_evento, $id_empresa){


    	$query_exist ="select * from evento_punto_venta where idevento =  '". $id_evento."' ";
		$result = $this->db->query($query_exist);					
		$exist = $result->num_rows();

		$dinamic_query ="";
		if ($exist> 0 ){
			
			$dinamic_query ="DELETE  FROM evento_punto_venta WHERE idevento = '". $id_evento . "' ";

		}else{
						
			$dinamic_query ="INSERT INTO evento_punto_venta SELECT  ". $id_evento." ,  p.idpunto_venta   from punto_venta p   where p.status =  'Disponible para todos los colaboradores de la empresa' and p.idempresa = '".$id_empresa."' ";
		}


    	/**/

        return $this->db->query($dinamic_query);
    }
    /**/
	function delete($punto_venta){

		$query_delete ="DELETE FROM punto_venta WHERE idpunto_venta = '". $punto_venta."' ";		
		return $this->db->query($query_delete);
	}
	/**/
	function insert($razon_social, $direccion, $status, $telefono, $url_pagina_web, $descripcion,
				    $id_usuario, $id_empresa ){

		$query_insert = "call insert_punto_venta_empresa_usuario('".$razon_social."' , '".$direccion."', '". $status ."'  , '". $telefono."' , '". $url_pagina_web ."' ,  '".  
			$id_empresa ."' ,  '".$descripcion ."' , '".$id_usuario."'   )"; 		
	 	
	 	$result_db=  $this->db->query($query_insert);	 	 
	 	return $result_db->result_array();
		
	}
	/*selecciona todos los puntos de venta por empresa y usuario*/
	function get_puntos_venta_empresa_usuario($id_empresa){

		$query_get ="select pv.* ,  u.nombre, u.puesto , u.status estado_usuario    from punto_venta pv 
					inner join punto_venta_usuario pvu on pv.idpunto_venta =  pvu.idpunto_venta
					inner join usuario u  
					on pvu.idusuario = u.idusuario
					where  pv.idempresa='". $id_empresa ."' ";

		$result_db  = $this->db->query($query_get);								
		return $result_db->result_array();
	}
	/**/
	function get_contactos_in_punto_venta($id_usuario , $id_punto_venta ){

		$query_get="select  c.* ,  pvc.idpunto_venta   puntoventacontacto   from contacto  c
					left outer join punto_venta_contacto pvc 
					on c.idcontacto  = pvc.idcontacto and  pvc.idpunto_venta = '".$id_punto_venta."'
					where idusuario ='". $id_usuario ."'  ";
		$result_db  = $this->db->query($query_get);								
		return $result_db->result_array();					
	}
	/*Actualiza el contacto asociado al punto de venta */
	function update_punto_venta_contacto($contacto , $puntoventa){

		$query_get="select * from punto_venta_contacto where idpunto_venta = '". $puntoventa ."'  and idcontacto ='". $contacto ."'";
		$exits = $this->db->query($query_get);
		$num = $exits->num_rows();		
		

		if ($num>0 ) {
			$query_update ="delete from  punto_venta_contacto where idpunto_venta = '". $puntoventa ."'  and idcontacto ='". $contacto ."'  ";
			return $this->db->query($query_update);
		}else{
			$query_update ="insert into punto_venta_contacto values('".$puntoventa."' , '".$contacto."' )";
			return $this->db->query($query_update);
		}
		
	}
	/*termina la función*/
	function get_puntos_venta_evento( $id_evento , $id_user , $id_empresa){

		$query_get ="select  epv.idpunto_venta  punto_v , p.*   from punto_venta p  
			left outer join evento_punto_venta epv  
			on  p.idpunto_venta =  epv.idpunto_venta 
			where p.status =  'Disponible para todos los colaboradores de la empresa'
			and p.idempresa = '". $id_empresa ."'  ";
		
		$result = $this->db->query($query_get);				
		return $result->result_array();
	}
	/**/
	function update_punto_venta_evento($id_evento, $id_punto_venta ){

		$query_exist ="select * from evento_punto_venta where idevento =  '". $id_evento."' and idpunto_venta = '". $id_punto_venta."'  ";
		$result = $this->db->query($query_exist);					

		$exist = $result->num_rows(); 
		
		$dinamic_query ="";
		if($exist >0 ) {
			 
			$dinamic_query ="DELETE FROM evento_punto_venta WHERE  idevento =  '". $id_evento."' and idpunto_venta = '". $id_punto_venta."' ";
		}else{

			$dinamic_query ="INSERT INTO evento_punto_venta VALUES('". $id_evento."'  , '". $id_punto_venta ."') ";
		}


		return $this->db->query($dinamic_query);

	}/**/

/*Termina modelo */
}
