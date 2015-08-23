<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){


/*Desplegamos las listas de restricciones*/ 

    function display_record_list($data , $status = '' , $check=''){


        $list ='';  
        $count_now=1;
        foreach ($data as $row) {

            $idrestriccion  = $row["idrestriccion"];                 
            $text_restriccion  = $row["text_restriccion"];          
            $fecha_registro = $row["fecha_registro"];    


            $list .='<ul class="to-do-list ui-sortable" >
                        <li class="clearfix">
                          
                        
                            <span class="drag-marker">
                            <i></i>
                            </span>
                        
                        <p class="todo-title">                                        
                         '. $count_now . ".-  ".  $text_restriccion .'
                        </p>';

                        if ($status  == '' ) {
                            $list.= '<div class="todo-actionlist pull-right clearfix" >
                            <a  href="#" class="delete_restriccion todo-remove" id="'.$idrestriccion.'"><i class="delete_restriccion fa fa-times" id="'.$idrestriccion.'" ></i></a>
                            </div>';    
                        }
                        

                        $list.= '</li>';

                        if ($check!= '' ) {
                            $list.= '<button class="btn btn-template templ-restriccion-up" id="'. $idrestriccion. '" >+ agregar</button>';                              
                        }
                        
                    $list.= '</ul>';
                    $count_now ++;
        }
        return $list;
    }


function display_contenido_templ($data_contenido, $del=0 ){

        
    $list_templa_contenido='<div class="panel">
                                <div class="panel-body">
                                    <ul class="to-do-list ui-sortable" id="sortable-todo">';

    $flag = 1;                                       
    foreach ($data_contenido as $row) {
       
       $idcontenido = $row["idcontenido"];
       $nombre_contenido =  $row["nombre_contenido"];
       $descripcion_contenido = $row["descripcion_contenido"];
        

        $list_templa_contenido.= '<li class="clearfix">
                                    <span class="drag-marker"><i></i></span> '.$flag .'.-                                     
                                    <a class="contenido-text-templ" id="'. $idcontenido .'" >'. $nombre_contenido .'</a>                                    
                                    <p class="contenido-text-templ todo-title"  id="'. $idcontenido .'" >'.$descripcion_contenido .'</p>
                                    ';

                                    if ($del == 1 ) {
                                    $list_templa_contenido.='    <div class="todo-actionlist pull-right clearfix">
                                            <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                        </div>';    
                                    }
                                    
                                $list_templa_contenido.='</li>';
                                $flag++;
    }
    $list_templa_contenido .= '</ul></div>  </div>' ;                   
    return  $list_templa_contenido;

}


/***********************************OBJETOS PERMITIDOS  ***************************************/

function list_objetos_permitidos_empresa( $arreglo ){ 

    $list ='<table class="table table-bordered table-striped dataTable" >
        <thead>
        <tr>
            <th class="sorting">#</th>
            <th></th>
            <th class="sorting">Articulo</th>
            <th class="sorting">Nota</th></tr>
        </thead>
        
        <tfoot>
        <tr>
            <th>#</th>
            <th></th>
            <th>Articulo</th>
            <th>Nota</th>
        </tr>
        </tfoot><tbody>';

    
    $b =0;
    foreach ( $arreglo as $row) {
                  
        $idobjetopermitido = $row["idobjetopermitido"];
        $nombre = $row["nombre"];        
        $descripcion = $row["descripcion"];

        $list .= "<tr><td>".$b."</td><td><i class='fa fa-times'></i></td><td>  ". $nombre."</td><td>".$descripcion."</td><tr>";
        $b++;
    }
    $list .="</tbody></table>";

    
    return $list;
}
    

/**/
function get_status_text($status){

    switch ($status) {
        case 1:
            return "Plantilla tipo, descripción de evento";
            break;
        
        default:
            return "";
            break;
    }
}

/*****************+****************+****************+****************+****************+*/

}/*Termina el helper*/
 
