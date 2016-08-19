$(document).on("ready", function(){	
	/**/
	dinamic_contacto_val = 0;
	var  dinamic_contacto_delete = 0;	
	$("#form-contactos").submit(record_contacto);
	cargar_seccion_contactos();
	$("#form-filtro").submit(cargar_seccion_contactos);	
	$("#nuevo-contacto-button").click(function(){		
		$(".status-registro").hide();		
	});
	$("footer").ready(evalua_modal);
	
});
/****/
function record_contacto(e){
	/*Realizamos previa validación*/ 
	flag = valida_tel_form("#input_tel_contacto", ".place_tel_vali"); 
	if (flag == 1 ) {	
		flag2 =  valida_text_form("#nombre_contacto" , ".place_nombre_contacto" , 3 , "Nombre de contacto" ); 
				if (flag2 ==  1 ) {
					url = $("#form-contactos").attr("action");
					$.ajax({
							url : url , 
							data :  $("#form-contactos").serialize() , 
							type: "POST" , 
							beforeSend: function(){					
								show_load_enid(".place_nuevo_contacto"  , "Cargando .. " , 1); 							
								$(".place_nombre_contacto").empty();
								$(".place_tel_vali").empty();
								$(".place_nuevo_contacto").empty();
							}
						}).done(
						function(data){						
							
							$("#contact-modal").modal("hide");
							cargar_seccion_contactos();	
							show_response_ok_enid(".place_contactos" , "Contacto registrado con éxito.! ");				
					}).fail(function(){
						show_error_enid(dinamic_section  , "Error al registrar contacto, reporte al administrador"); 
					});			
				}		
	}
	e.preventDefault();
}	
/**/
function delete_data_contacto(){

	url =  now + "index.php/api/contactos/contacto/format/json/"; 	
	data_send =  {"contacto" :  dinamic_contacto_delete }; 
	$.ajax({
	   url: url,
	   type: 'DELETE',
	   data : data_send , 
	   beforeSend : function(){	   		
	   		show_load_enid(".place_delete_contacto"  , "Eliminando .. " , 1); 			
	   		$(".place_delete_contacto").empty();
	   }
	}).done(function(data){
	   	/**/
		cargar_seccion_contactos();	   			
		show_response_ok_enid(".place_contactos" , "Contacto eliminado con éxito.! ");				
		
	}).fail(function(){	   	
		show_error_enid(".place_delete_contacto" , "Se presentaron problemas al eliminar el contacto, reporte al administrador");					
	});
}
/*DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES DELETES */
function delete_contacto(e){
	/**/	
	contacto = e.target.id;
	dinamic_contacto_delete = contacto; 
	$("#aceptar-delete").click(delete_data_contacto);
}
/**/



