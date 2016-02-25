$(document).on("ready", function(){

	$("#botoncito").click(function(){
		trychange();
		$( "#botoncito" ).blur(trychange);
	});
});
/**/
function trychange(){

	a = $("#anteriorP").val();
	b = $("#nuevoP").val();
	c = $("#verificaP").val();
	anterior = "" +CryptoJS.SHA1(a);
	nuevo = "" +CryptoJS.SHA1(b);
	confirma = "" +CryptoJS.SHA1(c);

						if((a == null || a == "")||(b == null || b == "")||(c == null || c == "")){

								$( "#alertaError" ).show();
								llenaelementoHTML("#alertaError" , "<div class='alert-fail'><em>No se permite campos vacios...</em></div>");

						}else{



							if ( b.length >= 8) {


										url = now + "index.php/api/cambiopasswordcontrolador/actualizarPassword/format/json";
										$.post( url, { "nuevo": nuevo, "anterior": anterior, "confirma": confirma })
									 		.done(function( data ) {
									 			if (data == true){	

									 				showonehideone( "#alertaExito" , "#alertaError"   );									 			
									 				llenaelementoHTML("#alertaExito" , "<div class='alert-ok'><em>Cambios efectuados correctamente, se reiniciara sesion en 5 segundos</em></div>");
								    				setTimeout ("redireccionar()", 3000);
								    			}else{

									 				$( "#alertaError" ).show();
								    				llenaelementoHTML("#alertaError" , "<div class='alert-ok'><em>"+data+"</em></div>");
									 			}
								    			
										  	}).fail(function() {
										 		$( "#alertaError" ).show();
								    			llenaelementoHTML("#alertaError" , "<div class='alert-fail'><em>" + genericresponse[0] + "</em></div>" );
										    	
											});	
						
							}else{
									llenaelementoHTML("#alertaError" , "<div class='alert-fail><em>La nueva contraseña debe tener almenos 8 caracteres</em></div>");
							}			
						 	

						}			
}
/**/
function redireccionar(){

	location.href=now + "index.php/sessioncontroller/logout";
} 
