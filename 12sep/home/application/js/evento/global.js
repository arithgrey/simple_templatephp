$(document).ready(function(){	

	$("#nuevo-evento-form").submit(registra_evento);
	$("#nombre-nuevo-evento").click(function(){			
		$("#dinamic-field").show();		
	});
	$(".delete_evento").click(delete_evento);
	$(".edith-fecha-evento").click(update_fecha_evento_evento);	


	$(".puntos_venta_next").click(next_puntos_venta);	
    $("#dinamic_activity_section_right").click(dinamic_section_left);
    $("#dinamic_activity_section_left").click(dinamic_section_right);        
    	

    $( "#fecha_inicio" ).datepicker();
    $( "#fecha_termino" ).datepicker();

    $(".reservaciones_event").click(evalua_disponibilidad);

    carga_ultima_actividad_eventos();
    evalua_q();
    
});
/**/
function q_eventos(){

	url = now + "index.php/api/busqueda/eventos_empresa/format/json"; 
	id_empresa  =  $(".empresa").val();
	$.ajax({
		url : url , 	
		type: "GET", 
		data: {"id_empresa" : id_empresa },
		beforeSend : function(){			
			show_load_enid(".ultimos_eventos"  , "Cargando .." , 1); 
		}
	}).done(function(data){
		llenaelementoHTML(".ultimos_eventos" , data );		
		
		$(".escenarios_evento").click(list_informe_escenarios);
		$(".puntos_venta_principal").click(carga_puntos_venta_evento);	
		$(".escenarios_artistas_principal").click(list_informe_artistas);
		$(".acceso_evento").click(reporte_accesos);		
		$(".reservaciones_event").click(carga_reservaciones);

	}).fail(function(){
		show_error_enid(".place_artista" , "Error al acargar los ultimos eventos de la empresa, reporte al administrador"); 
	});
}
function registra_evento(e){




	flag =  valida_text_form("#nombre-nuevo-evento" , ".place_nombre" , 3 , "Nombre para el evento " ); 



	if (flag ==  1 ){

		/*Realizamos la validación por fechas*/
		flag2 =  valida_format_date("#fecha_inicio" , "#fecha_termino" , ".place_format_fecha" ,  "La fecha del evento no puede ser menor a la fecha actual");
		
		if (flag2 ==  0){

			url = now + "index.php/api/event/nuevo_evento/format/json";		
			$.ajax({
				url : url , 
				type: "POST" , 
				data :  $("#nuevo-evento-form").serialize() , 
				beforeSend :function(){		
					$(".place_nombre").empty();
					show_load_enid(".place_nuevo_evento", "Registrando evento .... " , 1); 			
				}
			}).done(function(data){
				
				show_response_ok_enid(".place_nuevo_evento" , "Evento registrado con éxito.!");	
				redirect(data);			
			}).fail(function(){		
				show_error_enid(".place_nuevo_evento" , "Falla al registrar evento, reporte al administrador");			
			});
		}
		
	


	}	
	e.preventDefault();
}
/**/
function delete_evento(e){
	id_evento = e.target.id;
	url = now + "index.php/api/event/evento/format/json/";	
		$.ajax({
			url : url , 
			type :  "DELETE", 
			data :   {evento : id_evento} ,
			beforeSend : function(){
				/**/
				//alert();

			}
		 }).done(function(data){
		 	/**/
		 }).fail(function(){
		 	/**/
		 });
		 redirect("");
}
/***            ***************************************                  ***************** **/
function update_fecha_evento_evento(e){
	
	id_evento = e.target.id;	 
	$("#update-susses").hide();	
	$("#update-fecha-evento-form").submit(function(){
		/*update evento */	 	
		 	update_inicio = $("#update_inicio").val();
		 	update_termino = $("#update_termino").val();
		 	url = now + "index.php/api/event/date_by_id/format/json/";	 		 	
		 	actualiza_data(url , { "evento" : id_evento , "nuevo_inicio" : update_inicio , "nuevo_termino" : update_termino } );		
			id_new_tag = "#"+ id_evento;
			new_date = "<i class='fa fa-calendar-o'></i> " + update_inicio + "-" + update_termino; 	
		
			$("#update-susses").show();	
	 	/*update evento end */
		return false;
	});
}

