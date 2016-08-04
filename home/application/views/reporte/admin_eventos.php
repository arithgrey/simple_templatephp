<div class='separate-enid'>
</div>

<div class="btn-group pull-right">
	<a href="<?=base_url('index.php/tendencias')?>">
		<button type="button" class="btn btn-primary btn-sm">
	     <i class="fa fa-line-chart">
	     </i> 
	    Tendencias
	    </button>
    </a>
    <a href="<?=base_url('index.php/tendencias/comunidad')?>">
	    <button type="button" class="btn btn-primary btn-sm">
	     <i class="">
	     </i> 
	     Las opiniones
	    </button>
    </a>
    <a href="<?=base_url('index.php/tendencias/eventosporusuario')?>">
	    <button type="button" class="btn btn-primary btn-sm">
	     <i class="fa fa-users">
	     </i> 
	     Eventos por usuario
	    </button>    
    </a>
</div>

<div class='separate-enid'>
</div>
<div class='separate-enid'>
</div>
<div>		
	<input name="fecha_busqueda" value="" id="fecha_busqueda" class='fecha_busqueda' type='hidden'>		  					
	<div class='place_reporte_evento'>
	</div>
	<div class='reporte_evento'>
	</div>
	
</div>				

<form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">                 
 <input type="hidden" id="datos_a_enviar" name="datos_a_enviar"/>
</form>