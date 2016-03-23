<!--************************************CONFIRMAR  **********************************-->
<div id="confirmationdeleteescenario" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">            
          ¿Realmente desea eliminar el escenario?
          <div class='pull-right'> 
            <button type="button" class="btn btn-default" id="aceptar-delete" data-dismiss="modal">
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
<!--************************************TERMINA CONFIRMAR  **********************************-->
 
<!--********************************HORARIO DE LOS ARTISTAS ********************************-->
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
            <div class="modal-body"><!--inicia panel body-->  
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
            </div><!--Termina panel body-->                        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="tregistrohorario" data-dismiss="modal">
                  Guardar
                </button>                                                              
            </div>
        </div><!--TERMINA *********************-->
    </div>
</div>










<!--********************************TERMINA HORARIO DE LOS ARTISTAS ********************************-->



<!--**********************************ACCESOS MODAL ************************************************-->
<div id="accesosmodal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header"><!--Inicia el header -->
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          
           Registrar los accesos, promociones, preventas para acceder al evento
          
        </h4>          
      </div><!--Termina el header -->

      <div class="modal-body "><!-- dialog body -->           
          <span>
            Evento <?=$fecha_evento;?>
          </span>
             <!--************FORMULARIO DE REGISTRO   ****************-->                
              <form class='form-accesos-modal' id="form-accesos-modal">
                <input type="hidden" value="<?=$evento;?>" id="evaccesos"  class='evaccesos' name='evaccesos'>                                                                                                                            
                <!--Nombre del acceso -->
                
                <div class="input-group">                  
                    <span class="input-group-addon">
                      Acceso
                    </span>
                    <input name='nombre_acceso'  class="form-control" placeholder='Nombre de la promoción' id="nombre_acceso" >                                
                    <!--Termina nombre del acceso -->                                       
                    <!--Inicia tipo de evento -->                    
                    <span class="input-group-addon">
                      Tipo acceso  
                    </span>
                    <?=$accesos_list;?>                  
                </div>                
                <!--Termina tipo de evento -->  
                <!--INICI  Precio de evento  -->
                
                  
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
                <!--TERMINA fecha del evento termino  -->
                
                

              </form>
            

            <!--Alertas para el registro de los accesos -->
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
            <!--Termina  Alertas para el registro de los accesos -->
            <!--************INICIA LA LISTA DE PRECIOS DEL EVENTO ****************-->
            <div class='col-md-12 col-lg-12 col-sm-12'>
              <div class='list-accesos-modal'></div>
            </div>
            <!--************TERMINA  LA LISTA DE PRECIOS DEL EVENTO ****************-->
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

<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->


<!--***********************************INICIA SERVICIOS MODAL  *************************-->
<div id="serviciosmodal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          Servicios que incluirá el evento
        </h4>
      </div>            
      <div class="modal-body">                  


         <div>
          <a href="<?=base_url('index.php/eventos/config_eventos')?>/<?=$evento;?>">
            <button class='btn btn-default'>
              <i class='fa fa-cogs'></i>
              Configuración avanzada
            </button>
          </a>

          <a href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$evento;?>">
                <button class="btn btn-default pull-right">
                Ver como el público
              </button>            
              </a>

         </div>   

        <!--Servicios del evento  -->
        <div class='panel  alert-ok-sm' id='alert-servicios-ok'>
          <em>
            Datos actualizados
          </em>
        </div>
        <div class='panel alert-fail-sm' id='alert-servicios-fail'>
          <em>
          Falla al actualizar 
          </em>
        </div> 

        <!--Termina servicios dele evento -->


        <div class='panel'>
          <input type="hidden" value="<?=$evento;?>" id="eventoservicios"  class='eventoservicios' name='eventoservicios'>
          <div class='servicios-evento-modal'>
          </div>                            
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



<!--***********************************Restricciones   *************************-->
<div id="templa-restricciones" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">
          Restricciones del evento
        </h4>
      </div>            
      <div class="modal-body">                  

        <div class='row'>
          <div class='alert-ok'  id='alert-ok-tmp-restricciones'>
            Restricción cargada correctamente .! 
          </div>
          <div class='alert-fail' id='alert-fail-tmp-restricciones'>
            <em>
              Falla al cargar plantilla de restricciones, notifique al administrador.! 
            </em>
          </div>
        </div>

        <div class='panel'>
          <?=$plantilla_restricciones;?>                        
        </div>
        <!--Link para registrar plantillas-->        
        <div class='row'>
          <div class='container'>
            <a href="<?=base_url('index.php/templates/eventos')?>">
              <em>
                Registrar una lista de restricciones, esta herramienta 
                te permitirá cargar una y ser ocupada en diferentes eventos.            
              </em>
            </a>
          </div>
        </div>        
        <!--Termina  Link para registrar plantillas-->        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--**********************************************-->
