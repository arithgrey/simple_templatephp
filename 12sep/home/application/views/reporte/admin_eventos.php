<h2 class='title-enid-resum'>
	Tus últimos eventos
</h2>
<div class='row'>	
	<div class='menu-reportes'>	
		<span class='tab_enid pull-right'>		
		    Tendencias próximamente
		</span>
	    <span class='tab_enid pull-right'>
			Las opiniones próximamente
		</span>
	   	<span class='tab_enid pull-right'>		
		    Eventos por usuario próximamente
		</span>  
	</div>
</div>
<!---->
<div>		
	<input name="fecha_busqueda" value="" id="fecha_busqueda" class='fecha_busqueda' type='hidden'>		  		
	<div class='table_resum_evento'> 
		<div class='place_reporte_evento'>
		</div>
		<div class='reporte_evento'>
		</div>	
	</div>
</div>				
<!---->
<form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">                 
 <input type="hidden" id="datos_a_enviar" name="datos_a_enviar"/>
</form>
<style type="text/css">
.table_resum_evento{
	overflow-x:auto;
	width: 100%;
}
</style>
<!---->
<?=construye_header_modal('more-info-modal', "+ info " );?>
	<div class='place_more_info'>
	</div>
	<div class='place_info'>
	</div>
<?=construye_footer_modal()?>