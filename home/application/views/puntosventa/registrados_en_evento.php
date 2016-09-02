<div class='info_puntos_venta_cargados'>
</div>
<?php		
	$puntos_venta_resum = ""; 
		foreach ($puntos_venta as $row){			
	
			$idpunto_venta  = $row["idpunto_venta"];
			

			/*<iframe src="http://www.w3schools.com"></iframe> */


		/*
		$razon_social = $row["razon_social"]; 						
		$nombre_imagen  = $row["nombre_imagen"]; 			
		$title = $razon_social . " asociado al evento"; 
		$img =  create_icon_img($row , "punto-venta-icon", $idpunto_venta); 		
		$icon .="
				<div>					
					<div title='$title' data-toggle='modal' data-target='#delete-punto-venta-modal'>
						<i class='fa fa-times delete-punto-venta-icon' id='". $idpunto_venta  ."'>
						</i>
					</div>						
				</div>								
				<div id='". $idpunto_venta ."' class='img-horizontal'>
					<div class='col-lg-9 col-md-9 col-sm-12 '>					
					" . $img ."
					</div>					
				</div>";  				
		*/					
		}	

	

?>


<style type="text/css">
	
	/*
	.punto-venta-icon{
		display: block;
	    font-size: 9pt;
	    font-weight: 700;
	    height: 30px;
	    left: 0;
	    line-height: 30px;
	    overflow: hidden;
	    position: absolute;
	    text-align: center;
	    top: 0;
	    width: 100%;
	} 
	*/  
	
	.delete-punto-venta-icon {
	    -moz-transition:all ease .8s; /*Aplicamos una ligera transición*/
	    -webkit-transition:all ease .8s ;
	    background: black;
	    color: white;
	    filter: alpha(opacity=0); /*Opacidad Para IE */
	    left: 10%; /*Desplazamos a partir de la esquina superior izquierda*/
	    opacity: 0; /*Inicialmente transparente */
	    padding: 5px;
	    position: absolute; /*Info sobre la imagen*/
	    top: 5%;
	    transition:all ease .8s;
	    zoom: 1;
    }
    .img-horizontal:hover .delete-punto-venta-icon{
	    filter: alpha(opacity=80);
	    opacity: .8; /*Al hacer hover sobre la caja hacemos visible los datos*/
    }
    .delete-punto-venta-icon:hover{
    	cursor: pointer;
    }
</style>
					