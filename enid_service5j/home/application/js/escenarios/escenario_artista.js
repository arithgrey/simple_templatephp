function nuevo_artista(e){

	url = now + "index.php/api/escenario/escenario_artista/format/json";	
	data_send =  $("#form-escenario-artista").serialize() + "&" + $.param({"evento" :  $("#evento").val()}); 
	flag =  valida_text_form("#artista" , ".place_artista" , 2 , "Nombre para el artista" ); 
	if (flag == 1  ) {
		$.ajax({
			url :  url , 
			type :"POST", 
			data : data_send , 
			beforeSend: function(){
				show_load_enid(".place_artista" , "Registrando artista en escenario" , 1); 
			}
		}).done(function(data){		
			
			show_response_ok_enid( ".place_artista", "Artista artista registrado con éxito.!"); 
			load_data_escenario_artista();		
		}).fail(function(){
			show_error_enid(".place_artista"  , "Error al al registrar artista"); 
		});

	}
	
	e.preventDefault();	
}
/*cargamos la lista de artistas*/
function load_data_escenario_artista(){


	
	escenario = $(".id_escenario").val();
	url = now + "index.php/api/escenario/escenario_artista/format/json";			
	

	$.ajax({
		url : url , 
		type: "GET", 
		data : {"escenario" :  escenario , "public" :  0} , 
		beforeSend : function(){				
			show_load_enid(".place_artistas" , "Cargando artistas del escenario " , 1); 			
		}		
	}).done(function(data){		


		llenaelementoHTML("#artistas-escenario-section", data);		
		$(".place_artistas").empty();
		eventos_artistas();		

	}).fail(function(){		
		show_error_enid(".place_artistas" , genericresponse[0]);
		
	});

}

