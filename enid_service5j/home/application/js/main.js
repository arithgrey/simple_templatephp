$("footer").ready(function(){
	now = $(".now").val();
	in_session =  $("#in_session").val();

	$("#mc-embedded-subscribe").click(suscribenewsletters);
	genericresponse =["Ocurio un error al registrar, reporte al administrador del sistema" 
	, "Felicidades ahora estás suscrito !!", "Error al cargar los datos de las gráficas, reportar al administrador"
	, "Ocurio un error al intentar registrar cambio, reporte al administrador del sistema" ];

	$(".load_resumen_escenarios_event").click(carga_resumen_escenarios);
});
function show_load_enid(place , texto , flag ){

	/* 1 para imagenes cortas */			
	switch(flag) {
    case 1:
        llenaelementoHTML(place , texto);
        break;

    default:
        break;
	} 
}
/**/
function show_response_ok_enid(place , msj ){
	$(place).show();
	llenaelementoHTML(place , "<span class='response_ok_enid'>" + msj + "</span>");
	muestra_alert_segundos(place);
}
function show_error_enid(place , mjs ){
	llenaelementoHTML(place , "<span class='error_enid'>" + mjs + "</span>");
}
/**/
function valida_text_form(input , place_msj , len , nom ){
		
	$(place_msj).show();
	valor_registrado =   $(input).val(); 	
	mensaje_user =  "";
	flag = 1; 
	
	if (valor_registrado.length < len ){
		mensaje_user =  nom + " demasiado corto "; 		
		flag = 0;  
	}	
	/*Lanzamos mensaje y si es necesario mostramos border*/
	if (flag == 0) {
		$(input).css("border" , "1px solid rgb(13, 62, 86)");
		flag  = 0; 
	}
	llenaelementoHTML( place_msj ,  "<span class='alerta_enid'>" + mensaje_user + "</span>");
	return flag; 
}
/**/
function valida_num_form(input , place_msj ){	
	$(place_msj).show();
	valor_registrado =   $(input).val(); 
	mensaje_user =  "";
	f = 1; 
	
	if ( isNaN(valor_registrado)){
		mensaje_user = "Registre sólo números "; 		
		f =0 ;  
	}	
	/*Lanzamos mensaje y si es necesario mostramos border*/
	if (f == 0) {$(input).css("border" , "1px solid rgb(13, 62, 86)");}
	llenaelementoHTML( place_msj ,  "<span class='alerta_enid'>" + mensaje_user + "</span>");
	return f; 
}
/**/
function valida_url_form( place , input  ,  msj ){

	url =  $(input).val();
	var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    if(RegExp.test(url)){
        return true;
    }else{
        return false;
    }
}
	
/**/	
function valida_email_form(input ,  place_msj ){
	$(place_msj).show();
	valor_registrado =   $(input).val(); 
	mensaje_user =  "";
	flag = 1; 
	if (valor_registrado.length < 8 ){
		mensaje_user =  "Correo electrónico demasiado corto"; 		
		flag =0 ;  
	}
	/**/
	
	if (valEmail(valor_registrado) ==  false) {
		mensaje_user =  "Registre correo electrónico correcto"; 		
		flag =0 ;  	
	}

	/*Lanzamos mensaje y si es necesario mostramos border*/
	if (flag == 0) {$(input).css("border" , "1px solid rgb(13, 62, 86)");}
	llenaelementoHTML( place_msj , "<span class='alerta_enid'>" +  mensaje_user + "</span>");
	return flag; 
}	
/**/
function valida_tel_form(input ,  place_msj ){
	$(place_msj).show();	
	valor_registrado =   $(input).val(); 
	mensaje_user =  "";
	flag = 1; 
	if (valor_registrado.length < 8 ){
		mensaje_user =  "Número telefónico demasiado corto"; 		
		flag =0 ;  
	}
	/**/
	if (isNaN(valor_registrado)) {
		mensaje_user = "Registre solo números telefónicos";
		flag =0 ;  
	}
	/*Lanzamos mensaje y si es necesario mostramos border*/
	if (flag == 0) {$(input).css("border" , "1px solid rgb(13, 62, 86)");}
	llenaelementoHTML( place_msj ,  "<span class='alerta_enid'>" + mensaje_user + "</span>");
	return flag; 
}	
/**/

