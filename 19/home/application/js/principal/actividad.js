$(document).on("ready" , function(){

    $("footer").ready(carga_ultima_actividad_eventos);                
    setInterval('carga_ultima_actividad_eventos()', 100000);    
    /**/
    $("#dinamic_activity_section_right").click(dinamic_section_left);
    $("#dinamic_activity_section_left").click(dinamic_section_right);
    
});
/*Cambiamos el tamaño de la sección por clase*/
function  dinamic_width(section , clases){   
   
   $(section).addClass(clases); 
}
function dinamic_remov_class(section , clases){
  
  $(section).removeClass(clases); 
}
/**/
function carga_ultima_actividad_eventos(){

	url =  now + "index.php/api/activity/eventos_administracion/format/json"; 
	$.ajax({	url : url,
			type : 'GET',
      success : function(res){}                
      }).done(function(data){           			           		             
            llenaelementoHTML(".last-activity-enid" , data);
      }).fail(function(){
          alert("Error al la sección de actividades , reportar al administrador ");
      });
}
/**/
function dinamic_section_left(){
  showonehideone(".dinamic_activity_section_left" , ".dinamic_activity_section_right" );             
  dinamic_remov_class("#section_main_left" , " col-lg-8 col-md-8 col-sm-8 ");     
  dinamic_width("#section_main_left" , " col-lg-12 col-md-12 col-sm-12 ");  
  $("#section_main_right").hide();      
  $("#dinamic_activity_section_right").click(dinamic_section_left);
  $("#dinamic_activity_section_left").click(dinamic_section_right); 
 
}
/**/
function dinamic_section_right(){
  showonehideone(".dinamic_activity_section_right"  , ".dinamic_activity_section_left" );         
  dinamic_remov_class("#section_main_left" , " col-lg-12 col-md-12 col-sm-12 ");
  dinamic_width("#section_main_left" , " col-lg-8 col-md-8 col-sm-8 ");          
  $("#section_main_right").show(); 
  $("#dinamic_activity_section_right").click(dinamic_section_left);
  $("#dinamic_activity_section_left").click(dinamic_section_right);
 
}