$(document).on("ready", function(){

	empresa  =  $("#empresa").val();
	$(".delete-acceso").click(remove_acceso);
//	$(".editar-acceso").click(editar_acceso);
	$("#form-new-acceso").submit(record_acceso);
	$(".punto_venta").click(update_status_punto_venta_evento );
	$("#marcar-puntos-venta-todos").click(select_all);	
	$(".search-punto-venta").keyup(busqueda_punto_venta);
	
	
	$(".puntos_venta_contacto").click(load_data_puntos_venta_accesos_info);	
	$(".botonExcel").click(exporta_excel);
	$("#dinamic-form-accesos").submit(actualiza_data_accesos);
	evento = $("#evento").val(); 
	var dinamic_del_pv = 0; 
	$("#aceptar-delete-punto-venta").click(confirm_delete_punto_venta);
	//$(".puntos-venta-evento-section").click(load_data_puntos_venta_asociados_accesos);
	$(".section-puntos-venta").ready(carga_puntos_venta_agregados);
	$(".section-puntos-venta").ready(load_data_accesos);

	//$(".mas-info").click(dinamic_resumen);
	//$(".menos-info").click(dinamic_resumen_info);
	$("#nuevo-acceso-button").click(reset_form_acceso);
});
/*Eliminar al conformar */
function remove_acceso(e){

	acceso = e.target.id;	
	$("#aceptar-delete-acceso").click(function(){
	url = now + "index.php/api/accesos/deletebyid/format/json/";					
		$.post(url , { evento : evento , acceso :  acceso } ).done(function(data){
			load_data_accesos();					 
			/**/
			$("#response-ok-delete").show();
			muestra_alert_segundos("#response-ok-delete");

		}).fail(function(){
			$("#response-fail-delete").show();
			/**/

		});
	});
}
/**/
function load_data_accesos(){	

	url = now + "index.php/api/accesos/get_accesos_with_format_by_id_event/format/json/";		
	$.ajax({
		url :  url , 
		type :  "GET", 
		data : { evento : evento }, 
		beforeSend: function(){
			llenaelementoHTML(".list-accesos" , "Cargando accesos registrados en el evento. ");				 	
		}
	}).done(function(data){
		llenaelementoHTML(".list-accesos" , data);				 	
		
		$(".delete-acceso").click(remove_acceso);
		$(".editar-acceso").click(editar_acceso);
		$(".img_acceso").click(carga_imagen_acceso);
		/*Para cargar la info del acceso */
		

	}).fail(function(){
		llenaelementoHTML(".list-accesos" , genericresponse[0]);				 	
	});

	

}
/**/
function editar_acceso(e){

	acceso = e.target.id;	
	/**/
	var fields_reset = ["#nuevo-precio" , "#nuevo-inicio-acceso" , "#nuevo-termino-acceso" , "#nueva-descripcion" ];
	reset_fields(fields_reset);
	
	/**/
	url = now + "index.php/api/accesos/get_acceso_info_id/format/json/";		
	$.get(url, {"evento": evento   , "acceso" : acceso} ).done(function(data){

		for(var x in data ){

			idacceso  = data[x].idacceso;
			nota = data[x].nota;
			precio  = data[x].precio;
			inicio_acceso = data[x].inicio_acceso;
			termino_acceso = data[x].termino_acceso;
			tipo = data[x].tipo;

			valorHTML("#nuevo-precio" , precio );
			valorHTML("#nueva-descripcion" , nota );
			valorHTML("#nuevo-inicio-acceso" ,  inicio_acceso );
			valorHTML("#nuevo-termino-acceso" , termino_acceso );			
			valorHTML("#acceso" , idacceso);			
			$('#nuevo-tipo-acceso > option[value="' + tipo + '"]').attr('selected', 'selected');		
		}
		
	}).fail(function(){	
		alert(genericresponse[0]);
	});		
}
/**/
function actualiza_data_accesos(){
	/*evento*/

	url  = $("#dinamic-form-accesos").attr("action");
	data_send =  $("#dinamic-form-accesos").serialize(); 		
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){
		$("#alerta-accesos-edicio-ok").show();
		muestra_alert_segundos("#alerta-accesos-edicio-ok");
		load_data_accesos();

	}).fail(function(){

		$("#alerta-accesos-edicio-fail").show();
	   	alert("falla al intentar actualizar, reporte al administrador  ");
	});

	
	return false;
}
function record_acceso(e){

	url = $("#form-new-acceso").attr("action");
		
	//place_nombre_promo_vali
	flag  =  valida_text_form("#acceso_nombre" , ".place_nombre_promo_vali" , 5 , "Nombre de la promoción" ); 
	/*Falta validar el formato de los números*/	
	if (flag ==  1 ){
			$.ajax({
			url :  url , 
			type :  "POST", 
			data :  $("#form-new-acceso").serialize() , 
			beforeSend:function(){				
				llenaelementoHTML(".estado_registro_acceso",  "Registrando ");
			}
		}).done(function(data){

			llenaelementoHTML(".estado_registro_acceso",  "Promoción registrada con éxito.!" );
			load_data_accesos();	
			$("#response-ok-registro").show();	
			recorrepage("#response-ok-registro"); 
			muestra_alert_segundos("#response-ok-registro");
			var  fields_reset =  ["#acceso_nombre" ,  "#precio-acceso-record" , "#descripcion"];
			reset_fields(fields_reset);	

		}).fail(function(){
			llenaelementoHTML(".estado_registro_acceso" , "Falla al registrar acceso, reporte al administrador");
		});	
	}	
	e.preventDefault();
}
/**/
function update_status_punto_venta_evento (e){
	punto_venta = e.target.id;
	url = now + "index.php/api/puntosventa/punto_venta_evento/format/json";
	actualiza_data(url , {"evento" :  evento , "punto_venta" : punto_venta} );
	//list_puntos_venta_evento();
	//load_data_puntos_venta_asociados_accesos();

}
/**/
function select_all(){
		
	url  = $("#form-punto-in-evento").attr("action");	
	evento = $("#evento").val();	
	actualiza_data( url ,   {"evento" : evento});	
}

