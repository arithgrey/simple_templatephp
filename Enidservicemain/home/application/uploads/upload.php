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
     
}else {                                                           
    $result  = array();
 
    $files = scandir($carpeta_creada);                 //1
    if ( false!==$files ) {
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['name'] = $file;
                $obj['size'] = filesize($carpeta_creada.$ds.$file);
                $result[] = $obj;
            }
        }
    }     
    header('Content-type: text/json');              //3
    header('Content-type: application/json');
    echo json_encode($result);
}



?>     

    