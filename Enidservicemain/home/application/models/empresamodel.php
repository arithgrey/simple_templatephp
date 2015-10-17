<?php defined('BASEPATH') OR exit('No direct script access allowed');
class empresamodel extends CI_Model{
  function __construct(){
      parent::__construct();        
      $this->load->database();
  }
function insert_incidencia_empresa($id_empresa , $id_usuario ,  $data ){

  $query_insert =  "";
  if ($data["otro"]!= null ) {
    
  $query_insert ="INSERT INTO  incidencia(          
                 descripcion_incidencia,                                   
                 usuario_notificado   , 
                 afectacion            ,
                 fecha_solicitud       ,
                 idtipo_incidencia     ,
                 idsub_tipo_incidencia
                )VALUES(

                  '". $data["descripcion"]  ."',
                  '". $data["usuario_reportado"]."' ,
                  '". $data["afectacion"] ."',
                  '". $data["fecha-reporte"]."', 
                  '". $data["tipo-incidencia"] ."', 
                  '". $data["otro"] ."'
                )";


  
    }else{

  $query_insert ="INSERT INTO  incidencia(          
                 descripcion_incidencia,                                   
                 usuario_notificado   , 
                 afectacion            ,
                 fecha_solicitud       ,
                 idtipo_incidencia     ,
                 idsub_tipo_incidencia
                )VALUES(

                  '". $data["descripcion"]  ."',
                  '". $data["usuario_reportado"]."' ,
                  '". $data["afectacion"] ."',
                  '". $data["fecha-reporte"]."', 
                  '". $data["tipo-incidencia"] ."', 
                  '". $data["sub-tipo"] ."'
                )";


    }
    return $this->db->query( $query_insert);
                

      
}

/**/
function get_reportados($id_empresa){
  $query_get =  "select * from usuario where idempresa = '". $id_empresa . "' ";
  $result=  $this->db->query($query_get);             
  return $result->result_array();
}

/**/

function get_sub_tipo_incidencia($id_empresa , $data ){

  $query_get =  "select * from sub_tipo_incidencia where idtipo_incidencia  = '". $data["tipo_incidencia"]  ."' ";
  $result=  $this->db->query($query_get);             
  return $result->result_array();
}
/**/
function get_tipos_incidencias($id_empresa){

  $query_get ="select * from empresa_tipo_incidencia eti inner join tipo_incidencia  
              t on eti.idtipo_incidencia =  t.idtipo_incidencia where eti.id_empresa =  '". $id_empresa."' ";
  $result=  $this->db->query($query_get);             
  return $result->result_array();
}

/**/

function get_contactos_empresanum($id_empresa){

    $query_get =  "select count(*)total from empresa_contacto where id_empresa = '". $id_empresa."' ";
    $result =  $this->db->query($query_get);
    return $result->result_array()[0]["total"];
}

/**/
function update_contacto_empresa($id_empresa , $param ){

  $query_exist ="select count(*)total  from  empresa_contacto where id_empresa = '". $id_empresa ."' and id_contacto = '". $param["contacto"] ."' ";
  $result = $this->db->query($query_exist);
  $result_exist = $result ->result_array()[0]["total"];
  $dinamic_query ="";  

  if ($result_exist >0 ) {
    $dinamic_query ="DELETE FROM empresa_contacto WHERE id_empresa = '". $id_empresa ."' and id_contacto = '". $param["contacto"] ."' ";
  }else{
    $dinamic_query = "INSERT INTO empresa_contacto VALUES('". $id_empresa ."' , '". $param["contacto"] ."')";
  }
  return $this->db->query($dinamic_query);
}



/**/
function get_contactos_empresa($id_empresa , $id_usuario ){

$query_get ="select c.* , 
empresa_contacto.id_contacto contactoemp , 
ic.* ,
i.* from contacto c left outer 
join  empresa_contacto 
on c.idcontacto =  empresa_contacto.id_contacto  and 
empresa_contacto.id_empresa = '". $id_empresa."'
left outer join imagen_contacto ic 
on ic.id_contacto = c.idcontacto
left outer join imagen i on
ic.id_imagen  =  i.idimagen
where idusuario=". $id_usuario;
    
$result = $this->db->query($query_get);
return $result->result_array();      



  
}  
/**/
function get_empresa_by_id($id_empresa){



  $query_get ="select  e.* , c.*,  i.*   from empresa e 
inner join  countries c  on e.idCountry  =  c.idCountry  
left outer join  imagen_empresa  ie 
on ie.id_empresa  = '". $id_empresa ."'  
left outer join
imagen i 
on i.idimagen =  ie.id_imagen 
where e.idempresa  =  '". $id_empresa."'  ";

  $result=  $this->db->query($query_get);
  return $result->result_array();


}


/**/

function exist_company_byname( $nombreempresa ){

    $query_exist = "SELECT * FROM empresa WHERE nombreempresa = '".$nombreempresa."' ";     
    $result = $this->db->query($query_exist);                   
    $flag = 0;     
     foreach ($result->result_array() as  $row) {            
          $flag++;
      }     
    return $flag;


}/*Termina la función */




function recordempresawhitname( $nombreempresa ){


    $query_insert = "INSERT INTO empresa (nombreempresa) VALUES ('".$nombreempresa."' )";
    $tryrecord = $this->db->query($query_insert); 
    /*Si se registro*/
    if ( $tryrecord   ==  true ) {  
    $query_lastelemento  = "SELECT MAX(idempresa) AS idempresa FROM empresa";
    $resultlastelemento  = $this->db->query($query_lastelemento); 

        $ultimo = 0;
        /*Ultimo elemento ingresado */
        foreach ($resultlastelemento ->result_array() as $row) {
         
           $ultimo = $row["idempresa"];
        }
        
        return $ultimo;


    }else{
      return "Fallo algo al registrar empresa";
    }


    
}/*Termina la función */
/*Termina modelo */
}



