<script type="text/javascript" src="<?=base_url('application/js/Organizacion/principal.js')?>"></script>

<div class="jumbotron">

	<div class="bs-callout bs-callout-info" id="callout-labels-inline-block">
   
	<div class='row'>
  		<h1 class='nombre-empresa-text' id='nombre-empresa-text'>

  			<span class="label label-default"> Empresa  <?=$data_empresa["nombreempresa"];?></span>
  		</h1>
  		
  	</div>
  	<!--Editar nombre empresa -->
  	<div class='nombre-empresa-section' id="nombre-empresa-section">
		<div class="input-group">	       
			<span class="input-group-btn">
			    <button class="btn btn-default" type="button">Nombre </button>
			</span>
		    <input type="text" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
	    </div>
	</div>
    <!--Termina la edición  nombre empresa -->


    <div class='row'>

  		<h3 class='description-empresa-text' id='description-empresa-text'>  			
  			<span class="label label-default">Quiénes somos </span>
  		</h3>  		
  		<div id="section-description-empresa" class='section-description-empresa'>
	  		<span class="input-group-addon" id="sizing-addon1">Quiénes somos</span>
	    	<textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3"></textarea>
	    </div>		  
  	</div>


  	<div class='row'>
		

  		<h3 class='misions-empresa-text' id='mision-empresa-text'>
  			
  			<span class="label label-default">Misión </span>
  		</h3> 

  		<div id="section-mision-empresa" class='section-mision-empresa'>
	  		<span class="input-group-addon" id="sizing-addon1">Misión</span>
	    	<textarea class="form-control" id='mision-empresa-input' class='mision-empresa-input' rows="3"></textarea>
	    </div>		  
  	</div>


  	

  	<div class='row'>
		
  		<h3 class='vision-empresa-text' id='vision-empresa-text'>
  			
  			<span class="label label-default">Visión </span>
  		</h3>

  		<div id="section-vision-empresa" class='section-vision-empresa'>
	  		<span class="input-group-addon" id="sizing-addon1">Visión</span>
	    	<textarea class="form-control" id='descripcion-vision-input'
	    	 class='descripcion-vision-input' rows="3"></textarea>

	    </div>		  
  	</div>


  	

  	<div>
		<div class="input-group">	       
			<span class="input-group-btn">
			    <button class="btn btn-default" type="button">Años haciendo historía </button>
			</span>
		    <input type="text" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
	    </div>
	</div>
    
	<div>
		<div class="input-group">	       
			<span class="input-group-btn">
			    <button class="btn btn-default" type="button">Más información</button>
			</span>
		    <input type="text" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
	    </div>
	</div>
    
	<div>
		<div class="input-group">	       
			<span class="input-group-btn">
			    <button class="btn btn-default" type="button">Medios de contacto</button>
			</span>
		    <input type="text" name='nnombre_empresa' class="form-control"   id='nombre-empresa-input'placeholder="Nuevo nombre de la empresa" class='nombre-empresa-input'>
	    </div>
	</div>
    






<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>

	</div>
</div>


<style type="text/css">
.section-description-empresa, #nombre-empresa-section, .section-mision-empresa,.section-vision-empresa {
	display: none;
}
</style>


<div class="input-group input-group-lg">
  
  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
</div>