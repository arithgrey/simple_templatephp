<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link href="<?=base_url('application/tema/fonts/fontello/css/fontello.css')?>" rel="stylesheet">




<div id="carousel-blog-post" class="carousel slide" data-ride="carousel">	
	<?=$slider_principal_escenario;?>	
</div>
<!---->
<div class='row'>
	<div class="col-md-12">
		<div class='blue-col-enid' style='padding: 25px;'>
		
			<h1 class=""><a href="#"><?=$escenario["nombre"];?></a></h1>
			<h3 class="title" style='color:white;'>Lo que vivirás </h3>				
				<span> <?=$escenario["descripcion"];?></span>						
			<div class="pull-right">Escenario <?=$escenario["tipoescenario"];?>    |  <?=$escenario["fecha_presentacion_inicio"]?>  - <?=$escenario["fecha_presentacion_termino"]?> </div> 
		</div>	
	</div>
</div>


					<div class="row">
						<div class="main col-md-7">
							<h1 class="page-title">Artistas</h1>


							
							
							<?=$artistas_info;?>
							

							<article>


								<div class='row'>

<div class='col-xs-12  col-sm-12 col-md-12 col-lg-12'>
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
</div>							
<a href="#" class="btn btn-default col-xs-12  col-sm-12 col-md-4 col-lg-4">
	<i class="fa fa-cloud-download"></i>
 lleva contigo el horario</a>	

</div>


							</article>

							<!-- blogpost end -->


							
						</div>
						<!-- main end -->

						<!-- sidebar start -->
						<!-- ================ -->
						<aside class="col-md-5 col-lg-5 section-more-events" >
							<div class="sidebar">
								
								<?=$generos_tags?>
								<div class="block clearfix">
									
									<div class="separator-2"></div>
									<?=$otros_escenarios;?>
									
								</div>
								


								
							</div>
						</aside>
						<!-- sidebar end -->

					</div>
				























	

	<style type="text/css">
	.title_main{
		display: none;
	}
	#carousel-blog-post{
		margin-top: -80px;
	}
	#section_escenario_principal{
		background: white !important;
	}
	.section-more-events{
		background: #DEE8EC none repeat scroll 0% 0%;
	}
	</style>
