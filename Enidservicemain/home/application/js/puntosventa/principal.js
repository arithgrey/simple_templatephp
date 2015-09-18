$(document).on("ready", function(){

	$("#form-puntos-venta").submit(record_punto_venta);
	$(".contactos").click(update_contactos_in_punto_venta);
	$(".delete-punto-venta").click(delete_punto_venta);
	$(".puntos-venta-filtro").keyup(function(){

		load_data_puntos_venta($(this).val());

	});

});
/*nuevo punto de venta*/
function record_punto_venta(){
	
	url  = $("#form-puntos-venta").attr("action");		
	$.post(url , $("#form-puntos-venta").serialize() ).done(function(data){

		load_data_puntos_venta(0);


	}).fail(function(){
		
		alert("Error al registrar");
	});	
	return false;
}
/**/
function update_contactos_in_punto_venta(e){

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
		   	
		}).fail(function(){
		   		
		});
		redirect("");	
	});		
}
/**/
function load_data_puntos_venta(filtro ){


	url = $("#form-puntos-venta").attr("action");
	$.get(url, {"filtro" : filtro } ).done(function(data){

		llenaelementoHTML( "#puntos-venta-list" , data);
		$(".contactos").click(update_contactos_in_punto_venta);
		$(".delete-punto-venta").click(delete_punto_venta);

	}).fail(function(){
		alert("Falla al cargar ....");
	});
}
/**/