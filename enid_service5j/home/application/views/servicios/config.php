<a href="<?=base_url('index.php/eventos/diaevento')?>/<?=$evento?>">
	<i class="fa  fa-arrow-circle-o-right"> </i>
	Ver como el público
</a>

<form class="form-horizontal" id="form_servicios_b" method="GET" action="<?=base_url('index.php/api/serviciosevento/q/format/json/')?>">	
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="servicio_b">
			<i class="fa fa-search" aria-hidden="true">
			</i>
		  	Servicio
		  </label>  
		  <input type="hidden" name="evento_b" value="<?=$evento?>">
		  <div class="col-md-4">
		  <input id="servicio_b" name="servicio_b" type="text" placeholder="Servicios  del evento" class="form-control input-md">		
		  </div>
		</div>	
</form>
<div class='servicios_encontrados' id="servicios_encontrados" >
</div>
<?php 	
	$servicios_registrados = '<div class="item-content-block tags">';
	$a = 0; 
	foreach ($servicios as $row ){
		$servicio_val =  $row["servicio"]; 
		$id_servicio =  $row["idservicio"];
		$id_servicio_inter =  $row["idserviciointer"];

		$dinamic_id = 'serviciocheck_'.$a; 

		if ($id_servicio ==  $id_servicio_inter) {
			
			$servicios_registrados .= "<a  class='servicio_registrado_evento' id='".$a."' > ". $servicio_val ."</a>
									  <span style='display:none;'  class='$dinamic_id tags_e'>
									  	<i class='fa fa-times servicios_delete   $dinamic_id  ' aria-hidden='true'   id='".$id_servicio."'  >
									  	</i>
									  </span>";	
		}		
		$a ++; 
	}
	$servicios_registrados .= "</div>";
?>
									
<?=$servicios_registrados?>
<style type="text/css">
	.item{color:#48453d; margin-top:30px; overflow:hidden;}		
	.tags a{background-color:#395356; padding:10px; color:#fff; display:inline-block; font-size:11px; text-transform:uppercase; line-height:11px; border-radius:2px; margin-bottom:5px; margin-right:2px; text-decoration:none;}
	.tags a:hover{background-color:#00BCD4;}
	.tags_e:hover{
		cursor: pointer;
	}
</style>