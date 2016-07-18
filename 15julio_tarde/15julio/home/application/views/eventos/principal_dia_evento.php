<div>
	<!--SERVICIOS INCLUIDOS EN EL EVENTO-->
	<div>
		<div class='servicios_incluidos'>
		</div>
		<div class='place_servicios_incluidos'>
		</div>
	</div>
	<hr>
	<!--Sección Objetos permitidos-->
	<div class='col-lg-8 col-md-8 col-sm-12'>
		<div id='seccionobjs'>
			<div class='objs_enid' id='objs_enid'>
				<div class='objs_permitidos'>
				</div>
				<div class='place_objs_permitidos'>
				</div>
			</div>	
		</div>
	</div>
	<div class='col-lg-4 col-md-4 col-sm-12'>				
		
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12'>
				<span class='dias_restantes pull-right'>
					<?=$dias_restantes_evento?>
				</span>
			</div>
		</div>
		
		<div class='place_otros_eventos'>
		</div>
		<div class='otros_eventos'>
		</div>				
		<?=get_tags_generos($list_generosdb , $evento['idevento'] , $in_session ); ?>
	</div>	
	<!--Sección Objetos  permitidos termina -->		
	<hr>
	<br>
	<br>
	<div class='col-lg-12'>		
		<div class='eslogan_evento' title='slogan del evento'>			
			<?=show_text_input($evento["eslogan"] , 5  ,  editar_btn($in_session , base_url('index.php/eventos/nuevo/'.$evento['idevento'].'/slogan'   )  ))?>
		</div>		
	</div>
	<hr>	
	

</div>					
<style type="text/css">
	.eslogan_evento{
		background: #232c2d;
		font-size: .9em;
		padding: 10px;
		color: #fffdfd;
	}.eslogan_evento .fa-cog{
		color: white !important; 
	}.especificaciones{
		background: #3C5E79;
	}.dias_restantes{
		font-size: 2em; 
		font-weight: bold;

	}
</style>