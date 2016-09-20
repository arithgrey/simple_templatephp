<!--SERVICIOS INCLUIDOS EN EL EVENTO-->
<div class='servicios-mov'>
	<div class='servicios_incluidos'>
	</div>
	<div class='place_servicios_incluidos'>
	</div>
</div>
<!--Sección Objetos permitidos-->
<div id='seccionobjs'>
	<div class='objs_enid' id='objs_enid'>
		<div class='objs_permitidos'>
		</div>
		<div class='place_objs_permitidos'>
		</div>
	</div>	
</div>
<!---->
<div>							
	<span class='dias_restantes'>
		<?=$dias_restantes_evento?>
	</span>	

	<?=get_tags_generos($list_generosdb , $evento['idevento'] , $in_session ); ?>
	<div class='col-lg-12 col-md-12 col-sm-12 '>
		<div class='place_extra_event'>
		</div>
		<div class='extra_event'>
		</div>				
	</div>
	
</div>	
<!--Sección Objetos  permitidos termina -->				
<div>		
	<div class='eslogan_evento' title='slogan del evento'>			
		<?=show_text_input($evento["eslogan"] , 5  ,  editar_btn($in_session , base_url('index.php/eventos/nuevo/'.$evento['idevento'].'/slogan'   )  ))?>
	</div>		
</div>

