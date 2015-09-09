<style type="text/css">
.header-table{
    background: #10B9D5 none repeat scroll 0% 0%;
    text-align: center !important;
}
</style>
<script type="text/javascript" src="<?=base_url('application/js/directorio/principal.js')?>"></script>







                



<div class="section-contact" id="section-contact">
</div>
























<div class="modal fade in" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Nuevo contacto</h4>
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
         <label for="inputEmail">Nombre</label>
         <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
     </div>
     <div class="form-group">
         <label for="inputPassword">Organización</label>
         <input type="text" class="form-control" name="organizacion" placeholder="Añadir nombre de la organización">
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
     
     <button type="submit" class="btn btn-primary">Registrar</button>



</form>


                <!--Termina nuevo contacto -->




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>