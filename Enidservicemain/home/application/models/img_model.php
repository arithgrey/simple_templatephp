<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class img_model extends CI_Model {
  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }
  
  function insert_principal_escenario($data , $id_usuario , $id_empresa  ){

    
    $query_insert ="INSERT INTO imagen(nombre , type , size , base_path , base_path_img , id_usuario  ,  id_empresa) VALUES ('". $data["name_img"] ."' , '". $data["type"] ."' , '". $data["size"] ."' , '". $data["base_path"] ."' ,  '". $data["base_path_img"] ."', '". $id_usuario."' , '".$id_empresa."' )";

  
    $result =false;
    if ($this->db->query($query_insert)) {
        
        $id_imagen = $this->db->insert_id();              
        $id_escenario =  $data["id_escenario"];

        $query_insert ="INSERT INTO  imagen_escenario(id_imagen , id_escenario,  seccion ) VALUES
         ('". $id_imagen."' , '". $id_escenario ."' , 'principal' )";    

        $result =  $this->db->query($query_insert);
    }  

    
    return $result;
  }
  
  
/*Termina modelo */
}
