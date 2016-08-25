$(document).on("ready" , function(){	
	/**/
	$("footer").ready(carga_servicios);
});
/*Carga los servicios del evento*/
function carga_servicios(e){
	/**/
	url = now + "index.php/api/serviciosevento/avanzado/format/json/";		
	evento =  $("#evento").val();
	
	$.get(url , { "evento" : evento }  ).done(function(data){

		llenaelementoHTML("#list-servicios" , data );
		$(".servicio_nota").click(carga_nota_servicio);
		$(".servicios-input").click(actualiza_evento_servicio);
		$(".up-all-serv").click(update_all_services);	


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

		$("#actualizar-nota-btn").click(function(){

			actualiza_nota_servicio(id_servicio , evento , $("#nota").val() );
		});			

	}).fail(function(){
		alert("Error al cargar  nota para el público, reportar al administrador");
	});
}
/**/
function actualiza_nota_servicio(id_servicio , id_evento , nota ){
	/**/
	url = now + "index.php/api/serviciosevento/avanzado_nota/format/json/";	
	data_send =  {"servicio" : id_servicio , "evento" :  id_evento , "nota" : nota };
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){	   	
	   	/**/
	   	$("#alert-ok-nota").show();
	   	muestra_alert_segundos("#alert-ok-nota");

	}).fail(function(){
		$("#alert-fail-nota").show();
	   	alert("falla al intentar actualizar, reportar al administrador ");
	});		

}

/**/
function actualiza_evento_servicio(e){

	servicio = e.target.id;
	evento =  $("#evento").val();
	data_send = {"evento" :  evento , "idservicio" : servicio }; 	
	url = now + "index.php/api/serviciosevento/update/format/json/";	

		$.ajax({
	   url: url,
	   type: 'POST',
	   data : data_send  }).done(function(data){	   	
	   	/**/
		carga_servicios();

	}).fail(function(){
		
	   	alert("falla al intentar actualizar, reportar al administrador ");
	});		
}
/**/
function update_all_services(){

	id_evento = $("#evento").val();
	url = now + "index.php/api/serviciosevento/update_all_in_event/format/json/"; 
	data_send =  {"evento" : id_evento};  
	
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){	  	
	  	/*reportamos que se efectuó con éxito*/
	  	carga_servicios();
	  	$("#alert-ok-servicios").show();
	 	muestra_alert_segundos("#alert-ok-servicios");


	}).fail(function(){
	   	alert("falla al intentar actualizar, REPORTE AL ADMINISTRADOR");
	   	$("#alert-fail-servicios").show();
	});

	
}

