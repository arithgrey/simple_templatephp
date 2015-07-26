function load_data_tematica(){

			
	url =  now + "index.php/api/event/loadtematicabyid/format/json/";    					
	$.get(url ,  $("#form-tematica").serialize() ).done(function(data){
								
		list_select = "";		
		for(var x in data ){
			
			if (data[x].idtematica == data[x].idtem ) {

				list_select += "<option value='"+data[x].idtematica +"' selected>"+ data[x].tematica_evento +" </option>";	
			}else{
				list_select += "<option value='"+data[x].idtematica +"'>"+ data[x].tematica_evento +" </option>";		
			}	
		}	
		llenaelementoHTML("#tematica_select" , list_select);

		$("#tematica_select").change(update_tematica_evento);


	}).fail(function(){

			alert(genericresponse[0]);
	});

					
					


}/*Termina la función */




function update_tematica_evento(){


		url =now + "index.php/api/event/update_tematica_by_id/format/json/";
		$.post(url ,  $("#form-tematica").serialize()  ).done(function(){

			load_data_tematica();
			
		}).fail(function(){
			alert(genericresponse[0]);
		});
		

		
}