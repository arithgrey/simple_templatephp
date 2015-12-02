<style type="text/css">
.text-fecha-evento:hover{
  padding: 6px;
  cursor: pointer;
}
.newdescripesenario , #newdescripesenario{
  display: none;
}
.section-left{
  background: #1C84A7;
  color: white;
}
</style>


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

<div class="col-md-8 section-enid-events-r">    
    <!--Inicia el row donde se cargan imagens y se edita el nombre y demás detalles -->
    <div class="row">            
        <div class="panel" >
          <!--*******************HEADER PANEL *************************-->      
          <header class="panel-heading blue-col-enid" >        
            <div class='text-fecha-evento'  href="" data-toggle="modal" data-target="#edith_fecha_modal"  >
              Fecha del evento <?=$fecha_evento; ?> 
            </div>                    
            <button id='tipificacion-evento' class='btn  btn-template' data-toggle="modal" data-target="#tipo-evento" >
              <?=$data_evento['tipo']?>
            </button>
            <span class="tools pull-right">
              <a class="fa  fa-caret-down" href="javascript:;"></a>
            </span>
            <a href="<?=base_url('index.php/eventos/visualizar')?>/<?=$evento;?>" class='pull-right'>
              <button title='Lo que el mundo verá del evento' class="btn btn-primary" type="button">
                Ver como el público  
              </button>    
            </a>
          </header>                          
          <!--*******************HEADER PANEL TERMINA*************************-->      
          <!--Inicia panel body ****************************** -->
          <div class="panel-body" >        
                <h2  class='nombre-evento-h1'>
                  <?=$data_evento['nombre_evento'];?>
                </h2>
                <div class="form-group nombre" >
                  <input placeholder="Registra el nombre del evento" class="form-control"  type="text" value="<?=$data_evento['nombre_evento'];?>"  id="nombre-input" name='nombre-input' >
                </div>

                <span class="designation edicion-evento">
                  <?=valida_text_replace($data_evento['edicion'] , "<i class='fa fa-plus'></i> Edicioón del evento" , "<i class='fa fa-plus'></i> Edicioón del evento" );?>
                </span>              
                <div class="form-group">
                    <input placeholder="Registra qué edición tiene el evento" class="form-control"  type="text" id="edicion-input" name='edicion-input' value="<?=$data_evento['edicion'];?>">
                </div>
                <div class="center-block">              
                        <div class='section-ev'>
                            <?=$slider_principal_evento;?>                                
                        </div>                    
                        <div class='row'>
                            <strong title='Cargar imagenes del evento' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-evento-section"  >
                            <i class="fa fa-plus-circle fa-5x"></i>                            
                            <span style='color:white;'>Cargar Imagenes</span>
                            </strong>
                        </div>
                <input type='hidden' name='action' value="carga-imgenes-escenario">                    
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
                          <ul class="nav nav-tabs">
                                    <li class="restricciones_section_content">
                                      <a href="#portlet_tab3" data-toggle="tab">
                                        <i class="fa fa-exclamation-triangle">
                                        </i>Lo prohibido 
                                      </a>
                                    </li>
                                    <li class='permitidonow' title='Lo que el cliente podrá acceder al evento'>
                                      <a href="#portlet_tab2" data-toggle="tab">
                                        <i class="fa fa-check permitidonow" >
                                        </i>Lo permitido 
                                      </a>
                                    </li>
                                    <li class="politicas_section_content">
                                      <a href="#portlet_tab1" data-toggle="tab">
                                        <i class="fa fa-circle">
                                        </i>Políticas 
                                      </a>
                                    </li>                    
                                    <li class="active">
                                      <a href="#portlet_tab4" data-toggle="tab" >
                                       Evento </a>
                                    </li>          
                          </ul>
                          <!---Inicia  Descripciones dle evento  *************************************-->
                          <div class="tab-content">
                            <!--Politicas tab-->
                            <div class="tab-pane" id="portlet_tab1">            
                              <h2>
                                Políticas del festival
                              </h2>  
                              <p class='politicas-p'>
                                <?=valida_text_replace($data_evento["politicas"] ,  "<i class='fa fa-plus'></i> Lo que podría anticiparse como reembolsos o cambios" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse como reembolsos o cambios" );?>
                              </p>
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
                                Lo permitido en el evento
                              </h2>  
                              <p class='permitido-p'>
                                <?=valida_text_replace($data_evento["permitido"] , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento" );?>
                              </p>                                  
                              <div class="form-group">
                                  <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control">
                                    <?=$data_evento["permitido"];?>
                                  </textarea>
                              </div>                             
                              <!--Lista de objetos permitidos -->
                              <button title='Lista de objetos permitidos' class='btn btn-info articulos-permitidos-button'>
                                <i class='fa fa-caret-down'>
                                </i> Articulos permitidos
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
                            </div><!--Termina lo permitido  Tab-->                        
                            <!--Inicia las restricciones -->
                            <div class="tab-pane" id="portlet_tab3">                      
                              <h2>Restricciones en el evento</h2>  
                              <p class='restricciones-p'>
                                <?=valida_text_replace($data_evento["restricciones"] , "<i class='fa fa-plus'></i> Lo que podría anticiparse dentro del evento" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse dentro del evento" );?>}
                              </p>
                              <div class="form-group">
                                <textarea id='restricciones-evento' placeholder ='' rows="6" class="form-control">
                                  <?=$data_evento["restricciones"];?>
                                </textarea>
                              </div>
                              <h3>
                                Lista de restricciones
                              </h3>
                              <button  data-toggle="modal" data-target="#templa-restricciones"   class='btn btn-template'>
                                <i class='fa fa-sticky-note'>
                                </i>+ agregar
                              </button>
                              <br><br>                            
                              <div class='restricciones-evento-list' id='restricciones-evento-list'>
                                      <div class="list_restricciones_evento" id="list_restricciones_evento">
                                      </div>
                              </div>
                            </div><!--Termina las  restricciones -->
                            <!-- Inicia la experiencia -->                            
                            <div class="tab-pane active" id="portlet_tab4">
                              <h2>La experiencia
                              </h2>                
                              <!--Inicia Eslogan del evento-->
                              <div class="form-group alert alert-info" title='Lema del evento'>                            
                                <i class="fa fa-flag">
                                </i> Eslogan: 
                                    <span class='eslogan-p' id='eslogan-p'> <?=valida_text_replace($data_evento["eslogan"],  "<i class='fa fa-space-shuttle'></i> Mensaje eslogan del evento" , "<i class='fa fa-space-shuttle'></i>  Eslogan del evento" );?> </span>                          
                                    <input class="form-control eslogan-evento" id="eslogan-evento" name='eslogan-evento'  placeholder="Si es en méxico, estará lleno de colores" required>
                              </div><!--Termina Inicia Eslogan del evento-->
                                <!--Inicia descripcion del evento -->                            
                              <h4>
                                <i class="fa fa-file-text">
                                </i>  Descripción del evento
                              </h4>
                              <div class='place place_description' id='place_description'></div>                    
                              <p class='descripcion-p'>
                                <?=valida_text_replace( $data_evento["descripcion_evento"] , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" );?>                            
                              </p>
                              <div class="form-group">
                                <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control">
                                  <?=$data_evento["descripcion_evento"];?>  
                                </textarea>
                              </div>                             
                                <!--Termina  descripcion del evento -->
                              <button class='btn  btn-template' title='Éstas agilizan la redacción de la experiencia que vivirá el cliente en cada evento'  data-toggle="modal" data-target="#templa-descripcion-contenido" >
                                <i class='fa fa-file-text-o'>
                                </i> Plantilla de descripciones
                              </button>
                              <button title='Asociar géneros musicales al evento' class='btn btn-info' id='generos_musicales_button'>
                                <i class='fa fa-caret-down'>
                                </i> <?=$resumen_evento["generos_musicales"]?> Géneros musicales
                              </button>                             
                              <div class="input-group" >
                                <div class="input-group-addon"> 
                                  Género musical 
                                </div>
                                <input   placeholder="Genero musical"  id="genero-busqueda" class="genero-busqueda form-control" type="text">                            
                              </div>
                              <div class='generos_musicales_div'>
                                <?=$list_generos;?>
                              </div>                            
                            </div><!-- Termina  la experiencia --> 

                          </div><!---Inicia  Descripciones dle evento  *************************************-->            
                      </div><!--- Termina panel body  -->

                    </div><!--- Termina panel   -->
          </div><!--- Termina panel body  -->




          <!--Termina la seccion general del eveto -->
        </div><!--Termina el panel -->                      
      </div><!--Termina el Row -->                      

      <!--Inicia la seccion del google maps para el evento-->
      <div class='row'  id="mapgooglemap">                    
        <input id="pac-input" class="controls ubicacioninput" type="text" placeholder="Ubicación" value="<?=$data_evento['ubicacion']?>">
        <div id="mapsection">
          <div id="map-canvas">
          </div>
          <div class='textnotfound-location'>
          </div>  
        </div> 
      </div>
</div><!--TERMINA LA SECCION DE 8 -->



<!--INICIA SECCIÓN DE 4****************************************************** -->
<div class="col-md-4 section-enid-events-left">          
        <div class="panel" ><!--Accesos button-->                
            <button title='Registra el precio de los accesos al evento en sus diferentes etapas'  id="accesos-button" data-toggle="modal" data-target="#accesosmodal" class="btn section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
              <strong> 
                <i class="fa fa-credit-card">
                </i> <?=$resumen_evento["accesos"]?>  ACCESOS AL EVENTO 
              </strong>
              <strong> 
                , <?=$resumen_evento["evento_punto_venta"]?> PUNTOS DE VENTA 
              </strong>
            </button>
        </div><!-- Termina  accesos button-->           
        <!--Servicios button-->    
        <div class="panel" >
            <button  title='Lo que el evento ofrece al cliente' id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="btn section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
              <strong> 
                <i class="fa fa-cutlery">
                </i> <?=$resumen_evento["servicios"]?>  SERVICIOS INCLUIDOS  
              </strong>
            </button>
        </div> 
        <!--Termina servicios button-->
        <!--Social media  button-->    
        <div class="panel">
            <button title='Las redes sociales del evento'  id="social-button" class="btn section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
              <strong> <i class="fa fa-flag"></i> SOCIAL </strong>
            </button>
            
            <div class='social-media-event col-xs-12  col-sm-12 col-md-12 col-lg-12'>
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
        </div><!--Termina social media  button-->
    <!--Temática ******************************************** Temática **************+-->
        <div class="panel" >
            <button id="tematica-button" class="btn section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 tematica-button" style="text-align: left; padding: 10px!important; " >
              <strong> <i class="fa fa-tree"></i> TEMÁTICA </strong>
            </button>            
            <div class='tematica_section col-xs-12  col-sm-12 col-md-12 col-lg-12' id="tematica_section"> 
              <div class='row'>
                <form class="form-horizontal" id='form-tematica'> 
                    <input type="hidden" name="id_evento_tematica" id="id_evento_tematica" value="<?=$evento;?>">                                    
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-tree"></i></span>
                      <select class="form-control m-bot15" id="tematica_select" name="tematica_select"></select>
                    </div>         
                </form> 
              </div>
            </div>
        </div> 
    <!--end Temática ******************************************** End Temática **************+-->
        

        <div class="panel" title='Los escenarios y artistas que se presentarán en el evento'>
          <header class="panel-heading" style="background: #000; color: white;">
            <div class="numero_escenarios" id="numero_escenarios">
            </div>                                                                   
            <i class="fa fa-play-circle">
            </i>
            <span>
              Artistas 
            </span>
            <?=$resumen_evento["artistas"];?>                                  
            <span class="tools pull-right">
              <a class="fa  fa-caret-down" href="javascript:;">
              </a>                                      
            </span>
          </header>                              
          <div class="panel-body" style="background: #F3F8FB">                                    
            <div id="list_escenarios">
            </div>
          </div>                                                                        
          <form id="form-escenario" method="POST">
            <h2> 
              <i class="fa fa-plus">
              </i> Cargar Escenario
            </h2>  
            <div class="form-group todo-entry">
              <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">
              <input placeholder="Añadir escenario" class="form-control nuevo-escenario-input" style="width: 100%" type="text" id='nuevo-escenario-input' name='nuevoescenario'  required>
            </div>
            <button style="background:black !important" class="btn btn-primary pull-right" type="submit" id="nuevo-escenario">
              <i class="fa fa-plus">
              </i>
            </button>
          </form>
                                
        </div>
</div>
<!--TERMINA SECCIÓN 4 ************************************************************ -->






  






<!--************************************CONFIRMAR  **********************************-->
<div id="confirmationdeleteescenario" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">    
        <div class="modal-footer">
          Realmente decea eliminar el escenario ??
          <button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">
            Aceptar
          </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancelar
          </button>                
        </div>
      </div>
    </div>
  </div>
</div>
<!--************************************TERMINA CONFIRMAR  **********************************-->
 
<!--********************************HORARIO DE LOS ARTISTAS ********************************-->
<div class="modal fade" id="horarioartista" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="myModalLabel">
                Horario de presentación
              </h4>
            </div>
            <div class="modal-body"><!--inicia panel body-->  
              <div class='row'>
                <div class="form-group">
                <label class="control-label col-md-3">Hora de inicio</label>
                  <div class="col-md-4">
                    <div class="input-group bootstrap-timepicker">
                      <input class="form-control timepicker-default" id="hiartista" name="hiartista" type="text">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class='row'>
                <div class="form-group">
                <label class="control-label col-md-3">Hora de término</label>
                  <div class="col-md-4">
                    <div class="input-group bootstrap-timepicker">
                      <input class="form-control timepicker-default" id="htartista"  name="htartista" type="text">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-clock-o"></i></button>
                        </span>
                    </div>
                  </div>
                </div>
              </div>              
            </div><!--Termina panel body-->                        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="tregistrohorario" data-dismiss="modal">
                  Guardar
                </button>                                                              
            </div>
        </div><!--TERMINA *********************-->
    </div>
</div>










<!--********************************TERMINA HORARIO DE LOS ARTISTAS ********************************-->



<!--**********************************ACCESOS MODAL ************************************************-->
<div id="accesosmodal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header"><!--Inicia el header -->
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          <i class="fa fa-money">
          </i>Ventas, promociones, preventas ... 
          <span class='pull-right'>
            Evento <?=$fecha_evento;?>
          </span>
        </h4>          
      </div><!--Termina el header -->





      <div class="modal-body"><!-- dialog body -->           
             <!--************FORMULARIO DE REGISTRO   ****************-->  
             <div class='form-section-accesos'>
              <form class='form-accesos-modal' id="form-accesos-modal">
                    <input type="hidden" value="<?=$evento;?>" id="evaccesos"  class='evaccesos' name='evaccesos'>                                                                  
                    <div class='col-md-12'>
                      <div class="input-group">                        
                        <span class="input-group-addon">
                            Acceso 
                        </span>
                        <select class='form-control data-option-accesos' name='acceso-tipo-modal'>
                        </select>
                      </div>
                    </div>
                    <div class='col-md-12'>
                      <div class="input-group">
                        <span class="input-group-addon">
                            $ Precio 
                        </span>
                        <input type="number" name='precio-acceso-modal' class="form-control">
                        <span class="input-group-addon ">
                            .00
                        </span>
                      </div>
                    </div>                       
                    <div class='col-md-3'>
                        <div class="input-group" >
                          <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2015-02-15" class="input-append date dpYears"  >
                            <input readonly="" value="2015-02-15" size="16" class="form-control"  name="nuevo_inicio_acceso" id="nuevo_inicio_acceso"  type="text"  >
                            <span class="input-group-btn add-on">
                              <button class="btn btn-primary" type="button">
                              <i class="fa fa-calendar">
                              </i>
                            </button>
                            </span>
                          </div>                                          
                        </div>  
                    </div> 
                    
                    <div class='col-md-3'>
                        <div class="input-group" >
                          <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2015-02-15" class="input-append date dpYears"  >
                            <input readonly="" value="2015-02-15" size="16" class="form-control"  name="nuevo_termino_acceso" id="nuevo_termino_acceso" type="text"  >
                            <span class="input-group-btn add-on">
                            <button class="btn btn-primary" type="button">
                              <i class="fa fa-calendar">
                              </i>
                            </button>
                            </span>
                          </div>
                        </div>
                    </div>                     
                    <div class='col-md-3 pull-right'>
                      <button  class="btn btn-primary pull-right col-md-12" type="submit" id="nuevo-acceso">
                        <i class="fa fa-plus">
                        </i>
                      </button>
                    </div>              
              </form>
            </div><!--************TERMINA FORMULARIO DE REGISTRO   ****************-->    

            <!--************INICIA LA LISTA DE PRECIOS DEL EVENTO ****************-->
            <div class='list-accesos-modal'></div>
            <!--************TERMINA  LA LISTA DE PRECIOS DEL EVENTO ****************-->
            <!--Termina modal body-->       
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--***********************************TERMINA ACCESOS MODAL *************************-->
<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<div id="confirmationdeleteacceso" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
                &times;
          </button>
          <h4 class="modal-title">
                Eliminar
          </h4>
        </div>        
        <div class="modal-body">  
          <div class="modal-footer">
                      Realmente decea quitar de la lista el acceso??
              <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">
                        Aceptar
              </button>
              <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar
              </button>                      
          </div>
         </div>         
      </div>
    </div>
  </div>
</div>
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->


<!--***********************************INICIA SERVICIOS MODAL  *************************-->
<div id="serviciosmodal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          Servicios que incluirá el evento
        </h4>
      </div>            
      <div class="modal-body">                  
        <div class='panel'>
          <input type="hidden" value="<?=$evento;?>" id="eventoservicios"  class='eventoservicios' name='eventoservicios'>
          <div class='servicios-evento-modal'>
          </div>                            
        </div>                            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>



<!--***********************************Restricciones   *************************-->
<div id="templa-restricciones" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          Restricciones del evento
        </h4>
      </div>            
      <div class="modal-body">                  
        <div class='panel'>
          <?=$plantilla_restricciones;?>                        
        </div>
        <!--Link para registrar plantillas-->        
        <div class='row'>
          <a href="<?=base_url('index.php/templates/eventos')?>">
            <em>Registrar una lista de restricciones, esta herramienta 
              te permitirá cargar una y ser ocupada en diferentes eventos.            
            </em>
          </a>
        </div>        
        <!--Termina  Link para registrar plantillas-->        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--**********************************************-->
<div id="templa-politicas" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">Políticas del evento</h4>
      </div>            
      <div class="modal-body">                  
        <div class='panel'>
          <?=$plantilla_politicas;?>                        
        </div>      
        <!--Link para registrar plantillas-->        
        <div class='row'>
          <a href="<?=base_url('index.php/templates/eventos')?>">
            <p>Registrar una lista de políticas, esta herramienta 
              te permitirá cargar una y ser ocupada en diferentes eventos.            
            </p>
          </a>
        </div>        
        <!--Termina  Link para registrar plantillas-->             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

          
<!--***********************************TERMINA  SERVICIOS MODAL  *************************-->
<div id="templa-descripcion-contenido" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Servicios que incluirá el evento</h4>
        <em>
          Da click en tu plantilla  para cargar tu descripción, los cambios se verán reflejados automáticamente en la sección, descripción del evento. 
        </em>
      </div>            
      <div class="modal-body">                  
        <div class='panel'>
          <?=$plantillas_descripcion;?>                                    
        </div>              
         <a href="<?=base_url('index.php/templates/eventos')?>">
            <em>
                Registrar más plantillas, con esta herramienta 
                tendrás listo en cada evento texto pre cargado listos para ser utilizado.
            </em>
          </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>





<!--************************* Modal update fecha del evento    ************************* -->
<div class="modal fade" id="edith_fecha_modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>            
              <h4 class="modal-title" id="myModalLabel">
                <i class="fa fa-calendar-o">
                </i> Fecha del evento 
              </h4>
            </div>
            <div class="modal-body">                
                <h4>Actualizar la fecha del evento </h4>
                <!---->
                <form method="POST" class='update-fecha-evento-form' id="update-fecha-evento-form">
                    <input type="hidden" name='update_evento' id='update_evento'>
                    <div class="input-group">
                      <table class='table'>
                        <tr>
                          <td>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2015-02-15" class="input-append date dpYears" >
                              <input readonly="" value="2015-02-15" size="16" class="form-control"  id="update_inicio" name="update_inicio"   type="text"  >
                              <span class="input-group-btn add-on">
                                <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                              </span>
                            </div>                                                
                          </td>
                          <td>
                            <span class="input-group-addon"> al </span>
                          </td>
                          <td>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2015-02-15" class="input-append date dpYears">
                              <input readonly="" value="2015-02-15" size="16" class="form-control" id="update_termino" name="update_termino"  type="text"  >
                              <span class="input-group-btn add-on">
                                <button class="btn btn-primary" type="button">
                                <i class="fa fa-calendar">
                                </i>
                              </button>
                              </span>
                            </div>                              
                          </td>
                        </tr>
                      </table>                                            
                    </div>
                    <span class="help-block" >
                      Fecha del evento 
                    </span>
                    <button class="btn btn-info">
                      Guardar
                    </button>                    
                    <div class="alert alert-success" id="update-susses" role="alert">
                      Cambios registrados 
                    </div>
                </form>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cerrar
                </button>                                
            </div>
        </div>
    </div>
</div>





<!---->
<div class="modal fade" id="tipo-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>            
            <h4 class="modal-title" id="myModalLabel">
              Tipo de evento
            </h4>
            </div>
            <div class="modal-body">                              
              <div class="input-group">
                  <div class="input-group-addon">
                            Tipificación del evento
                  </div>          
                  <select name="tipo-evento" id='tipo-evento-select' class='form-control'>
                    <option value='Evento público'>
                              Evento público
                    </option>
                    <option value='Evento privado'>
                              Evento privado
                    </option>                            
                    <option value='Evento por lista de invitados'>
                              Evento por lista de invitados
                    </option>                          
                  </select>
              </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cerrar
                </button>                                
            </div>
        </div>
    </div>
</div>
<!---->
<input type='hidden' name='base_path_img' id="base_path_img" class='base_path_img' value='<?=$base_path_img;?>'>
<input type='hidden' name='base_path' id='base_path' class='base_path' value='<?=$base_path;?>'>




<div class="modal fade" id="modal-img-evento-section" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Cargar imagenes al evento
            </h4>
        </div>
        <div class="modal-body">  
              <div class='response-img-upload' id="response-img-upload">
              </div>        
              <div class='lista-imagenes' id="lista-imagenes">
              </div> 
              <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_evento" enctype="multipart/form-data" >
                <div class="form-group">
                        Imagen:<input type="file" name="images[]"  id="imgs-evento-input">                            
                </div>          
              </form>
        </div>            
        <div class="modal-footer">                
            <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
            </button>
        </div>
    </div>
  </div>
</div>


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





  
begin
SET @num =  emp; 
SET @dinamic_table =  CONCAT('CREATE TABLE db_j.tmp_user_' , @num  , ' AS ' , 'SELECT  * FROM  db_j.tmp_user'  ); 
PREPARE stmt from @dinamic_table; 
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
end
