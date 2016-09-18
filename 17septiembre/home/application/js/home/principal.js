$(document).on("ready" , function(){

	/*Listo */
	
	$("#panel-eventos").mouseenter(function() {
    	
    	$("#panel-eventos").addClass('animated infinite pulse');

	  }).mouseleave(function() {
   		$( "#panel-eventos" ).removeClass('animated infinite pulse');	
  	});



});
