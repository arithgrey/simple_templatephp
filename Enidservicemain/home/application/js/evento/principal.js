$(document).on("ready", function(){

	$("footer").ready(loaddata);	
	$(".nombre-evento-h1").click(updatenameevent);
	$(".edicion-evento").click(updateedicion);
	$(".descripcion-p").click(updatedescripcion);
	//$(".ubicacion-panel").click(updateubicacion);
	$("#pac-input").click(updateubicacion);
	
});




/*Load datos */
function loaddata(){
	
	url = now + "index.php/api/event/get_event_by_id/format/json/";	
	$.get(url , $("#form-general-ev").serialize()).done(function(data){

		

		loadinhtml(data);

		
	}).fail(function(){
		
		alert("erro");

	});
}





	










/*In the front end */


function loadinhtml(data){

	

		for (var x in data) {
			/*Data*/	
			nombre_evento = data[x].nombre_evento;
			edicion = data[x].edicion;
			descripcion_evento = data[x].descripcion_evento;
			ubicacion =  data[x].ubicacion;

			/*In THML*/

				/*Nombre del evento */
				
				llenaelementoHTML(".nombre-evento-h1", nombre_evento);	
				valorHTML("#nombre-input" , nombre_evento );	

				/*Edición del evento */

				llenaelementoHTML(".edicion-evento", edicion);	
				valorHTML("#edicion-input" , edicion );	

				/*Valiadamos info*/		
				if (descripcion_evento.length >0 ) {

					llenaelementoHTML(".descripcion-p", descripcion_evento );	
					valorHTML("#descripcion-evento" , descripcion_evento );		
				}
				

				/*Ubicación*/

				valorHTML("#pac-input" , ubicacion);		




		}

	

}/*Termina función*/



/*update nombre evento*/
function updatenameevent(e){

	showonehideone( "#nombre-input" , ".nombre-evento-h1" );
	$("#nombre-input").blur(function(){
		

		nuevotexto = $("#nombre-input").val();

		if (nuevotexto.length > 0 ) {

				
				updateindebname( nuevotexto );

		}else{
				llenaelementoHTML(".nombre-evento-h1" , "Nombre de tu evento"  ); 					
		}

		showonehideone( ".nombre-evento-h1"  , "#nombre-input"  );
		

	});

}

function updateindebname(nuevotexto){

	
	url =  now + "index.php/api/event/updatenombre/format/json/";    

	$.post(url , { "nombre" : nuevotexto , "evento" : $("#evento").val() } ).done(function(data){

		loaddata();

	}).fail(function(){

		alert("Falla al actualizar");
	});



}







/******************************************************************/


/*Update descripción*/
function updateedicion(e){

	showonehideone( "#edicion-input" , ".edicion-evento" );
	$("#edicion-input").blur(function(){
			
		nuevotexto = $("#edicion-input").val(); 
		if (nuevotexto.length >0 ) {			
			
				updateindebenicion(nuevotexto);

		}else{
			llenaelementoHTML(".edicion-evento" , "Edición 3 nueva era"  ); 						
		}
		showonehideone( ".edicion-evento" , "#edicion-input");
		
		
	});
}


function updateindebenicion(nuevotexto){

	
	url =  now + "index.php/api/event/updateedicion/format/json/";    

	$.post(url , { "edicion" : nuevotexto , "evento" : $("#evento").val() } ).done(function(data){


		loaddata();

	}).fail(function(){

		alert("Falla al actualizar");
	});



}











/******************************************************************/


















function updatedescripcion(e){


	showonehideone( "#descripcion-evento" , ".descripcion-p" );

	$("#descripcion-evento").blur(function(){
			
		nuevotexto = $("#descripcion-evento").val(); 
		if (nuevotexto.length >0 ) {			
			updateindbdescripcion(nuevotexto);
		}else{
			llenaelementoHTML(".descripcion-p" , "Describe la experiencia que se vivirá en el espectáculo" ); 						
		}
		showonehideone( ".descripcion-p" , "#descripcion-evento");
		
		
	});

}



function updateindbdescripcion(nuevotexto){

	
	url =  now + "index.php/api/event/updatedescripcion/format/json/";    

	$.post(url , { "descripcion_evento" : nuevotexto , "evento" : $("#evento").val() } )
	.done(function(data){
		

		loaddata();






	}).fail(function(){

		alert("Falla al actualizar");
	});

}



/*Nueva dirección */


function updateubicacion(){
	
	showonehideone( "#ubicacion-input" , ".text-ubicacion" );

	$("#pac-input").blur(function(){
			
		nuevotexto = $("#pac-input").val(); 

		updateubicacionindb(nuevotexto);
		
		
	});

}


function updateubicacionindb(nuevotexto){
	
	url =  now + "index.php/api/event/updateubicacion/format/json/";    

	$.post(url , { "ubicacion" : nuevotexto , "evento" : $("#evento").val() } )
	.done(function(data){
		
		loaddata();

	}).fail(function(){

		alert("Falla al actualizar");
	});

}






















function initialize() {

  var mapOptions = {
    center: new google.maps.LatLng(-33.8688, 151.2195),
    zoom: 13
  };

  
  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  var types = document.getElementById('type-selector');
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

  var autocomplete = new google.maps.places.Autocomplete(input);


  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
    anchorPoint: new google.maps.Point(0, -29)
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      
      
      //llenaelementoHTML(".textnotfound-location" , "La ubicación no ha sido encontrada");

      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: place.icon,
      size: new google.maps.Size(71, 71),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(35, 35)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }

  setupClickListener('changetype-all', []);
  setupClickListener('changetype-address', ['address']);
  setupClickListener('changetype-establishment', ['establishment']);
  setupClickListener('changetype-geocode', ['geocode']);
}