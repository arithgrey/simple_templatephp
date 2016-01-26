	$(document).on("ready",function(){
		$("#editar-datos-personales").click(function(){
			
			showonehideone( "#section-form-datos" , "#datos-section" )
			
		});
		mostrarNombre();
		mostrarPuesto();
		mostrarDescripcion();

		$("#form-user-update").submit(actualizar_data_usuario);
		
		$( "#nomPersona" ).click(function() {		
			nombre=$(this).text();		
			$( ".oculto" ).show();			
			$( ".oculto" ).val(nombre);			
			$( ".oculto" ).blur(actualizarNombre);			
			$(".oculto").keyup(function (e) {
    			if (e.keyCode == 13) {
       				actualizarNombre();
			    }
			});
			
		});

		$( "#designation" ).click(function() {
			  //ocultando el span
			  //Asignando a una variable el texto que tiene el span
			  nombre1=$(this).text();
			  $(this).hide();
			  //Referencia a el textarea, mostrandolo en pantalla
			  $( "#ocultoTA1" ).show();
			  //Colocando en el textarea, texto adentro
			  $( "#ocultoTA1" ).val(nombre1);
			  //Enlaza el textarea para que realice un evento, para el textarea y que cambie lo que muestre
			  $( "#ocultoTA1" ).blur(actualizarPuesto);

			  $("#ocultoTA1").keyup(function (e) {
    			if (e.keyCode == 13) {
       				
			    }
			  });
		});

		//Referencia a el <p id="texto">, al hacer click haga un evento
		$( "#texto" ).click(function() {
			  //ocultando el <p id="texto">
			  //Asignando a una variable el texto que tiene el <p id="texto">
			  nombre2=$(this).text();
			  $(this).hide();
			  //Referencia a el textarea, mostrandolo en pantalla
			  $( "#ocultoTA2" ).show();
			  //Colocando en el textarea, texto adentro
			  $( "#ocultoTA2" ).val(nombre2);
			  //Enlaza el textarea para que realice un evento, para el textarea y que cambie lo que muestre
			  $( "#ocultoTA2" ).blur(actualizarDescripcion);

			  $( "#ocultoTA2" ).keyup(function (e) {
    			if (e.keyCode == 13) {
       				
			    }
			  });
		});
	
	});

//Funcion para actualizar el nombre al hacer click
function actualizarNombre()
{
	//Asignar a una variable el contenido del textarea
	cambio = $(".oculto").val() ;

	if(cambio.length==0){
		mostrarNombre();
		llenaelementoHTML("#mensaje" , "No podra hacer la actualizacion");
	}
	else
	{

	//Darle una url que nos de el resultado de la accion en formato JSON
	url = now + "index.php/api/misdatoscontrolador/actualizarNombre/format/json";
	//Metodo para enviar el cambio de nombre
	$.post( url, { "name": cambio })
 		.done(function( data ) {
			$( ".oculto").hide();
			//Asignando a una variabl
			$( "#nomPersona" ).show();
			mostrarNombre();
  		})
 	.fail(function() {
    	alert( "error" );
	});

	}
	return false;
}

//Listar elementos 

function mostrarNombre()
{
	muestra = $(".oculto").val() ;

	url = now + "index.php/api/misdatoscontrolador/mostrarNombre/format/json";

	$.get( url )
 		.done(function( data ) {
    	for(var i=0; i<data.length; i++)
    	{
    		nombre = data[i].nombre;
    	}
    	//$("#nomPersona").html(nombre);
    	llenaelementoHTML("#nomPersona" , nombre);

  	})
 	.fail(function() {
    	alert( "error" );
	});
 }

function actualizarPuesto(){

	cambio1 = $("#ocultoTA1").val() ;

	url = now + "index.php/api/misdatoscontrolador/actualizarPuesto/format/json";
	$.post( url, { "puesto": cambio1 })
 		.done(function( data ) {
    	//alert( "Dato Obtenido: " + data );
    	$( "#ocultoTA1").hide();
		//Asignando a una variabl
		$( "#designation" ).show();
		mostrarPuesto();
  	})
 	.fail(function() {
    	alert( "error" );
	});
}

//Listar elementos 

function mostrarPuesto()
{
	muestra = $("#ocultoTA1").val() ;

	url = now + "index.php/api/misdatoscontrolador/mostrarPuesto/format/json";
	$.get( url )
 		.done(function( data ) {
    	puesto = "";
    	for(var x in data ){
    		if(data[x].puesto==null || data[x].puesto==""){
    			llenaelementoHTML("#designation" , "Redacte puesto");
    		}
    		else
    		{
    			llenaelementoHTML("#designation" , data[x].puesto);
    		}
    	}
  	})
 	.fail(function() {
    	alert( "error" );
	});
 }

function actualizarDescripcion(){

	cambio2 = $("#ocultoTA2").val() ;

	url = now + "index.php/api/misdatoscontrolador/actualizarDescripcion/format/json";
	$.post( url, { "descripcion": cambio2 })
 		.done(function( data ) {
    	//alert( "Dato Obtenido: " + data );
    	$( "#ocultoTA2").hide();
		//Asignando a una variabl
		$( "#texto" ).show();
		mostrarDescripcion();
  	})
 	.fail(function() {
    	alert( "error" );
	});
}

//Listar elementos 

function mostrarDescripcion()
{
	muestra = $("#ocultoTA2").val() ;

	url = now + "index.php/api/misdatoscontrolador/mostrarDescripcion/format/json";
	$.get( url )
 		.done(function( data ) {
 		descripcion = "";
    	for(var x in data ){
    		if(data[x].descripcion==null || data[x].descripcion==""){
    			llenaelementoHTML("#texto" , "Redacte descripcion");
    		}
    		else
    		{
    			llenaelementoHTML("#texto" , data[x].descripcion);
    		}
    	}
    
  	})
 	.fail(function() {
    	alert( "error" );
	});
 }
 /**/
 function actualizar_data_usuario() {
 	
 	url = $("#form-user-update").attr("action"); 
 	data_send =  $("#form-user-update").serialize();
 	
 	$.ajax({url: url, type: 'PUT', data : data_send  }).done(function(data){

 		
 		if (data ==  true ) {
 			llenaelementoHTML("#msj_update_status" ,  "<div class='alert-ok'><em>Tus datos han sido actualizado con éxito</em></div>");
 			muestra_alert_segundos("#msj_update_status");
 			redirect("");

 		}else{
 			llenaelementoHTML("#msj_update_status" ,  "<div class='alert-fail'><em>El corre ya se encuentra registrado por otro usuario</em></div>");
 		}
 		


 	}).fail(function(){
 		llenaelementoHTML("#msj_update_status" ,  "<div class='alert-fail'><em>Error al actualizar tu información notifica al administrador</em></div>");
 	});

 	return false;
 }
