<!--Registro de eventos modal -->
<div class="modal fade" id="modal-nuevo-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar evento 
                </h4>
            </div>
            <div class="modal-body">                                                      
                <form  method="POST" id="nuevo-evento-form">                     
                    <div class="form-group">    
                        <label for="">Evento</label>                
                        <input name='nuevo_evento' placeholder="Evento ejemplo Gala Festival "  id='nombre-nuevo-evento' class="form-control col-lg-12 col-sm-12 col-md-12"  type="text">                    
                    </div>      
                    <!--Campos ocultos-->                   
                    <div class="form-group">                                                                                     
                        <div id='dinamic-field' class='dinamic-field'>
                            <label for="">
                                Edición
                            </label>
                            <input name='nueva_edicion' placeholder="Edición México 2015 " class="form-control col-lg-12 col-sm-12 col-md-12" type="text">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">                                                                                                                                     
                        <div class='col-lg-6 col-md-6 col-sm-6'>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears col-lg-12 col-sm-12 col-md-12"  >
                                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="nuevo_inicio"  type="text"  >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </div>    
                        <div class='col-lg-6 col-md-6 col-sm-6'>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears col-lg-12 col-sm-12 col-md-12" >
                                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="nuevo_termino"  type="text"  >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </div>    
                    </div>    
                    <!--alertas  -->
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <div class='success-alert' id='success-alert'>
                            <div class='panel  alert-ok'>
                                <em>
                                    Evento registrado .!
                                </em>
                            </div>
                        </div>                                
                        <div class='response-event' id='response-event'></div>
                    </div>                                
                    <!--Terminas alertas -->
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <button class="btn btn-default btn_save pull-right" type="submit">                        
                            Registrar
                        </button>                                  
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
<!--Termina el registro de eventos modal -->









<!--******************************************************************************************************************-->
<!--******************************************************************************************************************-->









<!--*************************    Modal update fecha del evento    ************************* -->
<div class="modal fade" id="modal-update-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>                
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-calendar-o">
                    </i> 
                    Fecha del evento 
                </h4>
            </div>
            <div class="modal-body">                
                <h4>
                    Actualizar fecha del evento 
                </h4>
                <form method="POST" class='update-fecha-evento-form' id="update-fecha-evento-form">
                    <input type="hidden" name='update_evento' id='update_evento'>
                    <div class="input-group">                        
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears"  >
                            <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" id="update_inicio" name="update_inicio" type="text"  >
                            <span class="input-group-btn add-on">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-calendar">
                                    </i>
                                </button>
                            </span>
                        </div>
                        <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears">
                            <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="update_termino"  type="text" id="update_termino"  >
                            <span class="input-group-btn add-on">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-calendar">
                                    </i>
                                </button>
                            </span>
                        </div>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                
            </div>
        </div>
    </div>
</div>
<!--************************* Termina Modal update fecha del evento    ************************* -->






<!--Cargar escenario al evento  modal inicia -->
<div class="modal fade" id="modal-nuevo-escenario-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>                
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-calendar-o">
                    </i>
                    Cargar escenario al evento 
                </h4>
            </div>
            <div class="modal-body">                
                <h4>
                    Nuevo escenario
                </h4>
                <!--***********************************  *****************************-->
                <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
                    <div class="form-group">  
                        <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
                    </div>
                    <button class="btn btn-default btn_save" type="submit">
                        Agregar
                    </button>
                </form>                    
                <!--***********************************  ***************************-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                                
            </div>
        </div>
    </div>
</div>
<!--Cargar escenario al evento  modal Termina  -->
