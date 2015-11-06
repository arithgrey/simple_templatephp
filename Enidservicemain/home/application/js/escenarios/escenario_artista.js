$(document).on("ready", function(){

	$("#form-escenario-artista").submit(nuevo_artista);
	$(".remove-artista").click(delete_escenario_artista);
	$(".img-artista-evento").click(try_upload_img_artistas);
	$(".horario_artista").click(update_horario_artista);
	$(".artista_yt").click(load_data_youtube);
	$(".artista_sound").click(load_data_sound);
	escenario =  $("#escenario").val();
	$(".status-confirmacion").click(try_update_status_artista);	
	$(".artistas-inputs").click(try_update_nombre_artista);	


		$(".artista_nota").click(load_data_nota);


	    $('#artista').keyup(function (e){ 

	        	Stringentrante = $(this).val(); 	        
	            buscarartista(Stringentrante);
	    });	  
		
		
		


});

function nuevo_artista(){

	url = now + "index.php/api/escenario/escenario_artista/format/json";	
	$.post(url, $("#form-escenario-artista").serialize()).done(function(data){
		load_data_escenario_artista();
	}).fail(function(){
		alert(genericresponse[0]);
	});
	return false;
}
/*cargamos la lista de artistas*/
function load_data_escenario_artista(){
	url =now + "index.php/api/escenario/escenario_artista/format/json";			
	$.get(url, {"escenario" :  escenario}).done(function(data){


		llenaelementoHTML("#artistas-escenario-section", data);
		$(".remove-artista").click(delete_escenario_artista);
		$("#form-escenario-artista").submit(nuevo_artista);
		$(".horario_artista").click(update_horario_artista);
		$(".artista_yt").click(load_data_youtube);
		$(".artista_sound").click(load_data_sound);
		$(".artista_nota").click(load_data_nota);


	    $('#artista').keyup(function (e){ 

	        	Stringentrante = $(this).val(); 	        
	            buscarartista(Stringentrante);
	    });	  
		$(".img-artista-evento").click(try_upload_img_artistas);
		$(".status-confirmacion").click(try_update_status_artista);
		$(".artistas-inputs").click(try_update_nombre_artista);	

		load_resumen_artistas_escenario();

	}).fail(function(){
		alert(genericresponse[0]);
	});
}
/*elimina artista del escenario */
function delete_escenario_artista(e){
	
	artista = e.target.id;
	escenario =  $("#escenario").val();

	url =now + "index.php/api/escenario/escenario_artista/format/json";
	eliminar_data(url , {"idescenario" : escenario , "idartista": artista });		
	load_data_escenario_artista();
}
/*Actualiza el */
function update_horario_artista(e){
	
	artista = e.target.id; 

	$(".guardar_horario").click(function(){
		

		hiartista = $("#hiartista").val();
 		htartista = $("#htartista").val();
	 	url = now + "index.php/api/escenario/inicioterminoartista/format/json/";
		data_send = { artista : artista , escenario : escenario , hiartista : hiartista , htartista : htartista }
		actualiza_data(url , data_send);
		load_data_escenario_artista();
	});
}

/**/








/*****************************/
function load_data_nota(e){

	$("#response_nota").html("");
	idartista = e.target.id;
	url =  now + "index.php/api/escenario/escenario_artista_id/format/json/";
	$.get(url , {"idescenario" :  escenario , "idartista" : idartista } ).done(function(data){	
		/**/
		
		$("#nota_artista").val(data[0].nota);
		$("#idartistanota").val(idartista );
		$("#form-arista-nota").submit(update_nota_artista);

	}).fail(function(){

		alert("Error al cargar datos");

	});
}


function update_nota_artista(){
	
	artista = $("#idartistanota").val();
	data_send = $("#form-arista-nota").serialize() + "&"+ $.param({"artista" : artista  , escenario :  escenario });
	
	url =  now + "index.php/api/escenario/escenario_artista_nota/format/json/";
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){
	   			
	   		
	   		$("#response_nota").html("Datos actualizados");

	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});
	

	return false; 
}




