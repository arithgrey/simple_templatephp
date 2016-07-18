$(document).ready(function(){
	evalua_modal();
	tipo_contenido = "";
	evento = $("#evento").val();	
	carga_section_escenarios();
	$("#genero-busqueda").keyup(function(){
		busqueda_geros_musicales($(this).val());
	});

	$("#tipo-evento-select").change(update_tipificacion_evento);	
	$("#form_social").submit(registra_redes_sociales);
	$(".nombre-evento-h1").click(update_name_evento);
	$(".edicion-evento").click(update_edicion_evento);
	$(".descripcion-p").click(update_descripcion_evento);
	$(".politicas-p").click(update_politicas_evento);
	$(".permitido-p").click(update_permitido_evento);
	$(".restricciones-p").click(updaterestricciones);	
	$(".experiencia_btn_templ").click(carga_template_disponible_experiencia);
	$(".politicas_btn_templ").click(carga_template_disponible_politica);
	$(".restricciones_btn_templ").click(carga_template_disponible_restricciones);
	$(".politicas_section_content").click(function(){
		get_contenido_evento_temp(4,  "#list_politicas_evento");
	});
	$(".restricciones_section_content").click(function(){
		get_contenido_evento_temp(3 , "#list_restricciones_evento");		
	});

	$("#tipificacion-evento").click(function(){
		$("#alerta-tipo-evento-ok").hide();
	});	
	$(".update-fecha-evento-form").submit(update_fecha_evento);
	$("#img-button-more-imgs").click(carga_img_portada);
	$(".permitidonow").click(load_objetospermitidos_evento);		
	$("#generos_musicales_contente").click(carga_generos_registrados);
	$("#generosenid-button").click(function(){
		show_section_dinamic_on_click(".section_generosmusicales");
	});

	$(".articulos-permitidos-button").click(function(){
		show_section_dinamic_on_click("#section-articulos-permitidos");
	});
	$("#articulos-permitidos-button-u").click(function (){		
		showonehideone("#articulos-permitidos-button-d" , "#articulos-permitidos-button-u");
	});
	$("#articulos-permitidos-button-d").click(function (){
		showonehideone("#articulos-permitidos-button-u" , "#articulos-permitidos-button-d");		
	});
	//$("#form-accesos-modal").submit(registra_acceso);
	$("#servicios-button").click(load_data_servicios);

	$("#pac-input").click(update_ubicacion_evento);	
	
	$("#tematica-button").click( function (){
		show_section_dinamic_button(".tematica_section");	
		load_data_tematica();
	});
	//$("#accesos-button").click(load_accesos_evento);
	$(".eslogan-p").click(update_eslogan_evento);
  	$('.btn-vertical-slider').on('click', function (){                                        
    if ($(this).attr('data-slide') == 'next') {
       $('#myCarousel').carousel('next');
      }
    if ($(this).attr('data-slide') == 'prev') {
        $('#myCarousel').carousel('prev')
      }

    });
   	$("footer").ready(load_data_slider);
   	
	//initialize();

});

