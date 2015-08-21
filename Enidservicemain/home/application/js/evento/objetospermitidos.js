function update_status_objpermitido(e){
	
	idobjetopermitido = e.target.id;
	url =now  + "index.php/api/event/objeto_permitido/format/json/";		
	data_send = {evento : $("#evento").val() , objetopermitido : idobjetopermitido }
	actualiza_data(url , data_send);
	load_objetospermitidos_evento();

}

function  load_objetospermitidos_evento() {
	
	url =now  + "index.php/api/event/objetospermitidos/format/json/";		
	evento =  $("#evento").val();

	$.get(url , {evento : evento }).done(function(data){

		llenaelementoHTML(".objetospermitidosf" , data);
		$(".objpermitido").click(update_status_objpermitido);

	}).fail(function(){
		alert(genericresponse[0]);
	});

}

function update_all_objects(e){
	id_evento = e.target.id;
	url = now + "index.php/api/event/all_objetos_permitidos/format/json/";			
	actualiza_data(url , {"evento" : id_evento } );
	load_objetospermitidos_evento();
}
