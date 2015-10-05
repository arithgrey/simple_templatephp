$(document).on("ready", function(){


	$("#form-contactos").submit(record_contacto);

	$("#nuevo-contacto-button").click(function(){
		$(".status-registro").hide();
		
	});
	$('#contacto-name').keyup(function (e){ 

	    tecleado = $(this).val(); 	        
	   	load_contactos(tecleado , "all"); 		   
	});

	$("footer").ready(function (){
		load_contactos("all", "all" );
	});

	$("#filtro-tipo-contacto").change(filtrar_tipo);


});
function record_contacto(e){

	url = $("#form-contactos").attr("action");	
	$.post(url, $("#form-contactos").serialize()).done(function(data){
			$(".status-registro").show();
			load_contactos("all", "all");

						
	}).fail(function(){
		alert("Error al registrar contacto, informar al administrador si  el problema persiste");
	});			

	e.preventDefault();
}	
/**/
function load_contactos(contacto,  tipo ){

	url = $("#form-contactos").attr("action");	
	$.get(url ,{ "contacto" : contacto , "tipo" : tipo }).done(function(data){

		llenaelementoHTML( "#section-contact" , data);
		$(".editar-contacto").click(try_update_contacto);
		

		$(".img_contacto").click(function(e){
				
			contacto = e.target.id;
			$("#dinamic_contacto").val(contacto);
			$("#lista-imagenes").html("");
			$("#imgs-contacto").attr("value" , "");		
			$("#imgs-contacto").change(upload_main_imgs);

		});

	}).fail(function(){
		alert("Error al cargar tus contactos, informar al administrador si  el problema persiste");
	});

}
/**/
function try_update_contacto(e){

	$(".status-registro").hide();
	contacto =  e.target.id;
	url = $("#form-contactos-edit").attr("action");	
	


	$(".form-contactos-edit").submit(function(){
		
		actualiza_data(url , $("#form-contactos-edit").serialize()+"&" + $.param({"idcontacto" : contacto })  );		
		$(".status-registro").show();
		load_contactos("all" , "all");
		return false;
	});
	
}
/**/


function filtrar_tipo(){

 	tipo = $(this).val();
 	load_contactos(  "tipo",  tipo );	

}