/**/
function limpia_inputs(){
	$(".form-control").val("");
}
function outsystem(){
	urlnext = $(".now").val()+"index.php/sessioncontroller/logout/";		
	redirect(urlnext);	
}
function llenaelementoHTML(idelement , data ){	
	$(idelement).html(data);
} 
function valorHTML(idelement , data){
	$(idelement).val(data);
} 
function set_text_element(text_tag , texto ){
	$(text_tag).text(texto);
}
function redirect(url){
	window.location.replace(url);
}
function recorrepage(idrecorrer){	
	$('html, body').animate({scrollTop: $(idrecorrer).offset().top -100 }, 'slow');
}
function get_td(val , extra ){ 
	return "<td>" + val + "</td>";
}
function showhide(elementoenelquepasas, elementodinamico ){

	$( elementoenelquepasas ).mouseover(function() {
			$(elementodinamico).show();
	}).mouseout(function() {
		$(elementodinamico).hide();
	});
}
/**/
function showonehideone( elementomostrar , elementoocultar  ){
	$(elementomostrar).show();
	$(elementoocultar).hide();
}
/*saca el id del elemento */
function getidstringanddinamicelement(completa, elementomostrar , elementoocultar){

	bandera =0; 
	id="";

	for(var x in completa){

			if (bandera>0) {
				id += completa[x];
			}

			if (completa[x] == "_") {
				bandera++;
			}


	}/*Termina el ciclo*/
	
	dinamicinput =  elementomostrar + id;
	dinamicpnombre =  elementoocultar+ id;
	showonehideone( dinamicinput , dinamicpnombre  );
	return id;
}
/*saca el id del elemento */
function getidstringcadena(completa){

	bandera =0; 
	id="";

	for(var x in completa){

			if (bandera>0) {
				id += completa[x];
			}

			if (completa[x] == "_") {
				bandera++;
			}
	}/*Termina el ciclo*/
	return id;
}
/**/
function valEmail(valor){
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}
function  suscribenewsletters(e) {
	
	EMAIL =  $("#mce-EMAIL").val();
	/*Validamos que sea mail desde la vista */
		if (valEmail(EMAIL) ==  true ) {

				url = now + "index.php/api/newslettercontrolador/registrarCorreo/Format/json/";
				$.post(url , $("#subscribenow").serialize()).done(function(data){

					llenaelementoHTML("#mce-success-response" , genericresponse[1]);
					llenaelementoHTML("#mce-error-response", "");
				
				}).fail(function(){
						
					alert("#mce-error-response", genericresponse[0]);	
				
				});

		
		}else{

				llenaelementoHTML("#mce-error-response" , "Lo sentimos, ingresa un email correcto para completar la solicitud");
		}


	$(".progress").show();
	$(".progress-xs").show();
	return false;
}
function show_section_dinamic_button(seccion){

	if ($(seccion).is(":visible")) {
		
		$(seccion).hide();
	}else{
		$(seccion).show();
	}	
}
/**/
function show_section_dinamic_arrow(dinamic_section , id_section , new_class_up , new_class_down){

	if ($(dinamic_section).is(":visible")) {
		
		
		$(id_section).removeClass(new_class_down);		
		$(id_section).addClass(new_class_up);	
		
		
	
	}else{		
		
		
		$(id_section).removeClass(new_class_up);		
		$(id_section).addClass(new_class_down);		
	}
}
/**/
function show_section_dinamic_on_click(dinamic_section){


	if ($(dinamic_section).is(":visible")) {

		$(dinamic_section).hide();

	}else{

		$(dinamic_section).show();
	}

}

/**************************************************************************************/
function updates_send(url , data_send ){

	$.post(url , data_send ).done(function(data){

	}).fail(function(){
		alert("Falla al actualizar");
	});

}

