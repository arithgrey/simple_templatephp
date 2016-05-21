function update_genero_evento(e){	
	
	url = now + "index.php/generosmusicales/update_genero_evento/format/json";
	evento =  $("#evento").val();
	genero = e.target.id;	

	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : { evento : evento , genero : genero   }  }).done(function(data){
	   	carga_generos_registrados();
	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});	
}
/*Cargamos los generos del evento */
function  carga_generos_registrados(){

	url = now + "index.php/api/event/genero_evento/format/json/";		
	evento =  $("#evento").val();
	$.get(url,{"evento" : evento }).done(function(data){
		/*Cargamos en el html los generos que ha registrado el usuario*/							
		llenaelementoHTML(".generos-registrados-evento", data );
	}).fail(function(){
		alert("Falla al cargar los generos reportar al administrador");
	});
}


