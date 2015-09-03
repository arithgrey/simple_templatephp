function  nuevo_escenario(){
	url =  now  + "index.php/api/escenario/escenario_evento/format/json/";		
	
	$.post(url , $("#form-escenario").serialize() ).done(function(data){

			load_data_escenarios();
			$(".nuevo-escenario-input").val("");


	}).fail(function(){
		
		alert("ERR");
	});

	return false;
}


function load_data_escenarios(){
	
	url =  now  + "index.php/api/escenario/load/format/json/";		
	$.post(url , $("#form-escenario").serialize() ).done(function(data){
			
			if (data != null ) {

				llenaelementoHTML("#list_escenarios" , data["info"]);
				llenaelementoHTML("#numero_escenarios" , "<i class='fa fa-play'></i> Escenarios #" +  data["numero_escenarios"] );
				$(".descripcion_escenario_update").click(update_description_escenario);
				$(".deleteescenario").click(delete_escenario);
				$(".edita-modal-escenario").click(update_escenario_modal);
			}					

	}).fail(function(){
		
		alert("ERR");

	});


}

function update_description_escenario(e){	
	idescenario = e.target.id;
	inpu_escenario_ =  "#inpu_escenario_" + idescenario;		
	span= "#"+ idescenario;
	showonehideone( inpu_escenario_ , span );

		$(inpu_escenario_).blur(function(){
			nuevovalor =  $(this).val(); 
			update_description_in_db( idescenario , nuevovalor);


		});
	/*Registramos cambios */	

}



 function update_description_in_db(idescenario , nuevadescripcion ){ 	
 		evento_escenario =  $("#evento").val(); 		
 		url = now + "index.php/api/escenario/updatedescripcionescenario/format/json/"; 				
		data_send = {"idescenario" :  idescenario , "nuevadescripcion" :  nuevadescripcion, "evento_escenario" :  evento_escenario }
		updates_send(url , data_send);
		load_data_escenarios();	

 }



/*************************************************************************/

function delete_escenario(e){
		$("#aceptar-delete").click(function(){
		idescenario = e.target.id;
		url = now + "index.php/api/escenario/deleteescenario/format/json/";
 		
			$.post(url , {"idescenario" :  idescenario } )
			.done(function(data){

				load_data_escenarios();

			}).fail(function(){
				
				alert(genericresponse[0]);

			});
		});	
}






/********************************************************************+*/
function update_escenario_modal(e){

	idescenario = e.target.id;
	url = now + "index.php/api/escenario/loadescenariobyid/format/json/";
 		
		$.get(url , { "idescenario" :  idescenario } )
			.done(function(data){

				
				llenaelementoHTML( ".general-info-modal" , data[0] );
				llenaelementoHTML(".descripcion-modal-text", data["descripcion"]);
				llenaelementoHTML(".general-artistas" , data["artistas"]);
				llenaelementoHTML(".day_escenario_button" , "<i class='fa fa-calendar'></i> Presentación " + data["iniciotermino"]);


				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);
				valorHTML("#nombre-escenario-input-modal" ,  data["nombreescenariomodal"] );
				valorHTML(".input_tipo" , data["tipoescenario"] );
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);

				
				$(".descripcion-modal-text").click(update_description_in_modal);
				$(".remove-artista").click(remove_artista_in_escenario);
				$(".tipo-evento-modal").click(update_tipo_escenario);
				$(".nombre-escenario-modal").click(update_nombre_escenario);
				$('.day_escenario_button').click(update_days_escenario);
				$('.horario_artista').click(update_horario_artista);
				$('#avanzado-config-escenario').click(function(){
					redirect( now + "index.php/escenario/configuracionavanzada/"+idescenario );
				});				

			}).fail(function(){
				
				alert(genericresponse[0]);

			});

}



function nuevo_artista_escenario(){

	artistainput = $("#artistainput").val();
	idescenario = $("#idescenariomodalartistas").val();
	if (artistainput.length > 0 ) {
			url = now + "index.php/api/escenario/escenario_artista/format/json/";
			$.post( url , $("#form-artistas").serialize() )
			  .done(function( data ) {			    			  
			  		load_data_escenario(idescenario);
			  		load_data_escenarios();
			  		$("#artistainput").val("");
			  		
			  })
			  .fail(function() {
			    
			    alert(genericresponse[0]);
			});

	}
	
	return false;
}



