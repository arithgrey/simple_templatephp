

<link href="<?=base_url('application/js/js/dropzone/css/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/jquery-tags-input/jquery.tagsinput.css')?>" />


<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>



<script src="<?=base_url('application/js/js/jquery-tags-input/jquery.tagsinput.js')?>"></script>
<script src="<?=base_url('application/js/js/tagsinput-init.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/escenarios.js')?>"> </script>



<style type="text/css">

.descripcion-modal-text:hover{
  font-size: 1.2em;
  cursor: pointer;

}
.todo-title, #title-modal-heading{
  color: black;
}

.newdescripesenario{
  display: none;
}
.descripcion_escenario_update:hover{
  font-size: 1.2em;
  cursor: pointer;
}

.title-page-enid{
    display: none;
}
#nombre-input, #edicion-input , #evento , #descripcion-evento, #ubicacion-input, .descripcion-in-modal-escenario{
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


}
.p-states.green-box{
    background: white !important;

    
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

.nombre-evento-h1, .edicion-evento , .white{
    color: white !important;
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
    margin-top: -10px !important;

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
#my-awesome-dropzone{
    background: white;
}
h4{
    color: black !important;
}
#accesos-plus:hover{
    font-size: 1.2em;
}
</style>





                

















                                        



                                      
<form id='form-general-ev'>        
    <input type="hidden" value="<?=$evento;?>" id="evento" name='evento'>
</form>        

                    
                <div class="col-md-8 section-enid-events-r">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="panel" >
                                <header class="panel-heading" style="background: #CD1E3B">
                                    General 
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        
                                     </span>
                                </header>
                            



                                <div class="panel-body" style='background : #124048'>


                                    <div class="profile-desk">
                                        <h1 class='nombre-evento-h1'></h1>
                                                                                    


                                         <div class="form-group nombre" >
                                        <input placeholder="Registra el nombre del evento" class="form-control"  type="text"  id="nombre-input" name='nombre-input' >

                                        </div>


                                         
                                        
                                        <span class="designation edicion-evento"></span>
                                            

                                            <div class="form-group">
                                                <input placeholder="Registra qué edición tiene el evento" class="form-control"  type="text" id="edicion-input" name='edicion-input'>

                                            </div>


                                          <form action="<?=base_url('application/js/js/dropzone/upload.php')?>" class="dropzone" id="my-awesome-dropzone">
                                                </form>

                                                
                                              <div class='well descripcion-evento-p'>
                                                <p class='descripcion-p'><strong>
                                              Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.                                                   
                                                </strong></p>
                                                <div class="form-group">
                                                    <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control"></textarea>
                                                </div>        
                                            </div>   
      
                                         <div class='dropzone-previews'></div>       
            
                                            
                                             





                                    </div>





                                </div>



                            </div>

                        </div>




                          




                        

                    
                 







                    
                    
                    </div>




                    <!-- inicioa Mapa-->



                                    


                                    <div class="panel">                                        
                                            
                                                <input id="pac-input" class="controls" type="text" placeholder="Ubicación">
                                                  <div id="mapsection">
                                                          <div id="map-canvas"></div>
                                                          <div class='textnotfound-location'></div>  
                                                  </div>                                            
                                    </div>




                    <!--termina Mapa -->






                    <!--Accesoso-->


                     <div class="panel" >
                                <header class="panel-heading" style="background:  #032132">
                                    <i class="fa fa-credit-card"></i> Accesos 
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        
                                     </span>
                                </header>
                            



                                <div class="panel-body">
                                        <!--Inicia panel body-->

      <section id="flip-scroll">

                    <span ><?=$inicio;?> - <?=$termino;?></span>
                    <table class="table table-bordered table-striped table-condensed cf">
                        <thead class="cf ">
                        <tr>
                            <th class='blue-col-enid'>Periodo</th>
                            <th>
                              <i class="fa fa-ticket text-center"></i>
                            </th>
                            <th class="numeric text-center">
                              <i class="fa fa-usd"></i>

                            </th>                            
                            
                            
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class='blue-col-enid'>
                              

                                                      <div class="input-group  custom-date-range" data-date="13/01/2015" data-date-format="mm/dd/yyyy">
                                                            <input class="form-control dpd1" name="nuevo_inicio" type="text">
                                                            <span class="input-group-addon"></span>
                                                            <input class="form-control dpd2" name="nuevo_termino" type="text">
                                                        </div>
                                                        

                            </td>
                            <td>Venta</td>
                            <td class="numeric">$1.38</td>
                            
                            
                            
                            
                        </tr>
                        </tbody>
                    </table>
                    <div style="position: relative;" class="external-event label label-primary ui-draggable">+ agregar </div>

                </section>
</div>

                                        <!--Termina panel body-->
                      </div> 

                    <!--Termina accesos -->

                </div>





