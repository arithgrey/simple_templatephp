<!--inicia la sección principal-->
<div>
	<div>	        		      
		<div class='section-config' id='section-config'>
		</div>		
	</div>
	<div class="panel-body fixed-panel"  >
		<?=$slider_principal_escenario;?>			
	</div>		
	<div>				
		<h2> 
			<small>
			Lo que vivirás 
			</small>
		</h2>						
		<span class='text-slogan'>
			<?=$dias_restantes_evento;?>
		</span>				
		<div class='jumbotron'>
			<span  class='text-descripcion-escenario'> 
				<?=$escenario["descripcion"];?>
			</span>						
		</div>		
		<div class='footer_info_esceneario'>											
			<span title='Tipo de escenario'>
			<?=$escenario["tipoescenario"];?>
			</span>
			|
			<span title='fecha del escenenario'>
				<?=fechas_enid_format($escenario["fecha_presentacion_inicio"] , $escenario["fecha_presentacion_termino"] ); ?>														
			</span>			
		</div> 
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
					<?=$generos_tags?>
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
				


<style type="text/css">
	.text-descripcion-escenario{
		font-size: .9em;
	}
	.text-slogan{
		margin-left: 10px;
	}
	.footer_info_esceneario{
		font-size: .8em;
		color: #0E7DBA;
	}
	.seccion_extra{
		background: #353f48;
		padding: 10px;
	}
	.link_cliente{
		background: #032935;
	    padding: 1px;
	    border-radius: 1px;
	    color: white;
	    text-align: center;
	}
	.link_cliente:hover{
		background: #03A9F4;
	  	color: white;
	    text-decoration: none;
	}    
</style>
