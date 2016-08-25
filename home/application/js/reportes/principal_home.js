$(document).ready(function(){
	fg = 0;
	fecha = "";	
	/**/
	$(".dinamic_busqueda").click(busqueda_tmp_dinamic);
	$(".carga_resumen_eventos").click(carga_informe_global);
	$("#mostrar-abreviaturas").click(dinamic_description_global);
	$("#ocultar-abreviaturas").click(dinamic_description_global);
	$(".carga_resumen_cominidad").click(carga_informe_comunidad);			
	/**/
	$(".carga_resumen_solicitudes").click(carga_solicitados_artistas);
	/**/
	$(".carga_resumen_movimientos").click(carga_ultimos_movimientos);
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
/**/
function carga_solicitados_artistas(){
	/**/
	url = now +  "index.php/api/emp/solicitud_ciudad/format/json/";
	empresa =  $(".id_empresa").val();
	nombre_empresa =  $(".nombre_empresa").val();
	$.ajax({		
		url :  url , 
		type :  "GET",
		data :  {"empresa" :  empresa,  "nombre_empresa" :  nombre_empresa, "public" :  0 },
		beforeSend: function(){			
			show_load_enid(".place_solicitudes_artistas" , "Cargando solicitudes  " , 1 );				
		}
	}).done(function(data){
		llenaelementoHTML(".place_solicitudes_artistas" , data ); 								
	}).fail(function(){
		show_error_enid(".place_solicitudes_artistas" , "Problemas al cargar tu solicitud, reporte al administrador");				
	});	
}
/**/
function carga_ultimos_movimientos(){
	/**/
	url =  now +  "index.php/api/emp/actividades/format/json/";
	$.ajax({
		url :  url , 
		data : { "tipo_actividad" : "eventos" },
		type :  "GET",
		beforeSend: function(){
			show_load_enid(".place_ultimos_movimientos" , "Cargando ultimos movimientos" , 1 );				
		}
	}).done(function(data){
		llenaelementoHTML(".place_ultimos_movimientos" , data);
	}).fail(function(){		
		show_error_enid(".place_ultimos_movimientos" , "Problemas al cargar, reporte al administrador.");				
	});
}