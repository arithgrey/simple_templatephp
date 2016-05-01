$(document).on("ready" , function(){	
	/**/
	$("footer").ready(carga_servicios);
});
/*Carga los servicios del evento*/
function carga_servicios(e){

	url = now + "index.php/api/serviciosevento/avanzado/format/json/";	
	evento =  $("#evento").val();
	
	$.get(url , { "evento" : evento }  ).done(function(data){

		llenaelementoHTML("#list-servicios" , data );
		$(".servicio_nota").click(carga_nota_servicio);
	
	}).fail(function(){
		alert("Error al cargar ");
	});
}
/**/
/*Cargamos datos del servicio a la textarea*/
function carga_nota_servicio(e){
	id_servicio = e.target.id;
	evento =  $("#evento").val();
	url = now + "index.php/api/serviciosevento/avanzado_nota/format/json/";	
	$.get(url , {"evento" :  evento  , "servicio" :  id_servicio} ).done(function(data){
		
		$("#nota").val("");		
		$("#nota").val(data[0].nota);		

		

	}).fail(function(){
		alert("Error al cargar  nota para el público, reportar al administrador");
	});
}
/**/
function actualiza_nota_servicio(id_servicio , id_evento , nota ){
	/**/
	alert(id_servicio  + " ----- " + id_evento + "-----" + nota );
}

