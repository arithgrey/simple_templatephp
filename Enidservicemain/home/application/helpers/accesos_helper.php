<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

	function getData($arreglo){

		$accesos = "";
		$in = 1;
		foreach ($arreglo["listaccesos"] as $rowccesos) {
				


					$periodo  = $rowccesos["inicio_acceso"] . " al "  . $rowccesos["termino_acceso"];
					
					$accesos .= "<tr>
                       			 <td class='blue-col-enid'> ". $in ."</td>
	                        		<td>
	                            		<span>". $rowccesos["tipo"] ." </span>                            
	                        		</td>
		                        <td class='text-center'>
		                        	 $". money_format( "%i" ,  $rowccesos["precio"] ) ."</td>
		                        	<td class='text-center'>". $periodo  . "</td>
		                        <td class='text-center avanzado-accesos' id='".$rowccesos["idacceso"]."'><i class='avanzado-accesos fa fa-angle-double-right' id='".$rowccesos["idacceso"]."' ></i></td>	
		                        <td class='text-center'>
		                        <strong><i data-toggle='modal' data-target='#confirmationdeleteacceso'  class='fa fa-minus-circle remove-acceso' id='". $rowccesos["idacceso"] ."'></i> </strong></td>
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




	/**********************************************/
	function accesos_view_default($arreglo_accesos){
	
		$blog_tikects = '';
		foreach ($arreglo_accesos as $row) {

			$descripcion_acceso = $row["descripcion"];
			$precio =  $row["precio"];
				$precio =  money_format( "%i" , $precio );

			$inicio_acceso = $row["inicio_acceso"];
			$termino_acceso = $row["termino_acceso"];
			$status =  $row["status"];
			$tipo = $row["tipo"];
			

			$blog_tikects .='<div class="panel">
				                <div class="panel-body">
				                    <div class="row">
				                        <div class="col-md-5 blue-col-enid">
				                            <div class="blog-img-sm blue-col-enid">
				                                
				                            </div>
				                        </div>
				                        <div class="col-md-7">
				                            <h1 class=""><a href="#">'. $tipo .'</a></h1>
				                            <p class=" auth-row">
				                                   Vigencia |  '.$inicio_acceso.'   | '. $termino_acceso.'
				                            </p>

				                            <p>

				                            </p>
				                            <a href="#" class="more"><i class="fa fa-credit-card"></i> $'. $precio .'</a>
				                        </div>
				                    </div>
				                </div>
				            </div>';

		}
		
		return $blog_tikects;
	}

}/*Termina el helper*/