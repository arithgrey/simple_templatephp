<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	
	function get_resumen_puntos_venta_asociados($data){
	
		$table ="<table class='table display table table-bordered dataTable'>";

		$table.="<tr class='header-table-info text-center'>";
			$table .=get_td("Puntosde venta asociados" ,"");
			$table .=get_td("Contactos Asociados" ,"");
			$table .=get_td( "Teléfonos de contactato" ,"");
			$table .=get_td( "Ubicaciones"  ,"");
			$table .=get_td( "Sitio web"  ,"");
					
		$table.="</tr>";

  
		foreach ($data as $row) {
				$table.="<tr class='text-center'>";						
					$table .=get_td( $row["asociados"] ,"");
					$table .=get_td( $row["contactos_asociados"] ,"");
					$table .=get_td( ($row["con_tel"] + $row["con_tel_movil"]),"");
					$table .=get_td( $row["con_locacion"] ,"");
					$table .=get_td($row["con_web"],"");
						
				$table.="</tr>";		

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

		$table.="<tr class='header-table-info text-center'>";
					$table .=get_td("Ventas", "");
					$table .=get_td("Ventas de una sóla exhibición", "");
					$table .=get_td("Preveentas", "");
					$table .=get_td("Promociones", "");
		$table .="</tr>";
		foreach ($data as $row){
				
			$total = ($row["ventas_unicas"] +  $row["preveentas"] + $row["promociones"]);	
			$table .="<tr class='text-center' style='font-size:.8em;'>";
						$table .= get_td($total , "");
						$table .= get_td($row["ventas_unicas"] , "");
						$table .= get_td($row["preveentas"] , "");
						$table .= get_td($row["promociones"] , "");
			$table .="</tr>";	


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
		$table .= get_td("#" , "" ); 
				  $table .= get_td("Punto de venta" , "" );				 
				  $table .= get_td("Log" , "" );
				  $table .= get_td("Medios de contacto" , "" );  
				  $table .= get_td("Asociado al event" , "" );		
		$table .="</tr>";		
		
		$ingresos =0;
		$flag =0;
		$b=1;

		foreach ($data as $row) {

			$razon_social = $row["razon_social"];
			$descripcion = $row["descripcion"];
			$punto_venta  = $row["idpunto_venta"];


			$puntoventa= $row["punto_v"];
			$status = $row["status"];
			$idpunto_venta =  $row["idpunto_venta"];
			


			$table.="<tr class='text-center'>";

				$table.="<td>".$b  ."</td>";	
				$table.="<td class='franja-vertical' >".$razon_social."</td>";	

				$table.="<td></td>";	
				



				$table.="<td><i data-toggle='modal' data-target='#contactos-relacionados-punto-venta' class='puntos_venta_contacto fa fa-book' id='". $idpunto_venta ."'></i></td>";	

		
				if ($puntoventa != null  ){

					$table.="<td><input type='checkbox' class='punto_venta' id='". $idpunto_venta ."' name='punto_venta_in_evento' value='".$punto_venta."' checked></td>";		
					$ingresos ++;
				}else{
					$table.="<td><input type='checkbox' class='punto_venta' id='". $idpunto_venta ."'  name='punto_venta_in_evento' value='".$punto_venta."' ></td>";		
				}
				


			$table.="</tr></form>";		
			$flag ++;
			$b++;
		}
		
		$table .="<tr class='enid-header-table' >";		
		$table .=get_td("","");
		$table .=get_td("Punto de venta" , "");
				  
		$table .=get_td("Logo", "");
		$table .=get_td("Medios de contacto" , "");
		$table .=get_td("Asociado al evento", "");
		$table .="</tr>";		
		$table .="</table>
		<span class='info-table'> Puntos de venta dónde el público podrá adquirir sus accesos ".$flag.",  asociados al evento ".$ingresos .".</span>";		

		return $table;
	}

	/*regresal la lista de contactos activa en el punto de venta */
	function list_contactos_punto_venta($data){

		$list ="<table class='table display table table-bordered dataTable' border='1'>";
		$list .="<tr class='text-center enid-header-table'><td>IMG</td> <td class='text-center'>Contacto</td><td class='text-center' >Organización  </td> <td class='text-center' >Tel </td> <td class='text-center'>Móvil </td><td class='text-center'>Página web </td>
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




			$list.="<tr class='text-center media usr-info' >";
					if ($row["nombre_imagen"] != null ){

						$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);

						$list.="<td class='prog-avatar'> 					
		                        	<img style='width:35px !important; height:35px !important;'  class='thumb'  src='".$img ."'>						
								</td>";				
					}else{
						$list.="<td class='prog-avatar'> 
									<i class='fa fa-picture-o fa-2x'   ></i>
								</td>";

					}


			$list.="<td class='franja-vertical'>".$nombre."</td><td>".$organizacion ."</td>";
						


			


			$list.="<td>".$tel."</td> 
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
		
		$list="<br><table class='table display table table-bordered dataTable' >        
		        <tr class='enid-header-table' > "; 
		        	$list .= get_td("#", "" );	         
		        	$list .= get_td("IMG", "" );	         
		            $list.= get_td("Punto  venta", "" );		            		            
		            $list.= get_td("Estado", "" );		            
		            $list.= get_td("Nota para el público", "" );
		            $list.= get_td("Usuario Registrante", "" );
		            $list.= get_td("Estado del Registrante", "" );
		            $list.= get_td("Fecha registro", "" );
		            
		            $list.= get_td("Contactos Asociados", "" );

		            $list.= get_td("Editar", "" );            
		            $list.= get_td("Remover", "" );            
		$list .="</tr>";			

        $num_puntos_venta =0;
        $b =1;

		foreach ($data as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];			
			$status        = $row["estado_punto_venta"];						
			$fecha_registro =  $row["fecha_registro"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];
			$nombre =  $row["nombre"];
			$estado_usuario  =  $row["estado_usuario"];


			$list.="<tr style='font-size:.8em;' class='text-center  media usr-info'>";
					$list .= get_td( $b , "" );					

					if ($row["nombre_imagen"] != null ){

						$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);

						$list.="<td  data-toggle='modal' data-target='#punto-venta-imagen-modal'    class='prog-avatar'> 					
		                        	<img  class='img_punto_venta thumb' id='". $idpunto_venta."' src='".$img ."' alt=''>						
								</td>";				
					}else{
						$list.="<td  data-toggle='modal' data-target='#punto-venta-imagen-modal'    class='prog-avatar'> 
									<i  class='img_punto_venta fa fa-cloud-upload'  id='". $idpunto_venta."'  ></i>
								</td>";

					}

					$list.=get_td($razon_social, "class='franja-vertical' ");
					$list.= get_td($status  , "" );
					
					$list.= get_td($descripcion  , "" );
					$list.= get_td($nombre  , "" );
					$list.= get_td($estado_usuario, "" );
					$list.= get_td($fecha_registro, "" );

				

			$list.="<td  title='Contactos del directorio que han sido asociados al punto de venta' class='contactos' id='". $idpunto_venta  ."' > 
						<i class='fa fa-book contactos' id='". $idpunto_venta  ."' 
						data-toggle='modal' data-target='#contactos-modal' ></i>
					</td>			
					<td title='Editar contacto' ><i  data-toggle='modal' data-target='#editd-punto-venta-modal'    class='editar-punto-venta fa fa-pencil-square fa-lg'  id='". $idpunto_venta  ."'  ></i></td>					
					<td> <i class='delete-punto-venta fa fa-trash'  id='". $idpunto_venta  ."'   data-toggle='modal' data-target='#delete-punto-venta-modal'  ></i></td>										
					</tr>";			
					$num_puntos_venta ++;
					$b++;
		}	

		if ($num_puntos_venta>9) {
			
			$list.="<tr class='enid-header-table'>";
						$list .=get_td("#", "");	        
						$list .=get_td("IMG", "");
			            $list .=get_td("Punto de venta", "");                        
			            $list .=get_td("Estado", "");            
			            $list .=get_td("Nota para el público", "");
			            $list .=get_td("Usuario Registrante", "");
			            $list .=get_td("Estado del Registrante", "");
			            $list .=get_td("Fecha registro" , "");
			            
			            $list .=get_td("Contactos Asociados" , "");
			            $list .=get_td("Editar", "");           
			            $list .=get_td("Remover", "");           
			$list.="</tr>";
		}


		$list .="</table>
		<div><span>Puntos de venta encontrados : ". $num_puntos_venta ."</span></div>";	
		return $list;	
	}

	/**/
	function resumen_puntos_venta($data ){
		
		 
		$table='<table class="table display table table-bordered dataTable">										  					  
					  	<tr class="text-center header-table-info" >';

		$table .=get_td("Puntos de venta", 'class="text-center"' );			  	
		$table .=get_td("Asociados a contactos", 'class="text-center"' );			  	
		$table .=get_td("No disponibles", 'class="text-center"' );			  	
		$table .=get_td("Disponibles para todos los colaboradores", 'class="text-center"' );			  	
		$table .=get_td("Con notas para el cliente", 'class="text-center"' );			  	
		$table .=get_td("Con ṕagina web", 'class="text-center"' );			  	
		$table .=get_td("Con tel de contacto", 'class="text-center"' );			  	
		$table .=get_td("Con Correo electónico", 'class="text-center"' );			  	
					  						  	
					  	
		$table .='</tr>';


		
		
		foreach ($data as $row) {

			$table .="<tr class='text-center'>";										
			$table .=get_td($row["puntosventatotal"]  , "");
			$table .=get_td($row["asociados"] ,  "");
			$table .=get_td($row["temporal_no_disponible"] , "" );
			$table .=get_td($row["para_colaboradores"] , "");
			$table .=get_td($row["con_descripcion"] , "");

			$table .=get_td($row["con_paginaweb"] , "" );
			$table .=get_td($row["con_tel"] , "" );
			$table .=get_td($row["con_mail"] , "" );
			$table .="</tr>";		



			$table .="<tr class='text-center'>";
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["puntosventatotal"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["asociados"]  ) ,"");
								
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["temporal_no_disponible"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["para_colaboradores"] ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_descripcion"]  ) ,"");

						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_paginaweb"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_tel"]  ) ,"");
						$table .=get_td(get_porcentaje_punto_venta($row["puntosventatotal"]  , $row["con_mail"]  ) ,"");							
								
												
			$table .= "</tr>";		
					 		 
		}			  


		$table .="</table><br>";
		return  $table;
	}	
	/**/
	function list_estados_puntos_venta($data){

		$options ="";
		foreach ($data as $row){

			$options .="<option value='". $row["estado_punto_venta"] ."'>". $row["estado_punto_venta"] ."</option>";		
		}
		return $options;
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