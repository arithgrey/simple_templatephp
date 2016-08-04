<?php defined('BASEPATH') OR exit('No direct script access allowed');
class usuariogeneralmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }

    function get_usuario($id_usuario ,  $id_empresa ){
        $query_get =  "SELECT * FROM usuario WHERE  idusuario = '". $id_usuario ."' AND idempresa = '". $id_empresa ."' LIMIT 1  "; 
        $result = $this->db->query($query_get);
        return $result->result_array();
    }
    /*Validamos existencia del usuario */
    function validaexistuser($user , $mail ){

          $query = $this->db->query("SELECT * FROM usuario WHERE nombre='".$user."' OR  email='".$mail."' ");              
          $resultado = $query->result_array();

          if(count($resultado)>0){
            return count($resultado);  
          }else{
            return count($resultado);
          }                
    }
    /*Registra al usuario general*/ 

    function recordusergeneral($usuario , $mail , $pw ,  $idempresaregistrada){
      
      $query_insert ="INSERT INTO usuario (nombre , email , password , idempresa  ) 
      VALUES ('". $usuario."' , '".trim($mail)."' , '".trim($pw)."' , '".$idempresaregistrada."')"; 
      $resultado = $this->db->query($query_insert);    
      return $resultado;

    }


/**/

    function recordusergeneralconperfil($usuario , $mail , $pw , $idempresaregistrada, $perfil){

         $query_insert ="INSERT INTO usuario (nombre , email , password , idempresa  ) 
      VALUES ('". $usuario."' , '".trim($mail)."' , '".trim($pw)."' , '".$idempresaregistrada."')"; 
      $resultado = $this->db->query($query_insert);



      $query_lastuser ="SELECT MAX(idusuario) AS idusuario FROM usuario";
      $resultusuario  = $this->db->query($query_lastuser);
      $idusuario = 0;
      

      foreach ($resultusuario->result_array() as $row) {
          
          $idusuario = $row["idusuario"];
      }


      $insertqueryperfilusuario = "INSERT INTO usuario_perfil (idusuario , idperfil ) values ( $idusuario , $perfil )";
      $this->db->query($insertqueryperfilusuario);


      return $resultado;

    }


    function validauserrecord($mail , $secret){

        $query_select ="SELECT * FROM usuario WHERE email='".$mail."' AND password ='".$secret."' limit 1";
        $result_user = $this->db->query($query_select);       
        return $result_user ->result_array();      
    }
    /**/    
    function get_data_miembro($param){

        //$query_get = "SELECT * FROM usuario WHERE idusuario = '". $param["id_usuario"]  ."' limit 1";          
        $query_get = "SELECT * FROM usuario u inner join usuario_perfil up  on  u.idusuario =  up.idusuario  WHERE u.idusuario =  '". $param["id_usuario"]  ."'   ";
        $result = $this->db->query($query_get);
        return $result->result_array();
    }
    /**/
    function update_datos_miembro($param){  



      $dinamic_query =""; 
      $flag = 0;
      if ($param["id_usuario"]  ==  0  ) {
            
            $dinamic_query  = "INSERT INTO enidserv_eniddbbbb3.usuario(
            nombre,
            email,                    
            idempresa,                                    
            apellido_paterno,
            apellido_materno,
            email_alterno,
            tel_contacto,
            tel_contacto_alterno,
            edad,   
            inicio_labor, 
            fin_labor,
            grupo, 
            cargo, 
            rfc, 
            turno,          
            ultima_modificacion , 
            password  
             ) VALUES 

             ('". $param["nombres"]."' ,               
              '". $param["email"]."' ,                
              '". $param["id_empresa"]. "' ,               
              '". $param["apellido_paterno"] ."' , 
              '". $param["apellido_materno"] ."' , 
              '". $param["email_alterno"] ."' , 
              '". $param["tel_contacto"]."', 
              '". $param["tel_contacto_alterno"] ."', 
              '". $param["edad_user"] ."' , 
              '".$param["inicio_labor"] ."' ,
              '". $param["fin_labor"] ."' , 
              '". $param["grupo"] ."' ,
              '". $param["cargo"] ."'  ,
              '". $param["rfc"] ."'  , 
               '". $param["turno"] ."' ,                
              CURRENT_TIMESTAMP()  , 
              '". sha1("9876543210")."'
              )";

          /*inserta user */
          $this->db->query($dinamic_query);
          $id_usuario = $this->db->insert_id();                      
          $id_perfil_user =  $param["perfil_user"];
          return $this->insert_perfil_user($id_usuario , $id_perfil_user); 



      }else{
         $dinamic_query = "UPDATE usuario SET nombre  = '". $param["nombres"]."' ,                                              
                                              grupo = '". $param["grupo"] ."' , 
                                              cargo = '". $param["cargo"] ."'  ,  
                                              inicio_labor = '".$param["inicio_labor"] ."' , 
                                              fin_labor = '". $param["fin_labor"] ."'  ,
                                              email_alterno  = '". $param["email_alterno"] ."', 
                                              apellido_paterno = '". $param["apellido_paterno"] ."' , 
                                              apellido_materno = '". $param["apellido_materno"] ."' , 
                                              edad = '". $param["edad_user"] ."' , 
                                              tel_contacto = '". $param["tel_contacto"]."' ,
                                              tel_contacto_alterno = '". $param["tel_contacto_alterno"] ."' , 
                                              status = '". $param["nuevo_estado"] ."'    , 
                                              rfc = '". $param["rfc"] ."'  , 
                                              turno = '". $param["turno"] ."' 
                                              WHERE idusuario = '". $param["id_usuario"] ."' 
                                              LIMIT 1 
                                              ";     
          $this->db->query($dinamic_query);   
          $perfil_user =  $param["perfil_user"];                                           
          $dinamic_query_perfil ="UPDATE  usuario_perfil SET idperfil = '". $perfil_user ."' WHERE idusuario = '". $param["id_usuario"] ."'  LIMIT 1";                                  
          $result = $this->db->query($dinamic_query_perfil);     
          return $result;
          
      }
      
    }
    /**/
    function insert_perfil_user($id_usuario , $id_perfil_user){
        
        /*Insert perfil */
        $dinamic_query_perfil ="INSERT INTO  usuario_perfil(idusuario, idperfil )  VALUES('". $id_usuario  ."' , '". $id_perfil_user ."' )";
        $result = $this->db->query($dinamic_query_perfil);     
        return $result;
        /**/  
    }
    /**/

    function update_datos_miembro_descripcion($param){

      $query_update = "update usuario set descripcion ='". $param["descripcion-user"] . "' WHERE  idusuario = '". $param["usuario"]."' ";
      return $this->db->query($query_update);
    }

    /**/
    function set_status($param){

      $query_update = "UPDATE 
                      usuario 
                      SET  status = '". $param["nuevo_estado"]  ."' 
                      WHERE 
                      idusuario = ".$param["usuario_modificacion"] ."  limit 1 "; 
      return $this->db->query($query_update);
      
    }
    /**/
    function update_q($param ,  $id_usuario ){

      $campo =  $param["q"]; 
      $valor =  $param["valor"]; 
      $query_update = "UPDATE usuario SET ".$campo."  =  '".$valor."'  WHERE idusuario = '". $id_usuario  ."' LIMIT 1"; 
      $r =  $this->db->query($query_update);
      return $r;   
    }

    /*Termina el modelo*/
}