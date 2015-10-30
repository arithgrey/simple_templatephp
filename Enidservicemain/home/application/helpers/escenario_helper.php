<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/*******************************************************************************************************/
function list_resum_escenarios($array_escenario, $id_evento , $limit_text, $background='blue-col-enid'){


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
        $list .='<div class="media bloc_escenario_desc">                   
                <div class="media-body">
                <a style="text-decoration:none;"  href="'. $url_escenario .'"> <h4  class="media-heading  '.$background.' " style="padding:10px;">'. $nombre. '</h4></a>
                <div class="descripcion-esc">'.   substr( $descripcion , 0 , $limit_text )   .'</div>';


        
        $list.='</div> <ul class="revenue-nav">'.$tipo_escenario.'
                       <li class="active">
                       <a style="text-decoration: none;" href="#">
                       <i class="fa fa-play-circle-o"></i>
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
                            <img src=". base_url('application/img/blue.png'). " >
                        </div>
                        <div class='activity-desk'>
                            <h5><a  href='". base_url('index.php/escenario/configuracionavanzada/'.$row["idescenario"])."'   >". $row["nombre"] ."</a> 
                            </h5>
                    

                        
                        

                        <a href='". base_url('index.php/escenario/configuracionavanzada/'.$row["idescenario"])."'>
                            <span class='text-muted text-center'>
                                Artistas #".$numero_artistas."|".$tipoescenario." | ".$fecha_escenario ." 
                            </span>
                        </a>
                        


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
/*generos musicales del evento */
function get_generos($data){
$generos = '<div class="block clearfix">
                <h3 style ="background:#116986;  color:white; padding:10px;"  class="title">Géneros musicales</h3>
                <div class="separator-2"></div>
                <div class="tags-cloud">';

                foreach ($data as $row){
                        $idgenero_musical = $row["idgenero_musical"];
                        $nombre   =    $row["nombre"];
                        $status = $row["status"];
                        $descripcion = $row["descripcion"];
                        
                        $generos .= '<div class="tag">
                                        <a href="#">'.$nombre.'</a>
                                    </div>';
                        
                    }    
                                        
$generos .= '</div>
            </div>'; 
 return $generos;                               
}


/**/
function get_slider_img($data){


    $slider = '<div class="row" style="padding:5%; background: #069F89; border-radius: 10px;" ><div id="Carousel-escenario" class="carousel slide" data-ride="carousel">';
    $slider .= '<div class="row"><ol class="carousel-indicators">';

    for ($a=0; $a <count($data); $a++) {                 
        if($a < 1 ){
            $slider .= '<li data-target="#Carousel-escenario" data-slide-to="'.$a.'" class="active"></li>';                
        }else{
            $slider .= '<li data-target="#Carousel-escenario" data-slide-to="'.$a.'" ></li>';        

        }        
    }
    $slider .= '</ol><div>';    
    $slider .='<div class="row"><div class="carousel-inner" role="listbox">';
    $flag =0;
    foreach ($data as $row) {   

        $path_img = $row["base_path_img"]. $row["nombre_imagen"]; 
        if ($flag < 1 ) {
            
            $slider .= '<div class="item active">
                      <img src="'. base_url($path_img) .'" alt="">
                    </div>';            
        }else{
            $slider .= '<div class="item">
                      <img src="'. base_url($path_img) .'" alt="">
                    </div>';        
        }        
        $flag ++;
    }
    $slider .= '</div></div>';

    $slider .= '<div class="row">  <a class="left carousel-control" href="#Carousel-escenario" role="button" data-slide="prev">
                <span class="fa fa-chevron-left  fa-3x" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="right carousel-control" href="#Carousel-escenario" role="button" data-slide="next">
                <span class="fa fa-chevron-right  fa-3x" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a></div>';
    $slider .= '</div></div>';
    
    return $slider; 
}

/**/
function escenarios_in_evento($data , $id_evento ){   
    
    $escenarios =  '';      
    foreach ($data as $row) {



        if ($row["idescenario"] != $id_evento) {
         
        $url = base_url('index.php/escenario/configuracionavanzada') ."/". $row["idescenario"];
        
        $escenarios .= '<a href="'.$url.'" style="color:white" href=""><div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="panel blue">
                                <div class="symbol">
                                    <i class="fa fa-chevron-circle-right"></i>
                                </div>
                                <div class="state-value">
                                    
                                    <div class="title">'.$row["nombre"].'</div>
                                </div>
                            </div>
                        </div></a>';   
        }
    }
    return $escenarios;

}

/*******************************************************************/
}/*Termina el helper*/