/**/
function evalua_disponibilidad(){

	url =  now + "index.php/api/emp/status_empresa/format/json/";  
	$(".seccion-form-eventos").hide();
	$.ajax({
		url : url , 
		type : "GET",
		beforeSend : function(){
			show_load_enid(".place_enid_eventos"  , "Cargando ..." , 1); 
		}
	}).done(function(data){
		$(".place_enid_eventos").empty();
		

		console.log(data.estatus_empresa);
		console.log(data);
		if (data.estatus_empresa == 1){
			$(".seccion-form-eventos").show();
		}else{

			$(".seccion-form-eventos").empty();
			llenaelementoHTML(".place_enid_eventos",  data.estatus_text);

			if (data.propuesta_venta ==  "1") {

				url_next_evaluacion=  now + "index.php/home/evaluacion";
				url_next = now + "index.php/home/planes";
				llenaelementoHTML(".place_enid_eventos_venta" ,  "<br><center> <a href='"+url_next_evaluacion+"'><button class='btn_nnuevo'> Evalúa tu experiencia  y publica 2 eventos más gratis</button></a></center>");
			}

			
		}

	}).fail(function(){
		show_error_enid(".place_enid_eventos" , "Error al cargar formulario de registro, reporte al administrador"); 
	});
}
/**/

function carga_reservaciones(e){

	id_evento  =e.target.id;
	$(".dinamic_event").val(id_evento);

	url =  $(".form-servaciones").attr("action");
	$.ajax({
		url :  url , 
		data :  {"tipo":  "evento" , "id_evento" :  id_evento } ,
		type :  "GET" ,
		beforeSend: function(){
			show_load_enid(".place_reservaciones" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){		
		
		console.log(data);
		$("#reservacion_tel").val(data[0].reservacion_tel);
		$("#reservacion_mail").val(data[0].reservacion_mail);
		$(".place_reservaciones").empty();
		$(".form-servaciones").submit(actualiza_reservaciones);

	}).fail(function(){
		show_error_enid(".place_reservaciones" , "Error al cargar las reservaciones, reporte al administrador");
	});	
}

/**/
function actualiza_reservaciones(e){

	data_send =  $(".form-servaciones").serialize() +  "&" + $.param({"tipo":  "evento"});	
	
	url =  $(".form-servaciones").attr("action");
	flag  =  valida_email_form("#reservacion_mail" , ".place_mail" );

	if ( flag == 1) {
		flag2 =  valida_tel_form("#reservacion_tel" ,  ".place_tel" ); 		
		if (flag2 ==  1 ) {
			$(".place_mail").empty();
			$(".place_tel").empty();
			$.ajax({
					url :  url , 
					data : data_send ,
					type :  "PUT" ,
					beforeSend: function(){
						show_load_enid(".place_reservaciones" ,  "Actualizado  ... " ,  1 );
					}
			}).done(function(data){			

				show_response_ok_enid( ".place_reservaciones", "Datos del las reservaciones actualizadas con éxito!"); 
				$("#reservaciones-modal").modal("hide");
				q_eventos();
				
			}).fail(function(){
				show_error_enid(".place_reservaciones" , "Error al actualizar las reservaciones, reporte al administrador");
			});

		}

	}
	
	e.preventDefault();
}
/**/
function evalua_q(){

	var  q = $(".q").val();	
	if(q.length == 11 ){
		//$("#prueba-enid").modal("show");
		url =  now + "index.php/api/mailrest/prospecto/format/json/"; 
		$.ajax({
			url :  url ,
			data : {"q" : q } ,
			beforeSend: function(){

			}
		}).done(function(data){
			
			console.log(data);
			if (data.mail_prospecto ==  0){
				url_next  = now + "index.php/mailclass/prospecto_user"; 						
				llenaelementoHTML(".place_notificacion" , "<iframe width='100%'  height='600px' src='"+url_next+"' ></iframe>");
				$("#prueba-enid").modal("show");	
			}
		}).fail(function(){
			console.log("Error ");
		});

	}
	
}