<!--Cargamos la plantilla de  descripciones -->
<?=construye_header_modal('modal-descripcion-eventos', " La experiencia en los eventos " );?>  
    <div class='place_n_experiecia'>
    </div>
    <form action="" class="form-horizontal nueva-descripcion-template" id="nueva-descripcion-template">
        <div>            
            <div class="input-group">                                                                                                  
                <input type="hidden" name="type" value="1">
            </div>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon1">
                    Titulo de la plantilla 
                </span>                                        
                <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control input-sm input_experiencia" placeholder="" aria-describedby="sizing-addon1" required>                                          
                <div class='place_val_experiencia'>
                </div>
            </div>            
            <textarea rows="5" class="form-control input-sm" name="contenido_text" id="descripcion-contenid-templ" required>
            </textarea>     
            <div class='separate-enid'></div>                                                    
            <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                Registrar
            </button>                                                           
        </div>
    </form>
<?=construye_footer_modal()?>  






<!--Cargamos la plantilla de  politicas -->
<?=construye_header_modal('modal-politica-eventos', " Políticas en los eventos " );?>  
<div class='place_n_politica'>
</div>
<form action="" class="form-horizontal nueva-politica-template" id="nueva-politica-template">
    <div >        
        <div class="input-group">                                                                                              
            <input type="hidden" name="type" value="4">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="sizing-addon1">
                    Titulo del contenido 
            </span>                                        
            <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control input-sm input_politica " placeholder="" aria-describedby="sizing-addon1" required>                                          
            <div class='place_val_politica'>
            </div>
        </div>
        <textarea rows="5" class="form-control" name="contenido_text" id="contenido_descripcion" required>
        </textarea>
        <div class='separate-enid'></div>                                                         
        <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                    
                Registrar
        </button>                                                                                                    
    </div>
</form>  
<?=construye_footer_modal()?>  
<!--Terminamos de cargar la plantilla de  politicas -->







<!--Cargamos la plantilla de  politicas -->
<?=construye_header_modal('modal-articulo-eventos', " Artículo" );?>  
    <div class='place_n_articulo'></div>
    <form  class="form-horizontal" id="form-articulo-permitido">    
        <div class="input-group">    
               <span class="input-group-addon" id="sizing-addon1">
                    Articulo permitido
                </span>
            <input placeholder="Nuevo articulo" class="form-control" name='nuevo_articulo' id='nuevo-articulo' style="width: 100%" type="text" required>                                                                                                                        
            <div class='place_val_articulo'>
            </div>
        </div>       
        <textarea rows="5"  class="form-control"   name="nueva_descripcion" id="nueva_descripcion" >
        </textarea>
        <div class='separate-enid'></div>                                                         
        <button class="btn btn-default btn_save pull-right" type="submit">
            Registrar
        </button>
    </form>
<?=construye_footer_modal()?>            
<!--Terminamos de cargar la plantilla de  politicas -->


<?=construye_header_modal('modal-restriccion-eventos', " Restricción de los eventos" );?> 
    <div class='place_n_restriccion'>
    </div>
<form  id="new-contenido-form">
    <div >        
        <div class="input-group">                                                                                      
            <span class="input-group-addon" id="sizing-addon1">
                Restricción 
            </span>                                        
            <input placeholder="Nueva restricción" class="form-control input-sm input_restriccion" name='nuevo_contenido_name' id='nuevo-contenido-name'  type="text" required>
            <div class='place_val_restriccion'>
            </div>
        </div>                                                             
        <div class="input-group">                                                                                      
            <input type='hidden' name="type" value="3">
        </div>
        <textarea rows="6"   placeholder="Registra la descripción de la restricción" id='contenido_text'  class='contenido_text form-control input-sm' name='contenido_text' required>
        </textarea>                                                                                                                                    
        <div class='separate-enid'></div>                                                         
        <button class="btn btn-default btn_save" type="submit">
                Registrar
        </button>            
    </div>
</form> 
<?=construye_footer_modal()?>            
<!--Terminamos de cargar la plantilla de  politicas -->
<?=construye_header_modal('modal_confirmar', "Eliminar plantilla" );?>  
    ¿Realmente desea eliminar la plantilla? 
    <div class='pull-right'> 
      <button type="button" class="btn btn-default aceptar_eliminar" id="aceptar_eliminar" data-dismiss="modal">
        Aceptar
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Cancelar
      </button>                
    </div>
    <div class='place_delete_template'>
    </div>
<?=construye_footer_modal()?>            




<?=construye_header_modal('config_obj', "Configurar " );?>  
    <div class='place_config_obj'>
    </div>
    <div class='place_c_articulo'></div>
    <form  class="form-horizontal" id="form_conf_articulo">    
        <div class="input-group">    
               <span class="input-group-addon" id="sizing-addon1">
                    Articulo permitido
                </span>
            <input placeholder="artículo" class="form-control" name='n_articulo' id='n_articulo' style="width: 100%" type="text" required>                                                                                                                        
        </div>       
        <textarea rows="5"  class="form-control"   name="n_descripcion" id="n_descripcion" >
        </textarea>
        <input value='' type='hidden' name='id_obj' id='nid_obj'>
        <div class='separate-enid'></div>                                                         
        <button class="btn btn-default btn_save pull-right" type="submit">
            Registrar
        </button>
    </form>
<?=construye_footer_modal()?>            


<?=construye_header_modal('eliminar_obj', "Eliminar" );?>  
    <div class='place_eliminar_obj'>
    </div>
    ¿Realmente desea eliminar la plantilla? 
    <div class='pull-right'> 
      <button type="button" class="btn btn-default aceptar_obj_eliminar" id="aceptar_eliminar" data-dismiss="modal">
        Aceptar
      </button>
      <button type="button" class="btn btn-default" data-dismiss="modal">
        Cancelar
      </button>                
    </div>
<?=construye_footer_modal()?>            

