
	<style type="text/css">	
		#section_escenario_principal{
			background: white !important;
		}
		.section-more-events{
			background: #DEE8EC none repeat scroll 0% 0%;
		}
		.title_main{
			display: none;
		}
	</style>
<div class='row'>
	<div class="col-lg-12">
	 <div class="panel panel-primary">
	        <div class="panel-heading" >	        		      
	        		<h4>
	        			<a href="<?=base_url('index.php/escenario/configuracionavanzada/');?>/<?=$evento["idevento"]?>">
	        			   »» <?=$escenario["nombre"];?> <i class="fa fa-pencil-square-o"></i>
	        			</a>
	        			<a href="<?=base_url('index.php/eventos/visualizar/');?>/<?=$escenario["idescenario"]?>">
	        			 	<span class='pull-right'> <?=$evento["nombre_evento"]?></span> 
	        			</a>
	        		</h4>
	        </div>
	        <div class="panel-body fixed-panel" style='background:#0F3A48;' >
				<?=$slider_principal_escenario;?>			
	        </div>

			<div class='row' style='margin-top:-17px;' >
				<div class="col-lg-12">
					<div  style='padding: 15px; background:#D8DD8F !important'>				
							<h3  >Lo que vivirás </h3>						
							<span> <?=$escenario["descripcion"];?></span>						
							<div class="pull-right">Escenario <?=$escenario["tipoescenario"];?>    |  <?=$escenario["fecha_presentacion_inicio"]?>  - <?=$escenario["fecha_presentacion_termino"]?> </div> 
					</div>	
				</div>
			</div>
	  </div>	  
  </div>
</div>
<!---->
<br>
	<div class="main col-md-7">
			<div class='col-lg-12'>
				<h3 class="page-title">Artistas</h3>						
			</div>		
			<div class='col-lg-12'>
				<?=$artistas_info;?>	
			</div>						
			<article>
				<div class='row'>	
					
					<div class='col-lg-12'>											
						<br>
						<table class="table table-colored">
														<thead>
															<tr>
																<th>#</th>
																<th>Nombre</th>
																<th>Inicia</th>
																<th>Termina</th>
															</tr>
														</thead>
														<tbody>
															<?=$artitas;?>
														</tbody>
						</table>												
						<a href="#" class="btn btn-default col-lg-4"><i class="fa fa-cloud-download"></i> Lleva contigo el horario</a>	
					</div>					
				</div>
			</article>
						
	</div>
	<div class="col-md-5 col-lg-5 section-more-events" >


		<div class='row'>
			
				<a  class='col-lg-12' style='background:rgb(225, 43, 37); padding:10px !important;  color:white !important; font-size:1.4em;' href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento['idevento']?> "><span style="width;100% !important; ">Consigue tus accesos </span></a>
			
		</div>
		<div class='row'>
			<?=$generos_tags?>
		</div>
		<div class="block clearfix">									
			<div class="separator-2"></div>
				<?=$otros_escenarios;?>
		</div>															
							
	</div>
						
</div>
				



	

<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link href="<?=base_url('application/tema/fonts/fontello/css/fontello.css')?>" rel="stylesheet">