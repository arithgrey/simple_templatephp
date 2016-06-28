$(document).ready(function(){    
	artista_tmp  =  0; 	
	$(".tipo-escenario").click(update_type);
	
	$(".descripcion-escenario-text").click(update_descripcion_escenario);
	escenario = $(".id_escenario").val();
	$("#btn-guardar-fecha").click(update_fecha_escenario);
	$(".ver-escenario").click(function(){		
		escenario =  $("#id_escenario").val();
		evento =  $("#evento").val();
		redirect(now + "index.php/escenario/inevento"+ "/" + escenario  + "/" + evento);		
	});
	$("#button-template").click(muestra_plantilla_escenario);
	escenario =  $("#escenario").val();	
	$(".artistas-btn").click(function(){	
		load_data_escenario_artista();			
	});	
	
    $('nav, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });
    $('nav, .nav-controller').on('mouseover', function(event) {
        $('nav').addClass('focus');
        $('.controller-open').hide();
        $('.controller-close').show();
        
    }).on('mouseout', function(event) {
        $('nav').removeClass('focus');
        $('.controller-open').show();
        $('.controller-close').hide();
    })
	
	$("#registra-nuevo-escenario-form").submit(t_nuevo_escenario);    
	/*Cargamos slider del escenario */
	$("footer").ready(carga_slider_admin);
	/*Para las imagenes*/
	$(".img-button-more-imgs").click(carga_form_imagenes_escenario);
});
/**/
function update_type(e){

	type_escenario  = e.target.id	
	url =now + "index.php/api/escenario/escenario_tipo/format/json"; 
	evento =  $("#evento").val();
	actualiza_data(url , {"idescenario": escenario , "tipoescenario" : type_escenario  , "evento" : evento} );

	$.ajax({
		url : url , 
		type :  "PUT",
		data :  {"idescenario": escenario , "tipoescenario" : type_escenario  , "evento" : evento} , 
		beforeSend: function(){
			
			show_load_enid(".place_tipo", "Registrando cambios" , 1); 

		}
	}).done(function(data){		
		show_response_ok_enid(".place_tipo" , "Tipo de escenario actualizado con éxito.! " ); 
	}).fail(function(){
		show_error_enid(".place_tipo" , "Falla al actualizar el tipo de escenario, reporte al administrador " ); 
	});

	$(".button-tipo-escenario").text(type_escenario);

}
/*Actualiza el nombre del escenario*/
function  update_nombre_escenario(){
	showonehideone( ".section-nombre-evento-in" , ".nombre-escenario-text" );	
	$("#in-nombre-escenario").blur(function(){			
		/*Validamos previo a registrar el cambio */
		flag =  valida_text_form("#in-nombre-escenario" , ".place_nombre_escenario" , 4 , "Nombre asignado al escenario es " ); 		

		if (flag == 1 ) {

			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			nuevo_nombre = $("#in-nombre-escenario").val(); 						
			escenario =  $("#id_escenario").val();
				
			$.ajax({

				url :  url , 
				type :  "PUT",
				data :  { "campo": "nombre" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre }  , 
				beforeSend: function(){					
					show_load_enid(".place_nombre_escenario", "Registrando cambios" , 1); 
				}
			}).done(function(data){
				show_response_ok_enid(".place_nombre_escenario"  , "Nombre del escenario actualizado con éxito" ); 
				llenaelementoHTML(".nombre-escenario-text" , nuevo_nombre );	
				showonehideone(".nombre-escenario-text" , ".section-nombre-evento-in");				

			}).fail(function(){
				show_error_enid(".place_nombre_escenario", "Error al actualizar e nombre del escenario, reporte al administrador" );
			});					
		}
		
	});

}
/*Actualiza la descripción del escenario */
function  update_descripcion_escenario(){

	showonehideone( ".section-descripcion-escenario-in" , ".descripcion-escenario-text" );		

	$("#in-descripcion-escenario").blur(function(){	
		/*Validamos previo a que se envie*/		
		flag =  valida_text_form("#in-descripcion-escenario" , ".place_descripcion" , 250 , "El texto que describe la experiencia " ); 		
		if (flag ==  1 ){			
			url =  now + "index.php/api/escenario/escenario_campo/format/json/";
			escenario =  $("#id_escenario").val();
			nuevo_nombre = $("#in-descripcion-escenario").val(); 								
			$.ajax({
				url :  url , 
				type : "PUT" , 
				data : { "campo": "descripcion" ,    "escenario" : escenario , "nuevonombre" : nuevo_nombre } , 
				beforeSend : function(){					
					show_load_enid(".place_descripcion", "Registrando cambios" , 1); 
				}
			}).done(function(data){				
				
				
				show_response_ok_enid(".place_descripcion", "La experiencia en el escenario ha sido actualizado con éxito" ); 
				llenaelementoHTML(".descripcion-escenario-text" , nuevo_nombre);

			}).fail(function(){				
				
				show_error_enid(".place_descripcion" , "Error al actualizar la experiencia en el escenario, reporte al administrador" ); 
			});		
			showonehideone( ".descripcion-escenario-text"  , ".section-descripcion-escenario-in");	
		}
	});
}
/*Actualiza solo un campo */
function update_campo(campo, place, input , msj ){ 

	url = now + "index.php/api/escenario/evento_escenario_campo/format/json";	
	evento =  $("#evento").val();
	$.get(url , {"campo" : campo , "escenario" : escenario , "evento" : evento } ).done(function(data){			
		data = data.trim(); 
		
		if (data.length === 0 ) {

			//llenaelementoHTML( place,  msj);
			show_response_ok_enid(place , msj ); 
		}else{
			llenaelementoHTML( place,  data);
		}		
		$(input).val(data);
	}).fail(function(){
		show_error_enid(place , "Error al actualizar" ); 
	});
}
/*Actualiza la fecha del escenario*/
function update_fecha_escenario(){	

	url =now + "index.php/api/escenario/inicio_termino/format/json"; 	
	inicio = $("#inicio").val();
	termino =  $("#termino").val();
	$.ajax({
			url : url ,
			type:  "PUT" ,
			data :  {"escenario" : escenario , "nuevoinicio" :  inicio , "nuevotermino" : termino} , 
			beforeSend: function(){
				/*place_fechas_evento*/				
				show_load_enid(".place_fechas_evento", "Registrando cambios " , 1); 
			}			
		}).done(function(data){
			fecha_text_format ="";
			if (inicio == termino ) {	
				fecha_text_format = inicio;
			}else{
				fecha_text_format = inicio +" - " + termino;
			}
			llenaelementoHTML("#fecha-presentacion" , fecha_text_format );					 
			show_response_ok_enid(".place_fechas_evento" ,  "Fecha actualida corrrectamente.!");
		}).fail(function(){
			/**/
			show_error_enid(".place_fechas_evento"  , "Error al actualizar reporte al administrador" ); 
		});

	return false;		


}
/**/
function muestra_plantilla_escenario(){
	
	url = now + "index.php/api/templ/templates_content_escenario/format/json/";  
	$.ajax({
		url :  url, 
		type:  "GET",
		data : {"type" : 5 }, 
		beforeSend: function(){
			show_load_enid(".list-plantilla-escenario"  ,  "Cargando las plantillas del escenario" , 1 ); 
		}
	}).done(function(data){		
		llenaelementoHTML("#list-plantilla-escenario" , data );			
		$(".identificador").click(carga_plantilla);
	}).fail(function(){		
		show_error_enid("#list-plantilla-escenario" , "Error al cargar plantillas " ); 
	});
}
/**/
function carga_plantilla(e){
	id_contenido  = e.target.id; 	
	evento =  $("#evento").val();
	escenario =  $("#id_escenario").val();
	data_send = {"contenido" : id_contenido , "escenario" : escenario  , "evento" : evento };
	url = now + "index.php/api/escenario/descripcion_template/format/json/"; 
	$.ajax({
		   url: url,
		   type: 'PUT',
		   data : data_send  , 
		   beforeSend :  function(){
		   		show_load_enid("#list-plantilla-escenario" ,  "Registrando cambios" , 1 ); 
		   }
		}).done(function(data){

		   	$("#alert-ok-plantilla").show();
		   	muestra_alert_segundos("#alert-ok-plantilla");
		   	update_campo( "descripcion" ,  ".descripcion-escenario-text" , "#in-descripcion-escenario" , "Describe la experiencia del escenario");					
			$("#modal-platilla-escenarios").modal("hide"); 		
	   		
	}).fail(function(){	   	
	   	//$("#alert-fail-plantilla").show();
	   	show_error_enid("#list-plantilla-escenario"  , "Error al actualizar"); 
	});
}
/**/



function carga_slider_admin(){
	
	url =  now + "index.php/api/escenario/slider_admin/format/json/"; 
	escenario =  $("#id_escenario").val();
	nombre =  $(".nombre_escenario").val(); 
	/**/
	$.ajax({
		url : url , 		
		type: "GET" ,
		data : {"escenario" : escenario , "nombre_escenario" : nombre} ,
		beforeSend: function(){
			/**/			
			show_load_enid( ".slider-principal-escenario" , "Cargando portada del escenario" , 1 ); 				
		}
	}).done(function(data){
		llenaelementoHTML(".slider-principal-escenario", data );
		$(".nombre-escenario-text").click(update_nombre_escenario);
	}).fail(function(){
		//alert("Error al cargar slider ");
		show_error_enid(".slider-principal-escenario", "Error al cargar la portada del escenario, reporte al administrador" ); 
	});
}
/**/
function t_nuevo_escenario(e){
	evento =  $("#evento").val();
	url =  now  + "index.php/api/escenario/escenario_evento/format/json/";				
	data_send  =  $("#registra-nuevo-escenario-form").serialize() + "&" + $.param({"evento_escenario" : evento}); 	
	$.ajax({
		url :   url , 
		type :  "POST", 
		data :  data_send, 
			beforeSend : function(){
				/**/				
				show_load_enid( ".estado_registro_escenario" , "Registrando" , 1 ); 				
			}
		}).done(function(data){			
			show_response_ok_enid(".estado_registro_escenario" ,  "Escenario registrando con éxito.! " ); 
			next =  now + "index.php/escenario/configuracionavanzada/"+ data;
			redirect(next);

		}).fail(function(){			
			//llenaelementoHTML(".estado_registro_escenario" , "Error al cargar el escenario reportar al administrador");
			show_error_enid(".estado_registro_escenario" , "Error al cargar el escenario reportar al administrador"); 
		});
	e.preventDefault();
}/**/
