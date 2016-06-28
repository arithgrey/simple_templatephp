<?php 	

	$eventos_registrados = '<div class="item-content-block tags">';
	$a = 0; 
	foreach ($escenarios_evento as $row ){
		
		$nombre =  $row["nombre"];
		$tipoescenario =  $row["tipoescenario"];
		$img =  $row["img"];
		$id_escenario =  $row["idescenario"];
		//$id_evento =  $row["idevento"];
		$url_escenario =  base_url("index.php/escenario/configuracionavanzada")."/".$id_escenario . "/".$id_evento;
		$eventos_registrados .= "<a href='". $url_escenario ."'> ". $nombre ."</a>";	
		$a++; 
	}

	$eventos_registrados .= "<a style='background-color:#8CB1A3;' data-toggle='modal' data-target='#modal-nuevo-escenario-evento'  class='escenario_evento_nuevo' id='". $id_evento."'> 
								+ Registrar nuevo
							</a>";
	$mensaje_evento=  "No se han registrado escenarios en éste evento aún."; 
	if ($a > 0 ) {
		$mensaje_evento = "Escenarios registrados  en el evento"; 		
	}
	
	$eventos_registrados .= "</div>";
?>

<div class='panel' style='background:#2C4B50; padding:20px;'>		
	<i class=" menos_info_escenario  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
	</i>		
	<center>
		<span style='color:white;'>
			<?=$mensaje_evento;?>
		</span>
	</center>
	<center>
		<?=$eventos_registrados;?>
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
	}
	.menos_info_escenario:hover{
		cursor: pointer;
	}
	.menos_info_escenario{
		color:white;
	}		
</style>
