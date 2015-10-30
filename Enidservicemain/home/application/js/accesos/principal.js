$(document).on("ready", function(){
		
		$(".acceso_evento").click(reporte_accesos);
		
		$(".puntos_venta_next").click(next_puntos_venta);


});

function reporte_accesos(e){

	evento = e.target.id;

	place = ".acceso_in_event_" + evento;
	url = now + "index.php/api/accesos/tipoacceso/format/json/";	
	$.get(url , {"evento" : evento} ).done(function(data){
		


		accesos_tag  = "";		

		url_nuevo_acceso = now + "index.php/accesos/configuracionavanzada/1/" + evento +"/#nuevoaccesosection";
		accesos_tag  += "<li><a href='"+ url_nuevo_acceso +"'> + Cargar Acceso</a></li>";
		for(var a = 0  in  data ) {
			
			idacceso= data[a].idacceso;
			url_next = now + "index.php/accesos/configuracionavanzada/"+idacceso+"/"+ evento+"/";
			accesos_tag += "<li><a href='"+url_next+"'>" + data[a].tipo + "</a></li>";
		}
		
		llenaelementoHTML( place , accesos_tag);
		$(".evento_acceso_nuevo").click(try_record_access);

	}).fail(function(){
		

	});
}
function next_puntos_venta(e){

	acceso = e.target.id;

	url =  now +  "index.php/accesos/configuracionavanzada/1/"+ acceso; 
	redirect(url);

}