function load_data_escenario(idescenario){

	url = now + "index.php/api/escenario/loadescenariobyid/format/json/";
 	

		$.get(url , { "idescenario" :  idescenario } )
			.done(function(data){

							
				
				llenaelementoHTML( ".general-info-modal" , data[0] );
				llenaelementoHTML(".descripcion-modal-text", data["descripcion"]);
				llenaelementoHTML(".general-artistas" , data["artistas"]);			
				llenaelementoHTML(".nombre-escenario-modal" , data["nombreescenariomodal"]);

				llenaelementoHTML(".day_escenario_button" , "<i class='fa fa-calendar'></i> Presentación " + data["iniciotermino"]);
				
				valorHTML("#nombre-escenario-input-modal" ,  data["nombreescenariomodal"] );
				valorHTML(".input_tipo" , data["tipoescenario"] );
				valorHTML("#idescenariomodalartistas" , idescenario);
				valorHTML(".descripcion-in-modal-escenario" , data["descripcion"]);


				$(".descripcion-modal-text").click(update_description_in_modal);
				$(".remove-artista").click(remove_artista_in_escenario);
				$(".tipo-evento-modal").click(update_tipo_escenario);
				$(".nombre-escenario-modal").click(update_nombre_escenario);
				$('.day_escenario_button').click(update_days_escenario);
				$('.horario_artista').click(update_horario_artista);
				
				


			}).fail(function(){
				
				alert(genericresponse[0]);

			});


}





function update_description_in_modal(){	

	$(".descripcion-in-modal-escenario").val($(this).text());
	showonehideone(".descripcion-in-modal-escenario" , ".descripcion-modal-text" );
	$(".descripcion-in-modal-escenario").blur(function(){

		 	url = now + "index.php/api/escenario/updatedescripcionescenariobyid/format/json/";
			data_send = {nuevadescripcion  : $(this).val()  ,  idescenario :  $("#idescenariomodalartistas").val()  }	
			updates_send(url , data_send);			
			load_data_escenario($("#idescenariomodalartistas").val() );
			showonehideone(".descripcion-modal-text" , ".descripcion-in-modal-escenario"  );
			load_data_escenarios();

	});

}
/********************************************************************************************/


function remove_artista_in_escenario(e){	
	
	artista = e.target.id;
	escenario = $("#idescenariomodalartistas").val();
	
	

		
	url =now + "index.php/api/escenario/escenario_artista/format/json";
	eliminar_data(url , {"idescenario" : escenario , "idartista": artista });		
	load_data_escenario(idescenario);	
	load_data_escenarios();					



}

/**********************************************************************/
function update_tipo_escenario(e){

	nuevovalotipoescenario  = e.target.id;	
	url = now + "index.php/api/escenario/escenario_tipo/format/json/"; 	
	data_send = {idescenario : $("#idescenariomodalartistas").val() , tipoescenario : nuevovalotipoescenario}
	actualiza_data(url , data_send);
	load_data_escenario($("#idescenariomodalartistas").val());
	load_data_escenarios();

}



function update_nombre_escenario(){

	showonehideone(".nombre-escenario-input-modal" , ".nombre-escenario-modal" );
	$(".nombre-escenario-input-modal").blur(function(){

				url = now + "index.php/api/escenario/escenario_campo/format/json/";			 		

			 	data_send = {  "campo" : "nombre" ,  nuevonombre : $(this).val() , escenario : $("#idescenariomodalartistas").val() }			 	
			 	actualiza_data(url , data_send);
			 	load_data_escenario($("#idescenariomodalartistas").val());
			 	load_data_escenarios();
			 	showonehideone(  ".nombre-escenario-modal" , ".nombre-escenario-input-modal");			 	
	});


}	
 







 function update_days_escenario(){
 	showonehideone( ".day_escenario_inputs" , ".day_escenario_button" );
 	$("#nuevo_termino_escenario").blur(function(){

		 		nuevo_inicio =  $("#nuevo_inicio_escenario").val();
		 		nuevo_termino = $("#nuevo_termino_escenario").val();
		 		idescenario  =  $("#idescenariomodalartistas").val();	

 				url = now + "index.php/api/escenario/updateinicioterminobyid/format/json/";
 				data_send = {nuevoinicio : nuevo_inicio , nuevotermino : nuevo_termino , idescenario : idescenario  }
 				updates_send(url, data_send);
 				showonehideone(".day_escenario_button" , ".day_escenario_inputs" );
			 	load_data_escenario(idescenario);	
				load_data_escenarios();
 	}); 	 	
 }
 
 function update_horario_artista(e){

 	idartista = e.target.id;
 	idescenario = $("#idescenariomodalartistas").val();
 	$("#tregistrohorario").click(function(){
 
 			hiartista = $("#hiartista").val();
 			htartista = $("#htartista").val();
	 		url = now + "index.php/api/escenario/updateinicioterminoartistabyid/format/json/";
			data_send = { idartista : idartista , idescenario : idescenario , hiartista : hiartista , htartista : htartista }
			updates_send(url , data_send);
			load_data_escenario(idescenario);	
			load_data_escenarios();

 	});
 	



 }

