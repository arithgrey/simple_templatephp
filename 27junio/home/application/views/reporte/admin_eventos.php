<br>
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




<br>
<br>
<div>	
	<div class="animationload" id='load_cuadro_global' style='display:none'>
        <div class="osahanloading">
        </div>
    </div>
	<input name="fecha_busqueda" value="" id="fecha_busqueda" class='fecha_busqueda' type='hidden'>		  				
	<div id='print-section' >

		<div class='linea_tiempo_section' id='linea_tiempo_section'>
		</div>

		<div  class='cuadro_global_section' id='cuadro_global_section'>
		</div>
	</div>
		  		
</div>				


<script type="text/javascript" src="<?= base_url('application/js/reportes/principal_home.js')?>"></script>
<style type="text/css">
	.mostrar-abreviaturas:hover ,  .ocultar-abreviaturas:hover{
		padding: 1px;
		cursor:pointer;
	}
	.botonExcel{
		cursor: pointer;
	}
	.section-header-title{
		display: none;
	}
	.f_busqueda:hover{
		cursor: pointer;
	}
</style>
<form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">                 
 <input type="hidden" id="datos_a_enviar" name="datos_a_enviar"/>
</form>






























