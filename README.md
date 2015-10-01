

<div class="jumbotron">
	<div class="bs-callout bs-callout-info" id="callout-labels-inline-block">
   
	<div class='row'>
  		<h1 class='nombre-empresa-text' id='nombre-empresa-text'>text ok</h1>
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
  		<p class='description-empresa-text' id='description-empresa-text'>text</p>  		


  		<div id="section-description-empresa" class='section-description-empresa'>
	  		<span class="">Información</span>
	    	<textarea class="form-control" id='descripcion-empresa-input' class='descripcion-empresa-input' rows="3"></textarea>
	    </div>	
	  	


  	</div>

	</div>
</div>






/*****************************************************************/
$("#nombre-empresa-text").click(try_update_nombre);
$("#description-empresa-text").click(try_update_descripcion);

/**/


function try_update_descripcion(){

	$("#description-empresa-text").hide();
	$("#section-description-empresa").show();

	$("#descripcion-empresa-input").blur(function(){

		update_data_emp("descripcion_empresa", $(this).val(), "#description-empresa-text" , "#section-description-empresa" );		

	});

}


/**/
function try_update_nombre(){

	$("#nombre-empresa-text").hide();
	$("#nombre-empresa-section").show();

	$("#nombre-empresa-input").blur(function(){

		update_data_emp("nombre_empresa", $(this).val(), "#nombre-empresa-text" , "#nombre-empresa-section" );		

	});

}

/**/

/**/
function update_data_emp(q ,val, muestra, oculta ){	

	now ="some";
	url = now + "index.php/controlers/api/empresa/format/json/";

	/*El actualizar */

	/*Cuando la respuesta es true */
	$(muestra).html(validate_text(val));		
	$(oculta).val(validate_text(val));
	$(muestra).show();
	$(oculta).hide();
}
/*validate texto*/
function validate_text(text){
    return text.replace(/^\s+|\s+$/gm,'');
}
