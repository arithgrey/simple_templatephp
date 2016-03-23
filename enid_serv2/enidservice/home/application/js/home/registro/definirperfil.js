$(document).on("ready" , function(){

	$("#free").click(showsectionfree);
	$("#basico").click(showsectionbasic);
	$("#profesional").click(showsectionprofesional);
	$("#exampleCheckboxSwitch").click(defineplan);
});
/*Define plan*/
function defineplan(){
	
	url = $(".now").val()+"index.php/api/perfilrestcontroller/estableceperfil/format/json/";
		$.post( url , $("#formusuarioeleccion").serialize()).done(function(data){
			
			if (data == true) {

				next =$(".now").val();
				redirect(next );
			}else{
				alert("Error al definir el perfil en el modelo o el controlador");
			}

		}).fail(function(){
			alert("Error al definir perfil");
		});
}
/*Oculta secciones menos la básica*/
function showsectionbasic(){
	showonehideone( "#section_basico" , "#section_free" ); 
	$("#section_profesional").hide();
}
/*Oculta secciones menos la free*/
function showsectionfree(){
	showonehideone( "#section_free" , "#section_basico" ); 	
	$("#section_profesional").hide();
}
/*Oculta secciones menos la profesional*/
function showsectionprofesional(){
	showonehideone( "#section_profesional" , "#section_free"); 
	$("#section_basico").hide();
	
}