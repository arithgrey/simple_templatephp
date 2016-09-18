function load_data_servicios(){


	url = now + "index.php/api/serviciosevento/load/format/json/";
	evento = $(".eventoservicios").val();
	$.ajax({
		url : url , 
		data : { evento : evento ,  "enid_evento" : enid_evento } , 
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
	 	data :  { evento : evento , idservicio : idservicio ,  "enid_evento" : enid_evento } , 
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
	 	data :  { evento : evento , idservicio : idservicio ,  "enid_evento" : enid_evento } , 
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

