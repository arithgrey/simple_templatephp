<?=ini_set('display_errors', '1');?>
<style type="text/css">
.text-fecha-evento:hover, .nota-servicio:hover{
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
#busqueda-genero-musical{
  display: none;
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

<div class="col-md-8 section-enid-events-r ">    
    <!--Inicia el row donde se cargan imagens y se edita el nombre y demás detalles -->
    <div class="row">            
        <div class="panel" >
          <!--*******************HEADER PANEL *************************-->      
          <header class="panel-heading blue-col-enid" >        
            <div class='text-fecha-evento'  href="" data-toggle="modal" data-target="#edith_fecha_modal"  >
              Fecha del evento 
              <?=$fecha_evento; ?> 
            </div>                    
            <button id='tipificacion-evento' class='btn btn btn_nnuevo ' data-toggle="modal" data-target="#tipo-evento" >
              <?=$data_evento['tipo']?>
            </button>
            <span class="tools pull-right">
              <a class="fa  fa-caret-down" href="javascript:;">
              </a>
            </span>
            <a href="<?=base_url('index.php/eventos/visualizar')?>/<?=$evento;?>" class='pull-right'>
              <button title='Lo que el mundo verá del evento' class="btn btn-default btn-ver" type="button">
                <i class='fa  fa-arrow-circle-o-right'> </i>
                Ver como el público  
              </button>    
            </a>
          </header>                          
          <!--*******************HEADER PANEL TERMINA*************************-->      
          <!--Inicia panel body ****************************** -->
          <div class="panel-body panel-body-enid" > 
              <div class='panel'>
                  <div class='panel-body'>
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
                              <p class='permitido-p'>
                                <?=valida_text_replace($data_evento["permitido"] , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento" );?>
                              </p>                                  
                              <div class="form-group">
                                  <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control">
                                    <?=$data_evento["permitido"];?>
                                  </textarea>
                              </div>                             
                              <!--Lista de objetos permitidos -->



                              <button title='Lista de objetos permitidos' class='btn  btn-template articulos-permitidos-button'>
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
                                <span class='eslogan-p' id='eslogan-p'>
                                 <?=valida_text_replace($data_evento["eslogan"],  "<i class='fa fa-space-shuttle'></i> Mensaje eslogan del evento" , "<i class='fa fa-space-shuttle'></i>  Eslogan del evento" );?> 
                                </span>                          
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
                                </i> Usar plantilla
                              </button>
                              <button title='Asociar géneros musicales al evento' class='btn btn-info' id='generos_musicales_button'>
                                <i class='fa fa-caret-down' id='btn-generos'>
                                </i> <?=$resumen_evento["generos_musicales"]?> Géneros musicales
                              </button>                             
                              

                              <div id='busqueda-genero-musical'>
                                <div class="input-group"  >
                                  <div class="input-group-addon"> 
                                    Género musical 
                                  </div>
                                  <input   placeholder="Genero musical"  id="genero-busqueda" class="genero-busqueda form-control" type="text">                            
                                </div>
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

</div><!--TERMINA LA SECCION DE 8 -->



<!--INICIA SECCIÓN DE 4****************************************************** -->
<div class="col-md-4">          

  <div class="panel">
      <div class="panel-body">
          <div class="profile-desk">
              <h1>
                Configuración del evento
              </h1>
              <span class="designation">
                Registrado  <?=$data_evento["fecha_registro"]?>
              </span>
              <!--Inicia la configuración general -->


              <!--
              <article title='Registra el precio de los accesos al evento en sus diferentes etapas'  id="accesos-button" data-toggle="modal" data-target="#accesosmodal" class="section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
              
                <i class="fa fa-credit-card">
                </i> 
                + <?=$resumen_evento["accesos"]?>  Accesos al evento
              
              
                , <?=$resumen_evento["evento_punto_venta"]?> Puntos de venta 
              </article>
               -->
              <hr>

              <article title='Lo que el evento ofrece al cliente' id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; ">           
                <i class="fa fa-cutlery">
                </i> + <?=$resumen_evento["servicios"]?>  
                Servicios incluidos           
              </article>
              <hr>





              <!--Social media  button-->            
              <article title='Las redes sociales del evento'  id="social-button" class="section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; ">                
                    <i class="fa fa-flag"></i> 
                    Social                 
              </article>            
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
                <!--Social media  termina -->        

                <hr>

    <!--Temática ******************************************** Temática **************+-->      
            <article id="tematica-button" class="btn section-left col-xs-12  col-sm-12 col-md-12 col-lg-12 tematica-button" style="text-align: left; padding: 10px!important; "   >
              
                <i class="fa fa-tree"></i> 
                Temática
              
            </article>            
            <div class='tematica_section col-xs-12  col-sm-12 col-md-12 col-lg-12' id="tematica_section">               
                <form class="form-horizontal" id='form-tematica'> 
                    <input type="hidden" name="id_evento_tematica" id="id_evento_tematica" value="<?=$evento;?>">                                    
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-tree"></i></span>
                      <select class="form-control m-bot15" id="tematica_select" name="tematica_select"></select>
                    </div>         
                </form>               
            </div>
        
    <!--end Temática ******************************************** End Temática **************+-->
        



              <!--Termina la configuración general -->
              
          </div>
      </div>
  </div>


















        
        <!--Servicios button-->    
        
        
        <!--Termina servicios button-->
    

        <div class="panel" title='Los escenarios y artistas que se presentarán en el evento'>
          <header class="panel-heading blue-col-enid">
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
          <div class="panel-body panel-body-enid">    
            <div id="list_escenarios">
            </div>
          </div>     
          <!--Alertas escenarios  -->

        

          <!--Terminan las alertas para los escenarios  -->
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
                                
        </div>
</div>
<!--TERMINA SECCIÓN 4 ************************************************************ -->


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

