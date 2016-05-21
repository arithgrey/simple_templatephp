$(document).ready(function(){
	fg = 0;
	fecha = "";	
	$(".dinamic_busqueda").click(busqueda_tmp_dinamic);
	$(".carga_resumen_eventos").click(carga_informe_global);

	$("#mostrar-abreviaturas").click(dinamic_description_global);
	$("#ocultar-abreviaturas").click(dinamic_description_global);
	

	$(".carga_resumen_cominidad").click(carga_informe_comunidad);
				

});


/**/
function carga_informe_global(){
	
	url =now + "index.php/api/reportes/global_administrador/format/json/"; 
	data_send =  {"fecha" : fecha , "flag":fg};
	$.ajax({ url : url , 
			method: "GET",
			data : data_send , 
				beforeSend: function(xhr){
					/*mostramos el cargando ..... */
					$("#load_cuadro_global").show();
				}
			}).done(function(data){	

				$("#load_cuadro_global").hide();				
				llenaelementoHTML("#cuadro_global_section" ,  data["reporte"]); 		
				llenaelementoHTML("#linea_tiempo_section" ,  data["linea_tiempo"]); 					

				$(".mas-info").click(dinamic_info);
				$(".menos-info").click(dinamic_info);
				$(".f_busqueda").click(busqueda_tmp_dinamic_fecha);							
				$(".botonExcel").click(exporta_excel);

		}).fail(function(){
			alert("Error");
	});

}/**/
/**/
function dinamic_description_global(){
	show_section_dinamic_on_click("#table-descriptions"); 
	show_section_dinamic_on_click("#mostrar-abreviaturas"); 
	show_section_dinamic_on_click("#ocultar-abreviaturas"); 
}
/**/
function  dinamic_info() {
	show_section_dinamic_on_click(".menos-info");
	show_section_dinamic_on_click(".mas-info");
	show_section_dinamic_on_click(".dinamic_campo_tb");

}
/**/
function busqueda_tmp_dinamic(e){
	
	fg= e.target.id; 	
	llenaelementoHTML("#dinamic_fecha_text" , fg );
	carga_informe_global();	

}/**/
function  busqueda_tmp_dinamic_fecha(e) {
	fecha = e.target.id; 	
	carga_informe_global();		
}
