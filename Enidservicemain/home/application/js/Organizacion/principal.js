$(document).on("ready", function(){



$("#nombre-empresa-text").click(try_update_nombre);
$("#description-empresa-text").click(try_update_descripcion);
$("#mision-empresa-text").click(try_update_mision);
$("#vision-empresa-text").click(try_update_vision);

});

function try_update_vision(){

	showonehideone( "#section-vision-empresa" , "#vision-empresa-text" );

	$("#descripcion-vision-input").blur(function(){


		
		update_data_emp("descripcion_vision", $(this).val(),  "#vision-empresa-text" , "#section-vision-empresa"  );		

	});


}

function try_update_mision(){


	showonehideone( "#section-mision-empresa" , "#mision-empresa-text" );

	$("#mision-empresa-input").blur(function(){


		
		update_data_emp("descripcion_mision", $(this).val(),  "#mision-empresa-text" , "#section-mision-empresa"  );		

	});


}
/**/

function try_update_descripcion(){

	
	showonehideone( "#section-description-empresa" , "#description-empresa-text" );

	$("#descripcion-empresa-input").blur(function(){


		
		update_data_emp("descripcion_empresa", $(this).val(), "#description-empresa-text" , "#section-description-empresa" );		

	});

}


/**/
function try_update_nombre(){


	showonehideone("#nombre-empresa-section" , "#nombre-empresa-text" );
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


