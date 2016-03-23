$(document).on("ready", function(){

	var dinamic_pv = 0;
	var  pv = 0;  

	$(".editar-punto-venta").click(edit_punto_venta);
	$("#form-puntos-venta").submit(record_punto_venta);
	$(".contactos").click(carga_section_contactos_admin);
	$(".delete-punto-venta").click(delete_punto_venta);

	$(".botonExcel").click(exporta_excel);
		$(".img_punto_venta").click(function(e){

								
			$(".dinamic_punto_venta").val(e.target.id);
			$('#lista-imagenes').html("");
			$("#imgs-punto-venta").change(upload_main_imgs);
		});

	$(".puntos-venta-filtro").keyup(function(){

		load_data_puntos_venta($(this).val());

	});

	$("#estado_punto_venta").change(function(){
		load_data_puntos_venta(null);
	});

	$("#busqueda-zona").change(function(){
		load_data_puntos_venta(null);
	});
	$("#busqueda-btn").click(function(){
		load_data_puntos_venta(null);
	});

	$("#nuevo-contacto-button").click(function(){
		llenaelementoHTML("#response-registro", "");
	});
	$("#f_contacto").keyup(function(){

		if ($("#f_contacto").val() !=  null ){
			buscar_contacto();	
		}	
	});

	$(".nota-punto-venta").click(load_nota_punto_venta);
	$("#form-nota-pv").submit(actualiza_nota_punto_venta);
	$("#text-busqueda-section").click(dinamic_busqueda);	
	
});
/*nuevo punto de venta*/
function record_punto_venta(){
	
	url  = $("#form-puntos-venta").attr("action");			
	$.post(url , $("#form-puntos-venta").serialize() ).done(function(data){

		load_data_puntos_venta(null);
		

		llenaelementoHTML("#response-registro", "<div class='panel  alert-ok' id='alert-registro-ok'> <em> Punto de venta registrado! </em></div>");
		$("#alert-registro-ok").show();
		muestra_alert_segundos("#alert-registro-ok");

		document.getElementById("form-puntos-venta").reset();
	}).fail(function(){	


		llenaelementoHTML("#response-registro", "<div class='panel alert-fail' id='alert-registro-fail'> <em> Ocurrió una falla al intentar agregar el punto de venta, si el punto agregado no aparece en el listado intentar nuevamente, reporte error </em></div>")
		$("#alert-registro-fail").show();
		muestra_alert_segundos("#alert-registro-fail");

	});	
	return false;
}
/**/
function carga_section_contactos_admin(e){
	$("#resultado-filtro-contactos-div").hide();	
	punto_venta =  e.target.id;
	dinamic_pv =  punto_venta;	
	load_contactos_punto_venta();
}
/*Actualiza el estado del contacto asociado al punto de venta*/
function update_contacto_punto_venta( contacto , punto_venta ){

	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	registra_data(url , {"contacto" :  contacto , "punto_venta": punto_venta } );
}
/**/
function delete_punto_venta(e){
		
	punto_venta = e.target.id;	
	url  = $("#form-puntos-venta").attr("action");
	$("#aceptar-delete").click(function(){
		$.ajax({
		   url: url,
		   type: 'DELETE',
		   data : {"punto_venta" :  punto_venta}  }).done(function(data){
		   	load_data_puntos_venta(null);
		   	/**/
		   	llenaelementoHTML("#stado-usuarios" , "<div class='alert-ok' id='estado-usr'><em>Puntos de venta eliminados correctamente</em></div>");
		   	complete_alert_ok_modal( "#estado-usr", "#delete-punto-venta-modal");

		}).fail(function(){
		   	llenaelementoHTML("#stado-usuarios" , "<div class='alert-fail' id='estado-usr'><em>Falla al eliminar el punto de venta, reportar al administrador</em></div>");
		   	$("#estado-usr").show();


		});	
	});	
}
/**/
function load_data_puntos_venta(filtro ){
	

	url = $("#form-puntos-venta").attr("action");
	estado_punto_venta = $("#estado_punto_venta").val();
	zona_punto_venta = $("#busqueda-zona").val();

	$.get(url, {"filtro" : filtro , "estado" :  estado_punto_venta , "zona" : zona_punto_venta  } ).done(function(data){

		llenaelementoHTML( "#puntos-venta-list" , data);
		$(".contactos").click(carga_section_contactos_admin);
		$(".delete-punto-venta").click(delete_punto_venta);
		$(".editar-punto-venta").click(edit_punto_venta);

		$(".img_punto_venta").click(function(e){
			
			$("#imgs-punto-venta").attr("value" , "");			
			$(".dinamic_punto_venta").val(e.target.id);
			$('#lista-imagenes').html("");
			$("#imgs-punto-venta").change(upload_main_imgs);
			$(".nota-punto-venta").click(load_nota_punto_venta);
		});
		load_resumen_punto_venta();

	}).fail(function(){
		alert("Falla al cargar ....");
	});
}




