$(document).on("ready", function(){

	$("#form-escenario-artista").submit(nuevo_artista);
	$(".remove-artista").click(delete_escenario_artista);
});


function nuevo_artista(){
	url = now + "index.php/api/escenario/escenario_artista/format/json";	

	$.post(url, $("#form-escenario-artista").serialize()).done(function(data){

		load_data_escenario_artista();
	}).fail(function(){
		alert(genericresponse[0]);
	});
	return false;
}
/*cargamos la lista de artistas*/
function load_data_escenario_artista(){
	url =now + "index.php/api/escenario/escenario_artista/format/json";
		
	escenario =  $("#escenario").val();
	$.get(url, {"escenario" :  escenario}).done(function(data){

		llenaelementoHTML("#artistas-escenario-section", data);
		$(".remove-artista").click(delete_escenario_artista);
		$("#form-escenario-artista").submit(nuevo_artista);

	}).fail(function(){
		alert(genericresponse[0]);
	});
}
/*elimina artista del escenario */
function delete_escenario_artista(e){
	
	artista = e.target.id;
	escenario =  $("#escenario").val();
	
	url =now + "index.php/api/escenario/escenario_artista/format/json";
	eliminar_data(url , {"idescenario" : escenario , "idartista": artista });		
	load_data_escenario_artista();
}

