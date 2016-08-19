$(document).ready(function(){
	$("footer").ready(carga_portada_event);
	$("footer").ready(carga_escenarios_evento);
	$("footer").ready(carga_resumen_extra_evento);
	//$("footer").ready(carga_mapa_evento);
	$(".config_tipo_evento").click(carga_configuracion_tipo_evento);
	$(".config_estado_evento").click(carga_configuracion_estado_evento);
});
/**/
function carga_portada_event(){

    url =  now + "index.php/api/event/imagenes/format/json/";
    id_evento =  $("#evento").val();
    nombre_evento =  $("#nombre_evento_val").val();    
   	h_slogan = $(".h_slogan").val();
   	in_session =  $(".in_session").val();
   	
    $.ajax({
        url :  url , 
        type :  "GET", 
        data: {"id_evento" : id_evento , "nombre_evento" : nombre_evento , "public" : 1 , "slogan" : h_slogan , "in_session"  : in_session }, 
        beforeSend : function(){            
            show_load_enid(".place_slider", "Cargando portada del evento" , 1); 
        }
    }).done(function(data){            
        $(".place_slider").empty();
        llenaelementoHTML(".seccion_slider" , data );
    }).fail(function(){
        show_error_enid(".place_slider" , "Falla al actualizar la portada del evento, reporte al administrador " );   
    });    
}
/**/
function carga_escenarios_evento(){
	
	id_evento =  $(".evento_escenario").val(); 
	url =  now + "index.php/api/escenario/resumenpublic/format/json/"; 
	$.ajax({
		url : url , 
		type: "GET" , 
		data: {"evento" : id_evento }, 
		beforeSend: function(){
			/**/	
			show_load_enid(".place_escenarios", "Cargando portada del evento" , 1); 
		}
	}).done(function(data){
		/**/		
		$(".place_escenarios").empty();
		llenaelementoHTML(".seccion_escenarios" , data);
	}).fail(function(){
		show_error_enid(".place_escenarios" , "Falla al actualizar la portada del evento, reporte al administrador ");   
	});

}
/**/
function carga_resumen_extra_evento(){

	url = now + "index.php/api/event/resumen_extra/format/json/";
	id_evento =  $("#evento").val();
	in_session =  $(".in_session").val();  
		
	restricciones= $(".h_restricciones").val();
	politicas= $(".h_politicas").val();

	$.ajax({
		url : url , 
		data :  {"id_evento" : id_evento , "in_session" :  in_session  , "restricciones" :  restricciones , "politicas" :  politicas} ,
		beforeSend: function(){
			/*mostramos load*/			
			show_load_enid(".place_resumen_extra_evento", "Cargando .." , 1); 
		}
	}).done(function(data){
		$(".place_resumen_extra_evento").empty();
		llenaelementoHTML(".resumen_extra_evento" , data);		
	}).fail(function(){
		show_error_enid(".place_resumen_extra_evento" , "Falla al cargar la sección, reporte al administrador ");   
	}); 
}
/**/
/**/
function carga_configuracion_tipo_evento(){

	url = now + "index.php/api/event/config_tipo/format/json/";
	id_evento =  $("#evento").val();	
		if ($(".config_tipo").is(":visible") == true) { 		    		    
		    $("#config_tipo").fadeOut(700);		    
			$("#config_tipo").addClass("bounceOut");
		}
		else {
			/*Aquí cargamos el contenido*/
			$.ajax({
				url : url , 
				type:  "GET",		
				beforeSend: function(){
					
					show_load_enid(".place_config_tipo", "Cargando sección de configuración " , 1); 
				}
			}).done(function(data){
				$(".place_config_tipo").empty();
				llenaelementoHTML(".configuracion_tipo" , data);		
			}).fail(function(){
				show_error_enid(".place_config_tipo" , "Falla al cargar la ubicación  reporte al administrador");   
			}); 			
		 	
		 	$("#config_tipo").fadeIn();
		 	$("#config_tipo").removeClass("bounceOut");
		 	$("#config_tipo").addClass("bounceIn");
		 
		}
}/**/
function carga_configuracion_estado_evento(){
	

	if ($(".config_estado").is(":visible") == true) { 
		    $(".config_estado").fadeOut();		    
			$("#config_estado").addClass("bounceOut");

		}else {
			
			url = now + "index.php/api/event/config_estatus/format/json/";
			id_evento =  $("#evento").val();	
			status =  $(".h_status").val();		
			programado =  $(".h_programado").val();

			$.ajax({
				url : url , 
				type:  "GET",	
				data :  {"id_evento" :  id_evento ,  "status" :  status , "programado" : programado }	,
				beforeSend: function(){
					
					show_load_enid(".place_config_estado", "Cargando sección de configuración " , 1); 
				}
			}).done(function(data){
				$(".place_config_estado").empty();
				llenaelementoHTML(".configuracion_estado" , data);		
				$(".select_estatus_evento").change(lanza_ficha_estatus);


			}).fail(function(){
				show_error_enid(".place_config_estado" , "Falla al cargar la ubicación  reporte al administrador");   
			}); 

		 	$("#config_estado").fadeIn();
		 	$("#config_estado").removeClass("bounceOut");
		 	$("#config_estado").addClass("bounceIn");
	}
	/**/
}
/**/
function  lanza_ficha_estatus(){
	tipo =  $(".select_estatus_evento").val();
	id_evento =  $("#evento").val();	
	url =  now + "index.php/api/event/ficha_estatus/format/json/";
	status  =  $(".h_status").val();
	$.ajax({		
		url :  url , 
		type :  "GET" ,
		data : {"id_evento" :  id_evento , "tipo_ficha" : tipo  ,  "status" :  status }, 
		beforeSend : function(){					
			show_load_enid(".seccion_f_disponible", "Cargando .. " , 1); 
		}
	}).done(function(data){
		llenaelementoHTML(".seccion_f_disponible" , data );
		$("#form-programacion-evento").submit(programacion);
		$(".fijar_public").click(fija_evento_public);

		/*Cuando se cancela */
		
		$("#form_cancelacion").submit(cancela_event_nota);
		/**/



	}).fail(function(){
		show_error_enid(".place_config_estado" , "Error al cargar la ficha, reporte al administrador");   
	});
}
/**/

