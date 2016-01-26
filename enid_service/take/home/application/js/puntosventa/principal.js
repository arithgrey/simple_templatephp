$(document).on("ready", function(){
	var dinamic_pv = 0;

	$(".editar-punto-venta").click(edit_punto_venta);
	$("#form-puntos-venta").submit(record_punto_venta);
	$(".contactos").click(update_contactos_in_punto_venta);
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

	$("#nuevo-contacto-button").click(function(){
		llenaelementoHTML("#response-registro", "");
	});
	$("#f_contacto").keyup(function(){

		if ($("#f_contacto").val() !=  null ){
			buscar_contacto();	
		}	
	});

});
/*nuevo punto de venta*/
function record_punto_venta(){
	
	url  = $("#form-puntos-venta").attr("action");		
	$.post(url , $("#form-puntos-venta").serialize() ).done(function(data){

		load_data_puntos_venta(null);
		llenaelementoHTML("#response-registro", "<div class='panel  alert-ok'> <em> Punto de venta registrado! </em></div>");
		document.getElementById("form-puntos-venta").reset();
	}).fail(function(){	
		llenaelementoHTML("#response-registro", "<div class='panel alert-fail'> <em> Ocurrió una falla al intentar agregar el punto de venta, si el punto agregado no aparece en el listado intentar nuevamente, reporte error </em></div>")
	});	
	return false;
}
/**/
function update_contactos_in_punto_venta(e){

	llenaelementoHTML(".contactos_encontrados" , "");
	llenaelementoHTML(".status-punto-venta-contacto" , "");
	

	var fields  =  ["#f_contacto"];
	reset_fields(fields);


	punto_venta =  e.target.id;
	dinamic_pv =  punto_venta;
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

	/*Cargamos la data */
	$(".response-update").hide();				
	punto_venta = e.target.id;		
	carga_data_punto_venta(punto_venta);

	$(".form-puntos-venta-edit").submit(function(){
		
		url = $(".form-puntos-venta-edit").attr("action");
		actualiza_data(url , $(".form-puntos-venta-edit").serialize()+'&'+$.param({ 'punto_venta': punto_venta }) );		
		$(".response-update").show();				
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
		
		$("#nrazon_social").val(razon_social);		
		$("#ndescripcion").val(descripcion);

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
	
	q= $("#f_contacto").val();
	url =  now + "index.php/api/contactos/contacto_q/format/json/";
	$.get(url , {"q": q }).done(function(data){

		contactos =  ""; 
		for (var x in data ) {
			
			img =  now + data[x].base_path_img  + data[x].nombre_imagen;
			contactos +=  "<div class='col-lg-12' style='background:#0E5669 !important; color:white !important;'><div class='col-lg-1'><img width='100%' src='" + img + "'></div><div class='col-lg-10'><span>"+ data[x].nombre   + "- " + data[x].organizacion +" - "+ data[x].tel  + " - " + data[x].correo +" </span></div><div class='agregar_contacto col-lg-1' id='"+ data[x].idcontacto+ "'>+</div><br></div>"; 
		}
		
		llenaelementoHTML(".contactos_encontrados", contactos);


		$(".agregar_contacto").click(enlazar_contacto_punto_venta);
	}).fail(function(){
		alert("Error en la búsqueda");
	});		
} 
/**/
function enlazar_contacto_punto_venta(e){
	
	contacto = e.target.id;
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.ajax({url: url , type: 'PUT', data : {"punto_venta" :  dinamic_pv , "contacto" : contacto }  }).done(function(data){
			   	
		load_data_puntos_venta(null);				
		llenaelementoHTML(".status-punto-venta-contacto", "Contacto asociado al punto de venta");
	}).fail(function(){
		alert("Error");
	});
}
