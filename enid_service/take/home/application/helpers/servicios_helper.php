<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
  function serviciosevent($arreglo){
       
    $pos =1;  
    $servicios  = '<table class="table display table table-bordered dataTable">';                    
    $servicios .= "<tr class='enid-header-table'>"; 
    
    $servicios .=  get_td("#" , "");
    $servicios .=  get_td("Servicio" , "");
    $servicios .=  get_td("Incluir nota" , "");
    $servicios .=  get_td("<button title='Seleccionar ó deseleccionar' class='btn btn-info up-all-serv'> 
      <i class='fa fa-check-square '> </i> </button>" , "");
    $servicios .= "</tr>";

        foreach ($arreglo as $row){

            $idservicio =  $row["idservicio"];
            $nombreservicio = $row["servicio"];
            $idserviciointer  =  $row["idserviciointer"];
            


            if (isset($nota)) {
                $nota =  $row["nota"];       
            }else{
              $nota = "+ Cargar nota";  
            
            }  
            
            
            $nota_area_ = "nota_area_".$idservicio;
            $text_area_nota_servicio  = "text_area_nota_servicio" . $idservicio;  
            $nota_area =  "<i class='nota-servicio fa fa-list-alt' id='". $idservicio ."' data-toggle='modal' data-target='#modal-descripcion-servicio'></i>              
              <div class='nota-form-servicio' id='". $nota_area_ ."' >
                <textarea class='form-control' id='".$text_area_nota_servicio."' rows='2'>". $nota ."</textarea>
              </div>
              ";


              if ($idserviciointer  == $idservicio ) {                  
                $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."' checked>";  
              }else{              
                $dinamiccheck ="<input type='checkbox' class='serviciocheck' id='". $idservicio ."'>";
              }

              $servicios .= "<tr>";  
              $servicios .= get_td( $pos , "");
              $servicios .= get_td( $nombreservicio , "class='franja-vertical'");
              $servicios .= get_td($nota_area  , "");  
              $servicios .= get_td( $dinamiccheck , "");                                 
              $servicios .= "<tr>";  
              $pos ++;
          }  
  $servicios .= "</table>";
  return  $servicios;
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