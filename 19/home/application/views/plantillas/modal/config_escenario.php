<div class="modal fade" id="modal-experiencia" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    La experiencia 
                </h4>
            </div>
            <div class="modal-body">                  
                    <form action="<?=base_url('index.php/api/templ/templates_content/format/json/')?>" class="form-horizontal tmp-escenario" id="tmp-escenario">
                        <div class='col-lg-12 col-sm-12 col-md-12'>
                            <div class="form-group">                                                                                                    
                                <div class="input-group">                                                                                                  
                                    <input type="hidden" name="type" value="5">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon" id="sizing-addon1">                                    
                                        Titulo del contenido 
                                    </span>                                        
                                    <input type="text"  id="tnuevo_contenido_name" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                                </div>
                                <textarea rows="6" class="form-control" name="contenido_text" id="contenido_text" required>
                                </textarea>
                                <div class='alert-descripcion-ok' id='alert-descripcion-ok' >
                                    <div class='alert-ok' id='alert-ok'>
                                        <em>
                                        Artículo registrado.!
                                        </em>
                                    </div>
                                </div>
                                <div class="animationload loading_desc_evento" id='loading_desc_evento' style='display:none'>
                                    <div class="osahanloading">
                                    </div>
                                </div>  
                                <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                                Registrar plantilla
                                </button>                                               
                            </div>
                        </div>
                    </form>    
                </div>                             
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cerrar
                </button>                
            </div>
        </div>
    </div>
</div>
