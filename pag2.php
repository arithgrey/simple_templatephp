<?php

	$titulo='@arithgrey 2';
	$titulo_pagina_h1 = 'pag 2';
?>
<?php
	include "cabecera.php";	
?>
<body>	
	<div class='wrapper' id='wrapper'>
	<?php
		include "header.php";
	?>
		<div id='content' class='content'>
			<h3>Este es el contenido</h3>
			<p onclick='getName()'>da click aquí para ver la función global</p>
			<a href="index.php"> ir a la página de Inicio</a>
		</div>
</body>
<?php
	include "footer.php";
?>
</div>