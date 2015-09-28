<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

	

/**/
function resumen_usuarios_cuenta($data){   


    $table ='<table class="table display table table-bordered dataTable">                                          
                      <tr class="text-center header-table-info" >
                        <th class="text-center">Miembros</th>
                        <th class="text-center">Activos en el sistema</th>
                        <th class="text-center">Bajas</th>
                        <th class="text-center">Administradores de la cuenta</th>
                        <th class="text-center">Estrategas dígitales</th>                        
                        </tr>';                                            
                    
 
    foreach ($data as $row) {

        $porcentaje_usuarios   = 0; 
        $porcentaje_activos = 0;
        $porcentaje_baja =0;
        $porcentaje_administradores  =0;
        $porcentaje_estrategas =  0;

        

        $porcentaje_usuarios =  get_promedio_users($row["usuarios"] , $row["usuarios"]  ); 
        $porcentaje_activos =  get_promedio_users(  $row["usuarios"] , $row["usuarios_activos"] );
        $porcentaje_baja =  get_promedio_users( $row["usuarios"], $row["usuarios_baja"]  );
        $porcentaje_administradores =  get_promedio_users($row["usuarios"],  $row["administradores_cuenta"]);
        $porcentaje_estrategas =  get_promedio_users( $row["usuarios"]  , $row["estrategas_digitales"]  );    

        


        $table.="<tr class='text-center' >   
                    <td>".$row["usuarios"]."</td>
                    <td>".$row["usuarios_activos"] ."</td>
                    <td>".$row["usuarios_baja"]."</td>
                    <td>".$row["administradores_cuenta"]."</td>
                    <td>".$row["estrategas_digitales"]."</td>
                 </tr>
                 <tr class='text-center'>
                    <td>". $porcentaje_usuarios  ."%</td>
                    <td>". $porcentaje_activos."%</td>
                    <td>". $porcentaje_baja ."%</td>
                    <td>". $porcentaje_administradores."%</td>
                    <td>". $porcentaje_estrategas."%</td>
                 </tr>
                 ";
    }

    $table.="</table><br>";
    return $table;

}    



function get_promedio_users($usuarios , $val){

    $result =0;

    if ($val >0 ){            
        
        $result = ($val / $usuarios) *  (100);
        $result =   number_format($result , 2, '.', ' ');
    }
    return $result;

}

/**/
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

                                    

                                        <tr  class="text-center enid-header-table" >
                                            <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Miembro</th>
                                            <th style="text-align:center;">Usuario</th>
                                            <th style="text-align:center;">Registro</th>
                                            <th style="text-align:center;">Perfil</th>
                                            <th style="text-align:center;">Estado</th>
                                            <th style="text-align:center;">Edición</th>


                                        </tr>
                                    
                                    ';    
	$now = 1;
	$b =0;
    foreach ($integrantes as $row) {
        
        $id_user = $row["idusuario"];
        $listusuarios .="<tr class='text-center'>";      
        $listusuarios .="<td class='blue-col-enid text-center'>". $now."</td>
                        <td class='text-center'>".$row["nombre"]."</td>
                        <td class='text-center'>".$row["email"]."</td>
                        <td class='text-center'>". getTimeFormat3( $row["fecha_registro"] )  ."</td>
                        <td class='text-center'>".$row["nombreperfil"]."</td>";

        $listusuarios.="<td class='text-center'>".$row["status"]."</td>";
                    


                    if ($row["nombreperfil"] == "Super administrador"){
                        $listusuarios .="<td class='text-center'></td>";          
                    }else{
                        
                        $listusuarios .="<td class='text-center'><i data-toggle='modal' data-target='#edit-usuario-perfil' class='editar_permisos_miembro fa fa-pencil-square fa-lg' id='". $row["idusuario"] . "'></i></td>";      
                    }    


                        

        $listusuarios .="</tr> 
        			";      
        $now++;
        $b ++;
    }

    if ($b > 9) {


    	$listusuarios .='<tr class="text-center enid-header-table" >
                                            <th style="text-align:center;">ID</th>
                                            <th style="text-align:center;">Miembro</th>
                                            <th style="text-align:center;">Usuario</th>
                                            <th style="text-align:center;">Registro</th>
                                            <th style="text-align:center;">Perfil</th>
                                            <th style="text-align:center;">Edición</th>
                                        </tr>';
	
    }
    
    $listusuarios .='
    				
                </table>

                    <a href="'. base_url('index.php/recursocontroller/perfilconfig') .'">
                        <button class="btn btn-info pull-right">
                                Perfiles del sistema
                        </button>        
                    </a>';
    return $listusuarios;
}
/*Terminal la función*/

	

	/**/
}/*Termina el helper*/