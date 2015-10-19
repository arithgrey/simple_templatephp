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
				                                        <li><a href='#'><i class='fa fa-play'></i> Escenarios ". $row["totalescenarios"]."</a></li>		                                        		                                        
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
			if (strlen(getimg_event($id_evento)) > 0){
				$portada = base_url()."application/uploads/uploads/".$id_evento."/" . getimg_event($id_evento);
			}else{
				$portada = base_url("application/img/example.jpg");					
			}

			
			$estadoevento = get_statusevent($row["status"]);			 
			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >

                                        <div class='media blog-cmnt'>
                                                <a href='$urlnext' class='pull-left'>
                                                    <img src='$portada' class='media-object'>
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
											          <a href='#'><i class='fa fa-play'></i> </a></li> Escenarios ". $row["totalescenarios"]."
											          <span class='caret'></span>

											        </button>
											        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          
											          <div class='escenarios_in_event_".$id_evento."'  id='escenarios_in_event_".$id_evento." '></div>											          
											        </ul>

											      </div>											      
											    </div>





												<div class='btn-group-vertical' aria-label='Vertical button group'>											      
											      <div class='acceso_evento btn-group'    role='group'>
											        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle' 
											        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background:#0D6B8A !important;' >											          
											          <li>
											          <a style='background: #10382E !important' href='#'>
											          <i class='fa fa-money'></i>
 													  </a></li> Accesos
											          <span class='caret'></span>
											        </button>
											        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          
											         
											          <div class='acceso_in_event_".$id_evento."'  id='acceso_in_event_".$id_evento." '></div>											          

											        </ul>
											      </div>											      
											    </div>




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
	
	




}/*Termina el helper*/