$(document).on("ready", function(){
	/**/
	enid_evento  =  $(".enid_evento").val(); 
	empresa  =  $("#empresa").val();
	$("#form-new-acceso").submit(record_acceso);
	$(".punto_venta").click(update_status_punto_venta_evento );	
	$(".search-punto-venta").keyup(busqueda_punto_venta);
	$(".puntos_venta_contacto").click(load_data_puntos_venta_accesos_info);	
	$(".botonExcel").click(exporta_excel);
	$("#dinamic-form-accesos").submit(actualiza_data_accesos);
	evento = $("#evento").val(); 
	var dinamic_del_pv = 0; 
	$("#aceptar-delete-punto-venta").click(confirm_delete_punto_venta);	
	$(".section-puntos-venta").ready(carga_puntos_venta_agregados);
	$(".section-puntos-venta").ready(load_data_accesos);
	$("#nuevo-acceso-button").click(reset_form_acceso);
	$("footer").ready(valida_modal);
});
function update_status_punto_venta_evento(e){

	punto_venta = e.target.id;
	url = now + "index.php/api/puntosventa/punto_venta_evento/format/json";
	actualiza_data(url , {"evento" :  evento , "punto_venta" : punto_venta} );	
}
/**/
function load_data_puntos_venta_asociados_accesos(){	
	
	url = now + "index.php/api/accesos/resumen_accesos_punto_venta_evento/format/json/";					
	$.get(url, {"evento" : evento} ).done(function(data){		
		llenaelementoHTML("#puntos-venta-accesos-evento", data);		
	}).fail(function(){
		alert("Error al cargar el resumen de los accesos en ele evento ");		
	});
}
/**/
function load_data_puntos_venta_accesos_info(e){

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
/**/
function update_contacto_punto_venta( contacto , punto_venta ){
	url = now + "index.php/api/puntosventa/puntoventacontacto/format/json/";
	registra_data(url , {"contacto" :  contacto , "punto_venta": punto_venta ,  "enid_evento" : enid_evento } );
}
/*Registrando  */
function record_acceso(e){

	url = $("#form-new-acceso").attr("action");	

	flag  =  valida_text_form(".acceso_input" , ".place_nombre_promo_vali" , 5 , "Nombre de la promoción" ); 
	if (flag ==  1 ){
		/*ahora validamos el formato numérico*/
		flag_numerico =  valida_num_form("#precio-acceso-record" , ".place_msj_precio"); 		
		if (flag_numerico == 1 ){


			evento =  $(".evento").val();
			data_send =  $("#form-new-acceso").serialize() + "&"  + $.param({"evento" :  evento ,  "enid_evento" : enid_evento  });			
			$.ajax({
					url :  url , 
					type :  "POST", 
					data :   data_send , 
					beforeSend:function(){								
						show_load_enid( ".place_registro_acceso" , "Registrando" , 1 ); 				
						$(".place_nombre_promo_vali").empty();
						$(".place_msj_precio").empty();			
					}
			}).done(function(data){		
				var  fields_reset =  ["#acceso_nombre" ,  "#precio-acceso-record" , "#descripcion"];
				reset_fields(fields_reset);															
				load_data_accesos();		
				$("#nuevo-acceso-modal").modal("hide");
				show_load_enid( ".place_list_accesos" , "Acceso cargado al evento con éxito.!" , 1 ); 	
				$(".place_registro_acceso").empty();

			}).fail(function(){			
				show_error_enid(".place_registro_acceso" , "Error al cargar el escenario reportar al administrador"); 
			});
		}				
	}		
	e.preventDefault();
}
/**/
function load_data_accesos(){	
	


	url = now + "index.php/api/accesos/list/format/json/";		
	evento =  $(".evento").val();
	in_session =  $(".in_session").val();

	$.ajax({
		url :  url , 
		type :  "GET", 
		data : { evento : evento , in_session :  in_session}, 
		beforeSend: function(){			
			show_load_enid( ".place_list_accesos" , "Cargando accesos registrados al avento" , 1 ); 	
		}
	}).done(function(data){

		$(".place_list_accesos").empty();
		llenaelementoHTML(".list-accesos" , data);				 			
		$(".delete-acceso").click(remove_acceso);
		$(".editar-acceso").click(editar_acceso);
		$(".img_acceso").click(carga_form_imagen_acceso);
		/*Para cargar la info del acceso */		
	}).fail(function(){		
		show_error_enid(".place_list_accesos" , "Error al cargar, los accesos "); 
	});
}

function remove_acceso(e){

	acceso = e.target.id;		
	$("#aceptar-delete-acceso").click(function(){
	url = now + "index.php/api/accesos/deletebyid/format/json/";					


		$.ajax({
			url : url , 
			type :  "POST",
			data : { evento : evento , acceso :  acceso,  "enid_evento" : enid_evento } , 
			beforeSend : function(){
				
				show_load_enid( ".place_remov_acceso" , "Eliminando acceso del evento " , 1 );
			}
		}).done(function(data){
			$("#confirma-delete-acceso").modal("hide");
			load_data_accesos();			
			show_response_ok_enid(".place_list_accesos" ,  "Acceso eliminado con éxito " ); 
			
		}).fail(function(){
			show_error_enid(".place_remov_acceso" , "Error eliminar el acceso del evento, reporte al administrador"); 
		});


	});
}
/**/
function editar_acceso(e){

	acceso = e.target.id;		
	if ($("#flag_config").val() == 1 ) {
		acceso = $("#q2").val();		
	}
	
	var fields_reset = ["#nuevo-precio" , "#nuevo-inicio-acceso" , "#nuevo-termino-acceso" , "#nueva-descripcion" ];
	reset_fields(fields_reset);	
	/**/
	url = now + "index.php/api/accesos/get_acceso_info_id/format/json/";		
	

	$.ajax({
		url : url , 
		type: "GET", 
		data :  {"evento": evento   , "acceso" : acceso ,  "enid_evento" : enid_evento} , 
		beforeSend: function(){
			show_load_enid( ".place_editar_acceso" , "Cargando datos del acceso " , 1 );			
		}

	}).done(function(data){

		$(".place_editar_acceso").empty();
		for(var x in data ){

			idacceso  = data[x].idacceso;
			nota = data[x].nota;
			precio  = data[x].precio;
			inicio_acceso = data[x].inicio_acceso;
			termino_acceso = data[x].termino_acceso;
			tipo = data[x].tipo;
			moneda =  data[x].moneda; 


			valorHTML("#nuevo-precio" , precio );
			valorHTML("#nueva-descripcion" , nota );
			valorHTML("#nuevo-inicio-acceso" ,  inicio_acceso );
			valorHTML("#nuevo-termino-acceso" , termino_acceso );			
			valorHTML("#acceso" , idacceso);			
			$('#nuevo-tipo-acceso > option[value="' + tipo + '"]').attr('selected', 'selected');		
			$('.nueva_moneda > option[value="' + moneda + '"]').attr('selected', 'selected');		

		}
	}).fail(function(){
		show_error_enid(".place_editar_acceso" , "Error al cargar los datos del acceso, reporte al administrador"); 
	});
	
}

function actualiza_data_accesos(){
	/*evento*/
	url  = $("#dinamic-form-accesos").attr("action");	
	data_send =  $("#dinamic-form-accesos").serialize() +  "&"+ $.param({"enid_evento" : enid_evento}); 		
	
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  ,
	   beforeSend : function(){
	   		
	   	show_load_enid(".place_editar_acceso" , "Actualizando datos información del acceso");
	   }
	}).done(function(data){
		
		$("#editar-acceso").modal("hide");
		load_data_accesos();
		show_response_ok_enid( ".place_list_accesos" ,"Datos del acceso configurados con éxito.!" , 1 ); 	

	}).fail(function(){
		show_error_enid(".place_editar_acceso" , "Error al editar los datos de acceso, reporte al administrador"); 

	});

	
	return false;
}

