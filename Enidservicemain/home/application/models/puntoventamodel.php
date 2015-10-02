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
	function insert($razon_social,  $status, $descripcion,
				    $id_usuario, $id_empresa ){

		$query_insert = "call insert_punto_venta_empresa_usuario('".$razon_social."' , '". $status ."'   ,  '". $id_empresa ."' ,  '".$descripcion ."' , '".$id_usuario."'   )"; 		
	 	
	 	$result_db=  $this->db->query($query_insert);	 	 
	 	return $result_db->result_array();
		
	}
	


	/*selecciona todos los puntos de venta por empresa y usuario*/	
	function get_puntos_venta_empresa_usuario($id_empresa, $filtro ){

		$query_get="";

		if ( $filtro == null){
			
			$query_get ="select pv.* ,  u.nombre, u.puesto , u.status estado_usuario    from punto_venta pv 
					inner join punto_venta_usuario pvu on pv.idpunto_venta =  pvu.idpunto_venta
					inner join usuario u  
					on pvu.idusuario = u.idusuario
					where  pv.idempresa='". $id_empresa ."' ";	


		}else{

			$query_get ="select pv.* ,  u.nombre, u.puesto , u.status estado_usuario    from punto_venta pv 
					inner join punto_venta_usuario pvu on pv.idpunto_venta =  pvu.idpunto_venta
					inner join usuario u  
					on pvu.idusuario = u.idusuario
					where  pv.idempresa='". $id_empresa ."'and  pv.razon_social like '". $filtro ."%' ";	

		}
		
		$result_db = $this->db->query($query_get);								
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





	function update($razon_social,$status ,  $descripcion, $id_usuario,  $id_empresa , $id_punto_venta){

		$query_update ="update punto_venta set razon_social = '". $razon_social ."' ,						 
						 status   ='".$status ."'     ,						 
						 descripcion   = '".$descripcion."'
						 where idempresa  = '".$id_empresa . "' 
						 and idpunto_venta = '".$id_punto_venta ."' ";
		return $this->db->query($query_update);						 
						 
		
		
	}
	/**/

	function get_resumen_punto_venta($id_empresa){
		$query_get ='
select count( 0 )puntosventatotal , 
sum(case when CHAR_LENGTH(pv.descripcion) > 0 then 1 else 0  end  )con_descripcion ,
sum(case when pv.status  = "Temporalmente no disponible" then  1 else 0  end) temporal_no_disponible,
sum(case when pv.status  = "Disponible para todos los colaboradores de la empresa" then  1 else 0  end) para_colaboradores,
sum(case when pv.idpunto_venta in(select idpunto_venta from punto_venta_contacto group by idpunto_venta ) then 1 else 0  end ) asociados,
sum(case when c.tel is not null and  CHAR_LENGTH(c.tel)> 3  then 1 else 0 end )con_tel ,
sum(case when c.correo  is not null  and   CHAR_LENGTH(c.correo)> 3  then 1 else 0 end )con_mail ,
sum(case when c.pagina_web    is not null  and  CHAR_LENGTH(c.pagina_web)> 3  then 1 else 0 end )con_paginaweb 
from punto_venta pv 
inner join punto_venta_usuario pvu on pv.idpunto_venta =  pvu.idpunto_venta
inner join usuario u  
on pvu.idusuario = u.idusuario
left outer join  punto_venta_contacto pvc 
on pv.idpunto_venta  =  pvc.idpunto_venta
left outer join contacto c 
on pvc.idcontacto =  c.idcontacto
where  pv.idempresa= "'.$id_empresa.'"
group by  pv.idempresa
';

		$result = $this->db->query($query_get);	
		return $result->result_array();								
	}

	/**/

	function get_resumen_accesos($id_evento){

		$query_get ="select sum(case when tipo  in ('Día del evento'  , 'General M' , 'General H & M'  )then 1 else 0 end )ventas_unicas,
						sum(case when tipo in ('Preventa 1' , 'Preventa 2',  'Preventa 3' , 'Preventa 4' , 'Preventa 5' , 'Preventa 6'  )  then 1 else 0 end )preveentas,
						sum(case when tipo in ('Único día', 'Promoción' , 'Promoción mujeres' , 'Promoción hombres')  then 1 else 0 end )promociones
						from acceso a inner join  tipo_acceso ta on a.idtipo_acceso =  ta.idtipo_acceso
						where a.idevento  =  '". $id_evento."' ";

		$result =  $this->db->query($query_get);				
		return $result->result_array();
	}
	/**/	
	function get_puntos_venta_asociadas($id_evento){


		$query_get ="select  
					(select count(*) from evento_punto_venta where idevento= '".$id_evento."' ) asociados,					
					count(0) contactos_asociados,
					sum(case when c.tel is not null and  CHAR_LENGTH(c.tel)>3 then 1 else 0  end ) con_tel,
					sum(case when c.movil is not null and  CHAR_LENGTH(c.movil)>3 then 1 else 0  end ) con_tel_movil,
					sum(case when c.correo is not null and  CHAR_LENGTH(c.correo)>3 then 1 else 0  end ) con_tel_movil,
					sum(case when c.direccion is not null and  CHAR_LENGTH(c.direccion)>3 then 1 else 0  end ) con_locacion,
					sum(case when c.pagina_web  is not null and  CHAR_LENGTH(c.pagina_web)>3 then 1 else 0  end ) con_web 
					from  punto_venta p 
					inner join evento_punto_venta
					evp 
					on p.idpunto_venta =  evp.idpunto_venta
					left outer join 
					punto_venta_contacto pvc on 
					p.idpunto_venta = pvc.idpunto_venta
					left outer join contacto c 
					on pvc.idcontacto =  c.idcontacto
					where evp.idevento = '".$id_evento."'
					group  by p.idempresa";

		$result =  $this->db->query($query_get);				
		return $result->result_array();
	}
/*Termina modelo */
}





