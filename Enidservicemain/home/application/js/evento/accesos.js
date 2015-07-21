$(document).on("ready", function(){
	
	$("#form-accesos-modal").submit(registraacceso);
	$("#accesos-button").click(loadaccesosevento);	
});




function loadaccesosevento(){

	url = now + "index.php/api/accesos/load/format/json/";
	evento = $("#evaccesos").val(); 
	$.post(url , {evento : evento }  ).done(function(data){

		
		llenaelementoHTML( ".data-option-accesos" , data["tipo"] );



	}).fail(function(){
		alert(genericresponse[0]);
	});
	


}


function registraacceso(){
	

	


	url = now + "index.php/api/accesos/nuevo/format/json/";
	
	$.post(url , $("#form-accesos-modal").serialize()  ).done(function(data){

		alert(data);
		//llenaelementoHTML( ".data-option-accesos" , data["tipo"] );



	}).fail(function(){
		alert(genericresponse[0]);
	});
	





	return false;
}