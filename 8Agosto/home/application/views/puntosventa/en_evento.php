<?php
	$filtro =  "<div class='contenedor_busqueda'>"; 
	foreach ($puntos_venta_filtro as $row){	          
		
		$img =  create_icon_img($row , "punto-venta-evento-result" , $row["idpunto_venta"] );

		
	    $filtro .= "<li title='Click para cargar al evento.' class='enid-filtro-busqueda row' id='". $row["idpunto_venta"] ."'>";                                  	          
	    
	    $filtro .=  "<div class='col-lg-4 col-md-4  col-sm-4 '>"; 
			$filtro .=  "<div class='contenedor_img_punto_venta'>"; 
	        $filtro .=  $img; 
			$filtro .=  "</div>"; 	 
		$filtro .=  "</div>";       

		$filtro .=  "<div class='col-lg-6 col-md-6  col-sm-6  '>"; 
		    $filtro .=  "<div class='punto-venta-evento-result text_pv'  id='". $row["idpunto_venta"]."'>";          
		    $filtro .=   $row["razon_social"];                     
	        $filtro .=  "</div>";        
	    $filtro .= "</div>"; 
	        
	    $filtro .=  "<div class='col-lg-2 col-md-2  col-sm-2'>";     
		    $filtro .= "<span class='punto-venta-evento-result  agregar_pv '  id='". $row["idpunto_venta"]."' > 
		    				Agregar 
		    			</span> ";
		$filtro .=  "</div>";     			
	    $filtro .=  "</li>
	    			
	    			"; 
	}
	$filtro .=  "</div>"; 	
	$msj_user = count($puntos_venta_filtro) . " puntos de venta encontrados "; 	
	$msj_carga = "<a href = '".base_url('index.php/puntosventa/administrar/a/nuevo')."' class='btn_nnuevo'> Registra + </a>"; 		
?>

<div>	
	<div>
		<?=$filtro?>	    
	</div>	
	<br>	
	<span class='pull-left text-carga-pv row'>
		<?=$msj_user;?><?=$msj_carga;?>
	</span>

</div>


<style type="text/css">
.contenedor_img_punto_venta{
	width: 50%;
}.agregar_pv{
	font-size: .8em;
	background: #032935;
	color: white;
	
	border-radius: 1px;
	padding: 1px;
}.text_pv{
	font-size: .8em;
}.enid-filtro-busqueda{
	list-style:none !important;
}.text-carga-pv{
	background: rgb(61, 74, 80) none repeat scroll 0% 0%;
	padding: 4px;
	color: white;
	font-size: .8em;
}
.contenedor_busqueda{
	padding: 10px;
	border-radius: 1px;	
	background: #dbedf5 !important; 
}
</style>
