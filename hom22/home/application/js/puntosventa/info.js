$(document).ready(function(){

	carga_img();
});
function carga_img(){

	url = $(".now").val()+ "index.php/api/puntosventa/img/format/json/"; 	
	punto_venta = $(".punto_venta").val();
	$.ajax({
		url : url, 
		type: "GET",
		data:{"punto_venta": punto_venta},
		beforeseSend:function(){
			show_load_enid(".place_img" , "cargando imagen del punto de venta " , 1); 
		}
	}).done(function(data){
		//alert(data);
		$(".place_img").empty();	
		llenaelementoHTML(".img" , data);
	}).fail(function(){		
		show_error_enid(".place_img" , "Error al cargar la  imagen, reporte al administrador");
		console.log("Error al cargar la imagen del punto de venta ");
	});
	
	
}

