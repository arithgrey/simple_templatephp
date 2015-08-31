$(document).on("ready", function(){

	$(".update-status-evento").click(update_status_evento);	
});

function update_status_evento(e){
	

	id_evento = $("#id-evento").val();
	nuevo_status = e.target.id;
	url = now + "index.php/api/event/update_status/format/json/";
	actualiza_data(url , {"evento" : id_evento , "nuevo_status" : nuevo_status});
	
	

}


