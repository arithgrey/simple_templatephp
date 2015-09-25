<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){



	function table_contac($data){

		$contacto ='<div class="panel panel-default">					  
					  
					  
					  <table class="table display table table-bordered dataTable">
					
					  
					  <tr class="text-center enid-header-table">
					  	<th class="text-center ">#</th>
					  	<th class="text-center " >Contacto</th>
					  	<th class="text-center">organización</th>
					  	<th class="text-center">Teléfono</th>
					  	<th class="text-center">Movil</th>
					  	<th class="text-center">Correo</th>
					  	<th class="text-center">Página web</th>
					  	<th class="text-center">Dirección</th>
					  	<th class="text-center">Tipo</th>
					  	<th class="text-center">Nota</th>
					  	<th class="text-center">Estado</th>
					  	<th class="text-center">Fecha registro</th>
					  	<th class="text-center"></th>
					  </tr>
					  ';
		
		$b =1;						  
		foreach ($data as $row) {
			

			$idcontacto  = $row["idcontacto"]; 
			$nombre      = $row["nombre"];  
			$organizacion  = $row["organizacion"];
			$tel          = $row["tel"]; 
			$movil         = $row["movil"];
			$correo        = $row["correo"];
			$pagina_web =  $row["pagina_web"];
			$direccion    = $row["direccion"]; 
			$status         =  $row["status"];
			$fecha_registro =  $row["fecha_registro"];
			$tipo          = $row["tipo"];
			$idusuario     = $row["idusuario"];
			$nota          = $row["nota"];



			$contacto .='<tr class="text-center" style="font-size:.8em;" >
						<td class="franja-vertical">'.$b.'</td>
						<td class="franja-vertical">'.$nombre.'</td>
						<td>'.$organizacion.'</td>
						<td>'.$tel.'</td>
						<td>'.$movil.'</td>
						<td>'.$correo.'</td>
						<td>'.$pagina_web.'</td>
						<td>'.$direccion.'</td>
						<td>'.$tipo.'</td>
						<td>'.$nota.'</td>
						<td>'.$status .'</td>
						<td>'.$fecha_registro.'</td>
						<td data-toggle="modal" data-target="#contact-modal-edit" ><i id="'. $idcontacto.'" class="editar-contacto fa fa-pencil-square fa-lg" ></i></td>

						</tr>';			
			$b++;
		}


		if ($b>9 ) {
			
			$contacto .="<tr style='' class='text-center enid-header-table'>
					  	<th class='text-center ' >#</th>
					  	<th class='text-center ' >Contacto</th>
					  	<th class='text-center' >organización</th>
					  	<th class='text-center' >Teléfono</th>
					  	<th class='text-center' >Movil</th>
					  	<th class='text-center' >Correo</th>
					  	<th class='text-center'>Página web</th>
					  	<th class='text-center' >Dirección</th>
					  	<th class='text-center' >Tipo</th>
					  	<th class='text-center' >Nota</th>
					  	<th class='text-center' >Estado</th>
					  	<th class='text-center' >Fecha registro</th>
					  	<th class='text-center' ></th>					  	
					  </tr>";	
		}

		$contacto .="
		
		</table>
		<span class=''>Resultados encontrados:  ". ($b -1)."<span>
		</div>";
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
		foreach ($data as $row) {

			$select .="<option value= '".$row["tipo"]."' >". $row["tipo"]."</option>";
		}
		$select .= "</select>";		
		return $select;
	}/**/

	/*Resumen de los contactos */
	function resumen_contactos($data){


		$table ='<table class="table display table table-bordered dataTable">										  
					  <tr class="text-center" style="background:rgba(202, 234, 231, 0.9);">
					  	<th class="text-center">Contactos</th>
					  	<th class="text-center">Proveedores</th>
					  	<th class="text-center">Artistas</th>
					  	<th class="text-center">Colaboradores</th>
					  	<th class="text-center">Contactos comerciales</th>
					  	<th class="text-center">Clientes</th>
					  	<th class="text-center">Instituciones</th>					  	
					  </tr>';
		


		foreach ($data as $row) {
			    
			$table.="<tr   class='text-center'>
						<td>".$row["contactos"] ."</td>
						<td>".$row["proveedores"]."</td>
						<td>".$row["artistas"] ."</td>
						<td>".$row["Colaboradores"] ."</td>
						<td>".$row["Contacto_comercial"] ."</td>
						<td>".$row["Clientes"] ."</td>
						<td>".$row["instituciones"] ."</td>

					</tr>";	  	
		}	  
		$table .="</table><br>";					
		return $table;

	}


}/*Termina el helper*/
 