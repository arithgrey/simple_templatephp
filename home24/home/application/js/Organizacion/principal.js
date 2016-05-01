$(document).on("ready", function(){
$("#nombre-empresa-text").click(try_update_nombre);
$("#slogan-text").click(try_update_slogan);
$("#artistas-empresa-text").click(try_update_artistas);
$("#description-empresa-text").click(try_update_descripcion);
$("#mision-empresa-text").click(try_update_mision);
$("#vision-empresa-text").click(try_update_vision);
$(".años-empresa-text").click(try_update_years);
$("#mas-info-empresa-text").click(try_update_mas_info);
$(".contactos_asociados").click(try_update_medios_contacto);
$("#imgs-empresa").change(upload_main_imgs);
$("#modal-img-logo-empresa").click(clean_img);
$("#pais-select").change(update_country_org);	
$("#text-nombre-empresa").click(function(){
	$(".pais_empresa_input").show();
});

$("#form-genero-empresa").submit(insert_genero_musical_empresa);
$(".delete_genero_empresa").click(delete_genero_empresa)
$(".form-historia").submit(record_experiencia_cliente);
$(".form-artista").submit(record_solicitus_artista);
$(".cuentanos-tu-histori-sec").click(dinamic_contenido);
$("#artista-solicitud").keyup(load_posibles_artistas);

$("#solicitud-ciudad-form").submit(registra_solicitud_ciudad);

$(".contactos-sec").click(load_contactos_empresa_data);

/**/

$(".social-fb").click(try_update_social_fb);
$(".social-tw").click(try_update_social_tw);
$(".social-gp").click(try_update_social_gp);
$(".social-www").click(try_update_social_www);




/*update socials */
$("#form-social-fb").submit(update_form_social_fb);
$("#form-social-tw").submit(update_form_social_tw);
$("#form-social-gp").submit(update_form_social_gp);
$("#form-social-www").submit(update_form_social_www);


$(".client-history").click(next_page_history);
$(".solicita-artista").click(next_page_artista);
$("#btn-historia").click(next_page_history);
$("#btn-artista").click(next_page_artista);

$("#section-us").click(load_artistas_solicitados);
$("#section-comunidad").click(load_comentatios_publicos);

	

});
/**/
function try_update_medios_contacto(e){
	
	contacto = e.target.id;
	url = now  + "index.php/api/emp/empresa_contacto/format/json/";
	actualiza_data(url, {"contacto" : contacto});	
	load_contactos_empresa_resumen();
	
}
/**/
function load_contactos_empresa(){
	
	url = now  + "index.php/api/emp/empresa_contacto/format/json/";
	$.get(url).done(function(data){

		llenaelementoHTML("#list-contactos",  data);
		$(".contactos_asociados").click(try_update_medios_contacto);


	}).fail(function(){
		alert("Error al cargar la lista ");
	});
}
/**/


