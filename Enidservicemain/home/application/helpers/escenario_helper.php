<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/


function listescenariosonloadevent($responsedbescenario){

	$list = "<ul class='activity-list'>";

	if (count($responsedbescenario["todos"]) == 0 ) {
	
	$list .="		
									
                                        <li>                                          
                                            <div class='avatar'>
                                            <img src=". base_url('application/img/blue.png'). " >
                                            </div>
                                            <div class='activity-desk'>                                            

                                                <h5><a data-toggle='modal' data-target='#modalesenarios' href='#modalesenarios'>Escenario principal </a> 
                                                    <br><span>La experiencia que se vivirá aquí será única ...</span></h5>
                                                    <p class='text-muted'>Artistas incluidos # 10</p>
                                            </div>

                                        </li>                                        
                                    ";

	}




	foreach ($responsedbescenario["todos"] as $row) {
	

        
        //conartistas

    $idescenariovalidation  = $row["idescenario"];
    $tipoescenario =  $row["tipoescenario"];

    $numero_artistas = 0;
    $numero_artistas =  getnumeroartistas( $responsedbescenario["conartistas"] ,
    $idescenariovalidation );
        
	$descripcion = $row["descripcion"];
	if (strlen($descripcion ) == 0 ) {
		$descripcion = "<br>+ agregar descripción";			
	}		

	$inpu_escenario ="inpu_escenario_" . $row["idescenario"];
	
	$list .="		

									
                                        <li>                                          
                                            <div class='avatar'>
                                            <img data-toggle='modal' data-target='#modalesenariosedit' class='edita-modal-escenario' id='". $row["idescenario"] ."'  src=". base_url('application/img/blue.png'). " >
                                            </div>
                                            <div class='activity-desk'>

                                                <h5><a data-toggle='modal' data-target='#modalesenariosedit' class='edita-modal-escenario' id='". $row["idescenario"] ."'  >". $row["nombre"] ."</a> 
                                                <br>

                                           <span class='descripcion_escenario_update' id='".
                                            $row["idescenario"] . "'    >". 
                                            substr($descripcion, 0 , 200)   ."..</span>
                                           
                                            <textarea  name='newdescripesenario' class='newdescripesenario form-control'  rows='3' id=". $inpu_escenario  .">".$row["descripcion"]."</textarea>

                                                    </h5>
                                                    <p class='text-muted'>Artistas incluidos #".$numero_artistas." ,  ".$tipoescenario." </p>


                                                    <i data-toggle='modal' data-target='#confirmationdeleteescenario' class='fa fa-times deleteescenario' id='". $row["idescenario"] ."' ></i>

                                            </div>

                                        </li>                                        
                                    ";

	}


	$list .="</ul>";
    $data["info"] = $list;
    $data["numero_escenarios"] = count($responsedbescenario["todos"]);
	return $data;
	
	
}
    




    function getnumeroartistas($responsedbescenario, $idescenariovalidation ){

        $numero_artistas = 0;


        foreach ($responsedbescenario as $row) {
            
            if ($row["idescenario"] ==  $idescenariovalidation) {
                $numero_artistas = $row["numeroartistas"];         
            }
        }

        return $numero_artistas;

      

    }
        

/*****************+****************+****************+****************+****************+*/

    function infoescenario($arrayinfo){


        $e ="";

        
        $nombreescenario ="";
        $tipoescenario = $arrayinfo["general"][0]["tipoescenario"];
        $nombreescenario =  $arrayinfo["general"][0]["nombre"];
        $descripcion = $arrayinfo["general"][0]['descripcion']; 
        



                                



            $listartistas ="";
            foreach ($arrayinfo["artistas"] as $xrow) {
                

                $idartista = $xrow["idartista"];
                $horainicioterminoartista = $xrow["hora_inicio"] . " - " . $xrow["hora_termino"];

                $listartistas .= "<li class='clearfix'>
                                    <span class='drag-marker'>
                                    <i></i>
                                    </span>
                                    <div class='todo-check pull-left'>
                                        <i data-toggle='modal' data-target='#horarioartista' class='fa fa-clock-o horario_artista' id='".$idartista."'></i>
                                    </div>
                                    <p class='todo-title'>
                                        ". $xrow["nombre_artista"] ."   , ". $horainicioterminoartista."
                                    </p>
                                    <div class='todo-actionlist pull-right clearfix'>

                                        <a href='#' ><i class='fa fa-times todo-remove remove-artista' id='".$idartista."' ></i></a>
                                    </div>
                                </li>
                            ";
    
            }

            





        $data[0] = $e;


        if (strlen($descripcion)<1 ) {
            $descripcion =  "+ agregar descripción";
        }


        $iniciotermino =  $arrayinfo["general"][0]["fecha_presentacion_inicio"] . "-" .  $arrayinfo["general"][0]["fecha_presentacion_termino"];
        
        $data['descripcion'] =   $descripcion; 
        $data['artistas'] =  $listartistas;
        $data['tipoescenario'] =  $tipoescenario;
        $data['nombreescenariomodal'] = $nombreescenario;
        $data['iniciotermino'] = $iniciotermino;


        return $data;

    }

/*****************+****************+****************+****************+****************+*/


    



}/*Termina el helper*/
 