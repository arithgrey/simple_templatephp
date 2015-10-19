<?php defined('BASEPATH') OR exit('No direct script access allowed');
class templmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function delete_contenido_evento($id_contenido , $id_evento ){

      $query_delete ="DELETE FROM evento_contenido WHERE idevento = '".$id_evento."' AND idcontenido = '".$id_contenido."'  ";
      return  $this->db->query($query_delete);
    }
    /*Lista los contenidos por tipo dentro del evento */
    function get_contenido_evento($id_evento , $type ){


      $query_get ="SELECT * FROM contenido AS c INNER JOIN evento_contenido  as ev
      ON c.idcontenido =  ev.idcontenido AND ev.idevento = '".$id_evento."'
      WHERE c.type ='".$type."' ";
      $result = $this->db->query($query_get);
      return $result->result_array();
    }
    /*Registramos nuevo template de un contenido a una seccion*/
    function record_contenido_evento($contenido , $evento ){

      if ($this->check_exist_evento_contenido($contenido , $evento )<1 ) {        
          
          $query_insert= "INSERT INTO evento_contenido VALUES( '".$evento."' , '".$contenido."'  )";
          return $this->db->query($query_insert);  

      }else{
        return 1;
      }  
    }
    /**/
    function check_exist_evento_contenido($contenido , $evento ){

        $query_get = "SELECT *  FROM evento_contenido WHERE idevento = '".$evento ."' AND  idcontenido= '".$contenido."'  ";
        $r= $this->db->query($query_get); 
        return $r->num_rows();

    }
    /*Template objetos permitidos */
    function get_templ_obj_permitidos($id_empresa){

      $query_get ="SELECT  o.idobjetopermitido , o.nombre , o.descripcion FROM  objetopermitido o 
                  LEFT OUTER  JOIN  empresa_objetopermitido as eo
                  ON o.idobjetopermitido = eo.idobjetopermitido
                  LEFT OUTER JOIN empresa  AS e 
                  ON eo.idempresa = e.idempresa
                  WHERE e.idempresa =  '".$id_empresa."' ";

      $result= $this->db->query($query_get);
      return $result->result_array();
    }


    /*Registra template contenido */
    function record_template_contenido($iduser , $tipo_templ , $titulo_contenido_tmpl , $descripcion_templ ){
    
      $id_plantilla= $this->record_template("Descripcion de eventos " , $iduser , $tipo_templ);    
      return $this->record_contenido_user($titulo_contenido_tmpl , $descripcion_templ  ,  $id_plantilla  );
    }    
    /*Elimina contenido */
    function delete_contenido($id_contenido){
      $query_delete ="DELETE FROM contenido WHERE idcontenido = '". $id_contenido ."' ";
      return $this->db->query($query_delete);

    }
    /*registra plantilla en caso de existir y si no la crea  y manda su id */
    function record_template($nombre_tmpl , $iduser , $tipo_templ){

       $check_exist = "SELECT * FROM plantilla WHERE nombre_platilla  = '".$nombre_tmpl."' AND idusuario  = '".$iduser."' AND idtipo_plantilla  =  '".$tipo_templ."'  "; 
       $result =$this->db->query($check_exist);
       if ($result ->num_rows() >0 ) {
            
            $flag=0;
            foreach ($result->result_array() as $row) {
                
                $flag =  $row["idplantilla"];
            }
            return $flag;

       }else{
          $query_insert="INSERT INTO plantilla(nombre_platilla,   idusuario ,   idtipo_plantilla)
          VALUES ('".$nombre_tmpl . "' , '". $iduser."' , '". $tipo_templ . "' )";
          $result = $this->db->query($query_insert);
          return $this->db->insert_id();     
       }      
        
    }/**/

    /*Registra siempre el contenido del usuario*/
    function record_contenido_user($nombre_contenido , $descripcion_contenido ,  $id_plantilla  ){

      $query_insert= "INSERT INTO contenido(nombre_contenido , descripcion_contenido , idplantilla)
       VALUES ( '".$nombre_contenido."' ,  '". $descripcion_contenido . "' , '". $id_plantilla ."')";
      return $this->db->query($query_insert);

    }



    /**/    
    function update_contenido_nombre_descripcion($titulo_contenido_tmpl , $descripcion , $plantilla ){
      
      $query_update ="UPDATE contenido SET nombre_contenido = '". $titulo_contenido_tmpl."'  , descripcion_contenido='". $descripcion."' WHERE idplantilla='".$plantilla."' ";

      return $this->db->query($query_update);
    } 
    /*Registra los templates */

    /**/
    function get_templates_contenido_user_type($id_user , $type){
      $query_get_templates_content ="SELECT  * FROM  contenido AS  c INNER JOIN  plantilla_contenido AS pc 
      ON    c.idcontenido = pc.idcontenido
      INNER JOIN plantilla AS  p 
      ON pc.idplantilla = pc.idplantilla
      WHERE  p.idusuario = '".$id_user."'  AND  p.idtipo_plantilla =  '".$type."'
      ORDER BY  c.fecha_registro DESC";

      $result  = $this->db->query($query_get_templates_content);  
      return $result->result_array();
    }














    
    

    function get_evento_contenido($id_evento , $type ){
      $query_select  ='SELECT * FROM contenido AS c INNER JOIN evento_contenido as ec 
      ON c.idcontenido = ec.idcontenido AND ec.idevento =  "'.$id_evento .'" WHERE type="'.$type.'" ';
      $result = $this->db->query($query_select);
      return $result ->result_array();
    }
    /*Regkistra los contenidos por tipo*/             
    function record_content($id_user , $nuevo_nombre , $contenido_text , $type){
        


        switch ($type) {
          case 1:
          $id_template = $this->record_template("Descripcion del evento " , $id_user , $type);              
            break;

          case 2:
          $id_template = $this->record_template("Descripción de lo permitodo dentro del evento " , $id_user , $type);              
            break;
          case 3:
          $id_template = $this->record_template("Restricciones" , $id_user , $type);              
            break;
          case 4:
          $id_template = $this->record_template("Politicas" , $id_user , $type);                
            break;                    

          default:
            return "ok";
            break;
        }
        
        $status =1;
        $query_insert ="INSERT INTO contenido( nombre_contenido , descripcion_contenido , status , type) VALUES( '".$nuevo_nombre. "' ,  '". $contenido_text . "'  , '".$status."' ,  '".$type."' )";        
        $result  = $this->db->query($query_insert);
        $id_contenido =  $this->db->insert_id();     
        $query_insert_media ="INSERT INTO plantilla_contenido  VALUES ('". $id_template ."' , '".$id_contenido."')";
        return $this->db->query($query_insert_media);  
    }


    /*De la plantilla carga un contenido nuevo */
    function record_restriccion_evento($id_evento , $id_restriccion){      
      $query_insert = "INSERT INTO evento_restriccion VALUES('". $id_evento."'  ,  '".$id_restriccion."' )";
      return $this->db->query($query_insert);
    }
    /**/
    function delete_plantilla_contenido($id_contenido){
        $delete_query = "DELETE FROM plantilla_contenido WHERE idcontenido= '". $id_contenido . "'  ";
        return $this->db->query($delete_query);
    }    
    /*Borrar la relacion */
    function delete_restriccion_evento($id_evento , $id_restriccion){
        $delete_query = "DELETE FROM evento_restriccion WHERE idevento = '".$id_evento."'  AND idrestriccion= '". $id_restriccion."'    ";
        return $this->db->query($delete_query);

    }

    /**/
    function get_templ_contenido($id_user , $type ){
      
      $query_get =  "SELECT * FROM contenido  as c
      INNER JOIN plantilla_contenido  as pc
      ON c.idcontenido = pc.idcontenido
      INNER JOIN plantilla  as p 
      ON pc.idplantilla = p.idplantilla
      WHERE p.idusuario = '".$id_user ."' AND p.idtipo_plantilla = '".$type."'  ";  
      $result_get  = $this->db->query($query_get);  
      return $result_get ->result_array();      
    }
    /*********************************Articulos *************************************+*/
    function record_articulo_empresa($nuevo_articulo , $nuevo_descripcion, $id_empresa ){
      $query_insert="INSERT INTO objetopermitido (nombre, descripcion , status) VALUES('".$nuevo_articulo."' , '".$nuevo_descripcion."' , 1 )";
      $result= $this->db->query($query_insert);          
      $idlastelement = $this->db->insert_id();                  
      $query_ins = "INSERT INTO empresa_objetopermitido VALUES($id_empresa , $idlastelement)";
      $response_r= $this->db->query($query_ins);
      return $response_r;
    }
    /**/
    function delete_obj_permitido_empresa($id_empresa , $id_objeto ){

      $query_delete ="DELETE FROM empresa_objetopermitido WHERE idempresa = '". $id_empresa. "' AND idobjetopermitido = '". $id_objeto."'  ";
      return $this->db->query($query_delete);
      
    }
    /**/
    function get_resumen_template($id_usuario ){

      $query_get ='select 
sum(case when c.type in ("1" ,  "3", "4" )  then 1 else 0 end ) total,
sum(case when c.type = 1 then 1 else 0 end ) descripcion_evento ,
sum(case when c.type = 4 then 1 else 0 end ) politicas, 
sum(case when c.type = 3 then 1 else 0 end ) restricciones  
from plantilla p  
inner join  plantilla_contenido pc on  p.idplantilla = pc.idplantilla
inner join contenido c on  pc.idcontenido = c.idcontenido
where idusuario="'.$id_usuario.'" ';
      
      $db_response  = $this->db->query($query_get);                  
      return $db_response->result_array();  
    }

        
}