/**/
function eventos_puntos_venta_registrados(){
	$(".delete-punto-venta-icon").click(delete_punto_venta_evento);
	$(".img-horizontal").click(show_complete_info);	
}
/**/
function dinamic_resumen(){
	resumen_event(".section-resumen" , ".menos-info" , ".mas-info");
}
/**/
function reset_form_acceso(){
	llenaelementoHTML(".estado_registro_acceso" ,  "");
}
/**/
function carga_puntos_venta_agregados(){	
	url  =  now + "index.php/api/puntosventa/evento_icon/format/json/"; 
	evento =  $(".evento").val();	
		$.ajax({
			url : url , 
			type : "GET" ,
			data : {"evento" : evento} , 
			beforeSend : function(){				
				show_load_enid( ".place_puntos_venta_agregados" , "Cargando los puntos de venta asociados al evento" , 1 ); 
			}
		}).done(function(data){
			$( ".place_puntos_venta_agregados" ).empty();
			llenaelementoHTML("#list-puntos-venta-icon" , data );			
			eventos_puntos_venta_registrados();		
		}).fail(function(){			
			show_error_enid(".place_puntos_venta_agregados" , "Error al cargar los puntos de venta asociados al  evento, reporte al administrador"  ); 
		});		
}
/**/
function asocia_punto_venta_evento(e){
	evento =  $(".evento").val();
	puntosventa =  e.target.id; 	
	if (puntosventa > 0){		
		data_send =  {"puntoventa" : puntosventa , "evento" :  evento ,  "enid_evento" : enid_evento }; 
		url =  now + "index.php/api/puntosventa/asocia_evento/format/json/"; 
		$.ajax({
			   url: url,
			   type: 'PUT',
			   data : data_send  , 
			   beforeSend : function(){		   		
			   		show_load_enid( "#list-posibles-puntos" , "Registrando" , 1 ); 					
			   }
			}).done(function(data){	   	
		   		show_response_ok_enid("#list-posibles-puntos" ,  "Punto de venta asociado al evento con éxito.! ");	   		
		   		carga_puntos_venta_agregados();		   		
		}).fail(function(){	   	
		   	show_error_enid("#list-posibles-puntos" , "Error al  asociar el punto de venta al evento, reporte al administrador "); 
		});
	}
}
/**/
function busqueda_punto_venta(){

	text_input =  $(".search-punto-venta").val();
	if ( text_input.length > 0 ){		
		url  =  now +  "index.php/api/puntosventa/busqueda_empresa/format/json/"; 		
		$.ajax({
			url :  url ,  
			type: "GET" , 
			data : {"punto_venta" : text_input , "empresa" :  empresa } , 
			beforeSend: function(){

				show_load_enid( "#list-posibles-puntos" , "Buscando .. " , 1 ); 				
			}
		}).done(function(data){			
			llenaelementoHTML("#list-posibles-puntos" ,  data);
			$(".enid-filtro-busqueda").click(asocia_punto_venta_evento);
			$("#list-posibles-puntos").show(650);

		}).fail(function(){			
			show_error_enid("#list-posibles-puntos" , "Error al cargas los puntos de venta, reporte al administrador"); 
		});
	}else{
		$("#list-posibles-puntos").hide();
	}
}
/**/
function confirm_delete_punto_venta(){
	url =  now + "index.php/api/puntosventa/punto_venta_evento/format/json/";
	data_send =  {punto_venta :  dinamic_del_pv , evento :  evento ,  "enid_evento" : enid_evento }		
	$.ajax({
		url: url,
		type: 'DELETE',
		data : data_send, 
		beforeSend : function(){
			show_load_enid(".place_delete_pv",  "Eliminando .. " );
		} 
	}).done(function(data){				
			show_response_ok_enid(".place_delete_pv" ,  "Éxito al eliminar el punto de venta del evento");
			carga_puntos_venta_agregados();					
	}).fail(function(){
			show_error_enid(".place_delete_pv" ,  "Error al eliminar punto de venta del evento");			
	});
}
/*
function load_data_puntos_venta_accesos_informacion(e){

	punto_venta =  e;
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
*/
function delete_punto_venta_evento(e){
	punto_venta =  e.target.id;	
	dinamic_del_pv =  punto_venta; 		
} 
/**/
function show_complete_info(e){

	punto_venta =  e.target.id; 				
	url =  now + "index.php/api/puntosventa/info_punto_venta/format/json/"; 
	data_send =  {"punto_venta" :  punto_venta }; 	
	$.ajax({
		url :  url ,
		type :  "GET",
		data : data_send , 
		beforeSend : function(){
			show_load_enid(".info_pv" , "Cargando información del punto de venta" );
		}
	}).done(function(data){		
		llenaelementoHTML(".info_pv" ,  data);
		$(".ocultar_infor_punto_venta").click(ocultar_infor_punto_venta);
	}).fail(function(){
		alert("Err");
		show_error_enid(".info_pv" , "Error al cargar la información del punto de venta, reporte al administrador ");
	});
}
/**/
function ocultar_infor_punto_venta(){
	llenaelementoHTML(".info_pv" ,  "");	
}
/**/
function valida_modal(){
	qparam = $(".qparam").val();
	switch(qparam){
		case "acceso": 
			$("#nuevo-acceso-modal").modal("show");
			break; 			
		case "config":  	
				
			$("#editar-acceso").modal("show");
			$("#flag_config").val(1);

			editar_acceso(event); 
			break;
		case "puntoventa":

	    	$(".part-accesos-def").removeClass("active");		    		    	
	    	$(".part-pvs-def").addClass("active");
			$(".search-punto-venta").val(" ");			
			busqueda_punto_venta(); 						
			break;

		


		default: 
		break; 
	}
}