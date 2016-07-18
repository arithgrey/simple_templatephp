<?php 
    /*Declaramos variables */
    $class_enid = '';  $list_templa_contenido='';  $total = 0;  $del = 0; $check =  0;  $identificador = $param["identificador"];     
    if ($param["public"] == 0 ) { $del = 0; $check =  1;}
    if (count($contenidos)> 2) {$class_enid = 'scroll-vertical-enid scroll-enid-public';}

        $list_templa_contenido='';
        $flag = 1;                                       

        foreach ($contenidos as $row) {
           
           $total ++; 
           $idcontenido = $row["idcontenido"];
           $nombre_contenido =  $row["nombre_contenido"];
           $descripcion_contenido = $row["descripcion_contenido"];
           $status = $row["status"];
            

            $list_templa_contenido.= '<li class="clearfix">
                                        <span class="drag-marker">                                        
                                        </span> 
                                        '.$flag .'.-                                     
                                        <a class="'.$identificador.'" id="'. $idcontenido .'" >
                                            '. $nombre_contenido .'
                                        </a>                                    
                                        <p class="'.$identificador.' todo-title"  id="'. $idcontenido .'" >
                                            '.$descripcion_contenido .'
                                        </p>';
                                        $list_templa_contenido .= btn_delete_template($del); 
                                        
                                        
                            if ($check!= '' ) {
                                $list_templa_contenido.= '<button class="'. $identificador .' btn btn-default btn_templates" id="'. $idcontenido . '" >
                                                            + agregar
                                                        </button>';                              
                            }
                            
                                    $list_templa_contenido.='</li>';
                                    $flag++;
        }
        $list_templa_contenido .= '' ;                   
    
    $total_resumen =  "<em class='total_table'> Mostrando " . $total . "</em>"; 
    $total_resumen .=  $list_templa_contenido;
  

?>



<div class="panel <?=$class_enid;?> ">
    <div class="panel-body">
        <ul class="to-do-list ui-sortable" id="sortable-todo">
        <?=$total_resumen?>
        </ul>
    </div> 
</div>

<div class='panel'>
    <?=msj_url_template($identificador);?>
</div>

<style type="text/css">
.delete_contenido_templ{
    background: rgb(62, 178, 192) !important;
    color: white !important;
}
.url_templates{
    background: rgb(61, 74, 80) none repeat scroll 0% 0%; 
    padding:  10px  10px;
    width: 100%;
    text-decoration: none !important;
    color: white;
    width: 100%;
}
.url_templates:hover{
    background: #3C5E79;
    color: white;
    width: 100%;

}





</style>