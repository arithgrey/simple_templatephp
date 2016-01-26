<!--*******Inicia panel -->
<!--*******seccion izquierda ************************* -->
<div class='col-lg-9 col-md-9 col-sm-9'>
<section class="panel panel-primary">
    <header class="blue-col-enid panel-heading custom-tab">
        <ul class="nav nav-tabs blue-col-enid">     
            <li class="">
                <a href="<?=base_url('index.php/eventos/nuevo/')?>/<?=$data_escenario['idevento']?>">
                <i class="fa fa-home"></i> 
                 Evento <?=$nombre_evento?>
                </a>
            </li>   


            <li class="active">
                <a data-toggle="tab" href="#panel-asignar-artistas">
                <i class="fa fa-headphones">
                </i>
                 Asigna artistas a la escena 
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#panel-img-escena">
                <i class="fa fa-camera"></i> 
                 Carga imagenes al escenario 
                </a>
            </li>   


            <li class="ver-escenario" title='Ver el escenario como lo hace el público'> 
                <a data-toggle="tab" href="">
                <i class=""></i> 
                 Ver como el público
                </a>
            </li>   



        </ul>
    </header>
    <div class="panel-body" >
        <div class="tab-content">
            <!--***************************INICIA PANEL CONGIG GENRAL -->
            <div id="panel-asignar-artistas" class="tab-pane active">                                                
             
                <div class='row'>


                    <!--Alerts  -->
                    <div class='panel  alert-ok-sm' >
                        <em>
                            Datos actualizados
                        </em>
                    </div>
                    <div class='panel alert-fail-sm'>
                        <em>
                            Falla al actualizar información,
                            reporte al administrador 
                        </em>
                    </div> 
                    <!--Terminan alerts -->

                    <div class="jumbotron" style='background:#032B3B; color:white;'>
                        <div  class='row'>

                            <section>
                                
                                <h1  title='Actualizar nombre del escenario' class='nombre-escenario-text'>
                                    <?=$data_escenario["nombre"];?>
                                </h1>       
                                <div class="form-group">
                                    <div class='section-nombre-evento-in'>
                                        <div class='input-group'>                    
                                            <span class="input-group-addon">
                                                            Nombre del escenario 
                                            </span>
                                            <input  class="form-control in-nombre-escenario" id='in-nombre-escenario' value="<?=$data_escenario["nombre"];?>" name='nuevo_nombre' style="width: 100%" type="text">                      
                                            <input type='hidden' name='action' value="carga-imgenes-escenario">                    
                                        </div>
                                    </div>
                                </div>  
                            </section>   
                        </div>
                        <h3>
                            <span class="label label-default">
                                La experiencia 
                            </span>
                        </h3>
                        <div class='well' style='color:black;'>
                            <p  title='Actializar información' class='descripcion-escenario-text' style='font-size:.9em !important;'>                        
                                <?=$descripcion_escenario;?> 
                            </p>
                        </div>
                        <div class='section-descripcion-escenario-in'>
                            <div class='input-group'> 
                                <span class="input-group-addon">
                                    Nombre del escenario 
                                </span>
                                <textarea id="in-descripcion-escenario"  class='form-group col-lg-12 ' name="descripcion_escenario" rows="7" >
                                    <?=$descripcion_escenario;?> 
                                </textarea>         
                            </div>
                        </div>


                    <!--Alertas tipo escenario -->   
                     <div class="alert-ok white-e" id="alert-ok-tipo-escenario" >
                        <em>
                            Datos del escenario actualizado
                        </em>
                    </div>
                    <div class="alert-fail-sm" id="alert-fail-tipo-escenario" >
                        <em>
                            Falla al actualizar los datos del escenario 
                        </em>
                    </div>

                    <!--Termina alertas tipo de escenario  -->    
                    <div class="btn-group-vertical" role="group" aria-label="Vertical button group">    
                      <div class="btn-group btn-lg" role="group">
                        <button id="btnGroupVerticalDrop1" type="button" 
                        class="btn btn-default dropdown-toggle button-tipo-escenario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?=$tipo_escenario_start; ?>
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                            <li class='tipo-escenario' id='General'>
                                <a id='General'>General</a>
                            </li>
                            <li class='tipo-escenario' id='Principal' >
                                <a id='Principal'>
                                    <i class='fa fa-star'></i> Principal
                                </a> 
                            </li>
                            <li class='tipo-escenario' id='Especial'>
                                <a id='Especial' >Especial</a>
                            </li>
                        </ul>
                      </div>     
                    </div>


                     <a href="" data-toggle="modal" data-target="#modal-date-escenario" title='Fecha para éste escenario' style='color:white;'>
                        <div class='pull-right'>                            
                            <i class="fa fa-calendar"></i>
                            Presentación 
                            <div id='fecha-presentacion'>
                                <em>
                                    <?=$data_escenario["fecha_presentacion_inicio"] . " - ". $data_escenario["fecha_presentacion_termino"]; ?>
                                </em>
                            </div>
                        </div>
                    </a>


                    </div>
                </div>
                
            <!--*********************************RESUMEN  ************************************-->
                <div class='row'>
                    <div class='resumen-artistas-escenario-event'> 
                        <?=$resumen_artistas;?>
                    </div>
                </div>
            <!--*********************************TERMINA  RESUMEN  ************************************-->
                <div class='row'>
                    <section class="panel">        
                        <header class="blue-col-enid panel-heading custom-tab turquoise-tab">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#home3">
                                    <i class="fa fa-play"></i>
                                        Artistas que se presentarán en este escenario 
                                    </a>
                                </li>                                                                
                            </ul>
                        </header>                        
                        <div class="blue-col-enid-complement panel-body">                                                        
                            <div class="tab-content">
                                <div id="home3" class="tab-pane active">
                                    <!--Artistas en el escenario -->
                                    <div class='artistas-escenario-section' id='artistas-escenario-section'>
                                        <?=$artistas;?>     
                                    </div>  
                                </div>                    
                            </div>
                        </div>
                    </section>
                </div>
            </div>  
            <!--***************************TERMINA CONFIG GENERAL ************** -->




        <!--************Bloque de imagenes  ******************** -->    
            <div id="panel-img-escena" class="tab-pane">                               
                <!--Carga de imagenes  inicia  -->
                 <div class='section-right'>
                   
                    <strong title='Cargar imagenes del escenario' id='img-button-more-imgs' data-toggle="modal" data-target="#modal-img-escenario-principal"  >
                        <i class="fa fa-plus-circle fa-3x">
                        </i>                                    
                    </strong>                  
                </div>   
                <center>
                    <em>
                        Imagenes cargadas al escenario 
                    </em>
                </center>

                <div class="panel-body fixed-panel" >                          
                    <div class='slider-principal-escenario' id='slider-principal-escenario'>
                        <?=$slider_principal_escenario;?>                                
                    </div>
                </div>             
                <!--Carga de imagenes finaliza  ************************ -->
            </div>
            <!--************Bloque de imagenes termina  ******************** -->    
        </div>
    </div>
