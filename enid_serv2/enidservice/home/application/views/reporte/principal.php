<div class='container'>
	<!--General INICIA-->
	<div class="panel">
	    <div class="panel-body">
	      	<div class="profile-desk">
				<?=$global;?>                        			
				<!--Cuadro general de la empresa-->
				<div>
					<h5 class='animated infinite pulse' id='load_cuadro_global' style='display:none;'>
		  				Cargando .....
		  			</h5>
		  			<input name="fecha_busqueda" value="" id="fecha_busqueda" class='fecha_busqueda' type='hidden'>		  			
		  			<div class='scroll-horizontal-enid' style='width:100%;'>
		  				<div id='print-section' >
			  				<div  class='cuadro_global_section' id='cuadro_global_section'>
			  				</div>
		  				</div>
		  			</div>		  		
				</div>
				<!---->
	        </div>
	    </div>
	</div>
</div>
<!--General TERMINA-->
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