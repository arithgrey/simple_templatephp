<div class="col-md-12 col-lg-12 col-sm-12">                                                                                        
    <div class='col-md-8 col-lg-8 col-sm-12'>                    
        <div class='separate-enid'>
        </div>
        <div>       
            <?=valida_registro_promociones(lista_accesos_publicos($data_accesos , $in_session ,   $data_evento["idevento"]  )["num_accesos"] ,  $in_session ,  $data_evento["idevento"] )?>                                     
            <div class='accesos_seccion'>
                <div class='btn_more_accesos'>                                                    
                </div>
                <div class='accesos_seccion_contenedor'>
                    <?=lista_accesos_publicos($data_accesos , $in_session ,  $data_evento["idevento"] )["accesos"] ?>                                                                                               
                </div>
            </div>                        
        </div>                
    </div>
    <div class='col-md-4 col-lg-4 col-sm-12'>
        <span class='dias_restantes'>
            <?=$dias_restantes_evento;?>
        </span>                                
        <div class='place_bloque_extra'>
        </div>    
        <div class='bloque_extra'>
        </div>                    
    </div>  
</div>       
<style type="text/css">
.dias_restantes,.la_experiencia{
    font-size: 2em;
    font-weight: bold;
}
.accesos_seccion{
    background:#fafbf6;
}
.accesos_seccion_contenedor{
    width: 90%;
    margin: 0 auto;
}
.acceso_listado{
    background: white;
}
.btn_more_accesos{
    margin-top: 2px;
    margin-left: 2%;
}

</style>