$(document).on("ready", function(){
	$("#nuevo-evento-form").submit(trynewevent);
	
	$(".todo-entry").click(function(){
		
		
		$("#dinamic-field").show();
	});


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