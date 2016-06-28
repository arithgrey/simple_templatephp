<?php defined('BASEPATH') OR exit('No direct script access allowed');
class img_model extends CI_Model {  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }



function get_comunidad_cliente($prm){

  return $prm["empresa"]; 
  
}
function carga_base_img($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }
      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
  }
/********************************sección de escenarios******************************************/ 
function get_imgs_escenario($id_escenario){


  $_num =  $this->carga_base_img(2 , 0);     
  $query_get = "select 
                i.* , 
                ie.*  
                from imagen_escenario  
                ie inner join  tmp_img_$_num  i  
                on  ie.id_imagen  =  i.idimagen   
                where ie.id_escenario =  '". $id_escenario."' "; 

  $result = $this->db->query($query_get);   
  $data_complete =    $result->result_array();
  $_num =  $this->carga_base_img(2 , 1, $_num);     
  return $data_complete;

}

/*************************************************************************************/  
  function delete_logo_empresa($id_usuario , $id_empresa ){

    $query_exist=  "select id_imagen from imagen_empresa where id_empresa = '". $id_empresa ."' ";  
    $result_exist =  $this->db->query($query_exist);    
    $id_imagen =  $result_exist->result_array()[0]["id_imagen"];
    $this->delete_imagen_server_db($id_imagen);
    return "1";
    


  }
  /**/

  function delete_imagen_server_db($id_imagen){
   
    $query_get = "select * from  imagen where idimagen =  '". $id_imagen ."' "; 
    $result_imagen =  $this->db->query($query_get);    
    $data =  $result_imagen->result_array()[0];
    $img =  $data["base_path"] . $data["nombre_imagen"]; 
    unlink($img);
    
  }



  /**/

  /**/



















  /**/
function insert_principal_escenario($data , $id_usuario , $id_empresa  ){
  
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 2  );    
    $id_escenario =  $data["dinamic_img_escenario"];
    $query_insert ="INSERT INTO  imagen_escenario(id_imagen , id_escenario,  seccion ) VALUES('". $id_imagen."' , '". $id_escenario ."' , 'principal' )";    
    return $this->db->query($query_insert);
}
/**/
function insert_imagen_evento($data , $id_usuario , $id_empresa ){

    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 1 );        
    $id_evento =  $data["evento_portada"];
    $query_insert ="INSERT INTO  imagen_evento(id_imagen , id_evento  ) VALUES('". $id_imagen."' , '". $id_evento ."'  )";    
    return $this->db->query($query_insert);        
}





function insert_principal_escenario_artista($data , $id_usuario , $id_empresa ){        

    $id_artista = $data["dinamic_artista_img"]; 
    //$id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 7 );    
    $query_exist = "select * from imagen_artista where id_artista= '". $id_artista . "' limit 1";
    

    $e =   $this->consulta_existencia($query_exist);
    if ($e["num_rows"] > 0 ){
        $this->pre_delete_img($e , "imagen_artista");          
    }

  $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 7 );  
  $dinamic_query ="INSERT INTO  imagen_artista(id_imagen , id_artista  ) VALUES('". $id_imagen."' , '". $id_artista  ."' )";          
  return $this->db->query($dinamic_query);          

}  
  /**/