/**/
function load_data_evento( text_visible , val , text_evento , place , null_msj , sin_text_msj  ){

		url = now + "index.php/api/event/get_event_texts/format/json/";			
		
		data_send =  {"evento" : evento  , "text" : text_evento , "null_msj" : null_msj , "sin_text_msj" : sin_text_msj }; 
		$.ajax({
			url : url , 
			type : "GET", 
			data : data_send, 
			beforeSend :  function(){
				show_load_enid( place , "Cargando .. " , 1); 		
			}
		}).done(function(data){
			$(place).empty();
			llenaelementoHTML(text_visible  , data);
			$(val).val(data);

		}).fail(function(){
			show_error_enid(place , "Error, reportar al administrador "); 				
		});		
}
/**/	
function update_name_evento(e){
	showonehideone( "#nombre-input" , ".nombre-evento-h1" );	
	$("#nombre-input").blur(update_db_name_evento);
}
/**/
function update_db_name_evento(){
	flag = valida_text_form("#nombre-input" , ".place_nombre_evento" , 5 , "Nombre del evento " ); 
	if (flag == 1) {
			url =  now + "index.php/api/event/nombre/format/json/";    
			nuevotexto = $("#nombre-input").val();		
			data_send  = {"nombre" : nuevotexto , "evento" : $("#evento").val()}			
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_nombre_evento" , "Registrando cambios" , 1); 							
						}
				  }).done(function(data){
				  		$(".place_nombre_evento").empty();
				  		show_response_ok_enid( ".place_nombre_evento", "Nombre del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#nombre-input" , ".nombre-evento-h1" , nuevotexto , nuevotexto);

				  }).fail(function(){
				  		show_error_enid(".place_nombre_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
}

/******************************************************************/
/*Update descripción*/
function update_edicion_evento(e){

	showonehideone( "#edicion-input" , ".edicion-evento" );
	$("#edicion-input").blur(function(){			
		update_db_edicion_evento();
	});
}
/**/
function update_db_edicion_evento(){


	flag = valida_text_form("#edicion-input" , ".place_edicion_evento" , 5 , "Edición del evento " ); 
	if (flag == 1){

			url =  now + "index.php/api/event/edicion/format/json/";    
			nuevotexto = $("#edicion-input").val(); 			
			data_send= { "edicion" : nuevotexto , "evento" : $("#evento").val() }			
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_edicion_evento" , "Registrando cambios" , 1); 							
						}
				  }).done(function(data){
				  		$(".place_edicion_evento").empty();
				  		show_response_ok_enid( ".place_edicion_evento", "La edición del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#edicion-input" , ".edicion-evento" , nuevotexto , nuevotexto );

				  }).fail(function(){
				  		show_error_enid(".place_edicion_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
}


/******************************************************************/
function update_descripcion_evento(e){
	showonehideone( "#descripcion-evento" , ".descripcion-p" );
	$("#descripcion-evento").blur(update_descripcion_db_evento);
}
/**/
function update_descripcion_db_evento(){

	flag = valida_text_form("#descripcion-evento" , ".place_descripcion_evento" , 5 , "Descripción  del evento " ); 
	if (flag == 1) {
			url =  now + "index.php/api/event/descripcion/format/json/";
			nuevotexto = $("#descripcion-evento").val();		
			data_send = { "descripcion_evento" : nuevotexto , "evento" : $("#evento").val() }     
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_descripcion_evento" , "Registrando cambios" , 1); 							
						}
				  }).done(function(data){
				  		$(".place_descripcion_evento").empty();
				  		show_response_ok_enid( ".place_descripcion_evento", "La experiencia del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#descripcion-evento" , ".descripcion-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_descripcion_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
	
}
/************************update_politicas_evento *******************************/
function update_politicas_evento(e){
	showonehideone( "#politicas-evento" , ".politicas-p" );
	$("#politicas-evento").blur(update_db_politicas_evento);

}

/**/
function update_db_politicas_evento(){

	flag = valida_text_form("#politicas-evento" , ".place_politicas_evento" , 250 , "Las politicas del evento " ); 
	if (flag == 1) {
			url =  now + "index.php/api/event/politicas/format/json/";    
			nuevotexto = $("#politicas-evento").val();				
			data_send = { "politicas_evento" : nuevotexto , "evento" : $("#evento").val() }
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_politicas_evento" , "Registrando cambios" , 1); 							
						}
				  }).done(function(data){
				  		$(".place_politicas_evento").empty();
				  		show_response_ok_enid( ".place_politicas_evento", "Las politicas ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#politicas-evento" , ".politicas-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_politicas_evento"  , "Error al actualizar las politicas  del evento reporte al administrador");
				  });							
	}
}
/*Permitido Permitido Permitido Permitido Permitido Permitido Permitido */
function update_permitido_evento(e){
	showonehideone( "#permitido-evento" , ".permitido-p" );
	$("#permitido-evento").blur(update_db_permitido_evento);
}

function update_db_permitido_evento(e){

	flag = valida_text_form("#permitido-evento" , ".place_permitido" , 255 , "Descripción  " ); 	
	if (flag == 1 ) {		
		nuevotexto = $("#permitido-evento").val(); 
		url =  now + "index.php/api/event/permitido/format/json/";    
		data_send = { "permitido_evento" : nuevotexto , "evento" : evento  };  

				$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_permitido" , "Registrando cambios" , 1); 							
						}
				  }).done(function(data){
				  		$(".place_permitido").empty();
				  		show_response_ok_enid( ".place_permitido", "Descripción actualizada con éxito"); 			  		
				  		replace_val_text("#permitido-evento" , ".permitido-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_permitido"  , "Error al actualizar la descripción de lo permitido en el evento, reporte al administrador");
				  });
	}	
}
/*End permitido *End permitido *End permitido *End permitido *End permitido *End permitido */
function updaterestricciones(e){
	showonehideone( "#restricciones-evento" , ".restricciones-p" );
	$("#restricciones-evento").blur(update_db_restricciones)			
}

