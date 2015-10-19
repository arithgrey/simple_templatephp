<?php
class Upload extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));      
    }

    function index(){


                $ds = "/";  
                 
                $storeFolder = 'uploads';   
                if (!empty($_FILES)) {
                     
                     
                    $tempFile = $_FILES['file']['tmp_name'];         
                    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  

                    
                    $targetFile =  $targetPath. $_FILES['file']['name'];  
                    move_uploaded_file($tempFile , $targetFile); //6
                     
                }


                
    }/*termina la funcion*/

}
?>