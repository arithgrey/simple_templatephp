<?php 	

	$puntos_venta_registrados = '<div class="item-content-block tags">';
	$a = 0; 
	$url=  base_url('index.php/accesos/configuracionavanzada/')."/0/". $id_evento."/puntoventa"; 
	foreach ($puntos_venta as $row ){

		$razon_social =  $row["razon_social"];			
		
		$puntos_venta_registrados .= "<a href='".$url."'> ". $razon_social ."</a>";	
		$a++; 
	}
	$mensaje_evento=  "No se han registrado puntos de venta."; 
	if ($a > 0 ) {
		$mensaje_evento = "Puntos de venta registrados en el evento. "; 		
	}

	$puntos_venta_registrados .="<a style='background-color:#8CB1A3;' href='".$url."'> + Registrar nuevo</a>";
	$puntos_venta_registrados .= "</div>";

?>

<div class='panel' style='background:#2C4B50; padding:20px;'>		
	<i class=" menos_info_puntos_venta  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
	</i>

	<center>
		<span style='color:white;'>
			<?=$mensaje_evento;?>
		</span>
	</center>
	<center>
		<?=$puntos_venta_registrados;?>
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
	.menos_info_puntos_venta:hover{
		cursor: pointer;
	}
	.menos_info_puntos_venta{
		color: white;
	}
</style>
