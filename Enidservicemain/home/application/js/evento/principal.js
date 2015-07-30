$(document).on("ready", function (){



	$("footer").ready(loaddata);	
	$(".nombre-evento-h1").click(updatenameevent);
	$(".edicion-evento").click(updateedicion);
	$(".descripcion-p").click(updatedescripcion);
	$(".politicas-p").click(updatepoliticas);
	$(".permitido-p").click(updatepermitido);
	$(".restricciones-p").click(updaterestricciones);

	$(".permitidonow").click(loadobjetospermitidos );	
	$(".genero_musical_input").click(update_genero_evento);
	$("#generos_musicales_button").click(show_section_generos);

	$("#social-button").click(showformsocial);
	$("#generosenid-button").click(showformtagsgeneros);
	$("#accesos-button").click(loadaccesosevento);	
	$("#form-accesos-modal").submit(registraacceso);
	$("#servicios-button").click(loadinformationservicios);
	$("#pac-input").click(updateubicacion);	
	$("footer").ready(loadescenarioss);

	$("#generos_musicales_btn").click(load_data_genero);
	$("#form-escenario").submit(nuevoescenario);
	$("#form-artistas").submit(nuevoartistaescenario);


	$("#tematica-button").click( function (){
		show_section_dinamic_button(".tematica_section");	
		load_data_tematica();
	});
	initialize();
	

	generate_img();



	
	
});

/**************************                   ******************* */          




	//
	




/*Load datos */
function loaddata(){
	
	url = now + "index.php/api/event/get_event_by_id/format/json/";	
	$.get(url , $("#form-general-ev").serialize()).done(function(data){

		

		loadinhtml(data);

		
	}).fail(function(){
		
		alert("Err on loaddata");

	});
}





	










/*In the front end */


