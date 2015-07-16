$(document).on("ready", function(){

	
	$("#form-escenario").submit(nuevoescenario);
	$("footer").ready(loadescenarioss);
});



function  nuevoescenario(){

	url =  now  + "index.php/api/escenario/nuevo/format/json/";		

	
	
	$.post(url , $("#form-escenario").serialize() ).done(function(data){

			loadescenarioss();

	}).fail(function(){
		
		alert("ERR");

	});

	return false;
}


function  loadescenarioss(){
	
	url =  now  + "index.php/api/escenario/load/format/json/";		

	
	
	$.post(url , $("#form-escenario").serialize() ).done(function(data){

			llenaelementoHTML("#list_escenarios" , data);

			$(".descripcion_escenario_update").click(updatedescription);
			$(".deleteescenario").click(deleteescenario);

	}).fail(function(){
		
		alert("ERR");

	});


}

function updatedescription(e){
	


	idescenario = e.target.id;
	inpu_escenario_ =  "#inpu_escenario_" + idescenario;		

	span= "#"+ idescenario;

		showonehideone( inpu_escenario_ , span );
		
		$(inpu_escenario_).blur(function(){

			nuevovalor =  $(this).val(); 
			updatedescriptionindb( idescenario , nuevovalor);

		});


	/*Registramos cambios */	

}



 function updatedescriptionindb(idescenario , nuevadescripcion ){ 	



 		evento_escenario =  $("#evento_escenario").val();
 		
 		url = now + "index.php/api/escenario/updatedescripcionescenario/format/json/";
 		
			$.post(url , {"idescenario" :  idescenario , "nuevadescripcion" :  nuevadescripcion, "evento_escenario" :  evento_escenario } )
			.done(function(data){

					loadescenarioss();	

			}).fail(function(){
				
				alert("ERR");

			});



 	/*
 	if (e.keyCode == 13){

 		url = now + "index.php/api/escenario/updatedescripcion/format/json/";
 		
			$.post(url , $("#form-escenario").serialize() ).done(function(data){

					loadescenarioss();

			}).fail(function(){
				
				alert("ERR");

			});
 	}*/


 }



/*************************************************************************/

function deleteescenario(e){
	

		$("#aceptar-delete").click(function(){


		idescenario = e.target.id;
		url = now + "index.php/api/escenario/deleteescenario/format/json/";
 		
			$.post(url , {"idescenario" :  idescenario } )
			.done(function(data){

				loadescenarioss();

			}).fail(function(){
				
				alert(genericresponse[0]);

			});



		});	


}