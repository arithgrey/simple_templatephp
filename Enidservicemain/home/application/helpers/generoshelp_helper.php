<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){



    function list_generos_musicales($value){

    $table_list ='<table class="table" id="dynamic-table">
        <thead class="blue-col-enid">
        <tr role="row">
            <th>#</th>
            <th>Género</th>
            <th></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th>#</th>
            <th>Género</th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>';

        $b =1;
        foreach ($value as $row ) {

            $idgenero_musical =  $row["idgenero_musical"];
            $nombre = $row["nombre"];
            $idevento = $row["idevento"];
            $idgenero_musical  =  $row["idgenero_musical"];
            $input_check = '<input type="checkbox" class="genero_musical_input" id="'. $idgenero_musical.'">';


            if ($row["idg"] == $idgenero_musical ) {
                    
                    $input_check = '<input type="checkbox" class="genero_musical_input" id="'. $idgenero_musical.'" checked>';                    
            }

                $table_list .='<tr class="genero_musical_input" id="'. $idgenero_musical.'">
                <td class="text-center">'. $b .'</td>
                <td class="genero_musical_input" id="'. $idgenero_musical.'">'. $nombre.'</td>
                <td class="genero_musical_input" id="'. $idgenero_musical.'">'.$input_check.'</td>
                ';

                $b++;
        }
        $table_list .="</tbody>
        </tbody>
</table>
";
    
        return $table_list;
    }


/*****************+****************+****************+****************+****************+*/
}/*Termina el helper*/
 