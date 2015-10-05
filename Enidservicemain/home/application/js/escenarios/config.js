$(document).on("ready" , function(){
	
	$(".tipo-escenario").click(update_type);
	/*update campos del escenario */
	$(".nombre-escenario-text").click(updaye_nombre_escenario);
	$(".descripcion-escenario-text").click(update_descripcion_escenario);
	escenario = $("#id_escenario").val();
	$("#btn-guardar-fecha").click(update_fecha_escenario);

	$("#imgs-escenario").change(upload_main_imgs_escenario);
});


/**/
function update_type(e){

	type_escenario  = e.target.id	
	url =now + "index.php/api/escenario/escenario_tipo/format/json"; 
	actualiza_data(url , {"idescenario": escenario , "tipoescenario" : type_escenario } );

}
/*Actualiza el nombre del escenario*/

function  updaye_nombre_escenario(){

	showonehideone( "#in-nombre-escenario" , ".nombre-escenario-text" );	
	$("#in-nombre-escenario").blur(function(){
				
		nuevo_nombre = $("#in-nombre-escenario").val(); 					
		if(nuevo_nombre != null || nuevo_nombre != "") {	
			
			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			actualiza_data(url , { "campo": "nombre" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } );
			update_campo( "nombre" ,  ".nombre-escenario-text" , "#in-nombre-escenario" , "nombre del escenario");
			
		
		}else{

			showonehideone(".nombre-escenario-text" , "#in-nombre-escenario");	
		}
		showonehideone(".nombre-escenario-text" , "#in-nombre-escenario");	
		
		
	});


}
/*Actualiza la descripción del escenario */
function  update_descripcion_escenario(){

	showonehideone( "#in-descripcion-escenario" , ".descripcion-escenario-text" );	
	$("#in-descripcion-escenario").blur(function(){
				
		nuevo_nombre = $("#in-descripcion-escenario").val(); 					
		if(nuevo_nombre != null || nuevo_nombre != "" ) {	
			
			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			actualiza_data(url , { "campo": "descripcion" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } );
			
			update_campo( "descripcion" ,  ".descripcion-escenario-text" , "#in-descripcion-escenario" , "Describe la experiencia del escenario");
			
		
		}else{

			showonehideone( ".descripcion-escenario-text"  , "#in-descripcion-escenario");	
		}
		showonehideone( ".descripcion-escenario-text"  , "#in-descripcion-escenario");	
		
		
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
	llenaelementoHTML("#repo-update-fecha", '<div class="alert alert-success">Nueva fecha establecida</div>');
	return false;	
	
}


















