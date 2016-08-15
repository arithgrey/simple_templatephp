<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/generosmusicales.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/servicios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/objetospermitidos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/img.js')?>"></script>
<!--TERMINA SECCIÓN 4 ************************************************************ -->
<div class="col-lg-8 col-md-8 col-sm-12 section-enid-events-r ">    

  <div  id='slogan_seccion' class="form-group alert alert-info slogan_seccion " title='Lema del evento'>                            
    <i class="fa fa-flag">
    </i> Eslogan:                                                                                                   
    <span class='eslogan-p'>
      <?=show_text_input($data_evento["eslogan"] , 5 , "+ Eslogan del evento " )?>
    </span>
    <input value="<?=$data_evento['eslogan']?>"class="form-control eslogan-evento" id="eslogan-evento" name='eslogan-evento'  placeholder="Si es en méxico, estará lleno de colores" required>
  </div>
  <div class='place_eslogan_evento'>
  </div> 

  <?=$this->load->view('eventos/slider_admin')?>
    <!--Inicia panel body ******************************-->
          
          <div class='row'>
            <div class="panel-body">
                      <div class="panel">                  
                        <header class="panel-heading ">                            
                          <span class="tools pull-right ">
                            <a  class="fa fa-caret-down ">
                            </a>                                
                          </span>
                        </header>
                        <div class="panel-body">
                            <h1>
                              <strong>
                                Configuración
                              </strong>
                            </h1>
                            <div class='place_configuracion'>
                            </div>

                            <div class='text-fecha-evento'data-toggle="modal" data-target="#edith_fecha_modal" id="config_data_evento" >
                               Fecha del evento  <?= get_date_event_format($data_evento["fecha_inicio"] , $data_evento["fecha_termino"]); ?> 
                            </div> 
                            <section class='links_modal'>
                              <a id='tipificacion-evento' data-toggle="modal" data-target="#tipo-evento"  class='link_modal'>
                                <?=$data_evento['tipo']?>
                              </a>
                              <a href ="<?=base_url('index.php/accesos/configuracionavanzada/1/')?>/<?=$data_evento["idevento"]?>"  class='link_modal' >              
                                <i class="fa fa-credit-card">
                                </i> 
                                Accesos al evento y puntos de venta         
                              </a>
                              <a id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="accesos-button link_modal ">           
                                  <i class="fa fa-cutlery">
                                  </i>                                  
                                  Servicios incluidos 
                              </a>
                              <a title='Las redes sociales del evento'   class="section-left link_modal"  data-toggle="modal" data-target="#modal_social_evento" >                
                                  <i class="fa fa-flag">
                                  </i> 
                                  Social                 
                              </a>                                                                                                  
                              <a id="tematica-button" class="section-left  link_modal "  data-toggle="modal" data-target="#modal_tematica_evento"   >              
                                  <i class="fa fa-tree">
                                  </i> 
                                  Temática              
                              </a>
                            </section>
                            <br>                  
                            <ul class="nav nav-tabs menu_contenidos_enid">                                  
                              <li class='generos_musicales_contente tab_generos' id='generos_musicales_contente'>
                                <a href="#portlet_tab5" data-toggle="tab" >
                                  <i class='fa fa-play'>
                                  </i>
                                          Géneros
                                </a>                                      
                              </li>
                              <li class="restricciones_section_content tab_restricciones">
                                <a href="#portlet_tab3" data-toggle="tab">
                                  <i class="fa fa-exclamation-triangle">
                                  </i> Restricciones
                                </a>
                              </li>
                              <li class='permitidonow tab_permitido' title='Lo que el cliente podrá acceder al evento'>
                                <a href="#portlet_tab2" data-toggle="tab">
                                  <i class="fa fa-check permitidonow" >
                                  </i>
                                  Lo permitido 
                                </a>
                              </li>
                              <li class="politicas_section_content tab_politicas ">
                                <a href="#portlet_tab1" data-toggle="tab">
                                  <i class="fa fa-circle">
                                  </i>
                                  Políticas 
                                </a>
                              </li>                    
                              <li class="active tab_evento">
                                <a href="#portlet_tab4" data-toggle="tab" >
                                  Evento 
                                </a>
                              </li>          
                              <li>
                              <a href="<?=base_url('/index.php/eventos/diaevento/')?>/<?=$data_evento['idevento']?>#seccionobjs">
                                  <i class='fa  fa-arrow-circle-o-right'> 
                                  </i>
                                  Ver como el público
                                </a>
                              </li>          
                            </ul>
                            <!---Inicia  Descripciones dle evento  *************************************-->
                            <div class="tab-content">
                              <div class="tab-pane tab_generos" id="portlet_tab5">                                                                                                               
                                <div class='generos-registrados-evento' id='generos-registrados-evento'>
                                </div>
                                <div class='place_generos_musicales'>
                                </div>                              
                                <hr>                                
                                <div class="input-group">                                      
                                  <div class="input-group-addon"> 
                                    <i class='fa fa-search'>
                                    </i>                                        
                                  </div>
                                  <input placeholder="Genero musical"  id="genero-busqueda" class="genero-busqueda form-control" >                            
                                </div>                                    
                                <div class='seccion_generos_musicales_busqueda'>                              
                                </div>                               
                                <div class='place_generos_musicales_busqueda'>
                                </div>     
                              </div>
                              <!--Politicas tab-->
                              <div class="tab-pane tab_politicas" id="portlet_tab1">            
                                <h2>
                                  Políticas del festival
                                </h2>                                                            
                                <span class='politicas-p' id='politicas-p'>
                                  <?=show_text_input($data_evento["politicas"] , 250 , "+ Lo que podría anticiparse " )?>
                                </span>                              
                                <div class="form-group">
                                  <textarea id='politicas-evento' placeholder ='' rows="6" class="form-control" >                                  
                                    <?=trim($data_evento["politicas"])?>  
                                  </textarea>
                                </div>                            
                                <div class='place_politicas_evento'>
                                </div>
                                <button  data-toggle="modal" data-target="#templa-politicas"   class='btn btn-template politicas_btn_templ'>
                                  <i class='fa fa-sticky-note'>
                                  </i>+ agregar
                                </button>
                                <div class='place_politicas_tmp'>
                                </div>
                                <div class="list_politicas_evento" id="list_politicas_evento"> 
                                </div>
                              </div>                            
                              <!--Politicas Tab Termina -->                            
                              <div class="tab-pane tab_permitido" id="portlet_tab2">                              
                                <h2>
                                  Lo permitido
                                </h2>
                                <div class='row'>
                                  <div class='col-lg-12 col-md-12 col-sm-12'>
                                    <span class='permitido-p' id='permitido-p'>
                                      <?=show_text_input($data_evento["permitido"] , 250 , " + Lo que se permite en el evento" )?>                         
                                    </span>                                
                                  </div>
                                </div>
                                
                                <div class='row'>
                                  <div class='col-lg-12 col-md-12 col-sm-12'>
                                    <a title='Click para agregar' class='url_templates' href='<?=base_url('index.php/templates/eventos/objs')?>'>                
                                        Cargar más articulos para ser empleados en los eventos
                                    </a>
                                  </div>
                                </div>
                                <button title='Lista de objetos permitidos' class='btn  btn-template articulos-permitidos-button' id='articulos-permitidos-button-d'>
                                  <i class="fa fa-chevron-down">
                                  </i> Articulos permitidos
                                </button>                              
                                <button title='Lista de objetos permitidos' class='btn  btn-template articulos-permitidos-button' id='articulos-permitidos-button-u' style='display:none;'>
                                  <i class="fa fa-chevron-up">
                                  </i>
                                  Articulos permitidos
                                </button>                      
                                <div class='separate-enid'>
                                </div>
                                <div class='row' id='section-articulos-permitidos'>   
                                  <div class='col-lg-12 col-md-12  col-sm-12'>
                                    <div class='obj_permitidos'> 
                                    </div>  
                                    <div class='place_obj_permitidos'>
                                    </div>                                  
                                  </div>
                                </div>

                               <!--Termina la lista de objetos permitidos -->    
                                
                                <div class="form-group">
                                  <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control">
                                    <?=$data_evento["permitido"];?>
                                  </textarea>
                                </div>                                                           
                                <div class='place_permitido'>
                                </div>
                              </div>
                              <!--Termina lo permitido  Tab-->                        
                              <!--Inicia las restricciones -->
                              <div class="tab-pane tab_restricciones" id="portlet_tab3">                      
                                <h2>
                                  Restricciones en el evento
                                </h2>                                
                                <div class='restricciones-p' id='restricciones-p'>
                                  <?=show_text_input($data_evento["restricciones"] , 25 , " + Lo que no se permite " )?>      
                                </div>                             
                                <div class="form-group">
                                  <textarea id='restricciones-evento' placeholder ='' rows="6" class="form-control">
                                    <?=$data_evento["restricciones"];?>
                                  </textarea>
                                </div>
                                <div class='place_restricciones'>
                                </div>
                                <button  data-toggle="modal" data-target="#templa-restricciones"   class='btn btn-template restricciones_btn_templ'>
                                  <i class='fa fa-sticky-note'>
                                  </i>+ agregar
                                </button>                              
                                <div class='place_restricciones_tmp'>
                                </div>                                                        
                                <div class='restricciones-evento-list' id='restricciones-evento-list'>
                                  <div class="list_restricciones_evento" id="list_restricciones_evento">
                                  </div>
                                </div>
                              </div>
                              <!--Termina las  restricciones -->
                              <!-- Inicia la experiencia -->                            
                              <div class="tab-pane tab_evento  active" id="portlet_tab4">
                                <h2>
                                  La experiencia 
                                </h2>                                                                
                                                           
                                <h4>
                                  <i class="fa fa-file-text">
                                  </i>  Descripción del evento
                                </h4>                              
                                <!--Terminan los alert -->
                                <span class='descripcion-p'>
                                  <?=show_text_input($data_evento["descripcion_evento"] , 250 , " + Lo que que el público  vivirá" )?>
                                </span>                              
                                <div class="form-group">
                                <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control">
                                  <?=$data_evento["descripcion_evento"];?>                                    
                                </textarea>
                                </div>   
                                <div class='place_descripcion_evento'  id='place_descripcion_evento'>
                                </div>                                                                          
                                <button class='btn  btn-template experiencia_btn_templ' title='Éstas agilizan la redacción de la experiencia que vivirá el cliente en cada evento'  data-toggle="modal" data-target="#templa-descripcion-contenido" >
                                  <i class='fa fa-file-text-o'>
                                  </i> Usar plantilla
                                </button>
                                <div class='place_experiencia_evento'>
                                </div>                            
                              </div>
                              <!-- Termina  la experiencia --> 
                            </div>
                            <!---Inicia  Descripciones dle evento  *************************************-->            
                        </div><!--- Termina panel body  -->
                      </div><!--- Termina panel   -->
            </div><!--- Termina panel body  -->
          </div>



          <!--Termina la seccion general del eveto -->
        </div><!--Termina el panel -->                      
  
              <!--Configuración escenarios -->      

              <div class='col-lg-4  col-md-4 col-sm-12 seccion_derecha_enid' >  
                <div class='separate-enid'>
                </div>
                <h1 class='nombre-evento-h1' title='click para editar'>
                  <strong style='color:white !important;'>
                    <?=show_text_input($data_evento['nombre_evento'] , 2 , "Evento" )?>      
                  </strong>
                </h1>
                <div class='place_nombre_evento'>
                </div>
                <a  class='link_ver_evento' href="<?=base_url('index.php/eventos/visualizar/')?>/<?=$data_evento['idevento']?>">
                  <i class='fa fa-arrow-circle-o-right'> 
                  </i>
                  Ver como el público 
                </a>
                <div class="form-group nombre" >
                  <input placeholder="Nombre del evento" class="form-control input-sm"  type="text" value="<?=$data_evento['nombre_evento'];?>"  id="nombre-input" name='nombre-input' >
                </div>  
                <span class="designation edicion-evento" title='click para editar'>  
                  <?=show_text_input($data_evento['edicion'] , 2 , "<i class='fa fa-plus'></i>  Edición del evento" )?>           
                </span>              
                <div class="form-group">
                  <input placeholder="Edición del evento" class="form-control input-sm"  type="text" id="edicion-input" name='edicion-input' value="<?=$data_evento['edicion'];?>">
                </div> 
                  <div class='place_edicion_evento'>
                  </div>                    
                <div class='section_escenarios_admin'>
                </div>
                <div class='row'>
                  <div class='place_nuevo_escenario'>
                  </div>
                </div>
              </div>
              <!--Termina configuración escenarios -->      
              <!--Inicia la seccion del google maps para el evento-->              
              



  <div class='col-lg-12 col-md-12 col-sm-12' id="mapgooglemap">          
    <div>
      <h1 class='titulo_maps'>
        <strong class='titulo_maps'>
          Locación del evento
        </strong>
      </h1>   
      <div class='ui-widget' id='ui-widget'>
        <input list='locaciones'  id="locacion" class="locacion controls ubicacioninput form-control input-sm" type="text" placeholder="Ubicación del evento" value="<?=$data_evento['ubicacion']?>">
        <div class='list-locaciones'>
        </div>
      </div>     
      <div class='place_ubicacion' id='place_ubicacion'>
      </div>

      <div id="mapsection">
        <div id="map-canvas">
        </div>
        <div class='textnotfound-location'>
        </div>  
      </div> 
      <div class='mapaevento' id='mapaevento'>
      </div>
    </div>
  </div>

<!--Cargamos modals de configuracion -->
<?=$this->load->view("eventos/modal/principal_eventos_admin")?>
<!--Terminamos de cargamos modals de configuracion -->
<!--pickers css-->
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">-->
<input type='hidden' class='qparam' value="<?=$q?>">    
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
<form id='form-general-ev'>        
    <input type="hidden" value="<?=$evento;?>" id="evento" name='evento'>
    <input type="hidden" value="<?=$data_evento['nombre_evento']?>" id='nombre_evento_val'>    
    <input type='hidden' value="<?=$data_evento['eslogan']?>" class='eslogan'>
</form>        
<style type="text/css">
#img-button-more-imgs{
  font-size: 1.5em;
  font-weight: bold;
}
</style>