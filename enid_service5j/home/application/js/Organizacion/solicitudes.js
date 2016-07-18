/*Cargamos los artistas de las encuestas*/
function load_artistas_solicitados(){
	/**/
	url =  now + "index.php/api/emp/solicitud_artista_top/format/json"; 	
	empresa  =  $("#id_empresa").val();
	$.get(url, {"empresa" : empresa }).done(function(data){
		/**/	
		llenaelementoHTML(".section-artistas-solicitudes", data );
		
	}).fail(function(){
		alert("Error al cargar ");
	});
}
/**/
function load_section_comunidad(){
	load_section_img_comunidad(); 
	load_comentatios_publicos(); 
	

}
/*Cargamos los comentarios del público para ésta empresa*/
function load_comentatios_publicos(){	
	/**/
	url =  now + "index.php/api/emp/historias_publico/format/json"; 
	empresa  =  $("#id_empresa").val();

	$.get(url, {"empresa" : empresa }).done(function(data){		
		llenaelementoHTML(".comentarios-usuarios" , data);
		
	}).fail(function(){
		alert("Error al cargar ");
	});
}

/**/
function load_section_img_comunidad(){
	url =  now + "index.php/api/img_controller/comunidad/format/json/";
	empresa  =  $("#id_empresa").val();
	$.get(url , {"empresa" : empresa } ).done(function(data){	
		llenaelementoHTML(".comunidad-experiencia-imgs" , data );
	}).fail(function(){
		alert();
	});
}
