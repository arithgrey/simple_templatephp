<?php

    $imgs_portada =""; $class_extra =""; $flags =""; $flag =1;     $a = 0; 
    $nombre_evento =  $param["nombre_evento"]; 
    $imgs_portada .= '<div class="item active">
                        <div class="portada_principal"> 
                        	<span class="titulo_evento_slider">
                        	'.$nombre_evento .'                                                          
                        	</span>
                        </div>                                
                       </div>';

    $flags .= '<li data-target="#myCarousel" data-slide-to="0" class="active">
                    <a href="#">                            
                        <small>
                        	La experiencia 
                        </small>
                    </a>
                </li>
                    ';                  

                        

        foreach($imagenes_portada as $row){

            $img =  create_icon_img($row , " "  , " " ); 
            $a  ++; 
            $imgs_portada .= '
							<div class="item ">
							    <div class="portada_principal">    
							    '. $img .'
							    </div>                               
							    <div class="carousel-caption">
							        <h3>
										Headline
							        </h3>
							        <p>
										Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
							        </p>
							    </div>
							</div>
							';

            $flags .= '<li data-target="#myCarousel" data-slide-to="'.$flag.'" class="indicador_slider">
                            <a href="#">
                            '.$a .'                            
                            </a>
                        </li>
                        ';                  


            $flag ++;                       
        }

        

?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">        
    <div class="carousel-inner">           
      <?=$imgs_portada?>
    </div>        
    <div class="pagination_enid">
        <ul class="nav nav-pills nav-justified">
            <?=$flags?>
        </ul>
    </div>
</div>
<style type="text/css">
.titulo_evento_slider{
	font-size: 4em;
	text-align: center;
}
</style>