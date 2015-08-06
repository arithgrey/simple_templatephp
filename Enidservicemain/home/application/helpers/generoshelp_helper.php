<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){



    function list_generos_musicales($value){

    $table_list ='<table aria-describedby="dynamic-table_info" class="display table table-bordered table-striped dataTable" id="dynamic-table">
        <thead>
        <tr role="row">
            <th aria-label="Rendering engine: activate to sort column ascending"  colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="sorting">#</th>
            <th aria-label="Browser: activate to sort column descending" aria-sort="ascending"  colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="sorting_asc">Género</th>
            <th aria-label=""  colspan="1" rowspan="1" aria-controls="dynamic-table" tabindex="0" role="columnheader" class="sorting"></th>
        </tr>
        </thead>
        
        <tfoot>
        <tr>
            <th colspan="1" rowspan="1">#</th>
            <th colspan="1" rowspan="1">Género</th>
            <th colspan="1" rowspan="1"></th>
        </tr>
        </tfoot>
        <tbody aria-relevant="all" aria-live="polite" role="alert">';

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

                $table_list .='<tr class="gradeU odd">
                <td class="">'. $b .'</td>
                <td class=" sorting_1">'. $nombre.'</td>
                <td class="">'.$input_check.'</td>
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
 