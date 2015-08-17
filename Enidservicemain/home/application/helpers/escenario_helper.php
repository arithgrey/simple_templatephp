<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/


function list_resum_escenarios($array_escenario, $id_evento){

    $list ='';
    foreach ($array_escenario as $row){
         $nombre = $row["nombre"];
         $descripcion = $row["descripcion_escenario"];

         if ($row["tipoescenario"] == "General") {
              $tipo_escenario ='<li ><a style="text-decoration: none;" href="#">'.$row["tipoescenario"] .'</a></li>';      
         }else{
              $tipo_escenario ='<li ><a style="text-decoration: none;" href="#"> <i class="fa fa-star"></i>'.$row["tipoescenario"] .'</a></li>';
         }
       

        $url_escenario = base_url("index.php/escenario/inevento"). "/".$row["idescenario"]. "/".$id_evento; 
         $list .=' <div class="media bloc_escenario_desc">                   
                    <div class="media-body">
                      <a style="text-decoration:none;" href="'. $url_escenario .'"> <h4 class="media-heading">'. $nombre. '</h4></a>
                      <div class="descripcion-esc">'. $descripcion   .'...</div>
                    </div>
                                    <ul class="revenue-nav">
                                        

                                        '.$tipo_escenario.'
                                        <li class="active"><a style="text-decoration: none;" href="#"><i class="fa fa-play-circle-o"></i>
 '.$row["num_artistas"] .' Artistas </a></li>                                        
                                    </ul>
                  </div>';       
    }
    
    return $list;

}


 
/*TEMPLATE EN CUANTO REGISTRE UN EVENTO*/
function get_default_template_escenario(){
    
    $list_template ="<li>                                          
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
            return $list_template;
}


function list_escenarios_on_loadevent($responsedbescenario){

	$list = "<ul class='activity-list'>";

	if (count($responsedbescenario) == 0 ) {
	       $list.= get_default_template_escenario();	
	}else{
        /*CONSTRUIMOS LA INFORMACIÓN A DESPLEGAR*/

        foreach ($responsedbescenario as $row) {
        
        $idescenariovalidation  = $row["idescenario"];
        $tipoescenario =  $row["tipoescenario"];
        $numero_artistas = 0;
        $numero_artistas =  $row["numero_artistas"];            
        $fecha_escenario = $row["fecha_presentacion_inicio"] ."-".$row["fecha_presentacion_termino"];


            
            $descripcion = $row["descripcion"];
            if (strlen($descripcion ) == 0 ) {
                $descripcion = "<br>+ agregar descripción";         
            }       

            $inpu_escenario ="inpu_escenario_" . $row["idescenario"];        
            $list .="       
                    <li>                                          
                        <div class='avatar text-center'>
                            <img data-toggle='modal' data-target='#modalesenariosedit' class='edita-modal-escenario' id='". $row["idescenario"] ."'  src=". base_url('application/img/blue.png'). " >
                        </div>
                        <div class='activity-desk'>
                            <h5><a data-toggle='modal' data-target='#modalesenariosedit' class='edita-modal-escenario ' id='". $row["idescenario"] ."'  >". $row["nombre"] ."</a> 
                    <br>
                     <span class='descripcion_escenario_update text-center' id='".
                        $row["idescenario"] . "'    >". 
                                substr( validate_text($descripcion)  , 0 , 200 )   ."..</span>                                       
                        <textarea  name='newdescripesenario' class='newdescripesenario form-control'  rows='3' id=". $inpu_escenario  .">".$row["descripcion"]."</textarea>
                        </h5>
                        <p class='text-muted text-center'>Artistas #".$numero_artistas."|".$tipoescenario." | ".$fecha_escenario ." </p>

                    <i data-toggle='modal' data-target='#confirmationdeleteescenario' class='fa fa-times deleteescenario' id='". $row["idescenario"] ."' ></i>
                    
                    </div>
                    </li>                                        
                    ";

    }



        /*TERMINA LA CONSTRUCCIÓN DE LA LISTA DE ESCENARIOS*/
    }






	$list .="</ul>";
    $data["info"] = $list;
    $data["numero_escenarios"] = count($responsedbescenario);
	return $data;
	
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
        
        $data['descripcion'] =   validate_text($descripcion); 
        $data['artistas'] =  $listartistas;
        $data['tipoescenario'] =  $tipoescenario;
        $data['nombreescenariomodal'] = $nombreescenario;
        $data['iniciotermino'] = $iniciotermino;


        return $data;

    }

/*****************+******_es**********+****************+****************+****************+*/

 
   



}/*Termina el helper*/
 