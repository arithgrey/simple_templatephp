<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	/**/
	function valida_maps_public($formatted_address ,  $id_evento  ){
		$maps =  "<span class='text-map-prox'>
					Próximamen la se publicará el lugar del evento
				  </span>"; 

		if (trim(strlen($formatted_address)) >  3 ){
			$url = base_url('index.php/maps/map') . "/".$id_evento."/0/";
			$maps ="
			    <span class='text_map'>
		        	".$formatted_address." 
		        </span>
		        <iframe  height='500px;' width='100%'   id='iframe_maps_conf'  
		             src='".$url."'>
		        </iframe> 
		        ";	
		}



		$maps_complete =  "
						<div class='col-lg-12 col-md-12 col-sm-12'>      
		    				<div class='maps_enid'>
							".$maps."		
							</div>
						</div>
						";
		return $maps_complete;				
		


	}
/**/
  function slider_item($imgs , $param){
    $item = '<div class="carousel-inner">';
      $x =0;
      foreach ($imgs as $row) {
        $flag_indicator =  "";
        $slider_num =  "slide-".$x;
        if ($x == 0 ) {
          $flag_indicator =  "active";     
        }
        $msj_extra =  "";                
        $text_slogan =  create_text_slogan($param["slogan"], $param["in_session"], $param["id_evento"]);  
        if ($param["public"] == 1 ) {
          $msj_extra = '
              <span class="nombre-evento-enid">
                '.$param["nombre_evento"].'
              </span>        
              <h3>
               	'.$text_slogan .'
              </h3>                                          
            ';
        }          
        $item .=  '<div class="item slides '.$flag_indicator.' ">';
        $imagen  =  create_icon_img($row , $slider_num , " " );  
        $item .="<div> ".$imagen."</div>";
                 $item .='<div class="hero">                            
                              '.$msj_extra .'
                          </div>'; 
        $item .=  '</div>';
        $x ++;
      }
    $item .= '</div>';
    return $item;
  }
  /**/
  function slider_ol($num_imgs){

    $indicator =  '<ol class="carousel-indicators">'; 
    for ($x=0; $x <$num_imgs ; $x++) {       
      $flag_indicator =  "";
      if ($x == 0 ) {
        $flag_indicator =  "active";     
      }
      $indicator.=  '<li data-target="#bs-carousel" data-slide-to="'.$x.'" class="'.$flag_indicator .'"></li>';
      
    }
    $indicator.= '</ol>';
    return $indicator;    
  }

/**/
function construye_resumen_eventos_e($data_eventos , $limit_text= 270 ,  $show_edit=0 , $show_delete = 0 , $show_view_like_public = 0 ){

	if ($data_eventos["num_eventos"]>0 ) {		
		return "ok";
	}else{
		return "<center><span class=''>No has publicado eventos durante los últimos 30 días</span></center>";
	}
}
/**/
function display_objs_pemitidos($objs){
    

    $total = 0;  
    $list_templa_contenido='';
    $class_enid = '';
    if (count($objs)> 5) {
        $class_enid = 'scroll-vertical-enid scroll-enid-public';
    }
    if (count($objs) > 0){    

    $list_templa_contenido='<div class=" '.$class_enid.' ">
                            <div >
                            <ul class="activity-list">';
    $flag = 1;                                       

    foreach ($objs as $row) {
       

       		$total ++; 
      		$idobjetopermitido = $row["idobjetopermitido"];
			$nombre = $row["nombre"];
			$descripcion = $row["descripcion"];
			$status = $row["status"];				  
        	$list_templa_contenido.= '
						        	<li>
						                <div class="avatar">
						                 '.$flag .'.- 
						                </div>
						                <div class="activity-desk">
						                    <h5>
						                        <a href="#">
						                        '. $nombre .'
						                        </a>                                                 
						                    </h5>
						                    <p class="text-muted">
						                	'.$descripcion.'
						                    </p>
						                </div>
						            </li>
			';
                       
        
                                $flag++;
    }
    $list_templa_contenido .= '</ul>
                            </div> 
                        </div>
                    ' ;                   
    }
    
    $total_resumen =  ""; 
    $total_resumen .=  $list_templa_contenido;
    return  $total_resumen; 

}





