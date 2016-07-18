        
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
                    <div class="row">                                            
                        <div>
                            <span  class='la_experiencia'>
                                La experiencia
                            </span>       
                            <div class='text-center'>
                                <?=$data_evento["edicion"]?>
                            </div>             
                            <hr>   
                            <center>
                                <a class='fechas'>                                
                                    <?=$data_evento["ubicacion"]?>  
                                </a>
                            </center>                        
                            <div class='section-descripcion-evento'>                                    
                                <?=substr( $data_evento["descripcion_evento"] , 1   , 270 );?>                                                                         
                                <center>                                                                    
                                    <a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_evento['idempresa']?>"  class='conoce_historia'>
                                            Conoce nuestra historia
                                    </a>
                                    <br>
                                    <button class='btn btn-default btn_save' id='more-info-event'>
                                                Info. 
                                        <i class="fa fa-chevron-down">
                                        </i> 
                                    </button>
                                </center>
                            </div>
                            <div class='section-descripcion-evento-complete'>                                    
                                <?=$data_evento["descripcion_evento"];?>                            
                                <center>                                                                       
                                    <a href="<?=base_url('index.php/emp/lahistoria/')?>/<?=$data_evento['idempresa']?>"  class='conoce_historia' >
                                        Conoce nuestra historia
                                    </a>
                                    <div class='separate-enid'>
                                    </div>
                                    <button class='btn btn-default btn_save' id='lessinfo_event'>
                                        Info. 
                                        <i class="fa fa-chevron-up">
                                        </i>
                                    </button>
                                </center>
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
      
        <!--Superior --> 
        <a href="<?=base_url('index.php/eventos/nuevo/' . $data_evento['idevento'])?>" title='configurar' >
            <span class="pull-right editar_client"> 
                <?=editar_btn($in_session , base_url('index.php/eventos/nuevo' .'/'.$data_evento['idevento']) );?>          
            </span>
        </a>     

<style type="text/css">
.dias_restantes,.la_experiencia{
    font-size: 2em;
    font-weight: bold;
}
.accesos_seccion{
    background:#ececec;
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