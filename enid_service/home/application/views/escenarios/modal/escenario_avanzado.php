





<!--********************************************INICIAN MODALS   INICIAN MODALS  INICIAN MODALS  INICIAN MODALS   ********************* -->


<!--*********************** ***********************   ***********************  ***********************  ***********************  -->
<div class="modal fade" id="modal_tipo_artista" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
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
                <h4 class="modal-title" >
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
                <h4 class="modal-title">
                    Track de sound cloud
                </h4>
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
                <h4 class="modal-title" >Nota del artista </h4>
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
                <h4 class="modal-title">
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
                <h4 class="modal-title">
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

                <h4 class="modal-title" >
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
                <h4 class="modal-title" >
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










<!---->



<div class="modal fade" id="modal-platilla-escenarios" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    Cargar plantilla para la descripción del escenario
                </h4>
            </div>
            <div class="modal-body">                
                

                <div class='alert-ok' id='alert-ok-plantilla'>
                    <em>
                        Contenido cargado al escenario.!
                    </em>
                </div>
                <div class='alert-fail' id="alert-fail-plantilla">
                    <em >
                        Error al cargar plantilla, reporte al administrador
                    </em>
                </div>
                <div class='list-plantilla-escenario' id='list-plantilla-escenario'></div>
                <a href="<?=base_url('index.php/templates/escenarios')?>">
                    <em>
                        Registrar más plantillas, con esta herramienta tendrás listo en cada escenario 
                         textos pre cargados listos para ser utilizado. 
                    </em>
                </a>                
            </div>                        
            <div class="modal-footer">                

                

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div><!--Termina modal-content-->
    </div>
</div>




































<!--************************configura el status del artista en este escenario ***********************************-->
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<div class="modal fade" id="edit-status-confirmacion" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" >
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
                <h4 class="modal-title" >
                    Modificar el nombre del artista
                </h4>
            </div>
            <div class="modal-body">                                 
                
                    <div class="section-input input-group" >
                        <span class="input-group-addon">
                        Artista
                        </span>
                        <input type="text" class="form-control" id='nuevo-nombre-artista'>
                    </div>
                
                <span id="response-update-nombre" class='response-update-nombre'>
                </span>                                                        
                <br>    
                <button type="button" id='modifica-nombre-artista' class="btn btn-default" >
                Modificar
                </button>                
                
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





































