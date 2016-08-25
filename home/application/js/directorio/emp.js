$(document).on("ready", function(){

	$("#form-contactos").submit(record_contacto);
	$("#nuevo-contacto-button").click(function(){	
	$(".status-registro").hide();
		document.getElementById("form-contactos").reset();	
	});

});
function record_contacto(e){

	url = $("#form-contactos").attr("action");	
	$.ajax( { url: url  , type: 'PUT',
	   data : $("#form-contactos").serialize() }).done(function(data){
		$(".status-registro").show();
	}).fail(function(){
		alert("Error");
	});
		

	e.preventDefault();
}	
/**/