/**/	
function objs_pemitidos($objs , $in_session ,  $id_evento){
	$list_objs  =  ""; 
	$num_elementos = count($objs); 
	$href =  base_url("index.php/eventos/nuevo/"  . $id_evento . "/objs/#portlet_tab2" );
	$editable = agregar_btn($in_session  , $href );
	if ($num_elementos > 0 ) {		
		$list_objs =  display_objs_pemitidos($objs);
	}else{
		$list_objs = tmp_objs_permitidos( $in_session ,  $id_evento);
	}
	return $list_objs;
}
/**/
function tmp_objs_permitidos( $in_session ,  $id_evento){
		
	if ($in_session ==  1  ) {
		$href =  base_url("index.php/eventos/nuevo/"  . $id_evento . "/objs/#portlet_tab2" );
		$editable = agregar_btn($in_session  , $href );
		return $editable; 			
	}else{
		return "<span class='msj_proximamente_objs'>Próximamente.!</span>";
	}		
	
}
/**/
function validacion_objs_permitidos($descripcion ,  $in_session ,  $id_evento , $tramo_url = ''  ){    
   

    $url_config  =  base_url('index.php/eventos/nuevo') . "/" . $id_evento ."/".$tramo_url;
    if(strlen(trim($descripcion)) > 10 ){ 
      return  $descripcion . " ". editar_btn($in_session , $url_config ); 
    }else{      
        if($in_session){
            $btn =  editar_btn($in_session , $url_config );
            return "<span class='msj_user_text_servicios msj_notificacion_config'> Has una especificación para el público ". $btn . "</span>";    
        }else{
          return " "; 
        }       
    }
}  
/**/
function load_complete_genero($data){
	    $table = "";
	    $table .= '<table class="table table-bordered">
	    	<tr class="text-center enid-header-table">';
	    $table .= get_td("#" , "");  
	    $table .= get_td("Genero musical" , "");	   
	    
	    $table .= '</tr>';            
	    $flag =  1;
	    foreach ($data as $row) {

	        $table .=  "<tr>"; 
	        $table .= get_td($flag , "");
	        $table .= get_td($row["nombre"], "");
	        
	        $table .=  "</tr>"; 
	        $flag ++; 
	    }
	    return $table; 
}
/**/
function proximos_eventos($data){

	$proximos_eventos =  "";  
	foreach ($data as $row){		
		$id_evento		=  $row["idevento"];
		$nombre_evento	=  $row["nombre_evento"];
		$fecha_inicio =  $row["fecha_inicio"];	
		$url = base_url('index.php/eventos/visualizar/')."/" .  $id_evento;
		$proximos_eventos .=  "<a href='". $url ."'><button style='background:#093245; color:white;' class='btn btn-default'>". $nombre_evento ."</button></a>";
	}
	return $proximos_eventos;
}

