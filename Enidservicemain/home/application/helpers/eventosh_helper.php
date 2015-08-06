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


}/*Termina el helper*/
 




