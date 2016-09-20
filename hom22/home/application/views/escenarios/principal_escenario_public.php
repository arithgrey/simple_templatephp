	
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
		<div class='part_desc_'>



			<span class='resumen-a'>
				<?=editar_btn($in_session , base_url('index.php/escenario/configuracionavanzada/'. $escenario["idescenario"].'/tipo/#btnGroupVerticalDrop1') )?>
			</span>
			<span class='resumen-b'>
				<?=evalua_fechas_enid_format(fechas_enid_format($escenario["fecha_presentacion_inicio"] , $escenario["fecha_presentacion_termino"] ));?>																		
			</span>
			<span class='resumen-c'>
				<?=trim($escenario["tipoescenario"]);?>
			</span>			
		</div>

		
		<div class='dias_restantes'>
			<?=valida_reservaciones_public(
	            $in_session ,
	            $evento["reservacion_tel"] ,
	            $evento["reservacion_mail"] , 
	            base_url('index.php/eventos/nuevo')."/".$evento['idevento']."/reservaciones/"
	        )?>
        
			<span class=''>
				<?=$dias_restantes_evento;?>
			</span>
			<span>
				Adquiere tus accesos
			</span>			
		</div>

	</div>						
	<!---->
    <div class='col-lg-12 col-md-12 col-sm-12'>                    
         <span class='text-title-enid'>
            Lo que vivirás
         </span>               
    </div> 
    <!---->
    <div class='col-lg-12 col-md-12 col-sm-12'>
    	<?=evalua_desc($escenario["descripcion"] , $in_session , $escenario["idescenario"] )?>		                             
        <div class='resumen-escenario'>				
		</div>
    </div>   
</div>
<hr>
<div class='seccion-down'>
	<!--termina la sección principal-->
	<section class='col-lg-8 col-md-8 col-sm-12'>
		<div class='row'>
			<div class='col-lg-12 col-md-12 col-sm-12 '>
				<div class='place_artistas_escenario'>
				</div>
				<div class='artistas_escenario'>
				</div>
			</div>				
		</div>		
	</section>
	<div class="col-md-4 col-lg-4 seccion_extra" >				       
		<div class='otros_escenarios'>
		</div>													    
	</div>		
</div>


















































