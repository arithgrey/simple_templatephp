<!--Slider del evento -->
<div class='col-lg-12 col-md-12 col-sm-12 seccion_slider_evento'>
    <div class='seccion_slider'>
    </div>
    <div class='place_slider'>
    </div>
</div>
<!--Termina slider del evento-->
<div class='col-lg-12 col-md-12 col-sm-12'>
    <div class='panel panel_info_evento'>
        <div class="panel-body">                                        
            <span class='dias_restantes'>
                <?=$dias_restantes_evento;?>
            </span>
            <span class='edicion_event'>
                <?=create_text_edicion($evento["edicion"] ,  $in_session)?>
            </span>
            <span class='fecha_evento'>
                <?=fechas_enid_format($evento["fecha_inicio"] , $evento["fecha_termino"])?>
            </span>     
            <!---->            
            <?=create_text_slogan($evento["eslogan"], $in_session)?>                            
        </div>
    </div>
</div>
<hr>
<?=create_text_descripcion($evento["descripcion_evento"] , $generos_musicales_tags , $in_session )?>
<hr>       
<div class='col-lg-8 col-md-8 col-sm-12 '>
    <h1>
        Escenarios del evento
    </h1>
    <div>
        <div class='seccion_escenarios'>
        </div>
        <div class='place_escenarios'>
        </div>
    </div>
</div>
<div class='col-lg-4 col-md-4 col-sm-12 '>
    <div class='resumen_extra_evento'>
    </div>
    <div class='place_resumen_extra_evento'>
    </div>
</div>    


<div class='col-lg-12 col-md-12 col-sm-12'>      
    <div class='mapa_locacion'>
    </div>
    <div class='place_mapa_locacion'>
    </div>
</div>

<div class='col-lg-12 col-md-12 col-sm-12'>
    <ul class="p-social-link pull-right">
        <?=evalua_social($evento["url_social"] , "fb" , $in_session )?>
        <?=evalua_social($evento["url_social"] , "yt" , $in_session )?>                
    </ul>  
</div>

<style type="text/css">
    .seccion_slider_evento{
        margin-bottom: 20px;
    }
    .panel_info_evento{
        background: rgb(60, 94, 121);
        color: white;
    }
    .descripcion_seccion{
        background: rgb(22, 103, 129);    
        padding: 10px;    
        font-size: .9em;
    }
    .tags_generos_a{
        background: #364654 !important;       
    }
    .tags_generos_a:hover{    
        background:#00bcd4 !important;    
        padding: 8px;       
    }
    .tags_generos_a:hover{
        cursor: pointer;
    }
    .slogan{    
        color: white;
        background: #E31F56;
        padding: 10px 10px;
        border-radius: 1px;
    }
    .seccion_escenairos_evento{
        background:  #046188; 
        height: 100%;    
    }#mapgooglemap{
      background: #046188;
    }
    .titulo_maps{
        color: white;
    }.aviso_social{
        font-size: .8em;
    }
    .config_tipo_evento{
        background: #046188;                
        cursor: pointer;
    }
    .info_tipo_evento{
        color: white;
    }
</style>
