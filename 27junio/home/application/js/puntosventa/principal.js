$(document).on("ready", function(){

	var dinamic_pv = 0;
	var  pv = 0;  
	$("#form-puntos-venta").submit(record_punto_venta);
	//
	/*clicks */
	//$(".editar-punto-venta").click(edit_punto_venta);
	//$(".contactos").click(carga_section_contactos_admin);
	//$(".delete-punto-venta").click(delete_punto_venta);
	
	$("#text-busqueda-section").click(dinamic_busqueda);	
	$(".mas-info").click(dinamic_section);
    $(".menos-info").click(dinamic_section_info);			

	$(".botonExcel").click(exporta_excel);
		$(".img_punto_venta").click(function(e){		
			$("#guardar_img_enid").hide();										
			$(".dinamic_punto_venta").val(e.target.id);
			$(".imagen_upload_punto_venta").change(upload_imgs_enid_punto_venta);

		});

	$("#form-filtro").submit(load_data_puntos_venta);
	load_data_puntos_venta();


});
/*LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS */
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
function load_contactos_punto_venta(){


	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.ajax({
		url :  url , 
		type : "GET",
		data :  {"punto_venta" :  dinamic_pv} , 
		beforeSend :  function(){
			llenaelementoHTML("#contactos-punto-venta" , "Cargando .. ");
		}

	}).done(function(data){
		
		llenaelementoHTML("#contactos-punto-venta" , data );		
		$("#f_contacto").keyup(function(){
			if ($("#f_contacto").val() !=  null ){
				buscar_contacto();	
			}	
		});
		$(".delete-contacto_icon").click(d_contacto_asociado);
		

	}).fail(function(){
		llenaelementoHTML("#contactos-punto-venta" , "Falla al cargar los contactos asociados al punto de venta, reporte al administrado ");		
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
		$(".form-puntos-venta-edit").submit(registra_cambios_punto_venta);

	}).fail(function(){
		alert("Registro");
	});
}
/**/

function load_resumen_punto_venta(){

	url = now + "index.php/api/puntosventa/puntoventaresumen/format/json/";
	$.get(url).done(function(data){

		llenaelementoHTML("#punto-venta-resumen" , data);
		//$(".contactos").click(carga_section_contactos_admin);
		$(".delete-punto-venta").click(delete_punto_venta);
		$(".editar-punto-venta").click(edit_punto_venta);

		$(".img_punto_venta").click(function(e){
			
			$("#imgs-punto-venta").attr("value" , "");			
			
			$(".dinamic_punto_venta").val(e.target.id);

			$('#lista-imagenes').html("");
			$(".imagen_upload_punto_venta").change(upload_imgs_enid_punto_venta);
			$(".nota-punto-venta").click(load_nota_punto_venta);
		});

		$(".mas-info").click(dinamic_section);
    	$(".menos-info").click(dinamic_section_info);		


    


	}).fail(function(){
		alert("Error al cargar el resumen");
	});
}/**/
function buscar_contacto(){

	q= $("#f_contacto").val();		
	if (q.length > 0 ) {	

			url =  now + "index.php/api/contactos/contacto_q_img/format/json/";
			$.ajax({
				url : url , 
				type : "GET" , 			
				data :  {"q": q }, 
				beforeSend : function(){
					llenaelementoHTML("#resultado-filtro-contactos-div" , "Cargando .. ");						
				}   
			}).done(function(data){
				
				llenaelementoHTML("#resultado-filtro-contactos-div" , data);		
				$("#resultado-filtro-contactos-div").show(60);				
				$(".result-busqueda-contacto").click(enlazar_contacto_punto_venta);

			}).fail(function(){
				llenaelementoHTML("#resultado-filtro-contactos-div" , "Erro en la búsqueda de tu contacto, reporta al administrador");		
			});
	}	
} 
/**/
function carga_section_contactos_admin(e){

	punto_venta =  e.target.id;
	dinamic_pv =  punto_venta;	
	load_contactos_punto_venta();	
}
/**/
function load_data_puntos_venta(){

	url = $("#form-puntos-venta").attr("action");	
	$.ajax({
		url :  url , 
		type : "GET",
		data : $("#form-filtro").serialize() , 
		beforeSend: function(){
			llenaelementoHTML( "#puntos-venta-list" , "Cargando .. ");		
		}
	}).done(function(data){
		llenaelementoHTML( "#puntos-venta-list" , data);				

		$(".contactos").click(carga_section_contactos_admin);
		$(".nota-punto-venta").click(load_nota_punto_venta);	
		$("#form-nota-pv").submit(actualiza_nota_punto_venta);

		load_resumen_punto_venta();		
	}).fail(function(){
		llenaelementoHTML( "#puntos-venta-list" , "Falla al cargar los puntos de venta, reporte al administrador ");		
	}); 		
	
}

