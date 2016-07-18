function  carga_informe_comunidad(){
	
	url =  now + "index.php/api/emp/historias_publico_admin/format/json"; 
	$.ajax({
		url : url , 
		type: "GET", 
		beforeSend : function(){
			$(".load_resumen_comentarios").show();
		}
	}).done(function(data){		
		
		llenaelementoHTML(".resumen_comentarios" , data );
		$(".load_resumen_comentarios").hide();
	}).fail(function(){
		alert("Error al cargar ");
		$(".load_resumen_comentarios").hide();
	});
	
}