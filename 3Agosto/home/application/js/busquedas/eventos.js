$(document).ready(function(){
	/**/
	$("footer").ready(function(){
			q_eventos(0);		
	});



	tipo_busqueda = 1; 
	$(".form-busqueda").submit(busqueda_eventos);
	$(".filtro").click(selecciona_filtro);
});


function busqueda_eventos(e){

	$(".eventos").empty();
	q_eventos(1); 
	e.preventDefault();
}
/*Busqueda de eventos */
function q_eventos(filtro_flag){

	url = now + "index.php/api/busqueda/eventos_enid/format/json"; 
	q =  $(".q").val();
	qtipo =  $(".qtipo").val();
	precio_evento =  $(".precio_evento").val();



	$.ajax({
		url : url , 	
		type: "GET", 
		data: { "filtro_flag" :  filtro_flag , "tipo_busqueda" :  tipo_busqueda , "q" : q  , "qtipo" :  qtipo ,  "precio_evento" : precio_evento},
		beforeSend : function(){			
			show_load_enid(".place_eventos"  , "Cargando .." , 1); 
		}
	}).done(function(data){
		$(".place_eventos").empty();
		llenaelementoHTML(".eventos" , data);		
	}).fail(function(){
		show_error_enid(".place_eventos" , "Error en la búsqueda de eventos, ayudanos a mejorar nuestros servicios, reporta al administrador"); 
	});
}
/**/
function selecciona_filtro(e){
	
	tipo_busqueda =  e.target.id;
	$(".seccion_tipo_evento").hide();
	$(".seccion_precios_evento").hide();
	$(".q").show();

	switch(tipo_busqueda){
		


		case "1": 
			
			$("#search_concept").text("Filtro por nombre del evento");						
			document.getElementById("q").placeholder = "Evento ";
			break; 

		case "2": 

			$("#search_concept").text("Filtro por género musical");				
			document.getElementById("q").placeholder = "Genero musical";
			break; 

		case "3": 
			$("#search_concept").text("Filtro por nombre del artísta");				
			document.getElementById("q").placeholder = "Artista";
			break; 

		case "4": 
			$("#search_concept").text("Filtro por locación");				
			document.getElementById("q").placeholder = "Locación ";			
			break;
		case "5": 

			$("#search_concept").text("Filtro por tipo de evento");							
			document.getElementById("q").placeholder = "Tipo de evento ";
			
			$(".q").css("display"  ,  "none");
			$(".seccion_tipo_evento").show();
			
			break; 

		case "0": 
			$("#search_concept").text("Aplicar filtro en todo");							
			document.getElementById("q").placeholder = "Artista , Genero musical , tipo ...   ";
			break; 

		case "6": 
			$(".seccion_tipo_evento").hide();
			$(".q").hide();			
			$("#search_concept").text("filtrar por precio");					
			$(".seccion_precios_evento").show();
			break; 
		default: 

			break;  
	}


}