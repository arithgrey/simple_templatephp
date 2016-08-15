<?php defined('BASEPATH') OR exit('No direct script access allowed');
class empresamodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }  
  function get_solicitud_ciudad_cliente($param){    
    
    $where =  "";
    if ($param["public"] ==  1) {
        $where =  "WHERE  status_solicitud != 2 ";
    }    
    $_num =  get_random();
    $this->create_tmps_solicitudes_artistas($_num , 0 , $param );
    $query_get =  "select  
                    s.* ,  
                    a.nombre_artista  
                    FROM tmp_solicitud_artista_$_num  s  
                    INNER JOIN artista a   
                    ON  s.id_artista  =  a.idartista ".  $where   ." order by  s.solicitudes  desc ";
   
    $result =  $this->db->query($query_get);
    $data_complete =  $result->result_array();
    $this->create_tmps_solicitudes_artistas($_num , 1 , $param );    
    return $data_complete;
  }
  /**/
  function create_tmps_solicitudes_artistas($_num , $flag , $param){
      $query_drop =  "DROP TABLE IF exists tmp_solicitud_artista_".$_num; 
      $db_response =  $this->db->query($query_drop);

      if ($flag ==  0 ) {            
          $query_procedure =  "CREATE TABLE  tmp_solicitud_artista_".$_num . "  AS  
                                select  
                                id_artista ,  
                                sum(case when  id_artista is not null  then 1 else  0 end )solicitudes  ,
                                status status_solicitud
                                from solicitud_artista_org 
                                where 
                                id_empresa = '".$param["empresa"]."'
                                and date(fecha_registro) 
                                BETWEEN  DATE_ADD(CURRENT_DATE() , INTERVAL -1 MONTH ) AND CURRENT_DATE()
                                GROUP BY  id_artista LIMIT 50";        
          $db_response =  $this->db->query($query_procedure);
      }
      return $db_response;
  }
  /**/
  /**/
  function experienciaq($param){    
    $q = $param["q"]; 
    $val =  $param["val"];
    $query_update =  "UPDATE empresa_experiencia  SET $q = '".$val ."' WHERE idexperiencia =  '".$param["id_experiencia"]."' ";  
    return   $this->db->query($query_update);  
  }
  /**/  
  function get_iconos_sociales($param){

    /**/
      $id_empresa =  $param["id_empresa"];
      $_num = $this->contruye_experiencia_iconos($id_empresa ,  0 ); 
      /*Aplicamos query*/
      $query_get="select * from   tmp_img_exp_1_$_num 
      UNION ALL 
      select * from   tmp_img_exp_2_$_num 
      UNION ALL 
      select * from   tmp_img_exp_7_$_num";
      $result = $this->db->query($query_get);
      $data_complete = $result->result_array();
      /*Borramos las tablas*/
    $this->contruye_experiencia_iconos($id_empresa ,  1, $_num ); 
    return $data_complete; 
  }
  /**/
  function contruye_experiencia_iconos($id_empresa , $f = 0 , $_num = 0 ){

      if($_num == 0 ) {
        $_num = mt_rand();       
      }    
      $query_procedure ="CALL expreriencia_iconos($id_empresa , $_num  , $f);";    
      $this->db->query($query_procedure);
      return $_num;
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
      
      $query_insert =  "INSERT INTO solicitud_artista_org(id_artista , id_empresa , id_Country ) VALUES('". $id_artista  ."' ,  '". $id_empresa ."' , '". $id_ciudad  ."'  )"; 
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
function get_empresa($id_empresa ){
  $query_get ="select *  from empresa  e where e.idempresa  =  '". $id_empresa."'  ";
  $result=  $this->db->query($query_get);
  return $result->result_array();  
}
/**/
function get_empresa_by_id($id_empresa){

  $query_get ="select  e.* , c.*,  i.*  from empresa e 
              inner join  countries c  
              on e.idCountry  =  c.idCountry  
              left outer join  imagen_empresa  ie 
              on ie.id_empresa  = '". $id_empresa ."'  
              left outer join
              imagen i 
              on i.idimagen =  ie.id_imagen  and type ='3'
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

  

  $nombre_cliente = "";  
  $id_empresa =  $param["emp"]; 
  $nombre_cliente = $param["nombre_cliente"];
  $email_cliente =  $param["email_cliente"];
  $tel_cliente = $param["tel_cliente"]; 
  $calificacion =  $param["calificacion_cliente"]; 
  $descripcion = $param["descripcion"];
  


  $query_insert ="INSERT INTO  empresa_experiencia(
                  idempresa,                        
                  calificacion,
                  nombre,
                  mail,          
                  tel, 
                  descripcion) 
          VALUES( 

              '$id_empresa' , 
              '$calificacion',
             '". $nombre_cliente."'  ,               
             '".$email_cliente."' ,               
             '".$tel_cliente ."' ,             
             '".$descripcion."'  )";
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
/**/
function get_historias_clientes($param){  


  /*
    $id_empresa =  $param["empresa"];  
    $_num =  $this->dinamic_data_comentarios($id_empresa , 0  , 0  );
    
    
    $query_get = "select  
                  a.* , 
                  b.nombre_contenido , 
                  b.descripcion_contenido , 
                  b.status , 
                  b.type  
                  from  tmp_empresa_experiencia_$_num   a  
                  left outer join tmp_contenido_$_num  
                  b on  a.idcontenido =  b.idcontenido order by  fecha_registro desc"; 

    $result =  $this->db->query($query_get);
    $data_complete =  $result->result_array();
    
    $_num =  $this->dinamic_data_comentarios($id_empresa , 1  , $_num);    
    return $data_complete;
    */


}
/**/
function dinamic_data_comentarios($id_empresa , $f = 0 , $_num = 0   ){

    if($_num == 0 ) {
      $_num = mt_rand();       
    }    
    $query_procedure ="call experiencia_publico( $id_empresa , $_num  , $f );";    
    $this->db->query($query_procedure);
    return $_num;
}
/**/
function get_experiencias($param){
  
  

  $_num =  get_random(); 
  $f =  $this->create_tmp_experiencias(0 , $_num, $param["id_empresa"] ,  $param);
  $query_get =  "SELECT * FROM  tmp_experiencias_e_$_num";
  $result =  $this->db->query($query_get);
  $data["experiencias"] =  $result->result_array();
  $this->create_tmp_experiencias(1 , $_num, $param["id_empresa"] ,  $param);
  return $data;
}
function create_tmp_experiencias($flag , $_num ,  $id_empresa ,  $param){

  $tramo =  " AND  status = 1 ";
  if ($param["in_session"] ==  1 && $param["config"] ==  1  ) {
    $tramo =  "";
  }



  $query_drop ="DROP TABLE IF exists tmp_experiencias_e_$_num";
  $this->db->query($query_drop);
  $query_create  = "";
  $db_response =0;   
  
  if ($flag == 0 ){      
      $query_create = "CREATE TABLE tmp_experiencias_e_$_num AS 
                      SELECT * FROM  empresa_experiencia WHERE  idempresa = '$id_empresa' ". $tramo  ."
                      ORDER BY  fecha_registro DESC LIMIT 50";
      $db_response =  $this->db->query($query_create);

  } 
  return $db_response;  
}
/**/

function get_actividad($param){
  $_num =  get_random();
  $this->create_tmps_actividad_e($_num ,  0 , $param);
  $query_get =  "SELECT * FROM log_e_$_num ORDER BY  fecha_registro desc"; 
  $result =  $this->db->query($query_get);
  $data_complete =  $result ->result_array();
  $this->create_tmps_actividad_e($_num ,  1 , $param);
  return $data_complete;
}
/**/
function create_tmps_actividad_e($_num,  $flag , $param ){
    $f = "";
    if ($param["tipo_actividad"] ==  "eventos"){

      $f =  $this->create_tmp_user_e($_num,  $flag , $param); 
      $f =  $this->create_tmp_movimientos_users( $_num , $flag  ,  $param );
      $f = $this->create_tmp_logs( $_num , $flag  ,  $param );   
    }else{

      $f =  $this->create_tmp_user_e($_num,  $flag , $param); 
      $f =  $this->create_tmp_movimientos_users( $_num , $flag  ,  $param );
      $f = $this->create_tmp_logs( $_num , $flag  ,  $param );   
    }

   
  return $f;
}
/*creamos tmp para usuarios*/
function create_tmp_user_e($_num,  $flag , $param){
  $query_drop =  "DROP TABLE IF exists usuario_emp_e_$_num";
  $db_response =  $this->db->query($query_drop);
  $id_empresa =  $param["id_empresa"];  
    
  if ($flag == 0 ){
      $query_create = "CREATE TABLE  
                      usuario_emp_e_$_num AS 
                      SELECT
                      idusuario , 
                      nombre  ,
                      email,
                      puesto,
                      cargo
                      FROM  usuario 
                      WHERE idempresa = $id_empresa 
                      and tipo =1 "; 
      $db_response = $this->db->query($query_create);                

    }
  return $db_response;  
    
}
/**/
function create_tmp_movimientos_users( $_num , $flag  ,  $param ){
  
  $query_drop =  "DROP TABLE IF exists usuario_log_complete_e_$_num";
  $db_response =  $this->db->query($query_drop);

  $query_drop =  "DROP TABLE IF exists usuario_log_e_$_num";
  $db_response =  $this->db->query($query_drop);
  
  if ($flag == 0 ) {

    /*operamos sobre la tabla completa*/
    $query_create =  "CREATE TABLE  usuario_log_complete_e_$_num AS 
                      SELECT *  FROM  usuario_log l WHERE  DATE(fecha_registro) 
                      BETWEEN  DATE_ADD(CURRENT_DATE() , INTERVAL -15 DAY )  
                      AND  CURRENT_DATE()"; 
    
    $this->db->query($query_create);                  
            /*Operamos sobre lo del periodo*/
            $query_create =  "CREATE TABLE  
                              usuario_log_e_$_num AS 
                              SELECT *  FROM  usuario_log_complete_e_$_num l 
                              INNER JOIN usuario_emp_e_$_num u 
                              ON l.id_usuario =  u.idusuario"; 
              $db_response = $this->db->query($query_create);                
  }
  
  return $db_response;  
}
/**/
function create_tmp_logs( $_num , $flag  ,  $param ){
  
  $query_drop =  "DROP TABLE IF exists log_complete_e_$_num";
  $db_response =  $this->db->query($query_drop);  
  $query_drop =  "DROP TABLE IF exists log_e_$_num";
  $db_response =  $this->db->query($query_drop);


  if ($flag == 0 ){    
    $query_create =  "CREATE TABLE log_complete_e_$_num AS 
                      SELECT
                      id_log id_logf,
                      modulo ,
                      tipo_evento  ,
                      descripcion,
                      id_modulo
                      FROM log 
                      WHERE  DATE(fecha_registro) 
                      BETWEEN  DATE_ADD(CURRENT_DATE() , INTERVAL -15 DAY )  
                      AND  CURRENT_DATE()";
    $db_response = $this->db->query($query_create);                

    /**/
    $query_create =  "CREATE TABLE log_e_$_num AS 
    SELECT  u.* , 
            l.modulo,             
            l.tipo_evento,
            l.descripcion,
            l.id_modulo  
            FROM  usuario_log_e_$_num u 
    INNER JOIN log_complete_e_$_num l
    ON 
    u.id_log = l.id_logf";

    $db_response = $this->db->query($query_create);                    
  }
  return $db_response;
}



/**/
/*Termina modelo */
}