function programacion(e){			

	url =  now + "index.php/api/event/programacion/format/json/";
	id_evento =  $("#evento").val();
	fecha_programado =  $("#fecha_programado").val();
	data_send =  $("#form-programacion-evento").serialize() + "&" + $.param({"id_evento" : id_evento });
	$.ajax({
		url :  url , 
		type : "POST",
		data :  data_send , 
		beforeSend : function() {
			/**/			
			show_load_enid(".place_form_programacion", "Programando evento " , 1); 
		}
	}).done(function(data){		
		cliente_msj  ="El evento se ha programado con  éxito y será publico para todos el día " + fecha_programado;
		show_response_ok_enid(".place_form_programacion" , cliente_msj );
		setTimeout(redirecciona, 2000);
	}).fail(function(){
		/**/
		show_error_enid(".place_form_programacion" , "Error programar evento, reporte al administrador");   
	});
	e.preventDefault();
}
/**/
function fija_evento_public(){

	url =  now + "index.php/api/event/update_status/format/json/";	
	evento = $("#evento").val();
	status  = 1; 
	$.ajax({
		url : url , 
		type :  "PUT",
		data : {"evento" :  evento , "nuevo_status" :  status }, 
		beforeSend : function(){			
			show_load_enid(".place_public", "Actualizando  " , 1); 
		}
	}).done(function(data){

		show_response_ok_enid(".place_public"  , "Estado del evento actualizado con éxito .!" ); 
		setTimeout(redirecciona, 2000);
	}).fail(function(){
		show_error_enid(".place_public" , "Error al actualizar, reporte al administrador ");   
	});
}
/**/
function redirecciona(){
	redirect("");
}
/**/
function cancela_event_nota(e){
	
	url =  $("#form_cancelacion").attr("action");	
	evento = $("#evento").val();
	data_send = $("#form_cancelacion").serialize() + "&" + $.param({"id_evento" :  evento }); 
	$.ajax({
		url :  url , 
		type : "PUT" , 
		data  : data_send  , 
		beforeSend : function(){	
			show_load_enid(".place_estado_evento", "Actualizando estado del evento " , 1); 
		}
	}).done(function(data){		
		show_response_ok_enid(".place_public"  , "Estado del evento actualizado con éxito .!" ); 
		setTimeout(redirecciona, 2000);		
	}).fail(function(){
		show_error_enid(".place_estado_evento" , "Error cancelar el evento, reporte al administrador ");   
	});	
	e.preventDefault();
}

