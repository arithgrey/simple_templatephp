<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	function resumen_artistas_table($data){


		$table='<table class="table display table table-bordered dataTable">
				<tr class="text-center header-table-info" >';
		$table .= get_td("Escenario que pertenece al evento " , "");										  					  
		$table .= get_td("Escenario con información para el público" , "");
					  	
					  	
					  	
		$table .= get_td("Artistas" , "");
		$table .= get_td("Artistas con enlace a youtube" , "");
		$table .= get_td("Con enlace a pistas musicales" , "");
		$table .= get_td("Con horario de presentación" , "");
		$table .= get_td("Pendientes por confirmar" , "");
		$table .= get_td("Artistas que ya han conformado su asistencia" , "");					  	
		$table .= get_td("Artistas que promenten asistir" , "");					  						  						  	
					  

		
		$table.="</tr>";

		foreach ($data as $row) {

			$table.='<tr class="text-center" >';								  	
				$table .= get_td( $row["evento"] , "" );
				$table .= get_td($row["con_descripcion"]  , "" );
				$table .= get_td($row["artistas"]  , "" );
				$table .= get_td( $row["artistas_videos_youtube"] , "" );
				$table .= get_td( $row["artistas_pistas_sound"]  , "" );
				$table .= get_td( $row["artistas_con_horario"] , "" );
				$table .= get_td($row["artistas_pendientes"] , "" );
				$table .= get_td( $row["artistas_conformado"] , "" );					  	
				$table .= get_td($row["artistas_prometen_asistencia"] , "" );					  						  						  	

			$table .='</tr>';




			$table.='<tr class="text-center" >';										  					  						  	
			$table .='<td class="text-center" colspan="2"></td>';
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas"] )  , "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_videos_youtube"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] ,  $row["artistas_pistas_sound"] ), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_con_horario"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_pendientes"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_conformado"]), "");					  	
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_prometen_asistencia"]), "");					  						  						  	

			$table .='</tr>';			  
		}



		$table.="</table>";
		return $table;

	}


	function get_porcentaje_artistas($artistas , $val ){

		
		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $artistas )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}
		return $result;

	}
	/**/
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

			$artistas_block .='<tr>';
			$artistas_block .= get_td( $flag , "");
			$artistas_block .= get_td( $row["nombre_artista"], "");
			$artistas_block .= get_td( $hora_inicio, "");
			$artistas_block .= get_td( $hora_termino, "");
			$artistas_block .='</tr>';		
							$flag++;
		}
		return $artistas_block;
	
	}
	




	/*lista los artistas, template simple para edición*/
	function list_artistas_escenario($data , $title_panel, $record=0 , $id_escenario ){		            

		$artistas_in_evento = '
					<div class="panel">
                        <header class="panel-heading">
                            '.$title_panel .'
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                
                             </span>
                        </header>


                        <br>	
                        	
                        <div class="panel-body">
                            <ul class="goal-progress">
                                ';



	foreach ($data as $row) {
	
	$idartista = $row["idartista"];	
	$status = $row["status"];
	$idescenario = $row["idescenario"];
	$fecha_registro = $row["fecha_registro"];
	$hora_inicio = $row["hora_inicio"];
	$hora_termino = $row["hora_termino"];
	$nombre_artista= $row["nombre_artista"];



	
	if ($hora_inicio!= null OR strlen($hora_inicio)>3  ){
		$horario = "de ". $hora_inicio ." a ".  $hora_termino;	
	}else{
		$horario = "por definir";
	}
	


				$artistas_in_evento .= '<li class="media usr-info">';


				if ($row["nombre_imagen"]!= null ) {

						$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);													





		               	$artistas_in_evento .='<div data-toggle="modal" data-target="#modal-img-artista-evento" class="prog-avatar"> 						
						                            
						                            <img  class="img-artista-evento thumb" id="'.$idartista.'" src="'.$img .'" alt="">
												</div>';


				}else{
						$artistas_in_evento .='<div  data-toggle="modal" data-target="#modal-img-artista-evento" class="prog-avatar"> 												                            						                            
						                            <i class="img-artista-evento thumb fa fa-cloud-upload fa-3x" id="'.$idartista.'"  ></i>
												</div>';
				}



                $artistas_in_evento.='<div class="details">
                                        <div class="title">
                                        	<i id="'.$idartista.'" class="remove-artista fa fa-minus-circle"></i>                                        	
                                        	<a href="" data-toggle="modal" data-target="#modal_link_youtube" class="artista_yt" id="'.$idartista.'"> <i class="artista_yt fa fa-youtube-play" id="'.$idartista.'" ></i></a>
                                        	<a href="" data-toggle="modal" data-target="#modal_link_sound" class="artista_sound" id="'.$idartista.'">  <i class="artista_sound fa fa-play-circle" id="'.$idartista.'" ></i></a>
                                            
                                            <a href="" data-toggle="modal" data-target="#modal_record_horario">                                            
                                            <i class="fa fa-clock-o horario_artista" id="'.$idartista.'">
                                            </i></a> Horario '.$horario.' 
                                            <a  class="pull-right" href="#">'.  $nombre_artista .'</a>
                                        </div>                                        
                                    </div>
                                </li>';				                                	
	}                                



                            $artistas_in_evento.= '
                                
                            </ul>
                            

                            ';

                            if ( $record == 1) {
                            	$artistas_in_evento.='
		                            <div class="text-center">
		                            <h3><i class="fa fa-play-circle"></i>
										Registrar artista
									</h3>
		                            	<div class="row">
											<div class="col-md-12">
												<form role="form" class="form-inline" id="form-escenario-artista" >
													<div class="form-group todo-entry">

														<datalist id="dinamic-artistas"></datalist>
														<input list="dinamic-artistas" placeholder="nombre del artista" class="form-control" id="artista" name="nuevoartista" style="width: 100%" type="text">														
														<input type="hidden" name="idescenario" value="'.$id_escenario.'">
													</div>
													<button class="btn btn-primary pull-right" type="submit">+</button>
												</form>
											</div>
										</div>
		                            </div>';
                            }
                            
                            $artistas_in_evento.='
                        </div>
                    </div>';

    return $artistas_in_evento;                    
		
	}
	/*termina la función*/


}/*Termina el helper*/