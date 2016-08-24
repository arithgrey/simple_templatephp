<div class='col-lg-12 col-md-12 col-sm-12'>
    <div class='row'>
        <div class='seccion_principal'>            
            <section>    
                <div class='seccion_slider'>
                </div>
                <div class='place_slider'>
                </div>
            </section>      
            <!---->
            <section>    
                <div class='text_edicion'>                                        
                    <span class='dias_restantes'>
                        <?=$dias_restantes_evento;?>
                    </span>

                    <a class='icon-maps' href="#enid-maps">
                        <i class='fa fa-map-marker'>
                        </i>
                    </a>
                    <div class='separate-enid'>
                    </div> 
                </div>

            </section>  
            <!---->
        </div>
    </div>
</div>


<div class='col-lg-12 col-md-12 col-sm-12 seccion-center-evento-mov'>    
    <div class='row'>
        <section class='seccion-historia'>    
            <span  class='text-historia'>
                La historia la haces tu
            </span>
            <div>
                <span>
                    <?=create_text_edicion($evento["edicion"] ,  $in_session , $evento["idevento"] )?>        
                </span>    
            </div>
            <div>
                <span>
                    <?=create_text_descripcion($evento["descripcion_evento"] ,  $in_session  , $evento["idevento"])?>
                </span>
            </div>
            <div class='seccion-generos'>
                <?=get_tags_generos($list_generosdb , $evento['idevento']  , $in_session )?>
            </div>
        </section>    
    </div>
</div>


<div class='col-lg-8 col-md-8 col-sm-12 '>    
    <div class='row'>
        <span class='text_title_escenario'>
            Escenarios del evento         
        </span>
        <div class='seccion_escenarios_enid'>                            
            <div>
                <div class='seccion_escenarios'>
                </div>
                <div class='place_escenarios'>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='col-lg-4 col-md-4 col-sm-12 '>
    <div class='row'>
        <div class='resumen_extra_evento'>
        </div>
        <div class='place_resumen_extra_evento'>
        </div>
    </div>
</div>    
<div class='enid-maps' id="enid-maps">
    <?=valida_maps_public($evento['formatted_address'] , $evento['idevento'] )?>
</div>

<!---->
<div class='col-lg-12 col-md-12 col-sm-12'>
    <div class='row'>
        <ul class="p-social-link pull-right">        
            <?=evalua_social($evento["url_social"] , "fb" , $in_session )?>
            <?=evalua_social($evento["url_social"] , "yt" , $in_session )?>                
        </ul>  
    </div>
    
</div>
