$(document).on("ready", function(){
	
	$(".botonExcel").click(exporta_excel);
	load_contenidos_templ_data( 1 , "list-templ-descripcion" );
	$(".delete_contenido_templ").click(delete_contenido);
	$("#form-articulo-permitido").submit(record_articulo_permitido);	
	$(".del_obj_permitido").click(delete_articulo_empresa);
	$(".restriccion-section").click(function(){
		load_contenidos_templ_data( 3 , "restricciones-user" );
	});

	$(".round-tab").click(function(){
		$(".alert-ok").hide();
	});

	$(".politicas-section").click(function(){
		
		load_contenidos_templ_data( 4 , "list-politicas" );
													
	});		

	$("#new-contenido-form").submit(function(){
		registra_contenido("#new-contenido-form" , "restricciones");
		$(".alert-ok").show();

		return false;
	});
	$("#nueva-politica-template").submit(function(){
		registra_contenido( "#nueva-politica-template" , "politicas" );
		$(".alert-ok").show();
		return false;
	});
	$("#nueva-descripcion-template").submit(function(){		

		registra_contenido( "#nueva-descripcion-template" , "Descripción eventos" );
		$(".alert-ok").show();
		return false;
	});
	
	$("#boton_uno").click(load_data_resument_plantillas);	

	$(".nota-articulo").click(carga_nota_articulo);
	var  dinamic_objeto_permitido = 0;
	$("#form-nota-articulo").submit(actualiza_nota_objeto_permitido);

	$("#select-template").change(muestra_tipo_template);


});
/*Registramos la restriccion*/
function registra_contenido( formulario , type_conten ){

	
	url = now + "index.php/api/templ/templates_content/format/json/";			


	$.ajax({
		url : url , 
		data : $(formulario).serialize() , 
		type : "POST" , 
		beforeSend: function(){
			$(".loading_desc_evento").show();
		}   
	}).done(function(){

		/**/
	    	
	    	
		muestra_alert_segundos(".alert-descripcion-ok"); 
		
		$(".loading_desc_evento").hide();
	}).fail(function(){
		$(".loading_desc_evento").hide();
		alert("Error al registrar plantilla");
	});



	var alertas = [".alert-ok" , ".alert-fail"]; 
	switch(type_conten){

	    case "Descripción eventos":

	        load_contenidos_templ_data( 1 , "list-templ-descripcion" );
	        ocualta_elementos_array(alertas);
			

	        break;   
	    case "restricciones":
	    	load_contenidos_templ_data( 3 , "restricciones-user" );
	    	ocualta_elementos_array(alertas);
	        break;
	    case "politicas":
	    	load_contenidos_templ_data( 4 , "list-politicas" );
	    	ocualta_elementos_array(alertas);
	        break;    
	    default:
	        break; 
	} 
	
}
/***/
function load_contenidos_templ_data(type , tag ){

	url = now + "index.php/api/templ/templates_content/format/json/";		
	$.get(url , {"type" : type } ).done(function(data){						
		idtag ="#"+ tag;				
		llenaelementoHTML(idtag , data);
		$(".delete_contenido_templ").click(delete_contenido);
		limpia_inputs();
		load_data_resument_plantillas();




	}).fail(function(){
		alert("Error");
	});
}
/**/
function delete_contenido(e){

	idcontenido = e.target.id;
	url =now  + "index.php/api/templ/templates_content/format/json/";
	eliminar_data(url , {"contenido" : idcontenido} );
	
}
/*Registra articulo permitido*/
function record_articulo_permitido(){

	url = now + "index.php/api/templ/plantillaarticulos/format/json/"
	registra_data( url , $("#form-articulo-permitido").serialize());	
	load_articulos_empresa();
	
	$(".alert-ok").show();
	return false;
}
/**/
function load_articulos_empresa(){
	
	url = now + "index.php/api/templ/plantillaarticulos/format/json/";
	$.get(url).done(function(data){

		llenaelementoHTML("#obj-permitidos" , data);
		$(".del_obj_permitido").click(delete_articulo_empresa);
		limpia_inputs();
		$(".alert-ok").show();
		$(".nota-articulo").click(carga_nota_articulo);

	}).fail(function(){

		alert(genericresponse[0]);

	});	
}
/**/
function delete_articulo_empresa(e){

	url = now + "index.php/api/templ/plantillaarticulos/format/json/";
	id_objeto_permitido = e.target.id;
	eliminar_data( url , { "objeto_permitido" : id_objeto_permitido } );

	$(".alert-ok").show();
	load_articulos_empresa();

}
/**/
function load_data_resument_plantillas(){

	url = now+ "index.php/api/templ/plantillasresumen/format/json/"; 
	$.get(url).done(function(data){
		$("#resumen-plantilla").html(data);
	}).fail(function(){
		alert("hay errro");
	});	
}
/**/
function carga_nota_articulo(e){
	$("#area-descripcion-articulo").val("");
	url =  now  + "index.php/api/emp/objeto/format/json/"; 
	objeto  = e.target.id;  	
	dinamic_objeto_permitido =  objeto; 
	$.get(url , { objeto : objeto} ).done(function(data){		

		descripcion =   data[0].descripcion;
		$("#area-descripcion-articulo").val(descripcion);
	}).fail(function(){
		alert("Error al  cargar la descripcion, reportar al administrador");
	});
}
/**/
function actualiza_nota_objeto_permitido(){

	url =  $("#form-nota-articulo").attr("action"); 
	data_send =  $("#form-nota-articulo").serialize() + "&" + $.param({"objeto_permitido" : dinamic_objeto_permitido });

	$.ajax({	url : url,
				type : 'PUT',
                data : data_send ,        
                success : function(res){        

                }                

           	}).done(function(data){
           			
           		llenaelementoHTML("#response-status-objeto" , "<div class='alert-ok' id='alert-ok-status-obj'><em>Descripción actualizada correctamente.!</em></div>");
           		complete_alert("#alert-ok-status-obj");
           	}).fail(function(){
           		llenaelementoHTML("#response-status-objeto" , "<div class='alert-fail' id='alert-ok-status-obj'><em>Error al actualizar los datos del articulo , reportar al administrador </em></div>");

           		alert("Error al actualizar los datos del articulo , reportar al administrador");
           	});

	return false;
}
/**/
function muestra_tipo_template(){
		
	if ($("#select-template").val() == "Escenarios"){
		showonehideone(  "#section-escenarios" , "#section-eventos");
	}else{
		showonehideone("#section-eventos" , "#section-escenarios");
	}		
	
	

}