</section>
</div>
<!--*******Termina seccion izquierda ************************* -->

<!--*******Seccion derecha  ************************* -->
<div class='col-lg-3 col-md-3 col-sm-3' style='background:#032B3B; color:white;'>
    
        <!--Bloque go to evento -->
        <div class='panel-heading text-center' style='color:white;' >

        </div>
        <!--Bloque go to evento termina -->
    
        <div class="state-overview">
            <?=$otros_escenarios?>        
        </div>   
    
</div>
<!--*******Termina sección derecha  ************************* -->

<!--*******Terminan los paneles -->
















<!--********************************************INICIAN MODALS   INICIAN MODALS  INICIAN MODALS  INICIAN MODALS   ********************* -->


<!--*********************** ***********************   ***********************  ***********************  ***********************  -->
<div class="modal fade" id="modal_tipo_artista" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Tipo 
                </h4>
            </div>
            <div class="modal-body">            
                
                <!--***************************************-->
                
                    
                        <form action='<?=base_url('index.php/api/escenario/artista_tipo/format/json/')?>' id='tipo-artista-form' class='tipo-artista-form'>
                            
                                <div class="input-group">                                    
                                    <div  class='col-lg-8 col-md-8 col-sm-8 '>                                        
                                        <div class="form-group">            
                                            <div class="input-group m-bot15">
                                                <span class="input-group-addon">
                                                   Tipo de participación
                                                </span>                                                                                             
                                                 <select name='tipo_artista'  class='tipo_escenario form-control' id='tipo_escenario'> 
                                                    <option value=''>Ninguno</option>
                                                    <option value='Estelar'>Estelar</option>
                                                    <option value='Especial'>Especial</option>
                                                    <option value='Apertura'>Apertura</option>
                                                    <option value='General'>General</option>                                

                                                </select>                                        
                                            </div>
                                         </div>  
                                    </div>
                                    <div  class='col-lg-4 col-md-4 col-sm-4 '>
                                        <button title='Establecer el tipo de artista' type="submit" class="btn btn-default btn_save" >                
                                            Registrar cambios
                                        </button> 
                                    </div>
                                </div>
                                <div class='row'>
                                    <!--Alertas -->
                                        <div class='alert-ok' id='response-ok-clasificacion'> 
                                            <em>
                                            Clasificación del artista para este escenario modificada .!
                                            </em>
                                        </div>                                        
                                        <div class='alert-fail' id='response-fail-clasificacion'> 
                                            <em>
                                            Error al modificar la clasificación del artista, reporte al administrador 
                                            </em>
                                        </div>                                        
                                    <!--Alertas  terminan -->
                                </div>                                
                        </form>                    
                <!--************************************** -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>            
            </div>            
        </div><!--Termina modal content -->
    </div>