/*Carga el resumen de los accesos con ajax*/
function load_resumen_accesos(){
	url = now + "index.php/api/accesos/resumen_accesos_evento/format/json/";					
	$.get(url, {"evento" : evento} ).done(function(data){

		llenaelementoHTML("#resumen-acceso-evento" , data);
		$(".delete-acceso").click(remove_acceso);
		$(".editar-acceso").click(editar_acceso);
		$(".img_acceso").click(carga_imagen_acceso);
		

	}).fail(function(){

		alert("Error al cargar el resumen de los accesos en ele evento ");		
	});
}
/**/
function load_data_puntos_venta_asociados_accesos(){
	
	
	url = now + "index.php/api/accesos/resumen_accesos_punto_venta_evento/format/json/";					
	$.get(url, {"evento" : evento} ).done(function(data){		
		llenaelementoHTML("#puntos-venta-accesos-evento", data);
		

	}).fail(function(){
		alert("Error al cargar el resumen de los accesos en ele evento ");		
	});

}
/**/
function load_data_puntos_venta_accesos_info(e){

	punto_venta =  e.target.id;
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.get(url, {"punto_venta" :  punto_venta}).done(function(data){		
		llenaelementoHTML("#contactos-punto-venta" , data);

		$(".contacto-punto-venta").click(function(){
			contacto   = this.id;
			update_contacto_punto_venta( contacto , punto_venta);
		});
				
	}).fail(function(){
		alert("error al cargar ");
	});	

}
function update_contacto_punto_venta( contacto , punto_venta ){

	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	registra_data(url , {"contacto" :  contacto , "punto_venta": punto_venta } );
	//load_data_puntos_venta_accesos_informacion(punto_venta);
}

/*
function load_data_puntos_venta_accesos_informacion(e){

	punto_venta =  e;
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.get(url, {"punto_venta" :  punto_venta}).done(function(data){
		
		llenaelementoHTML("#contactos-punto-venta" , data);

		$(".contacto-punto-venta").click(function(){

			contacto   = this.id;
			update_contacto_punto_venta( contacto , punto_venta);
		});
				
	}).fail(function(){
		alert("error al cargar ");
	});	
}
*/

