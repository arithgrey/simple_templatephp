$(document).on("ready", function(){
	$("#inbutton").click(trysession);
});
/**/
function trysession(){
	pw = $("#pw").val();
	if(pw.length >= 8){
		expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		mail = $('#mail').val();		
		/*Validamos el mail*/
		if (!expr.test(mail)) {
			llenaelementoHTML(".reportesession" , "Registre un email correcto");
			recorrepage("#mail");	
		}else{
			pwpost = ""+CryptoJS.SHA1(pw);
			$("#secret").val(pwpost);			
			url = $(".now").val()+"index.php/api/sessionrestcontroller/start/format/json";
			$.ajax({
					url : url , 
					type : "POST" , 
					data: $("#in").serialize(), 
					beforeSend : function(){
						$("#status_registro_user").show();	
					} 
					
					}).done(function(data){			

						/*Cuando regresamos los datos*/
						
								
						if (data == 1 ) {
							next  = now + "index.php/startsession/presentacion/";
							redirect(next);					
						}else{					
							llenaelementoHTML(".reportesession" , data);
							$("#inbutton").click(trysession);
							$("#status_registro_user").hide();
						}

			}).fail(function(){							
				llenaelementoHTML(".reportesession" , "");
				$("#inbutton").click(trysession);
				$("#status_registro_user").hide();
			});
			
		}
	}else{		
		/*Regresamos el error*/
		llenaelementoHTML(".reportesession" , "Contraseña muy corta");
		/*Deslizamos el navegador al error*/
		recorrepage("#pw");
	}	
	return false;
}