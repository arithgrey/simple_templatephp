<?php defined('BASEPATH') OR exit('No direct script access allowed');
class usuariogeneralmodel extends CI_Model {
    function __construct()
    {
        parent::__construct();        
        $this->load->database();
    }
    /**/
    function get_num_users($param){
        
        $query_get =  "SELECT COUNT(0)num  FROM usuario WHERE email = '".$param["mail"]."' LIMIT  1  ";  
        $result =  $this->db->query($query_get); 
        return $result->result_array()[0]["num"];
    }
  
    /**/
    function get_nombre_user($param){
      
      $query_get =  "SELECT CONCAT(nombre,  apellido_paterno , apellido_materno)nombre_usuario  FROM usuario WHERE idusuario = '". $param["id_usuario"]."' "; 
      $result =  $this->db->query($query_get);
      return $result->result_array();
    }
    /**/
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
            
        $query_get = "SELECT * FROM usuario u inner join usuario_perfil up  on  u.idusuario =  up.idusuario  WHERE u.idusuario =  '". $param["id_usuario"]  ."'   ";
        $result = $this->db->query($query_get);
        return $result->result_array();
    }
    /**/
    function update_datos_miembro($param){  

      $dinamic_query =""; 
      $flag = 0;
      $db_response["status_user"] =  "FALSE"; 
      $db_response["msj_user"] =  "El usuario ya tiene una cuenta Enid Service, intente con otro usuario."; 



      if($param["action"]  ==  "registro"  ){
            


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

            $user_exist =  $this->get_num_users($param);             

            

            if ($user_exist  ==  0 ) {
              
              $this->db->query($dinamic_query);
              $id_usuario = $this->db->insert_id();                      
              $id_perfil_user =  $param["perfil_user"];
              
              $db_response["status_user"] = $this->insert_perfil_user($id_usuario , $id_perfil_user); 
              $db_response["msj_user"] =  ""; 

            }


          /*inserta user */
          



      }else{


         $query_update = "UPDATE usuario 
         SET nombre  = '". $param["nombres"]."' ,                                              
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
             rfc = '". $param["rfc"] ."'  , 
             turno = '". $param["turno"] ."' 
             WHERE idusuario = '". $param["id_usuario"] ."' 
             LIMIT 1 ";     
         
          $this->db->query($query_update);   
        

          
          $perfil_user =  $param["perfil_user"];                                           
          $dinamic_query_perfil ="UPDATE  usuario_perfil SET idperfil = '". $perfil_user ."' WHERE idusuario = '". $param["id_usuario"] ."'  LIMIT 1";                                  
          $result = $this->db->query($dinamic_query_perfil);     
          

          $db_response["status_user"] = "true"; 
          $db_response["msj_user"] =  "";           
          
      }
      return $db_response;
      
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
    /**/
    function update_locacion_maps($param){

      $place_id =  $param["place_id"];
      $formatted_address =  $param["formatted_address"];
      $id_usuario =  $param["identificador"];
      $lat = $param["lat"]; 
      $lng = $param["lng"]; 
      
      $query_update = "UPDATE usuario 
              SET           
              place_id = '".$place_id ."'  ,  
              formatted_address = '". $formatted_address  ."',          
              lat =  '".$lat."' , 
              lng = '".$lng."' 
              WHERE idusuario = '".$id_usuario."' limit 1"; 
      return $this->db->query( $query_update);  
    }



}