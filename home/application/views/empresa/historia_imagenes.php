
<div class='col-lg-8 col-md-8 col-sm-12'>    
    
    <div class='comunidad-experiencia-imgs' id='comunidad-experiencia-imgs'>
    </div>                            
    <div>        
        <div class='iconos-comunidad'>
        </div>
        <div class="panel-body">                                

                <?=edita_section_mensaje_comunidad(
                    $data_empresa["mensaje_comunidad"] , 
                    $in_session , 
                    "text-edit-mensaje-comunidad")
                ?>

            <div class='place-msj-comunidad' id='place-msj-comunidad'>
            </div>            
            <?=get_iconos_sociales($data_empresa["idempresa"], $in_session , $data_empresa["facebook"] , $data_empresa["tweeter"] , $data_empresa["gp"] , $data_empresa["www"]);?>            
        </div>
    </div>
    <div class="block clearfix">                
        <div class='comentarios-usuarios' id='comentarios-usuarios'>
        </div>                       
    </div>                            
</div>

<aside class="col-lg-4 col-md-4 col-lg-12 ">            


    <div>
        <div class="panel-heading panel-nuestra-comunidad">
            <h3 class="panel-title title-cominidad">            
                <span>
                    <?=valida_reservaciones( 
                            $in_session , 
                            $data_empresa["reservacion_tel"] , 
                            $data_empresa["reservacion_mail"] ,  
                            "reservaciones-modal" )?>    
                </span>                
            </h3>            
        </div>
    </div>    


    <a class="twitter-timeline" href="https://twitter.com/enidservice">
        Enid Service 
    </a>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8">                
    </script>                        
</aside>    