function insert_acceso($data , $id_usuario , $id_empresa ){

    $id_acceso = $data["dinamic_acceso_img"];
    $query_exist="select  * from imagen_acceso where id_acceso ='". $id_acceso ."' ";
    $e =   $this->consulta_existencia($query_exist);
    if ($e["num_rows"] > 0 ){
        $this->pre_delete_img($e , "imagen_acceso");          
    }
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 5 );  
    $dinamic_query ="INSERT INTO  imagen_acceso(id_imagen , id_acceso  ) VALUES('". $id_imagen."' , '". $id_acceso  ."' )";          
    return $this->db->query($dinamic_query);          
}
/**/
function insert_img_user_perfil($data, $id_usuario , $id_empresa ){

  $id_user_org = $data["dinamic_user"];
  $query_exist=  "select * from imagen_usuario where idusuario = '".$id_user_org."' limit 1";  
  $e =   $this->consulta_existencia($query_exist);
    if ($e["num_rows"] > 0 ){
        $this->pre_delete_img($e , "imagen_usuario");          
    }

  $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 8 );  
  $dinamic_query ="INSERT INTO  imagen_usuario(idimagen , idusuario  ) VALUES('". $id_imagen."' , '". $id_user_org."' )";          
  return $this->db->query($dinamic_query);          

}
/**/
function insert_logo_empresa($data, $id_usuario , $id_empresa ){

    /*consulta si existe*/    
    $query_exist=  "select * from imagen_empresa where id_empresa = '".$id_empresa."' limit 1";  
    $e =   $this->consulta_existencia($query_exist);
    if ($e["num_rows"] > 0 ){
        $this->pre_delete_img($e , "imagen_empresa");          
    }

    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa , 3 );  
    $dinamic_query ="INSERT INTO  imagen_empresa(id_imagen , id_empresa  ) VALUES('". $id_imagen."' , '". $id_empresa ."' )";          
    return $this->db->query($dinamic_query);        
}
/**/
function insert_contacto($data , $id_usuario , $id_empresa ){

    $id_contacto = $data["dinamic_contacto"];
    $query_exist="select  * from imagen_contacto where id_contacto ='". $id_contacto ."' ";    
    $e =   $this->consulta_existencia($query_exist);
    if ($e["num_rows"] > 0 ){
        $this->pre_delete_img($e , "imagen_contacto");          
    }
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa ,6 );  
    $dinamic_query ="INSERT INTO  imagen_contacto(id_imagen , id_contacto  ) VALUES('". $id_imagen."' , '". $id_contacto ."' )";          
    return $this->db->query($dinamic_query);    
    
  }  
  /**/
  function consulta_existencia($sql){    
      $result_exist =  $this->db->query($sql);       
      $data["result_data"] = $result_exist->result_array();
      $data["num_rows"] = $result_exist->num_rows();
      return $data; 
  }
  /**/
  function insert_punto_venta($data , $id_usuario , $id_empresa ){

    $id_punto_venta = $data["d_punto_venta"];  
    $query_exist = "select * from imagen_punto_venta where idpunto_venta= '". $id_punto_venta . "' ";
    $e =   $this->consulta_existencia($query_exist);
    $sql_pv = "";
    $sql_img = ""; 
    if ($e["num_rows"] > 0 ){
        $this->pre_delete_img($e , "imagen_punto_venta");          
    }
    $id_imagen = $this->insert_img($data , $id_usuario , $id_empresa  , 4 );            
    $dinamic_query ="INSERT INTO  imagen_punto_venta(id_imagen , idpunto_venta  ) VALUES('". $id_imagen."' , '". $id_punto_venta ."' )";    
    return $this->db->query($dinamic_query);  
  }
  /**/
  function pre_delete_img($e , $campo ){
    $sql_pv = "";
    $sql_img =""; 
    foreach ($e["result_data"] as $row ){   
      $id_imagen  =  $row["id_imagen"];
      $sql_pv .=  "DELETE FROM $campo  WHERE id_imagen = '".$id_imagen."' limit 1";
      $sql_img =  "DELETE FROM imagen WHERE idimagen = '".$id_imagen."' limit  1"; 
    }            
    $this->db->query($sql_pv);
    $this->db->query($sql_img);    
  }
  /**/
  function insert_img($data , $id_usuario , $id_empresa , $type=0  ){    
           $query_insert ="INSERT 
                            INTO 
                            imagen(
                              nombre_imagen , 
                              type ,                       
                              id_usuario  ,  
                              id_empresa, 
                              img, 
                              extension
                            ) VALUES 
                            ('". $data["nombreArchivo"] ."' , 
                            ". $type ." ,                       
                            '". $id_usuario."' , 
                            '".$id_empresa."' ,
                            '". $data["imagenBinaria"]."' ,
                            '". $data["extension"]."' 
                            )";    

     $result =  $this->db->query($query_insert);
     return $this->db->insert_id();              
  }  
/*Termina modelo */
}