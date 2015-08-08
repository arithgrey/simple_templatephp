$(document).on("ready", function (){

	$("footer").ready(load_data_evento);	
	$(".nombre-evento-h1").click(update_name_evento);
	$(".edicion-evento").click(update_edicion_evento);
	$(".descripcion-p").click(update_descripcion_evento);
	$(".politicas-p").click(update_politicas_evento);
	$(".permitido-p").click(update_permitido_evento);
	$(".restricciones-p").click(updaterestricciones);

	$(".permitidonow").click(load_objetospermitidos_evento);	
	$(".genero_musical_input").click(update_genero_evento);
	

	$("#social-button").click(function(){
			show_section_dinamic_on_click(".social-media-event");
	});
	$("#generos_musicales_button").click( function(){
		show_section_dinamic_on_click(".generos_musicales_div") 
	});
	$("#generosenid-button").click(function(){
		show_section_dinamic_on_click(".section_generosmusicales");
	});

	$(".articulos-permitidos-button").click(function(){
		show_section_dinamic_on_click("#section-articulos-permitidos");
	});
	$(".btn-all-articulos").click(update_all_objects);

	$("#accesos-button").click(load_accesos_evento);	
	$("#form-accesos-modal").submit(registra_acceso);
	$("#servicios-button").click(load_data_servicios);
	$("#pac-input").click(update_ubicacion_evento);	
	
	$("footer").ready(load_data_escenarios);

	$("#generos_musicales_btn").click(load_data_genero);
	$("#form-escenario").submit(nuevo_escenario);
	$("#form-artistas").submit(nuevo_artista_escenario);


	$("#tematica-button").click( function (){
		show_section_dinamic_button(".tematica_section");	
		load_data_tematica();
	});



	/*Eslogan del evento */
	$(".eslogan-p").click(update_eslogan_evento);

	initialize();
	

	//generate_img();
	
});

/**************************                   ******************* */          