</div>







<!--*********************** ***********************   ***********************  ***********************  ***********************  -->







<!---->
<div class="modal fade" id="modal-date-escenario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Presentación del escenario
                </h4>
            </div>
            <div class="modal-body">    		
                <form id="form-nueva-fecha">
                    <div  class='col-lg-12 col-md-12 col-sm-12  '>
                        <div  class='col-lg-6 col-md-6 col-sm-6'>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                <input readonly="" value="<?=now_enid()?>" size="16" class="form-control"   id='inicio' name="from"   type="text"  >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div  class='col-lg-6 col-md-6 col-sm-6'>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" id='termino' name="to"   type="text"  >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>        
                    <span class="help-block">
                        Seleccione la fecha para este escenario
                    </span>
                    <button class='btn btn-default btn_save' id='btn-guardar-fecha'>
                       Guardar
                    </button>
                    <div id='repo-update-fecha'>    

                        <div class="alert-ok" id="alert-ok-fecha-ok" >
                            <em>Nueva fecha establecida </em>
                        </div>
                        <div class="alert-fail-sm" id="alert-ok-fecha-fail" >
                            <em>Falla al actualizar fecha </em>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>            
            </div>            
        </div><!--Termina modal content -->
    </div>
</div>








<!---->
<div class="modal fade" id="modal_link_sound" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">dinamic_artista_sound
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Track de sound cloud</h4>
            </div>
            <div class="modal-body">    						
				<div class="col-md-12 col-md-12 col-sm-12 ">                                
                    <form role="form" id="form-arista-social-sound" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
                        <div class="input-group input-group-sm m-bot15">
                            <span class="input-group-addon">
                                URL de algún track de sound cloud
                            </span>
                            <input name="url"  id="url_sound" class="form-control" placeholder="" type="url" required>
        			     </div>
                        <input type='hidden' id='dinamic_artista_sound' name='dinamic_artista_sound'> 
                        

                        <!--************************ -->
                        <div class='panel  alert-ok-sm' id='alert-ok-sound' >
                            <em>
                                Datos actualizados
                            </em>
                        </div>
                        <div class='panel alert-fail-sm' id='alert-fail-sound'>
                            <em>
                                Falla al actualizar información, reporte al administrador 
                            </em>
                        </div> 
                        <!--************************ -->
                        <button class="btn btn-default btn_save pull-left" type="submit">
                            Registrar
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">            	
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div><!--Termina  modal-content-->
    </div>
</div>







<div class="modal fade" id="modal_nota" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Nota del artista </h4>
            </div>
            <div class="modal-body">                            
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <form  id="form-arista-nota"  action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <label for="nota_artista" class="control-label col-lg-12">
                                Mensaje del artista al público
                            </label>
                            <textarea class="form-control" id="nota_artista" name="nota_artista" required="">
                            </textarea>
                            <input type='hidden' name='idartistanota' id="idartistanota" >
                                                        
                        </div>                        
                        <div class="col-md-12 col-lg-12 col-sm-12">

                            <!--************************ -->
                            <div class='panel  alert-ok-sm' id='alert-ok-nota' >
                                <em>
                                   Mensaje para el público actualizado correctamente .!
                                </em>
                            </div>
                            <div class='panel alert-fail-sm' id='alert-fail-nota'>
                                <em>
                                    Falla al actualizar información, reporte al administrador 
                                </em>
                            </div> 
                            <!--************************ -->   
                            <button class="btn btn-default btn_save pull-left" type="submit">
                                Registrar
                            </button>
                        </div>
                    </form>
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
<!--Termina modal -->





