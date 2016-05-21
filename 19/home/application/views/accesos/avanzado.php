
    <!--Sección izquierda -->
    <div class='col-lg-8 col-md-8 col-sm-12 '>    
        <div class="panel ">
            
                <div>
                    <button id="nuevo-acceso-button" title="Registrar contacto" type="button" class="btn btn btn_nnuevo" data-toggle="modal" data-target="#nuevo-acceso-modal">                
                    + Cargar acceso
                    </button>
                    
                    <div class='pull-right mas-info' style='font-size: .7em;padding: 5px; margin-left:1px;' >
                        <i class='fa fa-chevron-down'>
                        </i>  + info
                    </div>                    
                    
                    <div class='pull-right menos-info' style='font-size: .7em;padding: 5px; margin-left:1px; display:none;' >
                        <i class='fa fa-chevron-up'>
                        </i>  - info
                    </div>                        
                    <a href="<?=base_url('index.php/eventos/accesosalevento/')?>/<?=$evento;?>" >
                        <div class='pull-right' style='background: #2A323F;color: white;font-size: .7em;padding: 5px;' >
                            Ver como el público
                        </div>
                    </a>                                       
                </div>
               <div style='display:none' class='section-resumen'>
                    <hr>
                    <div class='puntos-venta-accesos-evento' id='puntos-venta-accesos-evento' >
                        <?=$resumen_puntos_venta_asociados;?>                    
                    </div>        
                    <div class='resumen-acceso-evento' id="resumen-acceso-evento">            
                        <?=$resumen_accesos;?>                        
                    </div>                          
                    <hr>   
                </div>            
            <hr>
            <div>
                <div class='response_img_acceso' id='response_img_acceso'>
                </div>
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
                <div class='list-accesos' id='list-accesos'>
                    <?=$accesos_in_event;?> 
                </div>
            </div>

        </div>    
    </div>   
    <!--Sección izquierda termina -->
    <!--Sección derecha inicia puntos de venta  -->
    <div class='col-lg-4 col-md-4  col-sm-12 '>
        <div class="panel section_activity_eventos">
            <div class="panel-body">

                <div class="profile-desk">
                    <h1>
                        ¿Donde adquirir los accesos?

                    </h1>                
                    <hr>
                    <div class='resultados-busqueda-enid'>
                    <center>
                        <span style='font-size:.85em;  color:white;'>
                            Puntos de venta ya agregados al evento
                        </span>                                            
                        <div class ='list-puntos-venta-icon' id='list-puntos-venta-icon' >
                        </div>
                    </center>    
                    </div>
                    <hr>
                    <center>
                        <div class="input-group">                                      
                            <div class="input-group-addon"> 
                            <i class='fa fa-search'></i>                                        
                            </div>
                            <input placeholder="Punto de venta"  class="form-control search-punto-venta input-sm"  name='punto_venta' id='search-punto-venta' placeholder='Nombre del punto de venta' title='Con ésta opción puedes indicar al público dónde adquirir sus accesos'>                            
                        </div>                                       
                    </center>
                    <hr>
                      <div class='list-posibles-puntos' id="list-posibles-puntos"></div> 
                    <hr>


                    <!-- ultimas actividades -->
                    <div class="panel-body " >                
                        
                        <div id='response-dinamic-punto-venta'>
                        </div> 
                        <div class ='list-puntos-venta-icon' id='list-puntos-venta-icon' >
                        </div>        
                    </div>
                    <!--Ultimas Actividades -->
                </div>                
            </div>
        </div>
    </div>
<!--Sección derecha puntos de venta  termina -->







<input class='dinamic_acceso' id='dinamic_acceso' type='hidden'>
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
    

    .info-punto-venta{
    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
    -webkit-transition:all ease .8s ;
    filter: alpha(opacity=0); /*Opacidad Para IE */
    left: 10%; 
    opacity: 0; /*Inicialmente transparente */        
    position: absolute; /*Info sobre la imagen*/    
    transition:all ease .8s;
    zoom: 1;
    }

    .delete-punto-venta-icon {
    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
    -webkit-transition:all ease .8s ;
    background: black;
    color: white;
    filter: alpha(opacity=0); /*Opacidad Para IE */
    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
    opacity: 0; /*Inicialmente transparente */
    padding: 5px;
    position: absolute; /*Info sobre la imagen*/
    top: 5%;
    transition:all ease .8s;
    zoom: 1;
    }
    .img-horizontal:hover .delete-punto-venta-icon{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }

    .img-horizontal:hover .info-punto-venta{
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
    .section-header-title{
        display: none;
    }
    .info-punto-venta:hover{
        cursor: pointer;
    }
</style>






