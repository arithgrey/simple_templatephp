<?=construye_header_modal('modal-experiencia', " La experiencia que se vivirá en el escenario" );?>  
    <div class='place_nueva_experiencia_escenario'>
    </div>    
    <form action="<?=base_url('index.php/api/templ/templates_content/format/json/')?>" class="form-horizontal form_escenario tmp-escenario" id="form_escenario">
        <div>
            <div >                                                                                                    
                <div class="input-group">                                                                                                  
                    <input type="hidden" name="type" value="5">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="sizing-addon1">                                    
                    Titulo del contenido 
                    </span>                                        
                    <input type="text"  id="tnuevo_contenido_name" name="nuevo_contenido_name" class="form-control input_escenario" placeholder="" aria-describedby="sizing-addon1" required>                                          
                    <div class='place_val_escenario'>
                    </div>
                </div>
                <textarea rows="5" class="form-control" name="contenido_text" id="contenido_text" required>
                </textarea>  
                <div class='separate-enid'></div>          
                <button class='btn  btn-default btn_save' id='registro-template-descripcion-evento' >                                                
                Registrar plantilla
                </button>                                               
            </div>
        </div>
    </form>    
<?=construye_footer_modal()?>  
                    