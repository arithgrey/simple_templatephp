$(document).on("ready", function(){

	dinamic_contacto_val = 0;
	var  dinamic_contacto_delete = 0;
	$(".editar-contacto").click(try_update_contacto);			
	$("#form-contactos").submit(record_contacto);
	load_contactos_dinamic();
	$("#form-filtro").submit(load_contactos_dinamic);
	$("#form-nota-contacto").submit(set_nota_contacto);

	$(".nota-c").click(load_nota_contacto);	
	$(".botonExcel").click(exporta_excel);	
	$(".delete_contacto").click(delete_contacto);	
	$(".mas-info").click(dinamic_section);
    $(".menos-info").click(dinamic_section_info);			

	$("#nuevo-contacto-button").click(function(){		
		$(".status-registro").hide();		
	});

	$(document).on('click' , '.img_contacto' , function(e){
			/**/			
			contacto = e.target.id;
			$("#guardar_img_contacto").hide();										
			$("#dinamic_contacto").val(contacto);			
			$(".imagen_contacto").change(upload_imgs_enid_contacto);
			$("#lista_imagenes_contacto").html("");
	});



});

/***************************Registros  Y UPDATES  ***********************************/
function record_contacto(e){
	url = $("#form-contactos").attr("action");
	
	$.ajax({
			url : url , 
			data :  $("#form-contactos").serialize() , 
			type: "POST" , 
			beforeSend: function(){
				$("#loading_nuevo_contacto").show();
			}
		}).done(
		function(data){		
			$("#status-registro").show();
			muestra_alert_segundos("#status-registro");
			load_contactos_dinamic();	
			$("#loading_nuevo_contacto").hide();

	}).fail(function(){
		alert("Error");
		$("#loading_nuevo_contacto").hide();
	});			
	

	e.preventDefault();
}	
/**/
function try_update_contacto(e){
	contacto =  e.target.id;
	get_data_contacto_in_modal(contacto);
	url = $("#form-contactos-edit").attr("action");	
	$(".form-contactos-edit").submit(function(){		
		actualiza_data(url , $("#form-contactos-edit").serialize()+"&"+$.param({"idcontacto" : contacto })  );				
		$("#status-registro").show();
		muestra_alert_segundos("#status-registro");
		load_contactos_dinamic();
		return false;
	});	
}
/**/
function set_nota_contacto(){
	url =  $("#form-nota-contacto").attr("action");	
	data_send =  $("#form-nota-contacto").serialize() +"&" + $.param({"contacto" : contacto});	
	actualiza_data(url , data_send );
	llenaelementoHTML(".response-nota",  " <div class='panel  alert-ok' id='nota-response-ok'> <em> Cambios registrados .! </em></div>");
	complete_alert("#nota-response-ok");
	return false; 
}
/**********************LOADS LOADS LOADS LOADS LOADS V LOADS LOADSVVLOADSLOADSLOADS LOADS LOADS LOADSVVLOADSLOADSLOADS ***************************/
function load_resumen_contactos(){

	url = now + "index.php/api/contactos/contactos_resumen/format/json/";
	$.get(url).done(function(data){
		llenaelementoHTML("#resumen-contactos" , data);

		$(".editar-contacto").click(try_update_contacto);				
		


		$(".nota-c").click(load_nota_contacto);		
		$(".delete_contacto").click(delete_contacto);
		$(".mas-info").click(dinamic_section);
    	$(".menos-info").click(dinamic_section_info);			
    	document.getElementById("form-contactos").reset();

	}).fail(function(){
		alert("Error al cargar resumen");
	}); 
}
/**/
function load_nota_contacto(e){
	contacto =  e.target.id;
	dinamic_contacto_val  =  contacto;
	$(".response-nota").html("");
	url = now + "index.php/api/contactos/contacto_id/format/json/";	
	$.get(url , {contacto : contacto}).done(function(data){	
		/**/
		$("#nota-text-modal").val(data[0].nota);		
	}).fail(function(){
		alert("Error al cargar los datos del contacto, informar al administrador");
	});
}
/**/
function get_data_contacto_in_modal(contacto){
	url = now + "index.php/api/contactos/contacto_id/format/json/";	
	$.get(url , {contacto : contacto}).done(function(data){			
		valorHTML("#nnombre" , data[0].nombre);
		valorHTML("#norganizacion" , data[0].organizacion);
		valorHTML("#ntelefono" , data[0].tel);
		valorHTML("#nmovil" , data[0].movil);
		valorHTML("#ncorreo" , data[0].correo);
		valorHTML("#ndireccion" , data[0].direccion);
		valorHTML("#npagina_web" , data[0].pagina_web);		
		valorHTML("#npagina_fb" , data[0].pagina_fb);		
		valorHTML("#npagina_tw" , data[0].pagina_tw);		
		valorHTML("#ncorreoalterno" , data[0].correo_alterno); 
		$('#ntipo > option[value="'+ data[0].tipo +'"]').attr('selected', 'selected');
		valorHTML("#nmovil" , data[0].nota);			
	}).fail(function(){
		alert("Error al cargar los datos del contacto, informar al administrador");
	});
}
/**/
function load_contactos_dinamic(e){
	url = now + "index.php/api/contactos/contacto/format/json/";
	$.get(url , $("#form-filtro").serialize()).done(function(data){		
		llenaelementoHTML( ".sectiion_contactos" , data);
		load_resumen_contactos();
	}).fail(function(){
		alert("Error al cargar tus contactos, informar al administrador si el problema persiste");
	});
	return false;
}
/**/
/*DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES */
function delete_contacto(e){
	/**/	
	contacto = e.target.id;
	dinamic_contacto_delete = contacto; 
	$("#aceptar-delete").click(delete_data_contacto);
}
/**/
function delete_data_contacto(){

	url =  now + "index.php/api/contactos/contacto/format/json/"; 	
	data_send =  {"contacto" :  dinamic_contacto_delete }; 
	$.ajax({
	   url: url,
	   type: 'DELETE',
	   data : data_send }).done(function(data){
	   	/**/
		load_contactos_dinamic();	   			
		complete_alert("#response-delete-ok");

	}).fail(function(){
	   	alert("falla al intentar actualizar");
		$("#response-delete-fail").show();
	});
}

