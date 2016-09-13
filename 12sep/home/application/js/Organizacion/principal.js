$(document).on("ready", function(){
	$("#nombre-empresa-text").click(try_update_nombre);
	$("#slogan-text").click(try_update_slogan);
	$("#artistas-empresa-text").click(try_update_artistas);
	$(".description-empresa-text").click(try_update_descripcion);
	$(".mision-empresa-text").click(try_update_mision);
	$(".vision-empresa-text").click(try_update_vision);
	$(".años-empresa-text").click(try_update_years);
	$(".mas-info-empresa-text").click(try_update_mas_info);
	
	$("#text-nombre-empresa").click(function(){
		$(".pais_empresa_input").show();
	});
	
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
	$("#section-comunidad").click(load_section_comunidad);
	$(".text-edit-mensaje-comunidad").click(edita_mensaje_comunidad);
	$(".img-tmp-empresa").click(edita_logo_empresa);
	$("footer").ready(carga_iconos_comunidad);

	$(".lb-pais").click(carga_pais_empresa);
	$(".form-paises").submit(update_pais_empresa);

	$('nav, .nav-controller').on('click', function(event) {
        $('nav').toggleClass('focus');
    });


    $(".links_enid").click(new_menu);
    $('nav, .nav-controller').on('mouseover', function(event) {
        $('nav').addClass('focus');
        $('.controller-open').hide();
        $('.controller-close').show();


    }).on('mouseout', function(event) {
        $('nav').removeClass('focus');
        $('.controller-open').show();
        $('.controller-close').hide();
    });
    

});
/**/
function carga_pais_empresa(){
	/**/
	url = $("#form-paises").attr("action");
	empresa = $(".id_empresa").val();

	$.ajax({
		url :  url , 
		type:  "GET",
		data:  { "empresa" :  empresa },
		beforeSend: function(){
			show_load_enid(".place_pais" , "Cargando país de la empresa ... " , 1);			
		}

	}).done(function(data){

		$(".place_pais").empty();
		console.log(data);
		$('#pais_empresa > option[value="'+ data[0].idCountry +'"]').attr('selected', 'selected');				

	}).fail(function(){
		show_error_enid(".place_pais" , "Falla al cargar paises disponibles, reporte al administrador");
	});
}
/**/
function new_menu(e){

	menu = e.target.id;		

	console.log("---" + menu);

	switch(menu){
		case "menu_1": 
			$("#menu_1").css("color" , "#c9e6f5");			
			$("#section-comunidad").css("color" , "white");
			$("#section-us").css("color" , "white");

			break;

		case "section-comunidad":
			$("#menu_1").css("color" , "white");
			$("#section-comunidad").css("color" , "#c9e6f5");						
			$("#section-us").css("color" , "white");

			break;

		case "section-us":

			$("#menu_1").css("color" , "white");
			$("#section-comunidad").css("color" , "white");
			$("#section-us").css("color" , "#c9e6f5");			
		

			break;

		default:
			//alert("Default");
			break;

	}			



}
/**/
function try_update_mas_info(){	
	valor = $("#mas-info-empresa-input").val();
	if (in_session == 1){
		showonehideone( "#section-mas-info" , "#mas-info-empresa-text_place" );
		$("#mas-info-empresa-input").blur(function(){
			flag =  valida_text_form("#mas-info-empresa-input" , ".response-update-mas-info" ,100  , "Texto descriptivo " ); 			
			if (flag ==  1) {
				cadena =  $(this).val();  
				update_data_emp("mas_info", cadena, ".response-update-mas-info"  , "#section-mas-info" , "#mas-info-empresa-text_place");		
				new_text(valor, cadena , ".mas-info-empresa-text"); 
			}				
		});	
	}	
}
/**/
function try_update_years(){
	
	primer_text =  $("#year-input").val(); 	
	if (in_session == 1  ){
		showonehideone( "#años-section" , "#años-empresa-text_place" );	
		$("#year-input").change(function(){
			cadena =  $(this).val();
			update_data_emp("years", cadena  , ".response-update-years" , "#años-section" , "#años-empresa-text_place"   );		
			new_text(primer_text, cadena , ".años-empresa-text"); 
		});
	}
}
/**/
function try_update_vision(){
	valor =  $("#descripcion-vision-input").val();
	if (in_session ==1){
		showonehideone( "#section-vision-empresa" , "#vision-empresa-text_place" );
		$("#descripcion-vision-input").blur(function(){
			flag =  valida_text_form("#descripcion-vision-input" ,".response-update-vision" , 100  , "Texto  descriptivo "); 
			if (flag ==  1 ) {
				cadena =  $(this).val(); 	
				update_data_emp("vision", cadena , ".response-update-vision" ,  "#section-vision-empresa" , "#vision-empresa-text_place");		
				new_text(valor, cadena , ".vision-empresa-text");		
			}				
		});
	}		
}
/**/
function try_update_mision(){
	valor = $("#mision-empresa-input").val();
	if (in_session == 1){
		showonehideone( "#section-mision-empresa" , "#mision-empresa-text_place" );
		$("#mision-empresa-input").blur(function(){	
			flag= valida_text_form("#mision-empresa-input" , ".response-update-mision" , 100 ,"Texto descriptivo" ); 
			if (flag ==  1 ) {
				cadena =  $(this).val();  	
				update_data_emp("mision", cadena , ".response-update-mision" , "#section-mision-empresa" , "#mision-empresa-text_place"  );		
				new_text(valor, cadena , ".mision-empresa-text");		
			}			
		});
	}
}
/**/
function try_update_descripcion(){
	/**/
	valor =  $(".descripcion-empresa-input").val();
	if (in_session==1 ){		
		showonehideone( "#section-description-empresa" , "#description-empresa-text_place");
		$("#descripcion-empresa-input").blur(function(){
			cadena =  $(this).val();  				
			flag =  valida_text_form(".descripcion-empresa-input" , ".place_descripcion" , 100 , "Descripción de la empresa " ); 			
			if (flag ==  1){
				update_data_emp("quienes_somos", cadena ,  ".response-update-quienes-somos" ,  "#section-description-empresa" , "#description-empresa-text_place" );						
				new_text(valor, cadena , ".description-empresa-text");
			}				
		});
	}
}
/*validate texto*/
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
function next_page_history(){	
	showonehideone( ".pag-2" , ".pag-1");	
	showonehideone( ".pag-2" , ".pag-3");	
}
/**/
function  next_page_artista(){	
	showonehideone( ".pag-3" , ".pag-1");	
	showonehideone( ".pag-3" , ".pag-2");		
}
/**/
function edita_mensaje_comunidad(){	
	showonehideone( "#comunidad-mensaje-input" , ".text-edit-mensaje-comunidad" );	
	$("#comunidad-mensaje-input").blur(function(){				
			flag =  valida_text_form("#comunidad-mensaje-input" , ".place-msj-comunidad" , 20  , "Mensaje para la comunidad" );  																
			if (flag == 1){
				val = $("#comunidad-mensaje-input").val();							
				url =  now + "index.php/api/emp/mensaje_comunidad/format/json/";    
				data_send  ={ "text" : val , "q" : "mensaje_comunidad" }								
				$.ajax({
					url: url,
					type: 'PUT',
					data : data_send ,  
					beforeSend : function(){
						show_load_enid(".place-msj-comunidad" , "Registrando cambios... " , 1);			
					}  
				}).done(function(data){				
					llenaelementoHTML(".text-edit-mensaje-comunidad" , val ); 											
					show_response_ok_enid( ".place-msj-comunidad", "Experiencia actualizada con éxito.!"); 
				}).fail(function(){
					show_error_enid(".place-msj-comunidad" , "Falla al actualizar el mensaje para la comunidad, reporte al administrador.");
				});		
				showonehideone( ".text-edit-mensaje-comunidad"  , "#comunidad-mensaje-input"  );		
			}			
	});

}
/**/
function new_text(antiguo, nuevo , place){
	if (antiguo !=  nuevo ){llenaelementoHTML(place , nuevo);}
}
/**/
function carga_url_socials(social, input ){	
	url = now + "index.php/api/emp/q/format/json/";
	$.ajax({
		url :  url , 
		type :  "GET",
		data :  {"q":  social}, 
		beforeSend : function(){			
			show_load_enid(".place_url_social", "Cargando .... " , 1 );
		}
	}).done(function(data){
		$(".place_url_social").empty();
		org_url = data[0].valor;
		valorHTML(input , org_url); 		
	}).fail(function(){	
		show_error_enid(".place_url_social" , "Error al cargar la url, reporte al administrador." ); 
		console.log("Error al cargar datos del la url actual");
	});
}
/**/
function update_form_social_fb(){
	cadena  =  $("#npagina_fb").val();			
	update_data_emp("facebook", cadena , "#response-status-fb" ,  ".place_url_social" , "" ); 
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function update_form_social_tw(){
	cadena  =  $("#npagina_tw").val();			
	update_data_emp("tweeter", cadena ,  "#response-status-tw" ,  ".place_url_social" , ""); 
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function update_form_social_gp(){
	cadena  =  $("#npagina_gp").val();			
	update_data_emp("gp", cadena , "#response-status-gp",  ".place_url_social" , "" );
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function update_form_social_www(){
	cadena  =  $("#npagina_www").val();			
	update_data_emp("www", cadena ,  "#response-status-www",  ".place_url_social" , "" );
	$("#modal-social-empresa").modal("hide");
	return false;
}
/**/
function try_update_slogan(){
	primer_text = $("#nslogan").val();
	if (in_session ==1  ) {
		showonehideone("#slogan-edit-section" , "#slogan-text" );	
		$("#nslogan").blur(function(){
			cadena  = $(this).val();						
			flag =  valida_text_form("#nslogan" , ".response-update-slogan" , 3 , "Eslogan para la empresa"); 
			if (flag == 1 ) {
				update_data_emp("slogan", cadena , ".response-update-slogan" , "#slogan-edit-section" , "#slogan-text"   );			
				new_text(primer_text, cadena ,  "#slogan-text"); 
			}			
		});
	}
}
/**/
function try_update_nombre(){
	/**/
	primer_text =  $("#nombre-empresa-input").val();
	if (in_session == 1){
		showonehideone("#nombre-empresa-section" , "#nombre-empresa-text" );
		$("#nombre-empresa-input").blur(function(){			

			/**/
			cadena =  $(this).val();  
			flag =  valida_text_form("#nombre-empresa-input" , ".place_nombre_empresa" , 3 , "Nombre para la empresa" ); 					
			if (flag == 1){					
				f =  update_data_emp("nombreempresa", cadena , ".place_nombre_empresa" , "#nombre-empresa-section" , "#nombre-empresa-text" );															
				new_text(primer_text, cadena ,  "#nombre-empresa-text" ); 
			}		

		});
	}
}
/**/
function try_update_artistas(){
	num_empresa =  $("#artistas-empresa-text").val();
	if (in_session == 1 ){
		showonehideone( "#artistas-section" , "#artistas-empresa-text" );		
		$("#artistas_representados").change(function(){
			cadena =  $(this).val();
			update_data_emp("artistas", cadena  ,  ".response-update-artistas" , "#artistas-section" , "#artistas-empresa-text" );					   
			new_text(num_empresa, cadena ,  "#artistas-empresa-text"); 
		});			
	}
	
}
/**/
function update_data_emp(q ,val, place , a ,b){		
	url = now +"index.php/api/emp/q/format/json/";	
	data_send = { "q" : q , "value":  val};
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send , 
	   beforeSend: function(){
	   		show_load_enid(place , "Actualizando ... " , 1);			
	   		$( place).empty();
	   }
	}).done(function(data){	   		
	   		show_response_ok_enid(place, "Datos actualizados con éxito.! ");
	   		flag_response =1;
	}).fail(function(){
		console.log("Error on update data empresa ");
		show_error_enid(place , "Falla al actualizar los datos reporte al administrador.");
	});
	/*Cuando la respuesta*/		
	showonehideone(b , a);	
}
/**/
function carga_iconos_comunidad(){
	

	url =  now + "index.php/api/emp/iconos_comunidad/format/json/";
	id_empresa =  $(".id_empresa").val();
	$.ajax({
		url :  url , 
		type :  "GET", 
		data :  {id_empresa :  id_empresa},
		beforeSend : function(){
			show_load_enid(".iconos-comunidad" ,  "Cargando ... " ,  1 );
		}
	}).done(function(data){
//		console.log(data);
		llenaelementoHTML(".iconos-comunidad" , data);
	}).fail(function(){
		show_error_enid(".iconos-comunidad" , "Falla al cargar modulo, comunidad, reporte al administrador");
	})
}
/**/
function update_pais_empresa(e){


	url = $("#form-paises").attr("action");
	data_send =  $("#form-paises").serialize() +"&"+$.param({"empresa" : $(".id_empresa").val()  });	


	$.ajax({
		url:  url , 
		type : "PUT",
		data:  data_send , 
		beforeSend: function(){
			show_load_enid(".place_pais" ,  "Actualizando ... " ,  1 );
		}
	}).done(function(data){


		set_pais($(".pais_empresa").val());
		$("#modal-locacion").modal("hide");
		$(".place_pais").empty();
		show_response_ok_enid(".place_empresa_locacion", "País actualizado con éxito.! ");

	}).fail(function(){
		show_error_enid(".place_pais" , "Falla al registrar cambios, reporte al administrador.");
	});
	e.preventDefault();
}
/**/
function set_pais(x){

	var paises =  [ "Argentina",
	"Aún sin definir ",
	"Bolivia",
	"Brasil",
	"Canada",
	"Chile",
	"Colombia",
	"Costa Rica",
	"Cuba",
	"Ecuador",
	"El Salvador",
	"España",
	"Estados Unidos",
	"Guatemala",
	"Honduras",
	"México",
	"Nicaragua",
	"Panama",
	"Paraguay",
	"Peru",
	"Puerto Rico",
	"Uruguay"];

	console.log(paises[x]);
	$(".lb-pais").text(paises[x]);
}



/*************************POSIBLES FUNCIONES QUE NO SE OCUPEN YA *************************/
/*
function load_contactos_empresa_data(){
	"url = now  + "index.php/api/contactos/empresa/format/json/";",
	$.ajax({
			url :  url ,
			type :  "GET",
			beforeSend: function(){				
				show_load_enid(".place_msj_contacto" , "Cargando .. ", 1);
			}}).done(function(data){
		
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
		show_error_enid(".place_msj_contacto" , "Falla al cargar los contactos, reporte al administrador");
	});

	/*
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
*/

/******************************************************************/
/*
function registra_solicitud_ciudad(e){

	url =  $("#solicitud-ciudad-form").attr("action");
	$.ajax({
		url : url , 
		type : "POST" , 
		data : $("#solicitud-ciudad-form").serialize() , 
		beforeSend :  function(){
			llenaelementoHTML("#response_solicitud_ciudad" , "Registrando  ....  ");
		}
	}).done(function(data){
		llenaelementoHTML("#response_solicitud_ciudad" , "<em>Gracias por interesarte en que mejoremos nuestros servicios para ti!</em>");
	}).fail(function(){
		llenaelementoHTML("#response_solicitud_ciudad" , "Falla al registrar tu comentario, reporta al administrador ");

	});
	e.preventDefault();
}
*/
/**************************************************************************/

/***************************************************/

/*
function load_posibles_artistas(){
		alert();
	url = now  + "index.php/api/emp/artistas/format/json/";
	$.get(url , {"artista" : $("#artista-solicitud").val()  }).done(function(data){
		
		llenaelementoHTML("#posibles-artistas" , data);
	}).fail(function(){

		alert("Error");
	});	
}
*/

/*mostramos las secciones dinamicamente */
/*
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
*/
/*
function record_solicitus_artista(){
	
	url = $(".form-artista").attr("action");	
	$.post(url , $(".form-artista").serialize()+"&"+ $.param( { emp : $("#emp").val() } ) ).done(function(data){

		alert(data);

	}).fail(function(){
		//
	});
	return false;

}
*/

/*
function record_experiencia_cliente(e){

		url = $(".form-historia").attr("action");
		descripcion_cliente  = $("#descripcion").val();
		$.ajax({
			url : url , 
			data : $(".form-historia").serialize(), 
			type : "POST",
			beforeSend: function(){
				llenaelementoHTML(".reponse-exp" , "Registrando tu comentario ... ");	
			} 

		}).done(function(data){
			$(".reponse-exp").show();
					
				if (data ==  true ){					
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

	e.preventDefault();
}
*/

/*
function insert_genero_musical_empresa(){	

	llenaelementoHTML(".status-genero" , "");
	url =  $("#form-genero-empresa").attr("action");	
	$.post(url  , $("#form-genero-empresa").serialize()).done(function(data){
		llenaelementoHTML(".status-genero" , "Género musical asociado correctamente.!");
		load_generos_empresa();
	});
	return false;
}
*/
/*
function load_generos_empresa(){
	url =  $("#form-genero-empresa").attr("action");	
	$.get(url).done(function(data){
		llenaelementoHTML(".generos_musicales_empresa" , data);
		$(".delete_genero_empresa").click(delete_genero_empresa);
	});
}
*/
/*
function delete_genero_empresa(e){

	url =  $("#form-genero-empresa").attr("action");	
	genero = e.target.id;
	data_send = {"genero" : genero }
	
	$.ajax({ url: url, type: 'DELETE', data : data_send }).done(function(data){
	   	load_generos_empresa();
	});
}


*/

/*
function update_country_org(){

	url = now  +  "index.php/api/emp/empresa_country/format/json/"; 
	country = $(this).val();
	$.ajax(url , { data : {country: country} , type: 'PUT'} ).done(function(data){
		
		load_data_empresa();
	}).fail(function(){
		alert("Error al actualizar el país de la empresa, reportar al administrador");
	});
}
*/
/*
function clean_img(){	
	$('#response_img').html('');
	$("#lista-imagene").html("");
}
*/




/*
function load_data_empresa(){

	url = now  + "index.php/api/emp/empresa/format/json/";		
	$.get(url).done(function(data){	

		url_nueva_imagen =  now + data[0].base_path_img  + data[0].nombre_imagen;	
		
		$("#logo_empresa_img").attr("src", url_nueva_imagen);						
		complete_alert("#alert-ok-logo"); 
		
	}).fail(function(){

		alert("Error al cargar la información de la empresa ");
	});
}
*/
/**
function load_contactos_empresa_resumen(){
	
	url = now  + "index.php/api/emp/empresa_contacto_resumen/format/json/";		
	$.get(url).done(function(data){

		llenaelementoHTML("#resumen-num-contactos" , data);
	}).fail(function(){

		alert("Error al cargar resumen de contactos ");
	});
}
*/
/**/


/**/
/*
function validate_text(text){
    return text.replace(/^\s+|\s+$/gm,'');
}
*/
/**/

/*
function try_update_medios_contacto(e){
	
	contacto = e.target.id;
	url = now  + "index.php/api/emp/empresa_contacto/format/json/";
	actualiza_data(url, {"contacto" : contacto});	
	load_contactos_empresa_resumen();
	
}
*/
/*
function load_contactos_empresa(){
	
	url = now  + "index.php/api/emp/empresa_contacto/format/json/";
	$.get(url).done(function(data){

		llenaelementoHTML("#list-contactos",  data);
		//$(".contactos_asociados").click(try_update_medios_contacto);


	}).fail(function(){
		alert("Error al cargar la lista ");
	});
}
*/
