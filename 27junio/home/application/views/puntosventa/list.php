<?php 

	$complete ="";
		$list=  "";
		$height ="";
		if (count($puntos_venta) > 20 ){
			$height ="style='overflow-y:scroll;  height: 400px;' " ; 
		}
		
        $num_puntos_venta =0;
        $b =1;
		foreach ($puntos_venta as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];			
			$status        = $row["estado_punto_venta"];						
			$zona =  $row["zona"];
			$fecha_registro =  $row["fecha_reg"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];
			$nombre =  $row["nombre"];
			$estado_usuario  =  $row["estado_usuario"];


			$list.="<tr>";
				$img =  create_icon_img($row , " img_punto_venta " , $idpunto_venta , " data-toggle='modal' data-target='#punto-venta-imagen-modal' " ); 
				$fa_nota =  "<i class='nota-punto-venta fa fa-list-alt' id='".$idpunto_venta."'   data-toggle='modal' data-target='#punto-venta-descripcion-modal' ></i>"; 

				$list .=  get_td("<i  data-toggle='modal' data-target='#editd-punto-venta-modal'    class='editar-punto-venta fa fa-cog'  id='". $idpunto_venta  ."'  ></i>" ,"title='Editar contacto'" );
				$list.=get_td($img,  "style='width:45px;' "); 				
				$list.=get_td($razon_social);				
				$list.= get_td($status);					
				$list.= get_td($zona);									
				$list.= get_td($fa_nota);
				$list.= get_td($nombre);
				$list.= get_td($fecha_registro);
				$list .=  get_td("<i class='contactos  fa fa-book ' id='". $idpunto_venta  ."' data-toggle='modal' data-target='#contactos-modal' ></i>" , "title='Contactos del directorio que han sido asociados al punto de venta' ");							
				$list.= get_td("<i class='delete-punto-venta fa fa-times'  id='". $idpunto_venta  ."'   data-toggle='modal' data-target='#delete-punto-venta-modal'  ></i>" , "");
				$list.="</tr>";			
				$num_puntos_venta ++;
				$b++;
		}	
?>
<div class='pull-right mas-info' style='font-size: .7em;padding: 5px; margin-left:1px;' >
    <i class='fa fa-chevron-down'>
	</i>  + info
</div>                                        
<div class='pull-right menos-info' style='font-size: .7em;padding: 5px; margin-left:1px; display:none;' >
    <i class='fa fa-chevron-up'>
    </i>  - info
</div>
<span class='num_registros_encontrados'>
	# Puntos de venta encontrados <?=count($puntos_venta);?>
</span>



<div <?=$height?> >
	<table class='table_enid_service' border=1  >
		<tr class='table_enid_service_header'>		        	
			<td>Configurar</td>
			<td>IMG</td>	
			<td>Punto  venta</td>
			<td>Estado</td>
			<td>Zona</td>
			<td>Nota para el público</td>
			<td>Usuario Registrante</td>
			<td>Fecha registro</td>
			<td>Contactos Asociados</td>
			<td>Eliminar</td>
		</tr>
		<?=$list?>
	</table>
</div>