/*UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD UPDATES RECORD  */
/**/
function actualiza_nota_punto_venta(e){		
	
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
	e.preventDefault();
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
function edit_punto_venta(e){	

	
	/*Cargamos la data */
	$(".response-update").hide();				
	punto_venta = e.target.id;		
	carga_data_punto_venta(punto_venta);

}
/**/
function registra_cambios_punto_venta(e){
	
		/*Validamos previo a enviar */		
	flag =  valida_text_form("#nrazon_social" , ".place_nrazon_social_vali" , 3 , "Nombre del punto de venta " ); 
		
		if (flag == 1 ){

			data_send =  $(".form-puntos-venta-edit").serialize()+'&'+$.param({ 'punto_venta': punto_venta }); 
			url = $(".form-puntos-venta-edit").attr("action");			
			$.ajax({
				url :  url , 
				type : "PUT" , 
				data : data_send,				
				beforeSend :  function(){
					llenaelementoHTML(".estatus_registra_nueva_data" , "Registrado cambios ");
				}
			}).done(function(data){


				llenaelementoHTML(".estatus_registra_nueva_data" , "Cambios registrados con éxito");
				$("#punto-venta-alert-ok").show();
				muestra_alert_segundos("#punto-venta-alert-ok");
				//$("#editd-punto-venta-modal").modal("hide");
				$(".contactos").click(carga_section_contactos_admin);
				load_data_puntos_venta();	

			}).fail(function(){
				llenaelementoHTML(".estatus_registra_nueva_data" , "Falla al registrar cambios, reporte al administrador ");
			});		
		}		
	e.preventDefault();

}


/*Actualiza el estado del contacto asociado al punto de venta*/
function update_contacto_punto_venta( contacto , punto_venta ){

	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	registra_data(url , {"contacto" :  contacto , "punto_venta": punto_venta } );
}

/*nuevo punto de venta*/
function record_punto_venta(e){
	
	
	/*validamos previo a registrar */			
	flag =  valida_text_form("#nombre_razon_social" , ".place_razon_social_vali" , 3 , "Nombre del punto de venta " ); 
	if (flag ==  1 ){

			url  = $("#form-puntos-venta").attr("action");			
			$.ajax({url : url , 
				data : $("#form-puntos-venta").serialize() , 
				type : "POST" , 
				beforeSend : function(){
					$("#loading_nuevo_punto_venta").show();
				}
			}).done(function(data){
				/**/
				$("#loading_nuevo_punto_venta").hide();
				var  fields =  ["#nombre_razon_social" , "#area_descripcion"];
				reset_fields(fields); 
				$("#alert-registro-ok").show();
				muestra_alert_segundos("#alert-registro-ok");				
				load_data_puntos_venta();	
				llenaelementoHTML("#response-registro", "<div class='panel  alert-ok' id='alert-registro-ok'> <em> Punto de venta registrado! </em></div>");
				
				//document.getElementById("form-puntos-venta").reset();
				
				


		}).fail(function(){	
			llenaelementoHTML("#response-registro", "<div class='panel alert-fail' id='alert-registro-fail'> <em> Ocurrió una falla al intentar agregar el punto de venta, si el punto agregado no aparece en el listado intentar nuevamente, reporte error </em></div>")
			$("#alert-registro-fail").show();
			muestra_alert_segundos("#alert-registro-fail");
			$("#loading_nuevo_punto_venta").hide();

		});	

	}
	e.preventDefault();			
}
/*DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE DELETE */
function delete_punto_venta(e){
		
	punto_venta = e.target.id;	
	url  = $("#form-puntos-venta").attr("action");
	$("#aceptar-delete").click(function(){
		$.ajax({
		   url: url,
		   type: 'DELETE',
		   data : {"punto_venta" :  punto_venta}  }).done(function(data){
		   	load_data_puntos_venta();
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
function d_contacto_asociado(e){

	contacto =  e.target.id;
	data_send =  {"contacto" :  contacto , "punto_venta" :  dinamic_pv };
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	confirm_ =  ".confirm_"+contacto; 
	$(confirm_).show();
	confirmado_ =  ".confirmado_" +contacto;
	
	/*Para cancelar*/
	$(".cancelar").click(function(){
		$(confirm_).hide();
	});
	/**/
	$(confirmado_).click(function(){
		$.ajax({
		   url: url,
		   type: 'DELETE',
		   data : data_send 
		}).done(function(data){	   		   		
			load_contactos_punto_venta(); 
		}).fail(function(){
		   	alert("falla al intentar actualizar, reporte al administrador");	
		});
	});
}
/**/
function dinamic_busqueda(){
	/**/
	showonehideone( "#busqueda-contactos-section", "#text-busqueda-section"); 	
}
/**/
