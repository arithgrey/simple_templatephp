$(document).on("ready", function(){

	$("#form-escenario-artista").submit(nuevo_artista);
	$(".remove-artista").click(delete_escenario_artista);
	$(".img-artista-evento").click(try_upload_img_artistas);
	$(".horario_artista").click(update_horario_artista);
	$(".artista_yt").click(update_youtube_url);
	$(".artista_sound").click(update_sounda_url);
	escenario =  $("#escenario").val();
	$(".status-confirmacion").click(try_update_status_artista);
	
	$(".artistas-inputs").click(try_update_nombre_artista);	




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
		$(".artista_yt").click(update_youtube_url);
		$(".artista_sound").click(update_sounda_url);


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
function update_youtube_url(e){
			
	artista = e.target.id;
	url = $("#form-arista-social-youtube").attr('action');	
	social = "youtube";

	load_data_escenario_artista_dinamic(artista, "y" , social );
	
}

/**/
function load_data_escenario_artista_dinamic(artista, campo , social ){

	llenaelementoHTML(".response_youtube", "");
	llenaelementoHTML(".response-sound", "");

	url =  now + "index.php/api/escenario/artista_escenario/format/json/";
	$.get(url , {artista: artista ,  escenario : escenario }).done(function(data){

		if (campo == 'y') {
			$("#url_youtube").val(data[0].url_social_youtube);	
		}else{

			$("#url_sound").val(data[0].url_sound_cloud);	
			
		}

	}).fail(function(){
		alert("Error al cargar información del artista en el escenario");
	});


	if ( social ==  "youtube") {
		url = $("#form-arista-social-youtube").attr('action');	
			$("#form-arista-social-youtube").submit(function(){			
					url_youtube = $("#url_youtube").val();						
					registra_data(url , { artista : artista   , escenario : escenario ,  url : url_youtube , social : social } );			
					llenaelementoHTML(".response_youtube" , "Datos actualizados");
					return false;

			});
			return false;
	}else{

		url = $("#form-arista-social-sound").attr('action');	
			$("#form-arista-social-sound").submit(function(){			
					url_sound = $("#url_sound").val();						
					registra_data(url , { artista : artista   , escenario : escenario ,  url : url_sound , social : social } );			
					llenaelementoHTML(".response-sound" , "Datos actualizados");
					return false;

			});
			return false;

	}
	


}



/**/
function update_sounda_url(e){

	artista = e.target.id;	
	social = "Sound Cloud";
	
	load_data_escenario_artista_dinamic(artista, "s" , social );

	
}

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