$(document).ready(function(){
	fg = 0;
	fecha = "";	
	/**/
	$(".dinamic_busqueda").click(busqueda_tmp_dinamic);
	$(".carga_resumen_eventos").click(carga_informe_global);
	$("#mostrar-abreviaturas").click(dinamic_description_global);
	$("#ocultar-abreviaturas").click(dinamic_description_global);
	$(".carga_resumen_cominidad").click(carga_informe_comunidad);			
});
/**/
function carga_informe_global(){

	/**/
	url =now + "index.php/api/reportes/global_empresa/format/json/"; 	
	
	$.ajax({ 
			url : url , 
			method: "GET",			
				beforeSend: function(xhr){
					/*mostramos el cargando ..... */							
					show_load_enid(".place_reporte_evento" , "Cargando ... " , 1 );
				}
			}).done(function(data){		
					
				$(".place_reporte_evento").empty();
				llenaelementoHTML(".reporte_evento" ,  data );

		}).fail(function(){			
			show_error_enid(".place_reporte_evento", "Error al cargar informe, reporte al administrador" ); 
		});
}/**/
/**/
function dinamic_description_global(){
	show_section_dinamic_on_click("#table-descriptions"); 
	show_section_dinamic_on_click("#mostrar-abreviaturas"); 
	show_section_dinamic_on_click("#ocultar-abreviaturas"); 
}
/**/
function  dinamic_info(){
	show_section_dinamic_on_click(".menos-info");
	show_section_dinamic_on_click(".mas-info");
	show_section_dinamic_on_click(".dinamic_campo_tb");
}
/**/
function busqueda_tmp_dinamic(e){
	/**/
	fg= e.target.id; 	
	llenaelementoHTML("#dinamic_fecha_text" , fg );
	carga_informe_global();	
}/**/
function  busqueda_tmp_dinamic_fecha(e) {
	fecha = e.target.id; 	
	carga_informe_global();		
}
