<!--Registro de eventos modal -->
<?=construye_header_modal('modal-nuevo-evento', " Registra evento " );?>                                                    
        <form  method="POST" id="nuevo-evento-form">                             
            <div class='row'>
                <div class='col-lg-12 col-md-12 col-sm-12'>
                    <div>
                        <label>
                            Evento
                        </label>                
                        <input name='nuevo_evento' placeholder="Evento ejemplo Gala Festival "  id='nombre-nuevo-evento' class="form-control input-sm"  type="text">                            
                        <div class='place_nombre'>
                        </div>
                    </div>
                    <div>                                                                                     
                        <div id='dinamic-field' class='dinamic-field'>
                            <label>
                                Edición del evento 
                            </label>    
                            <input name='nueva_edicion' placeholder="Edición México 2015 " class="form-control input-sm" type="text">
                        </div>
                    </div>                                                                                                                                           
                </div>
                <div class='calendarios-evento'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <div class='col-lg-12 col-md-12 col-sm-12'>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears">
                            <input readonly="" value="<?=now_enid();?>" size="10" class="form-control nuevo_inicio " name="nuevo_inicio"  type="text"  id="nuevo_inicio">
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </div>    
                        <div class='col-lg-2 col-md-2 col-sm-2'></div>
                        <div class='col-lg-12 col-md-12 col-sm-12'>
                            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears" >
                            <input readonly="" value="<?=now_enid();?>" size="10" class="form-control" name="nuevo_termino"  type="text"  id="nuevo_termino" >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </button>
                                </span>
                            </div>
                        </div>   
                    </div>                         
                </div>    



                <div>            
                    <div class='response-event' id='response-event'>
                    </div>
                </div>                                
                <div>
                    <button class="btn btn-default btn_save pull-right" type="submit">                        
                        Registrar
                    </button>                                  
                </div>                                                      
                
            </div>    
        </form>        
        <div class='place_nuevo_evento'>
        </div>
<?=construye_footer_modal()?>  






























<!--Termina el registro de eventos modal -->


<!--Cargar escenario al evento  modal inicia -->
<?=construye_header_modal('modal-nuevo-escenario-evento', " Cargar escenario al evento  " );?>                                                    
    <!--***********************************  *****************************-->
    <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
        <div class="form-group">  
            <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
            <div class='place_nombre_escenario'>
            </div>
        </div>
        <button class="btn btn-default btn_save" type="submit">
            + Registrar
        </button>
        <input type='hidden' name='evento_escenario' class='evento_escenario'>
        <div class='place_nuevo_escenario'>
        </div>
    </form>                    
<?=construye_footer_modal()?>  
<!--Cargar escenario al evento  modal Termina  -->
