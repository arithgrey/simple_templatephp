<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/*******************************************************************************************************/
function load_complete_escenario($data){
    $table = "";
    $table .= '<table class="table table-bordered">
                <tr class="enid-header-table">';
    $table .= get_td("#" , "");  
    $table .= get_td("Escenario" , "");
    $table .= get_td("Tipo" , "");
    $table .= get_td("Descripción" , "");
    $table .= get_td("Fecha registro" , "");
    $table .= get_td("Fecha presentación" , "");
    $table .= get_td("Fin presentación" , "");
    $table .= '</tr>';            
    $flag =  1;
    foreach ($data as $row) {

        $table .=  "<tr>"; 
        $table .= get_td($flag , "");
        $table .= get_td($row["nombre"], "");
        $table .= get_td($row["tipoescenario"], "");
        $table .= get_td($row["descripcion"], "");
        $table .= get_td($row["fecha_registro"], "");
        $table .= get_td($row["fecha_presentacion_inicio"], "");
        $table .= get_td($row["fecha_presentacion_termino"], "");
        $table .=  "</tr>"; 
        $flag ++; 
    }
    $table .="</table>";
    return $table; 
}
/********************************************************************************************************/
function list_resum_escenarios($array_escenario, $id_evento , $limit_text, $background='' , $horizontal = '0'){

    $list ='';
    foreach ($array_escenario as $row){

        $nombre = $row["nombre"];
        $descripcion = $row["descripcion_escenario"];
        $url_escenario = base_url("index.php/escenario/inevento"). "/". $row["id_escenario"]. "/".$id_evento;                     
        $url_sound_cloud  = "";     
        $dinamic_content = '';

        if ($row["url_sound_cloud"] !=  null  && strlen($row["url_sound_cloud"] ) > 10 ) {

            $url_sound_cloud  =    $row["url_sound_cloud"];
            $dinamic_content  .='
            <div class="audio-wrapper">
                <iframe class="margin-clear" src="https://w.soundcloud.com/player/?url='. $url_sound_cloud.' " height="166">
                </iframe>
            </div>';

        }else{

            $img =  create_icon_img($row , " ", " " ); 
            
            $dinamic_content  .='
            <div class="audio-wrapper">
                '. $img  .'
            </div>';    
        }

       
            $list .='
                                <div class="article">
                                    <div class="col-md-6">
                                        ' . $dinamic_content .' 
                                    </div>
                                    <div class="col-md-6">
                                        <header>
                                            <h2>
                                            <a  style="color:#1DB3BF !important;" href="'. $url_escenario .'">'.$nombre .'</a>
                                            </h2>
                                            <div class="post-info">
                                                <span class="post-date">
                                                    <i class="icon-calendar">
                                                    </i>
                                                    <span class="day">
                                                    '. $row["fecha_presentacion_inicio"].'
                                                    </span>
                                                    <span class="month"> 
                                                    al '. $row["fecha_presentacion_termino"] .'
                                                    </span>
                                                </span>
                                                    <span class="submitted">
                                                        <i class="icon-user-1">
                                                        </i> 
                                                        , Tipo  
                                                        <a  style="color:#1DB3BF !important;"  href="#">
                                                            '. $row["tipoescenario"] .'
                                                        </a>
                                                    </span>
                                                <span class="comments">
                                                    <i class="icon-chat">
                                                    </i> 
                                                    <a style="color:#1DB3BF !important;"  href="#">
                                                    '. $row["num_artistas"] .' Artistas
                                                    </a>
                                                </span>
                                            </div>
                                        </header>
                                        <div class="">
                                            <p>'.substr( $descripcion , 0 , $limit_text )  .'</p>
                                        </div>
                                    </div>
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

        foreach ($responsedbescenario as $row) {        

            $idescenariovalidation  = $row["idescenario"];
            $tipoescenario =  $row["tipoescenario"];
            $numero_artistas = 0;
            $numero_artistas =  $row["numero_artistas"];            
            $fecha_escenario = $row["fecha_presentacion_inicio"] ."-".$row["fecha_presentacion_termino"];
            $url_escenario = base_url('index.php/escenario/configuracionavanzada/'.$row["idescenario"]);            

            $p_letra =  substr($row["nombre"], 0, 1);


            $img =  create_icon_img($row , " " ,  ""  );           
            
            $list .=" 
                        <li>                                          
                            <a href='". $url_escenario ."'>      
                                <div class='col-lg-2  col-md-2 col-sm-2 '>                            
                                    <div>
                                    ".$img ."
                                    </div>                            
                                </div>
                                <div class='col-lg-10  col-md-10 col-sm-10 '>                            
                                    <h5>
                                        ". $row["nombre"] ."
                                    </h5>                                                                            
                                </div>
                                <div class='col-lg-12  col-md-12 col-sm-12 pull-right'>
                                    <span class='text-muted text-center'>
                                        Artistas #".$numero_artistas." | ".$tipoescenario." | ".$fecha_escenario." 
                                    </span>  
                            </a>                              
                                <i data-toggle='modal' data-target='#confirmationdeleteescenario' class='fa fa-times deleteescenario' id='". $row["idescenario"] ."' >
                                </i>
                            </div>

                        </li> 
                    ";
    }
        /*TERMINA LA CONSTRUCCIÓN DE LA LISTA DE ESCENARIOS*/
    
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
$generos = '';

    foreach ($data as $row){
                $idgenero_musical = $row["idgenero_musical"];
                $nombre   =    $row["nombre"];
                $status = $row["status"];
                $descripcion = $row["descripcion"];
                        
                $generos .= '<div class="tag">
                                <a href="#">'.$nombre.'</a>
                            </div>';
                        
                    }                                        
 return $generos;                               
}




/**/
function get_slider_img($imgs ,  $data_escenario , $f=0 ){    

        $imgs_escenario ="";
        $class_extra ="";
        $flags ="";
        $flag =1; 

        $editacion ="";
        if ($f == 0 ) {
            $editacion = '<div class="form-group">
                                        <div class="section-nombre-evento-in">
                                            <div class="input-group">                    
                                                <span class="input-group-addon">                                                
                                                </span>
                                                <input  class="form-control in-nombre-escenario" id="in-nombre-escenario" value="'. $data_escenario["nombre_escenario"].'" name="nuevo_nombre" type="text">                      
                                                <input type="hidden" name="action" value="carga-imgenes-escenario">                    
                                            </div>
                                        </div>
                                    </div>  
                    ';
                
        }
        $imgs_escenario .= '<div class="item active">

                                <div style="height:500px;">
                                    <center>
                                        <label style="font-size:4em;"  title="Actualizar nombre del escenario" class="nombre-escenario-text text-center" >
                                            '. $data_escenario["nombre_escenario"].' 
                                        </label>                                
                                    </center>

                                    '. $editacion .'


                                </div>
                                <div class="carousel-caption">
                                </div>
                            </div>';

        
        $flags .= '<li data-target="#myCarousel" data-slide-to="0" class="active">
                        <a href="#">                            
                            <small>
                            La experiencia 
                            </small>
                        </a>
                    </li>
                    ';                  

                        

        foreach($imgs as $row){

            $img =  create_icon_img($row , " "  , " " ); 
            
            $imgs_escenario .= '<div class="item ">
                                '. $img .'
                                <div class="carousel-caption">
                                    <h3>
                                        Headline
                                    </h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
                                        ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                                </div>
                            </div>';

            $flags .= '<li data-target="#myCarousel" data-slide-to="'.$flag.'" class="">
                        <a href="#">
                            About
                            <small>Lorem ipsum dolor sit
                            </small>
                        </a>
                    </li>
                    ';                  


            $flag ++;                       
        }

        $slider = '
        <div id="myCarousel" class="carousel slide" data-ride="carousel">        
        <div class="carousel-inner">           
          '.$imgs_escenario.'  
        </div>        
        <ul class="nav nav-pills nav-justified">
            '. $flags .'
        </ul>
        </div>';




        return $slider;
}

/**/
function escenarios_in_evento($data , $id_evento ){   
    $escenarios =  '';      
    foreach ($data as $row) {

        $url = base_url('index.php/escenario/configuracionavanzada') ."/". $row["idescenario"];
        $nombre = $row["nombre"];         
        $tipoescenario =  $row["tipoescenario"];
        $fecha_presentacion_inicio =  $row["fecha_presentacion_inicio"];
        $fecha_presentacion_termino =  $row["fecha_presentacion_termino"];
        $img =  create_icon_img($row , " ", " "); 
        $escenarios .='     
            
                <div class="media">
                    <p class="pull-right">
                        <small>
                          '. $fecha_presentacion_inicio .'-'. $fecha_presentacion_termino .'  
                        </small>
                    </p>
                    <a class="media-left" href="'.$url.'">
                        '. $img .'
                    </a>
                    <div class="media-body">                                
                        <h4 class="media-heading user_name">
                        '. $nombre .'
                        </h4>                        
                        <p>
                            <small>
                                <a href="'.$url.'">
                                    '. $tipoescenario .'
                                </a>                             
                            </small>
                        </p>
                    </div>
                </div>
            
            <hr>
            ';     

        

    }
    return $escenarios;

}

/*******************************************************************/
}/*Termina el helper*/