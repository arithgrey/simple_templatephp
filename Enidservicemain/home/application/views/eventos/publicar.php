<link href="<?=base_url('application/js/js/dropzone/css/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/jquery-tags-input/jquery.tagsinput.css')?>" />

<script src="<?=base_url('application/js/js/jquery-tags-input/jquery.tagsinput.js')?>"></script>
<script src="<?=base_url('application/js/js/tagsinput-init.js')?>"></script>

<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>


<style type="text/css">
.title-page-enid{
    display: none;
}
#nombre-input, #edicion-input , #evento , #descripcion-evento, #ubicacion-input{
    display: none;
}

.tag span{
    color: white;
}

.tag-items-form{
    
    background: none repeat scroll 0% 0% #043544 !important;    
}

.panel-enid-right{
    background: red;
}
.section-enid-events-left{
    background: #043544;
}
.p-states.green-box{
    background: #09AFDF !important;
    
}
.green-box {
    box-shadow: 0px 5px 0px #09AFDF !important;
}
.direccion-event-lab{
    color: white;
}
.descripcion-evento-p{
    background:  #13979C;
    color: white;
}
.nombre-evento-h1:hover{
    font-size: 1.5em;
    cursor: pointer;
}
.edicion-evento:hover{
 font-size: 1.2em;   
 cursor: pointer;
}
.descripcion-p:hover{
 font-size: 1.1em;      
 cursor: pointer;
}
.dropzone{
    margin-top: -40px !important;

}
.ubicacion-panel:hover , .accesos-panel:hover{
    padding: 10px;    
    cursor: pointer;
}
#map-section{
    background:  #09AFDF;
   //background: none repeat scroll 0% 0% #13979C;
    padding: 10px;
}
#span-ubicacion{
    font-size: 1.3em;
    color: white;
}
.panel-heading {
    color: white;
}
.activity-list li{

    background: white;
    padding: 5px;
    border-radius: 5px;

}
</style>





                



































































                    
                <div class="col-md-9 section-enid-events-r">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="panel" >
                                <div class="panel-body">
                                    <div class="profile-desk">
                                        <h1 class='nombre-evento-h1'>Nombre de tu evento</h1>
                                        


                                         <div class="form-group nombre" >
                                        <input placeholder="Registra el nombre del evento" class="form-control"  type="text"  name='nombre-input' >

                                        </div>


                                         <input id="evento" name='evento'  >
                                        
                                        <span class="designation edicion-evento">Edición 3 nueva era</span>
                                            

                                            <div class="form-group">
                                                <input placeholder="Registra qué edición tiene el evento" class="form-control"  type="text" id="edicion-input" name='edicion-input'>

                                            </div>


                                          <form action="<?=base_url('application/js/js/dropzone/upload.php')?>" class="dropzone" id="my-awesome-dropzone">
                                                </form>

                                         <div class='dropzone-previews'></div>       
            
                                            <div class='well descripcion-evento-p'>
                                                <p class='descripcion-p'><strong>
                                              Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.                                                   
                                                </strong></p>
                                                <div class="form-group">
                                                    <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control"></textarea>
                                                </div>        
                                            </div>   



                                        <label>Generos</label>
                                       <input style="display: none;" id="tags_1" class="tags" value="Trance, House, Minimal" type="text">                             
                                        
                                            
                                        
                                        

                                    </div>
                                </div>
                            </div>
                        </div>




                          




                        

                    
                 







                    
                        <div class="col-md-12">
                            <div class="panel" style="background: #CD1E3B">
                                <header class="panel-heading">
                                    Artistas que se presentarán en el evento
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="fa fa-times" href="javascript:;"></a>
                                     </span>
                                </header>
                                
                                <div class="panel-body">
                                    <ul class="activity-list">
                                        

                                        
                                        <li>
                                            <div class="avatar">
                                            <img src="http://localhost/adminex/adminex/html/images/photos/user5.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> 
                                                    <span>was absent office due to sickness</span></h5>
                                                    <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                    
                    <div class="panel">
                        
                        <div style="display: block;" class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                        <div class="form-group todo-entry">
                                            <input placeholder="Busca tu artista en soundcloud" class="form-control" style="width: 100%" type="text">
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">+</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                


                            </div>



                
                    




                        </div>



                    </div>
                </div>

                    <div class="col-md-3 section-enid-events-left">
                    
                    <div class="row">
                        

                        <div class="col-md-12">
                            <br>    
                            <div class="panel">

                                <div class="panel-body p-states green-box accesos-panel">

                                    <div class="summary pull-left">
                                        <h4 class='accesos-lab'>
                                            <i class="fa fa-money"></i> Accesos 
                                        </h4>



                                            
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        



                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states green-box">
                                    <div class="summary pull-left">
                                        <h4>                                        
                                      <i class="fa fa-cutlery"></i>
                                      Servicios
                                        </h4>                                    
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states green-box">
                                    <div class="summary pull-left">
                                        <h4>                                        
                                      <i class="fa fa-flag"></i>


                                      Social
                                        </h4>                                    
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body p-states green-box">
                                    <div class="summary pull-left">
                                        <h4>                                        
                                            <i class="fa fa-calendar"></i>
                                            Fecha
                                        </h4>                                    
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>



<!--Inicia ubicación-->
                        <div class="col-md-12">
                            <a href="#mapsection">
                            <div class="panel">
                                <div class="panel-body p-states green-box ubicacion-panel">
                                    <div class="summary pull-left">
                                        <h4>
                                            <i class="fa fa-map-marker"></i>
                                            Ubicación
                                        </h4>                                   
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            </a>
                        </div>

<!--Termina ubicación-->
                    </div>
                </div>
            </div>




































































<div id='map-section' class='col-md-12'>
    <span id='span-ubicacion'>Ubicación</span>
            <div class="form-group">
                <input id="pac-input" class="controls" type="text" placeholder="Ubicación">
            </div>    
    <div id="mapsection">
            <div id="map-canvas"></div>
    </div>

    <div class='textnotfound-location'></div>  

</div>










    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>

    <script>
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
      
      
      llenaelementoHTML(".textnotfound-location" , "La ubicación no ha sido encontrada");

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

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  




















<script type="text/javascript">


var acceptedFileTypes = ".jpeg,.jpg,.png,.JPEG,.JPG,.PNG";
Dropzone.options.myAwesomeDropzone = {

      paramName: "imgportada", //Pagarametro name 
      headers: {"eventosupload" : "test data"},       
      maxThumbnailFilesize: 3,
      maxFilesize: 1, // MB    
      maxFiles: 2,    
      acceptedFiles: ".jpeg, .jpg, .png, .JPEG, .JPG, .PNG",      
      accept: function(file, done) {
           
            
            if (file.name == "a.png") {
              done("Naha, you don't.");
            
            }else { 
                done();
            }

      }, error: function (){

            alert("El formato de la imagen no corresponde con el solicitado, este archivo no se subirá ");
      }


    };

</script>

















































