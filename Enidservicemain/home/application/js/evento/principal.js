$(document).on("ready", function (){

	//$("footer").ready(load_data_evento);	
	$("#url_social").blur(update_social);
	$("#url_social_evento_youtube").blur(update_social);
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
	$("#form-escenario").submit(nuevo_escenario);
	$("#form-artistas").submit(nuevo_artista_escenario);


	$("#tematica-button").click( function (){
		show_section_dinamic_button(".tematica_section");	
		load_data_tematica();
	});


	$(".contenido-text-templ").click(update_descripcion_evento_by_template);
	$(".templ-restriccion-up").click(new_restriction);
	$(".delete_restriccion").click(delete_restriccion_evento);
	/*Eslogan del evento */
	$(".eslogan-p").click(update_eslogan_evento);

	initialize();
	

	//generate_img();
	
});
/**/
function load_data_evento( text_visible , val , text_evento , place , null_msj , sin_text_msj  ){

		url = now + "index.php/api/event/get_event_texts/format/json/";	
		evento = $("#evento").val();
		$.get(url , {"evento" : evento  , "text" : text_evento , "null_msj" : null_msj , "sin_text_msj" : sin_text_msj }).done(function(data){
			
			llenaelementoHTML(text_visible  , data);
			
		}).fail(function(){
			llenaelementoHTML( place ,  genericresponse[0]);			
		});

}
/**/	
function update_name_evento(e){

	showonehideone( "#nombre-input" , ".nombre-evento-h1" );
	$("#nombre-input").blur(function(){
		

		nuevotexto = $("#nombre-input").val();
				

		if (nuevotexto.length > 0 ) {

				
				url =  now + "index.php/api/event/nombre/format/json/";    
				data_send  ={ "nombre" : nuevotexto , "evento" : $("#evento").val() }
				actualiza_data(url , data_send );
				load_data_evento(".nombre-evento-h1" , "#nombre-input" , "nombre_evento" , ".place_nombre" , "+" , "+");
				
				
				

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


				url =  now + "index.php/api/event/edicion/format/json/";    
				data_send= { "edicion" : nuevotexto , "evento" : $("#evento").val() }
				actualiza_data(url , data_send );
				$("#edicion-input").val(nuevotexto);
				load_data_evento(".edicion-evento" , "#edicion-input" , "edicion" , ".place_edicion"  , "<i class='fa fa-plus'></i> Edicioón del evento" , "<i class='fa fa-plus'></i> Edicioón del evento");

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

			
				url =  now + "index.php/api/event/descripcion/format/json/";
				data_send = { "descripcion_evento" : nuevotexto , "evento" : $("#evento").val() }     
				actualiza_data(url , data_send );
				load_data_evento( ".descripcion-p" , "#descripcion-evento" , "descripcion_evento" , ".place_description" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento");

			
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

			url =  now + "index.php/api/event/politicas/format/json/";    
			data_send = { "politicas_evento" : nuevotexto , "evento" : $("#evento").val() }
			actualiza_data(url , data_send );
			load_data_evento(".politicas-p" , "#politicas-evento" , "politicas" , ".place_politicas"  ,  "<i class='fa fa-plus'></i> Lo que podría anticiparse como reembolsos o cambios" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse como reembolsos o cambios" );
			
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

			url =  now + "index.php/api/event/permitido/format/json/";    
			data_send = { "permitido_evento" : nuevotexto , "evento" : evento  } 
			actualiza_data(url , data_send);
			load_data_evento(".permitido-p" ,  "#permitido-evento" , "permitido" , ".place_permitido" , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento");
			
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

			url =  now + "index.php/api/event/restricciones/format/json/";    
			data_send = { "restricciones_evento" : nuevotexto , "evento" : $("#evento").val() }
			actualiza_data(url ,data_send);
			load_data_evento(".restricciones-p" ,  "#restricciones-evento" , "restricciones" , ".place_restricciones" ,  "<i class='fa fa-plus'></i> Lo que podría anticiparse dentro del evento" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse dentro del evento" );
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
				
		url =  now + "index.php/api/event/ubicacion/format/json/";  
		data_send = { "ubicacion" : nuevotexto , "evento" : $("#evento").val() }  
		actualiza_data(url , data_send);
		
		
		
	});

}


/*******************************************/
function tryrecordgeneros(e){
	
	if (e.keyCode == 13){

 		 generos = $("#tags_enid_input").val();	

		 	url =  now + "index.php/api/event/genero/format/json/";    

			$.post(url , { "generos" : generos  , "evento" : $("#evento").val() } )
			.done(function(data){
					
				
				

			}).fail(function(){

				alert(genericresponse[0]);
			});

 	}
}

/***************************************************************************+++*/
function update_social(){
			
		url =  now + "index.php/api/event/urlbyid/format/json/";    								
		data_send= updates_send(url , $("#form-social").serialize());		
		actualiza_data(url , data_send);
			
}

/**********************************************************/
function update_eslogan_evento(e){

	showonehideone( "#eslogan-evento" , ".eslogan-p");
	$("#eslogan-evento").blur(function(){
			
		nuevotexto = $("#eslogan-evento").val(); 
		if (nuevotexto != null  ) {	
			
			url =  now + "index.php/api/event/eslogan/format/json/";    			
			data_send = {evento : $("#evento").val() , eslogan : $("#eslogan-evento").val()}
			actualiza_data(url , data_send);
			load_data_evento(".eslogan-p" ,  "#eslogan-evento" , "eslogan" , ".place_restricciones" ,  "<i class='fa fa-space-shuttle'></i> Mensaje eslogan del evento" , "<i class='fa fa-space-shuttle'></i>  Eslogan del evento" );
			

		}else{
			llenaelementoHTML(".eslogan-p" , "Eslogan publicitario evento" ); 						
		}
		showonehideone( ".eslogan-p" , "#eslogan-evento");
		
		
	});

}

/**/

function update_descripcion_evento_by_template(e){
	template_content =  e.target.id;	
	evento = $("#evento").val();
	url =  now + "index.php/api/event/descripcion_template/format/json/";
	actualiza_data(url , { "template_content" : template_content , "evento" : evento } );

	load_data_evento( ".descripcion-p" , "#descripcion-evento" , "descripcion_evento" , ".place_description" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento");
}


function new_restriction(e){
	
	restriccion  = e.target.id;
	evento = $("#evento").val();
	url = now + "index.php/api/templ/retriccion_evento/format/json/";
	registra_data(url , {"evento" : evento, "restriccion" :  restriccion}  );
	load_restricciones_evento();
}
/*Quita del evento la restriccion*/
function delete_restriccion_evento(e){

	restriccion = e.target.id;
	evento = $("#evento").val();
	url = now + "index.php/api/templ/retriccion_evento/format/json/";	
	eliminar_data(url , { "evento" : evento , "restriccion" : restriccion }  );


}
function load_restricciones_evento(){
	
	evento = $("#evento").val();
	url = now + "index.php/api/templ/retriccion_evento/format/json/";
	$.get(url , {"evento" : evento}  ).done(function(data){
		


		llenaelementoHTML(".restricciones-evento-list", data);

	}).fail(function(){
		alert("Fallo");
	});

}