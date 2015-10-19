<?php defined('BASEPATH') OR exit('No direct script access allowed');
class reportemodel extends CI_Model {
function __construct(){

        parent::__construct();        
        $this->load->database();
}

	function datos($texto,$caja,$selection){

		$consulta = "INSERT INTO reportesystema (reporte, descripcionreporte, tiporeporte) VALUES ('".$texto."','".$caja."','".$selection."')";
		$resultado = $this->db->query($consulta);
		return $resultado;
	}
	function listarReportes(){
			$consultaLista = "SELECT * FROM  reportesystema";
			$listado = $this->db->query($consultaLista);
			return $listado->result_array();
	}

	function getMetricasgGenerales(){

		$query_list_repo ="select 'Total', count(status_repo) as valor    from reportesystema 
			union 
			select 'Atendidos', count(status_repo)     from reportesystema where status_repo='Atendido' 
			union 
			select  'Rechazado', count(status_repo)   from reportesystema where status_repo='Rechazado'
			union 
			select  'Pendiente', count(status_repo)   from reportesystema where status_repo='Pendiente'
			union 
			select  'En proceso', count(status_repo)  from reportesystema where status_repo='En proceso'
			";

		$metricas_db = $this->db->query($query_list_repo);
		return $metricas_db->result_array();	

	}


	function updateStatusRepo($nuevo_status , $update_element_id ){

		$query_update_repo ="UPDATE reportesystema SET status_repo='". $nuevo_status."' WHERE idreportesystema= '" . $update_element_id . "' ";
		return $this->db->query($query_update_repo);

	}



}