<!--link youtube inicia -->
<div class="modal fade" id="modal_link_youtube" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Video publicitario de youtube 
                </h4>
            </div>
            <div class="modal-body">    
				<div class="col-md-12 col-lg-12 col-sm-12">
                    <form role="form" id="form-arista-social-youtube" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
                        <div class="input-group input-group-sm m-bot15">
			                 <span class="input-group-addon">
                                                URL video de youtube
                            </span>
			                 <input  id="url_youtube" class="form-control" placeholder="" type="url" required>
                            <input type='hidden' id='dinamic_artista_youtube' name='dinamic_artista_sound'> 
			             </div>
                        

                        <div class='panel  alert-ok-sm' id='alert-ok-youtube' >
                            <em>
                                Video de youtube actualizado
                            </em>
                        </div>
                        <div class='panel alert-fail-sm' id='alert-fail-youtube'>
                            <em>
                                Falla al actualizar información, reporte al administrador 
                            </em>
                        </div> 





                        <button class="btn btn-default btn_save pull-left" type="submit">
                                            registrar
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">            	
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div>
    </div>
</div>
<!--link youtube termina -->















<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="modal_record_horario" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
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
            <div class="modal-body">
                <div class='row'>
                        <div class='col-lg-6 col-md-6 col-sm-6'>                            
                                <label class="control-label col-lg-12">
                                    Hora de inicio
                                </label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="input-group bootstrap-timepicker">
                                        <input class="form-control timepicker-default" id="hiartista" name="hiartista" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-clock-o">
                                                </i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            
                        </div>  
                        <div class='col-lg-6 col-md-6 col-sm-6'>                            
                                <label class="control-label col-lg-12 col-md-12 col-sm-12">
                                Hora de término
                                </label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="input-group bootstrap-timepicker">
                                        <input class="form-control timepicker-default" id="htartista" name="htartista" type="text">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-clock-o">
                                                </i>
                                            </button>
                                        </span>
                                    </div>
                                </div>                            
                        </div>                        

                </div>

                <br>
                        <div class='col-lg-12 col-md-12 col-sm-12'>                                                           
                            <div class='alert-ok' id='alert-ok-horario'>
                                <em>
                                    Horario del artista actualizado .!
                                </em>                                
                            </div>
                            <div class='alert-fail' id='alert-fail-horario'>
                                <em>
                                    Falla al guardar cambios, reportar al administrador.
                                </em>
                            </div>
                            <button type="button" class="btn btn-default btn_save guardar_horario" >
                                Fijar horario de presentación
                            </button>
                        </div>
                <br>


            </div><!--Termina modal-body-->
            <div class="modal-footer">            	
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div><!--Termina modal-content -->
    </div>
</div>
























<!--Inicia modal -->
<div class="modal fade" id="modal-img-escenario-principal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                 &times;
                </button>

                <h4 class="modal-title" id="myModalLabel">
                    Cargar imagenes al escenario
                </h4>
            </div>
            <div class="modal-body">                        
                <div class='col-lg-12 col-md-12 col-sm-12'>                            
                    <div class='response' id="response">
                    </div>        
                    <div id='lista-imagenes'></div>
                </div>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_escenario" enctype="multipart/form-data" id='formulario-principal-img' >
                            <div class="form-group">
                                <input type="file" name="images[]"  id="imgs-escenario">
                                <input type='hidden' name="e" value='1'>
                            </div>                      
                        </form>
                    </div>        
                </div>
            </div>            
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">
                Cerrar
                </button>               
            </div>
        </div><!--Termina modal-content-->
    </div>
</div>
<!--Termina modal-->

































<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="modal-img-artista-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar foto del artista
                </h4>
            </div>
            <div class="modal-body">            
                <div class='response-img-artista' id='response-img-artista'>
                </div>
                <div class='col-lg-12 col-md-12 col-sm-12'>

                    <div class='lista-imagenes-artista' id='lista-imagenes-artista'>
                    </div>
                </div>
                <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post"  enctype="multipart/form-data" id='formulario-artista' >
                    <div class="form-group">
                        Foto del artista:
                        <input type="file" name="imagesartista[]"  id="imgs-arista">
                        <input type='hidden' name="e" value='1'>
                    </div>                      
                </form>
            </div>                    
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cerrar
                </button>                
            </div>
        </div><!--Termina  modal-content -->
    </div>
