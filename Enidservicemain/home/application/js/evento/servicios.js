
function loadinformationservicios(){

	url = now + "index.php/api/serviciosevento/load/format/json/";
	evento = $(".eventoservicios").val();


	$.get(url , { evento : evento }  ).done(function(data){




		llenaelementoHTML(".servicios-evento-modal" , data);		
		$(".serviciocheck").click(serviciocheck);
		

	}).fail(function(){
		alert(genericresponse[0]);
	});
	



}





function serviciocheck(e){

	idservicio  = e.target.id;		 
	evento = $(".eventoservicios").val();

	url = now + "index.php/api/serviciosevento/update/format/json/";
	$.post(url , { evento : evento , idservicio : idservicio  }  ).done(function(data){


			loadinformationservicios();

	}).fail(function(){
		alert(genericresponse[0]);
	});





}	