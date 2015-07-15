$(document).on("ready", function(){

	
	$("#form-escenario").submit(nuevoescenario);
	$("footer").ready(loadescenarioss);
});



function  nuevoescenario(){

	url =  now  + "index.php/api/escenario/nuevo/format/json/";		

	
	
	$.post(url , $("#form-escenario").serialize() ).done(function(data){

			loadescenarioss();

	}).fail(function(){
		
		alert("ERR");

	});

	return false;
}


function  loadescenarioss(){
	
	url =  now  + "index.php/api/escenario/load/format/json/";		

	
	
	$.post(url , $("#form-escenario").serialize() ).done(function(data){

			llenaelementoHTML("#list_escenarios" , data);

	}).fail(function(){
		
		alert("ERR");

	});

}