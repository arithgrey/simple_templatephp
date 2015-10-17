$(document).on("ready", function(){

$("#nombre-empresa-text").click(try_update_nombre);
$("#description-empresa-text").click(try_update_descripcion);
$("#mision-empresa-text").click(try_update_mision);
$("#vision-empresa-text").click(try_update_vision);
$("#años-empresa-text").click(try_update_años);
$("#mas-info-empresa-text").click(try_update_mas_info);

$(".contactos_asociados").click(try_update_medios_contacto);

$("#imgs-empresa").change(upload_main_imgs);
$("#modal-img-logo-empresa").click(clean_img);
	

});

/**/
function try_update_medios_contacto(e){
	
	contacto = e.target.id;
	url = now  + "index.php/api/emp/empresa_contacto/format/json/";
	actualiza_data(url, {"contacto" : contacto});	
	load_contactos_empresa_resumen();
	
}
/**/
function load_contactos_empresa(){
	
	url = now  + "index.php/api/emp/empresa_contacto/format/json/";
	$.get(url).done(function(data){

		
		llenaelementoHTML("#list-contactos",  data);
		$(".contactos_asociados").click(try_update_medios_contacto);


	}).fail(function(){
		alert("Error al cargar la lista ");
	});
}
/**/
function try_update_mas_info(){
	
	showonehideone( "#section-mas-info" , "#mas-info-empresa-text_place" );

	$("#mas-info-empresa-input").blur(function(){

		update_data_emp("mas_info", $(this).val(),  "#mas-info-empresa-text_place" , "#section-mas-info"  );		

	});


}

/**/
function try_update_años(){
	showonehideone( "#años-section" , "#años-empresa-text_place" );



	$("#años-input").change(function(){

		update_data_emp("años", $(this).val(),  "#años-empresa-text_place" , "#años-section"  );		

	});
}	


/**/
function try_update_vision(){

	showonehideone( "#section-vision-empresa" , "#vision-empresa-text_place" );

	$("#descripcion-vision-input").blur(function(){


		
		update_data_emp("vision", $(this).val(),  "#vision-empresa-text_place" , "#section-vision-empresa"  );		

	});


}

function try_update_mision(){


	showonehideone( "#section-mision-empresa" , "#mision-empresa-text_place" );

	$("#mision-empresa-input").blur(function(){
		
		update_data_emp("mision", $(this).val(),  "#mision-empresa-text_place" , "#section-mision-empresa"  );		

	});


}
/**/

function try_update_descripcion(){

	
	showonehideone( "#section-description-empresa" , "#description-empresa-text_place" );

	$("#descripcion-empresa-input").blur(function(){

		update_data_emp("quienes_somos", $(this).val(), "#description-empresa-text_place" , "#section-description-empresa"   );		

	});

}


/**/
function try_update_nombre(){


	showonehideone("#nombre-empresa-section" , "#nombre-empresa-text" );
	$("#nombre-empresa-input").blur(function(){

		update_data_emp("nombreempresa", $(this).val(), "#nombre-empresa-text" , "#nombre-empresa-section" );		

	});

}

/**/

/**/
function update_data_emp(q ,val , muestra, oculta ){	

	
	url = now +"index.php/api/emp/q/format/json/";
	
	/*El actualizar */

	actualiza_data(url , { "q" : q , "value":  val});	 

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
/**/
function load_contactos_empresa_resumen(){
	
	url = now  + "index.php/api/emp/empresa_contacto_resumen/format/json/";		
	$.get(url).done(function(data){

		llenaelementoHTML("#resumen-num-contactos" , data);
	}).fail(function(){

		alert("Error al cargar resumen de contactos ");
	});


}
/**/
function load_data_empresa(){


	url = now  + "index.php/api/emp/empresa/format/json/";		

	$.get(url).done(function(data){	

		url_nueva_imagen =  now + data[0].base_path_img  + data[0].nombre_imagen;
		
		$("#logo_empresa_img").attr("src", url_nueva_imagen);		
		$("#imgs-empresa").change(upload_main_imgs);

	}).fail(function(){

		alert("Error al cargar la información de la empresa ");
	});



}
/**/
function clean_img(){
	$('#response_img').html('');
	$("#lista-imagene").html("");
}