/**************************************************************************************/
function updates_send_test(url , data_send ){

	$.post(url , data_send ).done(function(data){

		alert(data);
	}).fail(function(){
		alert("Falla al actualizar");
	});
}
/**/

function actualiza_data_test(url , data_send ){
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){
	   		alert(data);
	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});
}




function actualiza_data(url , data_send ){
	$.ajax({
	   url: url,
	   type: 'PUT',
	   data : data_send  }).done(function(data){
	   		
	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});
}
/**/
function registra_data(url , data_send ){

	$.post(url , data_send ).done(function(data){
		
	}).fail(function(){
		alert("Falla al registrar");
	});
}
/***/
function registra_data_test(url , data_send ){

	$.post(url , data_send ).done(function(data){
		alert(data);
	}).fail(function(){
		alert("Falla al registrar");
	});
}

/**/
function eliminar_data(url , data_send ){
	$.ajax({
	   url: url,
	   type: 'DELETE',
	   data : data_send }).done(function(data){
	   	
	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});
}
function eliminar_data_test(url , data_send ){
	$.ajax({
	   url: url,
	   type: 'DELETE',
	   data : data_send }).done(function(data){
	   	alert(data);
	}).fail(function(){
	   		alert("falla al intentar actualizar");
	});
}

function exporta_excel(){
	
    $("#datos_a_enviar").val( $("<div>").append( $("#print-section").eq(0).clone()).html());
    $("#FormularioExportacion").submit();
}
/**/
function reset_fields(fields){

	for(var x in fields ){
		$(fields[x]).val("");
	}
}
/**/
function ocualta_elementos_array(data){
		
	for(var x in data){		
		$(data[x]).hide();		
	}
}
/**/
function muestra_alert_segundos(seccion){	
	setTimeout(function() {
        $(seccion).fadeOut(1500);
    }, 1000);
}
/**/
function complete_alert_ok_modal(e,  f){

	$(f).modal('hide');
	$(e).show();
	muestra_alert_segundos(e);
	

}
function complete_alert(e){
	
	$(e).show();
	muestra_alert_segundos(e);
}

function resumen_event(muestra, botona , botonb ){

	$(muestra).show();
	showonehideone(botona , botonb);
}
function dinamic_section(){    
    $(".menos-info").show();
    showonehideone(".dinamic_campo_tb" , ".mas-info");
}
/******/
function dinamic_section_info(){
    $(".menos-info").hide();
    showonehideone(  ".mas-info" , ".dinamic_campo_tb");
}
/*Para imagenes */
function mostrar_img_upload(source , idsection){


		
		var list = document.getElementById(idsection);
		$.removeData(list);
		li   = document.createElement('li');
		img  = document.createElement('img');
		img.setAttribute('width', '100%');
		img.setAttribute('height', '100%');        
	        

		img.src = source;
		
		li.appendChild(img);
		list.appendChild(li);


}
/**/
function  url_editar_user( url , text ){
	url_next =  "<a href='"+url+"' style='color:white;'>"+ text+"<i class='fa fa-pencil-square-o'></i></a>";	
	return  url_next;
}
/**/
function carga_resumen_escenarios(){
	id_evento =  $(".evento_escenario").val(); 
	url =  now + "index.php/api/escenario/resumenpublic/format/json/"; 
	$.ajax({
		url : url , 
		type: "GET" , 
		data: {"evento" : id_evento }, 
		beforeSend: function(){
			/**/	
			$(".load_resumen_escenario_enid").show();
		}
	}).done(function(data){
		/**/		
		$(".load_resumen_escenario_enid").hide();
		llenaelementoHTML(".resumen_escenarios" , data);
	}).fail(function(){
		$(".load_resumen_escenario_enid").hide();
		alert("Error al cargar el escenario reporte al administrador ");
	});
}
/**/
function replace_val_text(input_val , label_place , valor , text){
	llenaelementoHTML(label_place , text );
	valorHTML( input_val , valor);		
	showonehideone( label_place, input_val ); 
}
