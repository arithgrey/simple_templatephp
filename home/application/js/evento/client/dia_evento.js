$(document).on("ready" , function(){
	evento =  $("#idevento").val();		
	$("footer").ready(carga_servicios);	
	$("footer").ready(carga_otros_eventos);
});
/**/
function carga_section_politicas_evento(){

	url = now + "index.php/api/templ/tipo_cliente/format/json/"; 
	$.ajax({
		url :  url ,
		type : "GET",
		data : {"tipo" : 4 ,  "evento": evento  }, 
		beforeSend : function(){
			show_load_enid(".place_list_politicas" , "Cargando .. " , 1 );
		}
	}).done(function(data){

		$(".place_list_politicas").empty();
		llenaelementoHTML(".list_politicas" , data);
		carga_section_restricciones_evento();
	}).fail(function(){
		show_error_enid(".place_list_politicas" , "Error al cargar las politicas del evento, reporte al administrador");
	});	
}
function carga_section_restricciones_evento(){
	
	url = now + "index.php/api/templ/tipo_cliente/format/json/"; 
	$.ajax({
		url :  url ,
		type : "GET",
		data : {"tipo" : 3 ,  "evento": evento }, 
		beforeSend : function(){
			show_load_enid(".place_list_restricciones" , "Cargando .. " , 1 );
		}
	}).done(function(data){

		$(".place_list_restricciones").empty();
		llenaelementoHTML(".list_restricciones" , data);

	}).fail(function(){
		show_error_enid(".place_list_restricciones" , "Error al cargar las politicas del evento, reporte al administrador");
	});		
	
}
/**/
function show_more_info(e) {
	idservicio  = e.target.id;
	more = ".more_" + idservicio;	
	mas_info = ".info_serv"+idservicio;
	showonehideone( more ,   mas_info );
}
/**/
function hide_more_info(e){
	idservicio  = e.target.id;
	more = ".more_" + idservicio;	
	mas_info = ".info_serv"+idservicio;
	showonehideone( mas_info , more );
}
/**/

/**/
function carga_servicios(){
	url =  now + "index.php/api/serviciosevento/servicios_empresa/format/json/"; 	
	id_evento =  $(".id_evento").val();	
	in_session =  $("#in_session").val();
	
	descripcion_permitido =  $(".descripcion_permitido").val();
	data_send =  {id_evento :  id_evento ,  in_session :  in_session};
	$.ajax({
		url :  url , 
		type : "GET", 
		data :  data_send ,
		beforeSend : function(){
			show_load_enid(".place_servicios_incluidos" , "Cargando servicios del evento .. " , 1); 			
		}	
	}).done(function(data){
		$(".place_servicios_incluidos").empty();
		llenaelementoHTML(".servicios_incluidos" , data);
	}).fail(function(){
		show_error_enid(".place_servicios_incluidos"  , "Error al registrar, reporte al administrador "); 
	}); 
	carga_seccion_objs();
}
/**/
function carga_seccion_objs(){
	
	url =  now + "index.php/api/event/objetos/format/json/"; 	
	id_evento =  $(".id_evento").val();	
	in_session =  $("#in_session").val();	
	descripcion_permitido =  $(".descripcion_permitido").val();
	descripcion_politica =  $(".descripcion_politica").val();
	descripcion_restriccion =  $(".descripcion_restriccion").val();	
	data_send =  {id_evento :  id_evento , descripcion_permitido :  descripcion_permitido , in_session :  in_session , descripcion_politica  :  descripcion_politica , descripcion_restriccion :  descripcion_restriccion };

	$.ajax({

		url :  url , 
		type : "GET", 
		data :  data_send ,
		beforeSend : function(){
			show_load_enid(".place_objs_permitidos" , "Cargando servicios del evento .. " , 1); 			
		}	
	}).done(function(data){

		$(".place_objs_permitidos").empty();
		llenaelementoHTML(".objs_permitidos" , data);		
		carga_section_politicas_evento();
	}).fail(function(){
		show_error_enid(".place_objs_permitidos"  , "Error al registrar, reporte al administrador "); 
	}); 	
}
/**/
function carga_otros_eventos(){
	id_evento =  $(".id_evento").val();	
	url =  now  + "index.php/api/event/otros/format/json/";
	empresa =  $(".empresa").val();
	$.ajax({
		url : url , 
		type :  "GET",
		data:  {"id_evento" :  id_evento  , "id_empresa" :  empresa }	,
		beforeSend : function(){			
			show_load_enid( ".place_otros_eventos" , "Cargando los puntos de venta del evento" , 1 ); 				
		}
	}).done(function(data){					
		$(".place_otros_eventos").empty();
		llenaelementoHTML(".otros_eventos" , data);
	}).fail(function(){		
		show_error_enid(".place_otros_eventos" , "Error al cargar el escenario reportar al administrador"); 
	});
}