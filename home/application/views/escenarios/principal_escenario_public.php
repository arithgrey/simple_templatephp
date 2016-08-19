<!--inicia la sección principal-->
<div class='row'>
	<div class='col-lg-12  col-ms-12 col-sm-12'>		
		<div class='seccion_slider_escenario_enid' >
			<div class='place_slider'>
		    </div>
		    <div class='slider-principal-escenario' id='slider-principal-escenario'>                                
		    </div>    	    
		    <div class='separate-enid'>
		    </div>			
		</div>	
		<section>
			<span class='dias_restantes pull-right '>
				<?=$dias_restantes_evento;?>, adquiere tus accesos
			</span>
		</section>			
        <section>
            <div class="container">            	
                <h1>
                	La historia la haces tu
                </h1>
                <p>
                	<?=evalua_desc($escenario["descripcion"] , $in_session , $escenario["idescenario"]  )?>		
                </p>                
                <div class='resumen-escenario '>
					<span title='Tipo de escenario'>
					<?=trim($escenario["tipoescenario"]);?>
					<?=editar_btn($in_session , base_url('index.php/escenario/configuracionavanzada/'. $escenario["idescenario"].'/tipo/#btnGroupVerticalDrop1') )?>
					<?=evalua_fechas_enid_format(fechas_enid_format($escenario["fecha_presentacion_inicio"] , $escenario["fecha_presentacion_termino"] ));?>														
					</span>			
				</div>													
            </div>
        </section>       
        <hr>
	</div>						
</div>
<div class='seccion-down'>
	<!--termina la sección principal-->
	<section class='col-lg-8 col-md-8 col-sm-12'>
		<div class='place_artistas_escenario'>
		</div>
		<div class='artistas_escenario'>
		</div>
	</section>
	<div class="col-md-4 col-lg-4 seccion_extra" >				       
		<div class='otros_escenarios'>
		</div>													    
	</div>		
</div>


















































