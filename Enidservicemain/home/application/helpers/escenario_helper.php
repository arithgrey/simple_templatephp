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

                                                <h5><a data-toggle='modal' data-target='#modalesenarios' href='#modalesenarios'>Escenario 1 ejemplo</a> 
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

	$inpu_escenario ="inpu_escenario_" . $row["idescenario"];
	

	$list .="		

									
                                        <li>                                          
                                            <div class='avatar'>
                                            <img src=". base_url('application/img/blue.png'). " >
                                            </div>
                                            <div class='activity-desk'>

                                                <h5><a data-toggle='modal' data-target='#modalesenariosedit' class='edita-modal-escenario' id='". $row["idescenario"] ."'  >". $row["nombre"] ."</a> 
                                                <br>

                                           <span class='descripcion_escenario_update' id='".
                                            $row["idescenario"] . "'    >". 
                                            $descripcion ."</span>
                                           
                                            <textarea  name='newdescripesenario' class='newdescripesenario form-control'  rows='3' id=". $inpu_escenario  .">".$row["descripcion"]."</textarea>

                                                    </h5>
                                                    <p class='text-muted'>Artistas incluidos #</p>
                                                    <i data-toggle='modal' data-target='#confirmationdeleteescenario' class='fa fa-times deleteescenario' id='". $row["idescenario"] ."' ></i>

                                            </div>

                                        </li>                                        
                                    ";

	}


	$list .="</ul>";
	return $list;
	
	
}


/*****************+****************+****************+****************+****************+*/

    function infoescenario($arrayinfo){


        $e ="";

        

        $tipoescenario = $arrayinfo["general"][0]["tipoescenario"];
        $nombreescenario =  $arrayinfo["general"][0]["nombre"];
        $descripcion = $arrayinfo["general"][0]['descripcion']; 
        $e = "
        <div class='well' style='color : black' >

                    <div class='row'>

                         
                    <button class='col-lg-12 btn btn-primary' type='button'> 
                    <i class='fa fa-flag-checkered'></i> ". $nombreescenario ."</button>
                        <aside class='mail-nav'>
                    
                    <div class='mail-nav-body'>
                        
                        <ul class='nav nav-pills nav-stacked mail-navigation'>
                            
                            <li><a href='#'> <i class='fa fa-envelope-o'></i> Send Mail</a></li>
                            <li><a href='#'> <i class='fa fa-certificate'></i> Important</a></li>
                            <li><a href='#'> <i class='fa fa-heart-o'></i> ".$tipoescenario ." 
                            <span class='label label-info pull-right inbox-notification'>*</span></a></li>
                            


                        </ul>

                       
                    </div>
                   
                </aside>


                </div>
            ";
        



                                



            $listartistas ="";
            foreach ($arrayinfo["artistas"] as $xrow) {
                

                $idartista = $xrow["idartista"];

                $listartistas .= "<li class='clearfix'>
                                    <span class='drag-marker'>
                                    <i></i>
                                    </span>
                                    <div class='todo-check pull-left'>
                                        <input type='checkbox' value='None' id='todo-check4'>
                                        <label for='todo-check4'></label>
                                    </div>
                                    <p class='todo-title'>
                                        ". $xrow["nombre_artista"] ."
                                    </p>
                                    <div class='todo-actionlist pull-right clearfix'>

                                        <a href='#' class='todo-remove remove-artista' id='".$idartista."'><i class='fa fa-times'></i></a>
                                    </div>
                                </li>
                            ";
    
            }

            





        $data[0] = $e;
        $data['descripcion'] =   $descripcion; 
        $data['artistas'] =  $listartistas;


        return $data;

    }

/*****************+****************+****************+****************+****************+*/



}/*Termina el helper*/
 