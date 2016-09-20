<div class='row seccion-p-accesos'>
    <div class='col-lg-8 col-md-8 col-sm-12'>
        <div>
            <span class='text-title-enid text-accesos'>
                Accesos del evento
            </span>
            <span class='text-accesos-more'>
                
                <?=valida_registro_promociones(lista_accesos_publicos($data_accesos , $in_session ,   $data_evento["idevento"]  )["num_accesos"] ,  $in_session ,  $data_evento["idevento"] )?>                                     
            </span>
        </div>
        <div class='row'>                        
            <div class='accesos_seccion'>
                <div class='btn_more_accesos'>                                                    
                </div>
                <div class='accesos_seccion_contenedor'>
                    <?=lista_accesos_publicos($data_accesos , $in_session ,  $data_evento["idevento"] )["accesos"] ?>                                                                                               
                </div>
            </div>                            
        </div>
    </div>
    <div class='col-lg-4 col-md-4 col-sm-12'>
        <div>
            <span class='dias_restantes'>
                <?=$dias_restantes_evento;?>
            </span>                                
            <div class='enid-lg-hidden'>
                <hr>
            </div>    
        </div>  

        <?=valida_reservaciones_public(
            $in_session ,
            $evento["reservacion_tel"] ,
            $evento["reservacion_mail"] , 
            base_url('index.php/eventos/nuevo')."/".$evento['idevento']."/reservaciones/"
        )?>
        

        <div>
            <div class='place_bloque_extra'>
            </div>    
            <div class='bloque_extra'>
            </div>                    
        </div>
    </div>
</div>