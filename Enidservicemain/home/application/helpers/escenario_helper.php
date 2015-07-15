<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/


function listescenariosonloadevent($responsedbescenario){

	$list = "<ul class='activity-list'>";

	if (count($responsedbescenario) == 0 ) {
	
	$list .="		

									
                                        <li>                                          
                                            <div class='avatar'>
                                            <img src=". base_url('application/img/blue.png'). " >
                                            </div>
                                            <div class='activity-desk'>

                                                <h5><a data-toggle='modal' data-target='#modalesenarios' href='#'>Escenario 1 ejemplo</a> 
                                                    <span>La experiencia que se vivirá aquí será única</span></h5>
                                                    <p class='text-muted'>Artistas incluidos #10</p>
                                            </div>

                                        </li>                                        
                                    ";

	}




	foreach ($responsedbescenario as $row) {
	
	$descripcion = $row["descripcion"];
	

	if (strlen($descripcion ) == 0 ) {
		$descripcion = "<br>+ agregar descripción";			
	}		


	$list .="		

									
                                        <li>                                          
                                            <div class='avatar'>
                                            <img src=". base_url('application/img/blue.png'). " >
                                            </div>
                                            <div class='activity-desk'>

                                                <h5><a data-toggle='modal' data-target='#modalesenarios' href='#'>". $row["nombre"] ."</a> 


                                                    <span>". $descripcion ."</span>

                                                    </h5>
                                                    <p class='text-muted'>Artistas incluidos #</p>
                                            </div>

                                        </li>                                        
                                    ";

	}


	$list .="</ul>";
	return $list;
	
	
}


}/*Termina el helper*/
 