<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class img_model extends CI_Model {
  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }
  
  function insert_principal_escenario($data , $id_usuario , $id_empresa  ){

   
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa  );    
    $id_escenario =  $data["id_escenario"];
    $query_insert ="INSERT INTO  imagen_escenario(id_imagen , id_escenario,  seccion ) VALUES('". $id_imagen."' , '". $id_escenario ."' , 'principal' )";    
    return $this->db->query($query_insert);
  }
  

  /**/
  function insert_contacto($data , $id_usuario , $id_empresa ){


    /*verificamos si existe antes */
    $id_contacto = $data["contacto"];
    $query_exist="select  * from imagen_contacto where id_contacto ='". $id_contacto ."' ";
    $result_exist =  $this->db->query($query_exist);   
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa  );            
    
    if ($result_exist->num_rows() > 0 ){

        $dinamic_query ="update imagen_contacto set  id_imagen= '". $id_imagen."'  WHERE  id_contacto= '". $id_contacto ."' ";    

    }else{

      
      $dinamic_query ="INSERT INTO  imagen_contacto(id_imagen , id_contacto  ) VALUES('". $id_imagen."' , '". $id_contacto ."' )";    
      

    }
    
    return $this->db->query($dinamic_query);



    
  }

  /**/
  
  function insert_acceso($data , $id_usuario , $id_empresa ){

    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa  );        
    $id_acceso = $data["acceso"];

    $query_exist="select  * from imagen_acceso where id_acceso ='". $id_acceso ."' ";
    $result_exist =  $this->db->query($query_exist);   
    
    if ($result_exist->num_rows() > 0 ){
      $dinamic_query ="UPDATE  imagen_acceso SET id_imagen = '". $id_imagen."'  WHERE id_acceso =  '". $id_acceso ."' ";    
    }else{

      $dinamic_query ="INSERT INTO  imagen_acceso(id_imagen , id_acceso ) VALUES('". $id_imagen."' , '". $id_acceso ."' )";    
    }
 
    return $this->db->query($dinamic_query);
   
  }
  /**/






  function insert_punto_venta($data , $id_usuario , $id_empresa ){

    $id_punto_venta = $data["punto_venta"];
    $query_exist = "select * from imagen_punto_venta where idpunto_venta= '". $id_punto_venta . "'";
    $result_exist =  $this->db->query($query_exist);   
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa  );        
    
    if ($result_exist->num_rows() > 0 ) {
     $dinamic_query ="UPDATE imagen_punto_venta SET id_imagen='".$id_imagen."' WHERE idpunto_venta ='". $id_punto_venta ."' ";    
        
    }else{
      $dinamic_query ="INSERT INTO  imagen_punto_venta(id_imagen , idpunto_venta  ) VALUES('". $id_imagen."' , '". $id_punto_venta ."' )";    
    }


    
    

    
    
    return $this->db->query($dinamic_query); 



  }


  
  function insert_img($data , $id_usuario , $id_empresa  ){
    
     $query_insert ="INSERT INTO imagen(nombre_imagen , type , size , base_path ,
      base_path_img , id_usuario  ,  id_empresa) VALUES ('". $data["name_img"] ."' , '". $data["type"] ."' , '". $data["size"] ."' , '". $data["base_path"] ."' ,  '". $data["base_path_img"] ."', '". $id_usuario."' , '".$id_empresa."' )";    
     $result =  $this->db->query($query_insert);
     return $this->db->insert_id();              
  }  
/*Termina modelo */
}
