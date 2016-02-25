$(document).on("ready" , function(){


    $("footer").ready(carga_ultima_actividad_eventos);                
    setInterval('carga_ultima_actividad_eventos()', 100000);
});
/**/

function carga_ultima_actividad_eventos(){

	url =  now + "index.php/api/activity/eventos_administracion/format/json"; 
		$.ajax({	url : url,
				type : 'GET',
                success : function(res){        

                }                
           	}).done(function(data){           			           		             
              llenaelementoHTML(".last-activity-enid" , data);
           	}).fail(function(){

           		alert("Error al la sección de actividades , reportar al administrador ");
           	});
}