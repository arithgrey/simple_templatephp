<?php

	$d_class = ""; 
	if (count($solicitudes) > 6 ) {
		$d_class =  "class='enid-scroll-service'"; 
	}
	$list =  "";
	$lugar = 1; 	
	$x= 6; 
	foreach ($solicitudes as $row){
		
		$id_artista =  $row["id_artista"];
		$solicitudes =  $row["solicitudes"];
		$nombre_artista =  $row["nombre_artista"];

		$list .=  "<tr>";
		$d_h =  "<h".$x.">";
		$d_h2 =  "</h".$x.">";
		$artista =  $d_h . $nombre_artista . $d_h2;

		$list .=  get_td($artista );
		$list .=  get_td( $solicitudes , "class='type-info' ");
	
		$list .=  "</tr>";
		
					

	}
	$list .=  "";
?>


<h2 class='title-enid-resum'>
	Artistas que más nos han solicitado
</h2>
<div>	
	<div <?=$d_class?>>
		<div class="bs-example bs-example-type" data-example-id="simple-headings"> 
			<table class="table"> 					
				<tbody> 
					<?=$list?>
				</tbody> 
			</table> 
		</div>
	</div>	
</div>	
<style type="text/css">
.title-artistas-solicitado{
	font-weight: bold;
	text-align: center;	
}
.title-artistas-solicitados{
	background: #293238;
	font-size: 2em;
	padding: 10px;
	color: white;
}
.li-ranking{
	width: 100%;	
}.enid-scroll-service{
	height: 500px;
	overflow-y: scroll;
}
.lb-solicitudes{
	color: #23516B;
	font-size: 2.5em;
	font-weight: bold;
	text-align: right;
}
</style>
