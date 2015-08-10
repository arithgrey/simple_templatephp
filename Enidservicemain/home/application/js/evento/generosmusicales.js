function update_genero_evento(e){
	
	url = now + "index.php/generosmusicales/update_genero_evento/format/json";
	evento =  $("#evento").val();
	genero = e.target.id;
	
	$.post(url , { evento : evento , genero : genero   }).done(function(data){
		
	}).fail(function(){
		alert(genericresponse[0]);

	});


}

