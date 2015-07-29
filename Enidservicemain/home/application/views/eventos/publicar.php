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
.descripcion_escenario_update:hover, .nombre-escenario-modal:hover{
  font-size: 1.2em;
  cursor: pointer;
}
.title-page-enid{
    display: none;
}
#guardar-generos{
  display: none;
}
#file_input{
  display: none;
}
#nombre-input, #edicion-input , #evento , #descripcion-evento, #ubicacion-input, .descripcion-in-modal-escenario, .nombre-escenario-input-modal, .day_escenario_inputs ,.social-media-event, #restricciones-evento ,  #politicas-evento, #permitido-evento {
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
.restricciones-p:hover , .politicas-p:hover , .permitido-p{

  cursor: pointer;
  font-size: 1.2em;
}
.section_generosmusicales, .generos_musicales_div{
  display: none;
}
#tematica_section , .tematica_section{
  display: none;
 }
</style>

<link href="<?=base_url('application/js/js/dropzone/css/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>




<script type="text/javascript" src="<?=base_url('application/js/evento/generosmusicales.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/escenarios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/servicios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/objetospermitidos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/tematica.js')?>"></script>

<!--Escenarios modal-->
<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/gmap.js')?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>



<div class="col-md-12">
                    <div class="panel">
                        <header class="panel-heading">                            
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                
                             </span>
                        </header>
                        <div class="panel-body">
                           















<div class="col-md-12">
        <!-- BEGIN Portlet PORTLET-->
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption caption-red">
              <i class="glyphicon glyphicon-pushpin"></i>
              
              
            </div>
            <ul class="nav nav-tabs">
              <li>
                <a href="#portlet_tab3" data-toggle="tab">

                <i class="fa fa-exclamation-triangle"></i> Lo prohibido </a>
              </li>
              <li class='permitidonow'>
                <a href="#portlet_tab2" data-toggle="tab">
                <i class="fa fa-check permitidonow" ></i> Lo permitido </a>
              </li>
              <li class="">
                <a href="#portlet_tab1" data-toggle="tab">
                <i class="fa fa-circle"></i> Políticas </a>
              </li>
              

              <li class="active">
                <a href="#portlet_tab4" data-toggle="tab">
                 Evento </a>
              </li>

              

              


            </ul>
          </div>
          <div class="portlet-body">
            <div class="tab-content">
              <div class="tab-pane" id="portlet_tab1">
                
                
                

                <h3>Políticas del festival</h3>  


                      <p class='politicas-p'>
                         
                      </p>
                      <div class="form-group">
                          <textarea id='politicas-evento' placeholder ='' rows="6" class="form-control"></textarea>
                      </div>  



                
              </div>
              <div class="tab-pane" id="portlet_tab2">
                



                     <h3>Lo permitido en el evento</h3>  



                  <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12'>
                        


                          <p class='permitido-p'>
                               
                            </p>
                            <div class="form-group">
                                <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control"></textarea>
                            </div> 
                            <div class='objetos_permitidos' ></div>

                  
                      
                            <section class="panel">
                              <header class="panel-heading">
                                  Basic Table
                                      <span class="tools pull-right">
                                          <a href="javascript:;" class="fa fa-chevron-down"></a>                      
                                       </span>
                              </header>
                              <div class="panel-body">
                                  <table class="table">
                                      <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>First Name</th>
                                          <th>Last Name</th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody class='objetospermitidosf'>
                                      </tbody>
                                  </table>
                              </div>

                             </section>





                        
                    </div>
                    
                      
                      
              </div>
              <div class="tab-pane" id="portlet_tab3">

                      
                     <h3>Restricciones en el evento</h3>  


                      <p class='restricciones-p'>
                         
                      </p>
                      <div class="form-group">
                          <textarea id='restricciones-evento' placeholder ='' rows="6" class="form-control"></textarea>
                      </div> 



              </div>

   





              <div class="tab-pane active" id="portlet_tab4">
                <h3>  La experiencia</h3>                
                      <p class='descripcion-p'>
                          
                      </p>
                      <div class="form-group">
                          <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control"></textarea>
                      </div> 
                      <button class='btn btn-info' id='generos_musicales_button'>Géneros musicales</button>
                      <div class='generos_musicales_div'>
                      <?=$list_generos;?>
                      </div>




                



              </div>



            </div>            
          </div>
        </div>
        <!-- END Portlet PORTLET-->
      </div>













                            <div class="text-center"><a href="#"></a></div>
                        </div>
                    </div>