function loadinhtml(data){

	

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



			
				
				llenaelementoHTML(".nombre-evento-h1", nombre_evento);	
				valorHTML("#nombre-input" , nombre_evento );					

				llenaelementoHTML(".edicion-evento", edicion);	
				valorHTML("#edicion-input" , edicion );	

				valorHTML("#url_social" , url_social);
				valorHTML("#url_social_evento_youtube", url_social_youtube);



				valorHTML(".ubicacioninput" , ubicacion);

				/*Valiadamos info*/		


				if (descripcion_evento == null ) {

					llenaelementoHTML(".descripcion-p" , "<i class='fa fa-plus'></i>  Lo que se vivirá en el evento");

				}else if(descripcion_evento ==  "" ){
					llenaelementoHTML(".descripcion-p" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento");
				}else{

					llenaelementoHTML(".descripcion-p" , descripcion_evento);
					valorHTML("#descripcion-evento" , descripcion_evento);
				}
				











				/************------------**************/



				if (politicas == null ) {

					llenaelementoHTML(".politicas-p" , "<i class='fa fa-plus'></i> Lo que podría anticiparse como reembolsos o cambios");

				}else if(politicas ==  "" ){
					llenaelementoHTML(".politicas-p" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse como reembolsos o cambios");
				}else{

					llenaelementoHTML(".politicas-p" , politicas);
					valorHTML("#politicas-evento" , politicas);
				}

				/****************************/
				
				




				if (permitido == null ) {

					llenaelementoHTML(".permitido-p" , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento");

				}else if(permitido ==  "" ){
					llenaelementoHTML(".permitido-p" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento");
				}else{

					llenaelementoHTML(".permitido-p" ,  permitido);
					valorHTML("#permitido-evento" , permitido);
				}








				/************------------**************/



				if (restriciones == null ) {

					llenaelementoHTML(".restricciones-p" , "<i class='fa fa-plus'></i> Lo que podría anticiparse dentro del evento");

				}else if(restriciones ==  "" ){
					llenaelementoHTML(".restricciones-p" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse dentro del evento");
				}else{

					llenaelementoHTML(".restricciones-p" , restriciones);
					valorHTML("#restricciones-evento" , restriciones);
				}

				/****************************/
				
					


		}

	

}/*Termina función*/





/*update nombre evento*/
function updatenameevent(e){

	showonehideone( "#nombre-input" , ".nombre-evento-h1" );
	$("#nombre-input").blur(function(){
		

		nuevotexto = $("#nombre-input").val();
				

		if (nuevotexto.length > 0 ) {

				
				updateindebname( nuevotexto );

		}else{
				llenaelementoHTML(".nombre-evento-h1" , "Nombre de tu evento"  ); 					
		}

		showonehideone( ".nombre-evento-h1"  , "#nombre-input"  );
		

	});

}

function updateindebname(nuevotexto){

	
	url =  now + "index.php/api/event/updatenombre/format/json/";    

	$.post(url , { "nombre" : nuevotexto , "evento" : $("#evento").val() } ).done(function(data){

		loaddata();

	}).fail(function(){

		alert("Falla al actualizar");
	});



}







/******************************************************************/


/*Update descripción*/
function updateedicion(e){

	showonehideone( "#edicion-input" , ".edicion-evento" );
	$("#edicion-input").blur(function(){
			
		nuevotexto = $("#edicion-input").val(); 
				
		if (nuevotexto.length >0 ) {			
			
				updateindebenicion(nuevotexto);

		}else{
			llenaelementoHTML(".edicion-evento" , "Edición 3 nueva era"  ); 						
		}
		showonehideone( ".edicion-evento" , "#edicion-input");
		
		
	});
}


function updateindebenicion(nuevotexto){

	
	url =  now + "index.php/api/event/updateedicion/format/json/";    

	$.post(url , { "edicion" : nuevotexto , "evento" : $("#evento").val() } ).done(function(data){


		loaddata();

	}).fail(function(){

		alert("Falla al actualizar");
	});



}











/******************************************************************/


















function updatedescripcion(e){


	showonehideone( "#descripcion-evento" , ".descripcion-p" );

	$("#descripcion-evento").blur(function(){
			
		nuevotexto = $("#descripcion-evento").val(); 
				
		


		
		if (nuevotexto != null  ) {	

			updateindbdescripcion( nuevotexto.trim() );
			
		}else{

			llenaelementoHTML(".descripcion-p" , "Describe la experiencia que se vivirá en el espectáculo" ); 						
		}
		showonehideone( ".descripcion-p" , "#descripcion-evento");
		
		
	});

}


function updateindbdescripcion(nuevotexto){

	url =  now + "index.php/api/event/updatedescripcion/format/json/";    
	$.post(url , { "descripcion_evento" : nuevotexto , "evento" : $("#evento").val() } )
	.done(function(data){
		


		loaddata();


	}).fail(function(){

		alert("Falla al actualizar");
	});

}

/************************updatepoliticas *******************************/







function updatepoliticas(e){




	showonehideone( "#politicas-evento" , ".politicas-p" );

	$("#politicas-evento").blur(function(){
			
		nuevotexto = $("#politicas-evento").val(); 
				
		


		
		if (nuevotexto != null  ) {	

			updateindbpoliticas( nuevotexto.trim() );
			
		}else{

			llenaelementoHTML(".politicas-p" , "Describe la experiencia que se vivirá en el espectáculo" ); 						
		}
		showonehideone( ".politicas-p" , "#politicas-evento");
		
		
	});

}


function updateindbpoliticas(nuevotexto){

	url =  now + "index.php/api/event/updatepoliticas/format/json/";    
	$.post(url , { "politicas_evento" : nuevotexto , "evento" : $("#evento").val() } )
	.done(function(data){
		

		loaddata();


	}).fail(function(){

		alert("Falla al actualizar");
	});

}


/*Permitido Permitido Permitido Permitido Permitido Permitido Permitido */


























function updatepermitido(e){




	showonehideone( "#permitido-evento" , ".permitido-p" );

	$("#permitido-evento").blur(function(){
			
		nuevotexto = $("#permitido-evento").val(); 
				
		


		
		if (nuevotexto != null  ) {	

			updateindbpermitido( nuevotexto.trim() );
			
		}else{

			llenaelementoHTML(".permitido-p" , "Describe com que podrá acceder al evento el cliente" ); 						
		}
		showonehideone( ".permitido-p" , "#permitido-evento");
		
		
	});

}


function updateindbpermitido(nuevotexto){

	url =  now + "index.php/api/event/updatepermitido/format/json/";    
	evento = $("#evento").val();
	$.post(url , { "permitido_evento" : nuevotexto , "evento" : evento  } )
	.done(function(data){
		

		loaddata();


	}).fail(function(){

		alert("Falla al actualizar");
	});

}















/*End permitido *End permitido *End permitido *End permitido *End permitido *End permitido */







function updaterestricciones(e){




	showonehideone( "#restricciones-evento" , ".restricciones-p" );

	$("#restricciones-evento").blur(function(){
			
		nuevotexto = $("#restricciones-evento").val(); 
				


		
		if (nuevotexto != null  ) {	

			updateindbrestricciones( nuevotexto.trim() );
			
		}else{

			llenaelementoHTML(".restricciones-p" , "Describe com que podrá acceder al evento el cliente" ); 						
		}
		showonehideone( ".restricciones-p" , "#restricciones-evento");
		
		
	});

}


function updateindbrestricciones(nuevotexto){

	url =  now + "index.php/api/event/updaterestricciones/format/json/";    
	$.post(url , { "restricciones_evento" : nuevotexto , "evento" : $("#evento").val() } )
	.done(function(data){
		

		loaddata();


	}).fail(function(){

		alert("Falla al actualizar");
	});

}










































/************************************************************************************************/







/*Nueva dirección */


function updateubicacion(){
	
	showonehideone( "#ubicacion-input" , ".text-ubicacion" );

	$("#pac-input").blur(function(){
			
		nuevotexto = $("#pac-input").val(); 
				

		updateubicacionindb(nuevotexto);
		
		
	});

}


function updateubicacionindb(nuevotexto){
	
	url =  now + "index.php/api/event/updateubicacion/format/json/";    

	$.post(url , { "ubicacion" : nuevotexto , "evento" : $("#evento").val() } )
	.done(function(data){
		
		loaddata();

	}).fail(function(){

		alert("Falla al actualizar");
	});

}
/*******************************************/
function tryrecordgeneros(e){
	
	if (e.keyCode == 13){

 		 generos = $("#tags_enid_input").val();	

		 	url =  now + "index.php/api/event/updategeneros/format/json/";    

			$.post(url , { "generos" : generos  , "evento" : $("#evento").val() } )
			.done(function(data){
					
				
				loaddata();

			}).fail(function(){

				alert(genericresponse[0]);
			});






 	}
}


/*recordgenerosrecordgenerosrecordgenerosrecordgenerosrecordgenerosrecordgenerosrecordgeneros*/



/*tagr record */







function showformsocial(){

	if ($(".social-media-event").is(":visible")) {
		
		$(".social-media-event").hide();

	}else{
		$(".social-media-event").show();


			$("#form-social").submit(function(){				
					url =  now + "index.php/api/event/updateurlbyid/format/json/";    					
					$.post(url ,  $("#form-social").serialize() )
					.done(function(data){
							
								loaddata();

					}).fail(function(){

						alert(genericresponse[0]);
					});

					/**/

				return false;	
			});




			$("#form-social-youtube").submit(function(){				
					url =  now + "index.php/api/event/updateurlyoutubebyid/format/json/";    					
					$.post(url ,  $("#form-social-youtube").serialize() )
					.done(function(data){
							
								loaddata();

					}).fail(function(){

						alert(genericresponse[0]);
					});

					/**/

				return false;	
			});









	}
	
	
}





function showformtagsgeneros(){
	

	if ($(".section_generosmusicales").is(":visible")) {

		$(".section_generosmusicales").hide();

	}else{

		$(".section_generosmusicales").show();
	}

}




function show_section_generos(){
	


	if ($(".generos_musicales_div").is(":visible")) {

		$(".generos_musicales_div").hide();

	}else{

		$(".generos_musicales_div").show();
	}
	
}

