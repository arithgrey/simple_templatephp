$(document).on("ready", function(){

	/*load datos al dar click */
	$(".ver-escenarios").click(load_escenarios);
	$(".ver-artistas").click(load_artistas);
	$(".ver-generos").click(load_generos);
	$(".ver-puntos-venta").click(load_puntos_venta);
	$(".ver-accesos").click(load_accesos);
	$(".botonExcel").click(exporta_excel);
	
	/*Termina load datos al dar click*/
});
/**/
function load_escenarios(e){

	evento =   e.target.id; 
	url =  now + "index.php/api/escenario/escenarios_evento_jfunnel/format/json/"; 
	$.get(url ,  {"evento" :  evento  }  ).done(function(data){
		clean_data(data , "Escenarios");
	}).fail(function(){

		alert("Error");
	});
}
/**/
function load_artistas(e){
	evento =   e.target.id; 
	url =  now + "index.php/api/escenario/artistas_evento/format/json/"; 
	$.get(url ,  {"evento" :  evento  }  ).done(function(data){

		clean_data(data , "Artistas");

	}).fail(function(){		
		alert("Error");
	});
}
/**/
function load_generos(e){
	evento =   e.target.id; 
	url =  now + "index.php/api/event/generos_musicales_complete/format/json/"; 
	$.get(url ,  {"evento" :  evento  }  ).done(function(data){
		clean_data(data , "Géneros musicales ");
	}).fail(function(){		
		alert("Error");
	});
}
/**/
function load_puntos_venta(e){

	evento =   e.target.id; 
	url =  now + "index.php/api/puntosventa/punto_venta_evento_complete/format/json/"; 
	$.get(url ,  {"evento" :  evento  }  ).done(function(data){

		clean_data(data , "Puntos de venta");

	}).fail(function(){		
		alert("Error");
	});
}
/**/
function load_accesos(e){
	evento =   e.target.id; 
	url =  now + "index.php/api/accesos/accesos_evento/format/json/"; 
	$.get(url ,  {"evento" :  evento  }  ).done(function(data){
		clean_data(data , "Puntos de venta");
	}).fail(function(){		
		alert("Error");
	});	
}
/**/
function clean_data(data , title ){

	llenaelementoHTML("#dinamic-section" , "");	
	llenaelementoHTML("#dinamic-section" , data);	
	llenaelementoHTML("#dinamic-title" , title);	
}
/**/