<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/
	



	function serviciosevent($arreglo){


		$servicios = "
		<table class='table table-bordered table-striped dataTable' id='dynamic-table'>
        <thead>
        <tr role='row'>
          <th>
          	#
          </th>
          <th>
          	Servicio
          </th>
          <th>
          	Incluido
          </th>
        
        </tr>
        </thead>
        

        <tbody >";


          

   	$servicios .= filtra($arreglo );  	    

    $servicios .= "
        </tbody>
      </table>
      ";
	return 	$servicios;


}

    



function filtra($arreglo ){	

	$fila ="";
	$in =1;

	foreach ($arreglo["servicios"] as $rowservicios) {
			
			$idservicio =  $rowservicios["idservicio"];
			$nombreservicio = $rowservicios["servicio"];


      $bandera=0;

      foreach ($arreglo["eventoservicios"] as $roweventoservicios) {
        
          if ($roweventoservicios["idservicio"] == $idservicio ) {
            $bandera ++;
          }
      }


      if ($bandera >0 ) {
        
        $input_incluido= "<div class='checkbox'><input class='serviciocheck'  id='".$idservicio."'  type='checkbox' value='' checked></div>";  
      }else{
        $input_incluido= "<div class='checkbox'><input class='serviciocheck'  id='".$idservicio."'  type='checkbox' value=''></div>";
      }
      
			

			$fila .="<tr class='gradeX even'>
			            <td class=' '>". $in . "</td>
			            <td class=' '>". $nombreservicio ."</td>
			            <td class=' '>". $input_incluido."</td>
            
          			</tr>";


          			$in ++;
	}/*End for*/


return $fila;
}


}/*Termina el helper*/
 




