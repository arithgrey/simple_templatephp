<div class="container">    
    <div class="print-section dinamic_campo_tb" id="print-section" style='display:none;'>
        <hr>
        <div class="center-block" id='resumen-contactos'>
            <?=$resumen;?>
        </div>        
        <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">         
            <button class='botonExcel btn btn-default pull-right'> 
                Exportar a Excel 
                <i class="fa fa-file-pdf-o">
                </i> 
            </button>  
            <input type="hidden" id="datos_a_enviar" name="datos_a_enviar"/>
        </form>
        <hr>
    </div> 
</div>    







<div class="container" title='Filtrar por criterio'>
            
    <button id="nuevo-contacto-button" title='Registrar contacto' type="button" class="btn btn btn_nnuevo" data-toggle="modal" data-target="#contact-modal">                
            + Nuevo contacto
    </button>
    <div class='alert-ok' id="response-delete-ok">
        <em>
                    Contacto registrado con éxito.!
        </em>
    </div>  
    <div class='alert-fail' id="response-delete-fail">
        <em>
                    Error al eliminar el contacto, notifique al administrador.
        </em>
    </div>                
    <!--Inicioa  formulario de búsqueda  -->    
    <form method='GET' action="" id='form-filtro' >

        <div class='row'>
            <div class='col-lg-4 col-md-4 col-sm-12'>
                <div class="form-group" >        
                    <div class="input-group">
                        <div class="input-group-addon">
                                    Contacto 
                        </div>
                        <input type="text" list="contactos-lista" class="form-control" id="contacto-name"  name='contacto-name' placeholder="Nombre del contacto">                      
                        <?=$list_contactos_name;?>
                    </div>
                </div>
            </div>
            <div class='col-lg-4 col-md-4 col-sm-12'>
                <div class="form-group" >
                    <div class="input-group">
                        <div class="input-group-addon">
                                    Tel de contacto 
                        </div>
                        <input type="tel" class="form-control" id="contacto-tel-filtro" name='contacto-tel-filtro' placeholder="51153433..">                      
                    </div>
                </div>             
            </div>
            <div class='col-lg-3 col-md-3 col-sm-12'>
                <div class="form-group" >
                    <div class="input-group">
                        <?=$lista_tipo;?>
                    </div>
                </div>      
            </div>      
            <div class='col-lg-1 col-md-1 col-sm-12'>
                <div class="form-group pull-right" >        
                    <button class='btn btn_busqueda' type='submit'>
                                Buscar
                    </button>
                </div>
            </div>
        </div>                
    </form>    


    <div class='response_img_contacto' id='response_img_contacto'>
    </div>        
    <!--Termina  formulario -->       
    <div class='row'>
        <div class='sectiion_contactos' id='sectiion_contactos' >          
        </div>
    </div>                 
                       
    <a href="<?=base_url('index.php/puntosventa/administrar')?>">
        <button type="button" class="btn btn-default next-to">
            Ir a puntos de venta
        </button>
    </a> 
    
</div>














<!--*************CARGAMOS MODALS DE CONFIGURACIÓN-->
<?=$this->load->view("directorio/modal/config_directorio");?>
<!--*************TERMINAMOS DE CARGAR  MODALS DE CONFIGURACIÓN-->
<script type="text/javascript" src="<?=base_url('application/js/directorio/principal.js')?>"></script>
<script type="text/javascript" src="<?=base_url('application/js/directorio/img.js')?>"></script>
<style type="text/css">
.status-registro{
    display: none;
}
.nota-c:hover , .editar-contacto:hover , .img_contacto:hover{
    cursor: pointer;
}

</style>
