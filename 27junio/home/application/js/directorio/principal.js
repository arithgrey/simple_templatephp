$(document).on("ready", function(){

	dinamic_contacto_val = 0;
	var  dinamic_contacto_delete = 0;
	//$(".editar-contacto").click(try_update_contacto);			
	$("#form-contactos").submit(record_contacto);
	load_contactos_dinamic();
	$("#form-filtro").submit(load_contactos_dinamic);
	//$("#form-nota-contacto").submit(set_nota_contacto);
	//$(".nota-c").click(load_nota_contacto);	
	$(".botonExcel").click(exporta_excel);	
	//$(".delete_contacto").click(delete_contacto);		
	$(".mas-info").click(dinamic_section);
    $(".menos-info").click(dinamic_section_info);			

	$("#nuevo-contacto-button").click(function(){		
		$(".status-registro").hide();		
	});


	$(document).on('click' , '.img_contacto' , function(e){
	
		contacto = e.target.id;
		$("#guardar_img_contacto").hide();				
		$("#dinamic_contacto").val(contacto);			
		$(".imagen_contacto").change(upload_imgs_enid_contacto);
		$("#lista_imagenes_contacto").html("");
	});


});

/***************************Registros  Y UPDATES  ***********************************/
function record_contacto(e){
	/*Realizamos previa validación*/ 
	flag = valida_tel_form("#input_tel_contacto", ".place_tel_vali"); 
	if (flag == 1 ) {	
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
	}
	e.preventDefault();
}	
/**/
function try_update_contacto(e){

	contacto =  e.target.id;
	get_data_contacto_in_modal(contacto);
	url = $("#form-contactos-edit").attr("action");	

	
	$(".form-contactos-edit").submit(function(e){		
	//$(".form-contactos-edit").submit(function(e){		
		/*Se | el formato del telefono */

		flag =  valida_tel_form("#input_tel_contacton", ".place_tel_valin"); 	

		if (flag == 1  ) {
			
			//alert($("#form-contactos-edit").serialize());
			actualiza_data(url , $("#form-contactos-edit").serialize()+"&"+$.param({"idcontacto" : contacto })  );				

			$("#contact-modal-edit").modal("hide");
			$("#status-registro").show();
			muestra_alert_segundos("#status-registro");
			load_contactos_dinamic();					
		}
		e.preventDefault();
		
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
function eventos_contactos(){

	$(".editar-contacto").click(try_update_contacto);						
	
	$(".nota-c").click(load_nota_contacto);		
	$(".delete_contacto").click(delete_contacto);
	$(".mas-info").click(dinamic_section);
    $(".menos-info").click(dinamic_section_info);			
    document.getElementById("form-contactos").reset();


	/*
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
*/
}
/**/
function load_nota_contacto(e){


	contacto =  e.target.id;
	dinamic_contacto_val  =  contacto;
	$(".response-nota").html("");
	url = now + "index.php/api/contactos/contacto_id/format/json/";	
	$.get(url , {contacto : contacto}).done(function(data){	
		
		$("#nota-text-modal").val(data[0].nota);		
		$("#form-nota-contacto").submit(set_nota_contacto);
	}).fail(function(){
		alert("Error al cargar los datos del contacto, informar al administrador");
	});
}
/**/
function get_data_contacto_in_modal(contacto){
	url = now + "index.php/api/contactos/contacto_id/format/json/";		
	$.ajax({
		url  : url , 
		type : "GET" ,
		data :  {contacto : contacto} , 
		beforeSend : function(){
			llenaelementoHTML(".estado_edicion_contacto" , "Cargando información  del contacto"  );
		}

	}).done(function(data){
			
		

		$(".estado_edicion_contacto").empty();
		valorHTML("#nextension" , data[0].extension);
		valorHTML("#nnombre" , data[0].nombre);
		valorHTML("#norganizacion" , data[0].organizacion);
		valorHTML("#input_tel_contacton" , data[0].tel );
		valorHTML("#nmovil" , data[0].movil);
		valorHTML("#ncorreo" , data[0].correo);
		valorHTML("#ndireccion" , data[0].direccion);
		valorHTML("#npagina_web" , data[0].pagina_web);		
		valorHTML("#npagina_fb" , data[0].pagina_fb);		
		valorHTML("#npagina_tw" , data[0].pagina_tw);		
		valorHTML("#ncorreoalterno" , data[0].correo_alterno); 
		$('#ntipo > option[value="'+ data[0].tipo +'"]').attr('selected', 'selected');		
		//valorHTML("#nmovil" , data[0].nota);			

	}).fail(function(){

		//alert("Error al cargar los datos del contacto, informar al administrador");
		llenaelementoHTML(".estado_edicion_contacto" , "Error al cargar los datos del contacto, informar al administrador"  );
	});	
}
/**/
function load_contactos_dinamic(e){
	
	url = now + "index.php/api/contactos/contacto/format/json/";	
	$.ajax({
		url : url , 
		data : $("#form-filtro").serialize() , 
		type: "GET",
		beforeSend : function(){
			llenaelementoHTML( ".sectiion_contactos" , "Cargando ..." );
		}

	}).done(function(data){		
		llenaelementoHTML( ".sectiion_contactos" , data);
		eventos_contactos();
	}).fail(function(){
		llenaelementoHTML( ".sectiion_contactos" , "Error al cargar los contactos, reportar al administrador ");
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

