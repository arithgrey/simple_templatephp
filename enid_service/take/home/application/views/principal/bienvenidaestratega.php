<button class='btn btn btn_nnuevo' title='Registra un nuevo evento para el público' data-toggle="modal" data-target="#modal-nuevo-evento">+  Nuevo Evento <i class='fa fa-headphones'></i></button>
<hr>

<div class="modal fade" id="modal-nuevo-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar evento 
                </h4>
            </div>
            <div class="modal-body">                                                      
                <form  method="POST" id="nuevo-evento-form">                     
                    <div class="form-group">    
                        <label for="">Evento</label>                
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
                                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="nuevo_inicio"  type="text"  >
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
                                <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="nuevo_termino"  type="text"  >
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
                        <div class='response-event' id='response-event'></div>
                    </div>                                
                    <!--Terminas alertas -->
                    <button class="btn btn-default btn_save pull-right" type="submit">                        
                        Registrar
                    </button>                                                                                        
                    </div>                                                                                                 
                </form>                                                           
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

























<!---->
                        
            
    
            <div class="row">

                <div class="col-md-8" style="">


                    <div class="row">

                        <div class="col-md-12 col-lg-12 col-sm-12">




                            


                            <div class="panel" >
                                <header class="panel-heading blue-col-enid" > 
                                    Últimos eventos anunciados                                     
                                    <?=$pagination_event;?>
                                    <span class="tools pull-right">                                        
                                        
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>                                        
                                     </span>
                                </header>                                
                                <div class="panel-body" style="background:  none repeat scroll 0% 0% #124048">                                                        
                                    <!--last 5 -->
                                    <?=$ultimos_eventos;?>
                                    <!--Termina-->
                                </div>

                            </div>
                            
                        
                        </div>


                    </div>
                </div>
                
                 <div class="col-md-4" style="">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <div class="panel" style="background: black">
                                <header class="panel-heading" style='color: white'>
                                    Tendencias
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                                        <a class="fa fa-times" href="javascript:;"></a>
                                     </span>
                                </header>
                                <div class="panel-body" style="background: #F3F8FB">
                                    <ul class="activity-list">
                                       
                                       

                                        <li>
                                            <div class="avatar">
                                                <img src="images/photos/user3.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> <span>attended a meeting with</span>
                                                    <a href="#">John Doe.</a></h5>
                                                <p class="text-muted">2 days ago near Alaska, USA</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="images/photos/user4.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> <span>completed the task “wireframe design” within the dead line</span></h5>
                                                <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="avatar">
                                                <img src="images/photos/user5.png" alt="">
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="#">Jonathan Smith</a> <span>was absent office due to sickness</span></h5>
                                                <p class="text-muted">4 days ago near Alaska, USA</p>
                                            </div>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                       
            </div>

        


















<!--*************************        Modal update fecha del evento    ************************* -->
<div class="modal fade" id="modal-update-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-o"></i> Fecha del evento </h4>
            </div>
            <div class="modal-body">
                
                <h4>Actualizar la fecha del evento </h4>

                <!---->

                <form method="POST" class='update-fecha-evento-form' id="update-fecha-evento-form">
                    <input type="hidden" name='update_evento' id='update_evento'>
                    <div class="input-group">                        
                                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears"  >
                                                        <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" id="update_inicio" name="update_inicio" type="text"  >
                                                        <span class="input-group-btn add-on">
                                                            <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                </div>

                                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid();?>" class="input-append date dpYears">
                                                        <input readonly="" value="<?=now_enid();?>" size="16" class="form-control" name="update_termino"  type="text" id="update_termino"  >
                                                        <span class="input-group-btn add-on">
                                                            <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                </div>

                    </div>
                    <span class="help-block" >Fecha del evento </span>
                    <button class="btn btn-info">Guardar</button>
                    
                    <div class="alert alert-success" id="update-susses" role="alert">Cambios registrados </div>
                </form>                    
                <!---->







                                            



















            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                
            </div>
        </div>
    </div>
</div>
<!--pickers plugins-->


















































<div class="modal fade" id="modal-nuevo-escenario-evento" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-calendar-o"></i> Agregar escenario al evento </h4>
            </div>
            <div class="modal-body">                
                <h4>Nuevo escenario</h4>
                <!--***********************************  *****************************-->
                <form method="POST" class='registra-nuevo-escenario-form' id="registra-nuevo-escenario-form">                    
                    <div class="form-group">  
                        <input type="text" class="form-control" id="nuevo-escenario" name='nuevoescenario' placeholder='Nombre del escenario' required >
                    </div>
                    <button class="btn btn-default btn_save" type="submit">Agregar</button>
                </form>                    
                <!--***********************************  ***************************-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                                
            </div>
        </div>
    </div>
</div>





























<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<!--pickers initialization-->
<script type="text/javascript" src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />



<script type="text/javascript" src="<?=base_url('application/js/estratega/evento/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/escenarios/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/accesos/principal.js')?>"></script>

<style type="text/css">
#dinamic-field , #success-alert{
    display: none;
}
#scroll{
        border:1px solid;            
        overflow-y:scroll;
        overflow-x:hidden;
}
</style>

