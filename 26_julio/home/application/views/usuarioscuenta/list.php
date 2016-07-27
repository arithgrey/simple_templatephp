<?php 	
	$height =""; 
    if (count($integrantes) > 10 ) {
        $height ="style='overflow-y:scroll;  height: 400px;' " ; 
    }
    $list =  "";        
    $now = 1;
    $b =0;
    foreach($integrantes as $row) {

    	$id_user = $row["idusuario"];
        $config =  "<i class='editar_permisos_miembro fa fa-cog' id='". $row["idusuario"] . "'></i>";  

        $status=  $row["status"]; 
        if ($row["status"] ==  "Usuario Activo") {
            $status =  "Activo";     
        }
        $config_estatus= "<a class='config_estatus_user' id='". $row["idusuario"]."'>". $status ."</a>"; 
        $img  =  create_icon_img($row , "img_user " , $row["idusuario"], "a"  );                                                    
        
        $miembro ="<span class='text_bajo_img'>" .  $row["nombre"] . "</span>";
        $miembro_pick =  "<span href='#img_user_modal' data-toggle='modal' >" . $img . "</span>" . " "; 
        $inicio_fin_labor =  $row["inicio_labor"] . " " . $row["fin_labor"];

            $list .="<tr>";                              
            $list .= get_td($config);                           
            $list .= get_td($config_estatus);                                     
            $list .= get_td($miembro_pick ,  "style='width:45px;' " );
            $list .=  get_td($miembro);
            $list .=  get_td( $row["apellido_paterno"] );
            $list .=  get_td( $row["apellido_materno"] );
            $list .= get_td($row["email"]);
            $list .= get_td($row["email_alterno"]);
            $list .= get_td($row["edad"]); 
            $list .= get_td($row["fecha_registro"]);
            $list .= get_td($row["nombreperfil"]);            
            $list .= get_td($row["tel_contacto"]);
            $list .= get_td($row["tel_contacto_alterno"]);
            $list .= get_td($row["numero_empleado"]);
            $list .= get_td($row["turno"]);           
            $list .= get_td($inicio_fin_labor);      
            $list .= get_td($row["grupo"]);
           	$list .= get_td($row["cargo"]);
            $list .= get_td($row["rfc"]);        
            $list .= get_td($row["ultima_modificacion"]);        
            $list .= get_td($row["url_fb"]);        
            $list .= get_td($row["url_tw"]);        
            $list .= get_td($row["url_www"]);                
       		$list .="</tr>";      
        $now++;
        $b ++;
    }
?>

<span class='num_registros_encontrados'>
	# Integrantes encontrados <?=count($integrantes);?>
</span>
<div <?=$height?> >
	<table class='table_enid_service' border=1>	
		<tr class='table_enid_service_header'>                                                                                                           
			<td>Configurar</td>
			<td>Estado</td>
			<td>Miembro</td>
            <td>Nombre</td>
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Email</td>		
			<td>Email alterno</td>
			<td>Edad</td>
			<td>Registrado</td>
			<td>Perfil</td>			
			<td>Tel</td>
			<td>Tel. alterno</td>
			<td>#Empleado</td>
			<td>Turno</td>
			<td>Horario</td>
			<td>Grupo</td>
			<td>Cargo</td>
			<td>RFC</td>
			<td>Última modificación</td>
			<td>Facebook</td>
			<td>Twitter</td>
			<td>Página web</td>
		</tr>
		<?=$list?>
	</table>
</div>
