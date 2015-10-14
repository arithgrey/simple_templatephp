<?php
class Gestion_img{
    
    function get_next_url_escenario_principal($empresa , $evento  , $escenario )
    {
     
        //$dir_base = substr($_SERVER["SCRIPT_FILENAME"], 0 , (strlen($_SERVER["SCRIPT_FILENAME"]) -9)  );

        $dir_base = $_SERVER["DOCUMENT_ROOT"]."/uploads/".$empresa ."/". $evento  ."/". $escenario;
        return $dir_base;

    }
}
?> 