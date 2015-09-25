<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){






function resumen_templ_eventos($data){


    $table ='<table class="table display table table-bordered dataTable">                                          
                    <tr class="text-center" style="background:rgba(202, 234, 231, 0.9);">
                        <th class="text-center">Plantillas</th>
                        <th class="text-center">Disponibles</th>
                        <th class="text-center">No disponibles </th>

                        <th class="text-center">Que describen los eventos </th>
                        <th class="text-center">Que son restriciones </th>                        
                        <th class="text-center">Que son políticas </th>                        
                        </tr>';


    foreach ($data as $row) {

        $table .="<tr class='text-center'>
                    <td>". $row["plantillas"] ."</td>
                    <td>". $row["plantillas_disponibles"]."</td> 
                    <td>". $row["plantillas_no_disponibles"]."</td>
                    <td>". $row["descriptivas_evento"]."</td>
                    <td>". $row["restricciones"]."</td>
                    <td>". $row["politicas"]."</td>
                                       
                </tr>";
                         
    }                 
    $table .="</table>";
    return $table;

}
/*Desplegamos las listas de restricciones*/ 
    
    

function display_contenido_templ($data_contenido, $del=0 , $check=0 , $identificador = 'identificador' ){

        
    $list_templa_contenido='<div class="panel">
                                <div class="panel-body">
                                    <ul class="to-do-list ui-sortable" id="sortable-todo">';

    $flag = 1;                                       
    foreach ($data_contenido as $row) {
       
       $idcontenido = $row["idcontenido"];
       $nombre_contenido =  $row["nombre_contenido"];
       $descripcion_contenido = $row["descripcion_contenido"];
       $status = $row["status"];
        

        $list_templa_contenido.= '<li class="clearfix">
                                    <span class="drag-marker"><i></i></span> '.$flag .'.-                                     
                                    <a class="'.$identificador.'" id="'. $idcontenido .'" >'. $nombre_contenido .'</a>                                    
                                    <p class="'.$identificador.' todo-title"  id="'. $idcontenido .'" >'.$descripcion_contenido .'</p>
                                    ';

                                    if ($del == 1 ) {
                                    $list_templa_contenido.='    <div class="todo-actionlist pull-right clearfix">
                                            <a href="#" class="delete_contenido_templ todo-remove" id="'. $idcontenido .'" ><i class="delete_contenido_templ fa fa-times" id="'. $idcontenido .'" ></i></a>
                                        </div>                                        
                                    ';    
                                    }
                                    

                        if ($check!= '' ) {
                            $list_templa_contenido.= '<button class="'. $identificador .'   btn btn-template" id="'. $idcontenido . '" >+ agregar</button>';                              
                        }
                        
                                $list_templa_contenido.='</li>';
                                $flag++;
    }
    $list_templa_contenido .= '</ul></div>  </div>' ;                   
    return  $list_templa_contenido;

}


/***********************************OBJETOS PERMITIDOS  ***************************************/

function list_objetos_permitidos_empresa( $arreglo ){ 

    $list ='<table id="obj-permitidos" class="table display table table-bordered dataTable" >
        <thead class="enid-header-table">
            <tr>
            <th>#</th>
            <th><i class="fa fa-trash"></i></th>
            <th>Articulo</th>
            <th>Nota</th>
            </tr>
        </thead>        
        <tfoot>
        <tr class="enid-header-table">
            <th>#</th>
            <th><i class="fa fa-trash"></i></th>
            <th>Articulo</th>
            <th>Nota</th>
        </tr>
        </tfoot>
        <tbody>';    
    $b =0;
    foreach ( $arreglo as $row) {
                  
        $idobjetopermitido = $row["idobjetopermitido"];
        $nombre = $row["nombre"];        
        $descripcion = $row["descripcion"];

        $list .= "<tr><td>".$b."</td><td class='del_obj_permitido' id='". $idobjetopermitido."'>
        <i class='del_obj_permitido fa fa-times'  id='". $idobjetopermitido."' ></i></td><td class='franja-vertical'>  ". $nombre."</td><td>".$descripcion."</td><tr>";
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
 
