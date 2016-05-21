$(document).on("ready", function(){
	/**/
	$(".botonExcel").click(exporta_excel);
	edith_section();


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

