function load_data_servicios(){
	url = now + "index.php/api/serviciosevento/load/format/json/";
	evento = $(".eventoservicios").val();
	$.get(url , { evento : evento }  ).done(function(data){

		llenaelementoHTML(".servicios-evento-modal" , data);		
		$(".serviciocheck").click(serviciocheck);
		$(".up-all-serv").click(update_all_services);	
		$(".nota-servicio").click(load_nota_servicio);


		/**/


	}).fail(function(){
		alert(genericresponse[0]);
	});
}
/**/
function serviciocheck(e){
	idservicio  = e.target.id;		 
	evento = $(".eventoservicios").val();
	url = now + "index.php/api/serviciosevento/update/format/json/";
	$.post(url , { evento : evento , idservicio : idservicio  }  ).done(function(data){
		load_data_servicios();
		$("#alert-servicios-ok").show();
		muestra_alert_segundos("#alert-servicios-ok"); 

	}).fail(function(){


		$("#alert-servicios-fail").show();
		muestra_alert_segundos("#alert-servicios-fail"); 

		alert(genericresponse[0]);
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
	  	$("#alert-servicios-ok").show();
	  	muestra_alert_segundos("#alert-servicios-ok");

	}).fail(function(){
	   		alert("falla al intentar actualizar, REPORTE AL ADMINISTRADOR");
	   		$("#alert-servicios-fail").show();
	});

	/*Cargamos los servicios */	
	load_data_servicios();
	
}
/**/
function load_nota_servicio(e){
	
	/**/		
	id_servicio = e.target.id; 
	section_nota = "#nota_area_" + id_servicio;
	$(section_nota).show();

	/**/
	text_area_nota_servicio =  "#text_area_nota_servicio" + id_servicio;
	$(text_area_nota_servicio).blur(function(){
		text_accesorio =  $(text_area_nota_servicio).val();
		/**/
		url =  now + "index.php/api/serviciosevento/descripcion/format/json/"; 			
		actualiza_data(url , {"servicio" : id_servicio , "evento" : evento  , "nota" : text_accesorio } );

		load_data_servicios();

		/**/
	});

}
