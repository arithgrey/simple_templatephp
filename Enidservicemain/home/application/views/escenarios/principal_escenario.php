<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link href="<?=base_url('application/tema/fonts/fontello/css/fontello.css')?>" rel="stylesheet">





<div class='col-xs-12  col-sm-12 col-md-9 col-lg-9'>


			<div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="blog-img-sm">
                            	<!---->

                                <!---->
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 class=""><a href="#"><?=$escenario["nombre"];?></a></h1>
                            <p class=" auth-row">
                               <i class="fa fa-spinner"></i>
 Escenario <?=$escenario["tipoescenario"];?>    |  <?=$escenario["fecha_presentacion_inicio"]?>  - <?=$escenario["fecha_presentacion_termino"]?>  
                            </p>

                            <p>
                            	<?=$escenario["descripcion"];?>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>


<h1><i class="fa fa-clock-o"></i>
 Horarios</h1>
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

</div>		


<!--right right rightrightright  right-->
<div class='col-xs-12  col-sm-12 col-md-3 col-lg-3'>


			<section class="section default-bg clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="call-to-action text-center">
								<div class="row">
									<div class="col-sm-12">
										<h1 class="title pull-left">+ Servicios</h1>										
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div class='section-escenarios'>
			<?=$otros_escenarios;?>
			</div>


</div>




<style type="text/css">

.bloc_escenario_desc{
	//background: black;
}
</style>