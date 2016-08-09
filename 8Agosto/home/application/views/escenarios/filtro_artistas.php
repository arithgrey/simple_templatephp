<?php 	

	$artistas_registrados = '<div class="item-content-block tags">';
	$a = 0; 
	foreach ($artistas as $row ){

		$nombre_artista =  $row["nombre_artista"];			
		$id_escenario =  $row["id_escenario"];		

		$url=  base_url('index.php/escenario/configuracionavanzada/') . "/" . $id_escenario; 
		$artistas_registrados .= "<a href='".$url."'> ". $nombre_artista ."</a>";	
		$a++; 
	}
	$mensaje_evento=  "No se han registrado artistas en nungún escenario aún." ; 
	if ($a > 0 ) {
		$mensaje_evento = "Artistas que integran el evento"; 		
	}

	$artistas_registrados .= "</div>";
?>

<div class='panel' style='background:#2C4B50; padding:20px;'>				
	<i class=" menos_info_artistas  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
	</i>		
	<center>
		<span style='color:white;'>
			<?=$mensaje_evento;?>
		</span>
	</center>
	<center>
		<?=$artistas_registrados;?>
	</center>
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
	.menos_info_artistas{
		color:white;
	}
</style>