/**/
function listobjetosp( $arreglo ,  $id_evento ){ 	
	
	$height =  ""; 			
	if (count($arreglo) > 10 ){ $height ="style='overflow-y:scroll;  height: 300px;' "; }
	$btn =  "<i class='fa fa-check-square   btn-all-articulos'>
			</i>
		    ";


	$list ="<div $height >
			<table class='table_enid_service' border=1>
				<tr class='table_enid_service_header' >";
				$list .= get_td("#"); 
				$list .= get_td("Objeto permitido"); 
				$list .= get_td("Seleccionar " . $btn ); 
	$list .= "</tr>";
	$b =1;



	foreach ( $arreglo as $row) {	

		$idobjetopermitido = $row["idobjetopermitido"];
		$nombre = $row["nombre"];
		$descripcion = $row["descripcion"];
		$idevento = $row["idevento"];		

		if ($idevento != null  ) {
			$input ="<input type='checkbox' class='objpermitido' id='". $idobjetopermitido ."' checked >";	
		}else{
			$input ="<input type='checkbox' class='objpermitido' id='".$idobjetopermitido ."' >";
		}		
		
		$list .=  "<tr>";
			$list .= get_td($b); 
			$list .= get_td($nombre); 
			$list .= get_td($input); 
		$list .= "<tr>";
		$b++;
	}
	$list .= "</table>
		</div>";
	return $list;

}
function get_pagination_principal($limit_display){

	$anterior = "";
			switch ($limit_display) {
				case 3:
					$anterior = '<li class="active" title="Mostrar"><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 10:
					$anterior = '<li title="Mostrar" ><a href="'. base_url('index.php/inicio/eventos/') .'">ANTERIOR</a></li>
					<li><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 50:
					$anterior = '<li title="Mostrar"><a href="'. base_url('index.php/inicio/eventos/10') .'">ANTERIOR</a></li>
					<li ><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;

				break;
				case 1000:
					$anterior = '<li title="Mostrar" ><a href="'. base_url('index.php/inicio/eventos/50') .'">ANTERIOR</a></li>
					<li ><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li ><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
						

				default:
					$anterior = "";
					break;
			}


		$dinamic_pagination = '<div class="text-center">
                <ul class="pagination blog-pagination">                    
                	'. $anterior.'	
                </ul>

            </div>';
            return  $dinamic_pagination;

}

/***********************************END PAGINATION ****************************/
function get_experiencia_last_events_by_empresa($data_eventos){
$elements ="";


	foreach ($data_eventos as $row){
			
			$urlnext = base_url();
			$id_evento = $row["idevento"];			
			
			$estadoevento = get_statusevent($row["estadoevento"]);			 
			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >

                                        <div class='media blog-cmnt'>
                                                
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='$urlnext'> <label>".$row["nombre_evento"] ."</label>
                                                        ".  $row["edicion"] ." </a>

                                                    </h4>
                                                      <ul class='revenue-nav'>
				                                        <li><a href='#'><i class='fa fa-play'></i> Escenarios ". $row[""]."</a></li>		                                        		                                        
				                                    </ul>
                                                    
                                                </div>
                                            </div>
                                          

                                        </div>

                                    </div>";
        }                            
		return $elements;                                    	
}	
/**/
function get_date_event_format($inicio , $termino){

	$date="";
	if ($inicio == $termino) {
		$date = $inicio;		
	}else{
		$date = $inicio ." al " . $termino;
	}
	return $date;
}
/*Últimos eventos */
function get_last_events_empresa($ultimos_eventos, $limit_text= 270 ,  $show_edit=0 , $show_delete = 0 , $show_view_like_public = 0){	

		$elements ="<div class='col-12 col-md-12 col-sm-12'>";		
		if ($ultimos_eventos["num_eventos"] == 0  ) {

			if ($show_edit ==  1) {
				$elements.= "<center><span class='msj_notificacion_config'>No has publicado eventos durante los últimos 30 días</span></center>";	
			}	
			
		}else{
				foreach ($ultimos_eventos["eventos"] as $row){
			$id_evento = $row["idevento"];					
			$url_edith = base_url('index.php/eventos/nuevo/'.$row["idevento"]);
			$url_next =  base_url('index.php/eventos/visualizar/') ."/". $id_evento; 			
			$img  = create_icon_img($row ,  "  " , " " ); 

			$nombre_evento = $row["nombre_evento"]; 
			$descripcion_evento =  substr($row["descripcion_evento"] ,  0 ,  250);
			$view_like= "";
			$estado_event =  "";
			$delete_event  =  ""; 	
			$fecha_inicio =  $row["fecha_inicio"];
			$fecha_termino = $row["fecha_termino"];
			$fecha_evento =  fechas_enid_format($fecha_inicio , $fecha_termino );  
			$eslogan =  $row["eslogan"];
			$edicion =  $row["edicion"]; 
			$escenarios  =  $row["escenarios"];
			$artistas =  $row["artistas"];			
			$evento_punto_venta =  $row["evento_punto_venta"];
			$accesos =  $row["accesos"];
			$dinamic_section = "dinamic_section".$id_evento;
			$config =""; 
			$url_maps=  base_url('index.php/maps/map') ."/". $id_evento."/0/";
			$resumen_section  = resumen_evento($show_edit , $escenarios , $id_evento , $artistas , $evento_punto_venta , $accesos ); 

			if($show_edit == 1){									
					$config = '
					<a title = "Configura el evento " href="'.$url_edith.'" class="more resum_evento pull-right">
                        <i class="fa fa-cog"></i> 
                    </a>'; 
			}
			
			$elements .= '			        
        <div class="panel"> 
        					
        		'.$config.'
        		
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="blog-img-sm">
                            	<a href="'.$url_next.'" >
                                '. $img .'
                                <a>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h1 class="">
                            	<a href="'.$url_next.'">
                            	'. $nombre_evento  .'
                            	</a>
                            </h1>

                            <p>
                            <p class=" auth-row">
                                <a href="#"></a> '.$edicion .'  |  '.$fecha_evento.'   | <a href="#">5 Comments</a>|
                                <a href="'.$url_maps.'"><i class="fa fa-map-marker locacion" id="'.$id_evento.'" ></i></a>
                            </p>
                            
                            '. $descripcion_evento .'
                            </p>
                            '. $resumen_section   .'
                        </div>
                    </div>
                </div>
            </div>

            	<div class="'.$dinamic_section.'" >
            	</div>
            <hr>
        ';                            




 			



        }      



		}
        
        $elements .=  "</div>";                      
		return $elements;                                    	
	}

