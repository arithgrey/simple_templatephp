<style type="text/css">
.status-registro{
    display: none;
}
</style>
<?=ini_set('display_errors', '1');?>

<script type="text/javascript" src="<?=base_url('application/js/directorio/principal.js')?>"></script>









<div class="container" >
    <div class="row print-section" id="print-section">
        <div class="center-block" id='resumen-contactos'>
        <div ><?=$resumen;?></div>
        </div>
    </div>
       <form action="<?=base_url('index.php/excel_export')?>" method="get"  id="FormularioExportacion">
                <button class='botonExcel btn btn-info pull-right col-md-2 '  > Exportar a Excel <i class="fa fa-file-pdf-o"></i> </button>  
                <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
        </form>
</div>    


<div class="container" title='Filtrar por criterio'>
    <div class="row">
        <div class="center-block">

                <button id="nuevo-contacto-button" title='Registrar contacto' type="button" class="btn btn btn_nnuevo" data-toggle="modal" data-target="#contact-modal">                
                + Nuevo contacto
                </button>    
       




            <form method='POST' action="<?=base_url('index.php/directorio/contactos')?>" id='form-filtro'>
            <div class="form-group pull-right" >        
                <button class='btn' type='submit'>Buscar</button>
            </div>
            <div class="form-group pull-right" >
                <div class="input-group">
                    <?=$lista_tipo;?>
                </div>
            </div>      
            <div class="form-group pull-right" >
                <div class="input-group">
                      <div class="input-group-addon">Tel de contacto </div>
                      <input type="text" class="form-control" id="contacto-tel-filtro" name='contacto-tel-filtro' placeholder="51153433..">                      
                </div>
            </div>             
            <div class="form-group pull-right" >        
                <div class="input-group">
                  <div class="input-group-addon">Contacto </div>
                  <input type="text" list="contactos-lista" class="form-control" id="contacto-name"  name='contacto-name' placeholder="Nombre del contacto">
                  
                </div>

            </div>

            </form>    

        
        <?=$list_contactos_name;?>


        <div class="section-contact" id="section-contact"></div>

        </div>




        <a href="<?=base_url('index.php/puntosventa/administrar')?>"><button type="button" class="btn btn-primary btn-sm">Ir a puntos de venta</button></a> 
    </div>

</div>





















<div class="modal fade in" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Registrar contacto </h4>
            </div>
            <div class="modal-body">
                
                <!--Nuevo contacto form -->
<form class='form-contactos' id="form-contactos" method="post" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">
    
<div class='status-registro'>

    <div class="alert alert-success" role="alert">
        <i class="fa fa-check"></i>
        Contacto registrado
    </div>
</div>


     

      <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nombre 
            </span>
            
            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Organización
            </span>
            
            <input type="text" class="form-control" name="organizacion" placeholder="Añadir nombre de la organización">
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Tel.
            </span>
            <input class="form-control" name="telefono"   placeholder="Teléfono" type="text" required>
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Móvil 
            </span>
            <input class="form-control" name="movil"   placeholder="Teléfono celular" type="text">
         </div>

     </div>
      <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Página web  www
            </span>
            <input class="form-control" name="pagina_web"   placeholder="http://enidservice.com/home/" type="url">
         </div>
     </div>

     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Correo Electrónico @
            </span>
            <input class="form-control" name="correo"   placeholder="arithgrey@gmail.com" type="text">
         </div>

     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Dirección
            </span>
            <input class="form-control" name="direccion"   placeholder="Av. sur 89 col...  " type="text">
         </div>

     </div>


    <div class="form-group" >
        
        <select class="form-control col-sm-12" name="tipo">
            <option >Seleccione</option>
            <option value="Proveedor">Proveedor</option>
            <option value="Artista">Artista </option>
            <option value="Colaborador">Colaborador</option>
            <option value="Contacto Comercial">Contacto comercial</option>
            <option value="Cliente">Cliente</option>
            <option value="Contacto personal">Contacto personal </option>
            <option value="Institución">Institución</option>
            <option value="Productora">Productora</option>
            <option value="Productora">Otro</option>
        </select> 
    </div>    


    <div class="form-group">
        <label class="col-sm-12 control-label">Nota</label>
        
        <textarea rows="12" name="nota" class="col-sm-12 form-control"></textarea>
        
    </div>
     

    
    <button type="submit" id="button-registrar" class="btn btn-primary">Registrar</button>



