<div class="container" title='Click para registrar'>            
    <div class='row'>
        <button id="nuevo-contacto-button" title='Registrar contacto' type="button" class="btn btn btn_nnuevo" data-toggle="modal" data-target="#contact-modal">                
            + Nuevo contacto
        </button>
    </div>
    <br>
    <!--Inicioa  formulario de búsqueda  -->    
    <div class='row'>
        <form method='GET' action="" id='form-filtro' >
            <div class='row'>
                <div class='col-lg-4 col-md-4 col-sm-12'>
                    <div class="form-group" >        
                        <div class="input-group">
                            <div class="input-group-addon">
                                        Contacto 
                            </div>
                            <input type="text" list="contactos-lista" class="form-control input-sm" id="contacto-name"  name='nombre_b' placeholder="Nombre del contacto">                      
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
                            <input type="tel" class="form-control input_tel_contacto input-sm" id="contacto-tel-filtro" name='telefono_b' placeholder="51153433..">                      
                        </div>
                    </div>             
                </div>
                <div class='col-lg-3 col-md-3 col-sm-12'>
                    <div class="form-group" >
                        <div class="input-group">
                            <div class="input-group">
                                <?=get_tipos_contactos("tipo_b" , "form-control input-sm" , "select-tipo-b" )?>                        
                            </div>
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
    </div>
    <div class='container'>
        <div class='place_contactos'>
        </div>
        <div class='response_img_contacto' id='response_img_contacto'>
        </div>        
    </div>
    <!--Termina  formulario -->       
    <div class='row'>
        <div class="contactos"></div>
    </div>                 
    <br>
    <div class='row'>
        <a href="<?=base_url('index.php/puntosventa/administrar')?>">
            <button type="button" class="btn btn-default next-to input-sm">
                Ir a puntos de venta
            </button>
        </a> 
    </div>                   
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