function resumen_evento($public , $escenarios ,$id_evento  , $artistas , $evento_punto_venta , $accesos ){


	$href_evento  =""; 
	$href_pv = ""; 
	if ($public ==  0 ) {
		$url_evento =  base_url('index.php/eventos/visualizar') . "/" .$id_evento;
		$href_evento =  "href= '". $url_evento ."' ";
		$url_puntos_venta =  base_url("index.php/eventos/accesosalevento/") ."/" .$id_evento;
		$href_pv =  "href= '". $url_puntos_venta ."' ";
	}
	

	$resumen_section = '							
        <a '.$href_evento.'  class="resum_evento escenarios_evento  " id="'. $id_evento .'"   >
        #'.$escenarios.' Escenarios
        </a>
        <a '.$href_evento.' class="resum_evento escenarios_artistas_principal " id="'. $id_evento .'"  >#'.$artistas .' artistas
        </a>
        <a '.$href_pv .' class="resum_evento puntos_venta_principal " id="'. $id_evento .'"  ># '.$evento_punto_venta .'Puntos de venta
        </a>
        <a '.$href_pv .' class="resum_evento acceso_evento  " id="'. $id_evento .'"  ># '.$accesos .'Promociones
        </a>
	';
	
	return $resumen_section; 
}

/*****************************************************************************************/
/*RETORNA LA PLANTILLA EN CASO DE QUE EL CLIENTE AÚN NO HAYA REGISTRADO EVENTOS */
	function default_template_eventos(){
					$elements = "
								<div class='panel' title='Ejemplo' >
                                    <div class='panel-body ' style='' >
                                        <div class='media blog-cmnt'>
                                                <a href='javascript:;' class='pull-left'>
                                                    <img alt='' src='". base_url('application/img/example.jpg') ."' class='media-object'>
                                                </a>
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='#'>Fantastic event (ejemplo)</a>
                                                    </h4>
                                                    <p class='mp-less'>
                                                        Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival I love this generation ...
                                                    </p>
                                                   <i class='fa fa-calendar-o'></i> 07/02/2015 - 07/04/2015 
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
		return $elements;

}	

