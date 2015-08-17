<link href="<?=base_url('application/views/principal/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />

<form id='form-general-ev'>        
    <input type="hidden" value="<?=$evento;?>" id="evento" name='evento'>
</form>        

<div class="col-md-8 section-enid-events-r">
    

    <!--Inicia el row donde se cargan imagens y se edita el nombre y demás detalles -->
    <div class="row">            
        <div class="panel" >
          <header class="panel-heading blue-col-enid" >
            Fecha del evento <?=$fecha_evento; ?> 
            <span class="tools pull-right">
              <a class="fa  fa-caret-down" href="javascript:;"></a>
            </span>
          </header>                          
          <!--Inicia  la seccion general del eveto -->
          <div class="panel-body" >        
                <h2 class='nombre-evento-h1'><?=$data_evento['nombre_evento'];?></h2>
                <div class="form-group nombre" >
                  <input placeholder="Registra el nombre del evento" class="form-control"  type="text" value="<?=$data_evento['nombre_evento'];?>"  id="nombre-input" name='nombre-input' >
                </div>

                <span class="designation edicion-evento"><?=valida_text_replace($data_evento['edicion'] , "<i class='fa fa-plus'></i> Edicioón del evento" , "<i class='fa fa-plus'></i> Edicioón del evento" );?></span>              
                <div class="form-group">
                    <input placeholder="Registra qué edición tiene el evento" class="form-control"  type="text" id="edicion-input" name='edicion-input' value="<?=$data_evento['edicion'];?>">
                </div>

                <form action="<?=$carpeta_evento_img?>" class="dropzone" id="event-img"></form>            
          </div>


          <div class="panel-body">
               <div class='row'>
        <div class="col-md-12">
      <div class="panel">
        
        <header class="panel-heading ">                            
          <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-caret-down"></a>                                
          </span>
        </header>

        <div class="panel-body">

            <!--- Menu text evento  -->
            <ul class="nav nav-tabs">
                      <li>
                        <a href="#portlet_tab3" data-toggle="tab">
                        <i class="fa fa-exclamation-triangle"></i>Lo prohibido </a>
                      </li>
                      <li class='permitidonow'>
                        <a href="#portlet_tab2" data-toggle="tab">
                        <i class="fa fa-check permitidonow" ></i>Lo permitido </a>
                      </li>
                      <li class="">
                        <a href="#portlet_tab1" data-toggle="tab">
                        <i class="fa fa-circle"></i>Políticas </a>
                      </li>                    
                      <li class="active">
                        <a href="#portlet_tab4" data-toggle="tab">
                         Evento </a>
                      </li>          
            </ul>

            <!---End  Menu text evento  -->
          
