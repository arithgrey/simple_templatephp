var map_enid_service;      
var map_options;   
var map;  
var centro;
var mark; 
var image; 
var marker; 
var new_center;  
var latutud;
var longitud;
var place_map; 

$(document).ready(function(){

    inicia_google_maps();  

    if ($(".public").val() == "99999999"){                
        $(".btn_new_pv").click(registra_direccion);        
    }else{
        $(".place_maps_enid").empty();
    }    
}); 

url_img="";  size_1 = 20; size_2  =  32; origin_1 = 0; origin_2  = 0; anchor_1  = 0; anchor_2 =  32;
/**/
function map(new_latitud, new_longitud ,  new_place , flag ){
    place_map  =  new_place;
    if (flag == 0 ){
        set_default(new_latitud, new_longitud ,  new_place);
    }else{
        set_base(new_latitud, new_longitud ,  new_place);

    }
}
/**/
function set_base(new_latitud, new_longitud ,  new_place){

    lat = $(".new_lat").val();    
    lng = $(".new_lng").val();
    var latlng = new google.maps.LatLng(lat, lng);
    set_centro_latlng(latlng);
}
/**/
function set_default(new_latitud, new_longitud ,  new_place){
    latutud =  new_latitud;
    longitud =  new_longitud;    
    set_centro(new_latitud ,  new_longitud);                    
}
/**/
function set_place(new_place){
    place_map =  new_place;
}
/**/
function set_latitud(new_latitud){
    latutud = new_latitud;
}
/**/
function set_centro(latitud , longitud ){   
    centro  = {lat: latitud  , lng: longitud}
}
/**/
function set_centro_latlng(new_latlng){
    centro = new_latlng;   
}
/**/
function get_latitud(){
    return latutud;    
}
/**/
function get_longitud(){
    return longitud;
}
/**/
function get_centro(){
    return centro;
}   
/**/
function set_map_options(zoom , mapTypeId ){        
    map_options  = {
        center: get_centro() ,          
        zoom: zoom,
        mapTypeId : mapTypeId              
    };   
}   
/**/
function set_market_map(title){

    marker = new google.maps.Marker({            
        map: get_map(),
        icon: get_icon_mark(), 
        position: get_centro(),
        draggable: true,              
        title: title
    });               
}
/**/
function set_icon_mark( url_img  , size_1, size_2 , origin_1 , origin_2 , anchor_1 , anchor_2){        
    image = {              
            size: new google.maps.Size(size_1, size_2),          
            origin: new google.maps.Point(origin_1, origin_2),          
            anchor: new google.maps.Point(anchor_1, anchor_2)
    };
}
/**/
function get_market_map(){
    return marker;
}
/**/
function get_place(){
    return place_map;
}
function get_map(){
    map = new google.maps.Map(document.getElementById(get_place()), get_map_options() );         
    return map; 
}
/**/
function get_map_options(){
    return map_options;
}
/**/
function get_icon_mark(){
    return image;
}
/**/    
function expandViewportToFitPlace(place){            
        
    var new_location =  place.geometry.location; 
    var lat =  new_location.lat(); 
    var lng =  new_location.lng(); 
        
    $(".new_place_id").val(place.place_id);
    $(".new_formatted_address").val(place.formatted_address);           
    $(".new_lat").val(lat);
    $(".new_lng").val(lng);

    if(place.geometry.viewport){              
            map.fitBounds(place.geometry.viewport);                                 
            var marker = new google.maps.Marker({
                map: map 
            });              
            marker.setPlace({
                placeId: place.place_id,
                location: place.geometry.location
            });                  
            map.setZoom(17);
            marker.setVisible(true);
                  
        }else{              
            map.setCenter(place.geometry.location);                
            map.setZoom(17);
                
    }           
}
/**/
function inicia_google_maps(){    
    location_actual  =  navigator.geolocation.getCurrentPosition(initialise);    
}
/**/
function registra_direccion(){
    /**/    
    flag =  valida_text_form("#origin-input" , ".place_nueva_locacion" , 5 , "Dirección del punto de venta" );       
    if (flag == 1){
        url =  $(".form-registro-direccion").attr("action");
        $.ajax({
            url : url , 
            type:  "PUT",
            data : $(".form-registro-direccion").serialize() , 
            beforeSend: function(){
                show_load_enid(".place_nueva_locacion" , "Registrando locación del punto de venta" , 1);    
            }
        }).done(function(data){               
            show_response_ok_enid( ".place_nueva_locacion", "Locación del punto de venta registra éxito.! "); 
        }).fail(function(){     
            show_error_enid(".place_nueva_locacion" , "Falla al registrar, reporte al administrador" );
        });   
    }
}
/**/
function initialise(location){           
    
    var origin_place_id = null;
    var destination_place_id = null;
    var travel_mode = google.maps.TravelMode.WALKING;    
    latitude_actual  =  location.coords.latitude;
    longitude_actual  =  location.coords.longitude;    

    if ($(".destination").val() == 99999999 ){
        destination_map(latitude_actual , longitude_actual );
    }else{       
        flag_exist =0;
        if ($(".flag_default_map").val() > 0 ) {flag_exist  = 1; }
        maps_default(latitude_actual ,  longitude_actual , flag_exist );
    }
} 
/**/
function destination_map(latitude_actual , longitude_actual){
   route_map(latitude_actual , longitude_actual );
}
/**/
function route_map(latitude_actual , longitude_actual){    

    place_map  =  "map";   
    set_default(latitude_actual , longitude_actual ,  place_map); 
    var mapTypeId  =  google.maps.MapTypeId.ROADMAP;  
    set_map_options( 18 , mapTypeId );                     
    var  map_enid_service = get_map();    
    set_market_map("Tu ubicación actual");       

    $(".place_maps_enid").empty();    
    place_id_destination = $(".new_place_id").val();
    

}
/**/
function maps_default(latitude_actual ,  longitude_actual , flag_exist ){


        map(latitude_actual , longitude_actual  , "map" ,  flag_exist );
        var mapTypeId  =  google.maps.MapTypeId.ROADMAP;  
        set_map_options( 18 , mapTypeId );                         
        var  map_enid_service = get_map();
        set_market_map("Tu ubicación actual");       
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;      

        var origin_input = document.getElementById('origin-input');
        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        origin_autocomplete.bindTo('bounds', map_enid_service);
        origin_autocomplete.addListener('place_changed', function(){        
        var place = origin_autocomplete.getPlace();         
        if(!place.geometry){window.alert("No se ha encontrado la dirección indicada, verifique que los datos sean correctos.!");return;}          
           expandViewportToFitPlace(place);
        });

}