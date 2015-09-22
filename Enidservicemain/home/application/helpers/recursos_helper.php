<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

	




function list_filtro_integrantes($integrantes){

	$list_filter ="<datalist id='integrantes-list' >";
	foreach ($integrantes as $row) {
           
        $list_filter .="<option value='". $row["nombre"] ."'>". $row["nombre"]  ."</option>";            
    }

    $list_filter .="</datalist>";
    return $list_filter;
}


/**/
function lista_usuarios_cuenta($integrantes)
{
	
	$listusuarios ='<table class="table display table table-bordered dataTable">

                                    <thead class="enid-header-table" >

                                        <tr role="row" class="text-center" >
                                            <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Miembro</th>
                                            <th style="text-align:center;">Usuario</th>
                                            <th style="text-align:center;">Registro</th>
                                            <th style="text-align:center;">Perfil</th>
                                            <th style="text-align:center;">Edición</th>

                                        </tr>
                                    </thead>
                                    <tbody >';    
	$now = 1;
	$b =0;
    foreach ($integrantes as $row) {
    
        $listusuarios .="<tr>";      
        $listusuarios .="<td class='blue-col-enid text-center'>". $now."</td>
                        <td class='text-center'>".$row["nombre"]."</td>
                        <td class='text-center'>".$row["email"]."</td>
                        <td class='text-center'>". getTimeFormat3( $row["fecha_registro"] )  ."</td>
                        <td class='text-center'>".$row["nombreperfil"]."</td>      
                        <td class='text-center'><a> <i class='editar_permisos_miembro fa fa-pencil-square fa-lg' id='". $row["idusuario"] . "'></i> </a></td>";      

        $listusuarios .="</tr> 
        			";      
        $now++;
        $b ++;
    }

    if ($b > 9) {


    	$listusuarios .='<tr role="row" class="text-center enid-header-table" >
                                            <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Miembro</th>
                                            <th style="text-align:center;">Usuario</th>
                                            <th style="text-align:center;">Registro</th>
                                            <th style="text-align:center;">Perfil</th>
                                            <th style="text-align:center;">Edición</th>

                                        </tr>';
	
    }
    
    $listusuarios .="
    				</tbody>    
                </table>";
    return $listusuarios;
}
/*Terminal la función*/

	

	/**/
}/*Termina el helper*/