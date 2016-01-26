



<?=ini_set('display_errors', '1');?>
<section class="panel">
    <header class="blue-col-enid panel-heading custom-tab turquoise-tab">
        <ul class="nav nav-tabs blue-col-enid">     
            <li class="">
                <a  href="<?=base_url('index.php/eventos/nuevo/')?>/<?=$evento;?>">
                <i class="fa fa-home"></i> 
                Evento 
                </a>
            </li>                            
            <li class="active">
                <a data-toggle="tab" href="#home3">
                <i class="fa fa-money"></i>
                Accesesos y promociones
                </a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#about3">
                <i class="fa fa-map-marker"></i> Puntos donde el cliente podrá adquirir sus accesos
                </a>
            </li>                            
            <li class="">
                <a href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento;?>">
                    <i class="fa  fa-arrow-circle-o-right"></i>  Ver como el público 
                </a>
            </li>
        </ul>
    </header>
    <div class="panel-body  panel-body-enid" >

        <div class="tab-content">
            <div id="home3" class="tab-pane active">                                
                <div id='nuevoaccesosection' class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered section-nuevo-acceso'>
                    <a href="#print-section">
                        <button class='btn btn btn_nnuevo pull-right'>
                            <em>   Promociones registradas </em>
                        </button>
                    </a>                    
                    <h1 style='color:white;'>+ Venta, promoción, preventa .... </h1>
                    <form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post" >                    
                         <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">Acceso</span>
                                <input class="form-control" type="text" name='acceso_nombre' id='acceso_nombre' required>
                            </div>
                        </div>    
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >                                        
                            <?= create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>                
                        </div>
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">$</span>
                                <input class="form-control" type="number" name='precio' id='precio-acceso-record' required>
                                <span class="input-group-addon ">.00</span>
                            </div>
                        </div>
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered'>
                            <div  class='col-lg-6   col-md-6 col-sm-6'>
                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                        <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="inicio" id="inicio-acceso-record" type="text"  >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>
                            <div  class='col-lg-6 col-md-6 col-sm-6'>
                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                        <input readonly="" value="<?=now_enid()?>" size="16" class="form-control" name="termino" id="termino-acceso-record"  type="text"  >
                                <span class="input-group-btn add-on">
                                    <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>                      
                        </div>
                        <input type="hidden" name="evento" id="evento" value="<?=$evento;?>">                    
                        
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                            <label style='color:white;'>Nota adicional</label>
                            <div class="form-group">                        
                                <textarea name='descripcion' id='descripcion' rows="6" class="form-control"></textarea>                       
                            </div>                
                        </div>
                        





                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' >

                            <div class='panel  alert-ok' id='response-ok-registro' >
                                <em>
                                    Acceso registrado correctamente .!
                                </em>
                            </div>
                            <div class='panel alert-fail' id='response-fail-registro'>
                                <em>
                                    Falla al registrar, el acceso , notificar al administrador 
                                </em>
                            </div>                          
                            <button class="btn btn-default btn_save  acceso-registro-button">
                                Registrar acceso 
                            </button>
                        </div>      
                     </form>            
                </div>      
                <!--Termina el nuevo -->        
                <!--************Tabla general ********************-->
                <div class='col-sm-12 col-lg-12  col-md-12 col-lg-12 well' style='background:white !important;'> 
                    <div class='print-section' id="print-section">
                        <div class='resumen-acceso-evento' id="resumen-acceso-evento">            
                            <?=$resumen_accesos;?>                        
                        </div>  
                        <br>    
                        <div class='list-accesos' id='list-accesos'>
                            <?=$accesos_in_event;?> 
                        </div>            
                    </div>
                    <div class='col-lg-12 col-md-12 col-sm-12'>                                                                    
                        

                        


                        <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion" class='pull-right'>
                            <button class='botonExcel btn btn-default pull-left'  > Exportar a Excel <i class="fa fa-file-pdf-o"></i> </button>  
                            <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
                        </form>
                        <div class='panel  alert-ok' id='response-ok-delete' >
                            <em>
                                Se ha eliminado el acceso del evento 
                            </em>
                        </div>
                    </div>            
                </div>    
            </div>


        <div id="about3" class="tab-pane">
            <!--Puntos de venta se asocian -->            
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered section-nuevo-acceso' >                
                <section class="panel">            
                    <div class="container">
                        <div id="section-nuevo-punto-venta">                            
                        <h1 style='color: #166781;'>Asociar puntos de venta al evento </h1>                            
                            <form class='form-dinamic-punto-venta' id='form-dinamic-punto-venta'>                                                                                
                                <div class='col-lg-8 col-md-8  col-sm-12'>
                                    <div class="input-group">               
                                        <span class="input-group-addon" id="sizing-addon1" title='Con ésta opción puedes indicar al público dónde adquirir sus accesos' >
                                                    Encuentra tu punto de venta 
                                        </span>
                                        <div>                                                          
                                            <input class="form-control search-punto-venta"  list ='list_razon_social' name='punto_venta' id='search-punto-venta' placeholder='Nombre del punto de venta' title='Con ésta opción puedes indicar al público dónde adquirir sus accesos' >                                                  
                                            <div class='list-posibles-puntos' id="list-posibles-puntos">
                                            </div>
                                        </div>      
                                    </div>                                                    
                                </div>      
                                <div class='col-lg-4 col-md-4  col-sm-12'>
                                    <div class="input-group ">                                                             
                                        <button class='btn btn-default btn_save'>
                                                    Asociar punto de venta al evento ahora.! 
                                        </button>
                                    </div>
                                </div>                                                                                        
                            </form>
                            <br>
                            <br>
                                <div class='row'>
                                    <div class='response-asociacion' id="response-asociacion">
                                </div>       
                            <hr>
                            
                            <a href="<?=base_url('index.php/puntosventa/administrar/')?>">
                                <button type="button"class="btn btn btn_nnuevo">
                                + Cargar más puntos de venta a la empresa
                                </button>                            
                            </a>         
                            <br>

                            
                            
                            
                            <div class='puntos-venta-accesos-evento' id="puntos-venta-accesos-evento">
                                <?=$resumen_puntos_venta_asociados;?>                    
                            </div>                                 
                            <div class='puntos-venta-evento' id="puntos-venta-evento">
                                <?=$puntos_venta;?>
                            </div>
                            
                            <br>
                          
                        </div>        <br><br>

                    </div>
                </section>                
                
            </div>
            <br>    
            <br>    
        <!--Termina asociar evento a los puntos de venta -->
        </div>
        </div>
    </div>
</section>

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
                    Realmente decea quitar el vinculo entre el punto de venta y este evento ??
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









<input class='base_path' id='base_path' type='hidden' value='<?=$base_path;?>'>
<input class='dinamic_acceso' id='dinamic_acceso' type='hidden'>
<input class='base_path_img' id='base_path_img' type='hidden' value="<?=$base_path_img;?>">
<input class='empresa' id="empresa" value="<?=$empresa;?>" type='hidden'>



<!--******************************* Cargar del acceso *********************************************-->
<div class="modal fade in" id="acceso-imagen-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Cargar portada del acceso, venta, promoción, preventa...  </h4>
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
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Contactos que han sido vinculados a  este punto de venta</h4>
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

<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/img.js')?>"></script>
<style type="text/css">
.delete_punto_venta_evento , .puntos_venta_contacto{
    cursor:pointer;
}
.section-nuevo-acceso, .section-nuevo-punto-venta{
    background: #166781;  padding:50px;
}
.title_main{
    display: none;
}
.alert-ok , .alert-fail{
    display: none;
}
</style>
<?=ini_set('display_errors', '1');?>


<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>


<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/avanzado.js')?>"></script>




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