/*Load datos */
function load_data_evento(){
	
	url = now + "index.php/api/event/get_event_by_id/format/json/";	
	$.get(url , $("#form-general-ev").serialize()).done(function(data){

		
		/******************************************************************************/

		for (var x in data) {
			/*Data*/	
			nombre_evento = data[x].nombre_evento;
			edicion = data[x].edicion;
			descripcion_evento = data[x].descripcion_evento;
			url_social = data[x].url_social;
			url_social_youtube = data[x].url_social_youtube;
			ubicacion = data[x].ubicacion;
			politicas = data[x].politicas;			
			objetospermitidos = data[x].objetospermitidos;
			restriciones =  data[x].restricciones;
			permitido = data[x].permitido;
			eslogan = data[x].eslogan;

				
				
				llenaelementoHTML(".nombre-evento-h1", nombre_evento);	
				valorHTML("#nombre-input" , nombre_evento );					

				

				valorHTML("#url_social" , url_social);
				valorHTML("#url_social_evento_youtube", url_social_youtube);
				valorHTML(".ubicacioninput" , ubicacion);
				/*Valiadamos info*/		
				valida_text_replace( descripcion_evento ,  ".descripcion-p" , "#descripcion-evento" , "<i class='fa fa-plus'></i>  Lo que se vivirá en el evento" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" );
				valida_text_replace( edicion ,  ".edicion-evento" , "#edicion-input" , "<i class='fa fa-plus'></i> Edicioón del evento" , "<i class='fa fa-plus'></i> Edicioón del evento" );			
				valida_text_replace(politicas ,  ".politicas-p" , "#politicas-evento"  , "<i class='fa fa-plus'></i> Lo que podría anticiparse como reembolsos o cambios" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse como reembolsos o cambios" );
				valida_text_replace(permitido ,  ".permitido-p"  , "#permitido-evento" , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento" );
				valida_text_replace(restriciones , ".restricciones-p"  , "#restricciones-evento" ,  "<i class='fa fa-plus'></i> Lo que podría anticiparse dentro del evento" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse dentro del evento" );
				valida_text_replace(eslogan , ".eslogan-p"  , "#eslogan-evento" ,  "<i class='fa fa-space-shuttle'></i> Mensaje eslogan del evento" , "<i class='fa fa-space-shuttle'></i>  Eslogan del evento" );

				$("#url_social").blur(update_social_fb);
				$("#url_social_evento_youtube").blur(update_social_youtube);
		}

		/******************************************************************************/
		
	}).fail(function(){
		
		alert("Error al  actualizar los datos, reportar al administrador si se sigue presentando el error");

	});
}






/*UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES */
function valida_text_replace(texto_a_validar,  text_tag , text_val, null_msj, sin_text_msj ){

				if (texto_a_validar == null ) {					
					llenaelementoHTML(text_tag , null_msj);

				}else if(texto_a_validar ==  "" ){
					
					llenaelementoHTML(text_tag , sin_text_msj);
				}else{

					//llenaelementoHTML(text_tag , texto_a_validar);
					
					set_text_element(text_tag , texto_a_validar );
					valorHTML( text_val , texto_a_validar);
				}
}
/**/

/*update nombre evento*/






function update_name_evento(e){

	showonehideone( "#nombre-input" , ".nombre-evento-h1" );
	$("#nombre-input").blur(function(){
		

		nuevotexto = $("#nombre-input").val();
				

		if (nuevotexto.length > 0 ) {

				
				url =  now + "index.php/api/event/updatenombre/format/json/";    
				data_send  ={ "nombre" : nuevotexto , "evento" : $("#evento").val() }
				updates_send(url , data_send );
				load_data_evento();

		}else{
				llenaelementoHTML(".nombre-evento-h1" , "Nombre de tu evento"  ); 					
		}

		showonehideone( ".nombre-evento-h1"  , "#nombre-input"  );
		

	});

}






/******************************************************************/


/*Update descripción*/
function update_edicion_evento(e){

	showonehideone( "#edicion-input" , ".edicion-evento" );
	$("#edicion-input").blur(function(){			
		nuevotexto = $("#edicion-input").val(); 				
		if (nuevotexto.length >0 ) {		


				url =  now + "index.php/api/event/updateedicion/format/json/";    
				data_send= { "edicion" : nuevotexto , "evento" : $("#evento").val() }
				updates_send(url , data_send );
				load_data_evento();

		}else{
			llenaelementoHTML(".edicion-evento" , "Edición del evento"  ); 						
		}
		showonehideone( ".edicion-evento" , "#edicion-input");
		
		
	});
}



/******************************************************************/
function update_descripcion_evento(e){


	showonehideone( "#descripcion-evento" , ".descripcion-p" );

	$("#descripcion-evento").blur(function(){
			
		nuevotexto = $("#descripcion-evento").val(); 			
		if (nuevotexto != null  ) {	

			
				url =  now + "index.php/api/event/updatedescripcion/format/json/";
				data_send = { "descripcion_evento" : nuevotexto , "evento" : $("#evento").val() }     
				updates_send(url , data_send );
				load_data_evento();

			
		}else{

			llenaelementoHTML(".descripcion-p" , "Describe la experiencia que se vivirá en el espectáculo" ); 						
		}
		showonehideone( ".descripcion-p" , "#descripcion-evento");
		
		
	});

}

/************************update_politicas_evento *******************************/
function update_politicas_evento(e){

	showonehideone( "#politicas-evento" , ".politicas-p" );

	$("#politicas-evento").blur(function(){
			
		nuevotexto = $("#politicas-evento").val(); 
				
		


		
		if (nuevotexto != null  ) {	

			url =  now + "index.php/api/event/updatepoliticas/format/json/";    
			data_send = { "politicas_evento" : nuevotexto , "evento" : $("#evento").val() }
			updates_send(url , data_send );
			load_data_evento();
			
		}else{

			llenaelementoHTML(".politicas-p" , "Describe la experiencia que se vivirá en el espectáculo" ); 						
		}
		showonehideone( ".politicas-p" , "#politicas-evento");
		
		
	});

}


/*Permitido Permitido Permitido Permitido Permitido Permitido Permitido */

function update_permitido_evento(e){




	showonehideone( "#permitido-evento" , ".permitido-p" );

	$("#permitido-evento").blur(function(){
			
		nuevotexto = $("#permitido-evento").val(); 

		if (nuevotexto != null  ) {	

			url =  now + "index.php/api/event/updatepermitido/format/json/";    
			data_send = { "permitido_evento" : nuevotexto , "evento" : evento  } 
			updates_send(url , data_send);
			load_data_evento();
			
		}else{

			llenaelementoHTML(".permitido-p" , "Describe com que podrá acceder al evento el cliente" ); 						
		}
		showonehideone( ".permitido-p" , "#permitido-evento");
		
		
	});

}

/*End permitido *End permitido *End permitido *End permitido *End permitido *End permitido */


function updaterestricciones(e){

	showonehideone( "#restricciones-evento" , ".restricciones-p" );
	$("#restricciones-evento").blur(function(){			
		nuevotexto = $("#restricciones-evento").val(); 				
		if (nuevotexto != null  ) {	

			url =  now + "index.php/api/event/updaterestricciones/format/json/";    
			data_send = { "restricciones_evento" : nuevotexto , "evento" : $("#evento").val() }
			updates_send(url ,data_send);
			load_data_evento();			
		}else{

			llenaelementoHTML(".restricciones-p" , "Describe com que podrá acceder al evento el cliente" ); 						
		}
		showonehideone( ".restricciones-p" , "#restricciones-evento");
				
	});

}



/*Nueva dirección */
function update_ubicacion_evento(){
	
	showonehideone( "#ubicacion-input" , ".text-ubicacion" );

	$("#pac-input").blur(function(){
			
		nuevotexto = $("#pac-input").val(); 
				
		url =  now + "index.php/api/event/updateubicacion/format/json/";  
		data_send = { "ubicacion" : nuevotexto , "evento" : $("#evento").val() }  
		updates_send(url , data_send);
		load_data_evento();
		
		
	});

}


/*******************************************/
function tryrecordgeneros(e){
	
	if (e.keyCode == 13){

 		 generos = $("#tags_enid_input").val();	

		 	url =  now + "index.php/api/event/updategeneros/format/json/";    

			$.post(url , { "generos" : generos  , "evento" : $("#evento").val() } )
			.done(function(data){
					
				
				load_data_evento();

			}).fail(function(){

				alert(genericresponse[0]);
			});

 	}
}

/***************************************************************************+++*/

function update_social_fb(){
			
		url =  now + "index.php/api/event/updateurlbyid/format/json/";    							
		data_send= updates_send(url , $("#form-social").serialize());		
		updates_send(url , data_send);
		load_data_evento();		
}

/*************************************+*/

function update_social_youtube(){
	url =  now + "index.php/api/event/updateurlyoutubebyid/format/json/";    					
	data_send = $("#form-social-youtube").serialize();
	updates_send(url , data_send);
	load_data_evento();					
}

/**********************************************************/
function update_eslogan_evento(e){

	showonehideone( "#eslogan-evento" , ".eslogan-p");
	$("#eslogan-evento").blur(function(){
			
		nuevotexto = $("#eslogan-evento").val(); 
		if (nuevotexto != null  ) {	
			
			url =  now + "index.php/api/event/update_eslogan/format/json/";    			
			data_send = {evento : $("#evento").val() , eslogan : $("#eslogan-evento").val()}
			updates_send(url , data_send);
			load_data_evento();

		}else{
			llenaelementoHTML(".eslogan-p" , "Eslogan publicitario evento" ); 						
		}
		showonehideone( ".eslogan-p" , "#eslogan-evento");
		
		
	});

}


