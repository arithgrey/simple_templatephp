$(document).on("ready", function(){

	$(".editar-punto-venta").click(edit_punto_venta);
	$("#form-puntos-venta").submit(record_punto_venta);
	$(".contactos").click(update_contactos_in_punto_venta);
	$(".delete-punto-venta").click(delete_punto_venta);

	
		$(".img_punto_venta").click(function(e){

								
			$(".dinamic_punto_venta").val(e.target.id);
			$('#lista-imagenes').html("");
			$("#imgs-punto-venta").change(upload_main_imgs);
		});

	$(".puntos-venta-filtro").keyup(function(){

		load_data_puntos_venta($(this).val());

	});

});
/*nuevo punto de venta*/
function record_punto_venta(){
	
	url  = $("#form-puntos-venta").attr("action");		
	$.post(url , $("#form-puntos-venta").serialize() ).done(function(data){

		load_data_puntos_venta(null);


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
		   	load_data_puntos_venta(null);
		   	
		}).fail(function(){
		   		
		});
		
	});	





}
/**/
function load_data_puntos_venta(filtro ){


	url = $("#form-puntos-venta").attr("action");
	$.get(url, {"filtro" : filtro } ).done(function(data){

		llenaelementoHTML( "#puntos-venta-list" , data);
		$(".contactos").click(update_contactos_in_punto_venta);
		$(".delete-punto-venta").click(delete_punto_venta);
		$(".editar-punto-venta").click(edit_punto_venta);

		$(".img_punto_venta").click(function(e){

			
			$("#imgs-punto-venta").attr("value" , "");			
			$(".dinamic_punto_venta").val(e.target.id);
			$('#lista-imagenes').html("");
			$("#imgs-punto-venta").change(upload_main_imgs);
		});

	}).fail(function(){
		alert("Falla al cargar ....");
	});
}
/**/


function edit_punto_venta(e){	

	punto_venta = e.target.id;

	$(".form-puntos-venta-edit").submit(function(){
		
		url = $(".form-puntos-venta-edit").attr("action");

		actualiza_data(url , $(".form-puntos-venta-edit").serialize()+'&'+$.param({ 'punto_venta': punto_venta }) );
		load_data_puntos_venta(null);


		return false;

	});

}