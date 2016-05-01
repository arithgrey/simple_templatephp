<div class="container">

	<!--SERVICIOS INCLUIDOS EN EL EVENTO-->
	<div>
		<?=$servicios_incluidos;?>
	</div>
	<!--TERMINA SERVICIOS INCLUIDOS EN EL EVENTO-->
	<hr>
	<div>
		<h3 class='text-center' >
			<?=$evento["eslogan"]?>
		</h3>
	</div>


	<hr>
	<ul class="nav nav-tabs style-1" role="tablist">
		<li class="">
			<a href="<?=base_url('index.php/eventos/visualizar')?>/<?=$evento['idevento']?>" >
				<i class="fa fa-home">
				</i>
				Evento 
				<?=$evento["nombre_evento"]?>
			</a>
		</li>		
		<li class="active">
			<a style='text-decoration:none; color:black;' href="#htab1" role="tab" data-toggle="tab">
				<i class="fa fa-check">
				</i>
				Lo permitido
			</a>
		</li>
		<li class='politicas-section'>
			<a href="#htab2"  role="tab" data-toggle="tab" >
				<i class="fa fa-circle ">
				</i>
				Politicas del evento
			</a>
		</li>
		<li class='restricciones-section' >
			<a href="#htab3" style='text-decoration:none; color:black;' role="tab" data-toggle="tab">
				<i class="fa fa-exclamation-triangle">
				</i>
				Lo prohibido
			</a>
		</li>	
		<li class='section-edit' id="section-edit">
			<a href="<?=base_url('index.php/eventos/nuevo/')?>/<?=$evento['idevento']?>" style='text-decoration:none; color:black;'>
				<i class='fa fa-pencil-square-o'>
			</i>
				Editar
			</a>
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content ">
		<div class="tab-pane fade in active"  id="htab1">									

<!--Sección izquierda -->
			<div class="col-md-8">
                <div class="row">                        
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states ">                            	
		                      	<div class="panel">
		                          	<div class="">
		                              	<h4>
		                                	La mejor experiencia 
		                              	</h4>
			                           	<hr>
			                          	<div class="panel-body">			                          		
			                          		<div  class='scroll-vertical-enid' style='width:100%; height:400px;'>				                             	
				                              	<?=$evento["permitido"]?>		 				                             	
			                             	</div>
			                             	<hr>
			                          	</div>
			                      	</div>
			                  	</div>   	                            
                        	</div>
                    	</div>                        
                	</div>
            	</div>
            </div>
<!--Termina Sección izquierda -->

			<div class="col-md-4">
				<div class="row">                        
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states ">
                                <div class="summary pull-left">
                                    <h4>
                                    Artículos permitidos
                                    </h4>
                                 <hr>
		                            <?=$list_obj_permitidos;?>     		                            
                                </div>                                    
                            </div>
                        </div>
                    </div>                        
                </div>
			</div>
</div>			
		<div class="tab-pane fade" id="htab2">
			<!--politicas-->
			


			<div class="col-md-8">
				<div class="row">                        
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states ">
                                <div class="summary pull-left">
                                    <h4>
                                   	+ Detalles 
                                    </h4>
                                 <hr>
                                <div class='list-politicas' id='list-politicas'></div>                                 
                                </div>                                    
                            </div>
                        </div>
                    </div>                        
                </div>
			</div>
			<!--Sección izquierda -->
			<div class="col-md-4">
                <div class="row">                        
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states ">                            	
		                      	<div class="panel">
		                          	<div class="">
		                              	<h4>
		                                	Las politicas del evento
		                              	</h4>
			                           	<hr>
			                          	<div class="panel-body">
			                             	<span>
			                              		<?=$evento["politicas"]?>		 
			                             	</span>
			                             	<hr>
			                          	</div>
			                      	</div>
			                  	</div>   	                            
                        	</div>
                    	</div>                        
                	</div>
            	</div>
            </div>
<!--Termina Sección izquierda -->



			<!--Políticas termina-->
		</div>
		<div class="tab-pane fade" id="htab3">




			<div class="col-md-8">
				<div class="row">                        
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states ">
                                <div class="summary pull-left">
                                    <h4>
                                   	+ Detalles 
                                    </h4>
	                                <hr>
	                                <div class='list-restricciones' id='list-restricciones'></div>
                                 
                                </div>                                    
                            </div>
                        </div>
                    </div>                        
                </div>
			</div>

			<!--Sección izquierda -->
			<div class="col-md-4">
                <div class="row">                        
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-body p-states ">                            	
		                      	<div class="panel">
		                          	<div class="">
		                              	<h4>
		                                	Las restricciones dentro del evento
		                              	</h4>
			                           	<hr>
			                          	<div class="panel-body">
			                             	<span style='font-size:.8em;'>
			                              		<?=$evento["restricciones"];?>
			                             	</span>
			                             	<hr>
			                          	</div>
			                      	</div>
			                  	</div>   	                            
                        	</div>
                    	</div>                        
                	</div>
            	</div>
            </div>
			<!--Termina Sección izquierda -->

			



			

			
		</div>
	</div>					
</div>
						












<!---
						<center>
							<h2> <?=$dias_restantes_evento;?></h2>
						</center>


						<center>
							<h3>
								Servicios incluidos
							</h3>	
							<ul class="revenue-nav">
								<?=$list_servicios_incluidos;?>
							</ul>
						</center>

-->




<style type="text/css">
.descripcion-objeto-permitido{
position: absolute; /*Info sobre la imagen*/
top: 5%;
left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
zoom: 1;
filter: alpha(opacity=0); /*Opacidad Para IE */
opacity: 0; /*Inicialmente transparente */
padding: 5px;
color: white;
background: black;
-moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
-webkit-transition:all ease .8s ;
transition:all ease .8s;
}
.objeto-permitido-evento:hover .descripcion-objeto-permiti|{
filter: alpha(opacity=80);
opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
}
.section-header-title{
	display: none;
}
</style>





<input type='hidden' id='idevento' value="<?=$evento["idevento"];?>">
<link href="<?=base_url('application/tema/plugins/rs-plugin/css/settings.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/plugins/owl-carousel/owl.transitions.css')?>" rel="stylesheet">
<link href="<?=base_url('application/tema/css/style.css')?>" rel="stylesheet" >
<link rel="stylesheet" type="text/css" href="<?=base_url('application/tema/style-switcher/style-switcher.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/template/css/skins/light_blue.css')?>">
<script type="text/javascript" src="<?=base_url('application/js/evento/client/dia_evento.js')?>"></script>

