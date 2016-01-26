$(document).on("ready", function(){

	empresa  =  $("#empresa").val();
	$(".delete-acceso").click(remove_acceso);
	$(".editar-acceso").click(editar_acceso);
	$("#form-new-acceso").submit(record_acceso);
	$(".punto_venta").click(update_status_punto_venta_evento );
	$("#marcar-puntos-venta-todos").click(select_all);
	$(".img_acceso").click(function(e){
		acceso =e.target.id;
		$("#dinamic_acceso").val(acceso);
		$("#imgs-acceso").attr("value" , "");
		$("#lista-imagenes").html("");
	});
	$(".search-punto-venta").keyup(busqueda_punto_venta);
	$("#form-dinamic-punto-venta").submit(asocia_punto_venta_evento);
	$("#imgs-acceso").change(upload_main_imgs);
	$(".puntos_venta_contacto").click(load_data_puntos_venta_accesos_info);
	$(".delete_punto_venta_evento").click(delete_punto_venta_evento);
	$(".botonExcel").click(exporta_excel);
	$("#dinamic-form-accesos").submit(actualiza_data_accesos);
	evento = $("#evento").val(); 
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
	$.get(url , { evento : evento  } ).done(function(data){			
		llenaelementoHTML(".list-accesos" , data);				 	
		$(".delete-acceso").click(remove_acceso);
		$(".editar-acceso").click(editar_acceso);
		load_resumen_accesos();
	}).fail(function(){
		alert(genericresponse[0]);
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
function record_acceso(){

	url = $("#form-new-acceso").attr("action");
	registra_data(url , $("#form-new-acceso").serialize());
	load_data_accesos();	
	$("#response-ok-registro").show();	
	recorrepage("#response-ok-registro"); 
	muestra_alert_segundos("#response-ok-registro");
	var  fields_reset =  ["#acceso_nombre" ,  "precio-acceso-record" , "descripcion"];
	reset_fields(fields_reset);
	return false;
}
/**/
function update_status_punto_venta_evento (e){
	punto_venta = e.target.id;
	url = now + "index.php/api/puntosventa/punto_venta_evento/format/json";
	actualiza_data(url , {"evento" :  evento , "punto_venta" : punto_venta} );
	list_puntos_venta_evento();

	load_data_puntos_venta_asociados_accesos();

}
/**/
function list_puntos_venta_evento(){
	url = now + "index.php/api/puntosventa/punto_venta_evento/format/json";
	$.get(url , {"evento" :  evento} ).done(function(data){

		llenaelementoHTML(".puntos-venta-evento", data);
		$(".punto_venta").click(update_status_punto_venta_evento );
		$(".puntos_venta_contacto").click(load_data_puntos_venta_accesos_info);
		$(".delete_punto_venta_evento").click(delete_punto_venta_evento);
		
	}).fail(function(){
		alert("Error al cargar data ");
	});

}
/*Actualizo todos los puntos de venta  asociados al evento */
function select_all(){
		
	url  = $("#form-punto-in-evento").attr("action");	
	evento = $("#evento").val();	
	actualiza_data( url ,   {"evento" : evento});
	list_puntos_venta_evento();
	load_data_puntos_venta_asociados_accesos();

}

/*Carga el resumen de los accesos con ajax*/
function load_resumen_accesos(){
	url = now + "index.php/api/accesos/resumen_accesos_evento/format/json/";					
	$.get(url, {"evento" : evento} ).done(function(data){

		llenaelementoHTML("#resumen-acceso-evento" , data);

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
	load_data_puntos_venta_accesos_informacion(punto_venta);
}

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
/**/
function delete_punto_venta_evento(e){

	punto_venta =  e.target.id;		
	$("#aceptar-delete-punto-venta").click(function(){

			url =  now + "index.php/api/puntosventa/punto_venta_evento/format/json/";
			data_send =  {punto_venta :  punto_venta , evento :  evento }		
			$.ajax({
			   url: url,
			   type: 'DELETE',
			   data : data_send }).done(function(data){
			   list_puntos_venta_evento();
			   
			}).fail(function(){
			   		alert("Falla al eliminar el elemento");
			});
	});
	
} 
/**/
function busqueda_punto_venta(){

	text_input =  $(".search-punto-venta").val();
	url  =  now +  "index.php/api/puntosventa/busqueda_empresa/format/json/"; 

	$.get(url, {"punto_venta" : text_input , "empresa" :  empresa } ).done(function(data){
	
		llenaelementoHTML("#list-posibles-puntos" ,  data);

	}).fail(function(){

	});	
}
/**/
function asocia_punto_venta_evento(){

	url =  now + "index.php/api/puntosventa/evento/format/json/";
	text_input =  $(".search-punto-venta").val();
	$.post(url , { "punto_venta" : text_input    , "evento" :  evento ,  "empresa" :  empresa  } ).done(function(data){

		if (data ==  0) {


			llenaelementoHTML("#response-asociacion" , "<div class='alert-fail'  id='alert-punto-venta-fail'  > <em>El punto de venta que desea asociar al evento no se encuentra registrado, registre para completar la operación.!</em></div>");
			$("#alert-punto-venta-fail").show();

		}else{
			llenaelementoHTML("#response-asociacion" , "<div class='alert-ok' id='alert-punto-venta-ok' ><em>Punto de venta asociado alevento .! </em></div>");
			$("#alert-punto-venta-ok").show();
			muestra_alert_segundos("#alert-punto-venta-ok");

			
		}		
		list_puntos_venta_evento();
	}).fail(function(){
		/*Error */
		alert("Errror");
	});
	return false; 
}