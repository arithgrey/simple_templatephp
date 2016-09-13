<?=construye_header_modal('modal-nuevo-escenario-evento', " Cargar escenario al evento  " );?>    
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
<!--Registro de eventos modal -->




<?=construye_header_modal('modal-nuevo-evento', " Registrar evento");?>        
    <div class='place_nuevo_evento'>
    </div>    
    <form  method="POST" id="nuevo-evento-form">                                         
        <label>
            Nombre del evento
        </label>                
        <input name='nuevo_evento' placeholder="Evento ejemplo Gala Festival "  id='nombre-nuevo-evento' class="form-control input-sm"  type="text">                            
        <div class='place_nombre'>
        </div>                    
        <div>
            <label>
                Edición del evento 
            </label>    
            <input name='nueva_edicion' placeholder="Edición México 2015 " class="form-control input-sm" type="text">
        </div>                                                                


        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class='calendar-1'>        
                    <label class='text-inicio'>
                        Día Inicio    
                    </label>                    
                    <input type="" data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  id="fecha_inicio" class='form-control input-sm'  name="nuevo_inicio" size="10" required >                        
                </div>        
                <div class='calendar-2'>    
                    <label class='text-termino'>
                        Día  Termino                 
                    </label>        
                    
                    <input  type="" name="nuevo_termino"  data-date-format="yyyy-mm-dd" value="<?=now_enid();?>"  
                        id="fecha_termino"  class='form-control input-sm' size="10" required>                
                </div>
            </div>            
        </div> 
        <div class="row">
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <span class='place_format_fecha'>                    
                </span>
            </div>    
        </div>
        

        <br>
        <button class="btn btn-default btn_save" type="submit">                        
            Registrar
        </button>                                                          
    </form>                
<?=construye_footer_modal()?>  

