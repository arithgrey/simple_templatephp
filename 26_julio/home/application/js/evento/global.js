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
    //busqueda_eventos();
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
/*
function busqueda_eventos(){

	url = now + "index.php/api/busqueda/eventos_pasados/format/json"; 
	$.ajax({
		url : url , 		
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
*/




function registra_evento(e){
	flag =  valida_text_form("#nombre-nuevo-evento" , ".place_nombre" , 3 , "Nombre para el evento " ); 
	if (flag ==  1 ) {
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

			
			show_response_ok_enid(".place_nuevo_evento" , "Nota actualizada con  éxito.!");	
			redirect(data[1]);			
		}).fail(function(){		
			show_error_enid(".place_nuevo_evento" , "Falla al registrar evento, reporte al administrador");			
		});
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

	/*
		$.post(url , {evento : id_evento}).done(function(data){	
		});
		redirect("");
	*/
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

}/*Termina la función update */





