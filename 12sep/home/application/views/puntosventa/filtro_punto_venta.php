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

	$mensaje_evento .="<div class='row'>									
							<div class='col-lg-12 col-md-12 col-sm-12'>
								<a class='nuevo-elemento pull-left' href='".$url."'> 
									+ Registrar nuevo
								</a>
							</div>	
						</div>
								";
	

?>

<div class='panel panel-resumen-evento'>		
	<div class="item-content-block tags">
		<i class="menos_info_escenario  fa fa-caret-up pull-right" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>		
		<span class='text-title-resum'> 
			Puntos de venta
		</span>									
		<div class="row">
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<span class='msj-resumen'>
					<?=$mensaje_evento;?>
				</div>
				<div class='separate-enid'>
				</div>
				
					<div class='col-lg-12 col-md-12 col-sm-12'>
						<?=$puntos_venta_registrados;?>	
					</div>					
				
			</div>
		</div>
	</div>	
</div>

