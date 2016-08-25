$(document).on("ready" , function(){

	$(".dinamic_menu_pv").click(carga_pv_disponibles);
	$("footer").ready(carga_informacion_extra);	
	var punto_venta_global  = 0; 
	$("#more-info-event").click(function(){
		$(".section-descripcion-evento").hide(300);
		$(".section-descripcion-evento-complete").show(300);
	});
	$("#lessinfo_event").click(function(){
		$(".section-descripcion-evento").show(300);
		$(".section-descripcion-evento-complete").hide(300);		
	});
	$("footer").ready(dinamic_edit);
	//$(".load_resumen_escenarios_event").click(muestra_menu);

});
/**/
function load_data_escenarios(e){	
	evento  =  e.target.id;
	url = now + "index.php/api/escenario/escenario_evento/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){
				
		buttons =  ""; 			
		for(var x in data){

			nombre = data[x].nombre;
			idescenario = data[x].idescenario;
			idevento = data[x].idevento;
			url =  now + "/index.php/escenario/inevento/" + idescenario +"/" + idevento;
			buttons += "<a href='"+ url +"'><button class='btn-default' id= '"+ url +"' >" + nombre + "</button></a>";
		}
		llenaelementoHTML( "#escenarios_resumen" , buttons);	

	}).fail(function(){
		alert("Error al cargar");
	});
}
/**/
function load_data_artistas(e){
	evento  =  e.target.id;
	url = now + "index.php/api/escenario/escenario_evento_artista/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){
				
		buttons =  ""; 			
		for(var x in data){
			nombre = data[x].nombre_artista ;			
			buttons += "<button  class='btn-default'>" + nombre + "</button>";
		}

		llenaelementoHTML( "#artistas_resumen" , buttons);

	}).fail(function(){
		alert("Error al cargar");
	});
}
/**/
function load_data_generos(e){

	evento  =  e.target.id;
	url =  now + "index.php/api/event/generos_musicales/format/json/"; 
	$.get(url , {"evento" :  evento } ).done(function(data){

		buttons =  ""; 			
		for(var x in data){
			nombre = data[x].nombre;			
			buttons += "<button  class='btn-default sm'>"+ nombre + "</button>";
		}

		llenaelementoHTML( "#generos_resumen" , buttons);
		
	}).fail(function(){
		alert("Error al cargar");
	});
}
/**/
function load_data_servicios(e){
	evento  =  e.target.id;
	url =  now + "index.php/api/event/servicios/format/json/"; 

	$.get(url, {"evento" :  evento }).done(function(data){

		buttons =  ""; 			
		for(var x in data){
			nombre = data[x].servicio;			
			buttons += "<button  class='btn-default'>" + nombre + "</button>";
		}
		llenaelementoHTML( "#servicios_resumen" , buttons);
		
	}).fail(function(){
		alert("Error al cargar");
	});
}
/**/
function load_data_contact(e){	
	punto_venta  = e.target.id;
	punto_venta_global =  punto_venta;
	url = now + "index.php/api/puntosventa/contacto/format/json"; 
	llenaelementoHTML(".informacion-contact" , "");
	$.get(url , {punto_venta : punto_venta_global} ).done(function(data){
		llenaelementoHTML(".informacion-contact" , data);
	}).fail(function(){
		alert("Error");
	});

}/**/
/**/
function dinamic_edit(){
	if (in_session !=1){
		var list = [".editar_client" , ".editar_client"];		
		ocualta_elementos_array(list); 
	}	
}
function carga_pv_disponibles(){	
	
	url =  now  + "index.php/api/puntosventa/puntos_venta_evento/format/json/";
	id_evento =  $(".evento").val();	
	in_session =  $(".in_session").val();

	$.ajax({
		url : url , 
		type :  "GET",
		data:  {"id_evento" :  id_evento ,  "in_session" : in_session }	,		
		beforeSend : function(){			
			show_load_enid( ".place_puntos_venta" , "Cargando los puntos de venta del evento" , 1 ); 				
		}
	}).done(function(data){		
		$(".place_puntos_venta").empty();
		llenaelementoHTML(".puntos_venta" , data);
	}).fail(function(){		
		show_error_enid(".place_puntos_venta" , "Error al cargar el escenario reportar al administrador"); 
	});
}
/**/
function carga_informacion_extra(){
	/**/	
	url =  now  + "index.php/api/event/otros/format/json/";
	id_evento =  $(".evento").val();	
	empresa =  $(".empresa").val();

	$.ajax({
		url : url , 
		type :  "GET",
		data:  {"id_evento" :  id_evento  , "id_empresa" :  empresa }	,
		beforeSend : function(){			
			show_load_enid( ".place_bloque_extra" , "Cargando los puntos de venta del evento" , 1 ); 				
		}
	}).done(function(data){		
		
		$(".place_bloque_extra").empty();
		llenaelementoHTML(".bloque_extra" , data);
	}).fail(function(){		
		show_error_enid(".place_bloque_extra" , "Error al cargar el escenario reportar al administrador"); 
	});

}