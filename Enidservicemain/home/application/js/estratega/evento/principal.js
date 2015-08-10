$(document).on("ready", function(){

	$(".ver-todos").click(show_eventos_pasados);
	$("#nuevo-evento-form").submit(trynewevent);
	$(".todo-entry").click(function(){			
		$("#dinamic-field").show();		
	});

	$(".delete_evento").click(delete_evento);

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







