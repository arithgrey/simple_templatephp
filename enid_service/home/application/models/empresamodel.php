<?php defined('BASEPATH') OR exit('No direct script access allowed');
class empresamodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }  
  function get_empresa(){
      
      $query_get = ""; 

  }
  /**/
  function get_generos_musicales_empresa($id_empresa){

    $query_get ="SELECT COUNT(0) total FROM  empresa_genero_musical WHERE id_empresa = '". $id_empresa ."' LIMIT 100"; 
    $result =  $this->db->query($query_get);
    $data =  $result->result_array()[0];
    return $data["total"];
  }  
  function get_eventos_publicados($id_empresa){    
    $query_get = "SELECT count(0) total  FROM evento WHERE idempresa = '". $id_empresa ."' and  status != 0"; 
    $result =  $this->db->query($query_get);
    $data =  $result->result_array()[0];
    return $data["total"];
  }
  /**/
  function update_descripcion_objeto_permitido($param){

    $query_update = "update objetopermitido set descripcion = '".$param["descripcion-obj"] ."' where idobjetopermitido = '".$param["objeto_permitido"]."'  ";
    return $this->db->query($query_update);
  }
  /**/
  function get_obj($param){

    $query_get ="SELECT
                * 
                FROM
                objetopermitido 
                WHERE 
                idobjetopermitido 
                = 
                '".$param["objeto"]."' ";
    
    $result = $this->db->query($query_get);
    return $result->result_array();
  }
  /***/
  function solicitud_ciudad_cliente($param){

          $query_get ="SELECT * FROM  artista WHERE nombre_artista  like  '%". $param["artista-solicitud"] ."%' ";                
          $result_artista  =  $this->db->query($query_get);
          $artista  =  $result_artista->result_array();
          $id_empresa =  $param["empresa"];       
          $id_ciudad  =  $param["ciudad"];
          
          if (count($artista) > 0 ){
              $id_artista =  $artista[0]["idartista"];  
                  return $this->create_solicitud_artista($id_artista ,  $id_empresa,  $id_ciudad );
                  
          }else{
          
              $query_insert ="INSERT INTO artista (nombre_artista) values ( '". $param["artista-solicitud"]   ."' )";
              $data[0] = $this->db->query($query_insert);
              $id_artista  = $this->db->insert_id();                     
            
                  return  $this->create_solicitud_artista($id_artista ,  $id_empresa ,  $id_ciudad );        
          }      
  }
  /**/
  function create_solicitud_artista($id_artista , $id_empresa , $id_ciudad  ){
      
      $query_insert =  "INSERT INTO solicitud_artista_org (id_artista , id_empresa , id_Country ) VALUES('". $id_artista  ."' ,  '". $id_empresa ."' , '". $id_ciudad  ."'  )"; 
      return  $this->db->query($query_insert);
  }



/**/  
function insert_incidencia_empresa($id_empresa , $id_usuario ,  $data ){

  $query_insert =  "";
  if ($data["otro"]!= null ) {
    
  $query_insert ="INSERT INTO  incidencia(          
                 descripcion_incidencia,                                   
                 usuario_notificado   , 
                 afectacion            ,
                 fecha_solicitud       ,
                 idtipo_incidencia     ,
                 idsub_tipo_incidencia
                )VALUES(

                  '". $data["descripcion"]  ."',
                  '". $data["usuario_reportado"]."' ,
                  '". $data["afectacion"] ."',
                  '". $data["fecha-reporte"]."', 
                  '". $data["tipo-incidencia"] ."', 
                  '". $data["otro"] ."'
                )";
    }else{

  $query_insert ="INSERT INTO  incidencia(          
                 descripcion_incidencia,                                   
                 usuario_notificado   , 
                 afectacion            ,
                 fecha_solicitud       ,
                 idtipo_incidencia     ,
                 idsub_tipo_incidencia
                )VALUES(

                  '". $data["descripcion"]  ."',
                  '". $data["usuario_reportado"]."' ,
                  '". $data["afectacion"] ."',
                  '". $data["fecha-reporte"]."', 
                  '". $data["tipo-incidencia"] ."', 
                  '". $data["sub-tipo"] ."'
                )";


    }
    return $this->db->query( $query_insert);
                

      
}

/**/
function get_reportados($id_empresa){
  $query_get =  "select * from usuario where idempresa = '". $id_empresa . "' ";
  $result=  $this->db->query($query_get);             
  return $result->result_array();
}

