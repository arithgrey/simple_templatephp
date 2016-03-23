<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/generosmusicales.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/escenarios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/servicios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/objetospermitidos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/tematica.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/img.js')?>"></script>
<form id='form-general-ev'>        
    <input type="hidden" value="<?=$evento;?>" id="evento" name='evento'>
</form>        
<!--INICIA SECCIÓN DE 4****************************************************** -->
<div class="col-lg-4  col-md-4 col-sm-4">            
<div class="panel">
  <div class="panel-body">
    <h1  class='nombre-evento-h1' style='font-size:3.7em;'>
      <strong>
        <?=$data_evento['nombre_evento'];?>
      </strong>
    </h1>
    <div class="form-group nombre" >
      <input placeholder="Nombre del evento" class="form-control"  type="text" value="<?=$data_evento['nombre_evento'];?>"  id="nombre-input" name='nombre-input' >
    </div>
    <span class="designation edicion-evento" style='font-size:2em;'>
      <?=valida_text_replace($data_evento['edicion'] , "<i class='fa fa-plus'></i> Edicioón del evento" , "<i class='fa fa-plus'></i> Edición del evento" );?>
    </span>              
    <div class="form-group">
      <input placeholder="Edición del evento" class="form-control"  type="text" id="edicion-input" name='edicion-input' value="<?=$data_evento['edicion'];?>">
    </div>

    <div class="profile-desk" style='background:red;'> 
   
    <div class="panel">
  <div class="panel-body">
      <div class="profile-desk">
        <!--***************LO QUE PERTENECE A ESCENARIOS -->
          <h1>            
            <div class="numero_escenarios" id="numero_escenarios">
            </div>                                                                   
          </h1>
          <span class="designation">
            <span>
              Artistas 
            </span>
            <?=$resumen_evento["artistas"];?>                                  
           
          </span>
          <div id="list_escenarios">
          </div>

          <form id="form-escenario" method="POST">
            <h1 style='font-size: .9em!important;'> 
              <i class="fa fa-plus">
              </i> 
              Cargar Escenario
            </h1>  
            <div class="form-group todo-entry">
              <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">
              <input placeholder="Añadir escenario" class="form-control nuevo-escenario-input" style="width: 100%" type="text" id='nuevo-escenario-input' name='nuevoescenario'  required>
            </div>
            <button style="background:black !important" class="btn btn-primary pull-right" type="submit" id="nuevo-escenario">
              <i class="fa fa-plus">
              </i>
            </button>
          </form>
            <div class='row'>
            <div class='panel  alert-ok' id="alert-escenario-ok"> 
              <em>
                Escenario cargado correctamente 
              </em>
            </div>
            <div class='panel alert-fail' id="alert-escenario-fail">
              <em>
                Falla al registrar escenario 
              </em>
            </div>
          </div>    
          <!--******************TERMINA LO QUE PERTENECE A ESCENARIOS -->

      </div>
  </div>
</div>
  

  
      </div>
  </div>
</div>













          
            
            
            
          
            
                                     
        






































        
        
        <!--Termina servicios button-->
        
