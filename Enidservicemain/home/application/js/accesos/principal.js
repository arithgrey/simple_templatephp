$(document).on("ready", function(){
		
		$(".acceso_evento").click(reporte_accesos);

});

function reporte_accesos(e){

	evento = e.target.id;

	place = ".acceso_in_event_" + evento;
	url = now + "index.php/api/accesos/tipoacceso/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){

		
		


		accesos_tag  = "";		
		for(var a = 0  in  data ) {
			
			idacceso= data[a].idacceso;
			url_next = now + "index.php/accesos/configuracionavanzada/"+idacceso+"/"+ evento+"/";
			accesos_tag += "<li><a href='"+url_next+"'>" + data[a].tipo + "</a></li>";
		}
		
		llenaelementoHTML( place , accesos_tag);

		

	}).fail(function(){
		

	});









}