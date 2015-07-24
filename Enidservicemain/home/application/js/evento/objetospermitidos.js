function update_status_objpermitido(e){

	

	
	url =now  + "index.php/api/event/update_objeto_permitido/format/json/";		
	evento =  $("#evento").val();
	idobjetopermitido = e.target.id;

	$.post(url , {evento : evento , objetopermitido : idobjetopermitido }).done(function(data){


		loadobjetospermitidos();

	}).fail(function(){
		alert(genericresponse[0]);
	});


}

function  loadobjetospermitidos() {
	

	url =now  + "index.php/api/event/objetospermitidos/format/json/";		
	evento =  $("#evento").val();

	$.get(url , {evento : evento }).done(function(data){

		

		llenaelementoHTML(".objetospermitidosf" , data);
		$(".objpermitido").click(update_status_objpermitido);

	}).fail(function(){
		alert(genericresponse[0]);
	});


}

