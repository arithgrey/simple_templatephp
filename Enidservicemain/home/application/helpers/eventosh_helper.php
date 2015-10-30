<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
function listobjetosp( $arreglo ){ 	
	$list ="";
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
		$list .=  "<tr><td>".$b."   </td><td>  ". $nombre."</td><td>". $input ."</td><tr>";
		$b++;

	}

	return $list;

}
/*********************************************************************************+*/
function get_list_objpermitidos( $array_objpermitidos ){

	$list_objpermitidos ='';
	$delay = 100;
	foreach ($array_objpermitidos as $row) {
		$list_objpermitidos .= '<li class="object-non-visible animated object-visible fadeIn" data-animation-effect="fadeIn" data-effect-delay="'.$delay.'"><i class="fa fa-check text-default"></i> '. $row["nombre"] .'</li>';

		if ($delay < 600) {
			$delay = $delay + 100;	
		}else{
			$delay = $delay - 100;	

		}
		
	}
    return $list_objpermitidos;								
}

/****************************+ Pagination  **********************************/

function get_paginarion_principal($limit_display){

	$anterior = "";
			switch ($limit_display) {
				case 3:
					$anterior = '<li class="active"><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 10:
					$anterior = '<li><a href="'. base_url('index.php/inicio/eventos/') .'">ANTERIOR</a></li>
					<li><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 50:
					$anterior = '<li><a href="'. base_url('index.php/inicio/eventos/10') .'">ANTERIOR</a></li>
					<li ><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;

				break;
				case 1000:
					$anterior = '<li><a href="'. base_url('index.php/inicio/eventos/50') .'">ANTERIOR</a></li>
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


function get_last_events_empresa($ultimos_eventos, $limit_text= 270 ,  $show_edit=0 , $show_delete = 0 ){
		$elements ="";
		
		if (count($ultimos_eventos) == 0 ) {

			$elements.= default_template_eventos();
		}

        foreach ($ultimos_eventos as $row){
			
			$urlnext = base_url('index.php/eventos/nuevo/'.$row["idevento"]."?start=".$row["fecha_inicio"] ."&end=".$row["fecha_termino"]."&status=".$row["status"] );
			$id_evento = $row["idevento"];
			
			
			$img = "<img src='". base_url($row["portada"])."' class='media-object'> ";

			$estadoevento = get_statusevent($row["status"]);			 
			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >

                                        <div class='media blog-cmnt'>
                                                <a href='$urlnext' class='pull-left'>
                                                    ".$img."
                                                </a>
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='$urlnext'> <label>".$row["nombre_evento"] ."</label>
                                                        ".  $row["edicion"] ." </a>

                                                    </h4>
                                                    <span style='font-size: 1em;' class='mp-less'>
                                                        ". substr ($row["descripcion_evento"] , 0, $limit_text) ."...
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                            <ul class='revenue-nav'>		                                        
		                                        <li>

		                                        <div class='btn-group-vertical' aria-label='Vertical button group'>
											      

											      <div class='escenarios_evento btn-group'    role='group'>
											        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>											          
											          <li>
											          <a href='#'><i class='fa fa-play'></i> </a></li> Escenarios ". $row["escenarios"]."
											          <span class='caret'></span>

											        </button>

											        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          
											          <div class='escenarios_in_event_".$id_evento."'  id='escenarios_in_event_".$id_evento." '></div>											          
											        </ul>

											      </div>											      
											    </div>


											    
											    <button  type='button' class='btn btn-default dropdown-toggle' 
											        style='background:#586D74 !important;' >											          
											          <li>
											          
											          <i class='fa fa-headphones'></i>
 													  </li> ". $row["artistas"]." Artistas

											          <span class='caret'></span>
											    </button>
											    



												<div class='btn-group-vertical' aria-label='Vertical button group'>											      
											      <div class='acceso_evento btn-group'    role='group'>
											        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle' 
											        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background:#0D6B8A !important;' >											          
											          <li>
											          <a style='background: #10382E !important' href='#'>
											          <i class='fa fa-money'></i>
 													  </a></li> ". $row["accesos"]." Accesos

											          <span class='caret'></span>
											        </button>
											        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          
											         
											          <div class='acceso_in_event_".$id_evento."'  id='acceso_in_event_".$id_evento." '></div>											          

											        </ul>
											      </div>											      
											    </div>


											   	
											   	
											    <button   type='button' class='btn btn-default dropdown-toggle puntos_venta_next' 
											        style='background:rgb(23, 78, 96) !important;' id='".$id_evento ."' >											          
											          
											          <li>
											          
											          <i class='fa fa-credit-card'></i>
 													  </li> ". $row["evento_punto_venta"]." puntos venta

											          <span class='caret'></span>
											    </button>
											    






		                                        <a class='edith-fecha-evento'  data-toggle='modal' data-target='#modal-update-evento'   id='". $row["idevento"]  ."'>
		                                        		<i class='fa fa-calendar-o'></i>
	                                                     ".  $row["fecha_inicio"]." -
	                                                     ".$row["fecha_termino"] ."
	                                            </a>
                                                </li>";

                                                if ($show_edit == 1 ){
                                                	$elements .="<li class='active' ><a href='#'>". $estadoevento ."</a></li>";
                                                }if ($show_delete == 1) {
                                               		$elements .=" <li class=''> <a class='delete_evento' id='".$id_evento. "'  ><i class='delete_evento fa fa-trash-o' id='".$id_evento."'></i></a></li>";		 	
                                                }
                                                
                                                $elements.="
		                                    </ul>		                                    
                                        </div>
                                    </div>";
        }                            
		return $elements;                                    	
	}


/*****************************************************************************************/
/*RETORNA LA PLANTILLA EN CASO DE QUE EL CLIENTE AÚN NO HAYA REGISTRADO EVENTOS */
	function default_template_eventos(){
					$elements = "
								<div class='panel'>
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


    $slider = '<div class="row" style="padding:5%; background: #069F89; border-radius: 10px;" ><div id="Carousel-escenario" class="carousel slide" data-ride="carousel">';
    $slider .= '<div class="row"><ol class="carousel-indicators">';

    for ($a=0; $a <count($data); $a++) {                 
        if($a < 1 ){
            $slider .= '<li data-target="#Carousel-escenario" data-slide-to="'.$a.'" class="active"></li>';                
        }else{
            $slider .= '<li data-target="#Carousel-escenario" data-slide-to="'.$a.'" ></li>';        

        }        
    }
    $slider .= '</ol><div>';    
    $slider .='<div class="row"><div class="carousel-inner" role="listbox">';
    $flag =0;
    foreach ($data as $row) {   

        $path_img = $row["base_path_img"]. $row["nombre_imagen"]; 

        if ($flag < 1 ) {
            
            $slider .= '<div class="item active">
                      <img src="'. base_url($path_img) .'" alt="">
                    </div>';            
        }else{
            $slider .= '<div class="item">
                      <img src="'. base_url($path_img) .'" alt="">
                    </div>';        
        }        
        $flag ++;
    }
    $slider .= '</div></div>';

    $slider .= '<div class="row">  <a class="left carousel-control" href="#Carousel-escenario" role="button" data-slide="prev">
                <span class="fa fa-chevron-left  fa-3x" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="right carousel-control" href="#Carousel-escenario" role="button" data-slide="next">
                <span class="fa fa-chevron-right  fa-3x" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a></div>';
    $slider .= '</div></div></div></div>';
    return $slider;
}


	




}/*Termina el helper*/