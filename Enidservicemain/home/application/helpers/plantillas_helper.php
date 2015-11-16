<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
function resumen_templ_eventos($data){

    $table ='<table class="table display table table-bordered dataTable">                                          
                    <tr class="text-center header-table-info" >';
                        $table .= get_td("Plantillas" , "");
                        $table .= get_td("Que son restricciones" , "");
                        $table .= get_td("Que son políticas" , "");
                        $table .= get_td("Que describen los eventos" , "");                
                    $table .='</tr>';

    foreach ($data as $row) {

        $table .="<tr class='text-center'>";
                    
                    $table .= get_td( $row["total"] , "");
                    $table .= get_td( $row["restricciones"] , "");
                    $table .= get_td( $row["politicas"], "");
                    $table .= get_td( $row["descripcion_evento"], "");
                $table.="</tr>";


         $table .="<tr class='text-center'>";                    
                    $table .= get_td( get_porcentaje_templates_eventos($row["total"] , $row["total"])  , "");
                    $table .= get_td( get_porcentaje_templates_eventos($row["total"] , $row["restricciones"]) , "");       
                    $table .= get_td( get_porcentaje_templates_eventos($row["total"] , $row["politicas"]) , "");
                    $table .= get_td( get_porcentaje_templates_eventos($row["total"] , $row["descripcion_evento"]) ,  "");                                                                        
                $table .="</tr>";                
                         

    }                 
    $table .="</table>";
    return $table;

}
/**/
function get_porcentaje_templates_eventos($contenidos , $val ){

        $result =0;
        if ($val>0 ) {

            $result =  ($val/ $contenidos )* (100);
            $result =   number_format( $result , 2, '.', ' ')."%";              
        }

        return $result;

}
/*Desplegamos las listas de restricciones*/ 
function display_contenido_templ($data_contenido, $del=0 , $check=0 , $identificador = 'identificador' ){






    $list_templa_contenido='';

    if (count($data_contenido) > 0){
        
    
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
    }
    return  $list_templa_contenido;

}


/***********************************OBJETOS PERMITIDOS  ***************************************/

function list_objetos_permitidos_empresa( $arreglo ){ 

    $list ='<table id="obj-permitidos" class="table display table table-bordered dataTable" >
        <thead class="enid-header-table">
            <tr>';

            $list .=get_td( "#", "");
            $list .=get_td( "<i class='fa fa-trash'></i>", "");
            $list .=get_td( "Articulo" , "");
            $list .=get_td( "Nota", "" );            
            $list.='</tr>
        </thead>        
        <tfoot>
        <tr class="enid-header-table">';
            
            $list .=get_td( "#", "");
            $list .=get_td( "<i class='fa fa-trash'></i>", "");
            $list .=get_td( "Articulo" , "");
            $list .=get_td( "Nota", "" );

        $list .='</tr>
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