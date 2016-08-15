<?php

        $objetos = "";			
		$height =""; 
		if (count($articulos) >= 20 ){
			
			$height ="style='overflow-y:scroll;  height: 400px;' " ; 
		}


		$b =1;						  
		foreach ($articulos as $row){

			$idobjetopermitido        =  $row["idobjetopermitido"];
			$nombre =  strtolower($row["nombre"]); 
			$descripcion =  $row["descripcion"];
			$fecha_registro=  $row["fecha_registro"];

			$configurar=  '<i id="'.$idobjetopermitido.'" class="configurar_obj fa fa-cog" data-toggle="modal" data-target="#config_obj"  ></i>';
			$eliminar =   '<i id="'.$idobjetopermitido.'" class="eliminar_obj fa fa-times" data-toggle="modal" data-target="#eliminar_obj"  ></i>';

		
				$objetos .='<tr>';	
				$objetos .= get_td($configurar); 
				$objetos .= get_td($eliminar); 
				$objetos .= get_td($nombre); 
				$objetos .=  get_td($fecha_registro);		
				$objetos .= get_td($descripcion); 
				

			$objetos .='</tr>';			
			$b++;
		}


		

		
		
		
		
?>
<span class='num_registros_encontrados'>
	# Contactos encontrados <?=count($articulos);?>
</span>
<div  <?=$height?> >
	<table class='table_enid_service' border=1>
		<tr class="table_enid_service_header">
			<td>Configurar</td>		
			<td>Artículo</td>
			<td>Fecha Registro</td>
			<td>Especificación</td>
		</tr>		
		<?=$objetos;?>
	</table>
</div>
<style type="text/css">
.tipo_text{
	background: #166781;
	color: white;
}
.campo_contacto{
	background: #3C5E79;	
	color: white;
}
.eliminar_obj:hover{
	cursor: pointer;
}

</style>
