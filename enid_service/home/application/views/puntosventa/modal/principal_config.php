<!--Inicia modal registro del punto de venta -->
<div class="modal fade in" id="contactos-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Agregar contactos al punto de venta
                </h4>
            </div>
            <div class="modal-body">                                
                <div id='text-busqueda-section'  title='Añadir contactos al punto de venta' >
                    <div class='panel'  id='text-busqueda-contactos' >
                    +  Añadir contactos al punto de venta  
                    </div>
                </div>    
                <div id='busqueda-contactos-section'>
                    <span>
                        + Anadir contactos
                    </span>                          
                    <input type="text" class="form-control" id="f_contacto" placeholder='ej. Daniel Galindo'>
                    <div class='resultado-filtro-contactos-div' id='resultado-filtro-contactos-div'>
                    </div>                      
                    <div class='contactos_encontrados'>
                    </div>
                </div>  
                <!--**************************** Aquí es dónde se cargan  los ya enlazados    *******************************************-->
                <div id="contactos-punto-venta" class='contactos-punto-venta'>
                </div>  
                <div class='response-contacto-punto-venta' id='response-contacto-punto-venta'>
                </div>                
                <!--**************************** Termina lo ya enlazado    *******************************************-->
                <!--Nuevo contacto form -->                
                <div class='status-punto-venta-contacto'>
                </div>                
                <!--Termina nuevo contacto -->
            </div>        
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                Cerrar
                </button>            
            </div>
        </div>   
    </div>
</div>










<div class="modal fade in" id="punto-venta-descripcion-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">}
                    ×
                </button>            
                <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>
                    Editar descripción del punto de venta 
                </h4>
            </div>
            <div class="modal-body">
                <form id='form-nota-pv' action="<?=base_url('index.php/api/puntosventa/punto_venta_nota/format/json/')?>">
                    <textarea rows="12" name="nota-punto-venta" id='nota-punto-venta' class="form-control" placeholder="Nota para el público">
                    </textarea>
                    <div class='alert-ok' id='alert-ok-nota'>
                        <em>
                            Datos actualizados correctamente.!
                        </em>
                    </div>
                    <div class='alert-fail' id='alert-fail-nota'>
                        <em>
                            Falla al actualizar, notifique al administrador 
                        </em>
                    </div>                    
                    <button class='btn btn-default btn_save' id='btn-update-nota'>
                        Registra cambios
                    </button>
                </form>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div>
    </div>
</div>



















<!--******************************* Cargar imagen a contacto *********************************************-->
<div class="modal fade in" id="punto-venta-imagen-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×
            </button>            
            <h4 class="modal-title" id="myModalLabel" class='title-modal-contacto'>
                Cargar imagen al punto de venta 
            </h4>
            </div>
            <div class="modal-body">                            
                    <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_contacto" enctype="multipart/form-data" id='formulario-principal-img' >
                        <div class="form-group">
                            <span>
                            Imagen:
                            </span>
                            <input type="file" name="images[]"  id="imgs-punto-venta" class='imgs-punto-venta'>                                       
                        </div>                                                   
                        <div class='row'>
                            <div class='col-sm-1'>
                            </div>    
                            <div class='col-sm-10'>
                                <div class='response_img_punto_venta' id='response_img_punto_venta'>
                                </div>
                                <div class='lista-imagenes' id='lista-imagenes'>
                                </div>
                            </div>
                            <div class='col-sm-1'>
                            </div>    
                        </div>
                    </form>            
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div>
    </div>
</div>




























<!--Inicia modal editar del punto de venta -->
<div class="modal fade in" id="editd-punto-venta-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Edición punto de venta..
                </h4>
            </div>
            <div class="modal-body">            
                <!--Nuevo contacto form -->
                <form class='form-puntos-venta-edit' id="form-puntos-venta" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">                    
                    <div class='alert-ok' id='punto-venta-alert-ok'>
                        <em>
                            Datos actualizados
                        </em>
                    </div>

                    <div class='alert-ok' id='punto-venta-alert-fail'>
                        <em>
                            Falla al registrar cambios, reportar al administrador
                        </em>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">
                            Nueva Razón social
                        </label>
                        <input type="text" id='nrazon_social' class="form-control" name="nrazon_social" placeholder="Nombre de la organización" required>
                    </div>                                
                    <div class="form-group" >        
                        <select class="form-control col-sm-12" name="nstatus">            
                            <option value="Disponible para todos los colaboradores de la empresa">
                                Disponible para todos los colaboradores de la empresa
                            </option>           
                            <option value="Temporalmente no disponible">
                                Registrado pero no disponible
                            </option>                        
                        </select> 
                    </div>    
                    <div class="form-group">                
                        <textarea rows="12" name="ndescripcion" id="ndescripcion" class="col-sm-10 form-control" placeholder="Nota para el público">
                        </textarea>                
                    </div>
                    <button type="submit" class="btn btn-default btn_save">
                        Guardar cambios
                    </button>

                    <div class='response-update'>
                        <div class='panel  alert-ok'>
                            <em>
                                Datos actualizados .!
                            </em>
                        </div>
                    </div>
                </form>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div>
    </div>
</div>






























<div class="modal fade in" id="delete-punto-venta-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                ×
            </button>
            <h4 class="modal-title" id="myModalLabel">
                Eliminar punto de venta
            </h4>
            </div>
            <div class="modal-body">            
                <!--Nuevo contacto form -->            
                Realmente desea eliminar el punto de venta                 
                <button type="button" class="btn btn-default" id="aceptar-delete" >
                    Aceptar
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancelar
                </button>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">}
                    ×
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar punto de venta 
                </h4>
            </div>
            <div class="modal-body">            
                <!--Nuevo contacto form -->
                <form class='form-puntos-venta' id="form-puntos-venta" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">    
                    <div class='status-registro'>
                        <div class="alert alert-success" role="alert">
                            <i class="fa fa-check">
                            </i>
                            Contacto registrado
                        </div>
                    </div>
                    <div class='response-registro' id="response-registro">
                    </div>    
                     <div class="form-group">
                        <label for="inputEmail">
                            Punto de venta
                        </label>
                        <input type="text" class="form-control" name="razon_social" placeholder="Nombre de la organización" required>
                     </div>        
                    <div class="form-group" >        
                        <select class="form-control col-sm-12" name="status">            
                            <option value="Disponible para todos los colaboradores de la empresa">
                                Disponible para todos los colaboradores de la empresa
                            </option>           
                            <option value="Temporalmente no disponible">
                                Registrado pero no disponible
                            </option>                        
                        </select> 
                    </div>    
                    <div class="form-group">                
                        <textarea rows="12" name="descripcion" class="col-sm-10 form-control" placeholder="Nota para el público">
                        </textarea>                
                    </div>
                    <button type="submit" class="btn btn-default btn_save">
                        Registrar
                    </button>    
                </form>
                <!--Termina nuevo contacto -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div>
    </div>
</div>


