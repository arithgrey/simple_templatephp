<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/

function get_time_line_event($arreglo_time_line){

  $time_list ="";
  $i=0;
  $b =1;


  if (count($arreglo_time_line) ==  0 ) {
    $time_list = get_time_def();
  }


  foreach ($arreglo_time_line as $row) {
      
      $idevento = $row["idevento"];
      $nombre_evento = $row["nombre_evento"];
      $descripcion_evento = $row["descripcion_evento"];
      $descripcion_evento = substr($descripcion_evento , 0 , 150 );
      $fecha_inicio = $row["fecha_inicio"];
      $fecha_termino =  $row["fecha_termino"];
      $url_social = $row["url_social"];
      $url_social_youtube =  $row["url_social_youtube"];
      $portada = $row["portada"];
      $status = $row["estadoevento"];
      $edicion = $row["edicion"];
      $totalescenarios = $row["totalescenarios"];

      $fecha_time = $fecha_inicio ." al día " . $fecha_termino  ;
      $i++; 

        if (($i % 2) == 0) {
       
             $time_list .="<article class='timeline-item '>
                              <div class='timeline-desk'>
                                  <div class='panel'>
                                      <div class='panel-body enid-p-b'>
                                          <span class='arrow'></span>
                                          <span class='timeline-icon'>". $b ."</span>
                                          <span class='timeline-date'>10:00 am</span>
                                          
                                          <h1 class=''><a href='#'>".$nombre_evento."</a></h1>
                                            <p class=' auth-row white-p'>
                                                Edición <a href='#'>". $edicion ."</a>   |   ". $fecha_time ."   | <a href='#''>".$totalescenarios." Escenarios</a>
                                            </p>

                                          <p class='white-p'>
                                              ". $descripcion_evento ."
                                          </p>


                                      </div>
                                  </div>
                              </div>
                          </article>";

        }else{

             



             $time_list .=" <article class='timeline-item alt'>
                              <div class='timeline-desk'>
                                  <div class='panel'>
                                      <div class='panel-body enid-p-b'>
                                          <span class='arrow-alt'></span>
                                          <span class='timeline-icon'>". $b ."</span>
                                          <span class='timeline-date'>08:25 am</span>
                                            
                                            <h1 class=''><a href='#'>".$nombre_evento."</a></h1>
                                            <p class=' auth-row '>
                                                Edición <a href='#'>". $edicion ."</a>   |  ".$fecha_time."   | <a href='#''>".$totalescenarios." Escenarios</a>
                                            </p>

                                          <p class='white-p '>
                                              ". $descripcion_evento ."

                                          </p>

                                      </div>
                                  </div>
                              </div>
                          </article>";

        }

         
         
        $b++;
  }


                      


return $time_list;


}
    

function get_time_def(){
  $time_list ="<article class='timeline-item '>
                              <div class='timeline-desk'>
                                  <div class='panel'>
                                      <div class='panel-body'>
                                          <span class='arrow'></span>
                                          <span class='timeline-icon'></span>
                                          <span class='timeline-date'>10:00 am</span>
                                          

                                          <h1 class=''><a href='#'>Neque porro quisquam est qui dolo</a></h1>
                                            <p class=' auth-row'>
                                                By <a href='#'>Anthony Jones</a>   |   27 December 2014   | <a href='#''>5 Comments</a>
                                            </p>

                                          <p>
                                              Completed Coffee meeting with  regarding the Product Promotion
                                              Donec ultrices faucibus rutrum. Phasellus sodales vulputate urna, vel accumsan augue egestas ac. Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci.

                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </article>";





  return $time_list;
}



}/*Termina el helper*/
 




