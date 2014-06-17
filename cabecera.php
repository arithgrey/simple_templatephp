<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title> 
		<?php 

			if (isset($titulo)) {
				echo $titulo;
			}else{
				echo "Página sin tutulo";
			}
		?>
	</title>
	<link rel="stylesheet" type="text/css" href="global.css">
	<script type="text/javascript">
			function getName(){
				alert('get name:!!');
			}
	</script>
</head>
