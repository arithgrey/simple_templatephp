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


					







<section class="works-carousel non-menu">
<div class="cover-container carousel slide default-carousel" data-interval="4000" data-ride="carousel" id="works-carousel">
<div class="carousel-inner">





<div class="item works-carousel__item active" data-color="#d56e56" style="background: #2D7084;">
<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="browser-scene">
<div class="browser">
<div class="browser__bar border-full">
<div class="browser__btn border-full"></div>
<div class="browser__btn border-full"></div>
<div class="browser__btn border-full"></div>
</div>
<div class="browser__body border-left-right">
<img class="retina-img" data-at2x="https://files.netguru.co/uploads/preview_full_retina_1427964152-1427963879-1427963829-innstyle.jpg" src="https://files.netguru.co/uploads/preview_full_1427964152-1427963879-1427963829-innstyle.jpg">
</div>
<a href="/portfolio/innstyle"></a>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="item works-carousel__item" data-color="#4e98c8" style="background: #12ADA2;">
<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="browser-scene">
<div class="browser">
<div class="browser__bar border-full">
<div class="browser__btn border-full"></div>
<div class="browser__btn border-full"></div>
<div class="browser__btn border-full"></div>
</div>
<div class="browser__body border-left-right">
<img class="retina-img" data-at2x="https://files.netguru.co/uploads/preview_full_retina_1427964198-1427963969-1427963875-transterra.jpg" src="https://files.netguru.co/uploads/preview_full_1427964198-1427963969-1427963875-transterra.jpg" >
</div>

</div>
</div>
</div>
</div>
</div>
</div>


</div>
</section>











		
											
									




<div class="main col-md-12">

							<!-- page-title start -->
							
							<div class="separator-2"></div>
							
							<ul class="nav nav-tabs style-1" role="tablist">
								<li class="active"><a style='text-decoration:none;' href="#htab1" role="tab" data-toggle="tab"><i class="fa fa-check"></i>Lo permitido</a></li>
								<li><a href="#htab2" style='text-decoration:none;' role="tab" data-toggle="tab"><i class="fa fa-circle"></i> Politicas del evento</a></li>
								<li><a href="#htab3" style='text-decoration:none;' role="tab" data-toggle="tab"><i class="fa fa-exclamation-triangle"></i>Lo prohibido</a></li>	

							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<button class='btn btn-info edit-status-event pull-right'>
								cuentanos tu historia
								</button>									
								<div class="tab-pane fade in active" id="htab1">
									
								



										<table class='table' border="1">
											<tr class='text-center'>
												<td class='blue-col-enid' rowspan="2">Todo lo que podrás hacer  </td>		
												<td  rowspan="1" colspan="1" >Disfruta la experiencia</td>
												<td colspan="1" >Articulos permitidos</td>
											</tr>
											<tr>
												<td><span style='font-size:.8em'><?=$evento["permitido"]?><span></td>
												<td>	
													<div class="text-center  space-bottom">																													
														<ul class="list-inline">
															<?=$list_obj_permitidos;?>
														</ul>
													</div>						
												</td>
											</tr>
										</table>

										
									
									
								</div>
								<div class="tab-pane fade" id="htab2">
									<!--politicas-->
									<table  class='table text-center' border="1">
									    <tr class='text-cener'>
									        <td class='blue-col-enid' rowspan="2"> Políticas del festival</td>                
									        <td >Disfruta la experiencia</td>
									        <td >Políticas</td>
									    </tr>
									    <tr>
									    	<td><span style='font-size:.8em'><?=$evento["politicas"];?></span></td>
									    	<td><?=$politicas_list;?></td>                       
									    </tr>
									 </table> 
									 <!--Políticas termina-->


									
								</div>
								<div class="tab-pane fade" id="htab3">
									<table  class='table text-center' border="1">
    <tr class='text-cener'>
        <td class='blue-col-enid' rowspan="2">Restricciones del festival</td>                
        <td >Disfruta la experiencia</td>
        <td >Restricciones</td>
    </tr>
    <tr>
    	<td><span style='font-size:.8em'><?=$evento["restricciones"];?></span></td>
    	<td><?=$restricciones_list;?></td>                       
    </tr>
 </table> 

									
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

