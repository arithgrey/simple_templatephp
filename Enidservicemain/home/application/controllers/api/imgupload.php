<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';
class Imgupload extends REST_Controller{
      
    function __construct() {
        parent::__construct();
        
    }

   
    function upload_im_in_event_get(){


        //$ds = "/";  
        $ds = "";  

 
        $storeFolder = 'uploads';   
        $targetPath = base_url() . $ds. $storeFolder . $ds;  
        if (!empty($_FILES)) {
         
            $tempFile = $_FILES['file']['tmp_name'];         
            //$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  
            $targetPath = base_url() . $ds. $storeFolder . $ds;  
            //$targetFile =  $targetPath. $_FILES['file']['name'];  
            //move_uploaded_file($tempFile , $targetFile); //6
        
        }





        $this->response( $targetPath );


    }


}
?>






