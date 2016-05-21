<script type="text/javascript" src="<?=base_url('application/js/puntosventa/principal.js')?>"></script>

<div class="container">
    <div class="row dinamic_campo_tb" id="print-section " style='display:none;'>
        <div class="center-block" id='punto-venta-resumen'>
            <?=$resumen_puntos_venta;?>
        </div>
        
        <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">
            <button class='botonExcel btn btn-default pull-right col-md-2 '  > 
                Exportar a Excel 
                <i class="fa fa-file-pdf-o">
                </i> 
            </button>  
            <input type="hidden" id="datos_a_enviar" name="datos_a_enviar">
        </form>
    </div>
</div>    

<div class="container">
    <div class="row">        
        <!--Para cargar nuevo-->
        <div class='col-lg-12'>
            <div class='row'>
                <button id="nuevo-contacto-button" type="button" class="btn btn btn_nnuevo pull-left" data-toggle="modal" data-target="#contact-modal">
                    + Nuevo punto de venta
                </button>
            </div>
            <br>
        </div>    

        <!--Termina-->    
        <div class='row section-busqueda-enidservice' title='Filtro criterio'>            
                
                <div class='col-lg-4 col-md-3 col-sm-12' title='Filtro criterio'>                    
                    <div class="input-group">
                        <div class="input-group-addon">
                            Punto de venta 
                        </div>
                        <input list='razon_social' name='puntos_venta_filtro' id='puntos-venta-filtro' class='puntos-venta-filtro  input-sm form-control' >
                        <?=$puntos_venta_nombres;?>    
                    </div>
                </div>
                <div class='col-lg-3 col-md-3 col-sm-12' title='Filtro criterio'>            
                    <div class="input-group">
                        <div class="input-group-addon">Estado</div>                
                        <select name='estado_punto_venta' id='estado_punto_venta' class='estado_punto_venta form-control input-sm'>
                            <?=$estados_puntos_venta?>
                        </select>                
                    </div>
                </div>    
                <div class='col-lg-3 col-md-3 col-sm-12' title='Filtro criterio'>                                
                    <div class="input-group">
                        <div class="input-group-addon">
                            Zona
                        </div>                
                        <select name='busqueda-zona' class='form-control input-sm' id="busqueda-zona" >
                            <?=lista_zonas_punto_venta();?>
                        </select>
                    </div>    
                </div> 
                <div class='col-lg-2 col-md-3 col-sm-12' title='Filtro criterio'>                                   
                    <button class="btn btn_busqueda pull-right" id='busqueda-btn'>
                        Buscar
                    </button>
                </div>

            </div>
        <div class='msj_upload' id='msj_upload'></div>
        




        <div class='stado-usuarios' id='stado-usuarios'>
        </div>
        <div id="puntos-venta-list">            
            <?=$puntos_venta;?>
        </div>
        <a href="<?=base_url('index.php/inicio/eventos/')?>">
            <button type="button"class="btn btn-default next-to">
                Ir a la sección de eventos
            </button>
        </a>                                
        <a href="<?=base_url('index.php/directorio/contactos')?>">
            <button type="button"class="btn btn-default next-to">
                Ir a la sección de contactos
            </button>
        </a>                                
        </div>
    </div>
</div>


<script type="text/javascript" src="<?=base_url('application/js/puntosventa/img.js')?>"></script>

<?=$this->load->view("puntosventa/modal/principal_config")?>
<style type="text/css">
 #resultado-filtro-contactos-div, #busqueda-contactos-section{
        display: none;
    }
    #text-busqueda-contactos{
        padding: 10px;
    }
    #text-busqueda-contactos:hover{
        cursor: pointer;
        background: #1A6174;
        color: white;
    }
    .header-table{
        background: #10B9D5 none repeat scroll 0% 0%;
        text-align: center !important;
    }
    .status-registro{
        display: none;
    }
    .img_punto_venta:hover , .nota-punto-venta:hover , .contactos:hover , .editar-punto-venta:hover , .delete-punto-venta:hover{
        cursor: pointer;
    }





.delete-contacto-icon {
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
.img-horizontal:hover .delete-contacto-icon{
    filter: alpha(opacity=80);
    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
}

</style>


