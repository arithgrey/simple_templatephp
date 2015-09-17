<style type="text/css">
.header-table{
    background: #10B9D5 none repeat scroll 0% 0%;
    text-align: center !important;
}
.status-registro{
    display: none;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/directorio/principal.js')?>"></script>

    <tr>
    <td  style="background:rgba(15, 108, 105, 0.92); color:white;" colspan="5">
        <button id="nuevo-contacto-button" type="button" class="btn btn-info" data-toggle="modal" data-target="#contact-modal">
        <i class="fa fa-check"></i>
        Agregar contacto
        </button>
    </td>
    </tr>
<div class="form-group pull-right" >
<div class="input-group">
    <?=$lista_tipo;?>
</div>
</div>
    
<div class="form-group pull-right" >
    <label class="sr-only" for="exampleInputAmount">Contacto</label>
    <div class="input-group">
      <div class="input-group-addon">Contacto </div>
      <input type="text" list="contactos-lista" class="form-control" id="contacto-name" placeholder="Nombre del contacto">
      
    </div>
</div>    
<?=$list_contactos_name;?>
<div class="section-contact" id="section-contact">

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
            <input class="form-control" name="telefono"   placeholder="Teléfono" type="text">
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
            <input class="form-control" name="pagina_web"   placeholder="Teléfono celular" type="url">
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
            <option value="Proveedor">Proveedor</option>
            <option value="Colaborador">Colaborador</option>
            <option value="Contacto Comercial">Contacto comercial</option>
            <option value="Cliente">Cliente</option>
            <option value="Contacto personal">Contacto personal </option>
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
            
            <input type="text" class="form-control" name="nnombre" placeholder="Nombre" required>
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nueva organización
            </span>
            
            <input type="text" class="form-control" name="norganizacion" placeholder="Añadir nombre de la organización">
         </div>
     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo Tel.
            </span>
            <input class="form-control" name="ntelefono"   placeholder="Teléfono" type="text">
         </div>

     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo Móvil 
            </span>
            <input class="form-control" name="nmovil"   placeholder="Teléfono celular" type="text">
         </div>

     </div>

    <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Página web  www
            </span>
            <input class="form-control" name="npagina_web"   placeholder="Teléfono celular" type="url">
         </div>
     </div>

     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nuevo correo electrónico @
            </span>
            <input class="form-control" name="ncorreo"   placeholder="arithgrey@gmail.com" type="text">
         </div>

     </div>
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Nueva dirección
            </span>
            <input class="form-control" name="ndireccion"   placeholder="Av. sur 89 col...  " type="text">
         </div>

     </div>
    <div class="form-group" >        
        <select class="form-control col-sm-12" name="ntipo">
            <option value="Proveedor">Proveedor</option>
            <option value="Colaborador">Colaborador</option>
            <option value="Contacto Comercial">Contacto comercial</option>
            <option value="Cliente">Cliente</option>
            <option value="Contacto personal">Contacto personal </option>
        </select> 
    </div>    
    <div class="form-group">
        <label class="col-sm-12 control-label">Nueva nota</label>        
        <textarea rows="12" name="nnota" class="col-sm-12 form-control"></textarea>        
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
