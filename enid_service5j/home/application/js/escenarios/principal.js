/*lista el nombre del los escenarios en el botton */
function list_informe_artistas(e){
	evento = e.target.id;
	dinamic_section =  ".dinamic_section" + evento; 
	url = now + "index.php/api/escenario/escenario_evento_artista/format/json/";
	$.ajax({

			url : url , 			
			data: {"evento" : evento}, 
			type: "GET", 
			beforeSend: function(){
				/*Cargando .... */				
				show_load_enid(dinamic_section  , "Cargando .. " , 1); 
			}
		}).done(function(data){
			llenaelementoHTML(dinamic_section ,  data );
			$(".menos_info_artistas").click(menos_info_bloque_evento);
		
		}).fail(function(){
			show_error_enid(dinamic_section  , "Error al cargar, reporte al administrador"); 
		});
}
/*lista el nombre del los escenarios en el botton */
function list_informe_escenarios(e){
	
	evento = e.target.id;
	
	url = now + "index.php/api/escenario/escenario_evento/format/json/";
	dinamic_section =  ".dinamic_section" + evento; 
	llenaelementoHTML(dinamic_section , "");
	$.ajax({
			url : url , 			
			data: {"evento" : evento}, 
			type: "GET", 
			beforeSend: function(){							
				show_load_enid(dinamic_section  , "Cargando .. " , 1); 
			}
		}).done(function(data){

			llenaelementoHTML( dinamic_section , data);
			$(".escenario_evento_nuevo").click(try_new_escenario_in_evento);
			$(".menos_info_escenario").click(menos_info_bloque_evento);
		}).fail(function(){			
			show_error_enid(dinamic_section   , "Error en la carga, reporte al administrador "); 

		 });

}



/**/
function try_new_escenario_in_evento(e){
	evento = e.target.id;
	$("#registra-nuevo-escenario-form").submit(registra_nuevo_escenario);
}
/**/
function registra_nuevo_escenario(){
	
	/**/


		url =  now  + "index.php/api/escenario/escenario_evento/format/json/";				
		data_send =  $("#registra-nuevo-escenario-form").serialize() + "&" + $.param({"evento_escenario" : evento}); 
		$.ajax({
			url : url , 
			type : "POST", 
			data : data_send , 
			beforeSend :  function(){			
				show_load_enid(".place_nuevo_escenario" , "Cargando escenario al evento " , 1 );
			}
		}).done(function(data){
			next =  now + "index.php/escenario/configuracionavanzada/"+ data;
			show_response_ok_enid(".place_nuevo_escenario" , "Escenario registrado con éxito .!" ); 
			redirect(next);
		}).fail(function(){
			show_error_enid(".place_nuevo_escenario", "Error al cargar el escenario al evento reporte al administrador" );
		});

	return false;		
}
/**/
function menos_info_bloque_evento(e){	
	evento = e.target.id;
	dinamic_section =  ".dinamic_section" + evento; 
	llenaelementoHTML(dinamic_section ,  "");
	
}