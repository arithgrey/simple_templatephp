<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

	function getData($arreglo){



		$accesos = "";

		$in = 1;
		foreach ($arreglo["listaccesos"] as $rowccesos) {
				


				$periodo  = $rowccesos["inicio_acceso"] . " al "  . $rowccesos["termino_acceso"] ;
					$accesos .= "<tr>
                        <td class='blue-col-enid'> ". $in ."</td>
                        <td>
                            <h4>". $rowccesos["tipo"]."</h4>                            
                        </td>
                        <td class='text-center'><strong>$". money_format('%i',  $rowccesos["precio"]) ."</strong></td>
                        <td class='text-center'><strong>  ". $periodo  . "</strong></td>
                        <td class='text-center'><strong> <i data-toggle='modal' data-target='#confirmationdeleteacceso'  class='fa fa-minus-circle remove-acceso' id='". $rowccesos["idacceso"]."'></i> </strong></td>
                    </tr>";

                
                    $in ++;
		}




















		$tipos ="";

			foreach ($arreglo["tipo_acceso"] as $row) {
				
				$tipos .="<option value='".$row["idtipo_acceso"] ."'>".$row["tipo"]."</option>";
			}



		
		$data["accesos"] = $accesos;
		$data["tipo"] = $tipos;		
		return $data;
	}

}/*Termina el helper*/
 
