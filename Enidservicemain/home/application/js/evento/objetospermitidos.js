function update_status_objpermitido(e){
	
	idobjetopermitido = e.target.id;
	url =now  + "index.php/api/event/update_objeto_permitido/format/json/";		
	data_send = {evento : $("#evento").val() , objetopermitido : idobjetopermitido }
	updates_send(url , data_send);
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