function try_update_contacto(e){
	contacto =  e.target.id;
	get_data_contacto_in_modal(contacto);
}
/**/
function update_data_contacto(e){
	url = $("#form-contactos-edit").attr("action");	
	flag =  valida_tel_form("#input_tel_contacton", ".place_tel_valin"); 		
	if (flag == 1 ){			
		flag2 =  	valida_text_form("#nnombre" , ".place_actualizar_nombre" , 2 , "Nombre" ); 		
		if (flag2 == 1 ){
				data_send =  $("#form-contactos-edit").serialize()+"&"+$.param({"idcontacto" : contacto }); 
				$.ajax({
					url : url , 
					type: "PUT" ,
					data : data_send , 
					beforeSend: function(){
						show_load_enid(".place_actualizar"  ,  "Actualizando .. " , 1 );
						$(".place_actualizar").empty();
						$(".place_tel_valin").empty();
						$(".place_actualizar_nombre").empty();
					
					}
				}).done(function(data){
					$("#contact-modal-edit").modal("hide");		
					cargar_seccion_contactos();	
					show_response_ok_enid(".place_contactos" , "Contacto modificado con éxito.!");			

				}).fail(function(){
					show_error_enid(".place_actualizar" , "Se presentaron problemas al registrar  los cambios en el contacto, reporte al administrador");
				});	
		}
	}
	e.preventDefault();
}
/**/
function cargar_seccion_contactos(e){

	url = now + "index.php/api/contactos/contacto/format/json/";	
	$.ajax({
		url : url , 
		data : $("#form-filtro").serialize() , 
		type: "GET",
		beforeSend : function(){			
			show_load_enid(".contactos" , "Cargando contactos ..."  , 1);
		}
	}).done(function(data){		

		llenaelementoHTML( ".contactos" , data );
		$(".editar-contacto").click(try_update_contacto);							
		$(".nota-c").click(load_nota_contacto);		
		$(".delete_contacto").click(delete_contacto);
	    document.getElementById("form-contactos").reset();


	    /*Para cargar las imagnes */
	    $(".img_contacto").click(carga_formulario_imagenes);
	    $(".locacion").click(carga_maps);

	    /*
	    	$(document).on('click' , '.img_contacto' , function(e){
				contacto = e.target.id;
				$("#guardar_img_contacto").hide();				
				$("#dinamic_contacto").val(contacto);			
				$(".imagen_contacto").change(upload_imgs_enid_contacto);
				$("#lista_imagenes_contacto").html("");
			});
		*/

	}).fail(function(){		
		show_error_enid(".contactos"  , "Error al cargar los contactos, reportar al administrador ");
	});
	return false;
}
/**/
function get_data_contacto_in_modal(contacto){
	url = now + "index.php/api/contactos/contacto_id/format/json/";		
	$.ajax({
		url  : url , 
		type : "GET" ,
		data :  {contacto : contacto} , 
		beforeSend : function(){			
			show_load_enid(".place_actualizar"  ,  "Cargando información  del contacto" , 1 );
			$(".place_actualizar").empty();
			$(".estado_edicion_contacto").empty();
		}
	}).done(function(data){

		
		valorHTML("#nextension" , data[0].extension);
		valorHTML("#nnombre" , data[0].nombre);
		valorHTML("#norganizacion" , data[0].organizacion);
		valorHTML("#input_tel_contacton" , data[0].tel );
		valorHTML("#nmovil" , data[0].movil);
		valorHTML("#ncorreo" , data[0].correo);
		valorHTML("#ndireccion" , data[0].direccion);
		valorHTML("#npagina_web" , data[0].pagina_web);		
		valorHTML("#npagina_fb" , data[0].pagina_fb);		
		valorHTML("#npagina_tw" , data[0].pagina_tw);		
		valorHTML("#ncorreoalterno" , data[0].correo_alterno); 
		$('#ntipo > option[value="'+ data[0].tipo +'"]').attr('selected', 'selected');				
		$(".form-contactos-edit").submit(update_data_contacto);


		

	}).fail(function(){
		show_error_enid(".place_actualizar" , "Error al  cargar datos del contacto, reporte al administrador");		
	});	
}
/**/
function load_nota_contacto(e){

	contacto =  e.target.id;
	dinamic_contacto_val  =  contacto;	
	url = now + "index.php/api/contactos/contacto_id/format/json/";	

	$.ajax({
		url :  url , 
		type :  "GET" , 
		data : {contacto : contacto} , 
		beforeSend : function(){
			show_load_enid(".place_nota" , "Cargando datos actuales" , 1 );
			$(".place_nota").empty();
		}
	}).done(function(data){
		
		$("#nota-text-modal").val(data[0].nota);		
		$("#form-nota-contacto").submit(set_nota_contacto);

	}).fail(function(){
		show_error_enid(".place_nota" , "Se presentaron errores al cargar la nota del contacto, reporte al administrador");
	});
}
/**/
function set_nota_contacto(e){
	url =  $("#form-nota-contacto").attr("action");	
	data_send =  $("#form-nota-contacto").serialize() +"&" + $.param({"contacto" : contacto});	
	$.ajax({
		url: url , 
		type:  "PUT" , 
		data :  data_send , 
		beforeSend : function(){
			show_load_enid(".place_nota" , "Registrando cambios " , 1 );	
			$(".place_nota").empty();
		}
	}).done(function(data){
		$("#contact-nota").modal("hide");
		
		llenaelementoHTML( ".contactos" , "Nota del contacto actualizada con éxito" );
		cargar_seccion_contactos();
		show_response_ok_enid(".place_contactos" , "Nota actualizada con  éxito.!");	
	}).fail(function(){
		show_error_enid(".place_nota" , "Se presentaron errores al actualizar la nota del contacto, reporte al administrador");
	});	
	return false; 
}
/**/
function evalua_modal(){
	q =  $(".qparam").val(); 
	/**/
	switch(q){
		case "nuevo":  
		$("#contact-modal").modal("show");
		break; 

		default :

		break; 
	}
}
/**/
function carga_maps(e){
	contacto  = e.target.id;
	url =  now + "index.php/maps/map/"+contacto+"/1/99999999/";
	iframe =  "<iframe   height='500px;' width='100%'   id='iframe_maps_conf' src='"+url+"'> </iframe>";
	llenaelementoHTML(".contenedor_iframe_maps" , iframe );
}
