<!--inicia la sección principal-->
<div>
	<div>	        		      
		<div class='section-config' id='section-config'>
		</div>		
	</div>
	<div class='seccion_slider_escenario_enid' >
		<div class='place_slider'>
	    </div>
	    <div class='slider-principal-escenario' id='slider-principal-escenario'>                                
	    </div>    
	    
	    <!---->

	    <!---->


	    <div class='separate-enid'>
	    </div>
		<div class='row'>


			<div class='col-lg-12 col-md-12 col-sm-12'>
				<div>											
					<div class='resumen-escenario '>
						<span title='Tipo de escenario'>

						Escenario <?=trim($escenario["tipoescenario"]);?><?=editar_btn($in_session , base_url('index.php/escenario/configuracionavanzada/'. $escenario["idescenario"].'/tipo/#btnGroupVerticalDrop1') )?>
						<?=evalua_fechas_enid_format(fechas_enid_format($escenario["fecha_presentacion_inicio"] , $escenario["fecha_presentacion_termino"] ));?>														
						</span>			
					</div>
				</div> 
				

				<span class='dias_restantes pull-right'>
					<?=$dias_restantes_evento;?>
				</span>
			</div>
		</div>		
	</div>		
	<div class='text-descripcion-escenario'>		
		<?=evalua_desc($escenario["descripcion"] , $in_session , $escenario["idescenario"]  )?>		
	</div>					
	
</div>
<!--termina la sección principal-->
<section class='col-lg-8 col-md-8 col-sm-12'>
	<div class='place_artistas_escenario'>
	</div>
	<div class='artistas_escenario'>
	</div>
</section>





<div class="col-md-4 col-lg-4 seccion_extra" >		
	<div class="panel">
        <div class="panel-body">
            <div class="profile-desk">                
	            <h1>
	                +Del evento
	            </h1>	            	           
				<hr>
	       	     <div class='otros_escenarios'>
	            </div>							
				<hr>
				<div class='col-lg-12 col-md-12 col-sm-12'>					
					<a class='col-lg-6 col-md-6 col-sm-6 link_cliente' href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$evento['idevento']?>">						
						+Las reglas	
					</a>								
					<a class='col-lg-6 col-md-6 col-sm-6 pull-right link_cliente' href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento['idevento']?> ">						
						Tus accesos 						
					</a>
				</div>
            </div>
        </div>
    </div>				
</div>		



