<!--Inicia tabs Inicia tabs Inicia tabs Inicia tabs Inicia tabs Inicia tabs Inicia tabs Inicia tabs -->
            <div class="tab-content">
              <!--Politicas tab-->
              <div class="tab-pane" id="portlet_tab1">            
                <h2>Políticas del festival</h2>  
                  <p class='politicas-p'>
                    <?=valida_text_replace($data_evento["politicas"] ,  "<i class='fa fa-plus'></i> Lo que podría anticiparse como reembolsos o cambios" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse como reembolsos o cambios" );?>
                  </p>
                  <div class="form-group">
                      <textarea id='politicas-evento' placeholder ='' rows="6" class="form-control" >
                        <?=$data_evento["politicas"];?>
                      </textarea>
                  </div>  
                  <button class='btn  btn-template'><i class='fa fa-sticky-note'></i>Plantilla</button>
              </div>
              <!--Politicas Tab-->
              <!--Lo permitido  Tab-->
              <div class="tab-pane" id="portlet_tab2">
                    <h2>Lo permitido en el evento</h2>  
                     <p class='permitido-p'><?=valida_text_replace($data_evento["permitido"] , "<i class='fa fa-plus'></i> Lo que las personas podrían hacer e ingresar al evento" , "<i class='fa fa-plus'></i>Lo que las personas podrían hacer e ingresar al evento" );?></p>
                                           
                      <div class="form-group">
                          <textarea id='permitido-evento' placeholder ='' rows="6" class="form-control">
                            <?=$data_evento["permitido"];?>
                          </textarea>
                      </div> 
                      <button class='btn  btn-template'><i class='fa fa-sticky-note'></i>Plantilla</button>
                      <!--Lista de objetos permitidos -->

                      <button class='btn btn-info articulos-permitidos-button'><i class='fa fa-caret-down'></i> Articulos permitidos</button>
                      <div class='row' id='section-articulos-permitidos'>                                  
                          
                            <table class="table">
                              <thead>
                                <tr>
                                   <th>#</th><th>Articulo que se permitirá ingresar al evento</th><th><button class='btn btn-info btn-all-articulos' id="<?=$evento;?>"><i class='fa fa-check-square'></i></button> </th>
                                </tr>
                              </thead>
                              <tbody class='objetospermitidosf'></tbody>
                            </table>                                  
                      </div>
                      <!--Termina la lista de objetos permitidos -->    
              </div>
              <!--Termina lo permitido  Tab-->
              <!--Inicia las restricciones -->
              <div class="tab-pane" id="portlet_tab3">                      
                     <h2>Restricciones en el evento</h2>  

                      <p class='restricciones-p'><?=valida_text_replace($data_evento["restricciones"] , "<i class='fa fa-plus'></i> Lo que podría anticiparse dentro del evento" , "<i class='fa fa-plus'></i>  Lo que podría anticiparse dentro del evento" );?></p>
                      <div class="form-group">
                          <textarea id='restricciones-evento' placeholder ='' rows="6" class="form-control">
                            <?=$data_evento["restricciones"];?>
                          </textarea>
                      </div> 
                      <button class='btn  btn-template'><i class='fa fa-sticky-note'></i>Plantilla</button>
              </div>
              <!--Termina las  restricciones -->
              <!-- Inicia la experiencia -->                            
              <div class="tab-pane active" id="portlet_tab4">
                <h2>  La experiencia</h2>                
                  <!--Inicia Eslogan del evento-->
                  <div>
                    <div class="form-group alert alert-info">                            
                      <i class="fa fa-flag"></i> Eslogan: <span class='eslogan-p' id='eslogan-p'> <?=valida_text_replace($data_evento["eslogan"],  "<i class='fa fa-space-shuttle'></i> Mensaje eslogan del evento" , "<i class='fa fa-space-shuttle'></i>  Eslogan del evento" );?> </span>                          
                      <input class="form-control eslogan-evento" id="eslogan-evento" name='eslogan-evento'  placeholder="Si es en méxico, estará lleno de colores" required>
                    </div>
                  </div>
                  <!--Termina Inicia Eslogan del evento-->
                  <!--Inicia descripcion del evento -->
                  <div>
                    <h4><i class="fa fa-file-text"></i>  Descripción del evento</h4>
                    <div class='place place_description' id='place_description'></div>                    
                    <p class='descripcion-p'>

                      <?=valida_text_replace( $data_evento["descripcion_evento"] , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" , "<i class='fa fa-plus'></i> Lo que se vivirá en el evento" );?>
                      
                    </p>


                    <div class="form-group">
                      <textarea id='descripcion-evento' placeholder ='Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival "I love this generation" el cual tendrá lugar en nuestro mítico Club Coco Dance club, presentándose en el más de 20 artistas de esta tendencia y de más de 3 naciones, vive esta única experiencia.' rows="6" class="form-control">
                        <?=$data_evento["descripcion_evento"];?>  
                      </textarea>
                    </div> 
                  </div> 
                  <!--Termina  descripcion del evento -->
                  <div>
                  <button class='btn  btn-template'><i class='fa fa-sticky-note'></i>Plantilla</button>
                  <button class='btn btn-info' id='generos_musicales_button'><i class='fa fa-caret-down'></i> Géneros musicales</button>
                    <div class='generos_musicales_div'>
                      <?=$list_generos;?>
                    </div>
                  </div>
              </div>
              <!-- Termina  la experiencia --> 

            </div>            
<!--Termina Tabs Termina Tabs Termina Tabs Termina Tabs Termina Tabs Termina Tabs Termina Tabs Termina Tabs -->          
                     
    </div><!--Termina Panel headin -->
  </div><!--Termina Panel  -->
</div><!--Termina 12 colums -->


      </div>
          </div>




          <!--Termina la seccion general del eveto -->
        </div><!--Termina el panel -->                      
      </div><!--Termina el Row -->                      




      <!--Inicia la seccion del google maps para el evento-->
      <div class='row'  id="mapgooglemap">                    
        <input id="pac-input" class="controls ubicacioninput" type="text" placeholder="Ubicación" value="<?=$data_evento['ubicacion']?>">
        <div id="mapsection">
          <div id="map-canvas"></div>
          <div class='textnotfound-location'></div>  
        </div> 
      </div>



</div><!--TERMINA LA SECCION DE 8 -->





<!--Inicia section tres -->
  <div class="col-md-4 section-enid-events-left">
      <!--Accesos button-->    
        <div class="panel" >
            <button id="accesos-button" data-toggle="modal" data-target="#accesosmodal" class="btn blue-col-enid col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " ><strong> <i class="fa fa-credit-card"></i>  ACCESOS AL EVENTO </strong></button>
        </div> 
        <!--Termina acceso button-->

        <!--Servicios button-->    
        <div class="panel" >
            <button id="servicios-button" data-toggle="modal" data-target="#serviciosmodal" class="btn blue-col-enid col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " ><strong> <i class="fa fa-cutlery"></i> SERVICIOS INCLUIDOS </strong></button>
        </div> 
        <!--Termina servicios button-->

    <!--Social media  button-->    
        <div class="panel">
            <button id="social-button" class="btn blue-col-enid col-xs-12  col-sm-12 col-md-12 col-lg-12 accesos-button" style="text-align: left; padding: 10px!important; " >
              <strong> <i class="fa fa-flag"></i> SOCIAL </strong>
            </button>
            
            <div class='social-media-event col-xs-12  col-sm-12 col-md-12 col-lg-12'>
              <div class='row'>
                <form class="form-horizontal" id='form-social' role="form">                                     
                  <input type="hidden" name="evento_social" id="evento_social" value="<?=$evento;?>">
                  <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fa fa-facebook "></i> </span>
                    <input class="form-control" name='url_social_evento' type="text" id="url_social" placeholder="La url de tu evento en Facebook"  value="<?=$data_evento['url_social']?>" required>
                  </div>                                                                                       
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span>
                  <input class="form-control" name='url_social_evento_youtube' type="text" id="url_social_evento_youtube" placeholder="La url de tu canal en youtube"  value="<?=$data_evento['url_social_youtube']?>" required>
                  </div>         
                </form>           
              </div>  
            </div>                                                           
        </div> 
    <!--Termina social media  button-->
    <!--Temática ******************************************** Temática **************+-->
        <div class="panel" >
            <button id="tematica-button" class="btn blue-col-enid col-xs-12  col-sm-12 col-md-12 col-lg-12 tematica-button" style="text-align: left; padding: 10px!important; " >
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
        

                        <div class="panel">
                                <header class="panel-heading" style="background: #074456;">
                                  <div class="numero_escenarios" id="numero_escenarios"></div>                                  
                                    <span class="tools pull-right">
                                        <a class="fa  fa-caret-down" href="javascript:;"></a>                                        
                                     </span>
                                </header>                              
                                <div class="panel-body" style="background: #F3F8FB">                                    
                                    <div id="list_escenarios"></div>
                                </div>
                                <div class="panel-body">                                    
                                        
                                      <form id="form-escenario" method="POST">
                                        <h2> <i class="fa fa-plus"></i>
 Escenario</h2>  
                                        <div class="form-group todo-entry">
                                            <input type="hidden" name="evento_escenario" id="evento_escenario" value="<?=$evento;?>">

                                            <input placeholder="Añadir escenario" class="form-control nuevo-escenario-input" style="width: 100%" type="text" id='nuevo-escenario-input' name='nuevoescenario' >
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
    <a href="<?=base_url('index.php/eventos/visualizar')?>/<?=$evento;?>">
    <button class="btn btn-primary btn-lg" type="button"> Visualizar antes de publicar  </button>    

    </a>
  </center>  
  <!--******************** button pre visualizar ***************************** -->
</div>


  




<div id="modalesenariosedit"  class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">    
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!--Inicia header modal -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
          <h3 class='nombre-escenario-modal'></h3>
          <input type="text" data-trigger="click" class="form-control popovers nombre-escenario-input-modal" id='nombre-escenario-input-modal' placeholder="Escenario">
          <form id="updateescenariomodal-form">
             <input type='hidden' id="idescenarioupdatemodal" name="idescenarioupdatemodal"  class="idescenarioupdatemodal" >
          </form>
      </div>
      <!--Termina header modal -->
     <div class="modal-body">        
        

         

<!--*****************  La fecha del escenario  + el tipo  **************** -->
<div class='row'>
        <!--**************** **********************  ******************* -->

        <div class='col-xs-12  col-sm-6 col-md-6 col-lg-6'>

          <button class="btn btn-info  col-xs-12 day_escenario_button" type="button" >            
            <span class='day_escenario'></span>            
          </button>                

          <div class='day_escenario_inputs' id='day_escenario_inputs'>
            <div class="input-group">
                <input class="form-control dpd1" name="nuevo_inicio_escenario" id="nuevo_inicio_escenario" type="text">
                <span class="input-group-addon">hasta</span>
                <input class="form-control dpd2" name="nuevo_termino_escenario" id="nuevo_termino_escenario" type="text">
            </div>
          </div>
        </div> 
        <!--**************** **********************  ******************* -->
        <div class="col-xs-12  col-sm-6 col-md-6 col-lg-6 ">
          <div class="input-group">
            <div class="input-group-btn">                                            
              <button tabindex="-1" data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Tipo<span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu">
                  <li><a class='tipo-evento-modal' id='General' href="#">General</a></li>
                  <li><a class='tipo-evento-modal' id='Principal' href="#">Principal</a></li>
                  <li><a class='tipo-evento-modal' id='Especial' href="#">Especial</a></li>                                                                              
                </ul>
            </div>
            <input type="text"  class="form-control input_tipo" >
          </div>
        </div>  
      <!--**************** **********************  ******************* -->
</div> 
<!--***************** Termina  la fecha del escenario  + el tipo  **************** -->       
<!--**************** Los artistas y sus horarios ****************** -->         
<div class='row'>        
  <div class="panel">
    <header class="panel-heading">
      <span style='color:black '><i class="fa fa-play"></i> Horarios y  Artistas</span>
      <span class="tools pull-right">
        <a class="fa  fa-caret-down" href="javascript:;"></a>
      </span>
    </header>
    <div class="panel-body">                          
      <ul class="to-do-list ui-sortable" id="sortable-todo">                                   
        <div class="general-artistas"></div>
      </ul>
      <form role="form" class="form-inline" id="form-artistas" >
        <div class="form-group todo-entry">
          <datalist id="dinamic-artistas"></datalist>
          <input id='idescenariomodalartistas' name="idescenario" type='hidden'>
          <input  name="nuevoartista" type="text" list="dinamic-artistas" id='artistainput' placeholder="Artista que se presentará en el escenario" class="form-control" style="width: 100%">
        </div>
        <button class="btn btn-primary pull-right" type="submit">+</button>
      </form>                          
    </div>
  </div>          
</div>          
<!--**************** *************Termina los artistas y sus horarios *********  ******************* -->

<div class='row'>       

  <header class="panel-heading">
      <span style='color:black '><i class="fa fa-file-text"></i> Descripción del escenario </span>
      <span class="tools pull-right">
        <a class="fa  fa-caret-down" href="javascript:;"></a>
      </span>
    </header>


  <div class='descripcion-modal-text col-xs-12  col-sm-12 col-md-12 col-lg-12' >
    + agregar descripción del escenario
  </div>                          
  <div class="form-group">
    <textarea class='descripcion-in-modal-escenario col-xs-12  col-sm-12 col-md-12 col-lg-12 ' ></textarea>
  </div> 
  <button class='btn  btn-template'><i class='fa fa-sticky-note'></i>Plantilla</button>
</div>  

</div><!--Termina el boby de modal -->

<div class="modal-footer">
    
    <button id="avanzado-config-escenario" class='btn btn-info'><i class='fa fa-angle-double-right'></i> Avandado </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>
      </div><!--Termina el contect --> 
    </div><!--Termina dialog-->
</div> <!--Termina modal-->
<!--Termina Escenarios modal-->

<!--************************************CONFIRMAR  **********************************-->
<div id="confirmationdeleteescenario" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
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
 
<!--********************************HORARIO DE LOS ARTISTAS ********************************-->
<div id="horarioartista" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Establecer horario en que se presentará el artista</h4>
      </div>      
      <div class="modal-body">    
          <?=generatehorarioartista("hiartista" , "htartista" );?>
          <button type="button" class="btn btn-default" id="tregistrohorario" data-dismiss="modal">Guardar</button>                            
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>
<!--********************************TERMINA HORARIO DE LOS ARTISTAS ********************************-->



<!--**********************************ACCESOS MODAL ************************************************-->
<div id="accesosmodal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header"><!--Inicia el header -->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-money"></i> Ventas, promociones, preventas ... </h4>

      </div><!--Termina el header -->

  
  <div class="modal-body"><!-- dialog body -->           
        <h4>          
          Fecha del evento <?=$fecha_evento;?>
        </h4>
    <!--************INICIA LA LISTA DE PRECIOS DEL EVENTO ****************-->

        <table class="table">
          <thead class='enid-header-table'>
            <tr>
            <th>#</th>
            <th><i class="fa fa-star"></i> Acceso</th>
            <th class="text-center"><i class="fa fa-credit-card"></i> Precio</th>
            <th class="text-center"><i class="fa fa-calendar-o"></i> Periodo</th>
            <th class="text-center"><i class="fa fa-angle-double-right"></i>Avanzado</th>

            <th class="text-center"></th>
            </tr>
          </thead>
          <tbody class='list-accesos-modal'></tbody>
        </table>
    <!--************TERMINA  LA LISTA DE PRECIOS DEL EVENTO ****************-->

      
    <!--************FORMULARIO DE REGISTRO   ****************-->  
        <table class="table">
          <form class='form-accesos-modal' id="form-accesos-modal">

            <input type="hidden" value="<?=$evento;?>" id="evaccesos"  class='evaccesos' name='evaccesos'>                                          
            <tr>                        
              <td>                           
                <select class='form-control data-option-accesos' name='acceso-tipo-modal'></select>
              </td>  
              <td>
                <div class="input-group">
                  <span class="input-group-addon">$</span>
                  <input type="number" name='precio-acceso-modal' class="form-control">
                  <span class="input-group-addon ">.00</span>
                </div>
              </td>
              <td>
                <div class="input-group" >
                    <input class="form-control dpd1" name="nuevo_inicio_acceso" id="nuevo_inicio_acceso" type="text" required>
                    <span class="input-group-addon"></span>
                    <input class="form-control dpd2" name="nuevo_termino_acceso" id="nuevo_termino_acceso" type="text" required>
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
    <!--************TERMINA FORMULARIO DE REGISTRO   ****************-->    

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
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Eliminar</h4>
        </div>        
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
</div>
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->


<!--***********************************INICIA SERVICIOS MODAL  *************************-->
<div id="serviciosmodal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Servicios que incluirá en evento</h4>
      </div>            
      <div class="modal-body">    
                
        <div class='panel'>
          <input type="hidden" value="<?=$evento;?>" id="eventoservicios"  class='eventoservicios' name='eventoservicios'>
          <div class='servicios-evento-modal'></div>                            
        </div>
                
                
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>


<!--***********************************TERMINA  SERVICIOS MODAL  *************************-->














































<script type="text/javascript" src="<?=base_url('application/js/evento/generosmusicales.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/principal.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/escenarios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/servicios.js')?>"> </script>
<script type="text/javascript" src="<?=base_url('application/js/evento/objetospermitidos.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/tematica.js')?>"></script>


<script src="<?=base_url('application/views/principal/dropzone.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/img_events.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<!--Escenarios modal-->
<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/gmap.js')?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>


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

     
