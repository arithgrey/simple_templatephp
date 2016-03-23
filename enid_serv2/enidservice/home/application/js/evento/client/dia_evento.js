$(document).on("ready" , function(){
	
	$(".politicas-section").click(carga_section_politicas_evento);
	$(".restricciones-section").click(carga_section_restricciones_evento);
	
	evento =  $("#idevento").val();
	$(".mas-info").click(show_more_info);
	$(".menos-info").click(hide_more_info);
});

function carga_section_politicas_evento(){
	//	
	url = now + "index.php/api/templ/tipo_cliente/format/json/"; 
	$.get(url, {"tipo" : 4 ,  "evento": evento  } ).done(function(data){

		llenaelementoHTML(".list-politicas" , data );		

	}).fail(function(){

		alert("Error al cargar los datos");
	});
}



function carga_section_restricciones_evento(){
	//	
	url = now + "index.php/api/templ/tipo_cliente/format/json/"; 
	$.get(url, {"tipo" : 3 ,  "evento": evento  } ).done(function(data){

		llenaelementoHTML(".list-restricciones" , data );		

	}).fail(function(){

		alert("Error al cargar los datos");
	});
}
/**/
function show_more_info(e) {
	idservicio  = e.target.id;
	more = ".more_" + idservicio;	
	mas_info = ".info_serv"+idservicio;
	showonehideone( more ,   mas_info );

}
/**/
function hide_more_info(e){
	idservicio  = e.target.id;
	more = ".more_" + idservicio;	
	mas_info = ".info_serv"+idservicio;
	showonehideone( mas_info , more );
}