</div>









                                      
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







<script type="text/javascript">
  $(document).ready(function(){
    
      Dropzone.autoDiscover = false;
      var myDropzone = new Dropzone("#event-img");


  });
</script>

<link href="<?=base_url('application/js/js/dropzone/css/dropzone.css')?>" rel="stylesheet"/>
<!--dropzone-->
<script src="<?=base_url('application/js/js/dropzone/dropzone.js')?>"></script>






                                                  <form action="<?=$carpeta_evento_img?>" class="dropzone" id="event-img">
                                                    <input id="file_input" type="file" name="file">                                                                                                          
                                                  </form>
                                                   
                                               
      
                                         <div class='dropzone-previews'></div>       
            
                                            
                                             





                                    </div>





                                </div>
                            </div>
                        </div>
                    </div>

                  <div class='row'  id="mapgooglemap">
                    <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12'>
<input id="pac-input" class="controls ubicacioninput" type="text" placeholder="Ubicación">
<div id="mapsection">
  <div id="map-canvas"></div>
  <div class='textnotfound-location'></div>  
</div> 
</div>

                  </div>

                </div>





<!--Inicia section tres -->
                    <div class="col-md-4 section-enid-events-left">
                       <!--Accesos button-->    
                      <div class="panel" >
                        <button id="accesos-button" data-toggle="modal" data-target="#accesosmodal" class="btn btn-info col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " ><strong> <i class="fa fa-credit-card"></i>  ACCESOS AL EVENTO </strong></button>
                      </div> <br>

                      <!--Termina acceso button-->

                      <!--Servicios button-->    
                      <div class="panel" >
                        <button id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="btn btn-info col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " ><strong> <i class="fa fa-cutlery"></i> SERVICIOS INCLUIDOS </strong></button>
                      </div> <br>
                      <!--Termina servicios button-->

                      <!--Servicios button-->    
                      <div class="panel">
                        <button id="social-button" class="btn btn-info col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
                          <strong> <i class="fa fa-flag"></i> SOCIAL </strong>
                        </button>
                          <div class='social-media-event col-xs-12  col-sm-12 col-md-12 col-lg-12'>
                                    <form class="form-horizontal" id='form-social' role="form">                                     
                                                
                                                <input type="hidden" name="evento_social" id="evento_social" value="<?=$evento;?>">
                                                
                                                <div class="input-group margin-bottom-sm">
                                                  <span class="input-group-addon"><i class="fa fa-facebook "></i> </span>
                                                  <input class="form-control" name='url_social_evento' type="text" id="url_social" placeholder="La url de tu evento en Facebook" required>
                                                </div>                                       
                                    </form>
                                     <form class="form-horizontal" id='form-social-youtube'> 
                                                <input type="hidden" name="evento_social_y" id="evento_social_y" value="<?=$evento;?>">                                    
                                                <div class="input-group">
                                                  <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                                                  <input class="form-control" name='url_social_evento_youtube' type="text" id="url_social_evento_youtube" placeholder="La url de tu canal en youtube" required>
                                                </div>         
                                     </form>           
                          </div>                                                             
                      </div> 




                      <!--Termina servicios button-->




                      <!--Temática ******************************************** Temática **************+-->
                        <div class="panel" >
                        <button id="tematica-button" class="btn btn-info col-xs-12  col-sm-12 col-md-12 col-lg-12 tematica-button" style="text-align: left; padding: 10px!important; " >
                          <strong> <i class="fa fa-tree"></i> TEMÁTICA </strong>
                        </button>
                          

                          <div class='tematica_section col-xs-12  col-sm-12 col-md-12 col-lg-12' id="tematica_section"> 
                                    <form class="form-horizontal" id='form-tematica'> 
                                                <input type="hidden" name="id_evento_tematica" id="id_evento_tematica" value="<?=$evento;?>">                                    
                                                <div class="input-group">
                                                  <span class="input-group-addon"><i class="fa fa-tree"></i></span>
                                                  <select class="form-control m-bot15" id="tematica_select" name="tematica_select">
                                                      
                                                  </select>
                                                </div>         
                                     </form> 
                          </div>                                                            
                      </div> <br><br>
                      <!--end Temática ******************************************** End Temática **************+-->




             











                      <!--Localcion button-->    
                      <div class="panel" >
                        <a href="#mapgooglemap"><button class="btn btn-info col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
                          <strong> <i class="fa fa-map-marker"></i> LOCACIÓN</strong></button></a>
                      </div> <br><br><br>

                      <!--Termina localcion button-->











                        <div class="panel">
                                <header class="panel-heading" style="background: #032132">
                                  <div class="numero_escenarios" id="numero_escenarios"></div>                                  
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




