<?=construye_header_modal('contactos-modal', " Agregar contactos al punto de venta " );?>                                
    <div id="contactos-punto-venta" class='contactos-punto-venta'>
    </div>  
    <div class='response-contacto-punto-venta' id='response-contacto-punto-venta'>
    </div>                    
    <div class='status-punto-venta-contacto'>
    </div>                                    
<?=construye_footer_modal()?>        


<?=construye_header_modal('punto-venta-descripcion-modal', " Describe el punto de venta " );?>  
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
<?=construye_footer_modal()?>    
           


<!--******************************* Cargar imagen a contacto *********************************************-->

<?=construye_header_modal('punto-venta-imagen-modal', " Imagen del punton de venta " );?>  
    <?=$this->load->view("imgs/puntos_venta_admin")?>
<?=construye_footer_modal()?>    






<!--Inicia modal editar del punto de venta -->
<?=construye_header_modal('editd-punto-venta-modal', " Configuración " );?>      
                <!--Nuevo contacto form -->
    <form class='form-puntos-venta-edit' id="form-puntos-venta-edit" method="post" action="<?=base_url('index.php/api/puntosventa/punto/format/json/')?>">                    


        <div class='estatus_registra_nueva_data'></div>
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
        <div class='row'>
            <div class="form-group">

                <div class='col-lg-6 col-md-6 col-sm-12 text-center'>
                    <label for="inputEmail">
                    Nueva Razón social
                    </label>
                    <input type="text" id='nrazon_social' class="form-control input-sm" name="nrazon_social" placeholder="Nombre de la organización" required>                    
                    <span class='place_nrazon_social_vali  validado'>
                    </span>
                </div> 
                <div class='col-lg-6 col-md-6 col-sm-12 text-center'>
                    <label for="inputEmail">
                    Zona de la ciudad
                    </label>
                    <select class='form-control input-sm' name='nzona' id='nzona'>
                        <?=lista_zonas_punto_venta(0);?>
                    </select>
                </div>
            </div>                                                            
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
<?=construye_footer_modal()?> 






<?=construye_header_modal('delete-punto-venta-modal', " Eliminar " );?>  
    <!--Nuevo contacto form -->            
    Realmente desea eliminar el punto de venta                 
    <button type="button" class="btn btn-default" id="aceptar-delete" >
    Aceptar
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">
    Cancelar
    </button>
    <!--Termina nuevo contacto -->
<?=construye_footer_modal()?> 
<!--termina modal registro del punto de venta-->



<!--Inicia modal registro del punto de venta -->
<?=construye_header_modal('contact-modal', " Registrar nuevo " );?>  
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
            <div class='row'>
                <div class='col-lg-6 col-md-6 col-sm-12 text-center'>
                    <label for="inputEmail">
                        Punto de venta
                    </label>
                    <input type="text" class="form-control input-sm" name="razon_social" id="nombre_razon_social" placeholder="Nombre de la organización" required>  
                    <span class='place_razon_social_vali validado'>
                    </span>
                </div>    
                <div class='col-lg-6 col-md-6 col-sm-12 text-center'>
                <label for="inputEmail">
                    Zona de la ciudad
                </label>
                <select class='form-control input-sm' name='zona'>
                    <?=lista_zonas_punto_venta(0)?>
                </select>
                </div>
            </div>
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
            <textarea rows="12" name="descripcion" id='area_descripcion' class="col-sm-10 form-control" placeholder="Nota para el público">
            </textarea>                
        </div>

                
        <div class="animationload" id='loading_nuevo_punto_venta' style='display:none'>
            <div class="osahanloading">
            </div>
        </div>
                
        <br>
        <button type="submit" class="btn btn-default btn_save">
            Registrar
        </button>    
    </form>    
    <!--Termina nuevo contacto -->
<?=construye_footer_modal()?> 




