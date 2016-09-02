<?php 	

	$puntos_venta_registrados = '';
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

	$mensaje_evento .="				<div class='separate-enid'>
		</div><div class='row'>
									<div class='col-lg-12'>
										<a class='nuevo-elemento pull-left' href='".$url."'> 
											+ Registrar nuevo
										</a>
									</div>	
								  </div>
								";
	

?>

<div class='panel panel-resumen-evento'>		
	<div class="item-content-block tags">
		<i class="menos_info_escenario  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>		
		<span class='msj-resumen' >
			<?=$mensaje_evento;?>
		</span>	
		<div class='separate-enid'>
		</div>
		<div>
			<?=$puntos_venta_registrados;?>
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
	}
	.menos_info_puntos_venta:hover{
		cursor: pointer;
	}
	.menos_info_puntos_venta{
		color: white;
	}
</style>
