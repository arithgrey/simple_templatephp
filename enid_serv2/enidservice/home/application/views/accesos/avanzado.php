<!--Menú  accesos -->
<header class="panel-heading custom-tab ">
    <ul class="nav nav-tabs">     
        <li>
            <a href="<?=base_url('index.php/eventos/nuevo/')?>/<?=$evento;?>">
                <i class="fa fa-home">
                </i> 
                    Evento 
            </a>
        </li>                            
        <li class="active">
            <a data-toggle="tab" href="#home3">
                <i class="fa fa-money">
                </i>
                    Accesesos y promociones
            </a>
        </li>
        <li class="section-puntos-venta">
            <a data-toggle="tab" href="#about3">
                <i class="fa fa-map-marker">
                </i> 
                    Puntos donde el cliente podrá adquirir sus accesos
            </a>
        </li>                            
        <li>
            <a href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento;?>">
                <i class="fa  fa-arrow-circle-o-right">
                </i>  
                Ver como el público
            </a>
        </li>
    </ul>
</header>























    <!--Termina  menú de accesos  -->
    
        <div class="tab-content">
            <div id="home3" class="tab-pane active">                                
                <div id='nuevoaccesosection' class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered '>
                    <a href="#print-section">
                        <button class='btn btn btn_nnuevo pull-right'>
                            <em>   
                                Promociones registradas 
                            </em>
                        </button>
                    </a>                    
                    <h1>
                        + Venta, promoción, preventa .... 
                    </h1>
                    <form id="form-new-acceso" action="<?=base_url('index.php/api/accesos/acceso/format/json')?>" method="post" >                    
                         <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    Acceso
                                </span>
                                <input class="form-control" type="text" class='input-sm' name='acceso_nombre' id='acceso_nombre' required >
                            </div>
                        </div>    
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >                                        
                            <?= create_select($tipos_accesos , 'tipo' , 'form-control nuevo-tipo-acceso ' , 'nuevo-tipo-acceso' , 'tipo' , 'idtipo_acceso');  ?>                
                        </div>
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered' >
                            <div class="input-group m-bot15">
                                <span class="input-group-addon">
                                    $
                                </span>
                                <input class="form-control input-sm" type="number"  class='input-sm' name='precio' id='precio-acceso-record' required>
                                <span class="input-group-addon ">
                                    .00
                                </span>
                            </div>
                        </div>
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-4 centered'>
                            <div  class='col-lg-6   col-md-6 col-sm-6'>
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
                            <div  class='col-lg-6 col-md-6 col-sm-6'>
                                <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="<?=now_enid()?>" class="input-append date dpYears"  >
                                    <input readonly="" value="<?=now_enid()?>" size="16" class="form-control input-sm" name="termino" id="termino-acceso-record"  type="text"  >
                                    <span class="input-group-btn add-on">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>                      
                        </div>
                        <input type="hidden" name="evento" id="evento" value="<?=$evento;?>">                    
                        
                        <div class='col-xs-12  col-sm-12 col-md-12 col-lg-12 centered'>
                            <label style='color:white;'>
                                Nota adicional
                            </label>
                            <div class="form-group">                        
                                <textarea name='descripcion' id='descripcion' rows="6" class="form-control input-sm">
                                </textarea>                       
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
                            <button class='botonExcel btn btn-default pull-left'  >
                                 Exportar a Excel 
                                 <i class="fa fa-file-pdf-o">
                                 </i> 
                             </button>  
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






        <?=$this->load->view("accesos/accesos_puntos_venta")?>
        </div>
    





<input class='base_path' id='base_path' type='hidden' value='<?=$base_path;?>'>
<input class='dinamic_acceso' id='dinamic_acceso' type='hidden'>
<input class='base_path_img' id='base_path_img' type='hidden' value="<?=$base_path_img;?>">
<input class='empresa' id="empresa" value="<?=$empresa;?>" type='hidden'>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/img.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?=base_url('application/js/js/bootstrap-datepicker/css/datepicker-custom.css')?>" />
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/moment.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/js/bootstrap-timepicker/js/bootstrap-timepicker.js')?>"></script>
<script src="<?=base_url('application/js/js/pickers-init.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/evento/accesos/avanzado.js')?>"></script>
<?=$this->load->view("accesos/modal/config_avanzado");?>
<style type="text/css">
    .delete-punto-venta-icon {
    position: absolute; /*Info sobre la imagen*/
    top: 5%;
    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
    zoom: 1;
    filter: alpha(opacity=0); /*Opacidad Para IE */
    opacity: 0; /*Inicialmente transparente */
    padding: 5px;
    color: white;
    background: black;
    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
    -webkit-transition:all ease .8s ;
    transition:all ease .8s;
    }
    .img-horizontal:hover .delete-punto-venta-icon{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }
    .delete_punto_venta_evento , .puntos_venta_contacto{
        cursor:pointer;
    }

    .title_main{
        display: none;
    }
    .alert-ok , .alert-fail{
        display: none;
    }
</style>





