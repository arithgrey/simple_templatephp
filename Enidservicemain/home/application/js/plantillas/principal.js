$(document).on("ready", function(){
	$("#nueva-descripcion-template").submit(registra_plantilla_descripcion);
	$("#new-restriccion-form").submit(registra_restriccion);
	$(".restriccion-section").click(load_restricciones_templ_data);
});

/*Registro de plantilla descripción de eventos */
function registra_plantilla_descripcion(){

	url = now + "index.php/api/templ/templates_descripcion_evento/format/json/";	

	registra_data( url ,  $("#nueva-descripcion-template").serialize() );
	load_descriptions();	
	clean_form_contenido();

	
	return false;

}
/*Limpiar el registro más respuesta al cliente del estatus */
function clean_form_contenido(){


	$("#nombre-tmpl").val("");
	$("#titulo-contenido-tmpl").val("");
	$("#descripcion-contenid-templ").val("");	
}

function load_descriptions(){
	


	url = now + "index.php/api/templ/templates_contenidos/format/json/";	
	$.get(url , { tipo : 1 }).done(function(data){
		
		 document.getElementById("list-templ-descripcion").innerHTML="";
		 $(".list-templ-descripcion").append( data );


	}).fail(function(){
		alert(genericresponse[0]);
	});
}
/*Registramos la restriccion*/
function registra_restriccion(){

	url = now + "index.php/api/templ/templates_restriccion/format/json/";	
	registra_data( url , $("#new-restriccion-form").serialize() );
	load_restricciones_templ_data();
	
	$("#restriccion_text").val("");
	return false;
}
/***/
function load_restricciones_templ_data(){
	
	url = now + "index.php/api/templ/templates_restriccion/format/json/";	
	$.get(url).done(function(data){
		document.getElementById("restricciones-user").innerHTML="";
		
		llenaelementoHTML("#restricciones-user" , data);
		$(".delete_restriccion").click(delete_templates_restriccion);

	}).fail(function(){
		alert("Error");
	});
}
/**/
function delete_templates_restriccion(e){

	id_restriccion  = e.target.id;
	url = now + "index.php/api/templ/plantillarestriccion/format/json/";	
	eliminar_data(url , {restriccion : id_restriccion} );
	
}