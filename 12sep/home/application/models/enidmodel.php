<?php defined('BASEPATH') OR exit('No direct script access allowed');
class enidmodel extends CI_Model {
    function __construct(){      
        parent::__construct();        
        $this->load->database();
    }
    /**/
    function repo_prospectos($param){

      $_num =  get_random();
      $flag_evento = $this->create_tmps($_num , 0 , $param);            
      $query_get =  "SELECT * FROM  
                    tmp_prospectos_$_num  p 
                    LEFT OUTER JOIN 
                    tmp_prospectos_eventos_$_num e  ON p.idempresa  =  e.id_empresa_eventos";  

      $result =  $this->db->query($query_get);
      $data_complete =  $result->result_array();
      $flag_evento = $this->create_tmps($_num , 1 , $param);            
      return $data_complete;
    }
    /**/
    function create_tmps($_num , $flag , $param){

        $this->create_tmps_info_empresa($_num , $flag , $param);
        $flag_evento =  $this->create_tmps_eventos($_num , $flag , $param);
        return  $flag_evento;     
    }
    /**/
    function create_tmps_eventos($_num , $flag , $param){

      $flag_action = "";  
      $query_drop =  "DROP TABLE IF exists tmp_prospectos_eventos_$_num";
      $flag_action =   $this->db->query($query_drop); 

      if ($flag == 0 ){
      
        $query_procedure =  "CREATE TABLE tmp_prospectos_eventos_$_num AS 
                            SELECT  e.idempresa id_empresa_eventos ,  COUNT(*)num_eventos 
                            FROM  evento e  
                            INNER JOIN  tmp_prospectos_$_num  p  
                            ON  e.idempresa =  p.idempresa 
                            group by  e.idempresa";

         $flag_action  =  $this->db->query($query_procedure);
 
      }
      return $flag_action;

    }
    /**/
    function create_tmps_info_empresa($_num , $flag , $param){
      $flag_action = "";  
      $query_drop =  "DROP TABLE IF exists tmp_prospectos_$_num";
      $flag_action =   $this->db->query($query_drop); 


      if ($flag == 0 ){

          $query_procedure ="CREATE TABLE   tmp_prospectos_$_num AS SELECT 
                  idempresa,  
                  nombreempresa , 
                  fecha_registro ,  
                  facebook , 
                  tweeter , 
                  gp , 
                  www ,  
                  datediff( CURRENT_DATE() , fecha_registro) dias_dif
                  FROM empresa 
                  WHERE  
                  status = 1 ORDER BY fecha_registro DESC"; 
          
          $flag_action =  $this->db->query($query_procedure);

      }

      return $flag_action;

    }

}
/*Termina modelo */