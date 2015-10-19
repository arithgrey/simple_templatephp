<?php defined('BASEPATH') OR exit('No direct script access allowed');
class cuentageneralmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    /*Asigna el perfil del usuario */
function getintegrantesbyidusuario($iduser){
    $idempresa =  $this->getidempresabyidusuario($iduser);
    $queryuserbycuenta ="SELECT count(*) AS usuariosregistrados  FROM usuario WHERE  idempresa = $idempresa "; 
    $result = $this->db->query( $queryuserbycuenta);
    $registrados = 1; 
    /*Inicia el ciclo para ver el numero de usuarios registrados*/
     foreach ($result ->result_array() as $row) {
   
          $registrados  =  $row["usuariosregistrados"];
    }/*Termina el ciclo*/
    return $registrados;
}/*Termina la función */
/**/



function getintegrantesinforme($iduser, $integrante , $idempresa){
    
    $querygetinfointegrantes="";
    
    if ($integrante == "0" ){
        

        $querygetinfointegrantes ="select u.*, p.nombreperfil  from  usuario u inner join usuario_perfil up 
                                  on u.idusuario = up.idusuario inner join perfil p 
                                  on up.idperfil = p.idperfil 
                                  where idempresa = '".$idempresa."' ";
          
    }else{


    $querygetinfointegrantes ="select u.*, p.nombreperfil  from  usuario u inner join usuario_perfil up 
                                  on u.idusuario = up.idusuario inner join perfil p 
                                  on up.idperfil = p.idperfil 
                                  where idempresa = '".$idempresa."' and 
                                  u.nombre like '". $integrante."%' ";  
        
    }

  
    
    
    $resultquery = $this->db->query($querygetinfointegrantes);
    return  $resultquery->result_array();
    
     
  
    

}
/*regresa el id de la empresa a la cual pertenece un usuario */
function getidempresabyidusuario($iduser){
  $querygetidempresa   ="SELECT idempresa FROM usuario WHERE idusuario = $iduser "; 
  $result = $this->db->query($querygetidempresa); 
  $idempresa = 0;
  foreach ($result ->result_array() as $row) {
   
     $idempresa =  $row["idempresa"];
  }
  return $idempresa;
}
/*Termina la función*/
function getperfilesdelacuenta($idempresa){
    
  
  $idplan = $this->getidplanbyidempresa($idempresa);

  $querygetplanperfiles = "SELECT perfil.nombreperfil , perfil.idperfil 
    FROM  perfil, plan_perfil  WHERE 
    plan_perfil.idperfil =perfil.idperfil AND plan_perfil.idplan = '".  $idplan."' ";  
  $result = $this->db->query($querygetplanperfiles);  
  return $result ->result_array();

}
function getidplanbyidempresa($idempresa){
  $querygetplan = "SELECT idplan FROM empresa WHERE  idempresa ='". $idempresa . "' ";
  $result = $this->db->query($querygetplan);   
  $idplan = 0; 
   foreach ($result ->result_array() as $row) {
   
     $idplan =  $row["idplan"];
  }
  return $idplan;
}
/************************************************************************************/
function getnumeroclientesnotrepeat($idempresa) {
  $countquery =  "select * from clienteorg where idempresa='".$idempresa."'";
  $result = $this->db->query($countquery);   
  return   $result->num_rows();
}
function getnumeroclientesenvalidacion($idempresa){
  $countquery =  "select * from historial_crediticio where status='En validación' and idempresa='".$idempresa."'";
  $result = $this->db->query($countquery);   
  return   $result->num_rows();
}
function getnumeroclientesquehesolicitado($idempresa, $iduser){
  $countquery =  " select * from historial_crediticio as hc , clienteorg as c  where
   hc.status='En validación' and hc.idempresa='".$idempresa."'  and c.idclienteorg = hc.idclienteorg 
   and c.idusuario='".$iduser."'";
  $result = $this->db->query($countquery);   
  return   $result->num_rows();
}

/**/

function update_perfil_user($usuario , $perfil ){

  
  $query_update ="update usuario_perfil set  idperfil= '".$perfil ."' where idusuario = '".$usuario."'  ";
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
/*Termina modelo */
}