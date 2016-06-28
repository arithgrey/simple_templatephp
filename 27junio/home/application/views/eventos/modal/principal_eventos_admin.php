<!--************************************CONFIRMAR  **********************************-->
<?=construye_header_modal('confirmationdeleteescenario', " Eliminar " );?>    
          ¿Realmente desea eliminar el escenario?
    <div class='pull-right'> 
      <button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">
              Aceptar
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
              Cancelar
      </button>                
    </div>
<?=construye_footer_modal()?>  




<?=construye_header_modal('serviciosmodal', " Servicios que incluirá el evento " );?>            
  <div class='panel'>
    <input type="hidden" value="<?=$evento;?>" id="eventoservicios"  class='eventoservicios' name='eventoservicios'>    
    <div class='servicios_in_evento'>
    </div>                                
    <div class='place_servicios_incluidos'>
    </div>
  </div>                            
<?=construye_footer_modal()?>  




<!--********************************HORARIO DE LOS ARTISTAS ********************************-->
<!---
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
            <div class="modal-body">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="tregistrohorario" data-dismiss="modal">
                  Guardar
                </button>                                                              
            </div>
        </div>
    </div>
</div>

-->









<!--********************************TERMINA HORARIO DE LOS ARTISTAS ********************************-->



<!--**********************************ACCESOS MODAL ************************************************-->




<!--
<div id="accesosmodal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          
           Registrar los accesos, promociones, preventas para acceder al evento
          
        </h4>          
      </div>

      <div class="modal-body ">
          <span>
            Evento <?=$fecha_evento;?>
          </span>
             
              <form class='form-accesos-modal' id="form-accesos-modal">
                <input type="hidden" value="<?=$evento;?>" id="evaccesos"  class='evaccesos' name='evaccesos'>                                                                                                                            
              
                
                <div class="input-group">                  
                    <span class="input-group-addon">
                      Acceso
                    </span>
                    <input name='nombre_acceso'  class="form-control" placeholder='Nombre de la promoción' id="nombre_acceso" >                                
                    <span class="input-group-addon">
                      Tipo acceso  
                    </span>
                    <?=$accesos_list;?>                  
                </div>                
                
                  
                <div class="input-group">
                  <span class="input-group-addon">
                    $ Precio 
                  </span>
                  <input type="number" name='precio-acceso-modal' class="form-control" id="precio_acceso">
                  <span class="input-group-addon ">
                    .00
                  </span>
                </div>
                   








                <div class='row'>
                  <div class='col-lg-8 col-md-8 col-sm-8'>
                    <div class="pull-left">                    
                      <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears"  >
                        <input readonly="" value="<?=now_enid();?>" class="form-control "  name="nuevo_inicio_acceso" id="nuevo_inicio_acceso"  type="text"  >
                        <span class="input-group-btn add-on">
                          <button class="btn btn-primary" type="button">
                            <i class="fa fa-calendar">
                            </i>
                          </button>
                        </span>
                      </div>                                                      
                    </div>  
                    <div class="pull-right">                    
                          <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears pull"  >
                            <input readonly="" value="<?=now_enid();?>"  class="form-control"  name="nuevo_termino_acceso" id="nuevo_termino_acceso" type="text"  >
                            <span class="input-group-btn add-on">
                              <button class="btn btn-primary" type="button">
                                <i class="fa fa-calendar">
                                </i>
                              </button>
                            </span>
                          </div>    
                    </div>
                  </div>  
                  <div class='col-lg-4 col-md-4 col-sm-4'>
                    <button  class="btn btn-default btn_save pull-right" type="submit" id="nuevo-acceso">
                          Registrar acceso
                    </button>  
                  </div>
                </div>      
                
                

              </form>
            

            <div class='col-md-12 col-lg-12 col-sm-12'>
              <div class='alert-ok' id='alert-ok-accesos'>
                <em>
                  Acceso cargado al evento .!
                </em>
              </div>
              <div class='alert-fail' id='alert-fail-accesos'>
                <em>
                  Falla al cargar el acceso al evento reportar al administrador 
                </em>
              </div>
            </div>  
            <div class='col-md-12 col-lg-12 col-sm-12'>
              <div class='list-accesos-modal'></div>
            </div>
           
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


-->























































<!--***********************************TERMINA ACCESOS MODAL *************************-->
<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<!---
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
                      Realmente desea quitar de la lista el acceso??
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
-->
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->


<!--***********************************INICIA SERVICIOS MODAL  *************************-->














<!--***********************************Restricciones   *************************-->
<?=construye_header_modal('templa-restricciones', " Restricciones del evento" );?>     
  
  <div class='panel'>
    <div class='restricciones_tmp_seccion'>
    </div>
    <div class='place_restricciones_tmp_seccion'>
    </div>
  </div>      

 
