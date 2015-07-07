<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/
	
	/*Get lista reportes del sistema Enid service */
	function getListrepo($list_repo_system )
	{
		$list ="";
		foreach ($list_repo_system as $key => $row) {
				
				$list .= "<tr><td class=''>". $row["idreportesystema"] ."</td>";
	            $list .= "<td class='blue-col-enid'>". $row["reporte"] ."</td>";
	            $list .= "<td>". $row["descripcionreporte"]."</td>";
	            $list .= "<td>".$row["status_repo"] ."</td>";
	            $list .= "<td>". $row["tiporeporte"]."</td>";
	            $list .= "<td>". getTimeFormat3( $row["fecha_registro"])  ."</td></tr>";
			

			}	
		return  $list;
	}/*Termina función*/



}/*Termina el helper*/
 