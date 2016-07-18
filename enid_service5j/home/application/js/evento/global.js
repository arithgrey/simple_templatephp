$(document).ready(function(){
	
	$(".puntos_venta_next").click(next_puntos_venta);	
    $("footer").ready(carga_ultima_actividad_eventos);                   
    $("#dinamic_activity_section_right").click(dinamic_section_left);
    $("#dinamic_activity_section_left").click(dinamic_section_right);    
    busqueda_eventos();
});
/**/
function busqueda_eventos(){
	url = now + "index.php/api/busqueda/eventos_pasados/format/json"; 
	$.ajax({
		url : url , 		
		beforeSend : function(){			
			show_load_enid(".ultimos_eventos"  , "Cargando .." , 1); 
		}
	}).done(function(data){
		
		llenaelementoHTML(".ultimos_eventos" , data );		

		$(".escenarios_evento").click(list_informe_escenarios);
		$(".puntos_venta_principal").click(carga_puntos_venta_evento);	
		$(".escenarios_artistas_principal").click(list_informe_artistas);
		$(".acceso_evento").click(reporte_accesos);	
				
	}).fail(function(){
		/**/		 		
		show_error_enid(".place_artista" , "Error al acargar los ultimos eventos de la empresa, reporte al administrador"); 
	});
}
