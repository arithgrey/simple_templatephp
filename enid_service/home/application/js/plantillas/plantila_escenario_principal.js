$(document).on("ready" , function(){
	$("#tmp-escenario").submit(registra_template_escenario);
	lista_plantillas_escenario();
	
});
/**/
function registra_template_escenario(){

	url = $("#tmp-escenario").attr("action");	
	$.post(url , $("#tmp-escenario").serialize()).done(function(data){
		/**/
		$("#alert-plantilla-ok").show();
		muestra_alert_segundos("#alert-plantilla-ok");
		lista_plantillas_escenario();

		var  fields = ["#tnuevo_contenido_name"  , "#contenido_text"];
		reset_fields(fields); 


	}).fail(function(){
			
		$("#alert-pllantilla-fail").show();		
		alert("Error al registrar la plantilla");

	});
	
	return  false;
}
/**/
function lista_plantillas_escenario(){
	
	url = now + "index.php/api/templ/templates_content/format/json/";
	$.get(url , {"type" : 5 } ).done(function(data){
		llenaelementoHTML("#list_plantilla_escenario " , data );
		$(".delete_contenido_templ").click(delete_contenido);
		

	}).fail(function(){
		alert("Error al cargar plantillas ");
	});	
}
/**/
function delete_contenido(e){

	idcontenido = e.target.id;

	url =now  + "index.php/api/templ/templates_content/format/json/";
	eliminar_data(url , {"contenido" : idcontenido} );	
	lista_plantillas_escenario();
}
