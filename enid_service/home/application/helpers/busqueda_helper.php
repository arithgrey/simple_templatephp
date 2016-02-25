<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){


function bloque_completo_def($data){

	$block ="";	
	$block .="<section>";	
	$block .= "<header><h1>Eventos del día</h1></header>";

	foreach ($data as $row ) {

		$nombre_evento = $row["nombre_evento"];	
		$edicion = $row["edicion"];	
		$fecha_inicio =  $row["fecha_inicio"];
		$fecha_termino =  $row["fecha_termino"];
		$descripcion =  $row["descripcion_evento"];
		$ubicacion =  $row["ubicacion"];
		$url_social =  $row["url_social"];
		$url_social_youtube =  $row["url_social_youtube"];
		$breve_descripcion =  $row["breve_descripcion"];
		$slogan =  $row["eslogan"];
		$tipo =  $row["tipo"];


		$block.= '		
		<div class="panel-body">
			<article>
			<h2>Noticia 1</h2>
		       	<div class="row">
		           	<div class="col-md-2">
		               	<div class="blog-img-sm">
		                   	<img src="" alt="">
		               	</div>
		           	</div>
		           	<div class="col-md-10">
		           		<header>
			               	<h1 class="">
			                	<a href="#">'. $nombre_evento .'
			                	</a>
			               	</h1>
		               	</header>
		               	<p class=" auth-row">
		                      	<a href="#">Anthony Jones
		                   	</a>   |   '. validate_fechas_evento($fecha_inicio , $fecha_termino) .'   | 
		                   	<a href="#">5 Comments
		                   	</a>
		               	</p>
		               	<p>'. $descripcion .'
		               	</p>
		               	<a href="#" class="more">
		                    Continue Reading
		               	</a>
		           	</div>
		       	</div>
		    </article>                
		</div>';

	}	


	$block .=  "</section>";
	return $block;
	/**/
}

/*Creamos el bloque */
function bloque_completo($data){

	$block ="";	
	$block .="<section>";	
	$block .= "<header><h1>Eventos encontrados</h1></header>";

	foreach ($data["eventos"] as $row ) {

		$nombre_evento = $row["nombre_evento"];	
		$edicion = $row["edicion"];	
		$fecha_inicio =  $row["fecha_inicio"];
		$fecha_termino =  $row["fecha_termino"];
		$descripcion =  $row["descripcion_evento"];
		$ubicacion =  $row["ubicacion"];
		$url_social =  $row["url_social"];
		$url_social_youtube =  $row["url_social_youtube"];
		$breve_descripcion =  $row["breve_descripcion"];
		$slogan =  $row["eslogan"];
		$tipo =  $row["tipo"];
		
		$block.= '		
		<div class="panel-body">
			<article>
			<h2>Noticia 1</h2>
		       	<div class="row">
		           	<div class="col-md-2">
		               	<div class="blog-img-sm">
		                   	<img src="" alt="">
		               	</div>
		           	</div>
		           	<div class="col-md-10">
		           		<header>
			               	<h1 class="">
			                	<a href="#">'. $nombre_evento .'
			                	</a>
			               	</h1>
		               	</header>
		               	<p class=" auth-row">
		                      	<a href="#">Anthony Jones
		                   	</a>   |   '. validate_fechas_evento($fecha_inicio , $fecha_termino) .'   | 
		                   	<a href="#">5 Comments
		                   	</a>
		               	</p>
		               	<p>'. $descripcion .'
		               	</p>
		               	<a href="#" class="more">
		                    Continue Reading
		               	</a>
		           	</div>
		       	</div>
		    </article>                
		</div>';

	}	


	$block .=  "</section>";
	$response["block"] =$block;
	$response["query"] = $data["query"];
	return $response;
	/**/
}
/**/
function validate_fechas_evento($inicio , $fin ){	

	$text_fecha =  "";  
	if ($inicio ==  $fin ) {
		$text_fecha =  $inicio;  		
	}else{
		$text_fecha = "Del " . $inicio . " al " . $fin ;
	}
	return $text_fecha;
}
/**/
}/*Termina el helper*/
 