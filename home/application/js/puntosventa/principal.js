$(document).on("ready", function(){
	var dinamic_pv = 0;
	var  pv = 0;  
	$("footer").ready(evalua_q);
	$("footer").ready(load_data_puntos_venta);
	$("#form-filtro").submit(busqueda);
	$("#form-puntos-venta").submit(record_punto_venta);	
	$(".close").click(load_data_puntos_venta);
});

/*Actualiza el estado del contacto asociado al punto de venta*/
function update_contacto_punto_venta( contacto , punto_venta ){	
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	registra_data(url , {"contacto" :  contacto , "punto_venta": punto_venta } );
}
/**/
function dinamic_busqueda(){
	/**/
	showonehideone( "#busqueda-contactos-section", "#text-busqueda-section"); 	
}
/**/
function record_punto_venta(e){
	/*validamos previo a registrar */			
	flag =  valida_text_form("#nombre_razon_social" , ".place_razon_social_vali" , 3 , "Nombre del punto de venta " ); 

	if (flag ==  1 ){
			url  = $("#form-puntos-venta").attr("action");			
			$.ajax({url : url , 
				data : $("#form-puntos-venta").serialize() , 
				type : "POST" , 
				beforeSend : function(){			
					show_load_enid(".place_nuevo" , "Registrando .. " , 1); 			
					$(".place_razon_social_vali").empty();						
					$(".place_nuevo").empty();				
					$(".place_razon_social_vali").empty();
				}
			}).done(function(data){			
				var  fields =  ["#nombre_razon_social" , "#area_descripcion" , "#sitio_web"];
				reset_fields(fields); 
				var  inputs = ["L" , "M"  , "MM" , "J" , "V" , "S" , "D" ];
				reset_checks(inputs); 
				load_data_puntos_venta();
				
				$("#contact-modal").modal("hide");									
				show_response_ok_enid( ".place_puntos_venta", "Punto de venta registrado con éxito.!"); 

		}).fail(function(){	
			show_error_enid(".place_nuevo"  , "Error al registrar, reporte al administrador "); 
		});	
	}
	e.preventDefault();				
}
/**/
function busqueda(e){	
	load_data_puntos_venta();
	e.preventDefault();
}
/**/
function load_data_puntos_venta(){
	
	url = $("#form-puntos-venta").attr("action");	
	$.ajax({
		url :  url , 
		type : "GET",
		data : $("#form-filtro").serialize() , 
		beforeSend: function(){
			
			show_load_enid(".place_puntos_venta" , "Cargando .. " ,1);			
			
		}
	}).done(function(data){
		
		$(".place_puntos_venta").empty();

		llenaelementoHTML( ".puntos_venta" , data);				
		$(".editar-punto-venta").click(edit_punto_venta);
		$(".contactos").click(carga_section_contactos_admin);
		$(".nota-punto-venta").click(load_nota_punto_venta);			
		$(".delete-punto-venta").click(delete_punto_venta);
		
		$(".img_punto_venta").click(carga_form_img);

/*
		$(".img_punto_venta").click(function(e){		
			$("#imgs-punto-venta").attr("value" , "");						
			$(".dinamic_punto_venta").val(e.target.id);	
			$(".imagen_upload_punto_venta").change(upload_imgs_enid_punto_venta);
			
		});
*/


	}).fail(function(){
		show_error_enid(".place_puntos_venta" , "Error al cargar puntos de venta, reporte al administrador");
	}); 			
	
}
/**/
function edit_punto_venta(e){			
	punto_venta = e.target.id;		
	carga_data_punto_venta(punto_venta);
}
/**/
function carga_data_punto_venta(punto_venta){

	var  fields =  ["#nrazon_social" , "#ndescripcion"];
	reset_fields(fields); 
	url =  now +  "index.php/api/puntosventa/puntoconfig/format/json/"; 
	$.ajax({

		url : url , 
		type :  "GET", 
		data : {"punto_venta" :  punto_venta},
		beforeSend: function(){
			show_load_enid(".place_seccion_configurar" , "cargando datos del punto de venta" , 1);
			$(".place_seccion_configurar").empty();
		}
	}).done(function(data){
		/**/
		
		razon_social =  data[0].razon_social;
		descripcion =  data[0].descripcion;	
		zona =  data[0].zona;
		L =  data[0].L;
		M =  data[0].M;
		MI =  data[0].MM;
		J =  data[0].J;
		V =  data[0].V;
		S =  data[0].S;
		D =  data[0].D;
		horario_atencion =  data[0].horario_atencion;				
		$('.nhorario_atencion > option[value="'+horario_atencion+'"]').attr('selected', 'selected');
		reset_checks_vals("nL" , L ); 
		reset_checks_vals("nM" , M ); 
		reset_checks_vals("nMM" , MI ); 
		reset_checks_vals("nJ" , J ); 
		reset_checks_vals("nV" , V ); 
		reset_checks_vals("nS" , S ); 
		reset_checks_vals("nD" , D ); 
		sitio_web =  data[0].sitio_web;



		/**/
		$("#nrazon_social").val(razon_social);		
		$("#ndescripcion").val(descripcion);
		document.getElementById("nzona").value = zona;
		$(".form-puntos-venta-edit").submit(registra_cambios_punto_venta);
		$("#nsitio_web").val(sitio_web);


		$(".nlocacion").keyup(function(){
			carga_maps(".nlocacion", "lista-locaciones" , ".place_list");
		});


	}).fail(function(){
		show_error_enid(".place_seccion_configurar" , "Error al cargar datos del punto de venta, reporte al administrador");
	});	
}
function reset_checks_vals(campo , status ){
	if (status == 1) {
		document.getElementById(campo).checked = true;
	}else{
		document.getElementById(campo).checked = false;
	}
}

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
					show_load_enid(".place_seccion_configurar" , "Registrando cambios" ,1 );					
				}
			}).done(function(data){								
				$("#editd-punto-venta-modal").modal("hide");
				$("#puntos-venta-filtro").val($("#nrazon_social").val());

				load_data_puntos_venta();	
				show_response_ok_enid(".place_puntos_venta" , "Datos actualizados con éxito");
			}).fail(function(){
				show_error_enid(".place_seccion_configurar" , "Error al editar, reporte al administrador ");
			});		
		}		
	e.preventDefault();

}
/**/
function actualiza_nota_punto_venta(e){			

	data_send = $("#form-nota-pv").serialize() + "&" + $.param({"punto_venta": pv });	
	url =  $("#form-nota-pv").attr("action");
	
		$.ajax({
		   url: url,
		   type: 'PUT',
		   data : data_send ,
		   beforeSend : function(){
		   		show_load_enid(".place_actualizar_nota" , "Actualizando" , 1);
		   		$(".place_actualizar_nota").empty();
		   }
		}).done(function(data){	   	
			$("#punto-venta-descripcion-modal").modal("hide");
			
			load_data_puntos_venta();
		   	show_response_ok_enid(".place_puntos_venta" , "Datos de la dirección actualizadon con éxito");

		   	
		}).fail(function(){
			show_error_enid(".place_actualizar_nota" , "Error al actualizar la dirección del punto de venta, reporte al administrador");
		   	
		});
	e.preventDefault();
}
/**/
function load_nota_punto_venta(e){
	
	punto_venta  = e.target.id;
	url =  now + "index.php/maps/map/"+punto_venta+"/2/99999999/";
	iframe =  "<iframe   height='500px;' width='100%'   id='iframe_maps_conf' src='"+url+"'> </iframe>";
	llenaelementoHTML(".contenedor_iframe_maps" , iframe );
	/**/	
}
/**/
function delete_punto_venta(e){
	punto_venta = e.target.id;	
	url  = $("#form-puntos-venta").attr("action");
	$("#aceptar-delete").click(function(){
		$.ajax({
		   url: url,
		   type: 'DELETE',
		   data : {"punto_venta" :  punto_venta}  ,
		   beforeSend : function(){
		   		
		   		show_load_enid(".place_eliminar" ,  "Eliminando punto de venta .. " , 1 );
		   }

		}).done(function(data){
			$("#delete-punto-venta-modal").modal("hide");
		  	load_data_puntos_venta();
		  	show_response_ok_enid( ".place_puntos_venta", "Punto de venta eliminado con éxito.!"); 

		}).fail(function(){
		   	show_error_enid(".place_eliminar" ,  "Se presentaron errores al eliminar, reporte al administrador ");
		});	
	});	
}
/**/
function load_contactos_punto_venta(){
	
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.ajax({
		url :  url , 
		type : "GET",
		data :  {"punto_venta" :  dinamic_pv} , 
		beforeSend :  function(){
			llenaelementoHTML(".place_contactos_asociados_pv" , "Cargando contacdos asociados a este punto de venta.. ");
			$(".place_contactos_asociados_pv").empty();
		}
	}).done(function(data){
		
		
		llenaelementoHTML(".contactos_asociados_pv" , data );
		$("#f_contacto").keyup(function(){
			if ($("#f_contacto").val() !=  null ){
				buscar_contacto();	
			}	
		});
		$(".delete-contacto_icon").click(d_contacto_asociado);		

	}).fail(function(){

		show_error_enid(".place_contactos_asociados_pv" , "Error al cargar los contactos asociados al evento");
	});
}
/**/
function buscar_contacto(){

	q= $("#f_contacto").val();		
	if (q.length > 0 ) {	
			url =  now + "index.php/api/contactos/contacto_q_img/format/json/";
			$.ajax({
				url : url , 
				type : "GET" , 			
				data :  {"q": q }, 
				beforeSend : function(){					
					show_load_enid(".busqueda_contacto" , "Cargando .. " , 1 );
				}   
			}).done(function(data){
				llenaelementoHTML(".busqueda_contacto" , data);		
				$(".busqueda_contacto").show(50);				
				$(".result-busqueda-contacto").click(enlazar_contacto_punto_venta);
			}).fail(function(){				
				show_error_enid(".busqueda_contacto" , "Erro en la búsqueda reporte al administrador, reporta al administrador");
			});
	}	
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
		   data : data_send ,
		   beforeSend : function(){
		   		show_load_enid(".place_eliminar_contacto_asociado" ,  "Eliminando .." ,  1  );
		   }
		}).done(function(data){	   		   		
			show_response_ok_enid(".place_eliminar_contacto_asociado" , " Éxito en la operación ");
			load_contactos_punto_venta(); 
		}).fail(function(){
		   	show_error_enid(".place_eliminar_contacto_asociado" , "Falla al quitar el contacto del punto de venta, reporte al administrador ");
		});

	});
}
/**/
function carga_section_contactos_admin(e){

	punto_venta =  e.target.id;
	dinamic_pv =  punto_venta;	
	load_contactos_punto_venta();	
}
/**/
function enlazar_contacto_punto_venta(e){	
	contacto = e.target.id;		
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	$.ajax({
		url: url , 
		type: 'PUT', 
		data : {"punto_venta" :  dinamic_pv , "contacto" : contacto }  , 
		beforeSend : function(){
			show_load_enid(".status-punto-venta-contacto" , "Agregando contacto al punto de venta " , 1);			
		}
	}).done(function(data){			   			
		/****** ********************* ***************** ******************** ************** */
		load_contactos_punto_venta(); 
		show_response_ok_enid(".status-punto-venta-contacto", "Contacto agregado con éxito");
		$(".punto-venta-descripcion-modal").modal("hide");
		/****** ********************* ***************** ******************** ************** */
	}).fail(function(){
		show_error_enid(".status-punto-venta-contacto" , "Falla al agregar contacto a punto de venta, reporte al administrador");
	});
}

/*
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

		
    


	}).fail(function(){
		alert("Error al cargar el resumen");
	});
}*/
/**/
function evalua_q(){
	q =  $(".qmodal").val(); 
	switch(q){
		case "nuevo":			
			$("#contact-modal").modal("show");
			break;
		default: 
			break; 
	}

}
/**/