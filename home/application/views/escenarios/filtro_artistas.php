<?php 	
	$artistas_registrados = '';
	$a = 0; 
	foreach ($artistas as $row ){
		$nombre_artista =  $row["nombre_artista"];			
		$id_escenario =  $row["id_escenario"];		
		$url=  base_url('index.php/escenario/configuracionavanzada/') . "/" . $id_escenario; 
		$artistas_registrados .= "<a href='".$url."' class='elemento-resumen'> ". $nombre_artista ."</a>";	
		$a++; 
	}
	$mensaje_evento=  "No se han registrado artistas en nungún escenario aún." ; 
	if ($a > 0 ) {
		$mensaje_evento = "Artistas que integran el evento"; 		
	}
	
?>
<div class='panel panel-resumen-evento'>	
	<div class="item-content-block tags">			
		<i class=" menos_info_artistas  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>			
		<span class='msj-resumen'>
			<?=$mensaje_evento;?>
		</span>	
		<div class='separate-enid'>
		</div>
		<div>
			<?=$artistas_registrados;?>
		</div>
	</div>
</div>
<style type="text/css">
	.item{color:#48453d; margin-top:30px; overflow:hidden;}		
	.tags a{background-color:#53C1CE; padding:10px; color:#fff; display:inline-block; font-size:11px; text-transform:uppercase; line-height:11px; border-radius:2px; margin-bottom:5px; margin-right:2px; text-decoration:none;}
	.tags a:hover{background-color:#00BCD4;}
	.tags_e:hover{
		cursor: pointer;
	}
	.escenario_evento_nuevo:hover{
		cursor: pointer;
	}.menos_info_artistas:hover{
		cursor: pointer;
	}	
</style>
