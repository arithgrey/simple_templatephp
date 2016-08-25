<div class="modal fade" id="modal-descripcion-eventos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" >Describe la experiencia que se vive en los eventos  </h4>
            </div>
            <div class="modal-body">                            
             

                <form action="" class="form-horizontal nueva-descripcion-template" id="nueva-descripcion-template">
                    <div class="form-group">
                        <div class="input-group">                                                                                                  
                            <input type="hidden" name="type" value="1">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1">
                            Titulo del contenido 
                            </span>                                        
                            <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                        </div>
                        <textarea rows="6" class="form-control" name="contenido_text" id="descripcion-contenid-templ" required>
                        </textarea>
                                                                            
                        <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                            
                            Registrar
                        </button>                                                                                               
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






