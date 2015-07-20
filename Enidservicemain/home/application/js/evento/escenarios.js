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

			llenaelementoHTML("#list_escenarios" , data["info"]);
			llenaelementoHTML("#numero_escenarios" , "<i class='fa fa-play'></i> Escenarios #" +  data["numero_escenarios"] );

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
				llenaelementoHTML(".day_escenario_button" , "<i class='fa fa-calendar'></i> " + data["iniciotermino"]);


				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);
				valorHTML("#nombre-escenario-input-modal" ,  data["nombreescenariomodal"] );
				valorHTML(".input_tipo" , data["tipoescenario"] );
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);


				$(".descripcion-modal-text").click(updatedescriptioninmodal);
				$(".remove-artista").click(removeartistaescenario);
				$(".tipo-evento-modal").click(updatetipoescenario);
				$(".nombre-escenario-modal").click(updatenombreescenario);
				$('.day_escenario_button').click(updatedaysescenario);
				$('.horario_artista').click(updatehorarioartista);

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
				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);

				llenaelementoHTML(".day_escenario_button" , "<i class='fa fa-calendar'></i> " + data["iniciotermino"]);
				
				valorHTML("#nombre-escenario-input-modal" ,  data["nombreescenariomodal"] );
				valorHTML(".input_tipo" , data["tipoescenario"] );
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);




				$(".descripcion-modal-text").click(updatedescriptioninmodal);
				$(".remove-artista").click(removeartistaescenario);
				$(".tipo-evento-modal").click(updatetipoescenario);
				$(".nombre-escenario-modal").click(updatenombreescenario);
				$('.day_escenario_button').click(updatedaysescenario);
				$('.horario_artista').click(updatehorarioartista);



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















/**********************************************************************/
function updatetipoescenario(e){

	nuevovalotipoescenario  = e.target.id;
	idescenario = $("#idescenariomodalartistas").val();
	url = now + "index.php/api/escenario/updateescenariotipo/format/json/";
 	

	$.post(url, {idescenario : idescenario , tipoescenario : nuevovalotipoescenario}).done(function(data){

			
					loadataescenario(idescenario);	
					loadescenarioss();

	}).fail(function(){
		alert(genericresponse[0]);
	});	


}



function updatenombreescenario(){

	showonehideone(".nombre-escenario-input-modal" , ".nombre-escenario-modal" );
	$(".nombre-escenario-input-modal").blur(function(){

				url = now + "index.php/api/escenario/updatenombreescenariobyid/format/json/";
			 	nuevonombre = $(this).val();
			 	idescenario  =  $("#idescenariomodalartistas").val();	

			 	$.post(url , {nuevonombre : nuevonombre , idescenario : idescenario  })
			 	.done(function(data){
			 		
			 		showonehideone(  ".nombre-escenario-modal" , ".nombre-escenario-input-modal");

			 	}).fail(function(){
			 			alert(genericresponse[0]);
			 	});

	});

		



}	
 







 function updatedaysescenario(){

 	showonehideone( ".day_escenario_inputs" , ".day_escenario_button" );
 	$("#nuevo_termino_escenario").blur(function(){


 		nuevo_inicio =  $("#nuevo_inicio_escenario").val();
 		nuevo_termino = $("#nuevo_termino_escenario").val();
 		idescenario  =  $("#idescenariomodalartistas").val();	

 				url = now + "index.php/api/escenario/updateinicioterminobyid/format/json/";
			 	$.post(url , {nuevoinicio : nuevo_inicio , nuevotermino : nuevo_termino , idescenario : idescenario  })
			 	.done(function(data){
			 			

			 		showonehideone(  ".day_escenario_button" , ".day_escenario_inputs" );
			 		loadataescenario(idescenario);	
					loadescenarioss();

			 	}).fail(function(){
			 			alert(genericresponse[0]);
			 	});





 	});
 	
 		
 }
 




 function updatehorarioartista(e){

 	idartista = e.target.id;
 	idescenario = $("#idescenariomodalartistas").val();

 	$("#tregistrohorario").click(function(){

 		
 		hiartista = $("#hiartista").val();
 		htartista = $("#htartista").val();



 			url = now + "index.php/api/escenario/updateinicioterminoartistabyid/format/json/";
			 	$.post(url , { idartista : idartista , idescenario : idescenario , hiartista : hiartista , htartista : htartista })
			 	.done(function(data){
			 			

			 		
			 		loadataescenario(idescenario);	
					//loadescenarioss();

			 	}).fail(function(){
			 			alert(genericresponse[0]);
			 	});








 	});
 	



 }

