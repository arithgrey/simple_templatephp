<?php defined('BASEPATH') OR exit('No direct script access allowed');
class empresamodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  } 
  /**/
  function get_num_empresas(){
    $query_get =  "SELECT COUNT(0) num_empresas FROM empresa";  
    $result = $this->db->query($query_get);
    return $result ->result_array()[0]["num_empresas"];
  }
  /**/
  function consulta_user_prospecto($param){
    
    $query_get =  "SELECT COUNT(0)num_user FROM usuario WHERE email='".$param["mail"]."' LIMIT 1 ";
    $result = $this->db->query($query_get);
    $num_user =  $result->result_array()[0]["num_user"];
    return $num_user;
  }
  /**/
  function get_status_empresa($param){

    $query_get = "SELECT status FROM empresa WHERE idempresa =  '".$param["empresa"]."' ";
    $result=  $this->db->query($query_get); 
    $estatus_empresa =  $result->result_array()[0]["status"];


    $data["estatus_text"] =  "";
    $data["estatus_empresa"] =  0;

    switch ($estatus_empresa) {
      case 1:
          /*Contamos cuantos eventos tenemos registrados*/  

          $num_eventos = $this->empresa_eventos($param["empresa"]);
          if ($num_eventos < 3){
              $data["estatus_text"] = "Eventos registrados " . $num_eventos;
              $data["estatus_empresa"] = 1;            
          }else{

              $data["estatus_text"] = "Has alcanzado el máximo de de eventos a publicitar en la versión de prueba";
              $data["estatus_empresa"] = 0;          
              $data["propuesta_venta"] = 1;          

          }

          break;
      case 2:          
          
          /*2.-Cuando ya han pagado */  
          $data["estatus_text"] = "Usuario que ha reagistrado pago";
          $data["estatus_empresa"] =  1;

          break;    
        
      case 3:

          /*Cuando ya ha terminado su límite de pago*/
          $data["estatus_text"] = "Usuario que ha reagistrado pago pero la fecha ha terminado";
          $data["estatus_empresa"] =  1;

        break;

      case 4:

        $data["estatus_text"] = "Por siempre";
        $data["estatus_empresa"] =  1;
        
        break;

      case 5:
        $data["estatus_text"] = "Usuario bloqueado";
        $data["estatus_empresa"] =  0;
        
        return 0;
        break;

      default:        
        $data["estatus_text"] = "";
        $data["estatus_empresa"] =  0;
        break;
    }

    return $data;

  }
  /**/
  function empresa_eventos($id_empresa){

    $query_get =  "SELECT COUNT(0)num_eventos FROM evento WHERE idempresa = $id_empresa LIMIT  5";
    $result = $this->db->query($query_get);
    return $result->result_array()[0]["num_eventos"];
  }
  /**/

  /**/
  function insert_prospecto_enid($param){
    $query_insert =  "INSERT IGNORE INTO prospecto(correo) VALUES('". $param["mail"] ."')"; 
    return  $this->db->query($query_insert);  
  }
  /**/      
  function update_pais_empresa($param){
    $query_get =  "UPDATE empresa SET idCountry = '".$param["pais_empresa"]."' 
    WHERE idempresa  = '". $param["empresa"]."' limit 1 ";
    return  $this->db->query($query_get);

  }
  /**/
  function get_pais_empresa($param){

    $query_get =  "SELECT idCountry FROM empresa WHERE idempresa = '". $param["empresa"]."'  LIMIT 1";
    $result = $this->db->query($query_get);
    return $result->result_array();
  } 
  /**/
  function get_paises(){

      $query_get =  "select * from countries";
      $result =  $this->db->query($query_get);
      return $result->result_array();

  }

  /**/
  function create_account($param){

      $query_insert = "INSERT INTO empresa(nombreempresa , acepta_uso_privacidad , text_uso_privacidad ) 
      VALUES ('".$param["org"]."' , '".$param["privacidad_condiciones"]."' , 'He leído y  acepto las condiciones de uso y privacidad para hacer uso del sistema Enid Service.' )";    
      $this->db->query($query_insert);
      $id_empresa  = $this->db->insert_id();              
      /**/
      $query_insert  = "INSERT INTO enidserv_eniddbbbb3.usuario(            
                            email,                    
                            idempresa,                                                                       
                            ultima_modificacion , 
                            password ) 
                        VALUES                         
                            ('". $param["mail"]."' ,                
                            '".$id_empresa  . "' ,                                                                 
                            CURRENT_TIMESTAMP()  , 
                            '". $param["pw"] ."'
                            )";
      $this->db->query($query_insert);
      $id_user  = $this->db->insert_id();   
      /**/           
      return $this->create_config_inicial($id_empresa , $id_user );
  }
  /**/
  function create_config_inicial($id_empresa , $id_user ){

    $query_inser ="INSERT INTO  usuario_perfil(idusuario, idperfil ) VALUES('". $id_user  ."' , '4' )";    
    $result = $this->db->query($query_inser);     
    return $result;
  }
  /**/
  function get_num_users($param){

    $query_get =  "SELECT COUNT(0)num  FROM usuario WHERE email = '".$param["mail"]."' LIMIT  1  ";  
    $result =  $this->db->query($query_get); 
    return $result->result_array()[0]["num"];
  }
  /**/
  function get_num_empresa_name($param){

    $query_get =  "SELECT COUNT(0)num FROM empresa WHERE  nombreempresa = '".$param["org"]."'  LIMIT  1 ";
    $result =  $this->db->query($query_get); 
    return $result->result_array()[0]["num"];
  }
  /**/
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
    

      $id_empresa =  $param["id_empresa"];
      $this->create_imgs_iconos(0 , $id_empresa);
      
      $query_get="SELECT * FROM   tmp_img_exp_1_$id_empresa 
                  UNION ALL 
                  select * from   tmp_img_exp_2_$id_empresa 
                  UNION ALL 
                  select * from   tmp_img_exp_7_$id_empresa";

      $result = $this->db->query($query_get);
      $data_complete = $result->result_array();  
      $this->create_imgs_iconos(1 , $id_empresa);
      return $data_complete; 
      
  }
  /**/
  function create_imgs_iconos($flag , $id_empresa){


    $posibles_tables = array( 1 , 2 , 7);
    $msj_client =  ""; 
    for ($x=0; $x <count($posibles_tables); $x++) {       
      $query_procedure =  "DROP table IF exists tmp_img_exp_".$posibles_tables[$x]."_".$id_empresa; 
      $msj_client .= $this->db->query($query_procedure);
  
    }

    if ($flag == 0 ){
    
      
      
      for ($x=0; $x <count($posibles_tables); $x++) {       
        $query_create =  "CREATE TABLE  tmp_img_exp_".$posibles_tables[$x]."_".$id_empresa." AS  
            SELECT * FROM imagen WHERE id_empresa =  '".$id_empresa ."'
            AND DATE(fecha_registro) BETWEEN DATE_ADD(CURRENT_DATE(), INTERVAL - 1 MONTH) AND CURRENT_DATE() AND 
            type = '".$posibles_tables[$x]."'
            ORDER BY fecha_registro DESC LIMIT 4";

          $msj_client .= $this->db->query($query_create);
      }
    }
    return $msj_client;


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
                      WHERE idempresa = $id_empresa"; 
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