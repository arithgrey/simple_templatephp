$(document).on("ready" , function(){
	$(".evento_escenarios").hover(load_data_escenarios);
	$(".evento_artistas").hover(load_data_artistas);	
	$(".evento_generos").hover(load_data_generos);
	$(".evento_servicios").hover(load_data_servicios);	
	$(".contactos-modal-btn").click(load_data_contact);
	var punto_venta_global  = 0; 
});
/**/
function load_data_escenarios(e){
	
	evento  =  e.target.id;
	url = now + "index.php/api/escenario/escenario_evento/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){
				
		buttons =  ""; 			
		for(var x in data){

			nombre = data[x].nombre;
			idescenario = data[x].idescenario;
			idevento = data[x].idevento;
			url =  now + "/index.php/escenario/inevento/" + idescenario +"/" + idevento;
			buttons += "<a href='"+ url +"'><button class='btn-default'>" + nombre + "</button></a>";
		}

		llenaelementoHTML( "#escenarios_resumen" , buttons);


	}).fail(function(){
		alert("Error al cargar");
	});


}
/**/
function load_data_artistas(e){
	evento  =  e.target.id;
	url = now + "index.php/api/escenario/escenario_evento_artista/format/json/";
	$.get(url , {"evento" : evento} ).done(function(data){

				
		buttons =  ""; 			
		for(var x in data){

			nombre = data[x].nombre_artista ;			
			buttons += "<button  class='btn-default'>" + nombre + "</button>";
		}

		llenaelementoHTML( "#artistas_resumen" , buttons);


	}).fail(function(){
		alert("Error al cargar");
	});
}
/**/
function load_data_generos(e){

	evento  =  e.target.id;
	url =  now + "index.php/api/event/generos_musicales/format/json/"; 
	$.get(url , {"evento" :  evento } ).done(function(data){

		buttons =  ""; 			
		for(var x in data){

			nombre = data[x].nombre;			
			buttons += "<button  class='btn-default'>" + nombre + "</button>";
		}

		llenaelementoHTML( "#generos_resumen" , buttons);
		

	}).fail(function(){
		alert("Error al cargar");
	});

}
/**/
function load_data_servicios(e){
	evento  =  e.target.id;
	url =  now + "index.php/api/event/servicios/format/json/"; 

	$.get(url, {"evento" :  evento }).done(function(data){


		buttons =  ""; 			
		for(var x in data){

			nombre = data[x].servicio;			
			buttons += "<button  class='btn-default'>" + nombre + "</button>";
		}
		llenaelementoHTML( "#servicios_resumen" , buttons);
		

		
	}).fail(function(){
		alert("Error al cargar");
	});

}
/**/
function load_data_contact(e){
	
	punto_venta  = e.target.id;
	punto_venta_global =  punto_venta;
	url = now + "index.php/api/puntosventa/contacto/format/json"; 
	llenaelementoHTML(".informacion-contact" , "");

	$.get(url , {punto_venta : punto_venta_global} ).done(function(data){

		llenaelementoHTML(".informacion-contact" , data);
	}).fail(function(){

		alert("Error");
	});
	

}