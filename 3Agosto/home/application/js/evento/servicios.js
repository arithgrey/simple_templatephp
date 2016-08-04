function load_data_servicios(){


	url = now + "index.php/api/serviciosevento/load/format/json/";
	evento = $(".eventoservicios").val();
	$.ajax({
		url : url , 
		data : { evento : evento } , 
		type : "GET", 
		beforeSend : function(){						
			show_load_enid(".place_servicios_incluidos" , "Cargando ..." , 1); 				
		}
	}).done(function(data){

		$(".servicios_in_evento").empty();
		$(".place_servicios_incluidos").empty();				
		llenaelementoHTML(".servicios_in_evento" , data);		
		$("#form_servicios_b").submit(busqueda_servicios);
		$(".servicio_registrado_evento").hover(hover_tags);						
		$(".servicios_delete").click(eliminar_servicio_evento);
		
	}).fail(function(){	
		show_error_enid(".place_servicios_incluidos" , "Falla al  cargar los servicios disponibles en el evento, notifique al administrador" ); 		
	});

}
/**/
function serviciocheck(e){

	idservicio  = e.target.id;		 
	evento = $("#evento").val();
	url = now + "index.php/api/serviciosevento/update/format/json/";
	
	$.ajax({
	 	url : url , 
	 	type :  "POST",
	 	data :  { evento : evento , idservicio : idservicio  } , 
	 	beforeSend: function(){
	 		show_load_enid(".place_servicios_incluidos" , "Actualizando " , 1); 				
	 	}
	}).done(function(data){
		show_response_ok_enid( ".place_servicios_incluidos", "Lista de artículos actualizada"); 
		load_data_servicios();
	}).fail(function(){
		show_error_enid(".place_servicios_incluidos" , "Falla al  cargar los servicios disponibles en el evento, notifique al administrador" ); 
	});	
}	
/**/
/*
function update_all_services(){

	id_evento = $("#evento").val();
	url = now + "index.php/api/serviciosevento/update_all_in_event/format/json/"; 
	data_send =  {"evento" : id_evento};  
	
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){	  		  	
	  	$("#alert-servicios-ok").show();
	  	muestra_alert_segundos("#alert-servicios-ok");

	}).fail(function(){
	   		alert("falla al intentar actualizar, REPORTE AL ADMINISTRADOR");
	   		$("#alert-servicios-fail").show();
	});
	load_data_servicios();
}
*/
/**/
/*
function load_nota_servicio(e){
	

	id_servicio = e.target.id; 
	section_nota = "#nota_area_" + id_servicio;
	$(section_nota).show();


	text_area_nota_servicio =  "#text_area_nota_servicio" + id_servicio;
	$(text_area_nota_servicio).blur(function(){
		text_accesorio =  $(text_area_nota_servicio).val();

		url =  now + "index.php/api/serviciosevento/descripcion/format/json/"; 			
		actualiza_data(url , {"servicio" : id_servicio , "evento" : evento  , "nota" : text_accesorio } );
		load_data_servicios();

	});

}
*/
function  busqueda_servicios(e) {	


	url  =  $("#form_servicios_b").attr("action");	
	$.ajax({
		url : url , 
		data :  $("#form_servicios_b").serialize(), 
		type :  "GET" , 
		beforeSend:function(){						
			show_load_enid(".servicios_encontrados" , "Cargando .. " , 1); 				
		}
	}).done(function(data){		

		llenaelementoHTML(".servicios_encontrados" , data );
		$(".serviciocheck").click(serviciocheck);				

	}).fail(function(){			
		show_error_enid(".servicios_encontrados" , "Falla al buscar servicios encontrados, notifique al administrador" ); 		
	});	
	e.preventDefault();
}
/**/
function hover_tags(e){	
	num =  e.target.id; 
	serviciocheck_ =  ".serviciocheck_" + num; 
	$(serviciocheck_).show();
}
/**/
function eliminar_servicio_evento(e){

	idservicio  = e.target.id;		 
	evento = $("#evento").val();
	url = now + "index.php/api/serviciosevento/update/format/json/";
	
	$.ajax({
	 	url : url , 
	 	type :  "POST",
	 	data :  { evento : evento , idservicio : idservicio  } , 
	 	beforeSend: function(){
	 		show_load_enid(".place_servicios_incluidos" , "Actualizando " , 1); 				
	 	}
	}).done(function(data){
		show_response_ok_enid( ".place_servicios_incluidos", "Lista de artículos actualizada"); 
		load_data_servicios();
	}).fail(function(){
		show_error_enid(".place_servicios_incluidos" , "Falla al  cargar los servicios disponibles en el evento, notifique al administrador" ); 
	});	
}

