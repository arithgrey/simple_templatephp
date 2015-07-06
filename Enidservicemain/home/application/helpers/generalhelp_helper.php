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




}/*Termina el helper*/
 