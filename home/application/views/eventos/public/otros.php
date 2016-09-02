<?php    
    $extra_class= '' ;   
    if (count($proximos_eventos)>3) {
        $extra_class= ' class= " scroll-enid-public scroll-vertical-enid " ';                  
    }        
	$seccion ="";
	foreach ($proximos_eventos as $row){
		$idevento =  $row["idevento"];
        $nombre_evento  =  $row["nombre_evento"];
        $edicion =  $row["edicion"];
        $fecha_inicio =  $row["fecha_inicio"];
        $fecha_termino =  $row["fecha_termino"];
        $fecha_evento= fechas_enid_format( $fecha_inicio  , $fecha_termino );         
        $descripcion_evento =  substr($row["descripcion_evento"] , 0 ,  120);
        $ubicacion =  $row["ubicacion"];
        $eslogan =  $row["eslogan"];
        $tipo  =  $row["tipo"]; 
        $map =  "<i class='fa fa-map-marker' title='".$ubicacion."'></i>"; 
        $next_url =  base_url('index.php/eventos/visualizar') . "/". $idevento;        
        $img =  create_icon_img($row , "img-responsive"  , " " ); 
        $url_maps =  base_url('index.php/eventos/visualizar')."/" .$idevento."#enid-maps";
			$seccion .='
        			<div class="brdr bgc-fff  box-shad  property-listing">
                        <div class="media">
                            <a class="pull-left" href="'.$next_url.'" target="_parent">
                           '. $img .'
                            <div class="clearfix visible-sm">
                            </div>
                            <div class="media-body fnt-smaller">
                                <a href="" target="_parent">
                                </a>
                                <h4 class="media-heading">
                                  <a href="#" target="_parent">                                  	
                                  	<small class="pull-right">
                                  	'.$edicion.'
                                  	</small>
                                  </a>
                                </h4>
                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">                                    
                                    <li>
                                    	'.$fecha_evento.'
                                    </li>
                                    <li style="list-style: none">
                                    	|
                                    </li>
                                    <li>
                                        <a href="'.$url_maps .'">
                                            '.$map.'
                                        </a>    
                                    </li>
                                    <li style="list-style: none">
                                        |
                                    </li>
                                    <li>
                                    '.$tipo.'
                                    </li>                                    
                                </ul>
                                <p class="hidden-xs">
                                	'.$descripcion_evento.'
                            	</p>
                            	<span class="fnt-smaller fnt-lighter fnt-arial">
                            		'. $eslogan  .'
                            	</span>
                            </div>
                        </div>
                    </div>
                    <div class="divider_block">
                    </div>
                    ';

	}

?>

<div id="property-listings">                   
    <div>
        <div>
            <h1>
                    Las mejores experiencias a tu alcance 
            </h1>
            <span class='text-more-events'>
                    Otros eventos que pueden interesarte 
            </span>
        </div>
    </div>
    <div <?=$extra_class?> >
        <?=$seccion?>
    </div>            	
</div>    








<!---->
<style type="text/css">
.list-inline>li {
    padding: 0 10px 0 0;
}
.container-pad {
    padding: 30px 15px;
}
/**** MODULE ****/
.bgc-fff {
    background-color: #fff!important;
}
.box-shad {
    -webkit-box-shadow: 1px 1px 0 rgba(0,0,0,.2);
    box-shadow: 1px 1px 0 rgba(0,0,0,.2);
}
.brdr {
    border: 1px solid #ededed;
}

/* Font changes */
.fnt-smaller {
    font-size: .9em;
}
.fnt-lighter {
    color: #bbb;
}
/* Padding - Margins */
.pad-10 {
    padding: 10px!important;
}
.mrg-0 {
    margin: 0!important;
}
.btm-mrg-10 {
    margin-bottom: 10px!important;
}
.btm-mrg-20 {
    margin-bottom: 20px!important;
}

/* Color  */
.clr-535353 {
    color: #535353;
}
.text-more-events{
    font-size: .9em;
    font-weight: bold;
}
/**** MEDIA QUERIES ****/
@media only screen and (max-width: 991px) {
    #property-listings .property-listing {
        padding: 5px!important;
    }
    #property-listings .property-listing a {
        margin: 0;
    }
    #property-listings .property-listing .media-body {
        padding: 10px;
    }
}
@media only screen and (min-width: 992px) {
    #property-listings .property-listing img {
        max-width: 180px;
    }
}
.divider_block{
    padding: 6px;
}
.text_otros{
    color: #FFEF6F;
}
.h1_otros{
    color: white;
    font-weight: bold;
}
</style>
