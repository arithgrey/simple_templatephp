$(document).on("ready", function(){

	$(".ver-todos").click(show_eventos_pasados);
	$("#nuevo-evento-form").submit(trynewevent);
	$(".todo-entry").click(function(){			
		$("#dinamic-field").show();		
	});

	$(".delete_evento").click(delete_evento);
	$(".edith-fecha-evento").click(update_fecha_evento_evento);
	

});
function trynewevent(){
	
	url = now + "index.php/api/event/nuevo_evento/format/json";		
	$.post( url , $("#nuevo-evento-form").serialize()).done(function(data){

		
		if (data[0]==  true ) {

			$("#success-alert").show();
			$("#response-event").hide();

			redirect(data[1]);
		}else{
			llenaelementoHTML("#response-event" , data);			
		}
		
		

		
		

		

	}).fail(function(){
		
		llenaelementoHTML("#response-event" , genericresponse[0]);
	});

	return false;
}



function show_eventos_pasados(){

	url = now + "index.php/eventos/timeline";
	redirect(url);
}

function delete_evento(e){

	id_evento = e.target.id;


	url = now + "index.php/api/event/delete_byid/format/json/";
	$.post(url , {evento : id_evento}).done(function(data){	
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
	//	llenaelementoHTML(id_new_tag , new_date);	 
		$("#update-susses").show();	
	 	/*update evento end */
	 return false;

	});

}/*Termina la función update */






