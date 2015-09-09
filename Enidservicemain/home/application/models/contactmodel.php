<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class contactmodel extends CI_Model {
  
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }
  /*recorc contacto */
  function record( $nombre , $organizacion , $telefono, $movil, $correo , $direccion, $tipo , $idusuario, $nota ){

    
 
    $query_insert="INSERT INTO contacto( nombre         
                    , organizacion   
                    , tel            
                    , movil          
                    , correo         
                    , direccion                                            
                    , tipo           
                    , idusuario
                    , nota  ) 
                  VALUES( '".$nombre ."' , '".$organizacion."' , '".$telefono."', '".$movil."', '".$correo."' , '".$direccion ."', '".$tipo."' ,  '".$idusuario ."', '".$nota ."') ";




   return $this->db->query($query_insert);                 
  }
  /*Termina la función*/
   
  function get_contactos_user($idusuario){

    $query_get ="SELECT * FROM contacto where idusuario = '".$idusuario."'  ";
    $result = $this->db->query($query_get);
    return $result ->result_array();

  }


/*Termina modelo */
}
