<div class='col-lg-12 col-md-12 col-sm-12'>
    <div class='row'>
        <div class='seccion_principal-portada'>            
            <section>    
                <div class='seccion_slider'>
                </div>
                <div class='place_slider'>
                </div>
            </section>                  
            <section>                
                <div class='text_edicion'>                                        
                    <span class='dias_restantes'>
                        <?=$dias_restantes_evento;?>
                    </span>
                    <a class='icon-maps' href="#enid-maps">
                        <i class='fa fa-map-marker'>
                        </i>
                    </a>
                    <span class='edicion-event-text row'>
                        <?=create_text_edicion($evento["edicion"] ,  $in_session , $evento["idevento"] )?>        
                    </span>    
                </div>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        
                        <button class='btn_call_to_emp pull-right btn_asistencia' type="button" data-toggle="modal" data-target="#asistencia_moal" >
                            <span class='place_asistentes'>                                
                            </span> Asistiré
                        </button>        
                        <a href="<?=base_url('index.php/emp/lahistoria')?>/<?=$evento["idempresa"]?>">                        
                            <button class='btn_call_to_emp pull-right'>
                                Nuestra historia
                            </button>    
                        </a>    
                        <a href="<?=base_url('index.php/eventos/accesosalevento')?>/<?=$evento["idevento"]?> ">
                            <button class='btn_call_to pull-right'>
                                Tus accesos
                            </button>        
                        </a>
                        <a href="<?=base_url('index.php/eventos/diaevento/')?>/<?=$evento['idevento']?>">
                            <button class='btn_call_to pull-right' >
                                Las reglas
                            </button>    
                        </a>
                        
                    </div>                    
                </div>
            </section>  
            
        </div>        

        <?=valida_reservaciones_public(
            $in_session ,
            $evento["reservacion_tel"] ,
            $evento["reservacion_mail"] , 
            base_url('index.php/eventos/nuevo')."/".$evento['idevento']."/reservaciones/"
        )?>
        

    </div>    
</div>


<div class='col-lg-12 col-md-12 col-sm-12 seccion-center-evento-mov'>    
    <div class='row'>
        <section class='seccion-historia'>    
            <span  class='text-historia'>
                La historia la haces tú!
            </span>
            <div class='row'>
                <div class='col-lg-12 col-sm-12'>
                    <div class='seccion-generos'>
                        <?=get_tags_generos($list_generosdb , $evento['idevento']  , $in_session )?>
                    </div>                    
                </div>
            </div>
            

            
            <div class='descripcion-experiencia'>
                <span >
                    <?=create_text_descripcion($evento["descripcion_evento"] ,  $in_session  , $evento["idevento"])?>
                </span>
                <hr>
            </div>        
        </section>    
    </div>
</div>


<div class='col-lg-8 col-md-8 col-sm-12 '>    
    <div class='row'>
        <span class='text_title_escenario'>
            Escenarios del evento         
        </span>
        <div class=''>                            
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
    <div class='resumen_extra_evento'>
    </div>
    <div class='place_resumen_extra_evento'>
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