function try_update_mas_info(){
	/**/		
	if (in_session == 1){

		showonehideone( "#section-mas-info" , "#mas-info-empresa-text_place" );
		$("#mas-info-empresa-input").blur(function(){
			cadena =  $(this).val();  
			if (cadena.length > 10 ) {
				update_data_emp("mas_info", cadena ,  "#mas-info-empresa-text_place" , "#section-mas-info" , ".response-update-mas-info"  );		
			}else{
				llenaelementoHTML(".response-update-mas-info", "Más info demaciado corta para ser actualizada");
			}
		});	
	}	
}
/**/
function try_update_years(){

	if (in_session == 1  ){
		showonehideone( "#años-section" , "#años-empresa-text_place" );	
		$("#year-input").change(function(){
			cadena =  $(this).val();
			update_data_emp("years", cadena  ,  "#años-empresa-text_place" , "#años-section"  , ".response-update-years" );		
		});
	}
}	
/**/
function try_update_artistas(){

	if (in_session == 1 ){
		showonehideone( "#artistas-section" , "#artistas-empresa-text" );		
		$("#artistas_representados").change(function(){
			cadena =  $(this).val();
			update_data_emp("artistas", cadena  ,  "#artistas-empresa-text" , "#artistas-section"  , ".response-update-artistas" );		
		});			
	}
	
}
/**/
function try_update_vision(){

	if (in_session ==1){
		showonehideone( "#section-vision-empresa" , "#vision-empresa-text_place" );
		$("#descripcion-vision-input").blur(function(){
			cadena =  $(this).val(); 
			if (cadena.length > 10 ) {
				update_data_emp("vision", cadena ,  "#vision-empresa-text_place" , "#section-vision-empresa" ,   ".response-update-vision" );		
			}else{
				llenaelementoHTML(".response-update-vision", "La visión redactada es muy corta para ser actualizada");
			}
		});
	}		
}
/**/
function try_update_mision(){

	if (in_session == 1){
		showonehideone( "#section-mision-empresa" , "#mision-empresa-text_place" );
		$("#mision-empresa-input").blur(function(){	
			cadena =  $(this).val();  
			if (cadena.length >  10 ) {
				update_data_emp("mision", cadena   ,  "#mision-empresa-text_place" , "#section-mision-empresa" , ".response-update-mision" );		
			}else{
				llenaelementoHTML(".response-update-mision", "La misión es muy corta para ser actualizada");
			}
		});
	}
}
/**/
function try_update_descripcion(){

	if (in_session==1 ) {
		showonehideone( "#section-description-empresa" , "#description-empresa-text_place" );
		$("#descripcion-empresa-input").blur(function(){
			cadena =  $(this).val();  
			if (cadena.length >  10 ) {
				update_data_emp("quienes_somos", cadena , "#description-empresa-text_place" , "#section-description-empresa" , ".response-update-quienes-somos"  );					
			}else{
				llenaelementoHTML(".response-update-quienes-somos", "La descripción es muy corta para ser actualizada");
			}		
		});
	}
}
/**/
function try_update_nombre(){

	if (in_session == 1) {
		showonehideone("#nombre-empresa-section" , "#nombre-empresa-text" );
		$("#nombre-empresa-input").blur(function(){
			cadena  = $(this).val();		
			if (cadena.length > 1){
				update_data_emp("nombreempresa", cadena    , "#nombre-empresa-text" , "#nombre-empresa-section" , ".response-update-nombre");			
			}else{
				llenaelementoHTML(".response-update-nombre" , "Nombre muy corto para la empresa");
			}	
		});
	}
}

