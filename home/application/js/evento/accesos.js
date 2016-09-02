function load_accesos_evento(){
	url = now + "index.php/api/accesos/load/format/json/";
	evento = $("#evaccesos").val(); 
	$.post(url , { evento : evento }  ).done(function(data){	
		llenaelementoHTML(".list-accesos-modal" ,  "<br><br>" +  data);		
			$(".avanzado-accesos").click(function(e){
			id_acceso  =e.target.id;
			redirect(now +'index.php/accesos/configuracionavanzada/'+id_acceso+"/" + evento +"/"  );
		});
	}).fail(function(){
		console.log(genericresponse[0]);
	});
}
/**/
function registra_acceso(){

	url = now + "index.php/api/accesos/nuevo/format/json/";	
	$.post(url , $("#form-accesos-modal").serialize()  ).done(function(data){
		load_accesos_evento();	
		clean_accesos();
		
		

	}).fail(function(){
		
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
			
			console.log(genericresponse[0]);

		});
	});
}
/**/
function clean_accesos(){
	var inputs =  ["#nombre_acceso" , "#nuevo_inicio_acceso" , "#nuevo_termino_acceso"  , "#precio_acceso"];  
	reset_fields(inputs); 	
}

