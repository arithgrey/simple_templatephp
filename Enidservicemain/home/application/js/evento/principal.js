$(document).on("ready", function(){

	
	$(".nombre-evento-h1").click(updatenameevent);
	$(".edicion-evento").click(updateedicion);
	$(".descripcion-p").click(updatedescripcion);
	//$(".ubicacion-panel").click(updateubicacion);
	
});


/*update nombre evento*/

function updatenameevent(e){

	showonehideone( "#nombre-input" , ".nombre-evento-h1" );
	$("#nombre-input").blur(function(){
		

		nuevotexto = $("#nombre-input").val() ;

		if (nuevotexto.length > 0 ) {

			llenaelementoHTML(".nombre-evento-h1" , nuevotexto  ); 					
		}else{
			llenaelementoHTML(".nombre-evento-h1" , "Nombre de tu evento"  ); 					
		}

		showonehideone( ".nombre-evento-h1"  , "#nombre-input"  );
		

	});

}



/*Update descripción*/
function updateedicion(e){

	showonehideone( "#edicion-input" , ".edicion-evento" );
	$("#edicion-input").blur(function(){
			
		nuevotexto = $("#edicion-input").val(); 
		if (nuevotexto.length >0 ) {			
			llenaelementoHTML(".edicion-evento" , nuevotexto  ); 		
		}else{
			llenaelementoHTML(".edicion-evento" , "Edición 3 nueva era"  ); 						
		}
		showonehideone( ".edicion-evento" , "#edicion-input");
		
		
	});
}




function updatedescripcion(e){


	showonehideone( "#descripcion-evento" , ".descripcion-p" );

	$("#descripcion-evento").blur(function(){
			
		nuevotexto = $("#descripcion-evento").val(); 
		if (nuevotexto.length >0 ) {			
			llenaelementoHTML(".descripcion-p" , nuevotexto  ); 		
		}else{
			llenaelementoHTML(".descripcion-p" , "Describe la experiencia que se vivirá en el espectáculo" ); 						
		}
		showonehideone( ".descripcion-p" , "#descripcion-evento");
		
		
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