<div class="col-md-12">
  <!--******************** button pre visualizar ***************************** -->
  <center>
    <a href="<?=base_url('index.php/eventos/previsualizar?evento=')?><?=$evento;?>">
    <button class="btn btn-primary btn-lg" type="button"> Siguiente </button>
    </a>
  </center>  
  <!--******************** button pre visualizar ***************************** -->
</div>


  






















<div id="modalesenariosedit"  class="modal fade bs-example-modal-lg" tabindex="-1"
 role="dialog" aria-labelledby="myLargeModalLabel">  
    <div class="modal-dialog modal-lg">

     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
        <h3 class='nombre-escenario-modal'></h3>
        <input type="text" data-trigger="click" class="form-control popovers nombre-escenario-input-modal" id='nombre-escenario-input-modal' placeholder="Escenario">
      </div>

         
    <form id="updateescenariomodal-form">
          <input type='hidden' id="idescenarioupdatemodal" name="idescenarioupdatemodal"  class="idescenarioupdatemodal" >
      </form>
      

     <div class="modal-body">        
        
  
       
        
              
<div class='row'>
                    
            <div class='descripcion-modal-text col-xs-12  col-sm-12 col-md-12 col-lg-12 ' >
              + agregar descripción del escenario
            </div>
                    
            <div class="form-group">
                <textarea class='descripcion-in-modal-escenario col-xs-12  col-sm-12 col-md-12 col-lg-12 ' ></textarea>
            </div> 
</div>                      
<div class='row'>
           <div class='col-xs-12  col-sm-6 col-md-6 col-lg-6 '>

                <button class="btn btn-info  col-xs-12 day_escenario_button" type="button" > 
                  <span class='day_escenario'></span>
                </button>
                
                <button class="btn btn-info  col-xs-12 day_escenario_inputs" type="button">            
                    <div class="input-group  custom-date-range" data-date="" data-date-format="mm/dd/yyyy">
                        <input class="form-control dpd1" name="nuevo_inicio_escenario" id="nuevo_inicio_escenario" type="text">
                        <span class="input-group-addon">hasta</span>
                        <input class="form-control dpd2" name="nuevo_termino_escenario" id="nuevo_termino_escenario" type="text">
                    </div>
                </button>  
           </div> 

         <!--**************** **********************  ******************* -->
        <div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
                                  <div class="input-group">
                                        <div class="input-group-btn">
                                            
                                            <button tabindex="-1" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                                                Tipo<span class="caret"></span>
                                            </button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li ><a class='tipo-evento-modal' id='General' href="#">General</a></li>
                                                <li ><a class='tipo-evento-modal' id='Principal' href="#">Principal</a></li>
                                                <li ><a class='tipo-evento-modal' id='Especial' href="#">Especial</a></li>                                                                              
                                            </ul>
                                        </div>
                                        <input type="text"  class="form-control input_tipo" >
                                    </div>
        </div>  
</div>        


        <!--**************** **********************  ******************* -->
        <!--**************** **********************  ******************* -->         
