<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	/**/
	function load_complete_artista($data){

	    $table = "";
	    $table .= '<table class="table  table-bordered">
	    <tr class="text-center enid-header-table">';
	    $table .= get_td("#" , "");  
	    $table .= get_td("Artista" , "");	   
	    $table .= get_td("Fecha registro" , "");
	    $table .= '</tr>';            
	    $flag =  1;
	    foreach ($data as $row) {
	        $table .=  "<tr>"; 
	        $table .= get_td($flag , "");
	        $table .= get_td($row["nombre_artista"], "");
	        $table .= get_td($row["fecha_registro"], "");
	        $table .=  "</tr>"; 
	        $flag ++; 
	    }
	    return $table; 
	}
	/**/
	function list_posible_artista($data){


		$options ="";
		foreach ($data as $row) {
			$options .="<option value='". $row["nombre_artista"] ."'> ";
		}
		return $options;
	}
	/**/
	function resumen_artistas_table($data){


		$table='<div ><table class="table table-bordered">
				<tr class="enid-header-table">';
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

			$table.='<tr>';								  	
				$table .= get_td( $row["evento"] , "" );
				$table .= get_td($row["con_descripcion"]  , "" );
				$table .= get_td($row["artistas"]  , "class='franja-vertical'" );
				$table .= get_td( $row["artistas_videos_youtube"] , "" );
				$table .= get_td( $row["artistas_pistas_sound"]  , "" );
				$table .= get_td( $row["artistas_con_horario"] , "" );
				$table .= get_td($row["artistas_pendientes"] , "" );
				$table .= get_td( $row["artistas_conformado"] , "" );					  	
				$table .= get_td($row["artistas_prometen_asistencia"] , "" );					  						  						  	

			$table .='</tr>';




			$table.='<tr>';										  					  						  	
				$table .='<td class="text-center" colspan="2"></td>';
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas"] )  , "class='franja-vertical'");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_videos_youtube"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] ,  $row["artistas_pistas_sound"] ), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_con_horario"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_pendientes"]), "");
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_conformado"]), "");					  	
				$table .= get_td( get_porcentaje_artistas($row["artistas"] , $row["artistas_prometen_asistencia"]), "");					  						  						  	

			$table .='</tr>';			  
		}

		$table.="</table></div><hr>";
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







	function get_info_artistas_escenario_user($data){

		$article_artista ="";
		foreach ($data as $row) {

			$idescenario = $row["idescenario"];        
			$idartista = $row["idartista"];          
			$fecha_registro = $row["fecha_registro"];     

			$hora_inicio = $row["hora_inicio"];        
			$hora_termino = $row["hora_termino"];       

			$url_social_youtube = $row["url_social_youtube"]; 
			$url_sound_cloud = $row["url_sound_cloud"];    
			$status_confirmacion = $row["status_confirmacion"];
			$nombre_artista   = $row["nombre_artista"];
			$nota = $row["nota"];
			$img  =   $row["base_path_img"] .  $row["nombre_imagen"];

			$tipo_artista   = $row["tipo_artista"];
			$dinamic_section =  '';


			if ($url_sound_cloud != null  &&  strlen($url_sound_cloud)> 10 ) {

				$dinamic_section =  '<div class="col-md-8">
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="'.$url_sound_cloud.'">
											</iframe>
										</div>
									</div>';
			}else{
				$dinamic_section = '<div class="col-md-8">
										<div class="overlay-container">
											<img src="'.base_url($img).'" >
											<a class="overlay-link" href="">
												
											</a>
										</div>
									</div>';
			}
			

			$article_artista .= '<article class="blogpost">
								<div class="row form_hover ">																											
									'. $dinamic_section .'
									<div class="col-md-4">
										<header>
											
											<div class="post-info" >
												<div>
													<h1>
														'.$nombre_artista   .'
													</h1>
													<i class="fa fa-clock-o">
													</i>
													<span>
													'.
														$hora_inicio
												   	.'
												   </span>
													<span>
														a '. 
														$hora_termino
													.'</span>
												</div>
												<div>
													<a href="'. $url_social_youtube .'">														
														<i class="fa fa-youtube-play">
														</i> 														
													</a>
													<a href="'. $url_sound_cloud .'">														
														<i class="fa fa-play">
														</i> 														
													</a>
													'.$tipo_artista .'
												</div>
												
											</div>
										</header>
										</div>	
										<div class="header">																						
											<div style="height:200px;overflow-y: hidden;  overflow:scroll;">
												<h1>Del artista</h1>
												<span style="font-size:.8em!important; color:white;" >

													'. 
														$nota 
													.'
												</span>										
												<br>
											</div>
										</div>									
									
								</div>								
								<div>
								
								</div>
							</article>
							<hr>';			
		}
		return $article_artista;
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
	function list_artistas_escenario($data , $title_panel , $record=0 , $id_escenario ){		            

		$artistas_in_evento = '<div class="panel">
		                        <header class="panel-heading">
		                            '.$title_panel .'                            
		                        </header>                                   	
		                        <div class="panel-body">
		                            <ul class="goal-progress">';

	foreach ($data as $row) {
		
		$id_artista = $row["idartista"];	
		$status = $row["status"];
		$idescenario = $row["idescenario"];
		$fecha_registro = $row["fecha_registro"];
		$hora_inicio = $row["hora_inicio"];
		$hora_termino = $row["hora_termino"];
		$nombre_artista= $row["nombre_artista"];
		$status_confirmacion = $row["status_confirmacion"];
		$tipo_artista =  $row["tipo_artista"];

	
		if ($hora_inicio!= null OR strlen($hora_inicio)>3  ){
			$horario = "de ". $hora_inicio ." a ".  $hora_termino;	
		}else{
			$horario = "por definir";
		}

				$artistas_in_evento .= '<li class="media usr-info">';

				$artistas_in_evento .=  "<div  class='img-div' >";
				if ($row["nombre_imagen"]!= null ) {

						$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);													

						
							$artistas_in_evento .= "<div data-toggle='modal' data-target='#modal-img-artista-evento'    >".
														 create_icon_img($img , "img-artista-evento",  $id_artista  , "Actualizar la imagen del artista" , 1   ) 
													. "</div>";

				}else{
						$artistas_in_evento .='<div title="Cargar imagen del artista" data-toggle="modal" data-target="#modal-img-artista-evento" class="prog-avatar"> 												                            						                            
						                            <i class="img-artista-evento thumb fa fa-cloud-upload fa-2x" id="'.$id_artista.'"  ></i>
												</div>';
				}

				$artistas_in_evento .="</div>";

                $artistas_in_evento.='<div class="details img-div-text" >
                                        <div class="title" style="font-size:.9em !important;">
                                        	<i id="'.$id_artista.'" class="remove-artista fa fa-times" title="Quitar del escenario" ></i>                                        	
                                        	<a href="" title="Enlace algún  video del artista en youtube" data-toggle="modal" data-target="#modal_link_youtube" class="artista_yt" id="'.$id_artista.'"> <i class="artista_yt fa fa-youtube-play" id="'.$id_artista.'" ></i></a>
                                        	<a href="" data-toggle="modal"  title="Enlace"  data-target="#modal_link_sound" class="artista_sound" id="'.$id_artista.'">  <i class="artista_sound fa fa-play-circle" id="'.$id_artista.'" ></i></a>
                                        		

                                        	
                                        	<a href="" data-toggle="modal"  title="Mensaje del artista al público" data-target="#modal_nota" class="artista_nota" id="'.$id_artista.'"><i class="artista_nota fa fa-file-text-o" id="'.$id_artista.'" ></i></a>                                        	                                            	                                                                              		                                            	                                        
                                        	<a title="Define la participación del artista" href="" data-toggle="modal" data-target="#modal_tipo_artista"><i class="fa fa-star tipo_artista" id="'.$id_artista.'"></i></a> 
                                            <a title="Horario que se presentará  el artista" href="" data-toggle="modal" data-target="#modal_record_horario"><i class="fa fa-clock-o horario_artista" id="'.$id_artista.'"></i></a> Horario '.$horario.', participación '. $tipo_artista .' 	                                           



                                            <a  data-toggle="modal" data-target="#edit-status-confirmacion"  
                                            style="background: #424F63;  color:white; padding:4px; border-radius: 5px;" 
                                             class="status-confirmacion" id="'. $id_artista.'" >'. $status_confirmacion.'</a>				                                    			                                   

                                            
                                            <div class="pull-right">	                                            
	                                            <a data-toggle="modal" 
	                                            data-target="#edit-nombre-artista"   title="artista"  >
	                                            	<h1 class="artistas-inputs pull-right" id="'. $id_artista .'"   >'. $nombre_artista .'</h1>
	                                            </a>	                                            
                                            <div>

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
		                            <h1>
			                            <i class="fa fa-play-circle">
			                            </i>
										Registrar artista
									</h1>
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

