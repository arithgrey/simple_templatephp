$(document).on("ready" , function(){
	/*Carga informe user*/
	fg = 0;
	fecha = "";
	$("footer").ready(carga_informe_global);
	$(".dinamic_busqueda").click(busqueda_tmp_dinamic);
	
	
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

				//2016-03-22


				$("#load_cuadro_global").hide();				
				llenaelementoHTML("#cuadro_global_section" ,  data); 					
				$("#mostrar-abreviaturas").click(dinamic_description_global);
				$("#ocultar-abreviaturas").click(dinamic_description_global);

				$(".mas-info").click(dinamic_info);
				$(".menos-info").click(dinamic_info);
				$(".f_busqueda").click(busqueda_tmp_dinamic_fecha);
				/*Exportar excel*/
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
