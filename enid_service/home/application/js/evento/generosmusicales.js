function update_genero_evento(e){	

	url = now + "index.php/generosmusicales/update_genero_evento/format/json";
	evento =  $("#evento").val();
	genero = e.target.id;	



	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : { evento : evento , genero : genero   }  }).done(function(data){
	   	
	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});


	
}

