<?=construye_header_modal('modal_tipo_artista', " Tipo de partición " );?>        
<form action='<?=base_url('index.php/api/escenario/artista_tipo/format/json/')?>' id='tipo-artista-form' class='tipo-artista-form'>                        
        <div class="input-group">                                    
            <div  class='col-lg-8 col-md-8 col-sm-8 '>                                        
                <div class="form-group">            
                    <div class="input-group m-bot15">
                        <span class="input-group-addon">
                        Tipo de participación
                        </span>                                                                                             
                            <select name='tipo_artista'  class='tipo_escenario form-control' id='tipo_escenario'> 
                            <option value=''>Ninguno
                            </option>
                            <option value='Estelar'>Estelar
                            </option>
                            <option value='Especial'>Especial
                            </option>
                            <option value='Apertura'>Apertura
                            </option>
                            <option value='General'>General
                            </option>                                
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
            
                <div class='place_tipo_artista'>                 
                </div>                                        
            <!--Alertas  terminan -->
        </div>                                
</form>                    
<?=construye_footer_modal()?>  






<!--*********************** ***********************   ***********************  ***********************  ***********************  -->
<!---->


<?=construye_header_modal('modal-date-escenario', " Presentación  " );?> 
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
                <div class='place_fechas_evento'>                       
                </div>
        </form>
<?=construye_footer_modal()?>  







<!---->
<?=construye_header_modal('modal_link_sound', " Track de sound cloud  " );?>			                        
    <form role="form" id="form-arista-social-sound" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
        <div class="input-group input-group-sm m-bot15">
            <span class="input-group-addon">
            URL de algún track de sound cloud
            </span>
             <input name="url"  id="url_sound" class="form-control" placeholder="" type="url" required>
        	</div>
        <input type='hidden' id='dinamic_artista_sound' name='dinamic_artista_sound'>                         
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
    <div class='place_url_sound'></div>
<?=construye_footer_modal()?>  





<?=construye_header_modal('modal_nota', " Un poco del artista  " );?>        
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

            <div class='place_nota_artista'>
            </div>
           
            <!--************************ -->   
            <button class="btn btn-default btn_save pull-left" type="submit">
            Registrar
            </button>
        </div>
    </form>
<?=construye_footer_modal()?>  
<!--Termina modal -->













<!--link youtube inicia -->
<?=construye_header_modal('modal_link_youtube', " Video  " );?>  
    <form role="form" id="form-arista-social-youtube" class="form-inline" action="<?=base_url('index.php/api/escenario/escenario_artista_social/format/json/')?>">
        <div class="input-group input-group-sm m-bot15">
			<span class="input-group-addon">
                URL video de youtube
            </span>
			<input  id="url_youtube" name='url' class="form-control" placeholder="" type="url" required>
            <input type='hidden' id='dinamic_artista_youtube' name='dinamic_artista_sound'> 
			</div>            
            <button class="btn btn-default btn_save pull-left" type="submit">
                Registrar
            </button>
    </form>
    <div class='place_url_youtube'>
    </div>
<?=construye_footer_modal()?> 
<!--link youtube termina -->

















<?=construye_header_modal('modal_record_horario', " Horario de presentación  " );?>  
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>                            
            <span class='artista_estado_actual pull-right'>
            </span>
        </div>
    </div>
    <br>

    <div class='row'>
        <div class='col-lg-6 col-md-6 col-sm-6'>                            
                <label class="control-label">
                                    Hora de inicio
                </label>
                <div class="">
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
                <label class="control-label">
                                Hora de término
                </label>
                <div class="">
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
        <div class='place_horario_artista'>
        </div>       
        <button type="button" class="btn btn-default btn_save guardar_horario" >
            Fijar horario de presentación
        </button>
    </div>
                
<?=construye_footer_modal()?> 



















<!--Inicia modal -->
<?=construye_header_modal('modal-img-escenario-principal', " Imagenes " );?>  
    <?php /*$this->load->view("imgs/escenario")*/?>
    <div class='imagenes_escenario_form'>
    </div>
    <div class='place_img_escenario'>
    </div>
<?=construye_footer_modal()?> 
<!--Termina modal-->

































<!--modal para definir la hora de inicio y termino en la presentación de un artista-->

<?=construye_header_modal('modal-img-artista-evento', " El artísta" );?>  
    <?php /*$this->load->view('imgs/artistas')*/?>
    <div class='imagenes_artista_form'>
    </div>
    <div class='place_img_artista'>
    </div>
<?=construye_footer_modal()?> 
<!--TERMINA para definir la hora de inicio y termino en la presentación de un artista-->










<!---->
<?=construye_header_modal('modal-platilla-escenarios', " Usar plantilla " );?>
    <div class='place_tmp_escenario'>
    </div>
    <div class='tmp_escenario'>
    </div>
<?=construye_footer_modal()?> 
           








<!--************************configura el status del artista en este escenario ***********************************-->
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->
<?=construye_header_modal('edit-status-confirmacion', " Estado del artista en el evento " );?>               
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
    <span id="place_estatus_artista" class='place_estatus_artista'> 
    </span>
    <input type='hidden' id='dinamic-artista'>                        
<?=construye_footer_modal()?>           
<!--************************termina de  configura el status del artista en este escenario ***********************************-->





<!--modal para definir la hora de inicio y termino en la presentación de un artista-->

<?=construye_header_modal('edit-nombre-artista', " Nombre del artista " );?>                              
    <div class="input-group" >
        <span class="input-group-addon">
        Artista
        </span>
        <input type="text" class="form-control" id='nuevo-nombre-artista'>
    </div>
                
    <span id="place_nombre_artista" class='place_nombre_artista'>
    </span>                                                        
    <br>

    <button type="button" id='modifica-nombre-artista' class="btn btn-default" >
        Modificar
    </button>                
<?=construye_footer_modal()?>    
<!--modal para definir la hora de inicio y termino en la presentación de un artista-->


























<!--Cargar escenario al evento  modal inicia -->
<?=construye_header_modal('modal-nuevo-escenario-evento', " Cargar escenario al evento  " );?>                                                        
    <div class='estado_registro_escenario'></div>
    <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
        <div class="form-group">  
            <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
        </div>
        <button class="btn btn-default btn_save" type="submit">
        Agregar
        </button>
    </form>                    
<?=construye_footer_modal()?>  
<!--Cargar escenario al evento  modal Termina  -->






<!---->
<?=construye_header_modal('modal_delete_artista', "Eliminar artista del escenario  " );?>                                                        
    ¿Realmente desea eliminar el artista del escenario 
    <div class='pull-right'> 
      <button type="button" class="btn btn-default" id="aceptar_delete_artista" data-dismiss="modal">
        Aceptar
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Cancelar
      </button>                
    </div>
    <div class='place_delete_artista'>
    </div>
<?=construye_footer_modal()?>  