<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class empresamodel extends CI_Model {

function __construct(){

        parent::__construct();        
        $this->load->database();
}

  
/**/
function get_empresa_by_id($id_empresa){

  $query_get =" select * from empresa where idempresa ='". $id_empresa ."' ";

  $result=  $this->db->query($query_get);
  return $result->result_array();


}


/**/

function exist_company_byname( $nombreempresa ){

    $query_exist = "SELECT * FROM empresa WHERE nombreempresa = '".$nombreempresa."' ";     
    $result = $this->db->query($query_exist);                   
    $flag = 0;     
     foreach ($result->result_array() as  $row) {            
          $flag++;
      }     
    return $flag;


}/*Termina la función */




function recordempresawhitname( $nombreempresa ){


    $query_insert = "INSERT INTO empresa (nombreempresa) VALUES ('".$nombreempresa."' )";
    $tryrecord = $this->db->query($query_insert); 
    /*Si se registro*/
    if ( $tryrecord   ==  true ) {  
    $query_lastelemento  = "SELECT MAX(idempresa) AS idempresa FROM empresa";
    $resultlastelemento  = $this->db->query($query_lastelemento); 

        $ultimo = 0;
        /*Ultimo elemento ingresado */
        foreach ($resultlastelemento ->result_array() as $row) {
         
           $ultimo = $row["idempresa"];
        }
        
        return $ultimo;


    }else{
      return "Fallo algo al registrar empresa";
    }


    
}/*Termina la función */







/*Termina modelo */
}



