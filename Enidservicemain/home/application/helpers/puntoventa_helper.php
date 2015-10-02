<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){


	function get_resumen_puntos_venta_asociados($data){
	
		$table ="<table class='table display table table-bordered dataTable'>";

		$table.="<tr class='header-table-info text-center'>
					<td>Puntosde venta asociados </td>
					<td>Contactos Asociados</td>
					<td> Teléfonos de contactato </td>
					<td> Ubicaciones  </td>
					<td> Sitio web  </td>
					
				</tr>";

  
		foreach ($data as $row) {
			$table.="<tr class='text-center'>						
					<td> ". $row["asociados"] ." </td>
					<td> ". $row["contactos_asociados"] ." </td>
					<td> ". ($row["con_tel"] + $row["con_tel_movil"])." </td>
					<td> ". $row["con_locacion"] ." </td>
					<td> ".$row["con_web"]."  </td>
					
				</tr>";		

			$table.="<tr class='text-center'>						
					<td style='border-color:white;'> </td>
					<td > ". porcentaje_puntos_venta($row["contactos_asociados"]  , $row["contactos_asociados"])  ." </td>
					<td> ". porcentaje_puntos_venta($row["contactos_asociados"]  , ($row["con_tel"] + $row["con_tel_movil"]) ) ." </td>
					<td> ". porcentaje_puntos_venta($row["contactos_asociados"]  ,  $row["con_locacion"] ) ." </td>
					<td> ". porcentaje_puntos_venta($row["contactos_asociados"]  ,  $row["con_web"])."  </td>
					
				</tr>";		


	

		}		

		$table .="</table>";			


		return $table;
	}
	/**/
	function resumen_puntos_venta_f($data){

		$table ="<table class='table display table table-bordered dataTable'>";

		$table.="<tr class='header-table-info text-center'>
					<td> Ventas </td>
					<td> Ventas de una sóla exhibición </td>
					<td> Preveentas </td>
					<td> Promociones </td>
				</tr>";
		foreach ($data as $row){
				
			$total = ($row["ventas_unicas"] +  $row["preveentas"] + $row["promociones"]);	
			$table .="<tr class='text-center' style='font-size:.8em;'>
						<td>". $total ."</td>
						<td>". $row["ventas_unicas"] ."</td>
						<td>". $row["preveentas"] ."</td>
						<td>". $row["promociones"] ."</td>
					 </tr>";	


			$table .="<tr class='text-center' style='font-size:.8em;'>
						<td>".  porcentaje_puntos_venta($total , $total )   ."</td>
						<td>". porcentaje_puntos_venta($total ,  $row["ventas_unicas"]) ."</td>
						<td>". porcentaje_puntos_venta($total , $row["preveentas"]) ."</td>
						<td>". porcentaje_puntos_venta($total , $row["promociones"]) ."</td>
					  </tr>";	
			 
					 
		}

		$table .="</table>";	
		return $table;
	}

	/**/
	function porcentaje_puntos_venta($total , $val ){

		
		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $total )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}
		return $result;

	}

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
		$table .="<td style='text-align: center;' ># </td> 
				  <td style='text-align: center;'  >Punto de venta </td>
				  
				  <td style='text-align: center;'>Logo</td></td>
				  <td style='text-align: center;'>Medios de contacto</td>  
				  <td style='text-align: center;'>Asociado al evento</td>";		
		$table .="</tr>";		
		
		$ingresos =0;
		$flag =0;
		$b=0;

		foreach ($data as $row) {

			$razon_social = $row["razon_social"];
			$descripcion = $row["descripcion"];
			$punto_venta  = $row["idpunto_venta"];


			$puntoventa= $row["punto_v"];
			$status = $row["status"];
			$idpunto_venta =  $row["idpunto_venta"];
			


			$table.="<tr class='text-center'>";

				$table.="<td   style='font-size: .8em;'>".$b."</td>";	
				$table.="<td class='franja-vertical'  style='font-size: .8em;'>".$razon_social."</td>";	

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
			$b++;
		}
		
		$table .="<tr class='enid-header-table' >";		
		$table .="<td></td>
				  <td style='text-align: center;'>Punto de venta</td> 
				  
				  <td style='text-align: center;'>Logo</td>
				  <td style='text-align: center;'>Medios de contacto</td> <td style='text-align: center;'>Asociado al evento</td>";		
		$table .="</tr>";		
		$table .="</table>
		<span class='info-table'> Puntos de venta dónde el público podrá adquirir sus accesos ".$flag.",  asociados al evento ".$ingresos .".</span>";		

		return $table;
	}

	/*regresal la lista de contactos activa en el punto de venta */
	function list_contactos_punto_venta($data){

		$list ="<table class='table display table table-bordered dataTable' border='1'>";
		$list .="<tr class='text-center enid-header-table'><td class='text-center'>Contacto </td><td class='text-center' >Organización  </td> <td class='text-center' >Tel </td> <td class='text-center'>Móvil </td><td class='text-center'>Página web </td>
		<td class='text-center'> +agregar </td>  </tr>";
		$flag=0;
		$contacos_asociados =0;
		foreach ($data as $row) {
			
			$nombre  = $row["nombre"];
			$organizacion  =  $row["organizacion"];			
			$tel =  $row["tel"];
			$movil  = $row["movil"];
			$pagina_web = $row["pagina_web"];

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
						<td>".$tel."</td> 
						<td>".$movil ."</td>
						<td>".$pagina_web ."</td>
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
		
		$list="<table class='table display table table-bordered dataTable' >        
		        <tr class='enid-header-table ' >  
		        	         
		            <td class='text-center' >Razón Social</td>		            		            
		            <td class='text-center'>Estado</td>		            
		            <td class='text-center'>Nota para el público</td>
		            <td class='text-center'>Usuario Registrante</td>
		            <td class='text-center'>Estado del Registrante</td>
		            <td class='text-center'>Fecha registro</td>
		            <td class='text-center'>Contactos Asociados</td>
		            <td class='text-center'>Editar</td>            
		            <td class='text-center'>Remover</td>            
		        </tr>";			

        $num_puntos_venta =0;
        $b =1;
		foreach ($data as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];			
			$status        = $row["status"];						
			$fecha_registro =  $row["fecha_registro"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];
			$nombre =  $row["nombre"];
			$estado_usuario  =  $row["estado_usuario"];


			$list.="<tr style='font-size:.8em;' class='text-center'>
										
					<td class='franja-vertical'>".$razon_social."</td>
					
					
					<td>".$status  ."</td>
					
					<td>".$descripcion  ."</td>
					<td>".$nombre  ."</td>
					<td>".$estado_usuario."</td>
					<td>".$fecha_registro."</td>					
					<td  class='contactos' id='". $idpunto_venta  ."' > 
						<i class='fa fa-book contactos' id='". $idpunto_venta  ."' 
						data-toggle='modal' data-target='#contactos-modal' ></i>
					</td>			
					<td><i  data-toggle='modal' data-target='#editd-punto-venta-modal'    class='editar-punto-venta fa fa-pencil-square fa-lg'  id='". $idpunto_venta  ."'  ></i></td>					
					<td> <i class='delete-punto-venta fa fa-trash'  id='". $idpunto_venta  ."'   data-toggle='modal' data-target='#delete-punto-venta-modal'  ></i></td>					
					

					</tr>";			
					$num_puntos_venta ++;
					$b++;
		}	

		if ($num_puntos_venta>9) {
			
			$list.="<tr class='enid-header-table'>
			            <td >Razón Social</td>                        
			            <td >Estado</td>            
			            <td >Nota para el público</td>
			            <td >Usuario Registrante</td>
			            <td >Estado del Registrante</td>
			            <td >Fecha registro</td>
			            <td >Contactos Asociados</td>
			            <td >Editar</td>           
			            <td >Remover</td>           
			        </tr>";
		}


		$list .="</table>
		<div><span>Puntos de venta encontrados : ". $num_puntos_venta ."</span></div>";	
		return $list;	
	}

	/**/
	function resumen_puntos_venta($data ){
		
		 
		$table='<table class="table display table table-bordered dataTable">										  
					  

					  	<tr class="text-center header-table-info" >
					  	
					  	<td class="text-center">Puntos de venta</td>
					  	<td class="text-center">Asociados a contactos</td>
					  	<td class="text-center">No disponibles</td>
					  	<td class="text-center">Disponibles para todos los colaboradores</td>
					  	<td class="text-center">Con notas para el cliente</td>					  						  	
					  	<td class="text-center">Con ṕagina web</td>
					  	<td class="text-center">Con tel de contacto</td>
					  	<td class="text-center">Con Correo electónico</td>

					  	
					  	
					  	
					  	
					  </tr>';


		
		
		foreach ($data as $row) {

			$table .="<tr class='text-center'>
				
						
						<td>".$row["puntosventatotal"] ."</td>
						<td>".$row["asociados"] ."</td>					
						<td>".$row["temporal_no_disponible"]  ."</td>
						<td>".$row["para_colaboradores"] ."</td>												
						<td>".$row["con_descripcion"] ."</td>

						<td>".$row["con_paginaweb"] ."</td>
						<td>".$row["con_tel"] ."</td>
						<td>".$row["con_mail"] ."</td>
					 </tr>";		

			$table .="<tr class='text-center'>
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["puntosventatotal"]  ) ."</td>
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["asociados"]  ) ."</td>
						
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["temporal_no_disponible"]  ) ."</td>
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["para_colaboradores"] ) ."</td>
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_descripcion"]  ) ."</td>

						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_paginaweb"]  ) ."</td>
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_tel"]  ) ."</td>
						<td>".get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_mail"]  ) ."</td>							
						
												
					 </tr>";		
					 		 
		}			  


		$table .="</table><br>";
		return  $table;
	}
	/**/
	function get_porcentaje_punto_venta($puntos_venta , $val ){

		
		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $puntos_venta )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}else{
			$result =  $result."%";
		}
		return $result;

	}
}/*Termina el helper*/