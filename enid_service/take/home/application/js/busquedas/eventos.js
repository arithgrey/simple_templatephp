$(document).on("ready" , function(){
	/*Cargamos por default  los del día*/
	$("footer").ready(load_events_dia);
	$("#busqueda-general-form").submit(busqueda_general_event);
	
});
/**/
function busqueda_general_event(){

	url = now + "index.php/api/busqueda/evento/format/json/";		
	$.get(url , $("#busqueda-general-form").serialize()).done(function(data){		

		llenaelementoHTML("#query-test" , data["query"]);
		llenaelementoHTML("#events" , data["block"]);

	}).fail(function(){
		alert("Error");
	});
	return false;
}
/**/
function load_events_dia(){

	url = now + "index.php/api/busqueda/eventos_dia/format/json/";		
	$.get(url).done(function(data){

			
		llenaelementoHTML("#events" , data);

	}).fail(function(){
		alert(data);
	});
	/**/
}
/**/
