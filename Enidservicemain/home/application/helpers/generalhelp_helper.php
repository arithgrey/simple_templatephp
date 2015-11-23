<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

  function get_td($val , $extra){

    return "<td  style='font-size:.9em !important;' ". $extra .">". $val ."</td>";
  }

  
/**/
  function get_count_select($inicio, $fin , $text_intermedio , $selected){


      $options ="";
      while ($inicio <= $fin) {
        
        if ($selected ==  $inicio ) {
          $options .="<option  selected value='". $inicio ."'>". $inicio ."</option>";
        }else{
          $options .="<option value='". $inicio ."'>". $inicio ."</option>";  
        }
        

        $inicio ++;    
      }

      
      return  $options;

  }
	/*Mes en letras*/
  
	function validatenotnullnotspace($cadena){	

		if (strlen($cadena )>0  ) {
			if ($cadena == null ) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}


	}/*End function*/




function get_tags_generos($arreglo_generos){  

    $tags_generos ='<ul class="revenue-nav">';

    foreach ($arreglo_generos as $row) {      
      $tags_generos .='<li><a style="text-decoration:none; background:#060B33!important;" href="#">'.$row["nombre"].'</a></li>';
    }
    $tags_generos .="</ul>";
    return $tags_generos;

}

  /*Filtros */

  function validate_text($texto){

       $texto = str_replace('"','', strip_tags($texto ));  
       $texto = str_replace("'",'', strip_tags($texto ));   
       return $texto;

  }


  /**/

  function valida_text_replace($texto_a_validar, $null_msj , $sin_text_msj ){

        if ($texto_a_validar == null ) {         
          
            return $null_msj;

        }else if( strlen($texto_a_validar) ==  0 ){        
          
            return $sin_text_msj;

        }else if( trim($texto_a_validar) ==  "" ){        
          
            return $sin_text_msj;

        }else{
            return  $texto_a_validar;
        }
}
function get_statusevent($status){

      $estado_evento ="";
      switch ($status) {
            case 0:
              $estado_evento = "Edición";
              break;
            case 1:
              $estado_evento = "Visible";
              break;
            case 2:
              $estado_evento = "Visible cancelado";
              break;            
            case 3:
              $estado_evento = "Visible pospuesto";
              break;            
            case 4:
              $estado_evento = "Cancelado";             
              break;                            
            case 5:
              $estado_evento = "Programado";              
              break;                              
            default:

              break;
          }

    return $estado_evento;      

  } 
  


  /**/
  function dias_evento($dias_evento){
    /**/
    $response =  ""; 
    if ($dias_evento < 0 ){
      $response =  "El evento ya ha sucedido"; 
    }else if($dias_evento == 0 ){
      $response =  "Éste día es el evento";           
    }else{
      $response =   "Días para el evento " .  $dias_evento;
    }

    return $response;
  }
  

}/*Termina el helper*/