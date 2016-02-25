<?php defined('BASEPATH') OR exit('No direct script access allowed');
class puntoventamodel extends CI_Model {
	function __construct(){
	        parent::__construct();        
	        $this->load->database();
	}
	/**/
	function delete_punto_venta_contacto( $punto_venta , $id_contacto){
		$query_delete = "DELETE FROM punto_venta_contacto WHERE idpunto_venta = '". $punto_venta ."' AND  idcontacto = '".$id_contacto."'  "; 
		return $this->db->query($query_delete);
	}
	/**/
	function asocia_evento($param){


		$id_evento   =  $param["evento"];
		$id_punto_venta =  $param["puntoventa"];

		$query_exist ="select * from evento_punto_venta 
						where idevento =  '". $id_evento."' and idpunto_venta = '". $id_punto_venta."' limit 1";
		$result = $this->db->query($query_exist);					
		$exist = $result->num_rows(); 		
		$dinamic_query = "SELECT 1 ";		

		if($exist ==  0 ){
			$dinamic_query ="INSERT INTO evento_punto_venta VALUES('". $id_evento."'  , '". $id_punto_venta ."') ";
		}

		return $this->db->query($dinamic_query);

		
	}
	function update_punto_venta_nota($param){
		$query_update ="UPDATE punto_venta set descripcion = '". $param["nota-punto-venta"] ."' WHERE  idpunto_venta = '". $param["punto_venta"]."' limit 1"; 
		return $this->db->query($query_update);		
		
	}
	/**/
	function get_punto_venta($param){
		$query_get =  "select * from  punto_venta where  idpunto_venta =  " . $param["punto_venta"] . " limit 1 ";		
		$result =  $this->db->query( $query_get );
		return $result->result_array();
	}
	/**/
	function delete_punto_venta_evento($id_evento , $id_punto_venta){

		$query_delete = "DELETE FROM evento_punto_venta WHERE idevento = '". $id_evento."' AND idpunto_venta = '". $id_punto_venta."'   ";
		return  $this->db->query($query_delete);
	}
	/**/
	function get_contactos($id_punto_venta){

		$query_get =  "select c.*  from punto_venta_contacto pvc  
						inner join contacto c on   pvc.idcontacto =  c.idcontacto
						where pvc.idpunto_venta  ='". $id_punto_venta."'  "; 
		$result = $this->db->query($query_get);					
		return $result->result_array();

	}

	/**/
	function insert_punto_venta_contacto($punto_venta , $id_contacto){

		$query_get="select * from punto_venta_contacto
					where 
					idpunto_venta = '". $punto_venta  ."'  
					and 
					idcontacto ='". $id_contacto ."' limit 1";
		
		$result  = $this->db->query($query_get);		
		$exits = $result->result_array();		
		$query_update ="";

		if (count($exits) > 0 ){

			$query_update  = "select 1+1";

		}else{

			$query_update = "insert 
							into 
							punto_venta_contacto 
							values('". $punto_venta ."' , '". $id_contacto ."' )";			
		}	
		return $this->db->query($query_update);		
	}




