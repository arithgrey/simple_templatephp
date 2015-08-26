<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

			$descripcion_acceso = $row["nota"];

			$precio =  $row["precio"];				

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
				                            '.$descripcion_acceso.'
				                            </p>
				                            <a href="#" class="more"><i class="fa fa-credit-card"></i> $'. $precio .'</a>
				                        </div>
				                    </div>
				                </div>
				            </div>';

		}
		
		return $blog_tikects;
	}
	/*Despliega la información de los accesos en avanzado */

	function display_complete_info($data_accesos){

		$l='';
		$flag =1;
		foreach ($data_accesos as $row){
			
			/*datos tabla general */
			$idacceso  =  $row["idacceso"];  
			$nota  =  $row["nota"];    
			$precio  = $row["precio"];              
			$inicio_acceso =  $row["inicio_acceso"]; 
			$termino_acceso =$row["termino_acceso"];
			
			$idevento  = $row["idevento"];          
			$idtipo_acceso = $row["idtipo_acceso"]; 
			
			$vigencia = $inicio_acceso ." al día ".   $termino_acceso;
			$idtipo_acceso = $row["idtipo_acceso"];
			$tipo = $row["tipo"];                 				

			$delete = '<i data-toggle="modal" data-target="#confirma-delete-acceso" class="fa  fa-times delete-acceso" id="'.$idacceso.'"  ><i>';
			$edit = '<i data-toggle="modal" data-target="#editar-acceso"    class="fa fa-pencil-square-o editar-acceso" id="'.$idacceso.'"><i>';
			
			if (!$nota) {
				$nota  ="<i  class='fa fa-plus'></i> nota";
			}


				$l.= '<tr class="acceso_event" id="' . $idacceso. '">
						<td>'. $flag .'	</td>
						<td>'. $tipo  .'	</td>
						<td>$'. $precio  .'	</td>
						<td>'. $vigencia .'	</td>
						<td data-toggle="modal" data-target="#editar-acceso" class="editar-acceso" id="'.$idacceso.'" >'. $nota  .'	</td>						
						<td>'. $delete .'	</td>
						<td>'. $edit .'	</td>
					  </tr>';	

			$flag ++;
			
				
		}

		return $l;

	}


	/*lista loa tipos de accesos*/
	function list_tipos_accesos($data_tipos_accesos){
		$option_acceso ='';

		foreach ($data_tipos_accesos as $row) {
			$option_acceso .='<option value="'. $row["idtipo_acceso"].'">'. $row["tipo"].'</option>';	
		}
		return $option_acceso;
	}
	/**/
}/*Termina el helper*/