<?=construye_footer_modal()?>







<!--**********************************************-->  
<?=construye_header_modal('templa-politicas', "  Políticas del evento" );?>               
        
        <div class='panel'>
          <div class='politicas_tmp_seccion'>
          </div>
          <div class='place_politicas_tmp_seccion'>
          </div>
        </div>      
         
<?=construye_footer_modal()?>

          








<!--***********************************TERMINA  SERVICIOS MODAL  *************************-->
<?=construye_header_modal('templa-descripcion-contenido', " Usar plantilla de eventos " );?>    
       

   <div class='panel'>
    <div class='experiencias_tmp_seccion'>
    </div>
    <div class='place_experiencias_tmp_seccion'>
    </div>


  </div>              
   
<?=construye_footer_modal()?>










<!--************************* Modal update fecha del evento    ************************* -->
<?=construye_header_modal('edith_fecha_modal', " Fecha del evento  " );?>     
                <form method="POST" class='update-fecha-evento-form' id="update-fecha-evento-form">
                        <div class='row'>
                          <div class='form-group'>
                            <input type="hidden" name='update_evento' id='update_evento'>                        
                            <div class='col-lg-6 col-ms-6 col-sm-6'>
                            <div class="input-group">                      
                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears" >
                                  <input readonly="" value="<?=now_enid();?>" size="16" class="form-control"  id="update_inicio" name="update_inicio"   type="text"  >
                                  <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button">
                                      <i  class="fa fa-calendar"></i>
                                    </button>
                                  </span>
                                </div>                                                                                                                                

                            </div>                              
                            </div>
                            <div class='col-lg-6 col-ms-6 col-sm-6'>
                            <div class="input-group">                      
                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears">
                                  <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" id="update_termino" name="update_termino"  type="text"  >
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
                          <div class='col-lg-12 col-ms-12 col-sm-12'>
                            <button class="btn btn-default btn_save">
                              Registrar cambios
                            </button>                    
                          </div>                    
                        </div>
                </form>   
                <div class='place_fecha_evento'>
                </div>
                                 
<?=construye_footer_modal()?>














<!---->
<?=construye_header_modal('tipo-evento', " Tipo de evento " );?> 
  <div class="input-group">
      <div class="input-group-addon">
                  Tipo
      </div>          
      <select name="tipo-evento" id='tipo-evento-select' class='form-control'>
        <option value='Evento público' >
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
  <div class='place_tipo_evento'>
  </div>                        
<?=construye_footer_modal()?>





<?=construye_header_modal('modal-img-evento-section', " Portada del evento  " );?> 

  <div class='seccion_form_portada'>
  </div>
  <div class='place_form_portada'>
  </div>
<?=construye_footer_modal()?>  
        


<?=construye_header_modal('modal_social_evento', "Redes sociales del evento " );?>         
  <form class="form-horizontal" id='form_social' action="<?=base_url('index.php/api/event/urlbyid/format/json/');?>" >                                                                               
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-facebook ">
        </i> 
      </span>                    
      <input class="form-control input-sm" name='url_social_evento' type="text" id="url_social" placeholder="La url de tu evento en Facebook"  value="<?=$data_evento['url_social']?>">
    </div>  
    <div class='place_social_1'>
    </div>                                                                                             
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-youtube-play">
        </i>
      </span>
      <input class="form-control" name='url_social_evento_youtube' type="text" id="url_social_evento_youtube" placeholder="La url de tu canal en youtube"  value="<?=$data_evento['url_social_youtube']?>">
    </div>  
    <div class='place_social_2'>
    </div>      
    <br> 
    <button class='btn btn btn_nnuevo pull-right'>
      Actualizar
    </button>
  </form>
  <div class='place_social'>
  </div>                                       
<?=construye_footer_modal()?>  




<?=construye_header_modal('modal_tematica_evento', " Temática del evento " );?> 
  <!--Temática ******************************************** Temática **************+-->      
  <a id="tematica-button" class="btn section-left  tematica-button" style="font-size:.9em; text-align:center;"   >              
      <i class="fa fa-tree">
      </i> 
                              Temática              
  </a>
  <div>               
      <form class="form-horizontal" id='form-tematica'>                                   
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-tree">
              </i>
            </span>
            <select class="form-control m-bot15" id="tematica_select" name="tematica_select">
            </select>

          </div>         
      </form>         
      <div class='place_tematica'>
      </div>      
  </div>            
  <!--end Temática ******************************************** End Temática **************+-->
<?=construye_footer_modal()?>  
