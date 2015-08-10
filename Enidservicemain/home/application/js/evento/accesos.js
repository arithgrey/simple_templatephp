function load_accesos_evento(){

	url = now + "index.php/api/accesos/load/format/json/";
	evento = $("#evaccesos").val(); 
	$.post(url , { evento : evento }  ).done(function(data){

		llenaelementoHTML(".list-accesos-modal" , data["accesos"]);		
		llenaelementoHTML( ".data-option-accesos" , data["tipo"] );

		$(".remove-acceso").click(remove_acceso);
		$(".avanzado-accesos").click(function(e){
			
			id_acceso  =e.target.id;
			redirect(now +'index.php/accesos/configuracionavanzada/'+id_acceso+"/" + evento +"/"  );
		});

	}).fail(function(){
		alert(genericresponse[0]);
	});
}


function registra_acceso(){

	url = now + "index.php/api/accesos/nuevo/format/json/";	
	$.post(url , $("#form-accesos-modal").serialize()  ).done(function(data){

		load_accesos_evento();


	}).fail(function(){
		alert(genericresponse[0]);
	});
	
	return false;
}

/**/
function remove_acceso(e){

	acceso = e.target.id;
	evento = $("#evaccesos").val(); 
	$("#aceptar-delete-acceso").click(function(){
				url = now + "index.php/api/accesos/deletebyid/format/json/";
				
				$.post(url , { evento : evento , acceso :  acceso } ).done(function(data){
					load_accesos_evento();
				}).fail(function(){
					alert(genericresponse[0]);
				});

	});
}

