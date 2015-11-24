<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
	function table_contac($data){

		$contacto ='<table class="table display table table-bordered dataTable">';										 
		$contacto .="<tr class='enid-header-table'>";					  
		$contacto .= get_td("#" , "");				  
		$contacto .= get_td("IMG" , "");				  
		$contacto .= get_td("Contacto" , "class='franja-vertical'");				  
					  					  	
		$contacto .= get_td("organización" , "");
		$contacto .= get_td("Teléfono" , "");	 					  	
		$contacto .= get_td("Movil" , "");
					  	
					  			  	
		$contacto .= get_td ("Correo" , "" );
		$contacto .= get_td ("Página web" , "" );
		$contacto .= get_td ("Facebook" , "" );
		$contacto .= get_td ("Twitter" , "" );

		$contacto .= get_td ("Dirección" , "" );
		$contacto .= get_td ("Tipo" , "" );
					  	
		$contacto .= get_td ("Estado" , "" );
		$contacto .= get_td ("Registro" , "" );

		$contacto .= get_td ("Nota" , "" );		
		$contacto .= get_td ("Editar" , "" );
					  	
		
		$contacto .="</tr>";
		
		$b =1;						  
		foreach ($data as $row) {
			

			$idcontacto  = $row["idcontacto"]; 
			$nombre      = $row["nombre"];  
			$organizacion  = $row["organizacion"];
			$tel          = $row["tel"]; 
			$movil         = $row["movil"];
			$correo        = $row["correo"];
			$pagina_web =  $row["pagina_web"];
			$pagina_fb =  $row["pagina_fb"];
			$pagina_tw =  $row["pagina_tw"];

			$direccion    = $row["direccion"]; 
			$status         =  $row["status"];
			$fecha_registro =  $row["fecha_registro"];
			$tipo          = $row["tipo"];
			$idusuario     = $row["idusuario"];
			$nota          = $row["nota"];

			/**/



			$img = base_url( $row["base_path_img"].$row["nombre_imagen"]);

			$contacto .='<tr class="text-center media usr-info" >';
			$contacto .= get_td( $b , "franja-vertical");	

			if ($row["nombre_imagen"] != null ) {											
			
				$contacto .='<td  data-toggle="modal" data-target="#contact-imagen-modal"    class="prog-avatar"> 
	                             <img  class="img_contacto thumb" id="'.$idcontacto.'" src="'.$img.'" alt="">
							</td>';
			}else{
				$contacto .='<td  data-toggle="modal" data-target="#contact-imagen-modal"    class="prog-avatar"> 
                             <i  class="img_contacto fa fa-cloud-upload" id="'.$idcontacto.'" ></i>
						</td>';
			}					


			$contacto .=get_td($nombre , "class='franja-vertical'" );

						$contacto .= get_td($organizacion, ""); 
						$contacto .= get_td($tel, ""); 
						$contacto .= get_td($movil, ""); 
						$contacto .= get_td($correo, ""); 						

						$pagina_web_d =  "<a style='color: #26A0D1 !important;' href='". $pagina_web ."'> www </a>";
						$contacto .= get_td($pagina_web_d  , ""); 


						$pagina_web_f =  "<a  style='color: #26A0D1 !important;'  href='". $pagina_fb ."'> Facebook </a>";
						$contacto .= get_td($pagina_web_f  , ""); 
						
						$pagina_web_t =  "<a style='color: #26A0D1 !important;' href='". $pagina_tw ."'> Twitter </a>";
						$contacto .= get_td($pagina_web_t  , ""); 
						
						

						$contacto .= get_td($direccion, ""); 
						$contacto .= get_td($tipo, ""); 						
						$contacto .= get_td($status , ""); 
						$contacto .= get_td($fecha_registro, ""); 
	
			$contacto .='<td data-toggle="modal" data-target="#contact-nota" >
			<i id="'. $idcontacto.'" class="nota-c fa fa-comment" ></i></td>';						
			$contacto .='<td data-toggle="modal" data-target="#contact-modal-edit" ><i id="'. $idcontacto.'" class="editar-contacto fa fa-pencil-square fa-lg" ></i></td>
			</tr>';			
			$b++;
		}


		if ($b>9 ) {
			
			$contacto .="<tr class='text-center enid-header-table'>";
				$contacto .= get_td( "#", "");
				$contacto .= get_td("IMG" , "" );
				$contacto .= get_td( "Contacto" , "");
				$contacto .= get_td("organización" , "" );
				$contacto .= get_td("Teléfono" , "" );
				$contacto .= get_td("Movil" , "" );
				$contacto .= get_td("Correo" , "" );
				$contacto .= get_td("Página web" , "" );
				$contacto .= get_td ("Facebook" , "" );
				$contacto .= get_td ("Twitter" , "" );

				$contacto .= get_td("Dirección" , "" );
				$contacto .= get_td("Tipo" , "" );					  	
				$contacto .= get_td("Estado" , "" );
				$contacto .= get_td("Fecha registro" , "" );					  	
				$contacto .= get_td ("Nota" , "" );		
				$contacto .= get_td("Editar" , "" );					  	
			$contacto.= "</tr>";	
		}

		$contacto .="		
		</table>
		<span class=''>Resultados encontrados:  ". ($b -1)."<span>
		";
		return $contacto;	
	}

	/*termina la función */
	function list_contactos_names($data){

		$list_data ='<datalist id="contactos-lista">';
		foreach ($data as $row) {
			$list_data .="<option value='". $row["nombre"]."'>";
		}
		$list_data .="</datalist>";
		return  $list_data;
	}
	/**/

	function filtro_tipo_contacto($data){

		$select ="<select class='form-control' id='filtro-tipo-contacto' name='filtro-tipo-contacto'>";
		$select .="<option>Seleccione</option>";
		$select .="<option value='Todos'>Mostrar todos</option>";

		foreach ($data as $row) {

			$select .="<option value= '".$row["tipo"]."' >". $row["tipo"]."</option>";
		}
		$select .= "</select>";		
		return $select;
	}/**/

	/*Resumen de los contactos */
	function resumen_contactos($data){


		$table ='<table class="table display table table-bordered dataTable">										  
					  <tr class="text-center header-table-info" >';
					  	$table .= get_td( "Contactos", "" );
					  	$table .= get_td( "Proveedores", "" );
					  	$table .= get_td( "Artistas", "" );
					  	$table .= get_td( "Colaboradores", "" );
					  	$table .= get_td( "Contactos comerciales", "" );
					  	$table .= get_td( "Clientes", "" );
					  	$table .= get_td( "Instituciones", "" );
					  	$table .= get_td( "Patrocinadores", "" );
					  						  
					  	$table .= get_td( "Con correo electrónico", "" );					  		
					  	$table .= get_td( "Con página web", "" );					  		
					  	
					  	$table .= get_td( "Con Facebook", "" );	
					  	$table .= get_td( "Con Twitter", "" );	

					  	$table .= get_td( "Con tel ", "" );

		$table .='</tr>';
		


		foreach ($data as $row) {
			    
			$table.="<tr   class='text-center'>";
						$table .=get_td($row["contactos"] , "" );
						$table .=get_td($row["proveedores"], "" );
						$table .=get_td($row["artistas"] , "" );
						$table .=get_td($row["Colaboradores"] , "" );
						$table .=get_td($row["Contacto_comercial"] , "" );
						$table .=get_td($row["Clientes"] , "" );
						$table .=get_td($row["instituciones"] , "" );
						$table .=get_td($row["Patrocinador"] , "" );
						

						$table .=get_td($row["con_correo"] , "" );
						$table .=get_td($row["con_pagina_web"] , "" );
						$table .=get_td($row["con_pagina_fb"] , "" );
						$table .=get_td($row["con_pagina_tw"] , "" );

						$table .=get_td($row["con_tel"] , "" );
						

			$table .="</tr>";	  	
			$table .="<tr class='text-center'>";
						$table .= get_td( get_porcentajes_contactos( $row["contactos"] , $row["contactos"]  ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["proveedores"] ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["artistas"]   ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"],  $row["Colaboradores"])   , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"],  $row["Contacto_comercial"]  ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["Clientes"] ) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["instituciones"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["Patrocinador"]) , "");

						
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_correo"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_pagina_web"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_pagina_fb"]) , "");
						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_pagina_tw"]) , "");

						$table .= get_td( get_porcentajes_contactos( $row["contactos"], $row["con_tel"]) , "");
						

		 			$table  .="</tr>";  					 
		}	  
		$table .="</table><br>";					
		return $table;

	}
	/**/
	function get_porcentajes_contactos($contactos , $val ){

		$result =0;
		if ($val>0 ) {

			$result =  ($val/ $contactos )* (100);
			$result =   number_format( $result , 2, '.', ' ')."%";				
		}

		return $result;
	}

	/**/
	function contactos_list($data){

		$info_contacto = "<table class='table'>"; 	
		foreach ($data as $row) {				

			$nombre =  $row["nombre"];         
			$organizacion   =  $row["organizacion"];
			$tel =  $row["tel"];          
			$movil  =  $row["movil"];        
		 	$correo  =  $row["correo"];
			$direccion  =  $row["direccion"];     
			
			$nota   =  $row["nota"];         
			$pagina_web     = $row["pagina_web"];
			$pagina_fb = $row["pagina_fb"];      
			$pagina_tw = $row["pagina_tw"];	       		
			$correo_alterno = $row["correo_alterno"];	  


			$info_contacto .=  "<tr>"; 
				$info_contacto .= get_td( $nombre , "" );



				$tel =  "<a title= '". $tel ."' style='color: #26A0D1 !important;' > <i title= 'Teléfono de contacto : ". $tel ."' class='fa fa-phone'></i> </a>";
				$info_contacto .= get_td( $tel , "" );
				
				$movil =  "<a title= '". $movil."' style='color: #26A0D1 !important;' > <i title= 'Móvil :". $movil ."' class='fa fa-mobile'></i> </a>";
				$info_contacto .= get_td( $movil , "" );

				$correo =  "<a title= '". $correo ."' style='color: #26A0D1 !important;' > <i title= 'Correo electrónico : ".$correo."' class='fa fa-envelope-o'></i> </a>";
				$info_contacto .= get_td( $correo , "" );

				$correo_alterno =  "<a title= '". $correo_alterno ."' style='color: #26A0D1 !important;' > <i title= 'Correo alterno ".$correo_alterno ."' class='fa fa fa-envelope'></i> </a>";				

				$info_contacto .= get_td( $correo_alterno , "" );

				$locacion =  "<a title= '".$direccion."' style='color: #26A0D1 !important;' > <i title= 'Dirección :".$direccion."' class='fa fa-map-marker'></i> </a>";
				$info_contacto .= get_td( $locacion , "" );

				$pagina_web_d =  "<a style='color: #26A0D1 !important;' href='". $pagina_web ."'> www </a>";
				$info_contacto .= get_td($pagina_web_d  , ""); 
				$pagina_web_f =  "<a  style='color: #26A0D1 !important;'  href='". $pagina_fb ."'> Facebook </a>";
				$info_contacto .= get_td($pagina_web_f  , ""); 					
				$pagina_web_t =  "<a style='color: #26A0D1 !important;' href='". $pagina_tw ."'> Twitter </a>";
				$info_contacto .= get_td($pagina_web_t  , ""); 					
			$info_contacto .=  "</tr>"; 

		}
		if (count($data) == 0  ) {
			$info_contacto = "Punto de venta sin contactos asignados ";
		}

		return $info_contacto; 
	}

}/*Termina el helper*/