/**/

function get_sub_tipo_incidencia($id_empresa , $data ){

  $query_get =  "select * from sub_tipo_incidencia where idtipo_incidencia  = '". $data["tipo_incidencia"]  ."' ";
  $result=  $this->db->query($query_get);             
  return $result->result_array();
}
/**/
function get_tipos_incidencias($id_empresa){

  $query_get ="select * from empresa_tipo_incidencia eti inner join tipo_incidencia  
              t on eti.idtipo_incidencia =  t.idtipo_incidencia where eti.id_empresa =  '". $id_empresa."' ";
  $result=  $this->db->query($query_get);             
  return $result->result_array();
}

/**/

function get_contactos_empresanum($id_empresa){

    $query_get =  "select count(*)total from empresa_contacto where id_empresa = '". $id_empresa."' ";
    $result =  $this->db->query($query_get);
    return $result->result_array()[0]["total"];
}

/**/
function update_contacto_empresa($id_empresa , $param ){

  $query_exist ="select count(*)total  from  empresa_contacto where id_empresa = '". $id_empresa ."' and id_contacto = '". $param["contacto"] ."' ";
  $result = $this->db->query($query_exist);
  $result_exist = $result ->result_array()[0]["total"];
  $dinamic_query ="";  

  if ($result_exist >0 ) {
    $dinamic_query ="DELETE FROM empresa_contacto WHERE id_empresa = '". $id_empresa ."' and id_contacto = '". $param["contacto"] ."' ";
  }else{
    $dinamic_query = "INSERT INTO empresa_contacto VALUES('". $id_empresa ."' , '". $param["contacto"] ."')";
  }
  return $this->db->query($dinamic_query);
}



/**/
function get_contactos_empresa($id_empresa , $id_usuario ){

$query_get ="select c.* , 
empresa_contacto.id_contacto contactoemp , 
ic.* ,
i.* from contacto c left outer 
join  empresa_contacto 
on c.idcontacto =  empresa_contacto.id_contacto  and 
empresa_contacto.id_empresa = '". $id_empresa."'
left outer join imagen_contacto ic 
on ic.id_contacto = c.idcontacto
left outer join imagen i on
ic.id_imagen  =  i.idimagen
where idusuario=". $id_usuario;
    
$result = $this->db->query($query_get);
return $result->result_array();      



  
}  
/**/
function get_empresa_by_id($id_empresa){



  $query_get ="select  e.* , c.*,  i.*   from empresa e 
inner join  countries c  on e.idCountry  =  c.idCountry  
left outer join  imagen_empresa  ie 
on ie.id_empresa  = '". $id_empresa ."'  
left outer join
imagen i 
on i.idimagen =  ie.id_imagen 
where e.idempresa  =  '". $id_empresa."'  ";

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

function get_paices($id_empresa ){

  $query_get ="select c.* , e.nombreempresa  from  countries c left outer join empresa e on c.idCountry =  e.idCountry and  e.idempresa = '". $id_empresa ."' ";
  $result = $this->db->query($query_get);
  return $result ->result_array();
}
/**/

function update_country_empresa($id_empresa, $data){

  $query_update ="update empresa set idCountry = '". $data["country"]."' where idempresa ='".$id_empresa."'  "; 
  $result = $this->db->query($query_update);
  return $result;
  
}
/**/
function insert_experiencia($param){


  $query_insert ="INSERT INTO  contenido(descripcion_contenido , type ) VALUES('". $param["descripcion"]."', 7 )";
  $this->db->query($query_insert);
  $id_experiencia  = $this->db->insert_id();              


  $cliente_nombre = "";
  $email_cliente =  ""; 
  $tel_cliente = 0; 


  $cliente_nombre = $param["nombre_cliente"];
  $email_cliente =  $param["email_cliente"];
  $tel_cliente = $param["tel_cliente"]; 


  $query_insert ="INSERT INTO  empresa_experiencia VALUES( '". $param["emp"]  ."' ,  '". $id_experiencia ."'  , '". $param["calificacion"] ."' , '". $cliente_nombre."'  ,  '".$email_cliente."' ,  '".$tel_cliente ."'   )";
  return $this->db->query($query_insert);
}
/**/
function insert_solicidud_artista($param){
  return $param;
}
/**/
function get_cidades(){
    $query_get ="SELECT * FROM  countries";
    $result = $this->db->query($query_get);
    return $result->result_array();
}



/*Termina modelo */
}