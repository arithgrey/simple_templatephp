<?php

	$titulo='@arithgrey';
	$titulo_pagina_h1 = 'Home';
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

			<a href="pag2.php"> ir a la página dos</a>
		</div>
	
</body>
<?php
	include "footer.php";
?>
</div>