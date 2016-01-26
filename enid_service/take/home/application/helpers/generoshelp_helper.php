<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){
    function list_generos_musicales($value){

    $table_list ='
   
    <table class="table" >
                    <thead class="blue-col-enid">
                    <tr>';
                        $table_list .=  get_td("#" , "");
                        $table_list .=  get_td("Género" , "");
                        $table_list .=  get_td("" , "");

                    $table_list .='</tr>
                    </thead>                    
                    <tfoot>
                    <tr>';
                        $table_list .=  get_td("#" , "");
                        $table_list .=  get_td("Género" , "");
                        $table_list .=  get_td("" , "");


                      
    $table_list .= '</tr></tfoot><tbody>';

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
                <td class="genero_musical_input" id="'. $idgenero_musical.'">'.$input_check.'</td>';

                $b++;
        }
        $table_list .="</tbody>
        </tbody>
</table>
";
    
        return $table_list;
    }


function list_generos_empresa($value){

    $table_list ='<table class="table display table table-bordered dataTable" >
                        <tr class="text-center header-table-info">';
                        $table_list .= get_td("#" , "");
                        $table_list .= get_td("Género" , "");
                        $table_list .= get_td( '<i class="fa fa-minus-square"></i>' , "");
    $table_list .='</tr>';

        $b =1;
        foreach ($value as $row ) {
              
            $idgenero_musical= $row["idgenero_musical"];
            $nombre = $row["nombre"];

            $table_list .=  "<tr class='text-center'>";
            $table_list .=  get_td($b , "");
            $table_list .=  get_td($nombre , "");

            $table_list .= get_td( '<div class="delete_genero_empresa" id="'. $idgenero_musical .'" > <i class="fa fa-minus-square" ></i></div>' , "");
            $table_list .=  "</tr>";
            $b++;
           
        }
        $table_list .="</table>";    
        return $table_list;


}

/**/
function get_data_list_generos($data){
    
    $list_data ='<datalist id="generos-list">';
        foreach ($data as $row) {
            $list_data .="<option value='". $row["nombre"]."'>";
        }
        $list_data .="</datalist>";
    return  $list_data;

}
/*****************+****************+****************+****************+****************+*/
}/*Termina el helper*/