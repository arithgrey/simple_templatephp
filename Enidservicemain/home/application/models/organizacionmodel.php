<?php defined('BASEPATH') OR exit('No direct script access allowed');
class organizacionmodel extends CI_Model {
    function __construct(){
            parent::__construct();        
            $this->load->database();
    }

function update_q($id_empresa, $param){

    $query_update ="update empresa set ". $param["q"] ." = '".$param["value"]."' WHERE idempresa='".$id_empresa."' ";

    return $this->db->query($query_update);
}


function mostrarCiudades($idEmpresa)
{
    $listar_uno = " SELECT * FROM countries ";
    $result = $this->db->query( $listar_uno );
    $uno= $result->result_array();

    $listar_todos = "SELECT countries.idCountry from empresa, countries where empresa.idempresa = '".$idEmpresa."' and empresa.idCountry = countries.idCountry";
    $dbresponse = $this->db->query( $listar_todos );     
    $dos = $dbresponse->result_array();

    $consultas = array('listar_todos' => $uno, 'listar_uno' => $dos);

    return $consultas;
}

function actualizarCiudades($idEmpresa,$nuevoIdCiudad)
{
    $queryUpdate = "UPDATE empresa SET idCountry = '".$nuevoIdCiudad."' WHERE idempresa = '".$idEmpresa."' "; 
    $dbresponse = $this->db->query( $queryUpdate );     
    return $dbresponse;
}






/**/
function load_eventos_propuesta($param){
    /**/   
    $query_get  = "SELECT * FROM evento WHERE status = '1' AND tipo = 'propuesta' and  idempresa = '".$param["idempresa"]."'  ";    
    $result =  $this->db->query($query_get);    
    return $this->result_array();

}
/*********************************************************************************************/
/*Solicita los eventos de la empresa */
function solicita_eventos_cliente($param){
    /** Evento, empresa ,   fecha,  tu cuidad ,  la fecha en que se espera  ***/
    $query_insert  = "INSERT INTO solicitud_evento_empresa(id_empresa , id_evento, id_cuidad ) 
                      VALUES(
                        '". $param["empresa"] ."' ,
                         '". $param["evento"]."' , 
                         '". $param["cuidad"] ."' ) "; 

    return $this->db->query($query_insert);
}
/*********************************************************************************************/
function load_artistas_like($param){    
    $query_get =  "SELECT * FROM artista WHERE nombre_artista like '%'". $param["nombre"] ."'%' "; 
    $result =  $this->db->query($query_get);  
    return  $result->result_array();
}
/*Validamos el artista*/
function insert_solicitud_artista($param){
    /*consultas si existe en la base de datos de artistas*/
        $query_get_artista ="SELECT * FROM  artista WHERE nombre  like = '". $param["nombre"] ."' ";
        $result_artista  =  $this->db->query($query_get_artista);
        $artista  =  $result_artista->result_array();
        $id_empresa =  $param["id_empresa"];       
        $id_ciudad  =  $param["id_ciudad"];
        $fecha_propuesta =  $param["fecha_propuesta"]; 
        /*si está ok insertas su referencia fecha , id_artista   */
        if (count($artista) > 0 ){

            $id_artista =  $artista[0]["id_artista"];  
                return $this->create_solicitud_artista($id_artista ,  $id_empresa,  $id_ciudad , $fecha_propuesta );
                
        }else{
            /*Si no esta lo insertas en la base de datos de artistas */            
            $query_insert ="INSERT INTO artista (nombre_artista) values ( '". $param["nombre"]  ."' )";
            $data[0] = $this->db->query($query_insert);
            $id_artista  = $this->db->insert_id();                     
                /*Aquí validaremos que no éxista*/       
                return  $this->create_solicitud_artista($id_artista ,  $id_empresa ,  $id_ciudad , $fecha_propuesta );        
        }
}

/*creamos la solicitu*/
function create_solicitud_artista($id_artista , $id_empresa , $id_ciudad , $fecha_propuesta ){
    /*Evento,  fecha,  tu cuidad ,  la fecha en que se espera */
    $query_insert =  "INSERT INTO solicitud_artista_org (id_artista , id_empresa , id_ciudad , fecha_propuesta ) VALUES('". $id_artista  ."' ,  '". $id_empresa ."' , '". $id_ciudad  ."'  , '". $fecha_propuesta   ."' )"; 
    return  $this->db->query($query_insert);
}
/**/

}/*Termina la función */
