<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){



	function accesos_complete($data){

		$accesos = "";
		$accesos .= '<table class="table display table table-bordered dataTable"><tr class="text-center enid-header-table">';
        $accesos .= get_td("#" , "");  
        $accesos .= get_td("Acceso" , "");
        $accesos .= get_td("Tipo" , "");
        $accesos .= get_td("Precio para el público" , "");
        $accesos .= get_td("Duración de la promoción" , "");
                
        $accesos .= '</tr>';            
		$in = 1;

			foreach ($data as $rowccesos) {

				$periodo  =  $rowccesos["inicio_acceso"] . " - "  . $rowccesos["termino_acceso"];					
				$accesos .=  "<tr>";
				$accesos .=  get_td($in , "class='franja-vertical'");
				$accesos .=  get_td($rowccesos["nombre"] , "" );
				$accesos .=  get_td($rowccesos["tipo"] , "");                       			 
		        $accesos .=  get_td(  $rowccesos["precio"]  , "");	
		        $accesos .=  get_td(  $rowccesos["inicio_acceso"] . " al " . $rowccesos["termino_acceso"]  , "");	
			    $accesos.=   "</tr>";        
	            $in ++;
			}

		$accesos .= '</table>';		
		return $accesos;	
	}

	/*********     **********         ***********      ***********/
	function list_accesos_edit($data){

		$accesos = "";
		$accesos .= '<table class="table display table table-bordered dataTable">
				<tr class="text-center enid-header-table">';
        $accesos .= get_td("#" , "");  
        $accesos .= get_td("Acceso" , "");
        $accesos .= get_td("Tipo" , "");
        $accesos .= get_td("Precio para el público" , "");
        $accesos .= get_td("Duración de la promoción" , "");
        $accesos .= get_td("Avanzado" , "");
        

        $accesos .= '</tr>';            
		$in = 1;

			foreach ($data as $rowccesos) {

				$periodo  =  $rowccesos["inicio_acceso"] . " - "  . $rowccesos["termino_acceso"];					
				$accesos .=  "<tr>";
				$accesos .=  get_td($in , "");
				$accesos .=  get_td($rowccesos["nombre"] , "class='franja-vertical'" );
				$accesos .=  get_td($rowccesos["tipo"] , "");                       			 
		        $accesos .=  get_td( "$". money_format( "%i" ,  $rowccesos["precio"] ) , "");	                
			    $accesos .=  get_td($periodo  , "");		
			    $accesos .=  get_td("<i class='fa fa-angle-double-right' id='".$rowccesos["idacceso"]."' ></i>" , "class='avanzado-accesos'  id='".$rowccesos["idacceso"]."'    " );			  	
			    $accesos.=   "</tr>";        
	            $in ++;
			}

		$accesos .= '</table>';		
		return $accesos;	
	}
	/**********       **********           ***********        ***********/
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

		$l='<table class="table display table table-bordered dataTable" >
					
						<tr class="header-table-info">';
							$l .=get_td("#" , "class='franja-vertical' ");
							$l .=get_td("Acceso" , "");
							$l .=get_td("Tipo acceso" , "");
							$l .=get_td("Precio al público" , "");	
							$l .=get_td("Vigencia" , "");
							$l .=get_td("Portada" , "");	
							$l .=get_td("Mensaje para el público" , "");
							$l .=get_td("Eliminar", "");
							$l .=get_td("Editar" , "");
						$l .='</tr>';
					
		$flag =1;




		foreach ($data_accesos as $row){
			
			/*datos tabla general */

			$idacceso  =  $row["idacceso"];  
			$nombre =  $row["nombre"];
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
						$l .=get_td( $flag  , '');		
						
						$l .= get_td( $nombre , "class='franja-vertical'");		
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
						
						$l.='<td data-toggle="modal" data-target="#editar-acceso" class="editar-acceso text-center" id="'.$idacceso.'" >
								<i class="editar-acceso  fa fa-list-alt" id="'.$idacceso.'" ></i>
							</td>';						
						$l .=get_td( $delete , "");
						$l .=get_td( $edit , "");
					  	$l .='</tr>';

			$flag ++;

			
				
		}



		if ($flag > 9) {
			
			$l .='					
						<tr>';
							$l .=get_td("#" , "");
							$l .=get_td("Acceso" , "");
							$l .=get_td("Tipo acceso" , "");
							$l .=get_td("Precio al público" , "");	
							$l .=get_td("Vigencia" , "");
							$l .=get_td("Portada" , "");	
							$l .=get_td("Mensaje para el público" , "");
							$l .=get_td( "", "");
							$l .=get_td("" , "");
						$l .='</tr>
					
					';
		}

		$l .='</table>';
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


	/****************************Resumen Accesos principal cliente  ******************************************************************/
	function resumen_cliente($data , $id_evento ){


		$resumen = "";		
		foreach ($data as $row){
			
			$escenarios  = $row["escenarios"];
			$artistas = $row["artistas"];
			$evento_punto_venta =  $row["evento_punto_venta"];
			$accesos 	 = $row["accesos"];
			$generos_musicales =  $row["generos_musicales"];
			$servicios  =  $row["servicios"];		

		$resumen .=  '  					
        <div class="col-lg-3" >
            <div class="form_hover" style="background-color: #32AE94;" >
                <p style="text-align: center; margin-top: 50px;">
	                <span style="font-size: 120px;">
	                    '. $escenarios .'
	                </span>    
                </p>

                <div class="header">
                    <div class="evento_escenarios  blur" id="'. $id_evento.'"></div>
                    <div class="header-text" >
                        <div class="panel" style="height: 247px; background:#32AE94; background:#32AE94;">
                            <div class="panel-heading "  >
                                <h4 style="color: white;">Escenarios</h4>
                            </div>
                            <div class="panel-body "  >                               
                                <div id="escenarios_resumen"></div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-3" >
            <div class="form_hover " style="background-color: #32AE94;">
                <p style="text-align: center; margin-top: 50px;">
                    <span style="font-size: 120px;">
                    	'.$artistas.'
                    </span>
                </p>
                <div class="header">
                    <div class="evento_artistas  blur"  id="'. $id_evento .'"></div>
                    <div class="header-text">
                        <div class="panel " style="height: 247px; background:#32AE94;">
                            <div class="panel-heading">
                                <h4 style="color: white;">Artistas</h4>
                            </div>
                            <div class="panel-body">
                                <div id="artistas_resumen"></div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form_hover " style="background-color: #32AE94;">
                <p style="text-align: center; margin-top: 50px;">                    
                    <span style="font-size: 120px;">
                    '. $generos_musicales  .'
                    </span>
                </p>
                <div class="header">
                    <div class="blur evento_generos" id="'. $id_evento .'"></div>
                    <div class="header-text">
                        <div class="panel " style="height: 247px; background:#32AE94;">
                            <div class="panel-heading">
                                <h4 style="color: white;">Géneros musicales</h4>
                            </div>
                            <div class="panel-body">
                                <div id="generos_resumen"></div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>                                    
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form_hover " style="background-color: #32AE94;">
                <p style="text-align: center; margin-top: 50px;">
                    <span style="font-size: 120px;">
                    '. $servicios.'
                    </span>
                </p>
                <div class="header">
                    <div class="evento_servicios  blur" id="'. $id_evento .'"></div>
                    <div class="header-text">
                        <div class="panel " style="height: 247px; background:#32AE94;">
                            <div class="panel-heading">
                                <h4 style="color: white;">Servicios </h4>
                            </div>
                            <div class="panel-body">
                                
                            	<div id="servicios_resumen"></div>	

                                <div class="form-group">
                                    User Rating:<br/>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

        }
		
		return $resumen;

	}






	/**/
	function lista_accesos_publicos($data){


		$accesos   =""; 
		foreach ($data as $row) {
			
			$precio  = $row["precio"];			
			$descripcion = $row["descripcion"];			
			
			$inicio_acceso  = $row["inicio_acceso"];			
			$termino_acceso = $row["termino_acceso"];			

			$tipo   = $row["tipo"];			
			$nombre_imagen = $row["nombre_imagen"];			
			$base_path_img= $row["base_path_img"];			
			$img =  base_url($base_path_img. $nombre_imagen);
			
					$accesos .=  '<div class="col-lg-12"> 
									<div class="col-lg-6">
										<div class="audio-wrapper">
											<img style="width:100%;" src="'. $img .'">
										</div>
				                    </div>

				                    <div class="col-lg-6">
				                                        <header>
				                                            <h2><a style="color:#1DB3BF !important;" >'. $tipo .'</a> , $'. $precio .'.00</h2>
				                                            <div class="post-info">                                                
					                                            <span class="comments">
					                                                <span class="post-date">
					                                                    <i class="icon-calendar"></i> Periodo
					                                                    <span class="day"> '. $inicio_acceso  .' </span>
					                                                    <span class="month"> al '. $termino_acceso . ' </span>
					                                                </span>
					                                            </span>    	                                               
				                                            </div>
				                                        </header>
				                                        
				        				<p>'.$descripcion.'</p>                                        
									</div>
								</div>'; 
			

		}		


		
		return $accesos;				
	}













}/*Termina el helper*/