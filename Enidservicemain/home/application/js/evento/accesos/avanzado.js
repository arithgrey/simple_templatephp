$(document).on("ready", function(){

	
	$(".delete-acceso").click(remove_acceso);
	$(".editar-acceso").click(editar_acceso);
	$("#form-new-acceso").submit(record_acceso);

});

/*Eliminar al conformar */
function remove_acceso(e){

	acceso = e.target.id;
	evento = $("#evento").val(); 

	$("#aceptar-delete-acceso").click(function(){
	url = now + "index.php/api/accesos/deletebyid/format/json/";					
		$.post(url , { evento : evento , acceso :  acceso } ).done(function(data){
				load_data_accesos();					 
		}).fail(function(){
		alert(genericresponse[0]);
		});
	});
}
/**/

function load_data_accesos(){
	
	
	evento = $("#evento").val(); 
	url = now + "index.php/api/accesos/get_accesos_with_format_by_id_event/format/json/";		
	$.get(url , { evento : evento  } ).done(function(data){
		
		
		llenaelementoHTML(".list-accesos" , data);				 
		$(".delete-acceso").click(remove_acceso);
		$(".editar-acceso").click(editar_acceso);

	}).fail(function(){
		alert(genericresponse[0]);
	});


}
/**/
function editar_acceso(e){
	acceso = e.target.id;
	evento = $("#evento").val(); 
	
	url = now + "index.php/api/accesos/get_acceso_info_id/format/json/";		
	$.get(url, {"evento": evento   , "acceso" : acceso} ).done(function(data){

		for(var x in data ){

			idacceso  = data[x].idacceso;
			nota = data[x].nota;
			precio  = data[x].precio;
			inicio_acceso = data[x].inicio_acceso;
			termino_acceso = data[x].termino_acceso;
			tipo = data[x].tipo

			valorHTML("#nuevo-precio" , precio );
			valorHTML("#nueva-descripcion" , nota );
			valorHTML("#nuevo-inicio-acceso" ,  inicio_acceso );
			valorHTML("#nuevo-termino-acceso" , termino_acceso );			
			valorHTML("#acceso" , idacceso);			
			$('#nuevo-tipo-acceso > option[value="' + tipo + '"]').attr('selected', 'selected');
			
		}

		$("#dinamic-form").submit(update_info_acceso);
	}).fail(function(){	
		alert(genericresponse[0]);
	});		
	

}
/*actualiza los datos del acceso*/
function update_info_acceso(e){	
	
	url = now + "index.php/api/accesos/udpate_acceso_id/format/json/";					
	updates_send(url , $("#dinamic-form").serialize() );	
	load_data_accesos();	
	return false;
}/**/

function record_acceso(){

	url = $("#form-new-acceso").attr("action");

	registra_data(url , $("#form-new-acceso").serialize());
	load_data_accesos()
	return false;
}