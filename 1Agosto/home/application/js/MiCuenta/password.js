$(document).on("ready", function(){

	$("#form-pw").submit(trychange);
});
/**/
function trychange(){

	a = $("#actual_pw").val();
	b = $("#nueva_pw").val();
	c = $("#vericacion_pw").val();
	anterior = "" +CryptoJS.SHA1(a);
	nuevo = "" +CryptoJS.SHA1(b);
	confirma = "" +CryptoJS.SHA1(c);

		if((a == null || a == "")||(b == null || b == "")||(c == null || c == "")){			
			/*Validamos los campos sean llenados*/
			llenaelementoHTML(".reponse-update-pw" , "<div class='alert-fail' id='alerta-response-pw'><em>Uno de los campos se encuentra vacio</em></div>");			
		}else{
			/*Validamos que las cadenas sean iguales */
			if ( b!= c ) {
				llenaelementoHTML(".reponse-update-pw" , "<div class='alert-fail' id='alerta-response-pw'><em>Las nuevas contraseñas son distintas</em></div>");				
			}else{
				/*Validamos que tenga al menos 8 caracteres la contraseña*/
				if ((b.length  < 8)||(c.length  < 8)){
					llenaelementoHTML(".reponse-update-pw" , "<div class='alert-fail' id='alerta-response-pw'><em>Las nueva contraaseña debe tener al menos 8 caracteres</em></div>");
			
				}else{
					/*Actualizamos contraseñas*/
					actualiza_password(anterior , nuevo , confirma);

				}
			}
			/**/

		}
		$("#alerta-response-pw").show();
	return false;

}
/**/
function  actualiza_password(anterior , nuevo , confirma){
	url = now + "index.php/api/cambiopasswordcontrolador/actualizarPassword/format/json";
	$.post( url, { "nuevo": nuevo, "anterior": anterior, "confirma": confirma }).done(function( data ) {					
		if (data == true){	
			llenaelementoHTML(".reponse-update-pw" , "<div class='alert-fail' id='alerta-response-pw'><em>Contraseña actualizada correctamente, inicia sessión para verificar el cambio </em></div>");					
			setInterval('termina_session()',3000);
		}else{
			llenaelementoHTML(".reponse-update-pw" , "<div class='alert-fail' id='alerta-response-pw'><em>"+data+"</em></div>");			
		}	
		$("#alerta-response-pw").show();							    		
	}).fail(function(){
		llenaelementoHTML(".reponse-update-pw" , "<div class='alert-fail' id='alerta-response-pw'><em>"+genericresponse[0] +"</em></div>");
		$("#alerta-response-pw").show();										    	
	});	
}
/*Salir del sistema para confirmar cambio*/
function termina_session(){
	url = now + 'index.php/home/logout';
	redirect(url);	
}