/**/
function update_db_restricciones(){
	flag = valida_text_form("#restricciones-evento" , ".place_restricciones" , 255 , "Descripción " ); 	
	nuevotexto = $("#restricciones-evento").val(); 				
	url =  now + "index.php/api/event/restricciones/format/json/";    
	data_send = { "restricciones_evento" : nuevotexto , "evento" : $("#evento").val() }
	if (flag == 1  ) {
		$.ajax({
				url :  url , 
				type : "PUT", 
				data : data_send , 
					beforeSend :  function(){
						show_load_enid(".place_restricciones" , "Registrando cambios" , 1); 							
					}
				}).done(function(data){
					$(".place_restricciones").empty();
					show_response_ok_enid( ".place_restricciones", "Descripción actualizada con éxito"); 			  		
					replace_val_text("#restricciones-evento" , ".restricciones-p" , nuevotexto , nuevotexto);
				}).fail(function(){
					  	show_error_enid(".place_restricciones"  , "Error al actualizar la descripción de lo permitido en el evento, reporte al administrador");
		});
	}

}
/*Nueva dirección */
function update_ubicacion_evento(){

	showonehideone( "#ubicacion-input" , ".text-ubicacion" );
	$("#pac-input").blur(function(){

		flag = valida_text_form("#pac-input" , ".place_ubicacion" , 10 , "Datos de la dirección" ); 	
		if (flag ==1  ) {
			nuevotexto = $("#pac-input").val(); 			
			url =  now + "index.php/api/event/ubicacion/format/json/";  
			data_send = { "ubicacion" : nuevotexto , "evento" : $("#evento").val() }  		

			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_ubicacion" , "Registrando cambios" , 1); 							
						}
					}).done(function(data){
						$(".place_ubicacion").empty();
						show_response_ok_enid( ".place_ubicacion", "Dirección del evento actualizada con éxito"); 			  		
						
					}).fail(function(){
						show_error_enid(".place_ubicacion"  , "Error al actualizar la dirección del evento, reporte al administrador");
			});
		}
	});
}

