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
					  </tr>
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



}/*Termina el helper*/
 