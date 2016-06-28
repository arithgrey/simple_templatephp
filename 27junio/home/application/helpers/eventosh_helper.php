<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
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
/*********************************************************************************+*/
function get_list_objpermitidos( $data ){


	$list_objpermitidos ='<div>
								<ul>';
	foreach ($data as $row) {
		$list_objpermitidos .= '<li class="objeto-permitido-evento">
									<i class="fa fa-check text-default">
									</i> '
									. $row["nombre"].'
										<div class="descripcion-objeto-permitido" >'.								
											$row["descripcion"]
											.
										'</div>
									</li>';

		
	}
	$list_objpermitidos .='</ul></div>';
    return $list_objpermitidos;								
}

/****************************+ Pagination  **********************************/

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
		if (count($ultimos_eventos) == 0 ) {
			$elements.= default_template_eventos();
		}
        foreach ($ultimos_eventos as $row){
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
			$servicios =  $row["servicios"];
			$evento_punto_venta =  $row["evento_punto_venta"];
			$accesos =  $row["accesos"];
			$dinamic_section = "dinamic_section".$id_evento;

		
			

			$config =""; 
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
                                <a href="#"></a> '.$edicion .'  |  '.$fecha_evento.'   | <a href="#">5 Comments</a>
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
		                    <small>Lorem ipsum dolor sit
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




	

}/*Termina el helper*/

