<div >
	<span class='titulo_artistas'>
		Artistas del escenario<?=editar_btn($in_session , base_url('index.php/escenario/configuracionavanzada/'.$id_escenario.'/artista') );?>
	</span>
</div>
<?php

	$list_artistas = '';	
	foreach ($artistas as $row){

		$id_artista = $row["idartista"];	
		$status = $row["status"];
		$idescenario = $row["idescenario"];
			$fecha_registro = $row["fecha_registro"];
		$hora_inicio = $row["hora_inicio"];
		$hora_termino = $row["hora_termino"];
		$nombre_artista= $row["nombre_artista"];
		$status_confirmacion = $row["status_confirmacion"];
		$tipo_artista =  $row["tipo_artista"];		
		$horario =  hora_enid_format($hora_inicio , $hora_termino); 		
		$img =  create_icon_img( $row , " img-artista-evento ", $id_artista  , "data-toggle='modal' data-target='#modal-img-artista-evento'  " ); 	
		$m_delete = '';  $m_nombre_artista =  ''; $m_status  =  ''; $m_horario =  ''; $m_youtube  =  ''; $m_sound =  ''; $m_tipo =  ''; $m_nota =  ''; 
		
		$url_social_youtube  =  $row["url_social_youtube"];
		$url_sound_cloud = $row["url_sound_cloud"]; 
		$nota  =  $row["nota"];
		$seccion_youtube =' <a href="'.$url_social_youtube.'">
								<i  class="fa fa-youtube-play">
								</i>
							</a>';
		
		$seccion_sound = '<a href="'. $url_sound_cloud.'">
							<i  class="fa fa-play-circle">
							</i>
						  </a>'; 
			$nota_recorte =  substr($nota, 0, 110 ); 
			$seccion_nota  = contruye_info_escenario_cliente($nota); 				  






		if ($public == 0 ){

				$m_delete = ' <i data-toggle="modal" data-target="#modal_delete_artista"  id="'.$id_artista.'" class="remove-artista fa fa-times pull-right" title="Quitar del escenario"    ></i>'; 	
				$m_nombre_artista =  ' data-toggle="modal"  data-target="#edit-nombre-artista"   title="artista" '; 
				$m_status =  ' data-toggle="modal" data-target="#edit-status-confirmacion"   class="status-confirmacion registrado " id="'. $id_artista.'" ';
				$m_horario = ' title="Horario que se presentará  el artista"  data-toggle="modal" data-target="#modal_record_horario"  ';
				$m_youtube = ' title="Enlace algún  video del artista en youtube" data-toggle="modal" data-target="#modal_link_youtube"   '; 
				$m_sound = ' data-toggle="modal"  title="Enlace"  data-target="#modal_link_sound"  ';			
				$m_nota = ' data-toggle="modal"  title="Mensaje del artista al público" data-target="#modal_nota"  '; 			
				
				$seccion_youtube = valuda_icon_yt($m_youtube , $id_artista , $url_social_youtube ); 
				$seccion_sound = valida_icon_sound_cloud($m_sound , $id_artista , $url_sound_cloud   ); 				
				/*Poder editar la nota*/		
				$seccion_nota = evalua_nota_artista($m_nota , $id_artista ,  $nota  ); 
				/*
				$seccion_nota = '<a "'. $m_nota .'"  class="artista_nota" id="'.$id_artista.'">
									<i class="artista_nota fa fa-file-text-o icon_config" id="'.$id_artista.'" >
									</i>
								</a> 
								'; 
								*/
		}	

		$list_artistas .=  '

		<div class="panel" >
				'. $m_delete.'
                <div class="panel-body" >
                    <div class="row">
                        	<div class="col-md-4">
	                            <div class="blog-img-sm">
	                                '.$img.'
	                            </div>
                            </div>
                            <div class="col-md-8 " >                           
		                        <div>
			                        <h1  "'. $m_nombre_artista .'"  >
								   		<div class="artistas-inputs" id="'. $id_artista .'"  >
			                    		'.$nombre_artista .'
			                    		</div>
			                    	</h1>			         					
				                	<div>
					                    <a "'. $m_status .'" >
								          '. $status_confirmacion.'
								       	</a>
										|   						
								        '.valida_icon_conf_horario($m_horario , $id_artista , ' horario_artista icon_config  ' , 'fa fa-clock-o' , "Horario de presentación " ,   $horario ).'
								        '. $seccion_youtube .'
										'. $seccion_sound .'						        
										|
										

										'. tag_tipo_artista($public , $id_artista ,  $tipo_artista  ) .'

										
										
										'.$seccion_nota.'                                        	                                            	                                                                              		                                            	                                        								      
										
									</div>						
			                 	</div>
                        	</div>
                    </div>
                </div>
            </div>
            <hr>

		
		';
		

	} 

?>



<?php
		echo form_artista($public , $id_escenario );
		echo "<div class='separate-enid'> 
		  </div> 
		  <div class='artistas'>
		  	". $list_artistas . "
		  </div>";	

	if ($in_session ==  1 ){if (count($artistas) == 0 ) {if ($public == 1 ) {echo "<center><span class='msj_alerta_artistas  msj_notificacion_config'>No has cargado artistas al escenario aún </span></center>" . editar_btn($in_session , base_url('index.php/escenario/configuracionavanzada/'.$id_escenario.'/artista') ); } }}else{/**/if (count($artistas) == 0 ) {echo "<center><span class='msj_alerta_artistas msj_notificacion_config '>Próximamente.!</span></center>";}}
		  
?>



<!--FORMULARIO PARA NUEVO-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>

<style type="text/css">
.nuevo_artista_btn{	
	background: #133640;
}
.horario_artista:hover{
	cursor: pointer;
}
.artista_yt:hover{
	cursor: pointer;
}
.artista_sound:hover{
	cursor: pointer;
}
.artista_nota:hover{
	cursor: pointer;
}
.mas_info_artista{
	text-align: right;
}
.tipo_artista_tag{
	
}.remove-artista:hover{
	cursor: pointer;
}
.titulo_artistas{
	font-size: 2em;
    font-weight: bold;
}
.artistas{
	padding: 10px;
	background: rgb(247, 252, 254);	
}
.sin_registro{
	color: #93a2a9;
}
.registrado{
	color: black;	
}
.registrado:hover{
	cursor: pointer;
	text-decoration: none;
}
.horario_artista:hover{
	cursor: pointer;
	text-decoration: none;
}
</style>







		        
