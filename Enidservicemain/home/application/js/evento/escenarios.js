$(document).on("ready", function(){

	
	$("#form-escenario").submit(nuevoescenario);
	$("footer").ready(loadescenarioss);
	$("#form-artistas").submit(nuevoartistaescenario);
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
			$(".edita-modal-escenario").click(updateescenariomodal);

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






/********************************************************************+*/
function updateescenariomodal(e){

	idescenario = e.target.id;
	url = now + "index.php/api/escenario/loadescenariobyid/format/json/";
 		
		$.get(url , { "idescenario" :  idescenario } )
			.done(function(data){

				
				llenaelementoHTML( ".general-info-modal" , data[0] );
				llenaelementoHTML(".descripcion-modal-text", data["descripcion"]);
				llenaelementoHTML(".general-artistas" , data["artistas"]);
				llenaelementoHTML(".nombre-in-button", data["nombreescenariomodal"]);
				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);


				$(".descripcion-modal-text").click(updatedescriptioninmodal);
				$(".remove-artista").click(removeartistaescenario);


			}).fail(function(){
				
				alert(genericresponse[0]);

			});

}



function nuevoartistaescenario(){

	artistainput = $("#artistainput").val();
	idescenario = $("#idescenariomodalartistas").val();
	

	if (artistainput.length > 0 ) {



			url = now + "index.php/api/escenario/registraartistaescenario/format/json/";

			
			$.post( url , $("#form-artistas").serialize() )
			  .done(function( data ) {
			    
			  	
			  		loadataescenario(idescenario);
			  		loadescenarioss();
			  })
			  .fail(function() {
			    
			    alert(genericresponse[0]);
			});

	}
	
	return false;
}



function loadataescenario(idescenario){

	url = now + "index.php/api/escenario/loadescenariobyid/format/json/";
 	

		$.get(url , { "idescenario" :  idescenario } )
			.done(function(data){

							
				llenaelementoHTML( ".general-info-modal" , data[0] );
				llenaelementoHTML(".descripcion-modal-text", data["descripcion"]);
				llenaelementoHTML(".general-artistas" , data["artistas"]);
				llenaelementoHTML(".nombre-in-button", data["nombreescenariomodal"]);
				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);


				$(".descripcion-modal-text").click(updatedescriptioninmodal);
				$(".remove-artista").click(removeartistaescenario);

	


			}).fail(function(){
				
				alert(genericresponse[0]);

			});


}





function updatedescriptioninmodal(){	
	
	$(".descripcion-in-modal-escenario").val($(this).text());

	showonehideone(".descripcion-in-modal-escenario" , ".descripcion-modal-text" );
	$(".descripcion-in-modal-escenario").blur(function(){

		 	nuevadescripcion = $(this).val();
		 	evento_escenario =  $("#idescenariomodalartistas").val();	
		
 			url = now + "index.php/api/escenario/updatedescripcionescenariobyid/format/json/";
 		
			$.post(url , {nuevadescripcion  : nuevadescripcion  ,  idescenario :  evento_escenario  } )
			.done(function(data){

					loadataescenario(idescenario);	
					loadescenarioss();	
					showonehideone(".descripcion-modal-text" , ".descripcion-in-modal-escenario"  );

			}).fail(function(){
				
				alert("ERR");

			});

	});

	


}
/********************************************************************************************/


function removeartistaescenario(e){	
	
	artista_quitar = e.target.id;
	idescenario = $("#idescenariomodalartistas").val();



	url = now + "index.php/api/escenario/deleteartistaescenario/format/json/";
 		
			$.post(url , {artista_quitar  : artista_quitar  ,  idescenario :  idescenario  } )
			.done(function(data){


					loadataescenario(idescenario);	
					loadescenarioss();	
					

			}).fail(function(){
				
				alert("ERR");

			});


}