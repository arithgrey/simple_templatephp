<div class="container">    
	<a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_empresa["idempresa"]?>" class='link-org'>
	   <?=$data_empresa["nombreempresa"]?>
	</a>	
	<div>	        	
	  <form class='form-historia' id='form-historia'  action="<?=base_url('index.php/api/emp/laexperiencia/format/json/');?>" >                
		<center id="section-cal">		            
			<div class='col-md-12'>
				<h4 id='section-start-calificaciones'>
				    Califícanos.!
				</h4>     
				<div id='enid-service-start' class='enid-service-start'>
				</div>
				<input type='hidden' value='0' class='calificacion_cliente' name='calificacion_cliente'>
				<input type='hidden' name='emp' id="emp" value="<?=$data_empresa["idempresa"]?>"> 
				<div id="contenidor-ranking" > 
				 <?=get_inputs_starts(5)?>			           
				</div>
				<div class='place_val_estrellas'>
				</div>                                   
		    </div>
		</center>   
			<div>
			    <div class="col-lg-8 col-lg-offset-2 text-center">	                
			        <hr class="primary">
			        <p>
			         	Estamos agradecidos de que  compartas tus experiencias, con esto mejoraremos tus servicios.
			        </p>
			    </div>
			    <div class="col-lg-10 col-lg-offset-1 text-center">	              
				    <div class="col-md-4">	                        
				        <input type="text" class="form-control" name='nombre_cliente' id='nombre_cliente' placeholder="Nombre (opcional)">
				    </div>
				    <div class="col-md-4">	                        
				        <input type="email" class="form-control" name='email_cliente' id='email_cliente' placeholder="Tu email" required>
				    </div>
				    <div class="col-md-4">	                        
				        <input type="tel" class="form-control" name='tel_cliente'  id='tel_cliente' placeholder="Tel" >
				    </div>
				    <div class='separate-enid'>
				    </div>
				    <div class="col-md-12">	                        
				        <textarea id="descripcion" name="descripcion" id='descripcion'   class="form-control" rows="6" placeholder="Cuentanos tu experiencia" required>
				        </textarea>
				        <div class='place_val_descripcion'>
				        </div>
				    </div>
				    <div class="col-md-4 col-md-offset-4">
				        <div class='row'>
				          <div class='place_experiencia'>
				          </div>
				        </div>
				        <div class='separate-enid'>
				        </div>
				        <button type="submit"  class="btn btn-default btn_save">
				            Registrar
				        </button>	                      
				    </div>
			    </div>
		    </div>                                                                          
		</form>
	</div>
</div>

<div class='separador-exp'></div>
<hr>
<div class='row'>	
	<div class='col-lg-8 col-lg-offset-2 text-center'>
		<div class='place_comentarios'>
		</div>
	</div>	
</div>
<style type="text/css">
.section-experiencia-cliente{
  display: none;
}
.descripcion-section-q{
  background: #E4E6AC;
}
#form p {
  text-align: center;
}
input[type="radio"] {
  display: none;
}
label {
  color: #337AB7;
  font-size: 2.5em;
}
.clasificacion {
  direction: rtl;
  unicode-bidi: bidi-override;
}
label:hover,
label:hover ~ label {
  color: #E8DBC2;
}
input[type="radio"]:checked ~ label {
  color: #E8DBC2;
}
.pais_empresa_input{
  display: none;
}
.title_main{
  display: none;
}
.contactos-sec:hover{
  padding: 10px;
  cursor: pointer;
}
.status-registro{
  display: none;
}
#telefono-info:hover{
  cursor: pointer;
}
.web_link{
  color: white;
}
.main_section_emp{
  background: #0F272C !important;
}
.well{
  background: white !important; 
}
.solicitud-artista-section{
  display: none;
}
.principal-contenido-historia{
  display: none;
}
.profile-desk{
	display: none;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/Organizacion/experiencia.js')?>"></script>








<style type="text/css">
	.msj-calificanos{
		font-size: .9em;
		background: #2199e8;		
		color: white;
		padding: 10px;		
	}	
	.separador-exp{
		margin-top: 19%;
	}
</style>