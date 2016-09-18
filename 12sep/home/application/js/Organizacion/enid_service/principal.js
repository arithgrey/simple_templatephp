$(document).ready(function(){

	$("footer").ready(lista_prospectos);
});
/**/
function lista_prospectos(){
	

	url =  now +  "index.php/api/enid/prospectos/format/json/"; 

	$.ajax({
		url :  url , 
		type:  "GET", 
		beforeSend: function(){
			show_load_enid( ".place_prospectos" , "Cargando ..." , 1 );
		}

	}).done(function(data){
		$(".place_prospectos").empty();
		llenaelementoHTML(".prospectos" , data);

	}).fail(function(){
		show_error_enid(".place_prospectos" , "Error en la carga de prospectos, reporta al administrador"); 
	});


}