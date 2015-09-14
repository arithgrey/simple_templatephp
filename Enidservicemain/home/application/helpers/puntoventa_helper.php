<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){




	/*regresal la lista de contactos activa en el punto de venta */
	function list_contactos_punto_venta($data){

		$list ="<table class='table' border='1'>";
		$list .="<tr class='text-center'><th class='text-center'>Contacto </th><th class='text-center' >Organización  </th> <th class='text-center' >Tel </th> <th class='text-center'>Móvil </th>
		<th class='text-center'> +agregar </th>  </tr>";
		foreach ($data as $row) {
			
			$nombre  = $row["nombre"];
			$organizacion  =  $row["organizacion"];			
			$tel =  $row["tel"];
			$movil  = $row["movil"];
			$puntoventacontacto =  $row["puntoventacontacto"];
			$input ="";
			$id_contacto  =  $row["idcontacto"];
			if ($puntoventacontacto != null ){
				
				$input ="<input type='checkbox' id='". $id_contacto ."' class='contacto-punto-venta' checked>";
			}else{
				$input ="<input type='checkbox' id='".$id_contacto."' class='contacto-punto-venta'>";
			}

			$list.="<tr class='text-center' ><td>".$nombre."</td><td>".$organizacion ."</td>
						<td>".$tel."</td> <td>".$movil ."</td>
						<td>". $input ."</td>
						</tr>";

		}

		$list .="</table>";
		return $list;
	}


	/*return puntos de venta empresa */
	function list_puntos_venta_administracion_empresa($data){
		
		$list="";			
		foreach ($data as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];
			$direccion     = $row["direccion"];
			$status        = $row["status"];
			$telefono      = $row["telefono"];
			$url_pagina_web =  $row["url_pagina_web"];
			$fecha_registro =  $row["fecha_registro"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];

			$nombre =  $row["nombre"];
			$estado_usuario  =  $row["estado_usuario"];


			$list.="<tr style='font-size:.8em;' class='text-center'>					
					<td class='razon-social-text'>".$razon_social."</td>
					<td>".$telefono ."</td>
					<td><a href='". $url_pagina_web ."'>".$url_pagina_web ."</a></td>
					<td>".$status  ."</td>
					<td>".$direccion  ."</td>
					<td>".$descripcion  ."</td>
					<td>".$nombre  ."</td>
					<td>".$estado_usuario."</td>
					<td>".$fecha_registro."</td>					

					<td  class='contactos' id='". $idpunto_venta  ."' > 
						<i class='btn btn-info fa fa-book contactos' id='". $idpunto_venta  ."' 
						data-toggle='modal' data-target='#contactos-modal' ></i>
					</td>			
					<td><button class='delete-punto-venta btn btn-danger' id='". $idpunto_venta  ."'  style='width:4px;' data-toggle='modal' data-target='#delete-punto-venta-modal' ><i class='fa fa-trash'></i></button></td>					

					</tr>";			
		}		
		return $list;	
	}

}/*Termina el helper*/