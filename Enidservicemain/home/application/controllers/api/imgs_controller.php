<?php		     
if (isset($_FILES["images"])){

	$base_path = $_GET["base_path"];			

	$b =0;
	$name ="";
	$type ="";
	$size = 0;

	foreach($_FILES['images']['error'] as $key => $error){
        if($error == UPLOAD_ERR_OK){


            

            $name = time(). ereg_replace( "([ ]+)", "", $_FILES['images']['name'][$key] );         	
            $type = $_FILES['images']['type'][$key];
            $size = $_FILES['images']['size'][$key];         	
         	if(move_uploaded_file( $_FILES['images']['tmp_name'][$key], $base_path . $name)){
         		$b++;
         	}
         	
        }
    }    

    $data = array(
	    "respuesta"    => $b,
	    "name_img"  => $name, 
	    "type" => $type,
	    "size" => $size, 

	);

    header('Content-type: application/json; charset=utf-8');
    
    echo json_encode($data);
    exit();
}


?>