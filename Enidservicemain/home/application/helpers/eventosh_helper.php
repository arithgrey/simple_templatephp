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
    





}/*Termina el helper*/
 




