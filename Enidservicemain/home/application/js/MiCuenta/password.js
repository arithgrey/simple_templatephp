$(document).on("ready", function(){

	$("#botoncito").click(function(){
		trychange();
		$( "#botoncito" ).blur(trychange);
	});
});







function trychange(){

	a = $("#anteriorP").val();
	b = $("#nuevoP").val();
	c = $("#verificaP").val();

	anterior = "" +CryptoJS.SHA1(a);
	nuevo = "" +CryptoJS.SHA1(b);
	confirma = "" +CryptoJS.SHA1(c);



						if((a == null || a == "")||(b == null || b == "")||(c == null || c == "")){

								$( "#alertaError" ).show();
								llenaelementoHTML("#alertaError" , "No se permite campos vacios...");
						}else{



							if ( b.length >= 8) {


										url = now + "index.php/api/cambiopasswordcontrolador/actualizarPassword/format/json";
										$.post( url, { "nuevo": nuevo, "anterior": anterior, "confirma": confirma })
									 		.done(function( data ) {
									 			if (data == true)
									 			{
									 				$( "#alertaError" ).hide();
									 				$( "#alertaExito" ).show();
									 				llenaelementoHTML("#alertaExito" , "Cambios efectuados correctamente, se reiniciara sesion en 5 segundos");
								    				setTimeout ("redireccionar()", 3000);
								    			}
									 			else
									 			{
									 				$( "#alertaError" ).show();
								    				llenaelementoHTML("#alertaError" , data);
									 			}
								    			//alert(data);
										  	})
										 	.fail(function() {
										 		$( "#alertaError" ).show();
								    			llenaelementoHTML("#alertaError" , genericresponse[0] );
										    	
											});	
						
							}else{
					llenaelementoHTML("#alertaError" , "La nueva contraseña debe tener almenos 8 caracteres");
			}			
						 	

						}	
			


}


function redireccionar(){

	location.href=now + "index.php/sessioncontroller/logout";
} 