/*elimina artista del escenario */
function t_delete_escenario_artista(e){	
	/**/
	$(".place_delete_artista").empty();
	artista = e.target.id;	
	$("#aceptar_delete_artista").click(function(){
		delete_escenario_artista(artista); 	
	});

}
/**/
function delete_escenario_artista(artista){

	url =now + "index.php/api/escenario/escenario_artista/format/json";	
	data_send =  {"idescenario" : escenario , "idartista": artista , "evento" : $("#evento").val() }; 
	$.ajax({
			url :  url ,
			type :  "DELETE", 
			data : data_send, 
			beforeSend : function(){				
				show_load_enid(".place_delete_artista" , "Eliminando artista del evento " , 1); 			
			}
		 }).done(function(data){
		 	llenaelementoHTML(".place_delete_artista" , "Se eliminó el artista del evento con éxito.! ");
		 	load_data_escenario_artista();
		 }).fail(function(){
		 	show_error_enid(".place_delete_artista" , "Falla al quitar artista del escenario, reporte al administrador" );
		 });
}
/*Actualiza el */
function t_update_horario_artista(e){
	
	/*Cargamos el horario de éste*/
	artista = e.target.id; 	
	url =  now +  "index.php/api/escenario/escenario_artista_id/format/json/"; 

	$.ajax({
		url : url , 
		data:  {idartista: artista ,  idescenario :  $("#id_escenario").val() }, 
		beforeSend: function(){
			show_load_enid(".place_horario_artista" , "Cargando horario actial del artista" , 1); 	
		}
	}).done(function(data){
			
			hora_inicio =  data[0].hora_inicio; 
			hora_termino =  data[0].hora_termino; 
			valorHTML( "#hiartista" , hora_inicio); 
			valorHTML( "#htartista" , hora_termino); 
			/*indicamos cual es el estatus del artista */
				
			llenaelementoHTML(".artista_estado_actual" , "Estado actual del artista :" + data[0].status_confirmacion);


			$(".place_horario_artista").empty();
			$(".guardar_horario").click(function(){
				hiartista = $("#hiartista").val();
			 	htartista = $("#htartista").val();
				url = now + "index.php/api/escenario/inicioterminoartista/format/json/";
				evento = $("#evento").val();		
				data_send = { artista : artista , escenario : escenario , hiartista : hiartista , htartista : htartista , "evento" : evento }
				update_horario_artista(data_send); 	
			});

	}).fail(function(){
			show_error_enid(".place_horario_artista" , "Error al cargar horario del artista, reporte al administrador");
	});

}
/**/
function update_horario_artista(data_send){

		$.ajax({
			url : url , 
			type: "PUT", 
			data : data_send, 
			beforeSend: function(){				
				show_load_enid(".place_horario_artista" , "Registrando horario de presentación" , 1); 			
			}
		}).done(function(){
			show_response_ok_enid(".place_horario_artista" , "Horario registrado con éxito.!"); 
			load_data_escenario_artista();
		}).fail(function(){
			show_error_enid(".place_horario_artista" , "Error al cargar horario, reporte al administrador");
		});					
}
/*****************************/
function load_data_nota(e){

	
	idartista = e.target.id;
	url =  now + "index.php/api/escenario/escenario_artista_id/format/json/";

	$.ajax({
		url : url , 
		type :  "GET",
		data : {"idescenario" :  escenario , "idartista" : idartista }  , 
		beforeSend: function(){
			
			show_load_enid(".place_nota_artista" , "Cargando mensaje para el público " , 1); 					
		}
	}).done(function(data){	

		$(".place_nota_artista").empty();
		valorHTML("#nota_artista" , data[0].nota);
		valorHTML("#idartistanota" , idartista );		
		$("#form-arista-nota").submit(update_nota_artista);

	}).fail(function(){		
		show_error_enid(".place_nota_artista" ,"Error al cargar el mensaje del artista, reporte al administrador ");			
	});

	
}
function update_nota_artista(){

	artista = $("#idartistanota").val();
	data_send = $("#form-arista-nota").serialize() + "&"+ $.param({"artista" : artista  , "escenario" :  escenario });	
	url =  now + "index.php/api/escenario/escenario_artista_nota/format/json/";

	/*Validación previa */
	flag  = valida_text_form("#nota_artista" , ".place_nota_artista" , 200  , "Mensaje para el público " ); 

	if (flag ==  1 ){
		$.ajax({
		   url: url,
		   type: 'PUT',
		   data : data_send , 
		   beforeSend : function(){	   	  
		   	show_load_enid(".place_nota_artista" , "Registrando mensaje para el público " , 1); 			
		   } 
		}).done(function(data){		
		   	show_response_ok_enid(".place_nota_artista" ,  "Mensaje para el público registrado con éxito" ); 
		   	
		}).fail(function(){
			show_error_enid(".place_nota_artista" , genericresponse[0]);				
		});
	}
	return false; 
}
/******************************/
function load_data_youtube(e){

	idartista = e.target.id;
	url =  now + "index.php/api/escenario/escenario_artista_id/format/json/";
	escenario  = $("#id_escenario").val();

	$.ajax({
		url : url , 
		type :  "GET", 
		data : {"idescenario" :  escenario , "idartista" : idartista } , 
		beforeSend: function(){
			show_load_enid(".place_url_youtube" , "Cargando .. " , 1); 			
		}
		}).done(function(data){


			url_social_youtube  = data[0].url_social_youtube; 				
			$("#url_youtube").val(url_social_youtube);
			$("#dinamic_artista_youtube").val(idartista);
			$(".place_url_youtube").empty();
			$("#form-arista-social-youtube").submit(upload_data_youtube);				
			
			
		}).fail(function(){
			show_error_enid(".place_url_youtube" , "Error al cargar datos");				
		});	
}

