<div id="myCarousel" class="carousel slide" data-ride="carousel">        
        <div class="carousel-inner">           
            <?=$slider_evento_principal["imagenes"];?>    
        </div>        
        <ul class="nav nav-pills nav-justified">
            <?=$slider_evento_principal["flags"];?>        
        </ul>
</div>








<div class="row">    
  <div class="col-md-12">
    <div id="postlist">
      <div class="panel">
                <div class="panel-heading">
                    <div class="text-center">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="pull-left">
                                	<?=$evento["nombre_evento"]?> (<?=$dias_restantes_evento;?> ) 
                                	<?=$evento["fecha_inicio"]?> - <?=$evento["fecha_termino"]?>                                 	
                                </h3>
                            </div>
                            <div class="col-sm-3">
                                <h4 class="pull-right">
                                <small>
                                	<em>
                                		<?=$evento["eslogan"]?>
                                	</em>
                                </small>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="panel-body">
                <?=$evento["descripcion_evento"]?>
                <a href="#">
                	Read more .. 
                </a>
            </div>            
            <div class="panel-footer">            	
            		<?=$generos_musicales_tags;?>            	
            </span>
            </div>
        </div>
        
        
    </div>
  
</div>
  
</div>

