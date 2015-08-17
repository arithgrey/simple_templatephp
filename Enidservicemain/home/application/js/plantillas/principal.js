$(document).on("ready", function(){
	$("#nueva-descripcion-template").submit(registra_plantilla_descripcion);
});

/*Registro de plantilla descripción de eventos */
function registra_plantilla_descripcion(){

	
	url = now + "index.php/api/templ/registra_templ_usuario/format/json/";	
	$.post( url ,  $("#nueva-descripcion-template").serialize() ).done(function(data){

		alert(data);
		clean_form_contenido();

	}).fail(function(){
		alert(genericresponse[0]);

	});


	
	
	return false;

}
/*Limpiar el registro más respuesta al cliente del estatus */
function clean_form_contenido(){

	$("#nombre-tmpl").val("");
	$("#titulo-contenido-tmpl").val("");
	$("#descripcion-contenid-templ").val("");
}