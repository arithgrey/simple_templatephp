<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class contactmodel extends CI_Model {  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }


  function get_contactos_empresa($id_empresa){

      $query_get =" SELECT * FROM  contacto c 
      INNER JOIN empresa_contacto co 
      ON c.idcontacto =  co.id_contacto  
      WHERE co.id_empresa =  '". $id_empresa."' ";
      $result = $this->db->query($query_get);
      return $result->result_array();

  }
  /**/
  function get_contacto_q($id_usuario ,  $q){ 

    $query_get ="SELECT c.* , i.*  FROM contacto c  
                left outer  join  imagen_contacto ic on 
                c.idcontacto =  ic.id_contacto 
                left outer  join imagen  i  on  ic.id_imagen =  i.idimagen 
                where  idusuario ='".$id_usuario."'  and c.nombre like '%".$q."%' 
                or c.organizacion like '%". $q ."%'
                or c.tel like '%". $q ."%'
                or c.correo like '%".$q."%'

                order by c.nombre desc limit 5";
    $result =  $this->db->query($query_get);                  
    return $result->result_array();
  }
  /**/
  function update_contacto_empresa($id_empresa , $contacto , $id_usuario ){

    $query_exist = "select * from empresa_contacto where id_empresa = '". $id_empresa ."' ";
    $result_exist = $this->db->query($query_exist);
    $data_contact = $result_exist ->result_array();
    $exist =   count($data_contact);

    if ($exist > 0 ){
      
      $id_contacto_update  = $data_contact[0]["id_contacto"];
      $query_update =  "update contacto set   
                         nombre   =  '". $contacto["nombre"] ."' ,
                         organizacion   =  '". $contacto["organizacion"]  ."' ,
                         tel            =  '". $contacto["telefono"] ."' ,
                         movil          =  '". $contacto["movil"] ."' ,
                         correo         =  '". $contacto["correo"]."' ,
                         direccion      =  '". $contacto["direccion"]  ."' ,
                         tipo           = 'Organización' ,
                         nota           = '". $contacto["nota"] ."' ,
                         pagina_web     = '". $contacto["pagina_web"] ."' ,
                         pagina_fb      = '".  $contacto["pagina_fb"]."' , 
                         pagina_tw      = '". $contacto["pagina_tw"] ."' ,
                         correo_alterno = '". $contacto["correo_alterno"] ."' 
                         where idcontacto = '". $id_contacto_update . "'"; 
      return  $this->db->query($query_update);


    }else{
      $new_contact = $this->record( $contacto["nombre"] , $contacto["organizacion"]  , $contacto["telefono"]  , $contacto["movil"]    , $contacto["correo"] , $contacto["direccion"]  , "Organización" , $id_usuario , $contacto["nota"]  , $contacto["pagina_web"]  , $contacto["pagina_fb"]  ,$contacto["pagina_tw"] , $contacto["correo_alterno"] );
      $query_insert =  "INSERT INTO empresa_contacto VALUES('".$id_empresa ."' , '". $new_contact ."')";   
      return $this->db->query($query_insert);
    }
    
  }



  function get_contactos_id($param){
    
    $query_get ="select * from  contacto where idcontacto   = '". $param["contacto"] ."' ";
    $result= $this->db->query($query_get);
    return $result->result_array();
  }
  /*recorc contacto */
  function record( $nombre , $organizacion , $telefono, $movil, $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web , $pagina_fb , $pagina_tw  , $correo_alterno  ){

    
 
    $query_insert="INSERT INTO contacto( nombre         
                    , organizacion   
                    , tel            
                    , movil          
                    , correo         
                    , direccion                                            
                    , tipo           
                    , idusuario
                    , nota 
                    , pagina_web 
                    , pagina_fb 
                    , pagina_tw 
                    , correo_alterno ) 
                  VALUES( '".$nombre ."' , '".$organizacion."' , '".$telefono."', '".$movil."', '".$correo."' , '".$direccion ."', '".$tipo."' ,  '".$idusuario ."', '".$nota ."' ,  '". $pagina_web  ."'  , '". $pagina_fb ."' , '". $pagina_tw ."' , '". $correo_alterno."'  ) ";

   $result_insert  =  $this->db->query($query_insert);                 
   return $this->db->insert_id();               

  }
  /*Termina la función*/
   

  function get_contactos_user($idusuario , $param){

    $filtro ="";
    if ( strlen($param["contacto-name"]) > 0) {

      $filtro= " and  nombre  like '". $param["contacto-name"] ."%'  or   tipo like '". $param["filtro-tipo-contacto"] ."%'  " ;  

    }else if(strlen($param["contacto-tel-filtro"]) > 0  ){

      $filtro= " and  tel like '". $param["contacto-tel-filtro"] ."%'   or tipo like '". $param["filtro-tipo-contacto"] ."%' " ;    

    }else if(strlen($param["contacto-tel-filtro"] ) > 0  && strlen($param["contacto-name"]) > 0  ){
      $filtro= " and  nombre  like '". $param["contacto-name"] ."%'  and    tipo like '". $param["filtro-tipo-contacto"] ."%' and   tel like '". $param["contacto-tel-filtro"] ."%'   " ;  
    
    }else{
      $filtro=" limit 10";
    }
    
    $query_get ="SELECT c.* , i.*  FROM contacto c  left outer  join  imagen_contacto ic on 
                    c.idcontacto =  ic.id_contacto left outer  join imagen  i  on  
                    ic.id_imagen =  i.idimagen 
                    where idusuario ='".$idusuario."'  ".$filtro."";  

    
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
  function update( $nombre , $organizacion , $telefono, $movil, $correo , $direccion, $tipo , $idusuario, $nota , $pagina_web ,  $id_contacto , $pagina_fb , $pagina_tw , $correo_alterno){

    $query_update="UPDATE contacto SET nombre =  '". $nombre ."'  ,  organizacion = '".$organizacion."' ,  tel= '".$telefono."'   ,
                  movil = '".$movil."' , correo =  '".$correo."' ,  direccion =  '".$direccion ."' ,  tipo = '".$tipo."' ,
                  nota  = '".$nota ."' , pagina_web = '". $pagina_web  ."'   , pagina_fb ='". $pagina_fb ."'  , pagina_tw = '". $pagina_tw  ."' , correo_alterno='". $correo_alterno ."'    WHERE idcontacto = '". $id_contacto."' limit 1";
                                                                    
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
sum(case when  tipo = "Patrocinador" then 1 else 0 end )Patrocinador,
sum(case  when length(correo) > 0 then  1 else  0 end ) con_correo,
sum(case  when length(pagina_web) > 0 then  1 else  0 end ) con_pagina_web,

sum(case  when length(pagina_fb) > 0 then  1 else  0 end ) con_pagina_fb,
sum(case  when length(pagina_tw) > 0 then  1 else  0 end ) con_pagina_tw,
sum(case  when length(tel) > 0 then  1 else  0 end ) con_tel

from contacto where idusuario= "'. $id_usuario.'"
';


    $result = $this->db->query($query_get);
    return $result->result_array();

  }


/**/
function get_contacto_empresa($id_empresa){
  $query_get = "select ce.* , c.*  from empresa_contacto ce inner join contacto c on c.idcontacto = ce.id_contacto where ce.id_empresa = '". $id_empresa."' ";
  $result = $this->db->query($query_get);
  return $result->result_array();
}
/**/
function update_contacto_nota($param){

  $nota  = $param["nota-contacto-text"];
  $query_update = "UPDATE contacto SET  nota = '". $nota ."' WHERE idcontacto = '". $param["contacto"] ."' ";
  return $this->db->query($query_update);

}
/*Termina modelo */
}