function upload_data_youtube(e){

	escenario  = $("#id_escenario").val();
	url_youtube  = $("#url_youtube").val();
	evento = $("#evento").val();
	url_send =  now + "index.php/api/escenario/escenario_artista_social/format/json/";
	data_send =  $("#form-arista-social-youtube").serialize() + "&"+ $.param({"social" : "youtube"  , "escenario" :  escenario ,  "evento" : evento }); 
	
	flag =  valida_url_form( ".place_url_youtube" , "#url_youtube"  ,  "Url no válida" ); 
	if (flag ==  1  ) {
		
		$.ajax({		   
		   url: url_send,
		   type: 'PUT',
		   data : data_send, 
		   beforeSend :  function(){
		   		show_load_enid(".place_url_youtube" , "Registrando cambios  .. " , 1); 			   		
		   }  
		}).done(function(data){
			
			
	   		show_response_ok_enid(".place_url_youtube" ,  "URL registrada con éxito" ); 				
		}).fail(function(){
			show_error_enid(".place_url_youtube" , "Error registrar reporte al administrador");						   	
		});	
	}
	e.preventDefault();

}
/*****************************/
function load_data_sound(e){

	$("#response-sound").html("");
	idartista = e.target.id;
	url =  now + "index.php/api/escenario/escenario_artista_id/format/json/";
	escenario  = $("#id_escenario").val();

	$.ajax({
		url : url , 
		type :  "GET", 
		data:  {"idescenario" :  escenario , "idartista" : idartista } , 
		beforeSend : function(){			
			show_load_enid(".place_url_sound" , "Cargando  .. " , 1); 		
		}
	}).done(function(data){
		url_sound  = data[0].url_sound_cloud; 				
		$("#url_sound").val(url_sound);
		$("#dinamic_artista_sound").val(idartista);
		$("#form-arista-social-sound").submit(upload_data_sound);
		$(".place_url_sound").empty();
	}).fail(function(){		
		show_error_enid(".place_url_sound" , "Error al cargar al url reporte al administrador");					
	});
}
/***/
function upload_data_sound(){

	escenario  = $("#id_escenario").val();
	data_send =  $("#form-arista-social-sound").serialize() + "&"+ $.param({"social" : "sound"  , "escenario" :  escenario}); 	
	url_send =  now + "index.php/api/escenario/escenario_artista_social/format/json/";	
	flag =  valida_url_form( ".place_url_sound" , "#url_sound"  ,  "Url no válida" ); 

	if (flag ==  1 ) {

		$.ajax({
		   url: url_send,
		   type: 'PUT',
		   data : data_send, 
		   beforeSend:  function(){
		   	show_load_enid(".place_url_sound" , "Cargando  .. " , 1); 	
		   }  
		}).done(function(data){	   		
			
		   	/*aquí mostrar el mensaje de respuesta */	   	
		   	show_response_ok_enid(".place_url_sound" ,  "URL registrada con éxito" ); 					   	
		}).fail(function(){
			show_error_enid(".place_url_sound" , "Error al cargar al url reporte al administrador");					   	
		});


	}

	return false;
}
/**/
function t_up_estatus(e){

	url =  now +"index.php/api/escenario/escenario_artista_status/format/json/";
	artista = e.target.id;
	$("#status-artista-evento").change(function(){
			nuevo_status = $("#status-artista-evento").val();
			data_send =  { artista :  artista , escenario :  escenario , nuevo_status :  nuevo_status  }
			$.ajax({				
					url :  url , 
					type : 'PUT' , 
					data : data_send,
					beforeSend : function(){
						show_load_enid(".place_estatus_artista " , "Registrando estado del artísta  .. " , 1); 						
					}
				}).done(function(data){				
					show_response_ok_enid(".place_estatus_artista" ,  "Estado de confirmación actualizado con éxito.! " ); 								
					load_data_escenario_artista();		
				}).fail(function(){
					show_error_enid(".place_estatus_artista" , "Error al actualizar el estado del confirmación, reporte al administrador");					
			});			
	});

	

}
/**/