</div>
<!--TERMINA para definir la hora de inicio y termino en la presentación de un artista-->













<!--************************configura el status del artista en este escenario ***********************************-->
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="edit-status-confirmacion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar foto del artista
                </h4>
            </div>
            <div class="modal-body">                
                <div class='input-group'>
                    <span class="input-group-addon">
                            Estado de confirmación del artista
                    </span>
                    <select class='form-control' name='status-artista-evento' id='status-artista-evento'>                     
                        <option>
                            Seleccione
                        </option>
                        <option value='pendiente por confirmar'> 
                            Pendiente por confirmar
                        </option> 
                        <option value='Artista confirmado'>
                            Artista confirmado
                        </option> 
                        <option value='Cancela su asistencia' >
                            Cancela su asistencia 
                        </option> 
                        <option value='Promesa de asistencia'>
                            Promesa de asistencia
                        </option>                                        
                    </select>                                  
                </div>    
                <span id="response-update-status" class='response-update-status'> 
                </span>
                <input type='hidden' id='dinamic-artista'>
            </div>                        
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">
                Cerrar
                </button>                
            </div>
        </div><!--Termina modal-content-->
    </div>
</div>
<!--************************termina de  configura el status del artista en este escenario ***********************************-->


<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="edit-nombre-artista" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar foto del artista
                </h4>
            </div>
            <div class="modal-body">                                 
                <div class='col-lg-12'>
                    <div class="section-input input-group" >
                        <span class="input-group-addon">
                        Artista
                        </span>
                        <input type="text" class="form-control" id='nuevo-nombre-artista'>
                    </div>
                </div>
                <span id="response-update-nombre" class='response-update-nombre'>
                </span>                                                        
                <div class='col-lg-12'>
                    <button type="button" id='modifica-nombre-artista' class="btn btn-default" >
                     Modificar
                    </button>                
                </div>                                                                                              
            </div>
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div><!--Termina modal-content-->
    </div>
</div>
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->




<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_escenario['idevento'];?>"> 
<input type='hidden' name='nombre_evento' id='nombre_evento' value="<?=$nombre_evento?>"> 
<input type='hidden' name='base_path_img' id="base_path_img" class='base_path_img' value='<?=$base_path_img;?>'>
<input type='hidden' name='base_path' id='base_path' class='base_path' value='<?=$base_path;?>'>
<input type='hidden' name='id_escenario' id='id_escenario' class='id_escenario' value="<?=$id_escenario;?>">


<!---->
<input type='hidden' name='dinamic_artista' id='dinamic_artista' class='dinamic_artista'>
<input type='hidden' name='base_path_img_artista' id="base_path_img_artista" class='base_path_img_artista' value='<?=$base_path_img_artista;?>'>
<input type='hidden' name='base_path_artista' id='base_path_artista' class='base_path_artista' value='<?=$base_path_artista;?>'>
<!---->
<link href="<?=base_url('application/views/principal/dropzone.css')?>" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
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
<script type="text/javascript" src="<?=base_url('application/js/escenarios/escenario_artista.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/config.js')?>"></script>

<script type="text/javascript" src="<?=base_url('application/js/escenarios/img.js')?>"></script>

<script src="//connect.soundcloud.com/sdk-2.0.0.js"></script>

<script type="text/javascript">     
    
    $('#artista').keyup(function (e){ 

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

<style type="text/css">
.nombre-escenario-text:hover, .descripcion-escenario-text:hover {
    cursor: pointer;
    padding: 2px;
}
.section-descripcion-escenario-in, .section-nombre-evento-in {
    display: none;
}
#img-button-more-imgs:hover{
    cursor: pointer;
    font-size: 1.1em;
}
.section-fecha-type{
    background: #062735;
}
.section-input{
    display: none;
}
.nombre-escenario-text{
    color:  black;
}
.title_main{
    display: none;
}
.alert-ok-sm , .alert-fail-sm , .alert-ok , .alert-fail {
    display: none;
}
</style>

<?=ini_set('display_errors', '1');?>