/**/
function delete_punto_venta_evento(e){

	punto_venta =  e.target.id;	
	dinamic_del_pv =  punto_venta; 		
} 
/**/
function confirm_delete_punto_venta(){
	url =  now + "index.php/api/puntosventa/punto_venta_evento/format/json/";
	data_send =  {punto_venta :  dinamic_del_pv , evento :  evento }		
	$.ajax({
		url: url,
		type: 'DELETE',
		data : data_send }).done(function(data){				

			carga_puntos_venta_agregados();			
			llenaelementoHTML("#response-dinamic-punto-venta", "<div><em class='alert-ok' id='delete-pv-ok'>Se ha quitado del  evento el punto de venta  </em></div>");
			complete_alert("#delete-pv-ok");

		}).fail(function(){

			llenaelementoHTML("#response-dinamic-punto-venta", "<div><em class='alert-fail' id='delete-pv-fail'>Se ha quitado del  evento el punto de venta  </em></div>");
			$("#delete-pv-fail").show();
			alert("Falla al eliminar el elemento");
		});
}
/**/
function busqueda_punto_venta(){

	text_input =  $(".search-punto-venta").val();
	if ( text_input.length > 0 ){		

		url  =  now +  "index.php/api/puntosventa/busqueda_empresa/format/json/"; 		


		$.ajax({
			url :  url ,  
			type: "GET" , 
			data : {"punto_venta" : text_input , "empresa" :  empresa } , 
			beforeSend: function(){
				llenaelementoHTML("#list-posibles-puntos" , "Cargando .. " );
			}

		}).done(function(data){
			
			llenaelementoHTML("#list-posibles-puntos" ,  data);
			$(".enid-filtro-busqueda").click(asocia_punto_venta_evento);
			$("#list-posibles-puntos").show(650);

		}).fail(function(){
			llenaelementoHTML("#list-posibles-puntos" , "Error al cargas los puntos de venta, reporte al administrador");
		});

		



	}else{

		$("#list-posibles-puntos").hide();
	}
}

/**/
function asocia_punto_venta_evento(e){

	puntosventa =  e.target.id; 
	data_send =  {"puntoventa" : puntosventa , "evento" :  evento }; 
	url =  now + "index.php/api/puntosventa/asocia_evento/format/json/"; 

	$.ajax({
		   url: url,
		   type: 'PUT',
		   data : data_send  , 
		   beforeSend :  function(){
		   		llenaelementoHTML("#list-posibles-puntos" , "Registrando ");	
		   }
		}).done(function(data){
	   		
	   		llenaelementoHTML("#list-posibles-puntos" ,  "Punto de venta asociado al evento con éxito.! ");
	   		carga_puntos_venta_agregados();	
	   		/*
		   	load_data_puntos_venta_asociados_accesos();
		   	
		   	llenaelementoHTML("#response-puntos-venta" , "<div class='alert-ok' id='dinamic-pv-ms' ><em>Punto de venta asociado al evento.! </em></div>");
		   	complete_alert("#dinamic-pv-ms");
		   	*/
	   	
	   	/**/
	}).fail(function(){
	   	alert("falla al intentar actualizar");
	   	llenaelementoHTML("#dinamic-pv-ms" , "<div class='alert-fail' id='dinamic-pv-ms' ><em>Falla al asociar el punto de venta </em></div>");
	});


}
/**/
function carga_puntos_venta_agregados(){	
	url  =  now + "index.php/api/puntosventa/evento_icon/format/json/"; 
	$.ajax({
			url : url , 
			type : "GET" ,
			data : {"evento" : evento} , 
			beforeSend : function(){
				llenaelementoHTML("#list-puntos-venta-icon" , "Cargando puntos de venta asociados al evento" );	
			}

		}).done(function(data){
			llenaelementoHTML("#list-puntos-venta-icon" , data );			
			eventos_puntos_venta_registrados();		
		}).fail(function(){
			llenaelementoHTML("#list-puntos-venta-icon" , "Error al cargar los puntos de venta asociados al  evento, reporte al administrador" );			
		});		
}
/**/
function eventos_puntos_venta_registrados(){
	$(".delete-punto-venta-icon").click(delete_punto_venta_evento);
	$(".img-horizontal").click(show_complete_info);
}
/**/
function dinamic_resumen(){
	resumen_event(".section-resumen" , ".menos-info" , ".mas-info");
}
/**/
function dinamic_resumen_info(){
	resumen_event("" , ".mas-info" , ".menos-info" );
	$(".section-resumen").hide();
}
/**/
function reset_form_acceso(){
	llenaelementoHTML(".estado_registro_acceso" ,  "");
}
/**/
function show_complete_info(e){
	/**/
	id_panel =  e.target.id; 		
	llenaelementoHTML(".info_puntos_venta_cargados" , id_panel);
}