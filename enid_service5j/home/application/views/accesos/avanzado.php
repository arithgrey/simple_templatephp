<div>          
  <ul class="nav nav-pills" role="tablist">
    <li class="active">
      <a aria-expanded="true" href="<?=base_url('index.php/eventos/nuevo')?>/<?=$data_evento['idevento']?>">
        <i class='fa fa-star'>
        </i>     
        <?=$data_evento["nombre_evento"]?>        
      </a>
    </li>        
    <!---->
    <li>    
      <a href="<?=base_url('index.php/eventos/accesosalevento')?>/<?=$data_evento['idevento']?>" >
        <i class="fa  fa-arrow-circle-o-right"> 
        </i>     
        Ver como el público    
      </a>
    </li>
  </ul>        
</div>







<!--Sección izquierda -->
    <div class='col-lg-8 col-md-8 col-sm-12 '>   
        <br>
        <div class='row'>
            <button id="nuevo-acceso-button" title="Registrar contacto" type="button" class="btn btn btn_nnuevo" data-toggle="modal" data-target="#nuevo-acceso-modal">                
                + Cargar acceso
            </button>                    
        </div>
        <div>                                                     
            <div class='place_list_accesos'>
            </div>
            <div class='list-accesos' id='list-accesos'>                    
            </div>                           
        </div>
    </div>   
    <!--Sección derecha inicia puntos de venta  -->
    <div class='col-lg-4 col-md-4  col-sm-12'>
        <div>
            <div>
                <div  class='seccion_pv'>
                    <h1 class='titulo_pv'>
                        <strong class='titulo_pv'>
                            Puntos de venta asociados al evento
                        </strong>
                    </h1>                
                    <hr>                    
                    <div class='panel'>
                        <div class='panel-content'>
                            <div class='panel-body'>                                                                                        
                                <div class='info_pv'>
                                </div>  
                                <div class ='list-puntos-venta-icon' id='list-puntos-venta-icon' >
                                </div>                        
                                <br>
                                <br>                        
                                <div class='busqueda_input ' >     
                                    <span>
                                   + Nuevo punto de venta
                                    </span>                   
                                    <div class="input-group">                                      
                                        <div class="input-group-addon"> 
                                        <i class='fa fa-search'>
                                        </i>                                        
                                        </div>
                                        <input placeholder="Punto de venta"  class="form-control search-punto-venta input-sm"  name='punto_venta' id='search-punto-venta' placeholder='Nombre del punto de venta' title='Con ésta opción puedes indicar al público dónde adquirir sus accesos'>                            
                                    </div>
                                </div>
                            </div>                                        
                        </div>                                        
                    </div>

                   
                   
                    <!-- ultimas actividades -->
                    <div class="panel-body " >                                        
                        <div class='place_delete_pv'>
                        </div>
                        <div id='response-dinamic-punto-venta'>
                        </div> 
                        <div class='place_puntos_venta_agregados'>
                        </div>
                        <div class ='list-puntos-venta-icon' id='list-puntos-venta-icon' >
                        </div>        
                    </div>
                    <!--Ultimas Actividades -->
                </div> 

                <div class='resultados_busqueda'>
                    <div class='list-posibles-puntos' id="list-posibles-puntos">
                    </div> 
                </div>
                   

            </div>
        </div>
    </div>





<!--Sección derecha puntos de venta  termina -->
<input type='hidden' name='evento' id='evento' class='evento' value="<?=$data_evento['idevento']?>">
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
    }.imgagen_acceso{
      width: 30%;
    }
    .text-descripcion-acceso{
        font-size: .8em;        
    }
    .nombre_acceso{
        background: rgb(32, 116, 155) none repeat scroll 0% 0%;
        color: white !important;
        margin-left: 10px;
        border-radius: 1px;
        padding: 1px;    
    }.delete-acceso:hover , .img_acceso:hover{
        cursor: pointer;
    }
    .menu_accesos{
        background: #046188;
        /*#3C5E79*/
        /*#046188*/
        /*#166781 !important*/
        padding: 15px;
    }
    .seccion_accesos_registrado{
        background: #166781;
    }    
    .seccion_pv{                
        background: #166781 !important;
        padding: 10px;
    }
    .titulo_pv{
        color: white !important;
        font-size: 1.8em;
    }

</style>