<div id="templa-politicas" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">Políticas del evento</h4>
      </div>            
      <div class="modal-body">                  
        <div class='row'>
          <div class='alert-ok' id='alert-ok-tmp-politicas'>
            <em>
              Politicar cargada al evento correctamente.!
            </em>
          </div>
          <div class='alert-fail' id='alert-fail-tmp-politicas'>
            <em>
              Falla al registrar política al evento, notificar al administrador.
            </em>
          </div>

        </div>
        <div class='panel'>
          <?=$plantilla_politicas;?>                        
        </div>      
        <!--Link para registrar plantillas-->        
        <div class='row'>
          <div class='container'>
          <a href="<?=base_url('index.php/templates/eventos')?>">
            <p>
              Registrar una lista de políticas, esta herramienta 
              te permitirá cargar una y ser ocupada en diferentes eventos.            
            </p>
          </a>
          </div>

        </div>        
        <!--Termina  Link para registrar plantillas-->             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

          
<!--***********************************TERMINA  SERVICIOS MODAL  *************************-->
<div id="templa-descripcion-contenido" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
         Usar plantilla de eventos
        </h4>
        <em>
          Da click en tu plantilla  para cargar tu descripción, los cambios se verán reflejados automáticamente en la sección, descripción del evento. 
        </em>
      </div>      


      
      <div class="modal-body"> 
        <div class='alert-ok' id='alert-ok-plantilla-evento'>
          <em>
            Plantilla cargada correctamente, ésta podrá ser editada cuando lo desee.! 
          </em>
        </div>        
        <div class='alert-fail' id='alert-fail-plantilla-evento'>
          <em>
            Error al cargar plantilla, reportar al administrador
          </em>
        </div>     
        <div class='panel'>
          <?=$plantillas_descripcion;?>                                    
        </div>              
         <a href="<?=base_url('index.php/templates/eventos')?>">
            <em>
                Registrar más plantillas, con esta herramienta 
                tendrás listo en cada evento texto pre cargado listos para ser utilizado.
            </em>
          </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>





<!--************************* Modal update fecha del evento    ************************* -->
<div class="modal fade" id="edith_fecha_modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>            
              <h4 class="modal-title" id="myModalLabel">
                <i class="fa fa-calendar-o">
                </i> Modificar la fecha del evento 
              </h4>
            </div>
            <div class="modal-body">      

                <div class="alert alert-ok" id='aler-ok-fecha'>
                  Fecha actualizada correctamente
                </div>
                <div class='alert-fail' id='alert-fail-fecha'>
                  Falla al actualizar la fecha del evento notifique al administrador de la cuenta  
                </div>                        
                <!---->
                <form method="POST" class='update-fecha-evento-form' id="update-fecha-evento-form">
                        <div class='row'>
                          <div class='form-group'>
                            <input type="hidden" name='update_evento' id='update_evento'>                        
                            <div class='col-lg-6 col-ms-6 col-sm-6'>
                            <div class="input-group">                      

                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears" >
                                    <input readonly="" value="<?=now_enid();?>" size="16" class="form-control"  id="update_inicio" name="update_inicio"   type="text"  >
                                  <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cerrar
                </button>                                
            </div>
        </div>
    </div>
</div>





<!---->
<div class="modal fade" id="tipo-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>            
            <h4 class="modal-title" id="myModalLabel">
              Tipo de evento
            </h4>
            </div>
            <div class="modal-body">                              
              <div class="input-group">
                  <div class="input-group-addon">
                            Tipificación del evento
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
                  <!--Mandamos alertas -->
                   <div class='panel  alert-ok' id='alerta-tipo-evento-ok' >
                      <em>Datos registrados</em>
                   </div>
                   <div class='panel alert-fail' id='alerta-tipo-evento-fail'>
                    <em>Falla al registrar </em>
                   </div>
                  <!--Terminamos de mandar alertas  -->


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  Cerrar
                </button>                                
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-img-evento-section" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               Cargar imagenes al evento
            </h4>
        </div>
        <div class="modal-body">  
              <div class='response-img-upload' id="response-img-upload">
              </div>        
              <div class='lista-imagenes' id="lista-imagenes">
              </div> 
              <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_evento" enctype="multipart/form-data" >
                <div class="form-group">
                        Imagen:<input type="file" name="images[]"  id="imgs-evento-input">                            
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
