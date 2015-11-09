$(document).on("ready", function(){

	$("#form-contactos").submit(record_contacto);
	$("#nuevo-contacto-button").click(function(){
		
	$(".status-registro").hide();

		document.getElementById("form-contactos").reset();	
	});

	$("footer").ready(function (){
		
		load_contactos_dinamic();
	});

	$("#form-filtro").submit(load_contactos_dinamic);
	$(".botonExcel").click(exporta_excel);


});
function record_contacto(e){


	url = $("#form-contactos").attr("action");	

	$.post(url, $("#form-contactos").serialize()).done(function(data){
			$(".status-registro").show();
			load_contactos_dinamic();
			load_resumen_contactos();
			document.getElementById("form-contactos").reset();

						
	}).fail(function(){
		alert("Error al registrar contacto, informar al administrador si  el problema persiste");
	});			

	e.preventDefault();
}	

/**/








/**/
function get_data_contacto_in_modal(contacto){

	url = now + "index.php/api/contactos/contacto_id/format/json/";	

	$.get(url , {contacto : contacto}).done(function(data){
		
		
		//document.getElementById("#form-contactos-edit").reset();
		valorHTML("#nnombre" , data[0].nombre);
		valorHTML("#norganizacion" , data[0].organizacion);
		valorHTML("#ntelefono" , data[0].tel);
		valorHTML("#nmovil" , data[0].movil);
		valorHTML("#ncorreo" , data[0].correo);
		valorHTML("#ndireccion" , data[0].direccion);
		valorHTML("#npagina_web" , data[0].pagina_web);		
		valorHTML("#npagina_fb" , data[0].pagina_fb);		
		valorHTML("#npagina_tw" , data[0].pagina_tw);		
		
		


		$('#ntipo > option[value="'+ data[0].tipo +'"]').attr('selected', 'selected');

		valorHTML("#nmovil" , data[0].nota);
			

	}).fail(function(){
		alert("Error al cargar los datos del contacto, informar al administrador");
	});

}
/**/
function try_update_contacto(e){
	//document.getElementById("#form-contactos-edit").reset();
	$(".status-registro").hide();
	contacto =  e.target.id;
	get_data_contacto_in_modal(contacto);
	url = $("#form-contactos-edit").attr("action");	
	

	$(".form-contactos-edit").submit(function(){
		
		actualiza_data(url , $("#form-contactos-edit").serialize()+"&"+$.param({"idcontacto" : contacto })  );		
		$(".status-registro").show();

		load_contactos_dinamic();

		return false;
	});
	
}
/**/



function load_resumen_contactos(){

	url = now + "index.php/api/contactos/contactos_resumen/format/json/";

	$.get(url).done(function(data){
		
		llenaelementoHTML("#resumen-contactos" , data);

	}).fail(function(){

		alert("Error");
	}); 


}
/**/
function load_contactos_dinamic(){
	

	url = $("#form-contactos").attr("action");		
	$.get(url , $("#form-filtro").serialize()).done(function(data){
	
		llenaelementoHTML( "#section-contact" , data);
		$(".editar-contacto").click(try_update_contacto);
		
		$(".img_contacto").click(function(e){
				
			contacto = e.target.id;
			$("#dinamic_contacto").val(contacto);
			$("#lista-imagenes").html("");
			$("#imgs-contacto").attr("value" , "");		
			$("#imgs-contacto").change(upload_main_imgs);

			
		});
		$(".nota-c").click(load_nota_contacto);
		
	}).fail(function(){
		alert("Error al cargar tus contactos, informar al administrador si  el problema persiste");
	});

	return false;

}
/**/
function load_nota_contacto(e){
	
	contacto =  e.target.id;

	url = now + "index.php/api/contactos/contacto_id/format/json/";	

	$.get(url , {contacto : contacto}).done(function(data){
		

		llenaelementoHTML(".nota-contacto-text" , "");
		llenaelementoHTML(".nota-contacto-text" , data[0].nota);			
		

	}).fail(function(){
		alert("Error al cargar los datos del contacto, informar al administrador");
	});

}