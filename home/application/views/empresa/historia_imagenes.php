<div class='separate-enid'>
</div>
<div class='comunidad-experiencia-imgs' id='comunidad-experiencia-imgs'>
</div>                            
<div class="row form-group">
    <div class="col-xs-12 col-md-8">            
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Nuestra comunidad
                </h3>
            </div>
            <div class="panel-image">                    
                <div class='iconos-comunidad'>
                </div>
            </div>
            <div class="panel-body">                    
                <?=edita_section_mensaje_comunidad($data_empresa["mensaje_comunidad"] ,  $in_session  , $class='class="text-edit-mensaje-comunidad"' )?>                                                                
                <div class='place-msj-comunidad' id='place-msj-comunidad'>
                </div>
                <!--Social  social  -->  
                <?=get_iconos_sociales($data_empresa["idempresa"]  , $in_session , $data_empresa["facebook"] , $data_empresa["tweeter"] , $data_empresa["gp"] , $data_empresa["www"]);?>
                <!---Termina social-->
            </div>
        </div>
        <div class="block clearfix">                
            <div class='comentarios-usuarios' id='comentarios-usuarios'>
            </div>                       
        </div>                            
    </div>




        <aside class="col-md-4 ">            
            <a class="twitter-timeline" href="https://twitter.com/enidservice">
                Enid Service 
            </a>
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8">                
            </script>
                            
        </aside>


    </div>