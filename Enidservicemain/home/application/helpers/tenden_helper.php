<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){



    function get_jfunnel($data){   
        
        $table ="<table  class='table display table table-bordered dataTable text-center'>";
        

        $table .=get_td("#" , "");
        $table .=get_td("Inicio del evento" , "");
        $table .=get_td("Días" , "");
        $table .=get_td("Escenarios" , "");
        $table .=get_td("Artistas" , "");
        $table .=get_td("Géneros musicales" , "");
        $table .=get_td("Puntos de venta" , "");
        $table .=get_td("Accesos propuestos" , "");
        $b=1;
        $t_duracion =  0;
        $t_escenarios= 0;
        $t_artistas = 0;
        $t_generos = 0;
        $t_puntos_venta =0;
        $t_accesos =0;
        foreach ($data as $row) {
            



            $table .="<tr>";


            $table .=  get_td($b , "");
            $table .=  get_td($row["fecha_inicio"] , "");
            
            if ($row["duracion"] ==  0 ) {
                $table .=  get_td(1, "");   
                $t_duracion += 1; 
            }else{
                $table .=  get_td($row["duracion"] , "");
                $t_duracion += $row["duracion"];
            }
            


            $table .=  get_td($row["escenarios"] , "");
            $t_escenarios += $row["escenarios"];
            if ($row["artistas"]!= null ) {
                $table .=  get_td($row["artistas"] , "");    
                $t_artistas += $row["artistas"];
            }else{
                $table .=  get_td(0 , "");
                $t_artistas += 0;
            }
            

            if ($row["generos_musicales"]!= null ) {
                $table .=  get_td($row["generos_musicales"] , "");    
                $t_generos += $row["generos_musicales"];
            }else{
                $table .=  get_td(0 , "");
                $t_generos += 0;
            }
                  
            
            if ($row["evento_punto_venta"] !=  null) {
                $table .= get_td( $row["evento_punto_venta"] , "");
                $t_puntos_venta += $row["evento_punto_venta"];
            }else{
                $table .= get_td( 0 , "");
                $t_puntos_venta += 0;
            }


            if ($row["accesos"]!= null) {
                $table .= get_td( $row["accesos"] , "");
                $t_accesos += $row["accesos"];
            }else{
                $table .= get_td( 0 , "");   
                $t_accesos += 0;
            }   


            
            $table .="</tr>";
            $b++;
            
        }


        $table .=get_td("Totales" , "colspan='2'");
        $table .=get_td($t_duracion , "");
        $table .=get_td($t_escenarios , "");
        $table .=get_td($t_artistas , "");
        $table .=get_td($t_generos , "");
        $table .=get_td($t_puntos_venta , "");
        $table .=get_td($t_accesos, "");

        $table .="</table>";
        return  $table;
    }
/*******************************************************************/
}/*Termina el helper*/
