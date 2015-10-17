<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

	function getData($arreglo){

		$accesos = "";
		$accesos .= '<table class="table display table table-bordered dataTable">
					<tr class="text-center enid-header-table">';
        $accesos .= get_td("#" , "");  
        $accesos .= '<td><i class="fa fa-star"></i> Acceso</td>';  
        $accesos .= '<td class="text-center"><i class="fa fa-credit-card"></i> Precio</td>';  
        $accesos .= '<td class="text-center"><i class="fa fa-calendar-o"></i> Periodo</td>';    
        $accesos .= '<td class="text-center"><i class="fa fa-angle-double-right"></i> Avanzado</td>';    
       	$accesos .=  '<td class="text-center"><i class="fa fa-minus-circle"></i> Eliminar</td>';        
        $accesos .= '</tr>';    
            

            
            
        

		
		$in = 1;
		foreach ($arreglo["listaccesos"] as $rowccesos) {

					$periodo  = $rowccesos["inicio_acceso"] . "al"  . $rowccesos["termino_acceso"];					
					$accesos .= "<tr class='text-center'><td class='blue-col-enid'> ". $in ."</td>";
					$accesos .= get_td($rowccesos["tipo"] , "");                       			 
	                $accesos .= get_td("$". money_format( "%i" ,  $rowccesos["precio"] ) , "");	                
		            $accesos.=  get_td($periodo  , "") ;
		            $accesos.="<td class='text-center avanzado-accesos' id='".$rowccesos["idacceso"]."'><i class='avanzado-accesos fa fa-angle-double-right' id='".$rowccesos["idacceso"]."' ></i></td>	
		                        <td class='text-center'>
		                        <strong><i data-toggle='modal' data-target='#confirmationdeleteacceso'  class='fa fa-minus-circle remove-acceso' id='". $rowccesos["idacceso"] ."'></i> </strong></td>
                    			</tr>";        
                    $in ++;
		}

		$accesos .= '</table>';
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


		$l='<table class="display table table-bordered dataTable" id="dynamic-table">
					<thead class="enid-header-table">
						<tr>';
							$l .=get_td("#" , "");
							$l .=get_td("Tipo acceso" , "");
							$l .=get_td("Precio al público" , "");	
							$l .=get_td("Vigencia" , "");
							$l .=get_td("Portada" , "");	
							$l .=get_td("Mensaje para el público" , "");
							$l .=get_td( "", "");
							$l .=get_td("" , "");
						$l .='</tr>';
					$l .='</tdead>
					<tfoot class="enid-header-table">
						<tr>';
							$l .= get_td("#", "");

							$l .= get_td("", "");
							$l .= get_td("", "");	
							$l .= get_td("", "");
							$l .= get_td("", "");	
							$l .= get_td("", "");
							$l .= get_td("", "");
							$l .= get_td("", "");
						$l .='</tr>
					</tfoot>		              
					<tbody>';
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


				$l.= '<tr class="acceso_event media usr-info" id="' . $idacceso. '">';
						$l .=get_td( $flag  , 'class="franja-vertical"');		
						
						$l .=get_td($tipo   , "" );
						$l .=get_td( "$ ". $precio , "");
						$l .=get_td( $vigencia , "");						

						if ($row["nombre_imagen"]!= null ) {
							$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);							
							$l.='<td   data-toggle="modal" data-target="#acceso-imagen-modal"    class="prog-avatar text-center"> 						
		                            <img style="width:30px !important; height: 30px !important;"  class="img_acceso thumb" id="'.$idacceso.'" src="'.$img.'" alt="">						
								</td>';

						}else{
							$l.='<td  data-toggle="modal" data-target="#acceso-imagen-modal"    class="prog-avatar text-center"> 						
		            				<i  class="img_acceso fa fa-picture-o" id="'.$idacceso.'" ></i>                
								</td>';

						}


						
						
						$l.='<td data-toggle="modal" data-target="#editar-acceso" class="editar-acceso text-center" id="'.$idacceso.'" >'. $nota  .'	</td>';						
						$l .=get_td( $delete , "");
						$l .=get_td( $edit , "");
					  	$l .='</tr>';

			$flag ++;
			
				
		}

		$l .='</tbody>
					
				</table>';
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