</form>


                <!--Termina nuevo contacto -->




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>






























<!--Editar contacto -->
    <div class="modal fade in" id="contact-modal-edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Editar la información del contacto</h4>
            </div>
            <div class="modal-body">
                
                <!--Nuevo contacto form -->

<form class='form-contactos-edit' id="form-contactos-edit" action="<?=base_url('index.php/api/contactos/contacto/format/json/')?>">    
    <div class='status-registro'>

        <div class="alert alert-success" role="alert">
            <i class="fa fa-check"></i>
            Contacto registrado
        </div>
    </div>
    
     

      <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo nombre 
            </span>
            
            <input type="text" class="form-control" name="nnombre" id='nnombre' placeholder="Nombre" required>
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nueva organización
            </span>
            
            <input type="text" class="form-control" id="norganizacion" name="norganizacion" placeholder="Añadir nombre de la organización">
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo Tel.
            </span>
            <input class="form-control" name="ntelefono"  id="ntelefono"   placeholder="Teléfono" type="text" required>
         </div>

     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo Móvil 
            </span>
            <input class="form-control" name="nmovil" id="nmovil"   placeholder="Teléfono celular" type="text">
         </div>

     </div>

    <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Página web  www
            </span>
            <input class="form-control" name="npagina_web" id="npagina_web"   placeholder="Teléfono celular" type="url">
         </div>
     </div>

     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo correo electrónico @
            </span>
            <input class="form-control" name="ncorreo"  id="ncorreo"  placeholder="arithgrey@gmail.com" type="text">
         </div>

     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nueva dirección
            </span>
            <input class="form-control" name="ndireccion" id="ndireccion"   placeholder="Av. sur 89 col...  " type="text">
         </div>

     </div>
    <div class="form-group" >        
        <select class="form-control col-sm-12" id="ntipo" name="ntipo">
            <option >Seleccione</option>
            <option value="Proveedor">Proveedor</option>
            <option value="Colaborador">Colaborador</option>
            <option value="Contacto Comercial">Contacto comercial</option>
            <option value="Cliente">Cliente</option>
            <option value="Contacto personal">Contacto personal </option>
            <option value="Contacto personal">Otro </option>

        </select> 
    </div>    
    <div class="form-group">
        <label class="col-sm-12 control-label">Nueva nota</label>        
        <textarea rows="12" name="nnota" id="nnota" class="col-sm-12 form-control"></textarea>        
    </div>    
    <button id="button-update" class="btn btn-primary">Actualizar información del  contacto</button>   
</form>

                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>
<!--termina la edición del contacto -->























































<input class='base_path' id='base_path' type='hidden' value='<?=$base_path;?>'>
<input class='dinamic_contacto' id='dinamic_contacto' type='hidden'>
<input class='base_path_img' id='base_path_img' type='hidden' value="<?=$base_path_img;?>">



<!--******************************* Cargar imagen a contacto *********************************************-->
<div class="modal fade in" id="contact-imagen-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Cargar imagen al contacto </h4>
            </div>
            <div class="modal-body">
                



    

                <div class='row'>
                    <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_contacto" enctype="multipart/form-data" id='formulario-principal-img' >
                             <div class="form-group">
                                <span>Imagen:</span>
                                <input type="file" name="images[]"  id="imgs-contacto" class='imgs-contacto'>                                       
                             </div>                      

                             <div class='askmks'></div>
                             <div class='row'>
                                <div class='col-sm-1'></div>    
                                <div class='col-sm-10'>
                                    <div class='response_img_contacto' id='response_img_contacto'></div>
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







































<div class="modal fade in" id="contact-nota" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>Nota del contacto</h4>
            </div>
            <div class="modal-body">
                
                <div class='nota-contacto-text'></div>
                <div class='edit-contact-mod'></div>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?=base_url('application/js/directorio/img.js')?>"></script>




