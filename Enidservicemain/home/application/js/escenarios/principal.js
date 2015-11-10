$(document).on("ready" , function(){

	$(".escenarios_evento").click(list_informe_escenarios);
	$(".escenarios_artistas_principal").click(list_informe_artistas);

});


/*lista el nombre del los escenarios en el botton */
function list_informe_artistas(e){

	evento = e.target.id;
	place = ".artistas_in_event_" + evento;
	url = now + "index.php/api/escenario/escenario_evento_artista/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){


		artistas_list  = "";		
		if (data.length == 0) {
			artistas_list  += "<li><a> Ningún artista registrado en el evento</a></li>";			
		}
		
		for(var a = 0  in  data ) {
			
			//url_next = now + "index.php/escenario/configuracionavanzada/" + data[a].idescenario;
			artistas_list += "<li><a>" + data[a].nombre_artista + "</a></li>";
		}
		
		llenaelementoHTML( place , artistas_list);
		

	}).fail(function(){
		

	});

}



/*lista el nombre del los escenarios en el botton */
function list_informe_escenarios(e){

	evento = e.target.id;
	place = ".escenarios_in_event_" + evento;
	url = now + "index.php/api/escenario/escenario_evento/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){

			
		escenarios_list  = "";		

		escenarios_list  += "<li data-toggle='modal' data-target='#modal-nuevo-escenario-evento'  ><a class='escenario_evento_nuevo' id='"+ evento +"' > + Cargar escenario</a></li>";		

		for(var a = 0  in  data ) {
			
			url_next = now + "index.php/escenario/configuracionavanzada/" + data[a].idescenario;
			escenarios_list += "<li><a href='"+url_next+"'>" + data[a].nombre + "</a></li>";
		}
		
		llenaelementoHTML( place , escenarios_list);
		$(".escenario_evento_nuevo").click(try_new_escenario_in_evento);

		

	}).fail(function(){
		

	});

}



/**/
function try_new_escenario_in_evento(e){

	evento = e.target.id;

	$("#registra-nuevo-escenario-form").submit(function(){
		
		url =  now  + "index.php/api/escenario/escenario_evento/format/json/";				
		$.post(url , $("#registra-nuevo-escenario-form").serialize() + "&" + $.param({"evento_escenario" : evento})  ).done(function(data){

			
			next =  now + "index.php/escenario/configuracionavanzada/"+ data;
			redirect(next);

		}).fail(function(){
			
			alert("Error al cargar el escenario reportar al administrador");
		});


		return false;
	});
}