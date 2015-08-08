<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/

	function serviciosevent($arreglo){

    $fila = "";        
    $pos =1;  
		$servicios = "
		<table class='table' id='dynamic-table'>
    <thead class=''><tr role='row'><th class='blue-col-enid'>#</th><th>Servicio</th><th><button class='btn btn-info'><i class='fa fa-check-square'></i></button></th></tr></thead><tbody >";

        foreach ($arreglo as $row){


            $idservicio =  $row["idservicio"];
            $nombreservicio = $row["servicio"];
            $idserviciointer  =  $row["idserviciointer"];

                if ($idserviciointer  == $idservicio) {
                  
                  $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."' checked>";  
                }else{
                  $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."'>";
                }

                $fila .="<tr class='gradeX even'>
                      <td class='blue-col-enid'> ". $pos . "</td>
                      <td class=' '>". $nombreservicio ."</td>
                      <td class=' '>". $dinamiccheck."</td>
                
                    </tr>";

               $pos ++;
          }  
  $servicios .= $fila;     
  $servicios .= "</tbody></table>";
	return 	$servicios;


}

    



/******************** in view main visualization  *********************   */

function list_services_default_view($arreglo){

  $list_servicios ='';

  foreach ($arreglo as $row) {
      
      $list_servicios.='<li>'. $row["servicio"] .'<i class="icon-check-1"></i></li>';    
  }

   

  return $list_servicios;
}


/******************** in view main visualization  end *********************   */






function get_servicios_inclidos_event($data_servicios_array){

  $list_servicios ='';
  /*Cliclo */
  foreach ($data_servicios_array as $row) {      
    $list_servicios .='<li><a style="text-decoration:none; background: #09AFDF !important" href="#">'.$row["servicio"].'</a></li>';
  }

  return $list_servicios;
}



}/*Termina el helper*/
 




