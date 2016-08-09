<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
    
    /**/
    function contruye_iconos_experiencia_cliente($data){

        /*7,1,2 artistas  , evetos, escenarios  */        
        $f_artistas =  0;         
        $f_eventos =  0; 
        $f_escenarios =  0; 
        $clases = ''; 
        $nombre =''; 
        $imgs =  ''; 
        $links = '
                <li>
                    <a  class="tag-enid-galery" href="#" data-filter="*"> 
                        + 
                    </a>
                </li>
                ';   
        
        foreach ($data as $row){

            $idimagen =  $row["idimagen"];
            $nombre_imagen =  $row["nombre_imagen"];
            $type  =  $row["type"]; 
            $img  =  $row["img"]; 
            $extension =  $row["extension"];

            switch ($type) {
                case 7:
                    $clases = '.artistas';
                    $nombre = 'artistas';    
                    if ($f_artistas == 0 ) {
                         $links .= '
                                    <li>
                                        <a class="tag-enid-galery"  href="#" data-filter="'.$clases.'">
                                            '.$nombre.'
                                        </a>
                                    </li>
                                    ';

                    }
                    $f_artistas++; 


                    break;

                case 1:
                    $clases = '.eventos';
                    $nombre = 'eventos';
                    if ($f_eventos == 0 ) {
                         $links .= '
                                <li>
                                    <a class="tag-enid-galery"  href="#" data-filter="'.$clases.'">
                                        '.$nombre.'
                                    </a>
                                </li>
                                ';
                    }
                    $f_eventos ++; 
                    break;

                case 2:
                    $clases = '.escenarios';                    
                    $nombre = 'escenarios';

                    if ($f_escenarios == 0 ) {
                         $links .= '
                                <li>
                                    <a class="tag-enid-galery"  href="#" data-filter="'.$clases.'">
                                        '.$nombre.'
                                    </a>
                                </li>
                                ';    
                    }
                    $f_escenarios ++; 
                    break;        
                
                default:
                    
                    break;
            }


            $img =  create_icon_img($row , ' ', ' '  ); 

            $imgs .= '
                    <div class=" '. $nombre .' item " >
                        <a href="#myModal" data-toggle="modal">
                            '. $img .'
                        </a>
                        <!--<p>
                            img01.jpg 
                        </p>-->
                    </div>            
                    ';
           
           
        }
        
        $icons["links"] = $links; 
        $icons["imagenes"] = $imgs;
        return $icons;
    }

    function create_dinamic_dic($path){            
        
        /**/
        if(file_exists($path) == false ) {        
            
            mkdir( $path  , 0755, true);     
            
            
        }
        return file_exists($path);
    }
    /**/
    function get_img_by_event_in_directory($id_event){


        $ds = "/";  
        $storeFolder = 'uploads';           
        $directorio = dirname(dirname(__FILE__)). "/". $storeFolder."/".$storeFolder."/".$id_event."/";

        
        $result  = array();        
        $files = scandir($directorio);     

        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['name'] = $file;                
                $result[] = $obj;
            }
        }
  

        return $result;
    }
    /**/
    function comunidad_experiencia(){
        $l ="";
        return $l;                 
    }

/*****************+****************+****************+****************+****************+*/
}/*Termina el helper*/