<?php defined('BASEPATH') OR exit('No direct script access allowed');
class organizacionmodel extends CI_Model {
    function __construct(){
            parent::__construct();        
            $this->load->database();
    }

function update_q($id_empresa, $param){

    $query_update ="update empresa set ". $param["q"] ." = '".$param["value"]."' WHERE idempresa='".$id_empresa."' limit 1";

    return $this->db->query($query_update);
}


function mostrarCiudades($idEmpresa)
{
    $query_get = " SELECT * FROM countries ";
    $result = $this->db->query( $query_get );
    $uno= $result->result_array();

    $query_get_empresa_countries = "SELECT countries.idCountry from empresa, countries where empresa.idempresa = '".$idEmpresa."' and empresa.idCountry = countries.idCountry";
    $db_reponse = $this->db->query( $query_get_empresa_countries );     
    $dos = $db_reponse->result_array();

    $consultas = array('listar_todos' => $uno, 'listar_uno' => $dos);

    return $consultas;
}

function actualizarCiudades($idEmpresa,$nuevoIdCiudad)
{
    $query_get = "UPDATE empresa SET idCountry = '".$nuevoIdCiudad."' WHERE idempresa = '".$idEmpresa."'  limit 1"; 
    $db_reponse = $this->db->query( $query_get );     
    return $db_reponse;
}
/**/
function get_posibles_artitas($param){
    $query_get = "SELECT * FROM artista WHERE  nombre_artista like '%". $param["artista"] . "%' limit 5";
    $result = $this->db->query($query_get);
    return $result->result_array();
}
}/*Termina la función */