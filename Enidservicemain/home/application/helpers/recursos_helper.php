<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/**/
function resumen_usuarios_cuenta($data){   


    $table ='<table class="table display table table-bordered dataTable">                                          
                      <tr class="text-center header-table-info" >';


                        $table.= get_td("Miembros", "" );
                        $table.= get_td("Activos en el sistema", "" );
                        $table.= get_td("Bajas", "" );
                        $table.= get_td("Administradores de la cuenta", "" );
                        $table.= get_td("Estrategas dígitales", "" );                        
    $table.='</tr>';                                            
                    
 
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

        


        $table.="<tr class='text-center' >";   
                    $table.= get_td($row["usuarios"], "");
                    $table.= get_td($row["usuarios_activos"] , "");
                    $table.= get_td($row["usuarios_baja"], "");
                    $table.= get_td($row["administradores_cuenta"], "");
                    $table.= get_td($row["estrategas_digitales"], "");
                 $table .="</tr>

                 <tr class='text-center'>";
                    $table.=get_td( $porcentaje_usuarios . "%"  , "");
                    $table.=get_td( $porcentaje_activos  . "%", "");
                    $table.=get_td( $porcentaje_baja   . "%" , "");
                    $table.=get_td( $porcentaje_administradores  . "%" , "");
                    $table.=get_td( $porcentaje_estrategas  . "%" , "");
                 $table .="</tr>
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
                                
                                        <tr  class="text-center enid-header-table" >';
                                            $listusuarios .= get_td("ID" , "" );
                                            $listusuarios .= get_td("Miembro" , "" );
                                            $listusuarios .= get_td("Usuario" , "" );
                                            $listusuarios .= get_td("Registro" , "" );
                                            $listusuarios .= get_td("Perfil" , "" );
                                            $listusuarios .= get_td("Estado" , "" );
                                            $listusuarios .= get_td("Edición" , "" );
                                        $listusuarios .='</tr>';
                                    
                                    
	$now = 1;
	$b =0;
    foreach ($integrantes as $row) {
        
        $id_user = $row["idusuario"];
        $listusuarios .="<tr class='text-center'>";      
        $listusuarios .="<td class='blue-col-enid text-center'>". $now."</td>";

                        $listusuarios .= get_td($row["nombre"] , "" );
                        $listusuarios .= get_td($row["email"] , "" );
                        $listusuarios .= get_td(  $row["fecha_registro"]    , "" );
                        $listusuarios .= get_td($row["nombreperfil"] , "" );

        $listusuarios .= get_td($row["status"] , "");
                    


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

    	$listusuarios .='<tr class="text-center enid-header-table" >';
                                            $listusuarios .= get_td(  "ID" , "" ); 
                                            $listusuarios .= get_td(  "Miembro" , "" ); 
                                            $listusuarios .= get_td(  "Usuario" , "" ); 
                                            $listusuarios .= get_td(  "Registro" , "" ); 
                                            $listusuarios .= get_td(  "Perfil" , "" ); 
                                            $listusuarios .= get_td(  "Edición" , "" ); 
        $listusuarios .='</tr>';
	
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
}/*Termina el helper*/
