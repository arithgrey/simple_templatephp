<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){


	function get_artistas_default_template($artistas_array){

		$artistas_block ='';
		$flag =1;
		foreach ($artistas_array as $row) {
			
			$hora_inicio  =  $row["hora_inicio"];
			$hora_termino  = $row["hora_termino"];

			if(!isset($hora_inicio)) {
				$hora_inicio ="Próximamente";	
				$hora_termino ="Próximamente";	
			}

			$artistas_block .='<tr>
								<td>'.$flag .'</td>
								<td>'.$row["nombre_artista"].'</td>
								<td>'.$hora_inicio.'</td>
								<td>'.$hora_termino.'</td>
							</tr>';		
							$flag++;
		}

		return $artistas_block;
	
	}

	


	
	

}/*Termina el helper*/
 
