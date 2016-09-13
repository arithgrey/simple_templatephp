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

    $(".btn_nuevo_evento").click(evalua_disponibilidad);

    carga_ultima_actividad_eventos();
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
				llenaelementoHTML(".place_enid_eventos_venta" ,  "<br><center> <a href='"+url_next_evaluacion+"'><button class='btn_nnuevo'> Evalúa tu experiencia  y publica 2 eventos más gratis</button></a></center> <br><center> <a href='"+url_next+"'><button class='btn_nnuevo'> Conoce que planes hay para ti.! </button></a></center>");
			}

			
		}

	}).fail(function(){
		show_error_enid(".place_enid_eventos" , "Error al cargar formulario de registro, reporte al administrador"); 
	});
}
/**/