<!--Inicia section tres -->


    


                            
                    








                    <div class="col-md-4 section-enid-events-left">


                         

                        <div class="panel" >
                                <header class="panel-heading" style="background: #032132">
                                  <i class="fa fa-play"></i>
                                Escenarios
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        
                                     </span>
                                </header>
                                
                               


                                <div class="panel-body" style="background: #F3F8FB">
                                    

                                    <div id="list_escenarios"></div>


                                </div>
                                





                                <div class="panel-body">                                    
                                        
                                      <form id="form-escenario" method="POST">
                                        <div class="form-group todo-entry">
                                            <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">

                                            <input placeholder="Añadir escenario" class="form-control" style="width: 100%" type="text" name='nuevoescenario'>
                                        </div>


                                        <button style="background:black !important" class="btn btn-primary pull-right" type="submit" id="nuevo-escenario">
                                          <i class="fa fa-plus"></i>
                                        </button>
                                      </form>
                                </div>
                                  
                        </div>















                          

                            




                                


                            
                            




                                       
                           


                    
                    </div>
<!--Termina  section tres -->








  




















    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>

    <script>
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











<!--Escenarios modal-->
<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>






<div id="modalesenariosedit"  class="modal fade bs-example-modal-lg" tabindex="-1"
 role="dialog" aria-labelledby="myLargeModalLabel">  
  <div class="modal-dialog modal-lg">
  



<div class='well col-xs-12'>
  <h3 class='nombre-escenario-modal'></h3>
      

      
        <div class='row'>
           
           <div class='panel'>
            <span style="color: black" class='descripcion-modal-text' >+ agregar descripción del escenario</span>
            
            <div class="form-group">
              <textarea class='descripcion-in-modal-escenario col-xs-12' ></textarea>
            </div> 
           </div> 

        </div>

</div>



 <div class='well'>



  



 
        
  <div class='row'>

              <button type="button" class="close" data-dismiss="modal">&times;</button>
              
             <form id="updateescenariomodal-form">
                            <input type='hidden' id="idescenarioupdatemodal" name="idescenarioupdatemodal"  class="idescenarioupdatemodal" >
              </form>

  </div>

<div class='row'>












<div class="col-xs-12  col-sm-8">  
    <div class='row'>

        


         <div class="col-md-12">





                  <div class="panel">
                        <header class="panel-heading">
                            <span style='color:black '>Artistas</span>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                
                             </span>
                        </header>
                        <div class="panel-body">                          
                                      <ul class="to-do-list ui-sortable" id="sortable-todo">                                   
                                        <div class="general-artistas"></div>
                                      </ul>

                                      <form role="form" class="form-inline" id="form-artistas" >
                                                        <div class="form-group todo-entry">
                                                          <datalist id="dinamic-artistas">              
                                                          </datalist>
                                                          <input id='idescenariomodalartistas' name="idescenario" type='hidden'>
                                                          <input  name="nuevoartista" type="text" list="dinamic-artistas" id='artistainput'  
                                                          placeholder="Artista que se presentará en el escenario" class="form-control" style="width: 100%">
                                                        </div>
                                                        <button class="btn btn-primary pull-right" type="submit">+</button>
                                      </form>
                            


                        </div>
                    </div>














        


                                                   
          </div>

    </div>

</div>

<div class="col-xs-12  col-sm-4">
  <div class='row'>
    <button class="btn btn-info btn-lg col-xs-12" type="button"><div class='nombre-in-button'></div></button>
    <button class="btn btn-primary btn-lg col-xs-12" type="button">Large button</button>
  </div>
</div>  







</div>




<div class='row'>
       <label>Generos musicales </label> 
      <input id="tags_1" type="text" class="tags" 
      value="House, electrónica, minimal, techno" style="display: none;">

      </div>



    </div>
  </div>
</div>






<script type="text/javascript">     
    
    $('#artistainput').keyup(function (e){ 

        Stringentrante = $(this).val(); 
        
            buscarartista(Stringentrante);
    });

    function buscarartista(Stringentrante){        
        SC.initialize({
            lient_id: '1ce2bf4dcd83ee01f111219905b4f943'
        });
         
        SC.get('/tracks', { q: Stringentrante   }, function(tracks) {
          
                //document.write( "<pre><xmp>" + JSON.stringify(tracks) + "</xmp></pre>");

                newcontenidodatalist ="";                
                   for(var x in tracks ) {


                    /*Genero del artista*/
                    genre =  tracks[x]["genre"];
                    username = tracks[x]["user"].username;
                    avatar_url =  tracks[x]["user"].avatar_url;
                    uri =   tracks[x]["user"].uri;
                    id = tracks[x]["id"].id;

                        newcontenidodatalist += "<option value='"+ username  +"'>" ;
                   }
                   
                   document.getElementById('dinamic-artistas').innerHTML= newcontenidodatalist;                
        });

        
    }

</script>

     
    

<!--Termina Escenarios modal-->















<!--************************************CONFIRMAR  **********************************-->
<div id="confirmationdeleteescenario" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
  <!-- dialog body -->
  <div class="modal-body">
    
  
  
           <div class="modal-footer">
                Realmente decea eliminar el escenario ??
                <button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                
            </div>

</div>
</div>
</div>
</div>
<!--************************************TERMINA CONFIRMAR  **********************************-->
 
