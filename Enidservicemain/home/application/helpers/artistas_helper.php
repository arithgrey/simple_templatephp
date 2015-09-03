<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

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
	


					$artistas_in_evento .= '<li>
                                    <div class="prog-avatar">
                                        <img src="images/photos/user1.png" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                        <i id="'.$idartista.'" class="remove-artista fa fa-minus-circle"></i>
                                            <a href="" data-toggle="modal" data-target="#modal_record_horario"> <i class="fa fa-clock-o horario_artista">
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
												<form role="form" class="form-inline" id="form-escenario-artista">
													<div class="form-group todo-entry">
														<input placeholder="nombre del artista" class="form-control" id="artista" name="nuevoartista" style="width: 100%" type="text">
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
 
