<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
function resumen_usuarios_cuenta($data){   

    $table ='<table class="table table-bordered">                                          
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

function lista_usuarios_cuenta($integrantes , $limit ){
	
    $complete ="";
    $list =  "";        
	$list .='<div style="overflow:scroll;  scrollbar-base-color:#ffeaff; height:750px;  "  ><table class="table  table-bordered">
                <tr  class="text-center enid-header-table" >';                                                                   
                    $list .= get_td("#" , "" ); 
                    $list .= get_td("Editar" , "" );                    
                    $list .= get_td("Comentario" , "");                    
                    $list .= get_td("Miembro" , "" );
                    $list .= get_td("Usuario" , "" );
                    $list .= get_td("Email alterno" , "" );
                    $list .= get_td( "Edad" , "" ); 
                    $list .= get_td("Registro" , "" );
                    $list .= get_td("Perfil" , "" );
                    $list .= get_td("Estado" , "" );
                    $list .= get_td("Tel" , "" );
                    $list .= get_td("Tel. alterno" , "" );
                    $list .= get_td("# Empleado" , "" );
                    $list .= get_td("Turno" , "" );
                    $list .= get_td("Horario" , "" );
                    $list .= get_td("Grupo" , "");
                    $list .= get_td("Cargo" , "");
                    $list .= get_td("rfc" , "");
                    
                    $list .= get_td(  "Última modificación" , "");                    
                    
                    $list .='</tr>';
                                                                    
	$now = 1;
	$b =0;
    foreach ($integrantes as $row) {
        
        $id_user = $row["idusuario"];
        $list .="<tr class='text-center'>";      
            $list .= get_td($now , "" ); 

            if ($row["nombreperfil"] == "Super administrador"){
                
                $list .= get_td("" ,"");

            }else{                        
                $list .=  get_td("<i data-toggle='modal' data-target='#edit-usuario-perfil' class='editar_permisos_miembro fa fa-pencil-square-o' id='". $row["idusuario"] . "'></i>" , "");                
            }    
            $list .= get_td("<i data-toggle='modal' data-target='#edit-nota-user-modal'  class='edit-nota-user fa fa-list-alt' id='". $row["idusuario"] . "' ></i>" ,  "");

            $miembro = $row["nombre"] .  "<br>" . $row["apellido_paterno"] . " " . $row["apellido_materno"];
            $list .= get_td($miembro , "" );
            $list .= get_td(  $row["email"] , "class='franja-vertical' " );
            $list .= get_td($row["email_alterno"] , "");
            $list .= get_td(  $row["edad"] , "" ); 
            $list .= get_td(  $row["fecha_registro"]    , "" );
            $list .= get_td( $row["nombreperfil"] , "" );
            $list .= get_td( $row["status"] , "");
            $list .= get_td( $row["tel_contacto"] ,  "");
            $list .= get_td( $row["tel_contacto_alterno"] ,  "");
            $list .= get_td( $row["numero_empleado"] ,  "");
            $list .= get_td($row["turno"] , "" );
            $inicio_fin_labor =  $row["inicio_labor"] . " " . $row["fin_labor"];
            $list .= get_td( $inicio_fin_labor ,  "");      
            $list .=  get_td( $row["grupo"], "");
            $list .=  get_td($row["cargo"] , "");
            $list .= get_td($row["rfc"] , "");


            
            $list .= get_td($row["ultima_modificacion"] , "");
            

        $list .="</tr> 
        			";      
        $now++;
        $b ++;
    }

    if ($b > 9){
    	$list .='<tr class="text-center enid-header-table" >';
                    $list .= get_td("#" , "" ); 
                    $list .= get_td("Editar" , "" );                    
                    $list .= get_td("Comentario" , "");                    
                    $list .= get_td(  "Miembro" , "" ); 
                    $list .= get_td(  "Email alterno" , "" );
                    $list .= get_td(  "Usuario" , "" ); 
                    $list .= get_td(  "Edad" , "" ); 
                    $list .= get_td(  "Registro" , "" ); 
                    $list .= get_td(  "Perfil" , "" ); 
                    $list .= get_td(  "Tel" , "" );
                    $list .= get_td(  "Tel. alterno" , "" );
                    $list .= get_td(  "# Empleado" , "" );
                    $list .= get_td("Turno" , "" );
                    $list .= get_td(  "Horario" , "" );
                    $list .= get_td(  "Grupo" , "");
                    $list .= get_td(  "Cargo" , "");
                    $list .= get_td(  "rfc" , "");
                    $list .= get_td(  "Comentario" , "");                    
                    $list .= get_td(  "Última modificación" , "");                    
                                           
        $list .='</tr>';
	
    }    
    $list .='</table></div>
                    <a href="'. base_url('index.php/recursocontroller/perfilconfig') .'">
                        <button class="btn btn-default next-to pull-right">
                                Perfiles del sistema
                        </button>        
                    </a>';

   $complete .=  "<div class='row'><div class='col-lg-12'>" . limits_tables("index.php/recursocontroller/usuarios" , $limit ) ."</div></div>";                 
   $complete .= "<em class='total_table'>Montrando: ". $now ."</em>";                 
   $complete .= $list;
    return $complete;
}
/*Terminal la función*/
}/*Termina el helper*/