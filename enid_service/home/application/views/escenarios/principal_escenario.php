<?=ini_set('display_errors', '1');?>
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
	        			
	        		</h4>
	        </div>
	        <div class="panel-body fixed-panel" style='background:#0F3A48;' >
				<?=$slider_principal_escenario;?>			
	        </div>

			<div class='row' style='margin-top:-17px;' >
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div  style='padding: 15px; background:#D8DD8F !important'>				
							<h2>Lo que vivirás </h2>						
							<span class='col-lg-12 col-md-12 col-sm-12'>
								<?=$dias_restantes_evento;?>
							</span>

							<div class='col-lg-12 col-md-12 col-sm-12'>
								<strong>
									<span class='pull-right' >
										<a href="<?=base_url('index.php/eventos/visualizar/')?>/<?=$evento['idevento']?>" style='color:#0A3F48;'>
											<?=$evento["nombre_evento"]?>				
										</a>
									</span>
								</strong>
							</div>
							<span> 
								<?=$escenario["descripcion"];?>
							</span>						
							<div class="pull-right">
								<strong>
									Escenario <?=$escenario["tipoescenario"];?>
									|
									<?=$escenario["fecha_presentacion_inicio"]?>
									- 
									<?=$escenario["fecha_presentacion_termino"]?> 
								</strong>
							</div> 
					</div>	
				</div>
			</div>
	  </div>	  
  </div>
</div>
<!---->
<br>
	<div class="main col-md-7">





			<div class='col-lg-12 col-md-12 col-sm-12'>
				<h3 class="page-title">Artistas</h3>						
			</div>		
			<div class='col-lg-12'>
				<?=$artistas_info;?>	
			</div>						
			<article>
				<div class='row'>	
					
					<div class='col-lg-12' id="">											
						<br>
						<div class='print-section' id="print-section">
							<table  class="table table-colored" >
															<thead  >
																<tr>
																	<th> # </th>
																	<th> Artista </th>
																	<th> Inicia  </th>
																	<th> Termina </th>
																</tr>
															</thead>
															<tbody>
																<?=$artitas;?>
															</tbody>
							</table>								
						</div>				
						<form action="<?=base_url('index.php/excel_export')?>" method="GET"  id="FormularioExportacion">
				                <button class='botonExcel btn btn-default pull-right col-lg-4 '  > Lleva contigo el horario  <i class="fa fa-cloud-download"></i> </button>  				                
				                <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
				        </form>						
					</div>					

				</div>
			</article>
						
	</div>
	<div class="col-md-5 col-lg-5 section-more-events" >


		
		<div class='row'>	
		<a  class='col-lg-12' style='background: #0F272C !important; padding:10px ;  
			color: white!important; font-size:1.4em;' href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$evento['idevento']?> "><span style="width;100% !important; ">
			+ del info del evento 							
			<?=$evento["nombre_evento"]?>				
		</a>			
		</div>



		<div class='row'>	
			<a  class='col-lg-12 col-md-sm' style='background:#F6E66A; padding:10px !important;  color: #0F272C !important; font-size:1.4em;' href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento['idevento']?> ">
				<span style="width;100% !important; ">
					Consigue tus accesos 
				</span>
			</a>			
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
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal_cliente.js')?>"></script>
