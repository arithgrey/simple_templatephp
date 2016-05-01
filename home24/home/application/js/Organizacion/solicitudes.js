/*Cargamos los artistas de las encuestas*/
function load_artistas_solicitados(){
	/**/
	url =  now + "index.php/api/emp/solicitud_artista_top/format/json"; 
	empresa =  $("#id_empresa").val();

	$.get(url, {"empresa" : empresa }).done(function(data){
		/**/
	
		llenaelementoHTML(".section-artistas-solicitudes", data );

	}).fail(function(){
		alert("Error al cargar ");
	});


}
/*Cargamos los comentarios del público para ésta empresa*/
function load_comentatios_publicos(){
	/**/
	url =  now + "index.php/api/emp/historias_publico/format/json"; 
	$.get(url, {"empresa" : empresa }).done(function(data){
		/**/

		alert(data);
	}).fail(function(){
		alert("Error al cargar ");
	});


}

