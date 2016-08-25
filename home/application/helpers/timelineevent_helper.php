<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
function get_time_line_event($arreglo_time_line , $longitud_descripcion_text){
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
      $descripcion_evento = substr($descripcion_evento , 0 , $longitud_descripcion_text );
      $fecha_inicio = $row["fecha_inicio"];
      $fecha_termino =  $row["fecha_termino"];
      $url_social = $row["url_social"];
      $url_social_youtube =  $row["url_social_youtube"];
      $portada = $row["portada"];
      $status = $row["status"];
      $edicion = $row["edicion"];
      $totalescenarios = $row["escenarios"];
      $url_complete = base_url('index.php/eventos/nuevo/'.$idevento);
      $url_complete_view = base_url('index.php/eventos/visualizar/'.$idevento."?start=".$fecha_inicio."&end=".$fecha_termino."&status=" . $status );
      $eslogan =  $row["eslogan"];
      $artistas  =  $row["artistas"];
      $evento_punto_venta =  $row["evento_punto_venta"];      
      $accesos  =  $row["accesos"];
    
      $tipo = $row["tipo"];              
      $ubicacion =  $row["ubicacion"];         
            
      if ($artistas ==  1 ) {
          $artistas .=   " Artista";      
      }else{
          $artistas  .=  " Artistas";      
      }    



      if ($totalescenarios ==  1 ) {
          $totalescenarios .= " Escenario";
      }else{
          $totalescenarios .= " Escenarios";
      }

      if ($evento_punto_venta ==  1 ) {
          $evento_punto_venta  .=  " Punto de venta";
      }else{
          $evento_punto_venta.=  " Puntos venta"; 
      }

      if ($accesos ==  1 ) {
          $accesos  .= " Acceso"; 
      }else{
          $accesos  .= " Accesos"; 
      }

      $fecha_time = $fecha_inicio ." al día " . $fecha_termino  ;
      $i++; 

        if (($i % 2) == 0) {
       
             $time_list .="<article class='timeline-item '>
                              <div class='timeline-desk'>
                                  <div class='panel' style='background:#D12F2F;'>
                                      <div class='panel-body'>
                                                                                    
                                          <div style='background:black; padding:10px; border-radius:3px;' >
                                            <a style='font-size:1.2em; color: white;' href='$url_complete'>".$nombre_evento . "<span style='font-size:.8em; color:#0AA4EC;'> " . $edicion  ."</span>" ."</a> 
                                            
                                            <a style='font-size: .9em; color:#FFFFE2;  ' class='pull-right'>". $fecha_time ." </a>
                                          </div>                                          
                                          <p class='col-lg-12  auth-row white-p' style='background:#07444B; color:white; !important; padding:1px;' >
                                                   <a  class='pull-right ' href='#'>".$totalescenarios." | ". $artistas ." | ". $evento_punto_venta  ." | ". $accesos ." </a>
                                          </p>
                                          
                                          <div class='well col-lg-12' >
                                            <p class='col-lg-9'>
                                                ". $descripcion_evento ."
                                            </p>
                                            <div class='col-lg-3'>
                                              <img width='100%' style='border-radius:10px;' src='". base_url($portada) ."'> 
                                            </div>
                                          </div>


                                      </div>
                                  </div>
                              </div>
                          </article>";

        }else{

             



             $time_list .=" <article class='timeline-item alt'>
                              <div class='timeline-desk'>

                                  <div class='panel' style='background:#D12F2F;'>
                                      <div class='panel-body'>
                                                                                    
                                          <div style='background:black; padding:10px; border-radius:3px;' >
                                            <a style='font-size:1.2em; color: white;' href='$url_complete'>".$nombre_evento . "<span style='font-size:.8em; color:#0AA4EC;'> " . $edicion  ."</span>" ."</a> 
                                            
                                            <a style='font-size: .9em; color:#FFFFE2;  ' class='pull-right'>". $fecha_time ." </a>
                                          </div>                                          
                                          <p class='col-lg-12  auth-row white-p' style='background:#07444B; color:white; !important; padding:1px;' >
                                                   <a  class='pull-right ' href='#'>".$totalescenarios." | ". $artistas ." | ". $evento_punto_venta  ." | ". $accesos ." </a>
                                          </p>
                                          
                                          <div class='well col-lg-12' >
                                            <p class='col-lg-9'>
                                                ". $descripcion_evento ."
                                            </p>
                                            <div class='col-lg-3'>
                                              <img width='100%' style='border-radius:10px;' src='". base_url($portada) ."'> 
                                            </div>
                                          </div>


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