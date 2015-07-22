$(document).on("ready", function(){
	
	$("#form-accesos-modal").submit(registraacceso);
	$("#accesos-button").click(loadaccesosevento);	
});




function loadaccesosevento(){

	url = now + "index.php/api/accesos/load/format/json/";
	evento = $("#evaccesos").val(); 


	$.post(url , { evento : evento }  ).done(function(data){

		


		llenaelementoHTML(".list-accesos-modal" , data["accesos"]);		
		llenaelementoHTML( ".data-option-accesos" , data["tipo"] );

		$(".remove-acceso").click(removeacceso);

	}).fail(function(){
		alert(genericresponse[0]);
	});
	


}


function registraacceso(){
	

	


	url = now + "index.php/api/accesos/nuevo/format/json/";
	
	$.post(url , $("#form-accesos-modal").serialize()  ).done(function(data){

		
		
		loadaccesosevento();


	}).fail(function(){
		alert(genericresponse[0]);
	});
	
	return false;
}


/**/
function removeacceso(e){

	acceso = e.target.id;
	evento = $("#evaccesos").val(); 

	$("#aceptar-delete-acceso").click(function(){




				url = now + "index.php/api/accesos/deletebyid/format/json/";
				
				$.post(url , { evento : evento , acceso :  acceso } ).done(function(data){

					
					
					loadaccesosevento();


				}).fail(function(){
					alert(genericresponse[0]);
				});






			
	});
}

