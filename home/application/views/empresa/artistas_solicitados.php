<?php

	$d_class = ""; 
	if (count($solicitudes) > 6 ) {
		$d_class =  "class='enid-scroll-service'"; 
	}
	$list =  "";
	$lugar = 1; 	
	$x= 1; 
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
		if ($x < 6) {
			$x ++;	
		}		
		
					

	}
	$list .=  "";
?>

<div class='row'>
	<div class="col-lg-4 col-md-4 col-sm-12">
	    <h2 class="c-head">
			Ahora los mejores artistas llegan a ti
	    </h2>
	    <h3 class="c-head-sub">
			1 Minuto para solicitarlo
	    </h3>
	    <p class="c-desc">
			Con <?=$param["nombre_empresa"]?> ahora puedes mejorar<br>
			tu experiencia en la escena musical, <br>
			personaliza tus eventos y haznos saver cuando <br>
			lo que tenemos que adaptar a tus necesidades.<br>
			auditivas.		
	    </p>
	    <a href="<?=base_url('index.php/emp/cuentanostuhistoria')?>/<?=$param["empresa"]?>" class="link-org">
		   	Califícanos.!
		</a>
		<br>
		<br>
	</div>

	<div class="col-lg-8 col-md-12 col-sm-12">
		<div class='row'>
			<div class="col-lg-12 col-md-12 col-sm-12 sc-ranking">
				<br>
				<label class='pull-right lb-solicitudes'>
					Artistas que más 
					<br>
					nos han solicitado.
				</label>
				<br>
			</div>
		</div>
		
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
