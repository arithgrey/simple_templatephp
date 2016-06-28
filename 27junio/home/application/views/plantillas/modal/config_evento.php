<!--Cargamos la plantilla de  descripciones -->
<?=construye_header_modal('modal-descripcion-eventos', " Registra nuevo contenido de eventos " );?>  
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

                        <div class='alert-descripcion-ok' id='alert-descripcion-ok' >
                            <div class='alert-ok' id='alert-ok'>
                                <em>
                                Plantilla registrada correctamente .! 
                                </em>
                            </div>
                        </div>
                        <div class="animationload loading_desc_evento" id='loading_desc_evento' style='display:none'>
                            <div class="osahanloading">
                            </div>
                        </div>                  

                        <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                        Registrar
                        </button>                                               
            </div>
        </div>
    </form>
<?=construye_footer_modal()?>  
<!--Terminamos de cargar la plantilla de  descripciones -->




 


















<!--Cargamos la plantilla de  politicas -->
<?=construye_header_modal('modal-politica-eventos', " Registra nuevo contenido que defina una política en los eventos" );?>  
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


        <div class='alert-descripcion-ok' id='alert-descripcion-ok' >
            <div class='alert-ok' id='alert-ok'>
                <em>
                    Plantilla registrada correctamente .! 
                </em>
            </div>
        </div>

            <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                    
                Registrar
            </button>                                                                                            
        </div>
    </div>
</form>
<div class="animationload loading_desc_evento" id='loading_desc_evento' style='display:none'>
    <div class="osahanloading">
    </div>
</div>                  
<?=construye_footer_modal()?>  
<!--Terminamos de cargar la plantilla de  politicas -->







<!--Cargamos la plantilla de  politicas -->


<?=construye_header_modal('modal-articulo-eventos', " Registra algún artículo  permitido" );?>  
<form role="form" class="form-inline" id="form-articulo-permitido">
    <div class="form-group">
        <input placeholder="Nuevo articulo" class="form-control" name='nuevo_articulo' id='nuevo-articulo' style="width: 100%" type="text" required>                                                                                                                
        <textarea rows="4"  class="form-control" style="width: 100%"  name="nueva_descripcion" id="nueva_descripcion" >
        </textarea>
    </div>   
    <div class="animationload loading_desc_evento" id='loading_desc_evento' style='display:none'>
        <div class="osahanloading">
        </div>
    </div>
    <div class='alert-descripcion-ok' id='alert-descripcion-ok' >
        <div class='alert-ok' id='alert-ok'>
            <em>
            Plantilla registrada correctamente .! 
            </em>
        </div>
    </div>                                            
    <button class="btn btn-default btn_save pull-right" type="submit">
    Registrar
    </button>
</form>
<?=construye_footer_modal()?>            
<!--Terminamos de cargar la plantilla de  politicas -->







<!--Cargamos la plantilla de  politicas -->
<?=construye_header_modal('modal-restriccion-eventos', " Registra algúna restricción usual de los eventos" );?> 
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
            <div class="animationload loading_desc_evento" id='loading_desc_evento' style='display:none'>
                <div class="osahanloading">
                </div>
            </div>  
            <div class='alert-descripcion-ok' id='alert-descripcion-ok' >
                <div class='alert-ok' id='alert-ok'>
                    <em>
                    Plantilla registrada correctamente .! 
                    </em>
                </div>
            </div>
            
            <button class="btn btn-default btn_save" type="submit">
            Registrar
            </button>
            <br>
        </div>

    </div>
</form> 
<?=construye_footer_modal()?>            
<!--Terminamos de cargar la plantilla de  politicas -->