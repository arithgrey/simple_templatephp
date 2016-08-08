<div class='separate-enid sepador_superio' >
</div>
<div class='seccion_principal'>    
    <!--Slider del evento -->
    <div>
        <div>
            <div class='seccion_slider'>
            </div>
            <div class='place_slider'>
            </div>
        </div>
    </div>
    <!--Termina slider del evento-->
    <div class='row'>     
        <div class='text_edicion'>                                        
            <span class='dias_restantes'>
                <?=$dias_restantes_evento;?>
            </span>
            <br>    
            <span class='edicion_event'>
                <?=create_text_edicion($evento["edicion"] ,  $in_session)?>
            </span>

            <span>
                <?=create_text_slogan($evento["eslogan"], $in_session , $evento["idevento"])?>                                        
            </span>                   
        </div>       
    </div>
</div>


<?=create_text_descripcion($evento["descripcion_evento"] ,  $in_session  , $evento["idevento"])?>
<div class='separate-enid'>
</div>
<?=get_tags_generos($list_generosdb , $evento['idevento']  , $in_session )?>

<div class='col-lg-8 col-md-8 col-sm-12 '>    
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
    .seccion_principal{
        //background: rgb(22, 103, 129);    
        background: rgb(54, 70, 84);
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
        cursor: pointer;
    }
    .info_tipo_evento{
        color: white;
    }
    span.titulo_evento_slider{

        color: #FFFFFF;
        margin-left: 1%;
        font-weight: bold;
    }
    .text_edicion{
        color: rgb(62, 178, 192);        
        font-size: 1.2em;
        margin-left: 2%;    
    }
    /**/
    .text_title_escenario{
        font-size: 2em;
        font-weight: bold;    
    }
    .dias_restantes{
        color: white !important;
        font-weight: bold;        
    }
    .edicion_event{
        
        font-size: .8em;
    }
    .seccion_escenarios_enid{
        background: whitesmoke;
        padding: 2%;
    }
    .descripcion_seccion{
        background: #51d0e0;
        font-size: .9em;
        padding: 10px;
    }
    


</style>




<style type="text/css">
    @media only screen and (max-width: 991px) {

        .sepador_superio{
            display: none;
        }
    }
</style>