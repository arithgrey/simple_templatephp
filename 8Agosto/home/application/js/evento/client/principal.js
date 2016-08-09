/*Programos el evento */
function  programa_event(){
 	evento  =  $("#evento").val();
 	/*Cargamos los posibles stados del event*/
 	display_programados_events();
}
/**/
function display_programados_events(){

	url = now + "index.php/api/templ/programados_tipos/format/json/";
	tipos = "1"; 
	$.get(url , {"tipo" : tipos } ).done(function(data){
			
		alert(data);

	}).fail(function(){

		alert("Error al cargar los programados ... ");
	});
}
/*Actualiza la programación del event*/
function programa_event(){

	url = $("#form-event-progrado").attr("action");
	$.post(url , $("#form-event-progrado").serialize() ).done(function(data){
		/**/
		alert(data);

	}).fail(function(){
		alert("Falla al programar el evento ");
	});		
}
//id_programado , tipo , descripcion , 
