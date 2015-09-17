<script type="text/javascript" src="<?=base_url('application/js/puntosventa/principal.js')?>"></script>
<button id="nuevo-contacto-button" type="button" class="btn btn-info" data-toggle="modal" data-target="#contact-modal">
    <i class="fa fa-check"></i>Agregar contacto
</button>
<table  class="table display table table-bordered dataTable" border="1">
        <thead>

        <tr role="row" class='enid-header-table' >             
            <th >Razón Social</th>
            <th >Tel.</th>
            <th >Página web </th>
            <th >Estado</th>
            <th >Locación</th>
            <th >Nota para el público</th>
            <th >Usuario Registrante</th>
            <th >Estado del Registrante</th>
            <th >Fecha registro</th>
            <th >Contactos Asociados</th>
            <th ></th>            
        </tr>
        </thead>        
        <tfoot>
        <tr class='enid-header-table'>
            <th >Razón Social</th>
            <th >Tel</th>
            <th >Página web</th>
            <th >Estado</th>
            <th >Locación</th>
            <th >Nota para el público</th>
            <th >Usuario Registrante</th>
            <th >Estado del Registrante</th>
            <th >Fecha registro</th>
            <th >Contactos Asociados</th>
            <th ></th>
            
        </tr>
        </tfoot>
        <tbody>        
            <?=$puntos_venta;?>
        </tbody>
    </table>


































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
                <!--Nuevo contacto form -->




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
         <label for="inputEmail">Razón social del punto de venta</label>
         <input type="text" class="form-control" name="razon_social" placeholder="Nombre de la organización" required>
     </div>    
     <div class="form-group">            
         <div class="input-group m-bot15">
            <span class="input-group-addon">
                Tel. de contacto 
            </span>
            <input class="form-control" name="telefono"   placeholder="Teléfono" type="text">
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
    <div class="form-group">            
        <div class="input-group m-bot15">
            <span class="input-group-addon">
                Página web del proveedor 
            </span>
            <input class="form-control" name="url_pagina_web"   placeholder="https://enidservice.com/" type="url">
        </div>
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

