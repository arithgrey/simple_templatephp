<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link rel="stylesheet" type="text/css" href="<?=base_url('application/tema/style-switcher/style-switcher.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/template/css/skins/light_blue.css')?>">
<script type="text/javascript" src="<?=base_url('application/tema/plugins/modernizr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/plugins/owl-carousel/owl.carousel.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/tema/js/template.js')?>"></script>

					

















<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							<h1 class="page-title">El día del evento </h1>
							<div class="separator-2"></div>
							
							<ul class="nav nav-tabs style-1" role="tablist">
								<li class="active"><a style='text-decoration:none;' href="#htab1" role="tab" data-toggle="tab"><i class="fa fa-check"></i>Lo permitido</a></li>
								<li><a href="#htab2" style='text-decoration:none;' role="tab" data-toggle="tab"><i class="fa fa-circle"></i>Politicas del evento</a></li>
								<li><a href="#htab3" style='text-decoration:none;' role="tab" data-toggle="tab"><i class="fa fa-exclamation-triangle"></i>Lo prohibido</a></li>	

							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="htab1">
									
									<div class="row">

										<div class="col-md-8">
											<h3>Todo lo que podrás hacer </h3>
											<p>	<?=$evento["permitido"]?></p>
										</div>
										<div class="col-md-4">
											<!--************************* -->
											<center>
											<h3>Qué que podrás llevar </h3>
											</center>
											

											<div class="text-center  space-bottom">																													
												<ul class="list-inline">
													<?=$list_obj_permitidos;?>
												</ul>
											</div>						


											<!--**************************-->
										</div>
									</div>
									
								</div>
								<div class="tab-pane fade" id="htab2">
									<h3>Políticas del festival</h3>
									<div class="row">
										<div class="col-md-12">
											<p><?=$evento["politicas"];?></p> 
										</div>
									</div>
									
								</div>
								<div class="tab-pane fade" id="htab3">
									<h3>Reglas dentro del evento </h3>
									<div class="row">
										<div class="col-md-12">											
											<p><?=$evento["restricciones"];?></p> 
										</div>
									</div>
									
								</div>
							</div>
							
							<!-- pills end -->
						</div>






















							<ul class="social-links dark circle">
								<li><a target="_blank" href=""><i class="fa fa-facebook"></i></a></li>								
								<li><a target="_blank" href=""><i class="fa fa-google-plus"></i></a></li>
								
							</ul>




<center>
	<h3>Servicios incluidos</h3>
	
	<ul class="revenue-nav">
		<?=$list_servicios_incluidos;?>
	</ul>
</center>


<!--***********************************INICIA SERVICIOS MODAL  *************************-->
  <?php $this->load->view("eventos/modal_config_event_template");?>
<!--***********************************TERMINA SERVICIOS MODAL  *************************-->