/*******************************************/
/*
function tryrecordgeneros(e){
	
	if (e.keyCode == 13){

 		 generos = $("#tags_enid_input").val();	

		 	url =  now + "index.php/api/event/genero/format/json/";    

			$.post(url , { "generos" : generos  , "evento" : $("#evento").val() } )
			.done(function(data){
					
				
				

			}).fail(function(){

				alert(genericresponse[0]);
			});

 	}
}
*/
/**********************************************************/
function update_eslogan_evento(e){
	showonehideone( "#eslogan-evento" , ".eslogan-p");
	$("#eslogan-evento").blur(update_eslogan_db_evento);
}
/**/
function update_eslogan_db_evento(){
		
	flag = valida_text_form("#eslogan-evento" , ".place_eslogan_evento" , 5 , "Eslogan  del evento " ); 
	if (flag == 1) {
			url =  now + "index.php/api/event/eslogan/format/json/";    			
			nuevotexto = $("#eslogan-evento").val();		
			data_send = { evento : $("#evento").val() , eslogan : $("#eslogan-evento").val()}
			$.ajax({
					url :  url , 
					type : "PUT", 
					data : data_send , 
						beforeSend :  function(){
							show_load_enid(".place_eslogan_evento" , "Registrando cambios" , 1); 							
						}
				  }).done(function(data){
				  		$(".place_eslogan_evento").empty();
				  		show_response_ok_enid( ".place_eslogan_evento", "Eslogan del evento ha sido actualizada con éxito"); 			  		
				  		replace_val_text("#eslogan-evento" , ".eslogan-p" , nuevotexto , nuevotexto);
				  }).fail(function(){
				  		show_error_enid(".place_eslogan_evento"  , "Error al actualizar la edición del evento reporte al administrador");
				  });							
	}
}
/**/
function update_descripcion_evento_by_template(e){

	contenido = e.target.id;

	url =  now + "index.php/api/event/descripcion_template/format/json/";	
	template_content =  e.target.id;			
	data_send =  { "template_content" : template_content , "evento" : evento }; 
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 	
		beforeSend: function(){							
			show_load_enid(".place_experiencia_evento" , "Cargando contenido" , 1); 
		}
	}).done(function(data){	

		show_response_ok_enid(".place_experiencia_evento", "Experiencia del evento actualizada con éxito "); 					
		load_data_evento(".descripcion-p" , "#descripcion-evento" , "descripcion_evento" , ".place_description" , "Lo que se vivirá en el evento" , "Lo que se vivirá en el evento");

		$("#templa-descripcion-contenido").modal("hide");

	}).fail(function(){	
		show_error_enid(".place_restricciones_tmp"  , "Error al cargar plantilla, reporte al administrador"); 				
	});
}
/*Carga de plantillas*/
function record_contenido_evento_template(e){		
	contenido = e.target.id;
	url = now  + "index.php/api/templ/templates_contenido_evento/format/json/";		
	data_send =  {"contenido": contenido , "evento" : evento }; 
	$.ajax({
		url : url , 
		type : "PUT", 
		data : data_send, 	
		beforeSend: function(){				
			if (tipo_contenido ==  "politica") {
				show_load_enid(".place_politicas_tmp" , "Cargando contenido" , 1); 	
			}else{
				show_load_enid(".place_restricciones_tmp" , "Cargando contenido" , 1); 	
			}			
		}
	}).done(function(data){				

		if (tipo_contenido ==  "politica") {
			show_response_ok_enid( ".place_politicas_tmp", "Politica del evento actualizada con éxito "); 		
			get_contenido_evento_temp( 4,  "#list_politicas_evento");		
			$("#templa-politicas").modal("hide");
		}else{			
			show_response_ok_enid( ".place_restricciones_tmp", "Restricción del evento cargada con éxito"); 		
			get_contenido_evento_temp( 3 , "#list_restricciones_evento");
			$("#templa-restricciones").modal("hide");
		}					

	}).fail(function(){	

		if (tipo_contenido ==  "politica") {	
			show_error_enid(".place_politicas_tmp"  , "Error al cargar plantilla, reporte al administrador"); 		
		}else{
			show_error_enid(".place_restricciones_tmp"  , "Error al cargar plantilla, reporte al administrador"); 		
		}	
	});
	

}
/**/
function get_contenido_evento_temp(type,  place){
	
	evento = $("#evento").val();		
	url = now  + "index.php/api/templ/templates_contenido_evento/format/json/";		
	data_send =  {"type": type , "evento" : evento }
	$.ajax({
		url:  url , 
		type : "GET", 
		data :  data_send , 
		beforeSend:function(){
			show_load_enid(place , "Cargando .. " , 1); 	
		}
	}).done(function(data){
		
		llenaelementoHTML( place , data );		
	}).fail(function(){
		show_error_enid(place , genericresponse[0] ); 		
	});
	
}
/*DELETE contenido evento */
function delete_contenido_evento_temp(e){
	
	contenido = e.target.id;	
	url = now  + "index.php/api/templ/templates_contenido_evento/format/json/";	
	eliminar_data(url , {"contenido": contenido , "evento" : evento }  );
	get_contenido_evento_temp(4,  "#list_politicas_evento");
	get_contenido_evento_temp(3 , "#list_restricciones_evento");	
}
/*Actualiza la fecha del evento */
function update_fecha_evento(){	
	 	
	update_inicio = $("#update_inicio").val();
	update_termino = $("#update_termino").val();
	url = now + "index.php/api/event/date_by_id/format/json/";	 		 	
	id_evento =  $("#evento").val();
	
	$.ajax({
		url : url , 
		type :  "PUT",
		data : { "evento" : id_evento , "nuevo_inicio" : update_inicio , "nuevo_termino" : update_termino } , 
		beforeSend: function(){			
			show_load_enid(".place_fecha_evento" , "Actualizando fecha del evento .. " , 1); 	
		}
	}).done(function(data){

		$(".place_fecha_evento").empty();
		id_new_tag = "#"+ id_evento;
		new_date = "<i class='fa fa-calendar-o'></i> " + update_inicio + "-" + update_termino; 	
		llenaelementoHTML( ".text-fecha-evento", "FECHA DEL EVENTO " +new_date);	 
		show_response_ok_enid(".place_fecha_evento", "Fecha del evento actualizada con éxito "); 					

	}).fail(function(){
		show_error_enid(".place_fecha_evento"  , "Error al actualizar la fecha del evento, reportar al administrador"); 		
	});
	return false;
}
/**/
function carga_section_escenarios(){
	url =  now  + "index.php/api/escenario/load/format/html/";		
	evento = $("#evento").val();		
	$.ajax({
		url : url , 
		data :  {"evento_escenario" : evento } , 
		dataType: "HTML",
		type :  "GET", 
		beforeSend :  function(){			
			show_load_enid(".place_nuevo_escenario" , "Cargando" , 1); 		
		}		
	}).done(function(data){
		$(".place_nuevo_escenario").empty();
		llenaelementoHTML(".section_escenarios_admin" , data);
	}).fail(function(){				
		show_error_enid(".place_nuevo_escenario"  , "Error al al registrar artista"); 		
	});
}
/**/
function carga_template_disponible_politica(){
	url =  now + "index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 4 ,  "public" :  0 ,  "identificador" :  "new_politica_template"} , 
		beforeSend : function(){
			show_load_enid(".place_politicas_tmp_seccion" , "Cargando contenidos disponibles " , 1); 		
		} 
	}).done(function(data){

		$(".place_politicas_tmp_seccion").empty();
		llenaelementoHTML(".politicas_tmp_seccion" , data);
		$(".new_politica_template").click(function(event){
			tipo_contenido =  "politica"; 
			record_contenido_evento_template(event);	
		} );

	}).fail(function(){
		show_error_enid(".place_politicas_tmp_seccion"  , "Error al al registrar artista"); 				
	});
}
/**/
function carga_template_disponible_restricciones(){

	url =  now + "index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 3 ,  "public" :  0 , "identificador" :   "new_restricciones_templ"} , 
		beforeSend : function(){
			show_load_enid(".place_restricciones_tmp_seccion" , "Cargando contenidos disponibles " , 1); 		
		} 
	}).done(function(data){

		$(".place_restricciones_tmp_seccion").empty();
		llenaelementoHTML(".restricciones_tmp_seccion" , data);
		
		$(".new_restricciones_templ").click(function(event){
		tipo_contenido =  "restriccion"; 
		record_contenido_evento_template(event);
		});
		

	}).fail(function(){
		show_error_enid(".place_restricciones_tmp_seccion"  , "Error al al registrar artista"); 				
	});
}
/**/
function carga_template_disponible_experiencia(){

	url =  now + "index.php/api/templ/tmp_contenido/format/json";	
	$.ajax({
		url : url , 
		type :  "GET",
		data : {"tipo" : 1 ,  "public" :  0 , "identificador" :   "contenido-text-templ"} , 
		beforeSend : function(){
			show_load_enid(".place_experiencias_tmp_seccion" , "Cargando contenidos disponibles " , 1); 		
		} 
	}).done(function(data){

		$(".place_experiencias_tmp_seccion").empty();
		llenaelementoHTML(".experiencias_tmp_seccion" , data);
		$(".contenido-text-templ").click(update_descripcion_evento_by_template);				

	}).fail(function(){
		show_error_enid(".place_experiencias_tmp_seccion"  , "Error al al registrar artista"); 				
	});

}
/**/
function registra_redes_sociales(e){

		url =  $("#form_social").attr("action");	
		evento  =  $("#evento").val(); 
		data_send = $("#form_social").serialize() + "&" + $.param({ "evento" :  evento });

		$.ajax({		
			url :  url , 
			type :  "PUT",
			data : data_send,
			beforeSend: function(){			
				show_load_enid(".place_social" , "Registrando cambios" , 1); 		
			}
		}).done(function(data){					
			show_response_ok_enid( ".place_social", "Redes sociales del evento actualizadas con éxito"); 			  		
		}).fail(function(){		
			show_error_enid(".place_social"  , "Error al registrar las redes sociales del evento"); 		
		});

	e.preventDefault();

}
/*Actualiza la tipificación del evento */
function update_tipificacion_evento(){
		
	tipificacion_evento  = $(this).val();
	url =  now + "index.php/api/event/tipificacion/format/json/";  
	evento =  $("#evento").val();
	$.ajax({
		url :  url , 
		type :  "PUT" ,
		data :  {"tipificacion_evento" : tipificacion_evento , "evento" : evento},
		beforeSend: function(){			
			show_load_enid(".place_tipo_evento" , "Registrando cambios" , 1); 		
		}
	}).done(function(data){

		show_response_ok_enid( ".place_tipo_evento", "Tipo de evento actualizado"); 	
		llenaelementoHTML("#tipificacion-evento" , tipificacion_evento);		
	}).fail(function(){
		show_error_enid(".place_tipo_evento"  , "Error al actualizar el tipo de evento, reporte al administrador"); 		
	});	
}/**/
/**/
function load_data_tematica(){			
	evento =  $("#evento").val();
	url =  now + "index.php/api/event/tematica/format/json/";    					
	data_send = $("#form-tematica").serialize() + "&" + $.param({"evento" : evento });
	$.ajax({
		url : url ,
		type :  "GET",
		data :  data_send, 
		beforeSend: function(){			
			show_load_enid(".place_tematica" , "Cargando .. " , 1); 				
		}

	}).done(function(data){		
		$(".place_tematica").empty();
		list_select = "";		
		for(var x in data ){
				
			if (data[x].idtematica == data[x].idtem ) {
				list_select += "<option value='"+data[x].idtematica +"' selected>"+ data[x].tematica_evento +" </option>";	
			}else{
				list_select += "<option value='"+data[x].idtematica +"'>"+ data[x].tematica_evento +" </option>";		
			}	
		}	
		llenaelementoHTML("#tematica_select" , list_select);
		$("#tematica_select").change(update_tematica_evento);

	}).fail(function(){		
		show_error_enid(".place_tematica" , "Error al cargar temática del evento, reporte al administrador" ); 
	});
}
/**/
function update_tematica_evento(){	

	url =now + "index.php/api/event/tematica/format/json/";		
	evento =  $("#evento").val();
	data_send =   $("#form-tematica").serialize() + "&" + $.param({"evento" :  evento});
	$.ajax({
		url : url , 
		type:  "PUT",
		data:  data_send, 
		beforeSend : function(){
			show_load_enid(".place_tematica" , "Actualizando temática del evento " , 1); 				
		}

	}).done(function(data){
		show_response_ok_enid( ".place_tematica", "Temática del evento actualizada con éxito"); 

	}).fail(function(){		
		show_error_enid(".place_tematica" , "Error al cargar temática del evento, reporte al administrador" ); 
	});
		
}
/**/
function evalua_modal(){		
	q =  $(".qparam").val();		
	switch(q) {

		case "restricciones":
			
			var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}
	    	$(".tab_restricciones").addClass("active");	    	
	    	get_contenido_evento_temp(3 , "#list_restricciones_evento");	

			break; 


		case "politicas":
			var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}	    	
	    	$(".tab_politicas").addClass("active");	    	
	    	get_contenido_evento_temp(4,  "#list_politicas_evento");

			break; 

	    case "servicios":	        

	    	/*
				$('#serviciosmodal').modal('show'); 
				load_data_servicios();
			*/
	        break;
	    case "serviciosincluidos": 

	    	$('#serviciosmodal').modal('show'); 
			load_data_servicios();			
	    	break;   

	    case "objs":	    	
	    	var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}	    	
	    	$(".tab_permitido").addClass("active");
	    	load_objetospermitidos_evento();
	    	show_section_dinamic_on_click("#section-articulos-permitidos");
	        break;


	    case "slogan":
	    	$("#slogan_seccion").css("background" , "#00BCD4");
	    	$("#slogan_seccion").css("color" , "white");

	   	
	    case "generosmusicales":

			var tabs  = [".tab_generos", ".tab_restricciones", ".tab_permitido" , ".tab_politicas", ".tab_evento"]; 	    	
	    	for (var x in tabs){
	    		$(tabs[x]).removeClass("active");		    	
	    	}	    		    
	    	$(".tab_generos").addClass("active");
	    	carga_generos_registrados();
	    	break;
	    default:
	        
	        break;
	}
}