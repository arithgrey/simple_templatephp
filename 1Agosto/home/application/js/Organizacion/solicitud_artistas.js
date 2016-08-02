$(document).ready(function(){
	$("#solicitud-ciudad-form").submit(registra_solicitud_ciudad);
	$("footer").ready(artistas_solicitados);
});
/**/
function registra_solicitud_ciudad(e){
	url =  $("#solicitud-ciudad-form").attr("action");
	$.ajax({
		url : url , 
		type : "POST" , 
		data : $("#solicitud-ciudad-form").serialize() , 
		beforeSend :  function(){
			show_load_enid(".place_registro" , "Registrando tu ártista preferido" , 1 );				
		}
	}).done(function(data){
		
		show_response_ok_enid(".place_registro" , "Solicitud registrada con éxito.!");	
		document.getElementById("solicitud-ciudad-form").reset();

	}).fail(function(){
		show_error_enid(".place_registro" , "Problemas al registrar tu solicitud, reporte al administrador");		
	});
	e.preventDefault();
}
/**/
function artistas_solicitados(){

	url =  $("#solicitud-ciudad-form").attr("action");
	$.ajax({		
		url :  url , 
		type :  "GET",
		beforeSend: function(){			
			show_load_enid(".place_artistas" , "Cargando solicitudes  " , 1 );				
		}
	}).done(function(data){
		llenaelementoHTML(".place_artistas" , data ); 								
	}).fail(function(){
		show_error_enid(".place_artistas" , "Problemas al cargar tu solicitud, reporte al administrador");				
	});
}