<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){



	/*regresa data list con los nombres de los puntos de venta*/
	function lista_nombres_punto_venta($data){

		$data_list ="<datalist id='razon_social'>";		
		foreach ($data as $row) {

			$razon_social = $row["razon_social"];
			$data_list .="<option value='". $razon_social ."' >";
		}	
		$data_list .="</datalist>";
		return $data_list;
	}

	/*regresa los puntos de venta asociados al evento*/
	function list_puntos_venta_evento($data){
	
		$table ="<table class='table display table table-bordered dataTable' >";		
		$table .="<form action ='". base_url('index.php/api/puntosventa/punto_venta_evento_all/format/json') ."' id='form-punto-in-evento' ><tr  class='enid-header-table text-center'>";		
		$table .="<th style='text-align: center;'  >Punto de venta</th> <th style='text-align: center;'>Resumen-info</th><th style='text-align: center;'>Logo</th></th> <th style='text-align: center;'>Medios de contacto</th>  <th style='text-align: center;'>Asociado al evento</th>";		
		$table .="</tr>";		
		
		$ingresos =0;
		$flag =0;
		foreach ($data as $row) {

			$razon_social = $row["razon_social"];
			$descripcion = $row["descripcion"];
			$punto_venta  = $row["idpunto_venta"];
			$telefono  =  $row["telefono"];
			$url_pagina_web =  $row["url_pagina_web"];
			$puntoventa= $row["punto_v"];
			$status = $row["status"];
			$idpunto_venta =  $row["idpunto_venta"];
			


			$table.="<tr class='text-center'>";

				$table.="<td class='franja-vertical'  style='font-size: .8em;'>".$razon_social."</td>";	
				$table.="<td  style='font-size: .8em;'><a href='".$url_pagina_web."'> <span>".$telefono ."</span> | ".$url_pagina_web." |  ".$descripcion." |</a></td>";	
				$table.="<td  style='font-size: .8em;'></td>";	
				$table.="<td  style='font-size: .8em;'><i class='fa fa-book'></i></td>";	

		
				if ($puntoventa != null  ){

					$table.="<td style='font-size: .8em;'  ><input type='checkbox' class='punto_venta' id='". $idpunto_venta ."' name='punto_venta_in_evento' value='".$punto_venta."' checked></td>";		
					$ingresos ++;
				}else{
					$table.="<td  style='font-size: .8em;'><input type='checkbox' class='punto_venta' id='". $idpunto_venta ."'  name='punto_venta_in_evento' value='".$punto_venta."' ></td>";		
				}
				


			$table.="</tr></form>";		
			$flag ++;
		}
		
		$table .="<tr class='enid-header-table' >";		
		$table .="<th style='text-align: center;'>Punto de venta</th> <th style='text-align: center;'>Resumen-info</th><th style='text-align: center;'>Logo</th> <th style='text-align: center;'>Medios de contacto</th> <th style='text-align: center;'>Asociado al evento</th>";		
		$table .="</tr>";		
		$table .="</table>
		<span class='info-table'> Puntos de venta dónde el público podrá adquirir sus accesos ".$flag.",  asociados al evento ".$ingresos .".</span>";		
		return $table;
	}

	/*regresal la lista de contactos activa en el punto de venta */
	function list_contactos_punto_venta($data){

		$list ="<table class='table display table table-bordered dataTable' border='1'>";
		$list .="<tr class='text-center enid-header-table'><th class='text-center'>Contacto </th><th class='text-center' >Organización  </th> <th class='text-center' >Tel </th> <th class='text-center'>Móvil </th>
		<th class='text-center'> +agregar </th>  </tr>";
		$flag=0;
		$contacos_asociados =0;
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
				$contacos_asociados ++;
			}else{
				$input ="<input type='checkbox' id='".$id_contacto."' class='contacto-punto-venta'>";
				
			}

			$list.="<tr class='text-center' ><td class='franja-vertical'>".$nombre."</td><td>".$organizacion ."</td>
						<td>".$tel."</td> <td>".$movil ."</td>
						<td>". $input ."</td>
						</tr>";

			$flag++;				
		}

		$list .="</table>
		<div><span>Contactos disponibles: ". $flag.", asociados al punto de venta: ". $contacos_asociados  ."</span></div>


		<div>
			<span><a href='". base_url('index.php/directorio/contactos') ."'><button class='btn btn-block btn-info'>+ir  a la sección de contactos</button></a></span>
		</div>";
		return $list;
	}


	/*return puntos de venta empresa */
	function list_puntos_venta_administracion_empresa($data){
		
		$list="<table class='table display table table-bordered dataTable' border='1'>
        <thead>
        <tr role='row' class='enid-header-table' >             
            <th >Razón Social</th>
            <th >Tel.</th>
            <th >Página web </th>
            <th >Estado</th>
            <th >Locación</th>
            <th >Nota para el público</th>
            <th >Usuario Registrante</th>
            <th >Estado del Registrante</th>
            <th >Fecha registro</th>
            <th >Contactos Asociados</th>
            <th ></th>            
        </tr>
        </thead>        
        <tfoot>
        <tr class='enid-header-table'>
            <th >Razón Social</th>
            <th >Tel</th>
            <th >Página web</th>
            <th >Estado</th>
            <th >Locación</th>
            <th >Nota para el público</th>
            <th >Usuario Registrante</th>
            <th >Estado del Registrante</th>
            <th >Fecha registro</th>
            <th >Contactos Asociados</th>
            <th ></th>           
        </tr>
        </tfoot>
        <tbody>";			

        $num_puntos_venta =0;
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
					<td class='franja-vertical'>".$razon_social."</td>
					<td>".$telefono ."</td>
					<td><a href='". $url_pagina_web ."'>". $url_pagina_web ."</a></td>
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
					$num_puntos_venta ++;
		}	
		$list .="</tbody></table>
		<div><span>Puntos de venta encontrados : ". $num_puntos_venta ."</span></div>";	
		return $list;	
	}

}/*Termina el helper*/