/**/
function try_update_slogan(){
	
	if (in_session ==1  ) {
		showonehideone("#slogan-edit-section" , "#slogan-text" );	
		$("#nslogan").blur(function(){
			cadena  = $(this).val();		
			if (cadena.length > 1){
				update_data_emp("slogan", cadena    , "#slogan-text" , "#slogan-edit-section" , ".response-update-slogan");			
			}else{
				llenaelementoHTML(".response-update-slogan" , "Slogan muy corto para la empresa");
			}	
		});
	}

}
/**/
function update_data_emp(q ,val , muestra, oculta, place ){	
	url = now +"index.php/api/emp/q/format/json/";
	/*El actualizar */			
	data_send = { "q" : q , "value":  val};
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){	   	
	   	llenaelementoHTML(place ,"<div><em class='alert-ok' id='dinamic-ok'>Datos actualizados</em></div>");	
	   	complete_alert("#dinamic-ok");

	}).fail(function(){
	   	alert("falla al intentar actualizar");	   	
	   	llenaelementoHTML(place, "<div><em class='alert-fail' id='dinamic-fail'>Falla al actualizar  Datos</em></div>");
	   	$("#dinamic-fail").show();
	});

	/*Cuando la respuesta*/
	$(muestra).html(validate_text(val));		
	$(oculta).val(validate_text(val));	
	showonehideone( muestra , oculta );
	
}
/*validate texto*/
function validate_text(text){
    return text.replace(/^\s+|\s+$/gm,'');
}
/**/
function load_contactos_empresa_resumen(){
	
	url = now  + "index.php/api/emp/empresa_contacto_resumen/format/json/";		
	$.get(url).done(function(data){

		llenaelementoHTML("#resumen-num-contactos" , data);
	}).fail(function(){

		alert("Error al cargar resumen de contactos ");
	});
}
/**/
function load_data_empresa(){

	url = now  + "index.php/api/emp/empresa/format/json/";		
	$.get(url).done(function(data){	

		url_nueva_imagen =  now + data[0].base_path_img  + data[0].nombre_imagen;	
		
		$("#logo_empresa_img").attr("src", url_nueva_imagen);				
		$("#imgs-empresa").change(upload_main_imgs);
		complete_alert("#alert-ok-logo"); 
		/*	
		countryName  = data[0].countryName; 		
		llenaelementoHTML("#text-nombre-empresa", countryName);
		$(".pais_empresa_input").hide();
		*/


	}).fail(function(){

		alert("Error al cargar la información de la empresa ");
	});
}
/**/
function clean_img(){
	$('#response_img').html('');
	$("#lista-imagene").html("");
}
/**/
function update_country_org(){

	url = now  +  "index.php/api/emp/empresa_country/format/json/"; 
	country = $(this).val();
	$.ajax(url , { data : {country: country} , type: 'PUT'} ).done(function(data){
		
		load_data_empresa();
	}).fail(function(){
		alert("Error al actualizar el país de la empresa, reportar al administrador");
	});
}
/**/
function insert_genero_musical_empresa(){	
	llenaelementoHTML(".status-genero" , "");
	url =  $("#form-genero-empresa").attr("action");	
	$.post(url  , $("#form-genero-empresa").serialize()).done(function(data){
		llenaelementoHTML(".status-genero" , "Género musical asociado correctamente.!");
		load_generos_empresa();
	});
	return false;
}
/**/
function load_generos_empresa(){
	url =  $("#form-genero-empresa").attr("action");	
	$.get(url).done(function(data){
		llenaelementoHTML(".generos_musicales_empresa" , data);
		$(".delete_genero_empresa").click(delete_genero_empresa);
	});
}
/**/
function delete_genero_empresa(e){

	url =  $("#form-genero-empresa").attr("action");	
	genero = e.target.id;
	data_send = {"genero" : genero }
	
	$.ajax({ url: url, type: 'DELETE', data : data_send }).done(function(data){
	   	load_generos_empresa();
	});
}
/**/
function record_experiencia_cliente(){

		url = $(".form-historia").attr("action");

		descripcion_cliente  = $("#descripcion").val();
			$.post(url , $(".form-historia").serialize() ).done(function(data){
				

				$(".reponse-exp").show();
				if (data ==  true ) {
					
					llenaelementoHTML(".reponse-exp" , "Hemos recibido tu experiencia, sabrás pronto de nosotros.!" );		
					$("#descripcion").val("");				
					$("#contenidor-ranking").addClass('animated pulse');		
					
				}else{
					
					$("#section-start-calificaciones").addClass('animated pulse');		
				}
				recorrepage(".reponse-exp");				
				var fields =  [ "#nombre_cliente" , "#email_cliente", "#tel_cliente" ,  "#descripcion"];
				reset_fields(fields); 
			}).fail(function(){
				
				llenaelementoHTML(".reponse-exp" , "Calificanos.!");
				$(".reponse-exp").show();
				$("#section-start-calificaciones").addClass('animated pulse');		
				recorrepage(".reponse-exp");				
			});

	return false;
}
/**/
function record_solicitus_artista(){
	
	url = $(".form-artista").attr("action");

	$.post(url , $(".form-artista").serialize()+"&"+ $.param( { emp : $("#emp").val() } ) ).done(function(data){

		alert(data);

	}).fail(function(){
		//
	});
	return false;

}
/*mostramos las secciones dinamicamente */
function dinamic_contenido(e){
	
	section = e.target.id;

	switch(section){
    
    case "1":
    	showonehideone(".section-experiencia-cliente" , ".solicitud-artista-section" );
       	$(".principal-contenido-historia").hide();
        break;
    case "2":

    	showonehideone(".solicitud-artista-section" , ".section-experiencia-cliente");    	   
        $(".principal-contenido-historia").hide();
        break;
    case "3":
    	showonehideone(".principal-contenido-historia" , ".section-experiencia-cliente");
    	$(".solicitud-artista-section").hide();		        
        break;   
	} 

}
/***************************Carga posibles aristas************************************+*/
function load_posibles_artistas(){
		
	url = now  + "index.php/api/emp/artistas/format/json/";
	$.get(url , {"artista" : $("#artista-solicitud").val()  }).done(function(data){
		
		llenaelementoHTML("#posibles-artistas" , data);
	}).fail(function(){
		/**/
		alert("Error");
	});	
}
/******************************************************************/
function registra_solicitud_ciudad(){

	url =  $("#solicitud-ciudad-form").attr("action");	
	$.post(url , $("#solicitud-ciudad-form").serialize() ).done(function(data){
		llenaelementoHTML("#response_solicitud_ciudad" , "<em>Gracias por interesarte en que mejoremos nuestros servicios para ti!</em>");
	}).fail(function(){

	});
	return false;		
}
/**************************************************************************/
function load_contactos_empresa_data(){

	url = now  + "index.php/api/contactos/empresa/format/json/";
	$.get(url).done(function(data){
		
		for(var x in data){
			
			nombre =  data[x].nombre; 
			organizacion   =  data[x].organizacion;
			tel            =  data[x].tel;
			movil          =  data[x].movil;			
			correo         =  data[x].correo;
			direccion      =  data[x].direccion;												
			nota           =  data[x].nota;			
			pagina_web     =  data[x].pagina_web;
			pagina_fb      =  data[x].pagina_fb;			
			pagina_tw      =  data[x].pagina_tw;
			correo_alterno  =  data[x].correo_alterno;


			valorHTML("#contact_nombre" , nombre);
			valorHTML("#contact_organizacion" , organizacion);
			valorHTML("#contact_telefono" , tel);
			valorHTML("#contact_movil" , movil);						
			valorHTML("#contact_pagina_web" , pagina_web);
			valorHTML("#contact_pagina_fb" , pagina_fb);
			valorHTML("#contact_pagina_tw" , pagina_tw);
			valorHTML("#contact_direccion", direccion);
			valorHTML("#contact_correo" , correo );
			valorHTML("#contact_correo_alterno" , correo_alterno );
			valorHTML("#contact_nota" , nota);			
		}

	}).fail(function(){
		alert("Error al cargar la lista ");
	});

}




