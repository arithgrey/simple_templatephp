<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/avanzado.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/css/eventos/edicion.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>


<section class="panel">
    <header class="blue-col-enid panel-heading custom-tab turquoise-tab">
    <ul class="nav nav-tabs blue-col-enid">
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
                                
    </ul>
    </header>
    <div class="panel-body " style="">
        <div class="tab-content">
            <div id="home3" class="tab-pane active">
                                    
            <!--************Tabla general ********************-->
                
                
            
            <div style='background:#EAF4F8;'>
                <div class='list-accesos' id='list-accesos'>
                    <?=$accesos_in_event;?> 
                </div>      
            </div>      
                    
                        
                






        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' style="background:#DEE0A6; padding:50px;" >
            <h1>+ Venta, promoción, preventa .... </h1>
        <form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post" >
            
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <select class='form-control' name='tipo' class='nuevo-tipo-acceso' id='nuevo-tipo-acceso'> 
                    <?=$tipos_accesos;?>
                </select>                           
            </div>
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <div class="input-group m-bot15">
                <span class="input-group-addon">$</span>
                <input class="form-control" type="number" name='precio' id='precio-acceso-record' required>
                <span class="input-group-addon ">.00</span>
            </div>
            </div>
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <div class="input-group" >
                    <input class="form-control dpd1" name="inicio" id="inicio-acceso-record" type="text" required>
                    <span class="input-group-addon"></span>
                    <input class="form-control dpd2" name="termino" id="termino-acceso-record" type="text" required>
                </div> 
            </div>
            <input type="hidden" name="evento" id="evento" value="<?=$evento;?>">
            
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                <label>Nota adicional</label>
                <div class="form-group">                        
                    <textarea name='descripcion' id='descripcion' rows="6" class="form-control"></textarea>                       
                </div>                
            </div>

            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-1 centered' >
                <button class="btn btn-info acceso-registro-button">Registrar </button>
            </div>      
         </form>            
        </div>      


                <!--Termina el nuevo -->
            </div>
        <div id="about3" class="tab-pane">

            <!--Puntos de venta se asocian -->


            <div class="col-sm-12">
                <section class="panel">                    
                <div class="container">
                    <div class="btn-group pull-right">
                        <button type="button" id="marcar-puntos-venta-todos" class="btn btn-primary btn-sm"><i class="fa fa-check-square-o"></i> Marcar todos</button>                                
                    </div>   
                    <div class='puntos-venta-evento'>
                        <?=$puntos_venta;?>
                    </div>
                </div>
                </section>
            </div>

            <!--Termina asociar evento a los puntos de venta -->



        </div>





        </div>
    </div>
</section>























    

























    
<!--***********************************INICIA   CONFIRMAR DELETE ACCESOS MODAL *************************-->
<div id="confirma-delete-acceso" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">      
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Eliminar</h4>
        </div>        
        <div class="modal-body">  
                 <div class="modal-footer">
                      Realmente decea quitar de la lista el acceso??
                      <button type="button" class="btn btn-default" id="aceptar-delete-acceso" data-dismiss="modal">Aceptar</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                      
                  </div>
         </div>         
      </div>
    </div>
  </div>
</div>
<!--***********************************TERMINA  CONFIRMAR DELETE ACCESOS MODAL *************************-->







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
                    <form class='dinamic-form' id='dinamic-form' action='' method='post'>

        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered' >
            
            
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                <select class='form-control' name='nuevo_tipo_acceso' class='nuevo-tipo-acceso' id='nuevo-tipo-acceso'> 
                <?=$tipos_accesos;?>
            </select>
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
                <div class="input-group" >
                    <input class="form-control dpd1" name="nuevo_inicio_acceso" id="nuevo-inicio-acceso" type="text" required>
                    <span class="input-group-addon"></span>
                    <input class="form-control dpd2" name="nuevo_termino_acceso" id="nuevo-termino-acceso" type="text" required>
                </div> 
            </div>
            
            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                <label>Nota adicional</label>
                <div class="form-group">                        
                    <textarea name='nueva_descripcion' id='nueva-descripcion' rows="6" class="form-control"></textarea>                       
                </div>                
            </div>


            <div class='col-xs-12  col-sm-12 col-md-12 col-lg-1 centered' >
                <button class="btn btn-info new-acceso">Guardar</button>
            </div>      
            
        </form>
        </div>          


    </div>  





                 <div class="modal-footer">
            
                      
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                      
                  </div>
         </div>         
      </div>
    </div>
  </div>
</div>

<!--Termina la edición -->

    
