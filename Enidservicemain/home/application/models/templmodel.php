<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class templmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
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
      $query_get_templates_content ="SELECT  * FROM  contenido AS  c 
        INNER JOIN  plantilla AS p
        ON  c.idplantilla  =  p.idplantilla 
        WHERE  p.idusuario = '".$id_user."'  AND  p.idtipo_plantilla =  '".$type."'
        ORDER BY  c.fecha_registro DESC";
              $result  = $this->db->query($query_get_templates_content);  
      return $result->result_array();
    }














    /****************************************+RESTRICCIONES  *******************/
    /*Termina modelo */
    function get_restriciones($id_evento){
      $query_select  ='SELECT * FROM restriccion AS r INNER JOIN evento_restriccion as er ON r.idrestriccion = er.idrestriccion AND er.idevento =  "'.$id_evento .'" ';
      $result = $this->db->query($query_select);
      return $result ->result_array();
    }
    /**/
    function record_template_restriccion($iduser , $descripcion_templ_restriccion , $tipo  ){
              

        $id_template = $this->record_template("Restricciones" , $iduser , $tipo);          
        $query_insert ="INSERT INTO restriccion(text_restriccion) VALUES( '". $descripcion_templ_restriccion ."' )";        
        $restricciones_id = $this->db->query($query_insert);
        $id_nueva_restriccion =  $this->db->insert_id();     
              
        $query_insert_media ="INSERT INTO plantilla_restriccion  VALUES ('". $id_template ."' , '".$id_nueva_restriccion."')";
        return $this->db->query($query_insert_media);
    }
    /*De la plantilla carga un contenido nuevo */
    function record_restriccion_evento($id_evento , $id_restriccion){
        

      $query_insert = "INSERT INTO evento_restriccion VALUES('". $id_evento."'  ,  '".$id_restriccion."' )";
      return $this->db->query($query_insert);
    }
    /**/
    function delete_plantilla_restriccion($id_restriccion){
        $delete_query = "DELETE FROM plantilla_restriccion WHERE idrestriccion= '". $id_restriccion."'  ";
        return $this->db->query($delete_query);

    }    
    /*Borrar la relacion */
    function delete_restriccion_evento($id_evento , $id_restriccion){
        $delete_query = "DELETE FROM evento_restriccion WHERE idevento = '".$id_evento."'  AND idrestriccion= '". $id_restriccion."'    ";
        return $this->db->query($delete_query);

    }

    /**/
    function get_templ_restricciones($id_user){
      
      $query_get_restriccion =  "SELECT  * FROM restriccion AS  r  INNER JOIN plantilla_restriccion  AS p  ON  r.idrestriccion = p.idrestriccion 
      INNER JOIN plantilla  AS pl ON p.idplantilla = pl.idplantilla WHERE pl.idusuario = '". $id_user. "' ";
      
      $result_get  = $this->db->query($query_get_restriccion);  
      return $result_get ->result_array();

    }
    

        
}