</div>
<!--TERMINA SECCIÓN 4 ************************************************************ -->
<div class="col-md-8 section-enid-events-r ">    
    <!--Inicia el row donde se cargan imagens y se edita el nombre y demás detalles -->
        <div class="panel" >          
          <!--Inicia panel body ****************************** -->
          <div class="panel-body panel-body-enid" > 
              <div class='panel'>
                  <div class='panel-body'>                      
                      <div class="center-block">              
                              <div class='section-ev'>
                                  <?=$slider_principal_evento;?>                                
                              </div>                    
                              <div class='row'>
                                  <strong title='Cargar imagenes del evento' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-evento-section"  >
                                    <i class="fa fa-plus-circle fa-5x"></i>                                                              
                                  </strong>
                              </div>
                          <input type='hidden' name='action' value="carga-imgenes-escenario">                    
                      </div>                    
                  </div>
              </div>  
          </div>
          <!--Termina panel body ******************************-->







          <!--Inicia panel body ******************************-->
          <div class="panel-body">
                    <div class="panel">                  
                      <header class="panel-heading ">                            
                        <span class="tools pull-right">
                          <a href="javascript:;" class="fa fa-caret-down"></a>                                
                        </span>
                      </header>
                      <div class="panel-body"><!--- Inicia panel body  -->
                          <!--- Menu text evento  -->
                          <h1>
                              Configuración
                          </h1>                                    
                          <div class='text-fecha-evento designation'data-toggle="modal" data-target="#edith_fecha_modal"  >
                            Fecha del evento 
                            <?=$fecha_evento; ?> 
                          </div>                                    
                          <a id='tipificacion-evento' data-toggle="modal" data-target="#tipo-evento" style="font-size:.9em; text-align:center;">
                            <?=$data_evento['tipo']?>
                          </a>
                          <a href ="<?=base_url('index.php/accesos/configuracionavanzada/1/')?>/<?=$data_evento["idevento"]?>"  style="font-size:.9em; text-align:center;"   >              
                              <i class="fa fa-credit-card">
                              </i> 
                              Accesos al evento y puntos de venta         
                          </a>
                          <a id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="accesos-button" style="font-size:.9em; text-align:center;">           
                              <i class="fa fa-cutlery">
                              </i>  
                              <?=$resumen_evento["servicios"]?>  
                              Servicios incluidos           
                          </a>
                          
                            <!--Inicia la configuración general -->                                                                                
                            <!--Social media  button-->            
                            <a title='Las redes sociales del evento'  id="social-button" class="section-left accesos-button" style="font-size:.9em; text-align:center;">                
                                  <i class="fa fa-flag"></i> 
                                  Social                 
                            </a>            
                            <div class='social-media-event'>
                              <div class='row'>
                                <form class="form-horizontal" id='form-social' method='' action="<?=base_url('index.php/api/event/urlbyid/format/json/');?>" role="form">                                     
                                  <input type="hidden" name="evento_social" id="evento_social" value="<?=$evento;?>">
                                  <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon">
                                      <i class="fa fa-facebook ">
                                      </i> 
                                    </span>                    
                                    <input class="form-control" name='url_social_evento' type="text" id="url_social" placeholder="La url de tu evento en Facebook"  value="<?=$data_evento['url_social']?>" required>
                                  </div>                                                                                       
                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-youtube-play"></i>
                                    </span>
                                    <input class="form-control" name='url_social_evento_youtube' type="text" id="url_social_evento_youtube" placeholder="La url de tu canal en youtube"  value="<?=$data_evento['url_social_youtube']?>" required>
                                  </div>         
                                </form>           
                              </div>  
                            </div>                                 
                              <!--Social media  termina -->        

                  
                  <!--Temática ******************************************** Temática **************+-->      
                          <a id="tematica-button" class="btn section-left  tematica-button" style="font-size:.9em; text-align:center;"   >              
                              <i class="fa fa-tree">
                              </i> 
                              Temática              
                          </a>
                          <div class='tematica_section ' id="tematica_section">               
                              <form class="form-horizontal" id='form-tematica'> 
                                  <input type="hidden" name="id_evento_tematica" id="id_evento_tematica" value="<?=$evento;?>">                                    
                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-tree">
                                      </i>
                                    </span>
                                    <select class="form-control m-bot15" id="tematica_select" name="tematica_select"></select>
                                  </div>         
                              </form>               
                          </div>            
                  <!--end Temática ******************************************** End Temática **************+-->






                          <ul class="nav nav-tabs">
                                    
                                    <li class='generos_musicales_contente'>
                                      <a href="#portlet_tab5" data-toggle="tab" >
                                        <i class='fa fa-play'>
                                        </i>
                                        Géneros
                                      </a>                                      
                                    </li>
                                    <li class="restricciones_section_content">
                                      <a href="#portlet_tab3" data-toggle="tab">
                                        <i class="fa fa-exclamation-triangle">
                                        </i> Lo prohibido 
                                      </a>
                                    </li>
                                    <li class='permitidonow' title='Lo que el cliente podrá acceder al evento'>
                                      <a href="#portlet_tab2" data-toggle="tab">
                                        <i class="fa fa-check permitidonow" >
                                        </i>
                                        Lo permitido 
                                      </a>
                                    </li>
                                    <li class="politicas_section_content">
                                      <a href="#portlet_tab1" data-toggle="tab">
                                        <i class="fa fa-circle">
                                        </i>
                                        Políticas 
                                      </a>
                                    </li>                    
                                    <li class="active">
                                      <a href="#portlet_tab4" data-toggle="tab" >
                                        Evento 
                                      </a>
                                    </li>          
                                    <li class="">

                                      <a href="<?=base_url('/index.php/eventos/diaevento/')?>/<?=$data_evento['idevento']?>">
                                        <i class='fa  fa-arrow-circle-o-right'> </i>
                                        Ver como el público

                                      </a>
                                    </li>          
                          </ul>
                          <!---Inicia  Descripciones dle evento  *************************************-->
                          <div class="tab-content">
                            <div class="tab-pane" id="portlet_tab5">            
                                  <h2>
                                    Géneros musicales 
                                    <span class='numero-generos-musicales'>
                                      <?=$resumen_evento["generos_musicales"]?>  
                                    </span>
                                  </h2>                                                                                                    
                                    <div class="input-group">
                                      <div class="input-group-addon"> 
                                        Género musical 
                                      </div>
                                      <input   placeholder="Genero musical"  id="genero-busqueda" class="genero-busqueda form-control" >                            
                                    </div>                                    
                                    <div class='generos_musicales_div'>                              
                                    </div>                                    
                            </div>


                            <!--Politicas tab-->
                            <div class="tab-pane" id="portlet_tab1">            
                              <h2>
                                Políticas del festival
                              </h2>  

                              <div class='panel  alert-ok-sm' id='alert-politicas-ok'>
                              <em>
                                Datos actualizados
                              </em>
                              </div>
                              <div class='panel alert-fail-sm' id='alert-politicas-fail'>
                                <em>
                                  Falla al actualizar 
                                </em>
                              </div> 

                              
                              <?=valida_text_replace($data_evento["politicas"] ,  "<i class='fa fa-plus'></i> Lo que podría anticiparse como reembolsos o cambios" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse como reembolsos o cambios" , "politicas-p");?>
                              
                              <div class="form-group">
                                <textarea id='politicas-evento' placeholder ='' rows="6" class="form-control" >
                                  <?=$data_evento["politicas"];?>
                                </textarea>
                              </div>                            
                              <button  data-toggle="modal" data-target="#templa-politicas"   class='btn btn-template'>
                                <i class='fa fa-sticky-note'>
                                </i>+ agregar
                              </button>
                                <div class="list_politicas_evento" id="list_politicas_evento"> </div>
                            </div>
                            <!--Politicas Tab Termina -->
                            
                            <div class="tab-pane" id="portlet_tab2"><!--Lo permitido  Tab-->
                              <h2>
                                Lo permitido
                              </h2>

                              <button title='Lista de objetos permitidos' class='btn  btn-template articulos-permitidos-button' id='articulos-permitidos-button-d'>
                                <i class="fa fa-chevron-down">
                                </i> Articulos permitidos
                              </button>

                              <button title='Lista de objetos permitidos' class='btn  btn-template articulos-permitidos-button' id='articulos-permitidos-button-u' style='display:none;'>
                                <i class="fa fa-chevron-up">
                                </i>
                                 Articulos permitidos
                              </button>

                              <div class='row' id='section-articulos-permitidos'>                                                                      
                                    <table class="table">                                  
                                        <tr>
                                            <th>#</th>
                                            <th>Articulo que se permitirá ingresar al evento</th>
                                            <th>
                                              <button class='btn btn-info btn-all-articulos' id="<?=$evento;?>">
                                                  <i class='fa fa-check-square'></i>
                                              </button> 
                                            </th>
                                        </tr>                                    
                                        <tbody class='objetospermitidosf'></tbody>
                                    </table>                                  
                              </div>
                             <!--Termina la lista de objetos permitidos -->    
                              <div class='panel  alert-ok-sm' id='alert-permitido-ok'>
                                <em>
                                  Datos actualizados
                                </em>
                              </div>
                              <div class='panel alert-fail-sm' id='alert-permitido-fail'>
                                <em>
                                  Falla al actualizar 
                                </em>
                              </div>                             
                              <?=valida_text_replace($data_evento["permitido"] , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento" , "permitido-p");?>                              
                              <div class="form-group">
                                  <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control">
                                    <?=$data_evento["permitido"];?>
                                  </textarea>
                              </div>                             
                              <!--Lista de objetos permitidos -->
                            </div><!--Termina lo permitido  Tab-->                        
                            <!--Inicia las restricciones -->
                            <div class="tab-pane" id="portlet_tab3">                      
                              <h2>
                                Restricciones en el evento
                              </h2>  
                              <div class='panel  alert-ok-sm' id='alert-resticciones-ok'>
                                <em>
                                  Datos actualizados
                                </em>
                              </div>
                              <div class='panel alert-fail-sm' id='alert-resticciones-fail'>
                                <em>
                                  Falla al actualizar 
                                </em>
                              </div> 





                              


                             


                              
                              <?=valida_text_replace($data_evento["restricciones"] , "<i class='fa fa-plus'></i> Lo que podría anticiparse dentro del evento" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse dentro del evento" , "restricciones-p");?>
                              
                              <div class="form-group">
                                <textarea id='restricciones-evento' placeholder ='' rows="6" class="form-control">
                                  <?=$data_evento["restricciones"];?>
                                </textarea>
                              </div>
                              
                              <button  data-toggle="modal" data-target="#templa-restricciones"   class='btn btn-template'>
                                <i class='fa fa-sticky-note'>
                                </i>+ agregar
                              </button>
                                                         
                              <div class='restricciones-evento-list' id='restricciones-evento-list'>
                                      <div class="list_restricciones_evento" id="list_restricciones_evento">
                                      </div>
                              </div>
                            </div><!--Termina las  restricciones -->
                            <!-- Inicia la experiencia -->                            
                            <div class="tab-pane active" id="portlet_tab4">
                              <h2>
                                La experiencia 
                              </h2>    
                              <!--Las alertas de registro  -->                          
                              <div class='panel  alert-ok-sm' id='alert-slogan-ok'>
                                <em>
                                  Eslogan actualizado
                                </em>
                              </div>
                              <div class='panel alert-fail-sm' id='alert-slogan-fail'>
                                <em>
                                   Falla al actualizar el eslogan intente nuevamente 
                                </em>
                              </div>                                        
                              <!--Inicia Eslogan del evento-->
                              <div class="form-group alert alert-info" title='Lema del evento'>                            
                                <i class="fa fa-flag">
                                </i> Eslogan:                                 
                                 <?=valida_text_replace($data_evento["eslogan"],  "<i class='fa fa-space-shuttle'></i> Mensaje eslogan del evento" , "<i class='fa fa-space-shuttle'></i>  Eslogan del evento" , "eslogan-p");?>                                 
                                <input class="form-control eslogan-evento" id="eslogan-evento" name='eslogan-evento'  placeholder="Si es en méxico, estará lleno de colores" required>
                              </div>
                              

                                <!--Las alertas  terminan  -->

                              <!--Termina Inicia Eslogan del evento-->
                              <!--Inicia descripcion del evento -->                            
                              <h4>
                                <i class="fa fa-file-text">
                                </i>  Descripción del evento
                              </h4>

                            <div class='panel  alert-ok-sm' id='alert-descripcion-ok'>
                              <em>
                                Datos actualizados
                              </em>
                            </div>
                            <div class='panel alert-fail-sm' id='alert-descripcion-fail'>
                              <em>
                                Falla al actualizar 
                              </em>
                            </div> 















                              <!---->
                              <!--Terminan los alert -->


                              <div class='place '  id='place_description'></div>                    
                        
                              <?=valida_text_replace( $data_evento["descripcion_evento"] , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" , "descripcion-p"  );?>                            
                              
                              <div class="form-group">
                                <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control">
                                  <?=$data_evento["descripcion_evento"];?>                                    
                                </textarea>
                              </div>                             
                                <!--Termina  descripcion del evento -->
                              <button class='btn  btn-template' title='Éstas agilizan la redacción de la experiencia que vivirá el cliente en cada evento'  data-toggle="modal" data-target="#templa-descripcion-contenido" >
                                <i class='fa fa-file-text-o'>
                                </i> Usar plantilla
                              </button>
                              

                            </div><!-- Termina  la experiencia --> 

                          </div><!---Inicia  Descripciones dle evento  *************************************-->            
                      </div><!--- Termina panel body  -->

                    </div><!--- Termina panel   -->
          </div><!--- Termina panel body  -->


          <!--Termina la seccion general del eveto -->
        </div><!--Termina el panel -->                      
      

      <!--Inicia la seccion del google maps para el evento-->
      <div class='row'>
        <h2>
          Locación
        </h2>
        <div class='panel  alert-ok-sm' id='alert-locacion-ok'>
          <em>
          Locación actualizada.!
          </em>
        </div>
        <div class='panel alert-fail-sm' id='alert-locacion-fail'>
          <em>
           Falla al actualizar 
          </em>
        </div> 
      </div>
      <div class='row'  id="mapgooglemap">          
        <input id="pac-input" class="controls ubicacioninput" type="text" placeholder="Ubicación" value="<?=$data_evento['ubicacion']?>">
        <div id="mapsection">
          <div id="map-canvas">
          </div>
          <div class='textnotfound-location'>
          </div>  
        </div> 
      </div>
      <div class='row'>
        <a style='font-size:.8em;'>
              Evento registrado el 
          <?=$data_evento["fecha_registro"]?>
        </a>
      </div>
</div><!--TERMINA LA SECCION DE 8 -->








  <!--Cargamos modals de configuracion -->
  <?=$this->load->view("eventos/modal/principal_eventos_admin")?>
  <!--Terminamos de cargamos modals de configuracion -->
<!--pickers css-->
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-timepicker/css/timepicker.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->
<script type="text/javascript" src="<?=base_url('application/js/evento/gmap.js')?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>




<!---->
<input type='hidden' name='base_path_img' id="base_path_img" class='base_path_img' value='<?=$base_path_img;?>'>
<input type='hidden' name='base_path' id='base_path' class='base_path' value='<?=$base_path;?>'>
























<style type="text/css">
.text-fecha-evento:hover, .nota-
:hover{
  padding: 6px;
  cursor: pointer;
}
.newdescripesenario , #newdescripesenario{
  display: none;
}
.section-left{
  //background: #1C84A7;
  //color: white;
}
#form-accesos-s{
  background: #166781  !important;
  padding: 10px;
}
.title_main{
  display: none;
}
.nota-form-servicio{
  display: none;
}
.alert-ok , .alert-fail , .alert-ok-sm , .alert-fail-sm {
  display: none;
}
.accesos-button:hover{
  cursor: pointer;
}
.section-header-title{
  display: none;
}
</style>