<div class='row'>        
         <div class="col-md-12">
                  <div class="panel">
                        <header class="panel-heading">
                            <span style='color:black '><i class="fa fa-play"></i> Artistas</span>
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
          <!--**************** **********************  ******************* -->
            



      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
         
        SC.get('/tracks', { q: Stringentrante }, function(tracks) {                        
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
 



























<div id="horarioartista" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Establecer horario en que se presentará el artista</h4>
      </div>
  <!-- dialog body -->
  <div class="modal-body">    

            <?=generatehorarioartista("hiartista" , "htartista" );?>
               <button type="button" class="btn btn-default" id="tregistrohorario" data-dismiss="modal">Guardar</button>                
          
  </div>
  <div class="modal-footer">               
    
  </div>

</div>
</div>
</div>









































<!--Accesos modal-->
<div id="accesosmodal" class="modal fade">

<div class="modal-dialog modal-lg">

<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Acceso al evento</h4>
      </div>



  <!-- dialog body -->
  <div class="modal-body">    
    
    <!--inicia  modal body-->       
      <div class='row'>
                <table class="table table-bordered table-invoice">
                    <thead>
                    <tr>
                        <th><i class="fa fa-list-ol"></i></th>
                        <th><i class="fa fa-star"></i> Acceso</th>
                        <th class="text-center"><i class="fa fa-credit-card"></i> Precio</th>
                        <th class="text-center"><i class="fa fa-calendar-o"></i> Periodo</th>
                        <th class="text-center"></th>
                    </tr>
                    </thead>
                    <tbody class='list-accesos-modal'>
                   
                    
                    </tbody>
                </table>

      </div>          
      <div class='row'>
                <table class="table">
                  <form class='form-accesos-modal' id="form-accesos-modal">
                    <input type="hidden" value="<?=$evento;?>" id="evaccesos"  class='evaccesos' name='evaccesos'>
                   
                    <tr>
                      <td class='text-center'>Tipo</td>
                      <td class='text-center'>Precio</td>
                      <td class='text-center'>Periodo</td>

                    </tr>
                   <tr>
                        
                        <td>
                            
                            <select class='form-control data-option-accesos' name='acceso-tipo-modal'> 

                            </select>
                               

                            

                        </td>  
                        <td>

                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" name='precio-acceso-modal' class="form-control">
                                <span class="input-group-addon ">.00</span>
                            </div>


                        </td>

                        
      



                        <td>
                                <div class="input-group  custom-date-range" data-date="" data-date-format="mm/dd/yyyy">
                                    <input class="form-control dpd1" name="nuevo_inicio_acceso" id="nuevo_inicio_acceso" type="text">
                                    <span class="input-group-addon"></span>
                                    <input class="form-control dpd2" name="nuevo_termino_acceso" id="nuevo_termino_acceso" type="text">
                              </div>  

                        </td>

                        <td>
                                        <button style="background:black !important" class="btn btn-primary pull-right" type="submit" id="nuevo-acceso">
                                          <i class="fa fa-plus"></i>
                                        </button>

                        </td>
                        
                    </tr>

                    </form>
                </table>  
      </div>          

    <!--Termina modal body-->       
  </div>
   <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>

</div>
</div>
</div>
<!--Termina accesos modal-->



















<!--************************************************************-->





<div id="confirmationdeleteacceso" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar</h4>
      </div>
  <!-- dialog body -->
  <div class="modal-body">  
           <div class="modal-footer">
                Realmente decea quitar de la lista el acceso??
                <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                
            </div>
  </div>
</div>
</div>
</div>






<!--serviciosmodal start -->









<div id="serviciosmodal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Servicios que incluira en evento</h4>
              </div>

              <!-- dialog body -->
              <div class="modal-body">    
                
                <div class='row'>
                  <div class='panel'>

                    <input type="hidden" value="<?=$evento;?>" id="eventoservicios"  class='eventoservicios' name='eventoservicios'>
                    <div class='servicios-evento-modal'></div>                            
                  </div>
                </div>  
                
              </div>

               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              </div>

            </div>
        </div>
</div>


<!--serviciosmodal end  -->














































