<!--Registro de eventos modal -->
<?=construye_header_modal('modal-nuevo-evento', " Registra evento " );?>                                                    
    <form  method="POST" id="nuevo-evento-form">                     
        <div class="form-group">    
            <label for="">
                Evento
            </label>                
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
                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control nuevo_inicio " name="nuevo_inicio"  type="text"  id="nuevo_inicio"  >
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
                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="nuevo_termino"  type="text"  id="nuevo_termino" >
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
            <div class='response-event' id='response-event'>
            </div>
        </div>                                
        <!--Terminas alertas -->
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <button class="btn btn-default btn_save pull-right" type="submit">                        
                            Registrar
            </button>                                  
        </div>                                                      
    </form>
    <div class='place_nuevo_evento'>
    </div>

    <!---
    <div class="animationload" id='loading_evento' style='display:none'>
        <div class="osahanloading">
        </div>
    </div>
        -->
<?=construye_footer_modal()?>  

<!--Termina el registro de eventos modal -->


<!--Cargar escenario al evento  modal inicia -->
<?=construye_header_modal('modal-nuevo-escenario-evento', " Cargar escenario al evento  " );?>                                                    
    <!--***********************************  *****************************-->
    <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
        <div class="form-group">  
            <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
        </div>
        <button class="btn btn-default btn_save" type="submit">
                        Agregar
        </button>
        <div class='place_nuevo_escenario'></div>
    </form>                    
<?=construye_footer_modal()?>  
<!--Cargar escenario al evento  modal Termina  -->

