<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){


	


	/**/
	function puntos_venta_admin($data ){
		$icon =  ""; 
		$flag = 0; 
		foreach ($data as $row){			

			$flag  ++;
			$idpunto_venta  = $row["idpunto_venta"];
			$razon_social = $row["razon_social"]; 			
			$idimagen  = $row["idimagen"];
			$id_imagen =  $row["id_imagen"]; 
			$nombre_imagen  = $row["nombre_imagen"]; 
			$base_path  = $row["base_path"]; 
			$base_path_img = $row["base_path_img"]; 			
			
				if ($idimagen  == $id_imagen &&   isset($idimagen)  ) {

					$url_img = base_url( $row["base_path_img"].$row["nombre_imagen"]);
					$title = $razon_social . " asociado al evento"; 
					$icon .=  "<div class='img-horizontal'>" .  create_icon_img( $url_img , "punto-venta-icon" , $idpunto_venta  , $title , 1 , "A") ."
							  		<div title='$title' data-toggle='modal' data-target='#delete-punto-venta-modal'  >
							  			<i class='fa fa-times delete-punto-venta-icon' id='". $idpunto_venta  ."'></i>
							  		</div>
							  	</div>";  	

				}else{				

					$title = $razon_social . " asociado al evento"; 
					$letra =  substr($razon_social , 0 , 1 ); 	
					$icon .=  "<div class='img-horizontal' >" . create_icon_img( "" , "punto-venta-icon" , $idpunto_venta  , $title , 0 , $letra ). "
									<div title='$title'  data-toggle='modal' data-target='#delete-punto-venta-modal'  > 
										<i class='fa fa-times delete-punto-venta-icon' id='". $idpunto_venta  ."'></i>
									</div>
								</div>";  	
				}	
			
		}	

		return $icon . "<div><em>Cargados al evento  ". $flag . "</em></div>";
	}	
	/**/	
	  function filtro_enid_busqueda_punto_venta($data,  $class , $id   ){    
	    	  
	    	  
	    $filtro ="<div class='panel-heading enid-header-busqueda' >";    
	    $filtro .= "<h5 class='text-center'>Secciona para añadir</h5>";           
	    $filtro .= "</div>";           
	    $filtro .= "<div class='panel panel-body-enid-busqueda'>               
	               <ul>";        	    
	      foreach ($data as $row){
	          

	          $filtro .= "<li style='font-size:.7em !important; list-style:none;' class='enid-filtro-busqueda' id='". $row[$id]  ."'>";                                  
	          $url =  $row["base_path_img"] . $row["nombre_imagen"];
	          $url_imagen = base_url($url);  
	          
	          if (strlen($row["nombre_imagen"]) > 3  ) {           

	            $filtro .=  "<div class='img-div'>"; 
	            $filtro .=  create_icon_img($url_imagen  , $class ,  $row[$id]  ,  "" , 1 );  
	            $filtro .=  "</div>"; 
	  
	          }else{

	            $letra = substr($row["razon_social"], 0 ,1  ); 
	            $filtro .=  "<div class='img-div' >";
	            $filtro .=  create_icon_img($url_imagen  , $class  , $row[$id]  ,  "" , 0 ,  $letra   );           
	            $filtro .=  "</div>";           
	          }

	          $filtro .=  "<div class='$class img-div-text'  id='". $row[$id]."'>";          
	          $filtro .=  $row["razon_social"];                     
	          $filtro .=  "</div>";                     
	          $filtro .= "</li>";
	      } 

	      
	      $filtro .="</ul>";
	      $filtro .="</div>";

	    return $filtro; 
	    

	  }
  
/**/
function load_puntos_venta_complete($data){


    $table = "";
    $table .= '<table class="table table-bordered">
    <tr class="text-center enid-header-table">';
    $table .= get_td("#" , "");  
    $table .= get_td("Punto de venta" , "");   
    $table .= get_td("Descripción" , "");
    $table .= get_td("Fecha registro" , "");
    
    $table .= '</tr>';            
    $flag =  1;
    foreach ($data as $row) {

        $table .=  "<tr>"; 
        $table .= get_td($flag , "");
        $table .= get_td($row["razon_social"], "");
        $table .= get_td($row["descripcion"], "");
        $table .= get_td($row["fecha_registro"], "");
        
        
        $table .=  "</tr>"; 
        $flag ++; 
    }
    return $table; 
}



	function get_resumen_puntos_venta_asociados($data){
	
		$table ="<div class='scroll-horizontal-enid'><table class='table table-bordered'>";

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
					<td style='border-color:white;'> </td>";
					$table .=get_td( porcentaje_puntos_venta($row["contactos_asociados"]  , $row["contactos_asociados"])  , ""  );
					$table .=get_td(  porcentaje_puntos_venta($row["contactos_asociados"]  , ($row["con_tel"] + $row["con_tel_movil"]) ) , "" );
					$table .=get_td( porcentaje_puntos_venta($row["contactos_asociados"]  ,  $row["con_locacion"] )  , "");
					$table .=get_td( porcentaje_puntos_venta($row["contactos_asociados"]  ,  $row["con_web"])  , "");

			$table.="</tr>";		
		}		
		$table .="</table></div>";			
		return $table;
	}
	/**/	
	function resumen_puntos_venta_f($data){

		$table ="<table class='table table-bordered'>";

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


			$table .="<tr class='text-center' style='font-size:.8em;'>";
						$table .= get_td(  porcentaje_puntos_venta($total , $total )   , "" );
						$table .= get_td( porcentaje_puntos_venta($total ,  $row["ventas_unicas"]) , "" );
						$table .= get_td( porcentaje_puntos_venta($total , $row["preveentas"]) , "" );
						$table .= get_td( porcentaje_puntos_venta($total , $row["promociones"]) , "" );
			$table .="</tr>";	
			 					
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

		$table ="<table class='table table-bordered' >";		
		$table .="<form action ='". base_url('index.php/api/puntosventa/punto_venta_evento_all/format/json') ."' id='form-punto-in-evento' ><tr  class='enid-header-table text-center'>";		
		$table .= get_td("#" , "" ); 
				  $table .= get_td("Punto de venta" , "" );				 
				  $table .= get_td("Logo" , "" );
				  $table .= get_td("Medios de contacto" , "" );  
				  $table .= get_td("<i class='fa fa-times '></i>" , "" );		
		$table .="</tr>";		
		
		$ingresos =0;
		$flag =0;
		$b=1;

		foreach ($data as $row) {

			
			$razon_social = $row["razon_social"];
			$descripcion = $row["descripcion"];
			$punto_venta  = $row["idpunto_venta"];

			
			$status = $row["status"];
			$idpunto_venta =  $row["idpunto_venta"];			
			$table.="<tr class='text-center'>";			
				$table .= get_td( $b , "");
				$table .= get_td( $razon_social  , "class='franja-vertical' ");

				$table .= get_td( "<img src='".create_path_img($data)."'>"  , "");
				$table .= get_td( "<i data-toggle='modal' data-target='#contactos-relacionados-punto-venta' class='puntos_venta_contacto fa fa-book' id='". $idpunto_venta ."'></i>", "");
				$table .= get_td( "<i data-toggle='modal' data-target='#delete-punto-venta-modal' class='fa fa-times delete_punto_venta_evento' id='".$punto_venta."'></i>", "");					
			$table.="</tr>";		
			$flag ++;
			$b++;
		}
		
		$table .="<tr>";		
		$table .=get_td("#","");
		$table .=get_td("Punto de venta" , "");
				  
		$table .=get_td("Logo", "");
		$table .=get_td("Medios de contacto" , "");
		$table .=get_td("Asociado al evento", "");
		$table .="</tr>";		
		$table .="</table>
		<em class='info-table'> Puntos de venta dónde el público podrá adquirir sus accesos ".$flag.",  asociados al evento ".$ingresos .".</em>";		

		return $table;
	}

	/*regresal la lista de contactos activa en el punto de venta */
	function list_contactos_punto_venta($data){

		/**/
		$list ="<div  style='overflow:scroll;  scrollbar-base-color:#ffeaff; ' ><table class='table table-bordered' >        
		        <tr class='enid-header-table' >";

		$list .=  get_td("IMG" , "");        
		$list .=  get_td("Contacto" , "");        
		$list .=  get_td("Organización" , "");        
		$list .=  get_td("Tel" , "");        
		$list .=  get_td("Móvil" , "");        
		$list .=  get_td("Página web" , "");        
		$list .=  get_td("Facebook" , "");        
		$list .=  get_td("Twitter" , "");        
		$list .=  get_td("" , "");        
		$list .= "</tr>";
		
		$flag=0;
		$contacos_asociados =0;

		foreach ($data as $row) {		
			
			$nombre  = $row["nombre"];
			$organizacion  =  $row["organizacion"];			
			$tel =  $row["tel"];
			$movil  = $row["movil"];
			$pagina_web = $row["pagina_web"];
			$pagina_fb = $row["pagina_fb"];
			$pagina_tw = $row["pagina_tw"];


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
		                        	<img  class='thumb'  src='".$img ."'>						
								</td>";				
					}else{
						$list.="<td class='prog-avatar'> 
									<i class='fa fa-picture-o fa-2x'   ></i>
								</td>";

					}


			$list.= get_td( $nombre , "");
			$list.= get_td( $organizacion  , "");
			$list.= get_td( $tel , "");
			$list.= get_td($movil , "");
			$pagina_web =  "<a href='". $pagina_web  ."'>www</a>";
			$list.= get_td($pagina_web , "");
			

			
			$pagina_fb =  "<a href='". $pagina_fb  ."'>Facebook</a>";
			$list.= get_td($pagina_fb , "");
			

			$pagina_tw =  "<a href='". $pagina_tw  ."'>Twitter</a>";
			$list.= get_td($pagina_tw , "");
			

			$list.= get_td( $input , "");
			$list.="</tr>";
			$flag++;				
		}

		$list .="</table></div>
		
		<div class='row'>
			<span class='col-lg-3 pull-left'><a href='". base_url('index.php/directorio/contactos') ."'><button class='btn btn-default next-to'>+ir  a la sección de contactos</button></a></span>
		</div>";
		return $list;
	}


	/*return puntos de venta empresa */

	function list_puntos_venta_administracion_empresa($data , $limit ){
		$complete ="";
		$list=  limits_tables("index.php/puntosventa/administrar" , $limit );
		$list .="<table class='table table-bordered' >        
		        <tr class='enid-header-table' > "; 
		        	$list .= get_td("#", "" );	         
		        	$list .= get_td("IMG", "" );	         
		            $list.= get_td("Punto  venta", "" );		            		            
		            $list.= get_td("Estado", "" );		            
		            $list.= get_td("Nota para el público", "" );
		            $list.= get_td("Usuario Registrante", "" );		            
		            $list.= get_td("Fecha registro", "" );
		            
		            $list.= get_td("Contactos Asociados", "" );

		            $list.= get_td("Editar", "" );            
		            $list.= get_td("Eliminar", "" );            
		$list .="</tr>";			

        $num_puntos_venta =0;
        $b =1;
		foreach ($data as $row) {
			
			$idpunto_venta = $row["idpunto_venta"];
			$razon_social  =  $row["razon_social"];			
			$status        = $row["estado_punto_venta"];						
			$fecha_registro =  $row["fecha_reg"];
			$idempresa     = $row["idempresa"];
			$descripcion  =  $row["descripcion"];
			$nombre =  $row["nombre"];
			$estado_usuario  =  $row["estado_usuario"];

			$list.="<tr>";
					$list .= get_td( $b , "" );					
					if ($row["nombre_imagen"] != null ){

						$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);					
						$title = $razon_social; 						
						$list .=  get_td( create_icon_img($img ,  'img_punto_venta' , $idpunto_venta , $title , 1 )   , "data-toggle='modal' data-target='#punto-venta-imagen-modal'  "   );				

					}else{
						
						$list .= get_td("<i  class='img_punto_venta fa fa-cloud-upload'  id='". $idpunto_venta."'  ></i>", " data-toggle='modal' data-target='#punto-venta-imagen-modal' "); 					
					}
					$list.=get_td($razon_social, "class='franja-vertical' ");
					$list.= get_td($status  , "" );					
					$fa_nota =  "<i class='nota-punto-venta fa fa-list-alt' id='".$idpunto_venta."'   data-toggle='modal' data-target='#punto-venta-descripcion-modal' ></i>"; 

					$list.= get_td($fa_nota  , "" );
					$list.= get_td($nombre  , "" );
					$list.= get_td($fecha_registro, "" );

					$list .=  get_td("<i class='contactos  fa fa-book ' id='". $idpunto_venta  ."' data-toggle='modal' data-target='#contactos-modal' ></i>" , "title='Contactos del directorio que han sido asociados al punto de venta' ");		
					$list .=  get_td("<i  data-toggle='modal' data-target='#editd-punto-venta-modal'    class='editar-punto-venta fa fa-pencil-square-o'  id='". $idpunto_venta  ."'  ></i>" ,"title='Editar contacto'" );
					$list.= get_td("<i class='delete-punto-venta fa fa-times'  id='". $idpunto_venta  ."'   data-toggle='modal' data-target='#delete-punto-venta-modal'  ></i>" , "");
					$list.="</tr>";			
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
			            
			            $list .=get_td("Fecha registro" , "");
			            
			            $list .=get_td("Contactos Asociados" , "");
			            $list .=get_td("Editar", "");           
			            $list .=get_td("Eliminar", "");           
			$list.="</tr>";
		}


		$list .="</table>
		<div>
			
		</div>";	
		$complete .= "<em class='total_table'>Mostrando:". $num_puntos_venta ."</em>";
		$complete .= $list;
		return $complete;	
	}

	/**/
	function resumen_puntos_venta($data ){
		
		 
		$table='<table class="table table-bordered">										  					  
					  	<tr class="header-table-info" >';

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
	/**/
	function list_puntos_venta_cliente($puntos_venta ,  $id_evento){


		$b =  0;   
		$puntos_venta_section = ''; 	
		foreach ($puntos_venta as $row) {	


			$idpunto_venta =  $row["idpunto_venta"];
			$razon_social  = $row["razon_social"];
			$descripcion  = $row["descripcion"];			

			$base_path_img  = $row["base_path_img"];
			$nombre_imagen= $row["nombre_imagen"];
			$img =  base_url($base_path_img . $nombre_imagen);


			
			
				
				$puntos_venta_section .='<div class="col-lg-4 text-center" >
			            <div class="icon-box">
			              <img  src="'. $img  .'"> 
			              

			              <h3 style="color:#F6D314;" class="title-sm text-theme-sm text-theme">'. $razon_social  .'</h3>
			              <p class="text-theme-sm text-center" style = "color:white; font-size:.8em;" >
			              '. $descripcion .'
			              </p>


			              	<button type="button" id="'. $idpunto_venta.'" class="contactos-modal-btn btn btn-default" data-toggle="modal" data-target="#contactos-modal">Dónde</button>

			              
			            </div>
			          </div>';

			
			$b++; 
		}

		return $puntos_venta_section;
	}
}/*Termina el helper*/