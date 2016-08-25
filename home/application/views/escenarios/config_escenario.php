<div class='seccion-portada-escenario'>
    <div class='place_slider'>
    </div>
    <div class='slider-principal-escenario' id='slider-principal-escenario'>                                
    </div>    
    <?=template_text_img("img-button-more-imgs" ,  "img-button-more-imgs"  , "#modal-img-escenario-principal" ,  $title ='Cargar imagenes de portada para el escenario' )?>    
    <div class='response_img_portada_escenario' id='response_img_portada_escenario'>
    </div>  
    <div class='row'>
        <div class='col-lg-12 col-md-12 col-sm-12'>
            <div class='config_general'>                   
                <div class='fechas-escenario-presentacion pull-left'>
                    <div class='place_fecha_2'>
                    </div>
                    <a class='f_escenario' data-toggle="modal" data-target="#modal-date-escenario" title='Fecha para éste escenario'>        
                        <div id='fecha-presentacion'>
                            <i class="fa fa-calendar">
                            </i>  
                            Fecha presentación                          
                            <?=fechas_enid_format($data_escenario["fecha_presentacion_inicio"] , $data_escenario["fecha_presentacion_termino"] )?>        
                        </div>    
                    </a>
                </div>                
                <div class='tipos-escenarios pull-right'>                
                    <div  class="btn-group-vertical pull-right " role="group" aria-label="Vertical button group">    
                        <span class='place_tipo'>
                        </span>
                        <div class="btn-group btn-sm " role="group">
                            <button id="" type="button" class="btn btn-default dropdown-toggle button-tipo-escenario " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">            
                                <?=get_start($data_escenario["tipoescenario"] , "Principal")?>
                                <span class="caret">
                                </span>
                            </button>
                            <?=template_btn_tipos()?>                    
                        </div>     
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <div class='separate-enid'>
    </div>
</div>


<div class='row'>
    <div class='col-lg-12 col-md-12 col-sm-12 config-general-escenario'>                           
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <span class='text-title-enid'>
                    La historía la haces tu
                </span>
            </div>
        </div>        
        <!---->      
        <div class='row'>
            <div class='col-lg-12 col-md-12 col-sm-12'>
                <div class='place_descripcion'>
                </div>
                <div class='seccion-descripcion-escenario'>
                    <span title='Actualiza la experiencia que vivirá el publico en el escenario' class='descripcion-escenario-text'>                                                                            
                        <?=format_descripcion($data_escenario["descripcion"])?>
                    </span>
                    <div class='section-descripcion-escenario-in'>
                        <textarea id="in-descripcion-escenario" name="descripcion_escenario"  class="form-control" placeholer="Message">
                            <?=$data_escenario["descripcion"]?>
                        </textarea>             
                    </div>            
                </div>                
                <?=template_btn_plantilla("button-template" , "template_escenario" , "#modal-platilla-escenarios" )?>                
                <?=template_show_down_content()?>                              
            </div>
        </div>
    </div>        
</div>       
       

