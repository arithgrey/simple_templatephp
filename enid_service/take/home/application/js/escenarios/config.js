$(document).on("ready" , function(){	
	$(".tipo-escenario").click(update_type);
	/*update campos del escenario */
	$(".nombre-escenario-text").click(updaye_nombre_escenario);
	$(".descripcion-escenario-text").click(update_descripcion_escenario);
	escenario = $("#id_escenario").val();
	$("#btn-guardar-fecha").click(update_fecha_escenario);
	$("#imgs-escenario").change(upload_main_imgs_escenario);



	$(".ver-escenario").click(function(){
		
		escenario =  $("#id_escenario").val();
		evento =  $("#evento").val();
		redirect(now + "index.php/escenario/inevento"+ "/" + escenario  + "/" + evento);
		
	});


});


/**/
function update_type(e){

	
	type_escenario  = e.target.id	
	url =now + "index.php/api/escenario/escenario_tipo/format/json"; 
	actualiza_data(url , {"idescenario": escenario , "tipoescenario" : type_escenario } );
	/**/
	$("#alert-ok-tipo-escenario").show();
	muestra_alert_segundos("#alert-ok-tipo-escenario");

	$(".button-tipo-escenario").text(type_escenario);

}
/*Actualiza el nombre del escenario*/
function  updaye_nombre_escenario(){
	showonehideone( ".section-nombre-evento-in" , ".nombre-escenario-text" );	
	$("#in-nombre-escenario").blur(function(){
				
		nuevo_nombre = $("#in-nombre-escenario").val(); 					
		if(nuevo_nombre != null || nuevo_nombre != "") {	
			
			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			actualiza_data(url , { "campo": "nombre" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } );
			update_campo( "nombre" ,  ".nombre-escenario-text" , "#in-nombre-escenario" , "nombre del escenario");
			$(".alert-ok-sm").show();
			muestra_alert_segundos(".alert-ok-sm"); 		
					
		}else{
			showonehideone(".nombre-escenario-text" , ".section-nombre-evento-in");	
		}
		showonehideone(".nombre-escenario-text" , ".section-nombre-evento-in");				
	});

}
/*Actualiza la descripción del escenario */
function  update_descripcion_escenario(){

	showonehideone( ".section-descripcion-escenario-in" , ".descripcion-escenario-text" );	
	$("#in-descripcion-escenario").blur(function(){
				
		nuevo_nombre = $("#in-descripcion-escenario").val(); 					
		if(nuevo_nombre != null || nuevo_nombre != "" ) {	

			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			actualiza_data(url , { "campo": "descripcion" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } );			
			update_campo( "descripcion" ,  ".descripcion-escenario-text" , "#in-descripcion-escenario" , "Describe la experiencia del escenario");			
			$(".alert-ok-sm").show();
			muestra_alert_segundos(".alert-ok-sm"); 		


		}else{
			showonehideone( ".descripcion-escenario-text"  , ".section-descripcion-escenario-in");	
		}
		showonehideone( ".descripcion-escenario-text"  , ".section-descripcion-escenario-in");	
			
	});
}
/*Actualiza solo un campo */
function update_campo(campo, place, input , msj ){ 

	url = now + "index.php/api/escenario/evento_escenario_campo/format/json";	
	$.get(url , {"campo" : campo , "escenario" : escenario } ).done(function(data){
			
		data = data.trim(); 
		if (data.length === 0 ) {

			llenaelementoHTML( place,  msj);
		}else{
			llenaelementoHTML( place,  data);
		}		
		$(input).val(data);
	}).fail(function(){
		alert("Error");
	});
}
/*Actualiza la fecha del escenario*/
function update_fecha_escenario(){	
			
	$("#alert-ok-fecha-ok").hide();
	url =now + "index.php/api/escenario/inicio_termino/format/json"; 	
	inicio = $("#inicio").val();
	termino =  $("#termino").val();
	actualiza_data(url , {"escenario" : escenario , "nuevoinicio" :  inicio , "nuevotermino" : termino} );

	fecha_text_format ="";
	if (inicio == termino ) {	
		fecha_text_format = inicio;
	}else{
		fecha_text_format = inicio +" - " + termino;
	}
	llenaelementoHTML("#fecha-presentacion" , fecha_text_format );	
	/**/
	$("#alert-ok-fecha-ok").show();
	muestra_alert_segundos("#alert-ok-fecha-ok");

	return false;	
	
}