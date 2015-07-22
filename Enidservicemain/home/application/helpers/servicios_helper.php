<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/

	function serviciosevent($arreglo){

    $fila = "";        
    $pos =1;  
		$servicios = "
		<table class='table table-bordered table-striped dataTable' id='dynamic-table'>
    <thead><tr role='row'><th>#</th><th>Servicio</th><th>Incluido</th></tr></thead><tbody >";

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
                      <td class=' '> ". $pos . "</td>
                      <td class=' '>". $nombreservicio ."</td>
                      <td class=' '>". $dinamiccheck."</td>
                
                    </tr>";

               $pos ++;
          }  
  $servicios .= $fila;     
  $servicios .= "</tbody></table>";
	return 	$servicios;


}

    





}/*Termina el helper*/
 