/******************************/
function load_data_youtube(e){
	$("#response_youtube").html("");			
	idartista = e.target.id;
	url =  now + "index.php/api/escenario/escenario_artista_id/format/json/";
	$.get(url , {"idescenario" :  escenario , "idartista" : idartista } ).done(function(data){	
		/**/
		url_social_youtube  = data[0].url_social_youtube; 				
		$("#url_youtube").val(url_social_youtube);
		$("#dinamic_artista_youtube").val(idartista);
		$("#form-arista-social-youtube").submit(upload_data_youtube);		


	}).fail(function(){

		alert("Error al cargar datos");
	});
}
function upload_data_youtube(){

	url_youtube  = $("#url_youtube").val();
	data_send =  $("#form-arista-social-sound").serialize() + "&"+ $.param({"social" : "youtube"  , "escenario" :  escenario , "url" :  url_youtube }); 
	

	url =  now + "index.php/api/escenario/escenario_artista_social/format/json/";
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){
	   		
	   		$("#response_youtube").html("Datos actualizados");

	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});


	return false;
}


























/*****************************/
function load_data_sound(e){

	$("#response-sound").html("");
	idartista = e.target.id;
	url =  now + "index.php/api/escenario/escenario_artista_id/format/json/";
	$.get(url , {"idescenario" :  escenario , "idartista" : idartista } ).done(function(data){	
		/**/
		url_sound  = data[0].url_sound_cloud; 				
		$("#url_sound").val(url_sound);
		$("#dinamic_artista_sound").val(idartista);

		$("#form-arista-social-sound").submit(upload_data_sound);
		

	}).fail(function(){

		alert("Error al cargar datos");

	});
}
/***/
function upload_data_sound(){

	data_send =  $("#form-arista-social-sound").serialize() + "&"+ $.param({"social" : "sound"  , "escenario" :  escenario}); 
	url =  now + "index.php/api/escenario/escenario_artista_social/format/json/";
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){
	   		
	   	/*aquí mostrar el mensaje de respuesta */
	   	
	   	$("#response-sound").html("Datos actualizados");
	}).fail(function(){

	   		alert("falla al intentar actualizar");
	});


	return false;
}
/**/

 
/**/
function  try_upload_img_artistas(e){
	
	artista = e.target.id;

	$("#lista-imagenes-artista").html("");
	$("#imgs-arista").attr("value" , "");	

	$("#dinamic_artista").val(artista);
	$("#imgs-arista").change(upload_main_imgs_artista);


}

function try_update_status_artista(e){

	url =  now +"index.php/api/escenario/escenario_artista_status/format/json/";
	artista = e.target.id;
	$("#status-artista-evento").change(function(){

			nuevo_status = $("#status-artista-evento").val();

			data_send =  { artista :  artista , escenario :  escenario , nuevo_status :  nuevo_status  }
			$.ajax(  {url :  url , type : 'PUT' , data : data_send }    ).done(function(data){
				load_data_escenario_artista();
				llenaelementoHTML("#response-update-status" , "Estado de confirmación del artista modificado");
				

			}).fail(function(){
				///alert("error  al actualizar el estatus del artista");
			});
			

	});

	

}
/**/

function try_update_nombre_artista(e){

	artista =  e.target.id;
	$("#nuevo-nombre-artista").val(e.target.text);
	url =  now +"index.php/api/escenario/artista_nombre/format/json/";


	$("#modifica-nombre-artista").click(function(){


			nuevo_nombre =  $("#nuevo-nombre-artista").val();
			data_send =  { artista :  artista , nuevo_nombre  : nuevo_nombre  }
			$.ajax(  {url :  url , type : 'PUT' , data : data_send }    ).done(function(data){
				llenaelementoHTML("#response-update-nombre" , "nombre del artista modificado");

				load_data_escenario_artista();				
			}).fail(function(){
				///alert("error  al actualizar el estatus del artista");
			});
	




	});
}
/**/
function load_resumen_artistas_escenario(){

	id_escenario  = $("#id_escenario").val();
	nombre_evento = $("#nombre_evento").val();
	url = now  + "index.php/api/escenario/resumen_artistas/format/json/";

	$.get(url , {"escenario" :  id_escenario , "nombre_evento" :  nombre_evento}).done(function(data){
		llenaelementoHTML(".resumen-artistas-escenario-event", data);
	}).fail(function(){
		alert("Error");
	});

}