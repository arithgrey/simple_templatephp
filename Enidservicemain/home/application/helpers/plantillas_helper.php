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
                            $list.= '<button class="btn btn-template templ-restriccion-up" id="'. $idrestriccion. '" >+Agregar</button>';                              
                        }
                        
                    $list.= '</ul>';
                    $count_now ++;
        }
        return $list;
    }


function display_contenido_templ($data_contenido){

        
    $list_templa_contenido='';
    foreach ($data_contenido as $row) {
       
       $idcontenido = $row["idcontenido"];
       $nombre_contenido =  $row["nombre_contenido"];
       $descripcion_contenido = $row["descripcion_contenido"];
       $nombre_platilla  =  $row["nombre_platilla"];
       $fecha_registro =  $row["fecha_registro"];
       $status =  $row["status"];
       


        $list_templa_contenido.= '<div class="mis-plantillas" >'. $nombre_platilla .'
                                    <div class="media blog-cmnt">
                                        <a  class="pull-left">
                                            <img alt="" src="images/blog/blog-avatar.jpg" class="media-object">
                                        </a>
                                        <div class="media-body"> 
                                            <h4 class="media-heading"  id="'. $idcontenido .'" >
                                                <a class="contenido-text-templ" id="'. $idcontenido .'">'. $nombre_contenido .'</a>
                                            </h4>
                                            <p class="contenido-text-templ mp-less" id="'. $idcontenido .'" >'. $descripcion_contenido.'</p>
                                            '. $fecha_registro .' | '. get_status_text($status) .' |  
                                        </div>                                                
                                    </div>     
                                </div>';

    }
                   
    return  $list_templa_contenido;

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
 
