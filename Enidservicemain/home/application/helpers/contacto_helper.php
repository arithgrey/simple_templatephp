<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){



	function table_contac($data){

		$contacto ='<div class="panel panel-default">					  
					  
					  
					  <table class="table display table table-bordered dataTable">
					  <tr>
					  	<td  style="background:rgba(15, 108, 105, 0.92); color:white;" colspan="5">
					  	<button id="nuevo-contacto-button" type="button" class="btn btn-info" data-toggle="modal" data-target="#contact-modal">
        <i class="fa fa-check"></i>
        Agregar contacto
</button>

					  	</td>
					  </tr>
					  

					  <tr style="" class="header-table">
					  	<th>#</th>
					  	<th>Contacto</th>
					  	<th>organización</th>
					  	<th>Teléfono</th>
					  	<th>Movil</th>
					  	<th>Correo</th>
					  	<th>Dirección</th>
					  	<th>Tipo</th>
					  	<th>Nota</th>
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
			$direccion    = $row["direccion"]; 
			$status         =  $row["status"];
			$fecha_registro =  $row["fecha_registro"];
			$tipo          = $row["tipo"];
			$idusuario     = $row["idusuario"];
			$nota          = $row["nota"];



			$contacto .='<tr class="text-center" >
						<td>'.$b.'</td>
						<td>'.$nombre.'</td>
						<td>'.$organizacion.'</td>
						<td>'.$tel.'</td>
						<td>'.$movil.'</td>
						<td>'.$correo.'</td>
						<td>'.$direccion.'</td>
						<td>'.$tipo.'</td>
						<td>'.$nota.'</td>
						

						</tr>';			
			$b++;
		}


		$contacto .="</table>
		<span class=''>Contactos ". ($b -1)."<span>
					</div>";
		return $contacto;	
	}
	/*termina la función */


}/*Termina el helper*/
 