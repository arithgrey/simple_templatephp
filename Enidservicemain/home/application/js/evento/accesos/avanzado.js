$(document).on("ready", function(){

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

	$("#imgs-acceso").change(upload_main_imgs);


});
/*Eliminar al conformar */
function remove_acceso(e){

	acceso = e.target.id;
	evento = $("#evento").val(); 

	$("#aceptar-delete-acceso").click(function(){
	url = now + "index.php/api/accesos/deletebyid/format/json/";					
		$.post(url , { evento : evento , acceso :  acceso } ).done(function(data){
				load_data_accesos();					 
		}).fail(function(){
		alert(genericresponse[0]);
		});
	});
}
/**/

function load_data_accesos(){
	
	
	evento = $("#evento").val(); 
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
	evento = $("#evento").val(); 
	
	url = now + "index.php/api/accesos/get_acceso_info_id/format/json/";		
	$.get(url, {"evento": evento   , "acceso" : acceso} ).done(function(data){

		for(var x in data ){

			idacceso  = data[x].idacceso;
			nota = data[x].nota;
			precio  = data[x].precio;
			inicio_acceso = data[x].inicio_acceso;
			termino_acceso = data[x].termino_acceso;
			tipo = data[x].tipo

			valorHTML("#nuevo-precio" , precio );
			valorHTML("#nueva-descripcion" , nota );
			valorHTML("#nuevo-inicio-acceso" ,  inicio_acceso );
			valorHTML("#nuevo-termino-acceso" , termino_acceso );			
			valorHTML("#acceso" , idacceso);			
			$('#nuevo-tipo-acceso > option[value="' + tipo + '"]').attr('selected', 'selected');
			
		}

		$("#dinamic-form").submit(update_info_acceso);
	}).fail(function(){	
		alert(genericresponse[0]);
	});		
	

}
/*actualiza los datos del acceso*/
function update_info_acceso(e){	
	
	url = now + "index.php/api/accesos/udpate_acceso_id/format/json/";					
	updates_send(url , $("#dinamic-form").serialize() );	
	load_data_accesos();	
	return false;
}/**/

function record_acceso(){

	url = $("#form-new-acceso").attr("action");

	registra_data(url , $("#form-new-acceso").serialize());
	load_data_accesos()
	return false;
}/**/
function update_status_punto_venta_evento (e){

	evento = $("#evento").val(); 
	punto_venta = e.target.id;
	url = now + "index.php/api/puntosventa/punto_venta_evento/format/json";
	actualiza_data(url , {"evento" :  evento , "punto_venta" : punto_venta} );
	list_puntos_venta_evento();

	load_data_puntos_venta_asociados_accesos();

}
/**/
function list_puntos_venta_evento(){
	
	evento = $("#evento").val();
	url = now + "index.php/api/puntosventa/punto_venta_evento/format/json";
	$.get(url , {"evento" :  evento} ).done(function(data){

		llenaelementoHTML(".puntos-venta-evento", data);
		$(".punto_venta").click(update_status_punto_venta_evento );
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

}

/*Carga el resumen de los accesos con ajax*/
function load_resumen_accesos(){

		
	evento = $("#evento").val();		
	url = now + "index.php/api/accesos/resumen_accesos_evento/format/json/";					
	$.get(url, {"evento" : evento} ).done(function(data){

		llenaelementoHTML("#resumen-acceso-evento" , data);

	}).fail(function(){

		alert("Error al cargar el resumen de los accesos en ele evento ");		
	});
}
/**/
function load_data_puntos_venta_asociados_accesos(){

	evento = $("#evento").val();		
	url = now + "index.php/api/accesos/resumen_accesos_punto_venta_evento/format/json/";					
	$.get(url, {"evento" : evento} ).done(function(data){

		
		llenaelementoHTML("#puntos-venta-accesos-evento", data);

	}).fail(function(){

		alert("Error al cargar el resumen de los accesos en ele evento ");		
	});

}