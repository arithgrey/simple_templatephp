$(document).on("ready" , function(){

	$(".escenarios_evento").click(list_informe_escenarios);

});
/*lista el nombre del los escenarios en el botton */
function list_informe_escenarios(e){

	evento = e.target.id;
	place = ".escenarios_in_event_" + evento;
	url = now + "index.php/api/escenario/escenario_evento/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){

			
		escenarios_list  = "";		
		for(var a = 0  in  data ) {
			
			url_next = now + "index.php/escenario/configuracionavanzada/" + data[a].idescenario;
			escenarios_list += "<li><a href='"+url_next+"'>" + data[a].nombre + "</a></li>";
		}
		
		llenaelementoHTML( place , escenarios_list);

		

	}).fail(function(){
		

	});

}