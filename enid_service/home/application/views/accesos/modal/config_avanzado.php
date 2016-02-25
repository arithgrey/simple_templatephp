<!--************************* ************************* ************************* ************************* -->
<div id="delete-punto-venta-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">      
            <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Eliminar</h4>
            </div>        
            <div class="modal-body">  
                <div class="modal-footer">
                    Realmente desea quitar punto de venta del evento?  
                    <button type="button" class="btn btn-default" id="aceptar-delete-punto-venta" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                      
                </div>
            </div>         
        </div>
    </div>
</div>
<!--************************* ************************* ************************* ************************* -->
<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<div id="confirma-delete-acceso" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Eliminar</h4>
        </div>        
        <div class="modal-body">  
            
            Realmente desea quitar de la lista el acceso??
            
            <div class='panel alert-fail' id='response-fail-delete'>
                <em>
                    Falla al eliminar el acceso, notificar al administrador 
                </em>
            </div>                          


            <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">Aceptar</button>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                      
            </div>
        </div>         
    </div>
  </div>
</div>
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->










<!--******************************* Cargar del acceso *********************************************-->
<div class="modal fade in" id="acceso-imagen-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class='modal-title title-modal-contacto'>Cargar portada del acceso, venta, promoción, preventa...  </h4>
            </div>
            <div class="modal-body">            
                <div class='row'>
                    <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_accesos" enctype="multipart/form-data" >
                             <div class="form-group">
                                <span>Imagen:</span>
                                <input type="file" name="images[]"  id="imgs-acceso" class='imgs-acceso'>                                       
                             </div>                      

                             <div class='askmks'></div>
                             <div class='row'>
                                <div class='col-sm-1 col-md-1 col-lg-1'></div>    
                                <div class='col-sm-10 col-lg-10 col-md-10 '>
                                    <div class='response_img_contacto' id='response_img_contacto'></div>
                                    <div class='lista-imagenes' id='lista-imagenes'></div>
                                </div>
                                <div class='col-sm-1 col-lg-1  col-md-1'></div>    
                             </div>

                    </form>
                </div>

                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>


<!--******************************* Cargar del acceso *********************************************-->
<div class="modal fade in" id="contactos-relacionados-punto-venta" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"  class='title-modal-contacto'>Contactos que han sido vinculados a  este punto de venta</h4>
            </div>
            <div class="modal-body">            
                <div class='row'>                  
                    <div class='col-sm-2 col-lg-2 col-md-2  ' ></div>
                    <div class='col-sm-8 col-lg-2  col-md-2 '>
                        <div class='contactos-punto-venta' id="contactos-punto-venta"></div>
                    </div>  
                    <div class='col-sm-2 col-lg-2  col-md-2'></div>
                </div>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <p class="lead">
                    <a href="<?=base_url('index.php/puntosventa/administrar')?>">
                        Administrador mis puntos de venta 
                    </a>
                </p>                
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                
            </div>
        </div>
    </div>
</div>


















<!--************Contenido de la tabla general ********************-->
<div id="editar-acceso" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">      
            <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Actualizar Ventas, promociones, preventas .... </h4>
            </div>        
            <div class="modal-body"> 
                <div class='row'>
                    <form class='dinamic-form-accesos' id='dinamic-form-accesos' action="<?=base_url('index.php/api/accesos/udpate_acceso_id/format/json/')?>" >
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' >                            
                            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                                <?= create_select( $tipos_accesos  , 'nuevo_tipo_acceso' , 'form-control  nuevo-tipo-acceso' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>
                                <input type="hidden" name="evento" id="evento" value="<?=$evento;?>">
                                <input type="hidden" name="acceso" id="acceso" class='acceso' value="">
                            </div>
                            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                                <div class="input-group m-bot15">
                                    <span class="input-group-addon">$</span>
                                    <input class="form-control" type="text" name='nuevo_precio' id='nuevo-precio'>
                                    <span class="input-group-addon ">.00</span>
                                </div>
                            </div>
                            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                                <div  class='col-md-6'>
                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                        <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_inicio_acceso" id="nuevo-inicio-acceso"  type="text"  >
                                        <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div  class='col-md-6'>
                                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                        <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_termino_acceso" id="nuevo-termino-acceso"  type="text"  >
                                        <span class="input-group-btn add-on">
                                            <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>                            
                            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                                <label>Nota adicional</label>
                                <div class="form-group">                        
                                    <textarea name='nueva_descripcion' id='nueva-descripcion' rows="6" class="form-control"></textarea>                       
                                </div>                
                            </div>
                            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' >


                                <div class='panel  alert-ok' id='alerta-accesos-edicio-ok' >
                                    <em>
                                        Modificaciones éxitosas .!
                                    </em>
                               </div>
                               <div class='panel alert-fail' id='alerta-accesos-edicio-fail'>
                                    <em>
                                        Falla al registrar modificaciones 
                                    </em>
                               </div>

                                <button class="btn btn-default btn_save  new-acceso">
                                    Guardar cambios 
                                </button>
                            </div>      
                    </form>
                </div><!--Termina row-->          
            </div><!--Termina modal body-->   
            <div class="modal-footer">                
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                      
            </div>
        </div>         
    </div>
</div><!--Termina contenido de la tabla general-->
</div>
</div>
<!--Termina la edición -->
