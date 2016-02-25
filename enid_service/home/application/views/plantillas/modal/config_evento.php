<!--Cargamos la plantilla de  descripciones -->
<div class="modal fade" id="modal-descripcion-eventos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Carga una plantilla que describa tus eventos 
                </h4>
            </div>
            <div class="modal-body">                
                <form action="" class="form-horizontal nueva-descripcion-template" id="nueva-descripcion-template">
                    <div class="form-group">
                        <div class="col-md-12">                                                                                                                                                                                                

                                    <div class="input-group">                                                                                                  
                                        <input type="hidden" name="type" value="1">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon1">
                                            Titulo de la plantilla 
                                        </span>                                        
                                        <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                                    </div>
                                    <textarea rows="6" class="form-control" name="contenido_text" id="descripcion-contenid-templ" required>
                                    </textarea>
                                    <br>
                                    <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                                        Registrar
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
<!--Terminamos de cargar la plantilla de  descripciones -->




 


















<!--Cargamos la plantilla de  politicas -->
<div class="modal fade" id="modal-politica-eventos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Carga una política frecuete 
                </h4>
            </div>
            <div class="modal-body"> 

                <form action="" class="form-horizontal nueva-politica-template" id="nueva-politica-template">
                     <div class="form-group">
                         <div class="col-md-12">
                             <div class="input-group">                                                                                              
                                 <input type="hidden" name="type" value="4">
                             </div>
                             <div class="input-group">
                                 <span class="input-group-addon" id="sizing-addon1">
                                    Titulo del contenido 
                                 </span>                                        
                                 <input type="text"  id="titulo-contenido-tmpl" name="nuevo_contenido_name" class="form-control" placeholder="" aria-describedby="sizing-addon1" required>                                          
                             </div>
                             <textarea rows="6" class="form-control" name="contenido_text" id="contenido_descripcion" required>
                             </textarea>                                                        
                             <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                    
                                Registrar
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
<!--Terminamos de cargar la plantilla de  politicas -->



































<!--Cargamos la plantilla de  politicas -->
<div class="modal fade" id="modal-articulo-eventos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar plantilla de artículo 
                </h4>
            </div>
            <div class="modal-body"> 
                <form role="form" class="form-inline" id="form-articulo-permitido">
                    <div class="form-group">
                        <input placeholder="Nuevo articulo" class="form-control" name='nuevo_articulo' id='nuevo-articulo' style="width: 100%" type="text">                                                                                                                
                        <textarea rows="4"  class="form-control" style="width: 100%"  name="nueva_descripcion" id="nueva_descripcion" >
                        </textarea>
                    </div>                                                
                    <button class="btn btn-default btn_save pull-right" type="submit">
                        Registrar
                    </button>
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
<!--Terminamos de cargar la plantilla de  politicas -->













































<!--Cargamos la plantilla de  politicas -->
<div class="modal fade" id="modal-restriccion-eventos" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cargar plantilla de artículo 
                </h4>
            </div>
            <div class="modal-body"> 
               
                <form  id="new-contenido-form">
                    <div class="form-group">
                        <div class="col-md-12 col-lg-12 col-sm-12">                                                                                        
                            <div class="input-group">                                                                                      
                                <span class="input-group-addon" id="sizing-addon1">
                                                        Restricción 
                                </span>                                        
                                <input placeholder="Nueva restricción" class="form-control" name='nuevo_contenido_name' id='nuevo-contenido-name'  type="text">
                            </div>
                                                                        
                            <textarea rows="6"   placeholder="Registra la descripción de la restricción" id='contenido_text'  class='contenido_text form-control' name='contenido_text' required>
                            </textarea>                                                        
                                                                        
                            <div class="input-group">                                                                                      
                                <input type='hidden' name="type" value="3">
                            </div>
                            <br>
                            <button class="btn btn-default btn_save" type="submit">
                                                    Registrar
                            </button>
                            <br>
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
<!--Terminamos de cargar la plantilla de  politicas -->





