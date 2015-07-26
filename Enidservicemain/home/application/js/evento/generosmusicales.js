$(document).on("ready" ,function(){

	$("#generos_musicales_btn").click(load_data_genero);

});


function load_data_genero(){

	url = now + "index.php/generosmusicales/get_byid_evento/format/json";
	idevento =  $("#evento").val();

	$.get(url , { idevento : idevento }).done(function(data){

		
		llenaelementoHTML(".select_generos", data);
		$(".genero_musical_input").click(update_genero_evento);

	}).fail(function(){
		alert(genericresponse[0]);

	});

}




function update_genero_evento(e){
	
	url = now + "index.php/generosmusicales/update_genero_evento/format/json";
	evento =  $("#evento").val();
	genero = e.target.id;

	$.post(url , { evento : evento , genero : genero   }).done(function(data){

	}).fail(function(){
		alert(genericresponse[0]);

	});


}

