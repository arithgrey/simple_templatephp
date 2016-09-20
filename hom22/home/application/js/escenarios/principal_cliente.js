$(document).on("ready", function(){
	/**/
	$(".botonExcel").click(exporta_excel);
	edith_section();

	$("footer").ready(carga_data_empresa);		
	

	$("footer").ready(carga_num_asistentes);
	$(".btn_asistencia").click(carga_asistencia_user);

	$("footer").ready(carga_portada_escenario);
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
function carga_seccion_artistas(){

	url =  now +  "index.php/api/escenario/escenario_artista/format/json";	
	escenario = $("#id_escenario").val();	  
	in_session =  $(".in_session").val();
	$.ajax({			
		url :  url , 
		type: "GET", 

		data :  {escenario : escenario , "public" : 1  ,  "in_session" : in_session} , 
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
/**/
function carga_portada_escenario(){		
	url =  now + "index.php/api/escenario/slider_admin/format/json/"; 
	escenario =  $(".id_escenario").val();
	nombre =  $(".nombre_escenario").val(); 
	in_session =  $(".in_session").val();
	$.ajax({
		url : url , 		
		type: "GET" ,
		data : {"escenario" : escenario , "nombre_escenario" : nombre ,  "in_session" :  in_session , "public":  1 } ,
		beforeSend: function(){			
			show_load_enid( ".slider-principal-escenario" , "Cargando portada del escenario" , 1 ); 				
		}
	}).done(function(data){
		llenaelementoHTML(".slider-principal-escenario", data );
		
	}).fail(function(){		
		show_error_enid(".slider-principal-escenario", "Error al cargar la portada del escenario, reporte al administrador" ); 
	});
}