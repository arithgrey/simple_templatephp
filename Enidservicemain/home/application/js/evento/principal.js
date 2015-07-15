$(document).on("ready", function(){

	$("footer").ready(loaddata);	
	$(".nombre-evento-h1").click(updatenameevent);
	$(".edicion-evento").click(updateedicion);
	$(".descripcion-p").click(updatedescripcion);
	//$(".ubicacion-panel").click(updateubicacion);
	
});


/*Load datos */
function loaddata(){
	
	url = now + "index.php/api/event/get_event_by_id/format/json/";	
	$.get(url , $("#form-general-ev").serialize()).done(function(data){

		

		loadinhtml(data);
		
	}).fail(function(){
		
		alert("erro");

	});
}



/*In the front end */


function loadinhtml(data){

	

		for (var x in data) {
			/*Data*/	
			nombre_evento = data[x].nombre_evento;
			edicion = data[x].edicion;
			descripcion_evento = data[x].descripcion_evento;


			/*In THML*/

				/*Nombre del evento */
				
				llenaelementoHTML(".nombre-evento-h1", nombre_evento);	
				valorHTML("#nombre-input" , nombre_evento );	

				/*Edición del evento */

				llenaelementoHTML(".edicion-evento", edicion);	
				valorHTML("#edicion-input" , edicion );	

				/*Valiadamos info*/		
				if (descripcion_evento.length >0 ) {

					llenaelementoHTML(".descripcion-p", descripcion_evento );	
					valorHTML("#descripcion-evento" , descripcion_evento );		
				}
				



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
		if (nuevotexto.length >0 ) {			
			updateindbdescripcion(nuevotexto);
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



/*Nueva dirección */


function updateubicacion(){
	
	showonehideone( "#ubicacion-input" , ".text-ubicacion" );

	$("#ubicacion-input").blur(function(){
			
		nuevotexto = $("#ubicacion-input").val(); 
		if (nuevotexto.length >0 ) {			

			llenaelementoHTML(".text-ubicacion" , nuevotexto  ); 		

		}else{
			llenaelementoHTML(".text-ubicacion" , "Dirección del evento" ); 						
		}
		
		showonehideone( ".text-ubicacion" , "#ubicacion-input" );
		
		
	});

}