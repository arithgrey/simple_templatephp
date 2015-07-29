<?php

$e = $_GET["e"];
$ds = "/";  
$storeFolder = 'uploads';   


$carpeta_creada = dirname( __FILE__ ). $ds. $storeFolder . "/".$e."/" ;

if (file_exists($carpeta_creada) == false ) {
	
	mkdir( $carpeta_creada  , 0775);	
}



if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];             
    $targetPath = $carpeta_creada;
    $targetFile =  $targetPath. $_FILES['file']['name'];  
    move_uploaded_file($tempFile , $targetFile); //6
     
}
?>     

    