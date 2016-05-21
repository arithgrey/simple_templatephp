$(document).ready(function(){    

	$(".tipo-escenario").click(update_type);
	/*update campos del escenario */
	
	$(".descripcion-escenario-text").click(update_descripcion_escenario);
	escenario = $(".id_escenario").val();
	$("#btn-guardar-fecha").click(update_fecha_escenario);


	$(".ver-escenario").click(function(){
		
		escenario =  $("#id_escenario").val();
		evento =  $("#evento").val();
		redirect(now + "index.php/escenario/inevento"+ "/" + escenario  + "/" + evento);
		
	});

	$("#button-template").click(muestra_plantilla_escenario);
	$("#img-button-more-imgs").click(carga_imgs_escenario);



	/******************************************************************/
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


	artista_tmp  =  0; 		
	$(".tipo_artista").click(function(e){		
		artista_tmp =  e.target.id; 					
		var elements_ocultar = [".response_ok",  ".response_bug"  ];
		ocualta_elementos_array(elements_ocultar);				
	});
	
	$("#tipo-artista-form").submit(update_tipo_artista);

	$(".artistas-btn").click(function(){
	
		load_data_escenario_artista();			
	});

	/*Cargamos slider del escenario */
	$("footer").ready(carga_slider_admin);

});


/**/
function update_type(e){

	
	type_escenario  = e.target.id	
	url =now + "index.php/api/escenario/escenario_tipo/format/json"; 
	evento =  $("#evento").val();
	actualiza_data(url , {"idescenario": escenario , "tipoescenario" : type_escenario  , "evento" : evento} );
	/**/
	$("#alert-ok-tipo-escenario").show();
	muestra_alert_segundos("#alert-ok-tipo-escenario");

	$(".button-tipo-escenario").text(type_escenario);

}
/*Actualiza el nombre del escenario*/
function  updaye_nombre_escenario(){
	showonehideone( ".section-nombre-evento-in" , ".nombre-escenario-text" );	
	$("#in-nombre-escenario").blur(function(){
				
		nuevo_nombre = $("#in-nombre-escenario").val(); 					
		if(nuevo_nombre != null || nuevo_nombre != "") {	
			escenario =  $("#id_escenario").val();
			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			actualiza_data(url , { "campo": "nombre" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } );
			update_campo( "nombre" ,  ".nombre-escenario-text" , "#in-nombre-escenario" , "nombre del escenario");
			$(".alert-ok-sm").show();
			muestra_alert_segundos(".alert-ok-sm"); 		
					
		}else{
			showonehideone(".nombre-escenario-text" , ".section-nombre-evento-in");	
		}
		showonehideone(".nombre-escenario-text" , ".section-nombre-evento-in");				
	});

}
/*Actualiza la descripción del escenario */
function  update_descripcion_escenario(){

	showonehideone( ".section-descripcion-escenario-in" , ".descripcion-escenario-text" );		
	$("#in-descripcion-escenario").blur(function(){
		escenario =  $("#id_escenario").val();
		nuevo_nombre = $("#in-descripcion-escenario").val(); 					
		if(nuevo_nombre != null || nuevo_nombre != "" ) {	

			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			$.ajax({
				url :  url , 
				type : "PUT" , 
				data : { "campo": "descripcion" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } , 
				beforeSend : function(){
					/**/
				}

			}).done(function(data){				
				/**/	
				
				$(".descripcion-escenario-text").html(nuevo_nombre);
				$(".alert-ok-sm").show();
				muestra_alert_segundos(".alert-ok-sm"); 		

			}).fail(function(){
				alert("Error al actualizar ");
			});

		}else{
			showonehideone( ".descripcion-escenario-text"  , ".section-descripcion-escenario-in");	
		}
		showonehideone( ".descripcion-escenario-text"  , ".section-descripcion-escenario-in");	
			
	});
}
/*Actualiza solo un campo */
function update_campo(campo, place, input , msj ){ 

	url = now + "index.php/api/escenario/evento_escenario_campo/format/json";	
	evento =  $("#evento").val();
	$.get(url , {"campo" : campo , "escenario" : escenario , "evento" : evento } ).done(function(data){
			
		data = data.trim(); 
		if (data.length === 0 ) {

			llenaelementoHTML( place,  msj);
		}else{
			llenaelementoHTML( place,  data);
		}		
		$(input).val(data);
	}).fail(function(){
		alert("Error");
	});
}
/*Actualiza la fecha del escenario*/
function update_fecha_escenario(){	
			
	$("#alert-ok-fecha-ok").hide();
	url =now + "index.php/api/escenario/inicio_termino/format/json"; 	
	inicio = $("#inicio").val();
	termino =  $("#termino").val();
	actualiza_data(url , {"escenario" : escenario , "nuevoinicio" :  inicio , "nuevotermino" : termino} );

	fecha_text_format ="";
	if (inicio == termino ) {	
		fecha_text_format = inicio;
	}else{
		fecha_text_format = inicio +" - " + termino;
	}
	llenaelementoHTML("#fecha-presentacion" , fecha_text_format );	
	/**/
	$("#alert-ok-fecha-ok").show();
	muestra_alert_segundos("#alert-ok-fecha-ok");

	return false;	
	
}
/**/
function muestra_plantilla_escenario(){

	url = now + "index.php/api/templ/templates_content_escenario/format/json/";  

	$.get(url , {"type" : 5 } ).done(function(data){

		llenaelementoHTML("#list-plantilla-escenario" , data );	
		$(".identificador").click(carga_plantilla);

	}).fail(function(){
		/**/
		alert("Error al cargar plantillas ");
	});	

}
/**/
function carga_plantilla(e){
	id_contenido  = e.target.id; 	
	evento =  $("#evento").val();


	escenario =  $("#id_escenario").val();
	data_send = {"contenido" : id_contenido , "escenario" : escenario  , "evento" : evento };
	url = now + "index.php/api/escenario/descripcion_template/format/json/"; 
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){

	   	$("#alert-ok-plantilla").show();
	   	muestra_alert_segundos("#alert-ok-plantilla");
	   	update_campo( "descripcion" ,  ".descripcion-escenario-text" , "#in-descripcion-escenario" , "Describe la experiencia del escenario");			
	   		
	   		
	}).fail(function(){
	   	alert("falla al intentar actualizar");
	   	$("#alert-fail-plantilla").show();

	});
}
/**/



function carga_slider_admin(){
	
	url =  now + "index.php/api/escenario/slider_admin/format/json/"; 
	escenario =  $("#id_escenario").val();
	nombre =  $(".nombre_escenario").val(); 
	$.ajax({
		url : url , 		
		type: "GET" ,
		data : {"escenario" : escenario , "nombre_escenario" : nombre} ,
		beforeSend: function(){
			/**/
			
			$(".loading_portada_escenario").show();
		}
	}).done(function(data){
		llenaelementoHTML(".slider-principal-escenario", data );
		$(".nombre-escenario-text").click(updaye_nombre_escenario);

	}).fail(function(){
		alert("Error al cargar slider ");
	});
	$(".loading_portada_escenario").hide();
}
