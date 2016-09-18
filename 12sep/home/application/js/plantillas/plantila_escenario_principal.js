function registra_template_escenario(e){

	flag  =  valida_text_form(".input_escenario" , ".place_val_escenario" , 3 , "Nombre asignado a la plantilla " ); 	
	if (flag ==  1) {
		url = $(".form_escenario").attr("action");		
		$.ajax({
			url :  url , 
			data : $(".form_escenario").serialize() , 
			type : "POST" , 
			beforeSend : function(){			
				show_load_enid(".place_nueva_experiencia_escenario" , "Registrando .." , 1 );    
			}
		} ).done(function(data){

			lista_plantillas_escenario();	
			$("#modal-experiencia").modal("hide");
			$(".place_nueva_experiencia_escenario").empty();			
			show_response_ok_enid(".place_experiencia_escenario"  ,  "Experiencia registrada con éxito.!" ); 								
			$(".place_val_escenario").empty();
			document.getElementById("form_escenario").reset();
			
		}).fail(function(){						
			show_error_enid(".place_nueva_experiencia_escenario" , "Se presentaron errores al registrar plantilla para escenarios, reporte al administrador.!");
		});	
	}
	e.preventDefault();
}
/**/
function lista_plantillas_escenario(){
	load_contenidos_templ_data( 5 , ".experiencia_escenario" , ".place_experiencia_escenario" );
}