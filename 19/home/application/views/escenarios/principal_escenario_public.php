

<!--inicia la sección principal-->
<div>

	<div>	        		      
		<div class='section-config' id='section-config'>
		</div>		
	</div>
	<div class="panel-body fixed-panel"  >
		<?=$slider_principal_escenario;?>			
	</div>		
	<div >				
		<h2>
				Lo que vivirás 
		</h2>						
		<span class='col-lg-12 col-md-12 col-sm-12'>
			<?=$dias_restantes_evento;?>
		</span>
		<div class='col-lg-12 col-md-12 col-sm-12'>
			<strong>
				<span class='pull-right' >
					<a href="<?=base_url('index.php/eventos/visualizar/')?>
							/
						<?=$evento['idevento']?>" style='color:#0A3F48;'>
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
				Escena<?=$escenario["tipoescenario"];?>
				|
				<?=$escenario["fecha_presentacion_inicio"]?>
				- 
				<?=$escenario["fecha_presentacion_termino"]?> 
			</strong>
		</div> 
	</div>						
</div>

<!--termina la sección principal-->








<!--Inicia sección izquieda, artistas-->
<div class="col-md-8">
	<div class="panel">
        <div class="panel-body">
            <div class="profile-desk">
                <h1>
                   	Artistas del escenario
                </h1>

                <hr>
                <?=$artistas_info;?>
                <!--Horarios inicia-->
			<article>										
				<div class='print-section' id="print-section">
					<table  class="table table-colored" >
						<thead>
							<tr>
								<th>
									# 
								</th>
								<th> 
									Artista 
								</th>
								<th> 
									Inicia  
								</th>
								<th> 
									Termina 
								</th>
							</tr>
						</thead>
						<tbody>
							<?=$artitas;?>
						</tbody>
					</table>								
							
				<form action="<?=base_url('index.php/excel_export')?>" method="GET"  id="FormularioExportacion">
					<button class='botonExcel btn btn-default pull-right'> 
							Lleva contigo el horario  
						<i class="fa fa-cloud-download">
						</i> 
					</button>  				                
					<input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
				</form>									
				</div>	
			</article>
			<!--Horarios termina-->	              	        
            </div>
        </div>
    </div>				
</div>
<!--Termina sección izquieda, artistas-->






<div class="col-md-4 col-lg-4" >		
	<div class="panel">
        <div class="panel-body">
            <div class="profile-desk">                
	            <h1>
	                +Del evento
	            </h1>
	            	           
				<hr>
				<?=$generos_tags?>
	            <hr>			
				<?=$otros_escenarios;?>
				<hr>
				<div class='col-lg-12 col-md-12 col-sm-12' style='font-size:.9em;'>
					<a class='col-lg-6 col-md-6 col-sm-6' href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$evento['idevento']?> ">
						<span >
							+Las reglas						
							<?=$evento["nombre_evento"]?>				
						</span>
					</a>								
					<a class='col-lg-6 col-md-6 col-sm-6 ' href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento['idevento']?> ">
						<span class='pull-right;'>
							Tus accesos 
						</span>
					</a>
				</div>

				
				

            </div>
        </div>
    </div>				

</div>
				


