<?php defined('BASEPATH') OR exit('No direct script access allowed');
class cuentageneralmodel extends CI_Model {
    function __construct()
    {
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
}/*Termina la función */

function getintegrantesinforme($iduser, $integrante , $id_empresa){
    
    $query_get="";
    
    if ($integrante == "0" ){

        $query_get ="select u.*, p.nombreperfil  from  usuario u inner join usuario_perfil up 
                                  on u.idusuario = up.idusuario inner join perfil p 
                                  on up.idperfil = p.idperfil 
                                  where idempresa = '".$id_empresa."' ";
          
    }else{


    $query_get ="select u.*, p.nombreperfil  from  usuario u inner join usuario_perfil up 
                                  on u.idusuario = up.idusuario inner join perfil p 
                                  on up.idperfil = p.idperfil 
                                  where idempresa = '".$id_empresa."' and 
                                  u.nombre like '". $integrante."%' ";  
        
    }

  
    
    
    $result = $this->db->query($query_get);
    return  $result->result_array();
    
     
  
    

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

/*Termina modelo */
}