<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){


	/*Mes en letras*/
  
	function getTimeFormat3($time){

		$new_time = "";
		$b = 0;

		$a= $time[0].$time[1].$time[2].$time[3];
		$m = $time[5] . $time[6];

		$d=$time[8] . $time[9]."/";

		$hora = $time[10] . $time[11].$time[12] . $time[13].$time[14] . $time[15].$time[16] . $time[17]. $time[18];
		$meses = [ "" , "Ene" , "Feb", "Mar" , "Abr", "May" , "Jun", 
						"Jul", "Ago", "Sep", "Oct" , "Nov", "Dic"];

		$nuevo_mes = (int)$m;			
		$nm = $meses[$nuevo_mes]."/";

		return $d . $nm . $a  .$hora;


		//return $time;
	}

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




	function generatehorarioartista($namestart , $nameend){

		$generado ="<table class='table col-lg-12'> 
				<tr>
					<td><select class='form-control'class=". $namestart." id=". $namestart." name=". $namestart." >";
							
        $inhorario ="";                        
        $inhorariob  ="";
                             

        for ($i=0; $i <24 ; $i++) { 


        	if ($i <12) {
        		$inhorario =" AM "; 
        	}else{
        		$inhorario =" PM "; 
        	}

          if ($i <10  ){

          			$i = "0".$i;	
          }

          $pt= $i . $inhorario;

          $generado .="<option value=". $pt .">". $pt ."</option>";  


          	for ($r=0; $r < 60; $r++) { 

          		if ($r <10) {
          			$r = "0".$r;
          		}
          		$minutosI=$i .":" . $r; 

              $pi = $minutosI . $inhorario;
          		$generado .="<option value=". $pi .">". $pi."</option>";  

          	}


        } 

        $generado .="</select></td>";
        
        $generado .="
        			<td><select class='form-control' id=". $nameend ." class=". $nameend ." name=" . $nameend .">";
							
                                
                             

        for ($b=0; $b <24 ; $b++) { 


        	if ($b< 12) {
        		$inhorariob =" AM "; 
        	}else{
        		$inhorariob =" PM "; 
        	}


        	if ($b <10) {
        		$b = "0".$b;
        	}

          $pii = $b . $inhorariob ;
        	$generado .="<option value=". $pii .">". $pii ."</option>";            

        	for ($x=0; $x < 60; $x++) { 

        		if ($x <10) {
          			$x = "0".$x;
          		}

        		$minutosT=$b .":" . $x; 
            $poo = $minutosT . $inhorariob;
        		$generado .="<option value=". $poo .">". $poo ."</option>";            
        	}
          
        } 

        $generado .="</select></td></tr></table>";



        return $generado;

	}





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
  


}/*Termina el helper*/
 