/**/
function get_slider_img_evento($data){

	$slider = '<div class="carousel-inner">'; 
	$flag = 0; 
	$class =''; 



	if (count($data) ==  0 ){

			
			$slider .=  '
	            <div class="item  active ">
	                <div class="row">
	                    <div class="col-xs-6 col-sm-5 col-md-5">
	                        <a href=""> 
	                         <img src="" class="thumbnail">
	                        </a>
	                    </div>
	                    <div class="col-xs-6 col-sm-7 col-md-7">
	                        Registra images al evento.!
	                    </div>
	                </div>                    
	            </div>
	            ';
	}		
    foreach ($data as $row) {    		
	   	$img =  create_icon_img($row , 'thumbnail' , ' ' );  	
	   	if ($flag == 0 ) {
	   		$class= ' active ';
	   		$flag++;
	   	}else{
	   		$class= '';
	   	}
	   	$slider .=  '
	            <div class="item  '. $class .' ">
	                <div class="row">
	                    <div class="col-xs-6 col-sm-5 col-md-5">
	                        <a href=""> 
	                          '. $img .'
	                        </a>
	                    </div>
	                    <div class="col-xs-6 col-sm-7 col-md-7">
	                              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
	                              euismod tincidunt ut laoreet..
	                    </div>
	                </div>                    
	            </div>
	            ';
	}

	    $slider .= '</div>';     
    return $slider;
}


	
	/***********************************************************************************/
	function get_slider_principal_evento($imgs , $data_evento){
		$imgs_evento ="";
		$class_extra ="";
		$flags ="";
		$flag =1; 
		$imgs_evento .= '<div class="item active">

								<div style="height:750px;">
									<center>
							            <label style="font-size:4em;" class="text-center">
							                	'. $data_evento["nombre_evento"]  .'
							            </label>				                
						            </center>
					            </div>
				                <div class="carousel-caption">
				                    <h3>
				                   	'. $data_evento["eslogan"] .'
				                    </h3>				                   
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

			            

		foreach($imgs as $row){

			$img =  create_icon_img($row , " "  , " " ); 
			
			$imgs_evento .= '<div class="item ">
				                '. $img .'
				                <div class="carousel-caption">
				                    <h3>
				                        Headline</h3>
				                    <p>
				                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
				                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
				                        ipsum dolor sit amet, consetetur sadipscing elitr.</p>
				                </div>
				            </div>';

			$flags .= '<li data-target="#myCarousel" data-slide-to="'.$flag.'" class="">
		                <a href="#">
		                    About
		                    <small>
		                    Lorem ipsum dolor sit
		                    </small>
		                </a>
		            </li>
           			'; 		            


			$flag ++;			            
		}

		$slider["imagenes"] =  $imgs_evento; 
		$slider["flags"] =  $flags;
		return $slider;
	}
	/**/
	function create_text_slogan( $slogan , $in_session ,  $id_evento ){

		$msj = ''; 
		$seccion = ''; 
		if ($in_session ==1  ) {						
			$msj =  "
					No has registrado un slogan para el evento. 
					"; 
			if ( strlen(trim($slogan))> 0) { $seccion =  seccion_slogan($slogan , $in_session ,  $id_evento   );}else{$seccion =  seccion_slogan($msj , $in_session ,  $id_evento );}		
		}else{			
			if (strlen(trim($slogan)) > 0 ) {$seccion =  seccion_slogan($slogan , $in_session ,  $id_evento  );	}
		}
		return $seccion; 
	}
	/**/
	function seccion_slogan($msj , $in_session,  $id_evento  ){

		$url =  base_url('index.php/eventos/nuevo/'.$id_evento.'/eslogan');
		$btn =  editar_btn($in_session , $url ); 
		$seccion = '<span>
						<small class="slogan">                   
						'.$msj.'
						</small>'.$btn.'
					</span>';
		return $seccion; 
	}
	/**/

	function create_text_descripcion($descripcion ,  $in_session   , $id_evento ){		

		$text =  c_seccion_descripcion($descripcion , $in_session  , $id_evento ); 

		$url =  base_url('index.php/eventos/nuevo/'.$id_evento."/#portlet_tab4");
		$btn =  editar_btn($in_session , $url );
		$seccion = "					
						<div class='btn-config-enid-desc'>" . $btn . "</div>
						<div class='descripcion_seccion seccion-config-enid-desc'>
							". $text  ."			            
						</div>					
					";   
		return $seccion;
	}
	/**/
	function c_seccion_descripcion($descripcion , $in_session , $id_evento){		
		$text =  trim($descripcion); 
		$new_text =  $descripcion; 
		if ($in_session == 1 ){
			if (strlen($descripcion) < 5 ){ $new_text =  '
					<span class="msj_notificacion_config" > 
						Registra una descripción del evento 
					</span>'; 		
														}
		}else{
			if (strlen($descripcion) < 5){$new_text = 'Próximamente lo que vivirás  al asistir al evento.'; }
		}				
		if (strlen($text) > 300 ){			
			$primer_part = "<span class='hiddden_descripcion'>  "  .  $text . "</span>";
			$part_descripcion =  substr($text, 0 ,  270);  
			$new_text = $primer_part . "<span class='show_descripcion' >". $part_descripcion ."</span>

										<center>
											<span class='row more-info-f more-info-f-down'>
												<i class='fa fa-chevron-down' aria-hidden='true'>
												</i>
											</span>
											<span class='row more-info-f more-info-f-up'>
												<i class='fa fa-chevron-up' aria-hidden='true'>
												</i>
											</span>

										</center>"; 			
		}




		
		return $new_text;            	
	}
	/**/
	function create_text_edicion($edicion ,  $in_session , $id_evento){

		$text =  ""; $new_text =  "";
		$url =  base_url('index.php/eventos/nuevo/'.$id_evento."/");
		$btn =  editar_btn($in_session , $url );

		if ($in_session == 1 ) {
			$new_text =  $edicion; 
			if(strlen($edicion) == 0 ){
				$new_text =  "<span class='msj_notificacion_config'> 
								Registra la edición del evento 
							  </span>";				
			}
		}else{
			if (strlen($edicion) > 0 ) {
				$new_text =  $edicion;
			}
		}
		return  "<div class='btn-config-edicion-desc-l'>" . $btn ."</div>".$new_text; 
	}
	/**/
	function construye_resumen_artista($data , $in_session){

		$num_agregados =  count($data); 
		
		$elements = "<h1 class='link_next_accesos'>
						Algunos artistas del evento 
						
					</h1>"; 
		
		if ($in_session ==  1 ){			
			if ($num_agregados < 1 ){

				$elements .=  "<ul class='items'>
					                <li>
					                	No has cargado artistas al evento                        
					                </li>                   
					          </ul> "; 		

			}else{
				
				$elements .=  construye_resumen_artistas_data($data); 
			}	
		}else{
			/*Cuendo no está en sessión */
			if ($num_agregados < 1 ) {
				$elements =  ""; 		
			}else{
				$elements .=  construye_resumen_artistas_data($data); 
			}	
		}	
		return $elements; 
	}
	/**/
	function construye_resumen_artistas_data($data){

		$elements =  "<ul class='items'>";
		foreach ($data as $row){
			$elements .=  "
							<li>
								". $row["artista"] ."
							</li>
							";						
		}
			$elements .=  "
							<li>
							 .......
							</li>
							";						

		$elements .=  "</ul>";
		return $elements; 
	}
	/**/
	function construye_resumen_politicas_restricciones($politica , $restriccion , $in_session ){

		$element = ""; 
		$num_politica =  strlen($politica); 
		$num_restriccion =  strlen($restriccion); 
		$flag = 0; 
		$flag_b = 0; 
		if ($num_politica > 5 ){
			$flag = 1; 			
		}if ($num_restriccion > 5 ){
			$flag_b = 1; 			
		}	
		return evalua_politica_descripcion( $flag , $flag_b , $in_session , $politica , $restriccion ); 

	}
	/**/
	function evalua_politica_descripcion( $flag , $flag_b,  $in_session , $politica , $restriccion ){

		$element =  ""; 

		if($flag ==  0  && $flag_b ==  $flag ) {
			/* Cuando no hay nada de texto  */
			if ($in_session ==  1 ) {
				$element ='	
					<p class="disclosure">
						No has cargado ninguna política o descripción al evento. 
					</p>		
				';	
			}else{
				$element =  "";
			}
			return $element; 
		}
		/*break*/
		if ($flag == 1 ) {
			return '
					<p class="disclosure">
						'. $politica  .'
					</p>		
					';					
		}
		/**/
		if ($flag_b == 1 ) {
			return '
					<p class="disclosure">
						'. $restriccion .'
					</p>		
					';
		}	
	}
	/**/
	function contruye_ubicacion($ubicacion , $in_session ,  $id_evento ){
		/**/		
		$span =  ""; 
		$num_ubicacion =  strlen(trim($ubicacion)); 			
		if ($in_session ==  1 ){
			if ($num_ubicacion > 0 ){
				$span =  "<span class='text_ubicacion' >
							". $ubicacion ."
						  </span>";				
			}else{

				$btn = editar_btn($in_session, base_url('index.php/eventos/nuevo/'.$id_evento.'/#mapaevento '));
				$span = $btn. "<span class='text_ubicacion 	msj_notificacion_config' >
							No has registrado la locación del evento. 
						  </span>";				
			}		
		}else{
			if ($num_ubicacion > 0 ){
				$span =  "<span class='text_ubicacion' >
							". $ubicacion ."
						  </span>";				
			}else{
				$span =  "<span class='text_ubicacion' >
							Próximamente 
						  </span>";				
			}		
		}
		return $span; 
	}	   
	/**/	
	function estado_evento( $status , $in_session  ,  $id_evento , $dia = ''){
		$status_final =  ""; 

		if ($in_session == 1 ){
			$status_final = construye_status($status  , $id_evento , $dia);	
		}else{
			$status_final =  construye_status_client($status);
		}
		return $status_final; 
	}
	/**/
	function construye_status($status  , $id_evento  , $dia ){
		
		$status_final = ""; 
		switch ($status) {
			case 0:
				$status_final =  " En edición "; 
				break;
			case 1:
				$status_final =  " Actualmente disponible para el público "; 
				break;
			case 2:
				$status_final =  " El evento se encuentra actualmente cancelado"; 
				break;	
			case 4:
				$status_final =  " El evento se encuentra programado para ser público desde el día " . $dia ; 
						break;		
			default:				
				break;
		}

	

		$status_final_evento =  "
								<li class='pull-right info_estado config_estado_evento ' id='$id_evento' title='Este es el estado actual del evento, click para modificar'>
    								<a class='info_estado_a' >
    								". $status_final ."
    								</a>
    							</li>	
    							";

		return $status_final_evento; 
	}
	/**/
	function construye_status_client($status){
		$status_final =  "";
		if ($status ==  2){			
			/*Cargar que cuando */



			$status_final =  "	<li class='pull-right info_estado config_estado_evento ' id='$id_evento' title='Este es el estado actual del evento, click para modificar'>
    								<a class='info_estado_a' >
    									El evento ha sido cancelado. 
    								</a>
    							</li>	
    							"; 
		}
		return $status_final; 
	}
	/**/
	function evalua_social($url , $type , $in_session ){

		$social =  ''; 
		$icon =  ''; 
		$n_social =  ''; 
		if ($type ==  "fb"){			
			$icon =  ' fa fa-facebook ';
			$n_social =  ' Facebook '; 
		}elseif ($type == 'yt') {
			$icon =  ' fa fa-google-plus ';
			$n_social =  ' youtube '; 
		}
		if ($in_session == 1 ){
			if ( strlen($url)< 1 ) {
				$msj = "No has registrado url de " . $n_social . " para el evento ";
				$social .=  '
						<span class="aviso_social">
							'.$msj .'
						</span>
	        			';	
			}
			$social .=  '
						<li>
				            <a href="'.$url.'">
				                <i class="'.$icon.'">
				                </i>
				            </a>
				        </li>
	        			';
		}else{
			$social .=  '
						<li>
				            <a href="'.$url.'">
				                <i class="'.$icon.'">
				                </i>
				            </a>
				        </li>
	        			';					
		}		
		return $social; 	
	}
	/**/	
	function construye_tipo_evento($tipo , $in_session , $id_evento ){
		/**/
		$tipo_evento = "";
		if ($in_session == 1){
			$tipo_evento =  "
				<li class='pull-right config_tipo_evento ' id='$id_evento' title='Tipo de evento, click para modificar'>
    				<a class='info_tipo_evento' >
    				". $tipo ."
    				</a>
    			</li>	
				";
		}
		return $tipo_evento;		
	}
	/**/
	function estado_evento_name($estado , $programado = '' ){
		$status_final = ""; 
		switch ($estado) {
			case 0:
				$status_final =  " en edición."; 
				break;
			case 1:
				$status_final =  " actualmente disponible para el público."; 
				break;
			case 2:
				$status_final =  " actualmente cancelado."; 
				break;		
			case 4:
				$status_final =  " programado para ser público desde el día "  . $programado ; 
				break;	
					
			default:				
				break;
		}
		return $status_final;
	}
	/**/
	function muestra_estatus_event($status){

		$msj_extra =  "<br></br>
						<center>
						<button class='btn btn-default btn_save fijar_public' >
						Guardar como evento público ahora .!
					   </button>
					   </center>"; 
		if ($status == 1) {
			$msj_extra =  " Este ahora mismo es público para tus espectadores ";	
		}
		return $msj_extra; 
		
	}
	/**/
	function tipo_cancelacion($estado , $id_evento , $submotivos  , $f_cancelacion = '2016'  ){
			
		$url_form =  base_url("index.php/api/event/cancelacion/format/json/");		
		$status_final =  "El evento fue cancelado el día " . $f_cancelacion . " "; 

		
		$select =  "<select class='motivo_cancelacion form-control' name='motivo_cancelacion'>";

		foreach ($submotivos  as $row) {
			$id_motivo =  $row["id_motivo"];
			$descripcion =  $row["descripcion"];
			$select .=  "<option value='$id_motivo '>". $descripcion  ."</option>";
		}

		$select .=  "</select>";
		if ($estado !=  2) {
			$status_final = '	
				<form action="'.$url_form.'" id="form_cancelacion">
					<div>
						<div class="form-group">
						  '. $select .'
						  <label for="comment">
						  	Motivo de cancelación:
						  </label>
						  <textarea class="form-control nota_cancelacion" name="nota_cancelacion" rows="3" id="nota_cancelacion">
						  </textarea>
						  <button  class="btn  btn-default">
							Cancelar evento ahora
						  </button>
						</div>						
					</div>
				</form>
				';	
		}			
		return $status_final;
	}
	/**/
	function construye_select_estado_evento($estado_actual){

		$posibles  = array("Programar evento para que sea público en la fecha que indiques " , "Cambiar a evento público " , "Cancelar evento ");		
		$select =  "<select class='form-control input-sm select_estatus_evento' >"; 
		$b = 0; 
		for ($a=0; $a < count($posibles); $a++) { 

			if ($estado_actual !=  $a ){ 
				$select .=  "<option value='$a' >". $posibles[$a]."</option>";						
			}		
		}

		$select .=  "</select>"; 
		return $select;


	}
	/**/
	


}/*Termina el helper*/