/**/
function edit_punto_venta(e){	

	/*Cargamos la data */
	$(".response-update").hide();				
	punto_venta = e.target.id;		
	carga_data_punto_venta(punto_venta);

	$(".form-puntos-venta-edit").submit(function(){
		
		url = $(".form-puntos-venta-edit").attr("action");

		actualiza_data(url , $(".form-puntos-venta-edit").serialize()+'&'+$.param({ 'punto_venta': punto_venta }) );		
		$("#punto-venta-alert-ok").show();
		muestra_alert_segundos("#punto-venta-alert-ok");

		load_data_puntos_venta(null);	
		return false;

	});

}
/**/
function carga_data_punto_venta(punto_venta){
	
	var  fields =  ["#nrazon_social" , "#ndescripcion"];
	reset_fields(fields); 

	url =  now +  "index.php/api/puntosventa/puntoconfig/format/json/"; 
	$.get(url , {"punto_venta" :  punto_venta} ).done(function(data){		
		
		/**/
		razon_social =  data[0].razon_social;
		descripcion =  data[0].descripcion;	
		zona =  data[0].zona;

		$("#nrazon_social").val(razon_social);		
		$("#ndescripcion").val(descripcion);

		document.getElementById("nzona").value = zona;

	}).fail(function(){
		alert("Registro");
	});
}
/**/







function load_resumen_punto_venta(){

	url = now + "index.php/api/puntosventa/puntoventaresumen/format/json/";
	$.get(url).done(function(data){

		llenaelementoHTML("#punto-venta-resumen" , data);

	}).fail(function(){
		alert("Error al cargar el resumen");
	});
}/**/
function buscar_contacto(){


	$("#resultado-filtro-contactos-div").hide();
	q= $("#f_contacto").val();	
	/**/
	if (q.length > 0 ) {
		
		url =  now + "index.php/api/contactos/contacto_q_img/format/json/";
		$.get(url , {"q": q }).done(function(data){	
			llenaelementoHTML("#resultado-filtro-contactos-div" , data);		
			$("#resultado-filtro-contactos-div").show(600);

			$(".result-busqueda-contacto").click(enlazar_contacto_punto_venta);
		}).fail(function(){
			alert("Error en la búsqueda");
		});		
	}	
} 
/**/
function enlazar_contacto_punto_venta(e){	
	contacto = e.target.id;		
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.ajax({url: url , type: 'PUT', data : {"punto_venta" :  dinamic_pv , "contacto" : contacto }  }).done(function(data){			   			
		/****** ********************* ***************** ******************** ************** */
		/*Cargamos los contactos del punto de venta */
		load_contactos_punto_venta(); 
		/*Terminamos de cargar y lanzamos el mensaje  */
		llenaelementoHTML(".status-punto-venta-contacto", "<div class='alert-ok' id='contact-status-add' ><em>Contacto agregado correctamente .! </em></div>");	
		complete_alert("#contact-status-add");
		/****** ********************* ***************** ******************** ************** */
	}).fail(function(){
		alert("Error");
	});
}
/**/
function load_contactos_punto_venta(){

		
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.get(url, {"punto_venta" :  dinamic_pv}).done(function(data){		
		/*Cargamos los ya registrados en la sección pertinente  */		
		llenaelementoHTML("#contactos-punto-venta" , "");		
		llenaelementoHTML("#contactos-punto-venta" , data);		
		$(".delete-contacto-icon").click(elimina_enlace);

	}).fail(function(){
		alert("error al cargar ");
	});	

}
/**/
function elimina_enlace(e){

	contacto =  e.target.id;	
	data_send =  {"contacto" :  contacto , "punto_venta" :  dinamic_pv };
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";

	$.ajax({
	   url: url,
	   type: 'DELETE',
	   data : data_send }).done(function(data){	   	
	   	
	   		load_contactos_punto_venta();
	   		llenaelementoHTML("#response-contacto-punto-venta" , "<div class='alert-ok' id='response-ok-cpv'><em >El contacto quitado del punto de venta correctamente.!</em></div>" );
	   		complete_alert("#response-ok-cpv");

	}).fail(function(){

	   	alert("falla al intentar actualizar, reporte al administrador");
		
	});

}
/**/
function load_nota_punto_venta(e){
	

	punto_venta  = e.target.id;
	pv= punto_venta;

	url =  now + "index.php/api/puntosventa/punto_venta/format/json/"; 
	$.get(url , {"punto_venta" : punto_venta} ).done(function(data){
		
		valorHTML("#nota-punto-venta" , data[0].descripcion);

	}).fail(function(){
		alert("Error al cargar datos reportar al administrador ");
	});
	//$("#btn-update-nota")
}
/**/
function actualiza_nota_punto_venta(){		
	data_send = $("#form-nota-pv").serialize() + "&" + $.param({"punto_venta": pv });
	url =  $("#form-nota-pv").attr("action");

	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send }).done(function(data){	   	
	   	complete_alert("#alert-ok-nota");
	}).fail(function(){

	   	alert("falla al intentar actualizar, reporte al administrador");
		complete_alert("#alert-fail-nota");	   	
	});

	return false;
}
/**/
function dinamic_busqueda(){
	/**/
	showonehideone( "#busqueda-contactos-section", "#text-busqueda-section"); 	
}
