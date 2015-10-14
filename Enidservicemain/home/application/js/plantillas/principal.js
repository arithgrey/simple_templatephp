$(document).on("ready", function(){

	$("#new-contenido-form").submit(function(){
		registra_contenido("#new-contenido-form" , "restricciones");
		return false;
	});
	
	load_contenidos_templ_data( 1 , "list-templ-descripcion" );
	$(".delete_contenido_templ").click(delete_contenido);
	$("#form-articulo-permitido").submit(record_articulo_permitido);	
	$(".del_obj_permitido").click(delete_articulo_empresa);
	$(".restriccion-section").click(function(){
		load_contenidos_templ_data( 3 , "restricciones-user" );
	});

	$(".politicas-section").click(function(){
		
		load_contenidos_templ_data( 4 , "list-politicas" );
	});		

	$("#nueva-politica-template").submit(function(){
		registra_contenido( "#nueva-politica-template" , "politicas" );
		return false;
	});

	$("#nueva-descripcion-template").submit(function(){
		
		registra_contenido( "#nueva-descripcion-template" , "Descripción eventos" );
		return false;
	});

	
	$("#boton_uno").click(load_data_resument_plantillas);	
});
/*Registramos la restriccion*/
function registra_contenido( formulario , type_conten ){

	
	url = now + "index.php/api/templ/templates_content/format/json/";			
	registra_data( url , $(formulario).serialize() );

	switch(type_conten){
    case "Descripción eventos":
        load_contenidos_templ_data( 1 , "list-templ-descripcion" );
        break;   
    case "restricciones":
    	load_contenidos_templ_data( 3 , "restricciones-user" );
        break;
    case "politicas":
    	load_contenidos_templ_data( 4 , "list-politicas" );
        break;    
    default:
        break; 
	} 
	
	
}
/***/
function load_contenidos_templ_data(type , tag ){
	

	url = now + "index.php/api/templ/templates_content/format/json/";		
	$.get(url , {"type" : type } ).done(function(data){		
		document.getElementById(tag).innerHTML="";	
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

	return false;
}
/**/
function load_articulos_empresa(){
	
	url = now + "index.php/api/templ/plantillaarticulos/format/json/";
	$.get(url).done(function(data){

		llenaelementoHTML("#obj-permitidos" , data);
		$(".del_obj_permitido").click(delete_articulo_empresa);
		limpia_inputs();

	}).fail(function(){

		alert(genericresponse[0]);

	});	
}
/**/
function delete_articulo_empresa(e){

	url = now + "index.php/api/templ/plantillaarticulos/format/json/";
	id_objeto_permitido = e.target.id;
	eliminar_data( url , { "objeto_permitido" : id_objeto_permitido } );
	

}
/**/
function limpia_inputs(){

	$(".form-control").val("");
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







