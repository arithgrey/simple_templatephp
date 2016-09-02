<?php 	
	$eventos_registrados = '';
	$a = 0; 
	foreach ($escenarios_evento as $row){		
		$nombre =  $row["nombre"];
		$tipoescenario =  $row["tipoescenario"];
		//$img =  create_icon_img($row , "" , "" , "" , "" );
		$id_escenario =  $row["idescenario"];		
		/**/
		$url_escenario =  base_url("index.php/escenario/inevento")."/".$id_escenario . "/".$id_evento;
		$eventos_registrados .= "<a href='". $url_escenario ."'> ". $nombre ."</a>";	
		$a++; 
	}
		$mensaje_evento = "	<span> 
								Escenarios del evento.
							</span>	
								<div class='separate-enid'>
								</div>												
							<div class='row'>
								<div class='col-lg-12'>
									<a data-toggle='modal' data-target='#modal-nuevo-escenario-evento' id='$id_evento' class='escenario_evento_nuevo nuevo-elemento pull-left'  >
									 + Nuevo escenario 
									</a>
								</div>
							</div>
							"; 		

	
?>

<div class='panel panel-resumen-evento'>		
	<div class="item-content-block tags">
		<i class="menos_info_escenario  fa fa-caret-up" aria-hidden="true" id='<?=$id_evento?>'  >
		</i>			
		<span class='msj-resumen'>
			<?=$mensaje_evento;?>
		</span>	
		<div class='separate-enid'>
		</div>
		<div>
			<?=$eventos_registrados;?>
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
	.menos_info_escenario:hover{
		cursor: pointer;
	}		
	.icon_escenario{		
		width: 10% !important;
		margin: 0 auto;	
	}
</style>
