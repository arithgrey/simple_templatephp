<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/


function listobjetosp( $arreglo ){ 
	
//objetospermitidos

	$list ="";

	

	$b =1;

	foreach ( $arreglo as $row) {
		
		  
		$idobjetopermitido = $row["idobjetopermitido"];
		$idpermitido = $row["idpermitido"];
		$nombre = $row["nombre"];

		if ($idobjetopermitido == $idpermitido  ) {
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

function get_date_event_format($inicio , $termino){

	$date="";
	if ($inicio == $termino) {
		$date = $inicio;		
	}else{
		$date = $inicio ." al " . $termino;
	}
	return $date;
}


}/*Termina el helper*/
 







