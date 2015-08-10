function load_data_servicios(){

	url = now + "index.php/api/serviciosevento/load/format/json/";
	evento = $(".eventoservicios").val();


	$.get(url , { evento : evento }  ).done(function(data){




		llenaelementoHTML(".servicios-evento-modal" , data);		
		$(".serviciocheck").click(serviciocheck);
		$(".up-all-serv").click(update_all_services);
		

	}).fail(function(){
		alert(genericresponse[0]);
	});
	

	


}





function serviciocheck(e){

	idservicio  = e.target.id;		 
	evento = $(".eventoservicios").val();

	url = now + "index.php/api/serviciosevento/update/format/json/";
	$.post(url , { evento : evento , idservicio : idservicio  }  ).done(function(data){


			load_data_servicios();

	}).fail(function(){
		alert(genericresponse[0]);
	});
}	


function update_all_services(){
	
	id_evento = $("#evento").val();
	url = now + "index.php/api/serviciosevento/update_all_in_event/format/json/"; 
	updates_send(url , {"evento" : id_evento});
	load_data_servicios();
	
}