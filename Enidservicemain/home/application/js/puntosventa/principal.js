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


	$("#estado_punto_venta").change(function(){
		load_data_puntos_venta(null);
	});

	$("#nuevo-contacto-button").click(function(){
		llenaelementoHTML("#response-registro", "");
	});

});
/*nuevo punto de venta*/
function record_punto_venta(){
	
	url  = $("#form-puntos-venta").attr("action");		
	$.post(url , $("#form-puntos-venta").serialize() ).done(function(data){

		load_data_puntos_venta(null);
		llenaelementoHTML("#response-registro", "<div class='alert alert-info'><strong>Punto de venta agregado!</strong> </div>");
		document.getElementById("form-puntos-venta").reset();

	}).fail(function(){
		
		llenaelementoHTML("#response-registro", "<div class='alert alert-warning'><strong>Ocurrió una falla al intentar agregar el punto de venta, si el punto agregado no aparece en el listado intentar nuevamente, reporte error</strong> </div>")
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

	estado_punto_venta = $("#estado_punto_venta").val();
	
	$.get(url, {"filtro" : filtro , "estado" :  estado_punto_venta } ).done(function(data){

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
		load_resumen_punto_venta();

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
/**/
function load_resumen_punto_venta(){

	url = now + "index.php/api/puntosventa/puntoventaresumen/format/json/";
	$.get(url).done(function(data){

		
		llenaelementoHTML("#punto-venta-resumen" , data);

	}).fail(function(){
		alert("Error al cargar el resumen");
	});
}