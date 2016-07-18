$(document).ready(function(){

	$('.date-picker').each(function () {
        var $datepicker = $(this),
            cur_date = ($datepicker.data('date') ? moment($datepicker.data('date'), "YYYY/MM/dd") : moment());

        function updateDisplay(cur_date) {   
            $('#dateinput').val(cur_date);
           
            $datepicker.find('.date-container > .date > .text').text(cur_date.format('Do'));
            $datepicker.find('.date-container > .month > .text').text(cur_date.format('MMMM'));
            $datepicker.find('.date-container > .year > .text').text(cur_date.format('YYYY'));
            $datepicker.data('date', cur_date.format('YYYY/MM/DD'));
        }
        
        updateDisplay(moment());
        
        $datepicker.on('click', '[data-toggle="datepicker"]', function(event) {
            event.preventDefault();
            
            var cur_date = moment($(this).closest('.date-picker').data('date'), "YYYY/MM/DD"),
                type = ($(this).data('type') ? $(this).data('type') : "date"),
                method = ($(this).data('method') ? $(this).data('method') : "add"),
                amt = ($(this).data('amt') ? $(this).data('amt') : 1);
                
            if (method == "add") {
                var duration = moment.duration(1,type);
                cur_date = cur_date.add(duration);
            }else if (method == "subtract") {
                cur_date = cur_date.subtract(1,type);
            }
            
            updateDisplay(cur_date);
        });
        
    });
    

	$("footer").ready(load_events_dia);
	$("#busqueda-general-form").submit(busqueda_general_event);
});
/**/
function busqueda_general_event(e){


	palabra_clave =  $("#palabra_clave").val();
	if (palabra_clave.length > 0) {

		url = now + "index.php/api/busqueda/evento/format/json/";	
		$.ajax({		
			url :  url , 
			data : $("#busqueda-general-form").serialize() , 
			type: "GET", 
			beforeSend: function(){

				llenaelementoHTML(".events" ,  "Cargando..");
			}
		}).done(function(data){						
			llenaelementoHTML(".events" ,  data);			
		}).fail(function(){
			

			llenaelementoHTML(".events" ,  "No existen eventos relacionados a la búsqueda, intente con otra palabra clave ");
		});

	
	}else{
		load_events_dia();

	}

		

	e.preventDefault();
}
/**/
function load_events_dia(){

	url = now + "index.php/api/busqueda/eventos_dia/format/json/";		
	$.ajax({
		url : url , 
		type : "GET",
		beforeSend:function(){
			llenaelementoHTML(".events" , "Cargando");	
		}
	}).done(function(data){					
		llenaelementoHTML(".events" , data);
	}).fail(function(){
		llenaelementoHTML(".events" , "Falla al cargar los eventos");	
	});	
	/**/
}
/**/

