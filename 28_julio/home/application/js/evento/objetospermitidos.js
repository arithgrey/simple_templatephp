function update_status_objpermitido(e){	
	idobjetopermitido = e.target.id;
	url = now  + "index.php/api/event/objeto_permitido/format/json/";		
	data_send = {evento : $("#evento").val() , objetopermitido : idobjetopermitido }
	actualiza_data(url , data_send);
	load_objetospermitidos_evento();	
}
/**/
function  load_objetospermitidos_evento() {	
	url =now  + "index.php/api/event/objetospermitidos/format/json/";		
	evento =  $("#evento").val();

	$.ajax({
		url : url , 
		type: "GET",
		data : {evento : evento } , 
		beforeSend:function(){		
			show_load_enid(".place_obj_permitidos" , "Cargando lista de objetos permitidos en el evento" , 1); 			
		}
	}).done(function(data){
		
		$(".place_obj_permitidos").empty();
		llenaelementoHTML(".obj_permitidos" , data);
		$(".objpermitido").click(update_status_objpermitido);
		$(".btn-all-articulos").click(update_all_objects);

	}).fail(function(){
		show_error_enid(".place_obj_permitidos"  , "Error al cargar objetos permitidos, reporte al administrador");
	});

}
/**/
function update_all_objects(e){
	id_evento  =  $("#evento").val();
	url = now + "index.php/api/event/all_objetos_permitidos/format/json/";			
	$.ajax({                                                                                          
		url :  url , 
		type :  "PUT",
		data :  {"evento" : id_evento } , 
		beforeSend : function(){
			show_load_enid(".place_obj_permitidos" , "Cargando la lista completa al evento" , 1); 						
		}
	}).done(function(data){
		show_response_ok_enid( ".place_nuevo_escenario", "Lista de artículos actualizada"); 
		load_objetospermitidos_evento();
	}).fail(function(){
		show_error_enid(".place_obj_permitidos"  , "Error al actualizar la lista de objetos permitidos ");		
	});		

	
	//load_objetospermitidos_evento();
}

