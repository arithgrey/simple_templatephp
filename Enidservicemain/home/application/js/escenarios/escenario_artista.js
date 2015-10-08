$(document).on("ready", function(){

	$("#form-escenario-artista").submit(nuevo_artista);
	$(".remove-artista").click(delete_escenario_artista);
	$(".img-artista-evento").click(try_upload_img_artistas);
	$(".horario_artista").click(update_horario_artista);
	$(".artista_yt").click(update_youtube_url);
	$(".artista_sound").click(update_sounda_url);
	escenario =  $("#escenario").val();



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

	$("#form-arista-social-youtube").submit(function(){			
			url_youtube = $("#url_youtube").val();						
			registra_data(url , { artista : artista   , escenario : escenario ,  url : url_youtube , social : social } );			
			return false;

	});

}
/**/
function update_sounda_url(e){

	artista = e.target.id;
	url = $("#form-arista-social-sound").attr('action');	
	social = "Sound Cloud";

	$("#form-arista-social-sound").submit(function(){			
			url_sound = $("#url_sound").val();						
			registra_data(url , { artista : artista   , escenario : escenario ,  url : url_sound , social : social } );			
			return false;

	});
}

/**/
function  try_upload_img_artistas(e){
	
	artista = e.target.id;

	$("#lista-imagenes-artista").html("");
	$("#imgs-arista").attr("value" , "");	

	$("#dinamic_artista").val(artista);
	$("#imgs-arista").change(upload_main_imgs_artista);


}