/***************************************************/
function try_update_social_fb(){
	set_modal_social("fb"); 
}
/**/
function try_update_social_tw(){
	set_modal_social("tw"); 
}
/**/
function try_update_social_gp(){
	set_modal_social("gp"); 
}
function try_update_social_www(){
	set_modal_social("www"); 

}
/**/
function set_modal_social(val){


	$("#section-form-url-fb").hide();        	
	$("#section-form-url-tw").hide();
	$("#section-form-url-gp").hide();
	$("#section-form-url-www").hide();


	switch(val){
    case "fb":

        	llenaelementoHTML(".title-modal-social", "Indica al público la cuenta  de  facebook  de tu organizacion");		
        	$("#section-form-url-fb").show();    
        	carga_url_socials("facebook", "#npagina_fb");  


        break;
    case "tw":
        	llenaelementoHTML(".title-modal-social", "Indica al público la cuenta de tweeter de tu organización");		
        	$("#section-form-url-tw").show();
        	carga_url_socials("tweeter", "#npagina_tw");  
        break;
    case "gp":

    	llenaelementoHTML(".title-modal-social", "Indica al público  la cuenta de g+ de tu organización");		        	
    	$("#section-form-url-gp").show();
    	carga_url_socials("gp", "#npagina_gp");  
        break;    

    case "www":

    	llenaelementoHTML(".title-modal-social", "Indica al público la página web que te representa");		        	
    	$("#section-form-url-www").show();
    	carga_url_socials("www", "#npagina_www");  
        break;    

    default:        
	
	}
	
}
/**/
function carga_url_socials(social, input ){


	url = now + "index.php/api/emp/q/format/json/";
	$.get(url , {"q":  social }).done(function(data){

		org_url = data[0].valor;
		valorHTML(input , org_url); 

	}).fail(function(){	
		alert("Error al cargar cuenta de" +  social + " reportar al administrador");
	});

}
/**/
function update_form_social_fb(){
	cadena  =  $("#npagina_fb").val();			
	update_data_emp("facebook", cadena , "", "" , "#response-status-fb" ); 
	return false;
}
/**/
function update_form_social_tw(){
	cadena  =  $("#npagina_tw").val();			
	update_data_emp("tweeter", cadena , "", "" , "#response-status-tw" ); 
	return false;
}
/**/
function update_form_social_gp(){
	cadena  =  $("#npagina_gp").val();			
	update_data_emp("gp", cadena , "", "" , "#response-status-gp" );
	return false;
}
/**/
function update_form_social_www(){
	cadena  =  $("#npagina_www").val();			
	update_data_emp("www", cadena , "", "" , "#response-status-www" );
	return false;
}

/**/
function next_page_history(){	

	showonehideone( ".pag-2" , ".pag-1");	
	showonehideone( ".pag-2" , ".pag-3");	

	
}
/**/
function  next_page_artista(){	
	showonehideone( ".pag-3" , ".pag-1");	
	showonehideone( ".pag-3" , ".pag-2");	
	
}

