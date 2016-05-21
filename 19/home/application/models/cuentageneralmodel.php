<?php defined('BASEPATH') OR exit('No direct script access allowed');
class cuentageneralmodel extends CI_Model {
    function __construct(){      
        parent::__construct();        
        $this->load->database();
    }
    /*Asigna el perfil del usuario */
function getintegrantesbyidusuario($iduser){
    $id_empresa =  $this->getidempresabyidusuario($iduser);
    $query_get ="SELECT count(*) AS usuariosregistrados  FROM usuario WHERE  idempresa = $id_empresa "; 
    $result = $this->db->query( $query_get);
    $registrados = 1; 
    /*Inicia el ciclo para ver el numero de usuarios registrados*/
     foreach ($result ->result_array() as $row) {  
          $registrados  =  $row["usuariosregistrados"];
    }/*Termina el ciclo*/
    return $registrados;
}
/*Termina la función */

function getintegrantesinforme($iduser,  $id_empresa , $limit , $param = '' , $flag=0  ){
    
    $query_get="";
    if ($limit != "all") {
      $filtro_limit  = " limit " . $limit ;  
    }else{
      $filtro_limit = "";
    }

    $filtro = "";
    if ($flag!= 0 ) {
        $filtro = $this->get_filtro_user($param);  
    }
    
    /**/
    $_num = $this->cargamos_base_img_user(8 , 0 );
    /**/
    $query_get ="select 
                  u.*, 
                  p.nombreperfil ,
                  i.idimagen ,     
                  i.nombre_imagen ,
                  i.img                  
                  from  
                  usuario u  inner join usuario_perfil up  on u.idusuario = up.idusuario 
                  inner join perfil p  on up.idperfil = p.idperfil 
                  left outer join imagen_usuario  iu on  u.idusuario =  iu.idusuario
                  left outer join tmp_img_$_num  i on   iu.idimagen = i.idimagen
                  where 
                  idempresa = ". $id_empresa ." " . $filtro;
          
    $result = $this->db->query($query_get);
    $data_complete =  $result->result_array();  
    $_num = $this->cargamos_base_img_user( 8 , 1, $_num );
    return $data_complete;
    
}
/**/
function get_filtro_user($param){
 
  $filtro = ""; 
  if ( strlen($param["nombre-integrante-filtro"]) > 0 && $param["turno-filtro"] == "-"  && $param["estatus-filtro"] == "-"  ){
      $filtro =  " and nombre like '%". $param["nombre-integrante-filtro"] ."%' " ;
  }else if (strlen($param["nombre-integrante-filtro"]) > 0 && $param["turno-filtro"] != "-"   ){
      $filtro =  " and nombre like '%". $param["nombre-integrante-filtro"] ."%'  OR  turno = '". $param["turno-filtro"] ."' " ;

  }else if (strlen($param["nombre-integrante-filtro"]) > 0 && $param["turno-filtro"] != "-"  && $param["estatus-filtro"] != "-"   ){
      
      $filtro =  " and nombre like '%". $param["nombre-integrante-filtro"] ."%'  OR  turno = '". $param["turno-filtro"] ."' OR u.status = '". $param["estatus-filtro"] ."' " ;
  }
  else if (strlen($param["nombre-integrante-filtro"]) == 0 && $param["turno-filtro"] != "-"  && $param["estatus-filtro"] != "-"   ){
      $filtro =  " OR  turno = '". $param["turno-filtro"] ."' OR u.status = '". $param["estatus-filtro"] ."' " ;
  }else if (strlen($param["nombre-integrante-filtro"]) == 0 &&  $param["estatus-filtro"] == "-"  ) {
      
      $filtro =" and   turno = '". $param["turno-filtro"] ."'  OR   up.idperfil = ".$param["busqueda-perfil"]."  ";

  }else if(strlen($param["nombre-integrante-filtro"]) == 0 &&  $param["turno-filtro"] == "-"   ){
      
      $filtro =" and u.status = '". $param["estatus-filtro"] ."' ";

  }else if(strlen($param["nombre-integrante-filtro"]) == 0 &&  $param["turno-filtro"] == "-"  &&  $param["estatus-filtro"] == "-" &&  $param["busqueda-perfil"] ){
      /*Falta*/
     // $filtro = "  ";
  }else{

  }
  return $filtro;

}
/*regresa el id de la empresa a la cual pertenece un usuario */
function getidempresabyidusuario($iduser){
  $query_get   ="SELECT idempresa FROM usuario WHERE idusuario = $iduser "; 
  $result = $this->db->query($query_get); 
  $id_empresa = 0;
  foreach ($result ->result_array() as $row) {   
     $id_empresa =  $row["idempresa"];
  }
  return $id_empresa;
}
/*Termina la función*/
function getperfilesdelacuenta($id_empresa){
  
  $idplan = $this->getidplanbyidempresa($id_empresa);
  $query_get = "SELECT perfil.nombreperfil , perfil.idperfil 
    FROM  perfil, plan_perfil  WHERE 
    plan_perfil.idperfil =perfil.idperfil AND plan_perfil.idplan = '".  $idplan."' ";  
  $result = $this->db->query($query_get);  
  return $result ->result_array();

}
function getidplanbyidempresa($id_empresa){
  $query_get = "SELECT idplan FROM empresa WHERE  idempresa ='". $id_empresa . "' ";
  $result = $this->db->query($query_get);   
  $idplan = 0; 
   foreach ($result ->result_array() as $row) {
   
     $idplan =  $row["idplan"];
  }
  return $idplan;
}
/************************************************************************************/
/*
function getnumeroclientesnotrepeat($id_empresa) {
  $query_count =  "select * from clienteorg where idempresa='".$id_empresa."'";
  $result = $this->db->query($query_count);   
  return   $result->num_rows();
}
function getnumeroclientesquehesolicitado($id_empresa, $iduser){
  $query_count =  " select * from historial_crediticio as hc , clienteorg as c  where
   hc.status='En validación' and hc.idempresa='".$id_empresa."'  and c.idclienteorg = hc.idclienteorg 
   and c.idusuario='".$iduser."'";
  $result = $this->db->query($query_count);   
  return   $result->num_rows();
}
*/
function update_perfil_user($usuario , $perfil ){

  
  $query_update ="update usuario_perfil set idperfil= '".$perfil ."' where idusuario = '".$usuario."'  limit 1";
  return $this->db->query($query_update);

}
/**/
function get_resumen_usuarios_cuenta($id_empresa){

  $query_get ='select  count(0) usuarios, 
              sum(case when u.status = "Usuario Activo" then 1 else 0 end) usuarios_activos, 
              sum(case when u.status = "Usuario dado de baja" then 1 else 0 end) usuarios_baja, 
              sum(case when p.nombreperfil = "Administrador de cuenta" then 1 else 0 end) administradores_cuenta, 
              sum(case when p.nombreperfil = "Estratega digital" then 1 else 0 end) estrategas_digitales
              from  usuario u inner join usuario_perfil up 
              on u.idusuario = up.idusuario inner join perfil p 
              on up.idperfil = p.idperfil 
              where idempresa = "'. $id_empresa .'"  ';

  $result = $this->db->query($query_get);   
  return $result ->result_array();
}


/**/
function get_data_user_by_id($id_usuario){    
  $query_get = "SELECT * FROM usuario WHERE idusuario = '".$id_usuario."'  "; 
  $result = $this->db->query($query_get);
  return $result ->result_array();
}

/**/
function get_perfiles(){
  $query_get = "select * from  perfil"; 
  $result = $this->db->query($query_get);
  return $result->result_array();
  
}
/**/
function cargamos_base_img_user($tipo , $f  , $_num = 0 ){    
      if($_num == 0 ) {
        $_num = mt_rand();       
      }
      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
  }




/*Termina modelo */
}