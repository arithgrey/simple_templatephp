<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class templmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    /*Registra template contenido */
    function record_template_contenido( $iduser ,  $nombre_tmpl  , $tipo_templ, $titulo_contenido_tmpl , $descripcion ){

        $result_record_templ = $this->record_template($nombre_tmpl , $iduser , $tipo_templ);
        return $this->update_contenido_nombre_descripcion($titulo_contenido_tmpl , $descripcion , $result_record_templ );
        

    }    
    function update_contenido_nombre_descripcion($titulo_contenido_tmpl , $descripcion , $plantilla ){
      
      $query_update ="UPDATE contenido SET nombre_contenido = '". $titulo_contenido_tmpl."'  , descripcion_contenido='". $descripcion."' WHERE idplantilla='".$plantilla."' ";

      return $this->db->query($query_update);
    } 

    /*Registra los templates */
    function record_template($nombre_tmpl , $iduser , $tipo_templ){
    
      $query_insert="INSERT INTO plantilla(nombre_platilla,   idusuario ,   idtipo_plantilla)
      VALUES ('".$nombre_tmpl . "' , '". $iduser."' , '". $tipo_templ . "' )";
      $result = $this->db->query($query_insert);
      return $this->db->insert_id();     
    }

/*Termina modelo */
}