	/**/
	function get_estados_punto_venta(){

		$query_get ="select distinct(status) estado_punto_venta  from punto_venta";
		$result = $this->db->query($query_get);
		return $result->result_array();
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

		$query_delete ="DELETE FROM punto_venta WHERE idpunto_venta = '". $punto_venta."'  limit 1";		
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
	function get_puntos_venta_empresa_usuario($id_empresa, $param , $limit){
		$filtro ="";

		$limit_text ="";
		if ($limit != "all") {
			$limit_text = " limit " . $limit;
		}



		if (strlen($param["filtro"]) > 0  ) {

			$filtro=" and  pv.razon_social like '". $param["filtro"] ."%'   ";	
		}else if( strlen($param["estado"]) > 0  ){
			$filtro=" and  pv.status  like '". $param["estado"] ."%'   ";	
		
		}else if( strlen($param["estado"]) > 0  ){
			$filtro=" and  pv.status = '". $param["estado"] ."%'  and  pv.razon_social like '". $param["filtro"] ."%'  ";	
		}else{

			
		}		

		$query_get ="select pv.*, pv.status estado_punto_venta , pv.fecha_registro fecha_reg , i.* ,  u.nombre, u.puesto , u.status estado_usuario    from punto_venta pv 
						inner join punto_venta_usuario pvu on pv.idpunto_venta =  pvu.idpunto_venta
						inner join usuario u  
						on pvu.idusuario = u.idusuario
						left outer join imagen_punto_venta ipv 
						on  pv.idpunto_venta =  ipv.idpunto_venta
						left outer join   imagen  i 
						on  ipv.id_imagen = i.idimagen
						where  pv.idempresa='". $id_empresa ."'  ". $filtro . $limit_text ;	
		
		$result_db = $this->db->query($query_get);								
		return $result_db->result_array();
		
		
	}
	/**/
	function get_contactos_in_punto_venta($id_usuario , $id_punto_venta ){

		$query_get="select  c.* , i.*,  pvc.idpunto_venta   puntoventacontacto   from contacto  c
					inner join punto_venta_contacto pvc 
					on c.idcontacto  = pvc.idcontacto and  pvc.idpunto_venta = '".$id_punto_venta."'
					left outer join imagen_contacto ic  
					on c.idcontacto = ic.id_contacto 
					left outer join imagen i 
					on ic.id_imagen = i.idimagen
					where idusuario ='". $id_usuario ."'  ";
		$result_db  = $this->db->query($query_get);								
		return $result_db->result_array();					
	}
	function get_contactos_in_punto_venta_filtro($id_usuario , $id_punto_venta ){

		$query_get="select  
					c.idcontacto , 
					c.nombre , 
					c.organizacion , 
					c.tel  , 
					c.tipo, 
					c.correo , 
					i.idimagen , 
					i.nombre_imagen , 
					i.base_path , 
					i.base_path_img ,  
					pvc.idpunto_venta   puntoventacontacto   from contacto  c
					inner join punto_venta_contacto pvc 
					on c.idcontacto  = pvc.idcontacto and  pvc.idpunto_venta = '".$id_punto_venta."'
					left outer join imagen_contacto ic  
					on c.idcontacto = ic.id_contacto 
					left outer join imagen i 
					on ic.id_imagen = i.idimagen
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


	/**/	

	function get_puntos_venta_cliente($id_evento){

		$query_get="select pv.*  , i.base_path_img , i.nombre_imagen  from  evento_punto_venta evp 
					left outer join  punto_venta pv  
					on  evp.idpunto_venta =  pv.idpunto_venta
					left outer join imagen_punto_venta  imp 
					on evp.idpunto_venta  =  imp.idpunto_venta 
					left outer join imagen  i 
					on  imp.id_imagen =  i.idimagen 
					where evp.idevento =  '". $id_evento ."' ";
		$result = $this->db->query($query_get);			
		return $result->result_array();

	}

	/**/
	function load_puntos_venta_evento_icon($id_punto_venta){
	
		$query_get ="SELECT 
					p.idpunto_venta ,
					p.razon_social, 					
					i.idimagen , 
					i.nombre_imagen , 
					i.base_path , 
					i.base_path_img ,
					ip.id_imagen 
					FROM punto_venta p 
					INNER JOIN  evento_punto_venta ep 
					ON p.idpunto_venta  =  ep.idpunto_venta
					LEFT OUTER JOIN imagen_punto_venta ip 
					ON p.idpunto_venta =  ip.idpunto_venta 
					LEFT OUTER JOIN imagen i 
					ON ip.id_imagen  = i.idimagen 
					WHERE  ep.idevento =" . $id_punto_venta;

		$result = $this->db->query($query_get);					
		return $result ->result_array();		
	}
	/**/
	function load_puntos_venta_evento($id_evento ){

		$query_get ="SELECT *  FROM punto_venta p INNER JOIN  evento_punto_venta ep 
					ON p.idpunto_venta  =  ep.idpunto_venta
					LEFT OUTER JOIN imagen_punto_venta ip 
					ON p.idpunto_venta =  ip.idpunto_venta 
					LEFT OUTER JOIN imagen i 
					ON ip.id_imagen  = i.idimagen 
					WHERE  ep.idevento =  '". $id_evento ."'  ";
		$result = $this->db->query($query_get);					
		return $result ->result_array();

	}
	/*termina la función*/
	function get_puntos_venta_evento( $id_evento ,  $id_empresa){

		$query_get ="select  epv.idpunto_venta  punto_v , p.*   from punto_venta p  
			left outer join evento_punto_venta epv  
			on  p.idpunto_venta =  epv.idpunto_venta  and idevento = '". $id_evento."'
			where p.status =  'Disponible para todos los colaboradores de la empresa'
			and p.idempresa = '". $id_empresa ."'   ";
		
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
						 and idpunto_venta = '".$id_punto_venta ."' limit 1";
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
	/*Búsqueda de los puntos de venta por nombre y de una empresa en específico*/
	function busqueda_empresa($param , $limit){

		$query_get ="
		select 
		pv.idpunto_venta,
		pv.razon_social, 
		i.* 
		from punto_venta pv 
		left outer join imagen_punto_venta ipv 
		on  pv.idpunto_venta =  ipv.idpunto_venta
		left outer join   imagen  i 
		on  ipv.id_imagen = i.idimagen
		where  pv.idempresa= '".$param["empresa"]."'
		and pv.status  ='Disponible para todos los colaboradores de la empresa'
		and pv.razon_social  like  '%".$param["punto_venta"]."%' limit ". $limit;
					
		$result =  $this->db->query($query_get );
		return $result->result_array();
		
		
	}
	/**/
	function asociar_evento_empresa($param){
		
		$punto_venta = $this->busqueda_empresa($param , 1); 						
		if (count($punto_venta) > 0 ) {
			
			$id_punto_venta =   $punto_venta[0]["idpunto_venta"];
			$id_evento =  $param["evento"];
			return $this->insert_evento_punto_venta($id_evento , $id_punto_venta );

		}else{
			return 0; 
		}

	}
	/**/
	function insert_evento_punto_venta($id_evento , $id_punto_venta ){

		$query_get =  "SELECT * FROM  evento_punto_venta WHERE idevento  =  '". $id_evento . "'  AND  idpunto_venta= '". $id_punto_venta."'  "; 
		$result =  $this->db->query($query_get);
		$data_exist =  $result ->result_array();
		if (count($data_exist) > 0 ){
			return true; 
			
		}else{
			
			$query_insert ="INSERT INTO  evento_punto_venta VALUES ('".$id_evento."' , '". $id_punto_venta."' )";
			return $this->db->query($query_insert);			
		}


	}


/*Termina modelo */
}
