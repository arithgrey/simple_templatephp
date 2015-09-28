<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class contactmodel extends CI_Model {
  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }
  /*recorc contacto */
  function record( $nombre , $organizacion , $telefono, $movil, $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web ){

    
 
    $query_insert="INSERT INTO contacto( nombre         
                    , organizacion   
                    , tel            
                    , movil          
                    , correo         
                    , direccion                                            
                    , tipo           
                    , idusuario
                    , nota 
                    , pagina_web ) 
                  VALUES( '".$nombre ."' , '".$organizacion."' , '".$telefono."', '".$movil."', '".$correo."' , '".$direccion ."', '".$tipo."' ,  '".$idusuario ."', '".$nota ."' ,  '". $pagina_web  ."' ) ";




   return $this->db->query($query_insert);                 
  }
  /*Termina la función*/
   
  function get_contactos_user($idusuario, $contacto, $tipo){

    

    if ($contacto ==  "all"){
        $query_get ="SELECT * FROM contacto where idusuario = '".$idusuario."'  ";  
    }else if($contacto ==  "tipo"){
        $query_get ="SELECT * FROM contacto where idusuario = '". $idusuario."' and tipo = '".$tipo."' OR nombre like '%".$contacto ."%'   ";  
    }else{
        $query_get ="SELECT * FROM contacto where idusuario = '". $idusuario."' and nombre like '%".$contacto ."%'";  
    }


    $result = $this->db->query($query_get);
    return $result ->result_array();

  }
  /*Lista de contactos*/
  function get_list_contactos($id_usuario){

    $query_get ="select distinct(nombre) from contacto where idusuario='".$id_usuario."'  ";
    $result =  $this->db->query($query_get);
    return $result->result_array();
  }
  /**/
  function update( $nombre , $organizacion , $telefono, $movil, $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web ,  $id_contacto){

    $query_update="UPDATE contacto SET nombre =  '". $nombre ."'  ,  organizacion = '".$organizacion."' ,  tel= '".$telefono."'   ,
                  movil = '".$movil."' , correo =  '".$correo."' ,  direccion =  '".$direccion ."' ,  tipo = '".$tipo."' ,
                  nota  = '".$nota ."' , pagina_web = '". $pagina_web  ."' WHERE idcontacto = '". $id_contacto."' ";
                                                                    
    return $this->db->query($query_update);                 

  }
  /**/
  function get_tipos_contactos($id_usuario){

    $query_get ="select distinct(tipo) from  contacto where idusuario='". $id_usuario."' ";
    $result = $this->db->query($query_get);
    return $result->result_array();
  }

  /*reporte general de los contactos que tengo hasta el momento */
  function get_repo_contactos($id_usuario){


    $query_get ='select count(*)contactos ,
sum(case when tipo = "Proveedor" then 1 else 0 end )proveedores,      
sum(case when  tipo = "Artista" then 1 else 0 end )artistas,  
sum(case when  tipo = "Colaborador" then 1 else 0 end )Colaboradores,
sum(case when  tipo = "Contacto Comercia" then 1 else 0 end )Contacto_comercial,
sum(case when  tipo = "Cliente" then 1 else 0 end )Clientes,
sum(case when  tipo = "Institución" then 1 else 0 end )instituciones,
sum(case  when length(correo) > 0 then  1 else  0 end ) con_correo,
sum(case  when length(pagina_web) > 0 then  1 else  0 end ) con_pagina_web,
sum(case  when length(tel) > 0 then  1 else  0 end ) con_tel

from contacto where idusuario= "'. $id_usuario.'"
';


    $result = $this->db->query($query_get);
    return $result->result_array();

  }
/*Termina modelo */
}
