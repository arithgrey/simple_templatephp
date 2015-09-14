<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class puntoventamodel extends CI_Model {
	function __construct(){
	        parent::__construct();        
	        $this->load->database();
	}


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

		$query_get="select  c.* ,  pvc.idpunto_venta   puntoventacontacto  from contacto  c
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

/*Termina modelo */
}