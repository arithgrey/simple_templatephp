<?php defined('BASEPATH') OR exit('No direct script access allowed');
class repomodel extends CI_Model {
	function __construct(){
	        parent::__construct();        
	        $this->load->database();
	}
/**/
	function reporte_cuadro_global_inicio_session($id_empresa, $param ){

		$data = array();
		/*Las fechas donde se mapean eventos */
		$query_get ="select 
					fecha_inicio fecha 
					from  evento 
					where idempresa = '".$id_empresa."'  
					and  
					fecha_inicio between  DATE_ADD(current_date(), INTERVAL -1  MONTH) 
					and 
					DATE_ADD(current_date(), INTERVAL 1  MONTH)
					group by fecha";	

		$result = $this->db->query($query_get);			
		$data["fechas"] = $result->result_array();
		/*Terminan l as fechas donde se mapean eventos */


		/*Mostramos lo de la semana*/		
			/*condicionamos las fechas*/		
			$condicion_fecha = " e.fecha_inicio between  
							DATE_ADD(current_date(), INTERVAL -1  MONTH) 
							and 
							DATE_ADD(current_date(), INTERVAL 1  MONTH)"; 

			if (strlen($param["fecha"]) > 2){			

				$fecha =  $param['fecha'];
				//$condicion_fecha =  " e.fecha_inicio = '".$fecha."' "; 
				$condicion_fecha =' e.fecha_inicio = "'.$fecha.'" ';
			}
			/*Terminamos las condiciones de  las fechas*/
				/*Mandamos llamar el procediemiento almacenado */				
					$query_procedure =  "call global_org('".$id_empresa ."' , '". $condicion_fecha ."' , '".$param["flag"]."')"; 
					$result = $this->db->query($query_procedure);
				/*Terminamos de llamar el procediemiento almacenado */

					/*Cargamos info global*/
					$query_get =  'select   
	ev.periodo_publicacion ,  
	datediff(ev.fecha_inicio , current_date() ) dias_restantes , 
	ev.nombre_evento, 
	ev.edicion, 
	ev.ubicacion, 
	ev.eslogan  ,
	e.idevento ,
	e.escenarios  , 
	ea.artistas , 
	p.evento_punto_venta ,
	a.accesos , 
	s.servicios , 
	ev.fecha_inicio , 
	ev.fecha_termino 
	from
	tmp_evento_escenarios e
	left outer join  tmp_escenarios_artistas ea 
	on  e.idevento =  ea.idevento
	left outer join tmp_puntos_venta p
	on e.idevento = p.idevento
	left outer join tmp_evento_accesos a
	on  e.idevento =  a.idevento
	left outer join tmp_evento_servicios  s 
	on e.idevento =  s.idevento
	left outer join  tmp_evento_gmusical g 
	on  e.idevento = g.idevento
	left outer join tmp_info_evento ev
	on  e.idevento  =  ev.idevento
	union all 
	select  "" , "" ,  "Totales", "", "" , ""  , "" , 
	sum(e.escenarios)  , 
	sum(ea.artistas) ,
	sum( p.evento_punto_venta ), 
	sum(a.accesos) , 
	sum(s.servicios) , 
	"", "" from   tmp_evento_escenarios e
	left outer join  tmp_escenarios_artistas ea 
	on  e.idevento =  ea.idevento
	left outer join tmp_puntos_venta p
	on e.idevento = p.idevento
	left outer join tmp_evento_accesos a
	on  e.idevento =  a.idevento
	left outer join tmp_evento_servicios  s 
	on e.idevento =  s.idevento
	left outer join  tmp_evento_gmusical g 
	on  e.idevento = g.idevento
	left outer join tmp_info_evento ev
	on  e.idevento  =  ev.idevento'; 

					$result = $this->db->query($query_get);
					$data["info"] = $result->result_array();
					/*Terminamos de cargamos info global*/
		return $data;
	}
	/**/
	function reporte_general_inicio_session($id_empresa){	
		/**/		
		$query_procedure  ="CALL estado_empresa($id_empresa)";	
		$this->db->query($query_procedure);
		/**/
		$query_get ="select  * from tmp_global_".$id_empresa;
		$result = $this->db->query($query_get);
		return $result ->result_array();
	}
	/**/
	function getUsuariosCuenta($idempresa)
	{
		$query_get =" select * from usuario where idempresa = '".$idempresa."' ";
		$result = $this->db->query($query_get);
		return $result ->num_rows();
		
	}
}/*Termina la función */