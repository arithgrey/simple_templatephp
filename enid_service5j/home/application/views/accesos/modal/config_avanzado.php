<?=construye_header_modal('nuevo-acceso-modal', " Registra promoción " );?>      
    <span class='place_registro_acceso'>
    </span>
    <form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post" >                                        
        <div class='col-lg-12 col-md-12  col-sm-12'>        
            <div class="input-group m-bot15">
                <span class="input-group-addon">
                Acceso a promocionar
                </span>
                <input  type="text" class='form-control input-sm acceso_input' name='acceso_nombre' id='acceso_nombre' required >
            
            </div>
            <span class='place_nombre_promo_vali validado'>
            </span>            
        </div>
        <div class='col-lg-12 col-md-12  col-sm-12'>               
            <div class="input-group m-bot15">
                <span class="input-group-addon">
                Tipo de promoción
                </span>                                 
            <?=create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>                
            </div>                  
        </div>
        <div class='col-lg-12 col-md-12  col-sm-12' >
            <div class="input-group m-bot15">
                <span class="input-group-addon">
                    $
                </span>
                <input class="form-control input-sm" type="number"  name='precio' id='precio-acceso-record' maxlength='3' required>
                <span class="input-group-addon ">
                    .00
                </span>
                
            </div>            
            <div class='place_msj_precio'>
            </div>
        </div>
                
        <div class='col-lg-6 col-md-6 col-sm-6'>
            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
            <input readonly="" value="<?=now_enid()?>" size="16" class="form-control input-sm" name="inicio" id="inicio-acceso-record" type="text"  >
                <span class="input-group-btn add-on">
                    <button class="btn btn-primary" type="button">
                        <i class="fa fa-calendar">
                        </i>
                    </button>
                </span>
            </div>
        </div>
        <div class='col-lg-6 col-md-6 col-sm-6'>
            <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
            <input readonly="" value="<?=now_enid()?>" size="16" class="form-control input-sm" name="termino" id="termino-acceso-record"  type="text"  >
                    <span class="input-group-btn add-on">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-calendar">
                            </i>
                        </button>
                    </span>
                </div>
            </div>                      
                    
        <div class='col-lg-12 col-md-12 col-sm-12'>
            
            <div>
                <label>
                Nota adicional
                </label>
                <div class="form-group">                        
                    <textarea name='descripcion' id='descripcion' rows="6" class="form-control input-sm">
                    </textarea>                       
                </div>                
            </div>                        
        </div>    
                    
        <div class='col-lg-12 col-md-12 col-sm-12'>                                                                         
            <button class="btn btn-default btn_save  acceso-registro-button">
            Registrar acceso 
            </button>
                            
        </div>                      
    </form>   
<?=construye_footer_modal()?>  










<!--************************* ************************* ************************* ************************* -->
<?=construye_header_modal('delete-punto-venta-modal', " Eliminar " );?>                
Realmente desea quitar punto de venta del evento?  
<button type="button" class="btn btn-default" id="aceptar-delete-punto-venta" data-dismiss="modal">
    Aceptar
</button>
<button type="button" class="btn btn-default" data-dismiss="modal">
    Cancelar
</button>                      
                
<?=construye_footer_modal()?>   
<!--************************* ************************* ************************* ************************* -->






<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<?=construye_header_modal('confirma-delete-acceso', " Eliminar " );?>    
 
    <span class='place_remov_acceso'>  
    </span>
    Realmente desea quitar de la lista el acceso??                
    <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">
        Aceptar
    </button>            
<?=construye_footer_modal()?>   
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->










<!--******************************* Cargar del acceso *********************************************-->
<?=construye_header_modal('acceso-imagen-modal', " Imagen " );?>    
    <div class='place_img_acceso'>
    </div>
    <div class='imagenes_acceso_form'>
    </div>
<?=construye_footer_modal()?>   




<!--******************************* Cargar del acceso *********************************************-->
<?=construye_header_modal('contactos-relacionados-punto-venta', " Contactos  vinculados al  este punto de venta " );?>    
    <div class='contactos-punto-venta' id="contactos-punto-venta">
    </div>
<?=construye_footer_modal()?>                                                       
            

















<!--************Contenido de la tabla general ********************-->
<?=construye_header_modal('editar-acceso', " Configurar  promoción " );?>    
    
    <center>
        <div class='place_editar_acceso'>
        </div>
    </center>
    <form class='dinamic-form-accesos' id='dinamic-form-accesos' action="<?=base_url('index.php/api/accesos/udpate_acceso_id/format/json/')?>" >
        

            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <?= create_select( $tipos_accesos  , 'nuevo_tipo_acceso' , 'form-control  nuevo-tipo-acceso' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>
                
                <input type="hidden" name="acceso" id="acceso" class='acceso' value="">
            </div>
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <div class="input-group m-bot15">
                    <span class="input-group-addon">
                    $
                    </span>
                    <input class="form-control" type="text" name='nuevo_precio' id='nuevo-precio'>
                    <span class="input-group-addon ">
                                        .00
                    </span>
                </div>
            </div>
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <div  class='col-md-6'>
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                        <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_inicio_acceso" id="nuevo-inicio-acceso"  type="text"  >
                        <span class="input-group-btn add-on">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-calendar">
                                </i>
                            </button>
                        </span>
                    </div>
                </div>
                <div  class='col-md-6'>
                    <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                    <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="nuevo_termino_acceso" id="nuevo-termino-acceso"  type="text"  >
                        <span class="input-group-btn add-on">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-calendar">
                                </i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>                            
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                <label>
                Nota adicional
                </label>
                <div class="form-group">                        
                    <textarea name='nueva_descripcion' id='nueva-descripcion' rows="6" class="form-control">
                    </textarea>                       
                </div>                
            </div>
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' >               
                <button class="btn btn-default btn_save  new-acceso">
                    Guardar cambios 
                </button>
            </div>      
            </form>               
<!--Termina la edición -->
<?=construye_footer_modal()?>                                                       



