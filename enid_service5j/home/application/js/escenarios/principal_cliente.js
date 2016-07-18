$(document).on("ready", function(){
	/**/
	$(".botonExcel").click(exporta_excel);
	edith_section();
	$("footer").ready(carga_seccion_artistas);
	$("footer").ready(cargar_otros);
});
/**/
function edith_section(){	
	/**/
	id_escenario =  $("#id_escenario").val();	
	nombre_escenario= $("#nombre_escenario").val();
	url =  now + "index.php/escenario/configuracionavanzada/" + id_escenario;	
	edit   =  url_editar_user( url , nombre_escenario ); 
	if (in_session == 1){		
		llenaelementoHTML( "#section-config" , url_next);  
	}	
}
/**/

/**/
function carga_seccion_artistas(){

	 url =  now +  "index.php/api/escenario/escenario_artista/format/json";
	//url =  now +  "index.php/api/escenario/escenario_artista_cliente/format/json"; 
	escenario = $("#id_escenario").val();	  
	
	$.ajax({			
		url :  url , 
		type: "GET", 
		data :  {escenario : escenario , "public" : 1 } , 
		beforeSend: function(){				
			show_load_enid(".place_artistas_escenario", "Cargando artistas del escenario" , 1); 
		}
	}).done(function(data){
		$(".place_artistas_escenario").empty();
		llenaelementoHTML(".artistas_escenario" , data);

	}).fail(function(){		
		show_error_enid(".place_artistas_escenario" , "Falla al actualizar el tipo de escenario, reporte al administrador " ); 
	});
}
/**/
function cargar_otros(){

	url =  now + "index.php/api/escenario/otros_escenarios/format/json/"; 	
	escenario = $("#id_escenario").val();	  	
	evento =  $(".evento").val(); 
	$.ajax({
		url : url , 
		type : "GET",
		data :  {escenario : escenario , evento  :  evento  } , 
		beforeSend :function(){
			show_load_enid(".otros_escenarios" , "Cargando" , 1); 	
		}
	}).done(function(data){
		llenaelementoHTML(".otros_escenarios" ,  data);
	}).fail(function(){
		show_error_enid(".otros_escenarios" , "Error al cargar la sección otros escenarios " ); 
	});
}





