function try_update_nombre_artista(e){

	artista =  e.target.id;	
	/*Cargamos los datos del artista  */

	url =  now +"index.php/api/escenario/artista/format/json/";
	$.ajax({			
			url : url , 
			type :  "GET", 			
			data :  {"artista" : artista } , 
			beforeSend: function(){
				show_load_enid(".place_nombre_artista" , "Cargando.. " , 1); 						
				$(".place_nombre_artista").empty();
				$("#modifica-nombre-artista").click(t_up_nombre_artista);
			}
		}).done(function(data){
			valorHTML("#nuevo-nombre-artista" , data[0].nombre_artista);
		}).fail(function(){
			show_error_enid(".place_nombre_artista" , "Error al cargar nombre del artista, reporte al administrador");					
		});
	


}/**/
function t_up_nombre_artista(){

	url =  now +"index.php/api/escenario/artista_nombre/format/json/";	
	nuevo_nombre =  $("#nuevo-nombre-artista").val();
	data_send =  { artista :  artista , nuevo_nombre  : nuevo_nombre}

	/*Valiadamos antes de actualizar */
	flag =  valida_text_form("#nuevo-nombre-artista" , ".place_nombre_artista" , 2 , "Nombre para el artista" ); 
	
	if (flag == 1  ){
		$.ajax({
			url :  url , 
			type : 'PUT' , 
			data : data_send ,
			beforeSend:function(){
				show_load_enid(".place_nombre_artista" , "Actualizando nombre del artista.. " , 1); 						
			}
		}).done(function(data){											
			/**/
			show_response_ok_enid(".place_nombre_artista" ,  "Nombre del artista  actualizado con éxito.! " ); 								
			load_data_escenario_artista();							

		}).fail(function(){			
			show_error_enid(".place_nombre_artista" , "Error al registrar el nombre del artista ");					
			alert("Error  al actualizar el estatus del artista");
		});
	}
		
}

/**/
function eventos_artistas(){

	id_escenario  = $("#id_escenario").val();
	nombre_evento = $("#nombre_evento").val();
	$(".remove-artista").click(t_delete_escenario_artista);
	$("#form-escenario-artista").submit(nuevo_artista);
	$(".horario_artista").click(t_update_horario_artista);
	$(".artista_yt").click(load_data_youtube);
	$(".artista_sound").click(load_data_sound);
	$(".artista_nota").click(load_data_nota);
	
	/*
	$('#artista').keyup(function (e){ 
	    Stringentrante = $(this).val(); 	        
	    buscarartista(Stringentrante);
	});	  		
*/


	$(".status-confirmacion").click(t_up_estatus);
	$(".artistas-inputs").click(try_update_nombre_artista);			
	$(".tipo_artista").click(t_up_tipo_artista);
	//$(".img-artista-evento").click(try_upload_img_artistas);	
	$(".img-artista-evento").click(carga_form_imagenes_artista);	

}
/**/
function t_up_tipo_artista(e){

	artista =  e.target.id; 		
	url =  now +  "index.php/api/escenario/escenario_artista_id/format/json/"; 
	$.ajax({
		url : url , 
		data:  {idartista: artista ,  idescenario :  $("#id_escenario").val() }, 
		beforeSend: function(){
			show_load_enid(".place_tipo_artista" , "Cargando el tipo de participación del artista" , 1); 	
		}
	}).done(function(data){		
		tipo_artista =  data[0].tipo_artista; 
		$(".place_tipo_artista").empty();
		$('.tipo_escenario > option[value="'+ tipo_artista+'"]').attr('selected', 'selected');		
		$("#tipo-artista-form").submit(function(e){
			update_tipo_artista(artista);
			e.preventDefault();
		});

	}).fail(function(){
		show_error_enid(".place_tipo_artista" , "Error al cargar el tipo de participación del artista, reporte al administrador");
	});
}
/**/
function update_tipo_artista(artista){

	data_send =  $("#tipo-artista-form").serialize() +  "&" + $.param({"artista" : artista  , "escenario" : $("#id_escenario").val()  }); 
	url =  $("#tipo-artista-form").attr("action");
	$.ajax({
		url :  url , 
		type : "POST", 
		data : data_send , 
		beforeSend : function(){
			show_load_enid(".place_tipo_artista" , "Actualizando tipo de artista.. " , 1); 							
		}
	}).done(function(data){
		show_response_ok_enid(".place_tipo_artista"  ,  "Tipo de artista actualizado con éxito.! " ); 								

	}).fail(function(){
		show_error_enid(".place_tipo_artista" , "Error actualizar el tipo de artista ");					
	});
	
}

