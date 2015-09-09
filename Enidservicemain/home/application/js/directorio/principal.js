$(document).on("ready", function(){

	$("#form-contactos").submit(record_contacto);
	$("#nuevo-contacto-button").click(function(){
		$(".status-registro").hide();
	});
	$("footer").ready(load_contactos);
});


function record_contacto(e){

	url = $("#form-contactos").attr("action");	
	$.post(url, $("#form-contactos").serialize()).done(function(data){
			$(".status-registro").show();
			load_contactos();
						
	}).fail(function(){
		alert("Error al registrar contacto, informar al administrador si  el problema persiste");
	});			
	e.preventDefault();
}	
/**/
function load_contactos(){

	url = $("#form-contactos").attr("action");	
	$.get(url).done(function(data){

		llenaelementoHTML( "#section-contact" , data);

	}).fail(function(){
		alert("Error al cargar tus contactos, informar al administrador si  el problema persiste");
	});

}