$(document).on("ready", function(){



		$("#form-contacto").submit(record_contacto);
});


function record_contacto(){


	url = now + "index.php/api/contactos/registra_nuevo/format/json/";	
	$.post(url, $("#form-contacto").serialize()).done(function(data){
				

			if (data!= false) {

				redirect(data);

			}else{

				alert(genericresponse[0]);
			}
			
			

	}).fail(function(){
		alert(genericresponse[0]);
	});		
	


	return false;
}	
