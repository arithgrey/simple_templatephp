<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

function politicas_contenido($data){

    $class_enid  = "scroll-horizontal-enid";
    if (count($data) > 5 ) {
        $class_enid  = "scroll-enid";
    }

    $list = "<div class='". $class_enid ."'> <ul class='activity-list'>";  
    $flag =  1; 
    foreach ($data as $row) {
        
        $nombre_contenido   =  $row["nombre_contenido"];
        $descripcion_contenido =  $row["descripcion_contenido"];

        $list .=  '
            <li>
                <div class="avatar">
                    '. $flag .'
                </div>
                <div class="activity-desk">
                    <h5>
                        <a href="#">
                        '. $nombre_contenido .'
                        </a>                                                 
                    </h5>
                    <p class="text-muted">
                        '. $descripcion_contenido .'
                    </p>
                </div>
            </li>';                      
                
            $flag ++;
    }
    
    $list .=  "</ul></div>";
    return $list;
    
    return $data;

}

/**/
function resumen_templ_eventos($data){




    $table ='<table class="table table-bordered">                                          
                    <tr class="text-center header-table-info" >';
                        $table .= get_td("Plantillas" , "");
                        $table .= get_td("Que son restricciones" , "");
                        $table .= get_td("Que son políticas" , "");
                        $table .= get_td("Que describen los eventos" , "");                
                    $table .='</tr>';

    foreach ($data as $row) {


        $table .="<tr>";
                    
                    $table .= get_td( $row["total"] , "");
                    $table .= get_td( $row["restricciones"] , "");
                    $table .= get_td( $row["politicas"], "");
                    $table .= get_td( $row["descripcion_evento"], "");
                $table.="</tr>";


         $table .="<tr>";                    
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
    $total = 0;  
    $list_templa_contenido='';

    $class_enid = '';
    if (count($data_contenido)> 5) {
        $class_enid = 'scroll-vertical-enid scroll-enid-public';
    }
    if (count($data_contenido) > 0){    

    $list_templa_contenido='<div class="panel '.$class_enid.' ">
                                <div class="panel-body">
                                    <ul class="to-do-list ui-sortable" id="sortable-todo">';
    $flag = 1;                                       

    foreach ($data_contenido as $row) {
       $total ++; 
       $idcontenido = $row["idcontenido"];
       $nombre_contenido =  $row["nombre_contenido"];
       $descripcion_contenido = $row["descripcion_contenido"];
       $status = $row["status"];
        

        $list_templa_contenido.= '<li class="clearfix">
                                    <span class="drag-marker">
                                        <i>
                                        </i>
                                    </span> '.$flag .'.-                                     
                                    <a class="'.$identificador.'" id="'. $idcontenido .'" >
                                        '. $nombre_contenido .'
                                    </a>                                    
                                    <p class="'.$identificador.' todo-title"  id="'. $idcontenido .'" >
                                        '.$descripcion_contenido .'
                                    </p>';

                                    if ($del == 1 ) {
                                    $list_templa_contenido.='
                                        <div class="todo-actionlist pull-right clearfix">
                                            <a href="#" class="delete_contenido_templ todo-remove" id="'. $idcontenido .'" >
                                                <i class="delete_contenido_templ fa fa-times" id="'. $idcontenido .'" >
                                                </i>
                                            </a>
                                        </div>';    
                                    }
                                    
                        if ($check!= '' ) {
                            $list_templa_contenido.= '<button class="'. $identificador .'   btn btn-template" id="'. $idcontenido . '" >
                                                        + agregar
                                                    </button>';                              
                        }
                        
                                $list_templa_contenido.='</li>';
                                $flag++;
    }
    $list_templa_contenido .= '</ul>
                            </div> 
                        </div>
                    ' ;                   
    }


    $total_resumen =  "<em class='total_table'> Mostrando " . $total . "</em>"; 
    $total_resumen .=  $list_templa_contenido;
    return  $total_resumen; 

}


/***********************************OBJETOS PERMITIDOS  ***************************************/

function list_objetos_permitidos_empresa( $arreglo ){ 

    $complete ="";
    $class_enid = 'scroll-horizontal-enid';
    if (count($arreglo) > 9 ) {
        $class_enid = 'scroll-enid';    
    }

    $list ='<div class="'.$class_enid.'"><table id="obj-permitidos" class="table table-bordered" >        
            <tr class="enid-header-table">';
        $list .=get_td( "#", "");
        $list .=get_td( "<i class='fa fa-trash'></i>", "");
        $list .=get_td( "Articulo" , "");
        $list .=get_td( "Nota", "" );            
        $list .=get_td( "Fecha registro", "" );
        $list.='</tr>';    
    $b =0;
    foreach ( $arreglo as $row) {
                  
        $idobjetopermitido = $row["idobjetopermitido"];
        $nombre = $row["nombre"];        
        $descripcion = $row["descripcion"];

        $list .= "<tr>";
        $list .=  get_td($b , ""); 
        $list .=  get_td(" <i class='del_obj_permitido fa fa-times'  id='". $idobjetopermitido."' ></i>" , "class='del_obj_permitido' id='". $idobjetopermitido."'"); 
        $list .=  get_td($nombre , "class='franja-vertical'"); 

        $list .=  get_td("<i class='fa fa-list-alt'></i><div class='descripcion-nota-section'> ". $descripcion  ."</div>" , "class='nota-articulo' id='". $idobjetopermitido ."' data-toggle='modal' data-target='#modal-config-nota-articulo'  ");    
        

        $list .= get_td( $row["fecha_registro"], "" );
        $list .= "</tr>";        
        $b++;
    }
    $list .= '<tr class="enid-header-table">';
            
            $list .=get_td( "#", "");
            $list .=get_td( "<i class='fa fa-trash'></i>", "");
            $list .=get_td( "Articulo" , "");
            $list .=get_td( "Nota", "" );

            $list .=get_td( "Fecha registro", "" );

    $list .='</tr>';
    $list .="</table></div>";

    $complete .=  "<em class='total_table'>Mostrando: ". ($b -1)." </em>";
    $complete .=  $list;    
    return $complete;
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
