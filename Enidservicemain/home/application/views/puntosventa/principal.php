<script type="text/javascript" src="<?=base_url('application/js/puntosventa/principal.js')?>"></script>

<div class="container">
    <div class="row" id="print-section">
        <div class="center-block" id='punto-venta-resumen'>
            <?=$resumen_puntos_venta;?>
        </div>
    </div>

        <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">
                             <button class='botonExcel btn btn-default pull-right col-md-2 '  > Exportar a Excel <i class="fa fa-file-pdf-o"></i> </button>  
                            <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
        </form>


</div>    

<br>
<div class="container">
    <div class="row">
        <div class="center-block">

        
        <button id="nuevo-contacto-button" type="button" class="btn btn btn_nnuevo" data-toggle="modal" data-target="#contact-modal">
        + Nuevo punto de venta
        </button>
        

        <div class='pull-right' title='Filtro criterio'>
            
            <div class="input-group">
                <div class="input-group-addon">Estado</div>                
                <select name='estado_punto_venta' id='estado_punto_venta' class='estado_punto_venta form-control'>
                    <?=$estados_puntos_venta?>
                </select>                
            </div>
        </div>


        <div class='pull-right' title='Filtro criterio'>

            <div class="input-group">
                <div class="input-group-addon">Punto de venta </div>
                <input list='razon_social' name='puntos_venta_filtro' id='puntos-venta-filtro' class='puntos-venta-filtro form-control' >
                <?=$puntos_venta_nombres;?>
            </div>
        </div>
        


        <div id="puntos-venta-list">            
            <?=$puntos_venta;?>
        </div>

        <a href="<?=base_url('index.php/inicio/eventos/')?>"><button type="button"class="btn btn-default next-to">Ir a la sección de eventos</button></a>                                
        <a href="<?=base_url('index.php/directorio/contactos')?>"><button type="button"class="btn btn-default next-to">Ir a la sección de contactos</button></a>                                
        </div>
    </div>
</div>


















<!--Inicia modal registro del punto de venta -->
<div class="modal fade in" id="contactos-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">
                Asociar contactos al punto de venta
            </h4>
            </div>




            <div class="modal-body">            
                <div class='col-lg-12'>
                    <div class="form-group">
                      <label for="f_contacto" class=''>Asociar contacto:</label>
                      <input type="text" class="form-control" id="f_contacto">


                      <div class='contactos_encontrados'></div>
                    </div>
                </div>
                <!--Nuevo contacto form -->                
                <div class='col-lg-12 status-punto-venta-contacto'></div>
                <div id="contactos-punto-venta"></div>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>            
            </div>
        </div>
    </div>
</div>
<!--termina modal registro del punto de venta-->
<!--Inicia modal registro del punto de venta -->
<div class="modal fade in" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Cargar punto de venta </h4>
            </div>
            <div class="modal-body">            
                <!--Nuevo contacto form -->

<form class='form-puntos-venta' id="form-puntos-venta" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">    
    <div class='status-registro'>

        <div class="alert alert-success" role="alert">
            <i class="fa fa-check"></i>
            Contacto registrado
        </div>
    </div>
     <div class="form-group">
         <label for="inputEmail">Punto de venta</label>
         <input type="text" class="form-control" name="razon_social" placeholder="Nombre de la organización" required>
     </div>    
     
    
    <div class="form-group" >        
        <select class="form-control col-sm-12" name="status">            
            <option value="Disponible para todos los colaboradores de la empresa">Disponible para todos los colaboradores de la empresa</option>           
            <option value="Temporalmente no disponible">Registrado pero no disponible</option>                        
        </select> 
    </div>    
    <div class="form-group">                
        <textarea rows="12" name="descripcion" class="col-sm-10 form-control" placeholder="Nota para el público"></textarea>                
    </div>
    <button type="submit" class="btn btn-default btn_save">Registrar</button>


    <div class='response-registro' id="response-registro"></div>
    
</form>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>





<!--termina modal registro del punto de venta-->
<style type="text/css">
.header-table{
    background: #10B9D5 none repeat scroll 0% 0%;
    text-align: center !important;
}
.status-registro{
    display: none;
}
</style>



<div class="modal fade in" id="delete-punto-venta-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">
                Eliminar punto de venta
            </h4>
            </div>
            <div class="modal-body">            
                <!--Nuevo contacto form -->

                
                <label> Realmente decea elimiar el punto de venta </label>
                <button type="button" class="btn btn-default" id="aceptar-delete" >Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>


                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>
<!--termina modal registro del punto de venta-->









































<!--Inicia modal editar del punto de venta -->
<div class="modal fade in" id="edith-punto-venta-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edición punto de venta..</h4>
            </div>
            <div class="modal-body">            
                <!--Nuevo contacto form -->
<form class='form-puntos-venta-edit' id="form-puntos-venta" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">    
    <div class='status-registro'>

        <div class="alert alert-success" role="alert">
            <i class="fa fa-check"></i>
            Contacto registrado
        </div>
    </div>
     <div class="form-group">
         <label for="inputEmail">Nueva Razón social</label>
         <input type="text" class="form-control" name="nrazon_social" placeholder="Nombre de la organización" required>
     </div>    
    
    
    <div class="form-group" >        
        <select class="form-control col-sm-12" name="nstatus">            
            <option value="Disponible para todos los colaboradores de la empresa">Disponible para todos los colaboradores de la empresa</option>           
            <option value="Temporalmente no disponible">Registrado pero no disponible</option>                        
        </select> 
    </div>    
    <div class="form-group">                
        <textarea rows="12" name="ndescripcion" class="col-sm-10 form-control" placeholder="Nota para el público"></textarea>                
    </div>
    <button type="submit" class="btn btn-default btn_save">Guardar cambios</button>
</form>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>









































<input class='base_path' id='base_path' type='hidden' value='<?=$base_path;?>'>
<input class='dinamic_punto_venta' id='dinamic_punto_venta' type='hidden'>
<input class='base_path_img' id='base_path_img' type='hidden' value="<?=$base_path_img;?>">



<!--******************************* Cargar imagen a contacto *********************************************-->
<div class="modal fade in" id="punto-venta-imagen-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Cargar imagen al punto de venta </h4>
            </div>
            <div class="modal-body">
                



    

                <div class='row'>
                    <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_contacto" enctype="multipart/form-data" id='formulario-principal-img' >
                             <div class="form-group">
                                <span>Imagen:</span>
                                <input type="file" name="images[]"  id="imgs-punto-venta" class='imgs-punto-venta'>                                       
                             </div>                      

                             
                             <div class='row'>
                                <div class='col-sm-1'></div>    
                                <div class='col-sm-10'>
                                    <div class='response_img_punto_venta' id='response_img_punto_venta'></div>
                                    <div class='lista-imagenes' id='lista-imagenes'></div>
                                </div>
                                <div class='col-sm-1'></div>    
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








<script type="text/javascript" src="<?=base_url('application/js/puntosventa/img.js')?>"></script>