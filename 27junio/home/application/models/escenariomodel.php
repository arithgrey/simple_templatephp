<?php defined('BASEPATH') OR exit('No direct script access allowed');
class escenariomodel extends CI_Model {
function __construct(){
        parent::__construct();        
        $this->load->database();
}
/**/
		 
function update_descripcion_escenario_template($param , $id_escenario ,  $id_artista  , $id_usuario  , $id_empresa){	

	$contenido =  $param["contenido"];
	$escenario  =  $param["escenario"];

	$query_update ="update escenario set descripcion = (
		select descripcion_contenido from contenido where idcontenido='".$contenido ."') where 
		idescenario = '". $escenario ."' limit  1";
	
		$result =  $this->db->query($query_update);
		if ($result  == true){

			$actividad = "Actualizó la experiencia del escenario empleando una de sus plantillas"; 
			$this->record_log($actividad , $id_usuario , $id_empresa , $param["evento"] ,  'UPDATE' ,  $id_escenario );			
		}

	return $result; 
}
function get_artista_in_escenario($data){
	
	$query_get ="select * from escenario_artista where idescenario = '". $data["escenario"] ."' and idartista = '". $data["artista"]  ."'  ";
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/**/
function nuevo( $nombre , $evento ,  $id_empresa  , $id_usuario , $nombre_usuario ){

	$query_insert ="INSERT INTO escenario (nombre , idevento  ) values ('$nombre' , '$evento ' )";	
	$this->db->query($query_insert);
	$id_escenario = $this->db->insert_id(); 							
	/*Cargamos el log */
	if ($id_escenario > 0 ){		
		/**/
		$actividad = "con el nombre " . $nombre;		
		$this->record_log($actividad , $id_usuario , $id_empresa , $evento ,  'INSERT' ,  $id_escenario );		
		
	}
	return $id_escenario;
}	
/**/
function get_escenarios_byidevent($id_evento){
	/**/	
	
	$_num =  $this->carga_base_img_escenario(7 , 0);   
	$query_get ="select e.* , 
						e.idescenario id_escenario,  
						e.descripcion  as descripcion_escenario , 
						count(a.idartista) as num_artistas  
						, ea.* 
						, i.* 
						from escenario as e
						left outer join escenario_artista as ea 
						on e.idescenario = ea.idescenario 
						left outer join artista as a 
						on ea.idartista = a.idartista
						left outer join imagen_escenario ie on 
						e.idescenario  =  ie.id_escenario 
						left outer join  tmp_img_$_num  i on 
						ie.id_imagen =  i.idimagen 
						where e.idevento = '". $id_evento ."'
						group by e.idescenario order by tipoescenario  desc";
	
	$result= $this->db->query($query_get);
	$data_complete =   $result-> result_array();
	$_num =  $this->carga_base_img_escenario(7 , 1 , $_num );    
	return $data_complete;

}

/************************RETORNA LOS DATOS DE UN ESCENARIO POR MEDIO DE SI ID**************************************/
function load_escenario_byid( $idescenario,  $idempresa ){

	$query_get ="SELECT * FROM escenario WHERE idescenario = '".$idescenario."' ";
	$result = $this->db->query($query_get);
	$data["general"] =  $result->result_array();

	$query_get_artistas = "SELECT * FROM artista as a , escenario_artista as ea WHERE  
	 ea.idartista =  a.idartista and ea.idescenario='". $idescenario."' ";

	$resultartistas = $this->db->query($query_get_artistas);
	$data["artistas"] =  $resultartistas->result_array();

	return $data;




}	


/******************************RETORNA EL RESUMEN DE LOS ESCENARIOS DE A CUERDO AL EVENTO ********************************/
function load_by_event( $id_evento ){
	//2 para escenario 
	$_num =  $this->carga_base_img_escenario(2 , 0);   
	$query_get ="SELECT 
					e.idescenario , 
					e.nombre , 
					e.descripcion ,   
					e.idevento , 
					e.tipoescenario , 
					e.status , 
					e.fecha_presentacion_inicio , 
					e.fecha_presentacion_termino 
					, count(a.idartista) as numero_artistas
					, i.*
					FROM escenario as e LEFT OUTER JOIN  escenario_artista as ea 
					ON e.idescenario = ea.idescenario
					LEFT OUTER JOIN artista as a 
					ON ea.idartista =  a.idartista

					LEFT OUTER JOIN imagen_escenario  ie 
					ON  e.idescenario =  ie.id_escenario 

					LEFT OUTER JOIN tmp_img_$_num i 
					ON 	ie.id_imagen =  i.idimagen
					WHERE e.idevento='".$id_evento ."'
					GROUP BY  e.idescenario";

	$result = $this->db->query($query_get);
	$data_complete =  $result->result_array();
   	$_num =  $this->carga_base_img_escenario(2 , 1 , $_num ); 
	return $data_complete;	   

}	

function carga_base_img_escenario($tipo , $f  , $_num = 0 ){
      
      if($_num == 0 ) {
        $_num = mt_rand();       
      }

      $query_procedure ="CALL create_tmp_img(".$tipo." , $_num  , $f );";
      $this->db->query($query_procedure);
      return $_num;
}


function updatedescripcion( $nueva_descripcion , $evento , $idescenario,  $idempresa ) {

	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE idevento = '".$evento."' and  idescenario ='$idescenario' ";
	$result = $this->db->query($query_upload);
	return $result;	
}
function updatedescripcionbyid( $nueva_descripcion , $idescenario,  $idempresa ){
	$query_upload ="UPDATE  escenario set descripcion = '$nueva_descripcion' WHERE   idescenario ='$idescenario' limit 1";
	$result = $this->db->query($query_upload);
	return $result;	

}
function deleteescenariobyid( $idescenario,  $idempresa ){
	
	$query_delete ="call delete_escenacio_evento('". $idescenario ."');";	
	return $this->db->query($query_delete);
	 
}
function updateescenariotipobyid($id_escenario , $tipoescenario , $id_empresa ,  $id_usuario ,  $id_evento ){
	
	$query_upload ="UPDATE  escenario set tipoescenario = '$tipoescenario' 
	WHERE   idescenario ='$id_escenario' limit 1";
	$result = $this->db->query($query_upload);
	/*Log*/	
	if ($result ==  true ){
		$actividad = " el tipo de escenario";
		$this->record_log($actividad , $id_usuario , $id_empresa , $id_evento ,  "UPDATE" , $id_escenario );
	}
	return $result;	

}
function update_campo($idescenario , $nuevonombre, $campo ,  $idempresa , $id_usuario , $id_evento ){ 

	$query_update ="UPDATE  
					escenario 
					SET ". $campo ." = '". $nuevonombre ."' 
					WHERE   
					idescenario ='$idescenario' ";
	
					
	$result = $this->db->query($query_update);

	if ($result ==  1 ){
		$actividad = $this->construye_text_log($campo);
		$this->record_log($actividad , $id_usuario , $idempresa , $id_evento  ,   'UPDATE' , $idescenario);			   
	}
	return $result;	
	
}
/**/
function construye_text_log($campo){

	if ($campo =='nombre'|| $campo ='status'  ) {
		return "el ". $campo;
	}else{
		return "la " . $campo;
	}
}
/************************************************************************/
function updateescenarioinicioterminobyid($idescenario , $idempresa , $nuevoinicio , $nuevotermino){
	
	$query_update ="UPDATE  escenario set fecha_presentacion_inicio = '$nuevoinicio' , fecha_presentacion_termino='$nuevotermino' 
	WHERE   idescenario ='$idescenario' limit 1";
	$result = $this->db->query($query_update);
	return $result;	

}
/*************************************** ****************************************/
function get_escenariobyId($id_escenario){

	$query_get ="SELECT * FROM escenario WHERE idescenario ='".$id_escenario."' LIMIT 1 ";
	$result = $this->db->query($query_get);
	return $result->result_array();	
}
/*Todos los escenarios menos uno*/
function get_escenarios_byidevent_menosuno($id_evento, $id_escenario){

	$query_get ="select e.idescenario id_escenario,  e.descripcion  as descripcion_escenario , 
e.nombre, e.tipoescenario,  
count(a.idartista) as num_artistas , e.* ,  ea.* , i.* 
from escenario as e
left outer join escenario_artista as ea 
on e.idescenario = ea.idescenario and ea.url_sound_cloud is not null 
left outer join artista as a 
on ea.idartista = a.idartista
left outer join imagen_escenario ie on 
e.idescenario  =  ie.id_escenario 
left outer join  imagen i on 
ie.id_imagen =  i.idimagen 
where e.idevento = '".$id_evento."' and e.idescenario != '". $id_escenario ."'
group by e.idescenario order by tipoescenario  desc
";

	$result= $this->db->query($query_get);
	return $result-> result_array();
}
/*retorna la data de los escenarios dentro de un evento */
function get_escenarios_evento($id_evento){

	
	$_num =  $this->carga_base_img_escenario(2 , 0);  
	$query_get ="SELECT e.* , i.*   FROM escenario e 
				LEFT  OUTER JOIN imagen_escenario   ie 
				ON e.idescenario =  ie.id_escenario
				LEFT OUTER JOIN tmp_img_$_num  i 
				ON ie.id_imagen  =  i.idimagen 
				WHERE idevento = '". $id_evento ."'  group by idescenario";

	$result= $this->db->query($query_get);
	$data_complete =  $result->result_array();
	$this->carga_base_img_escenario(2 , 1 ,  $_num );  
	return $data_complete;
	

}
/**/
function get_campo_escenario($campo , $id_escenario){

	$query_get ='select '.$campo .'  from escenario  where idescenario = "'.$id_escenario.'" ' ;
	$result = $this->db->query($query_get);
	return $result->result_array();
}
/*retorna los generos del evento y si así se decea solo los del escenario */

function get_generos($id_escenario, $id_evento){
	$query_get = 'select g.*, gm.* from genero_musical g  inner join evento_genero_musical  gm on g.idgenero_musical = gm.idgenero_musical where gm.idevento ="'.$id_evento.'" ';
	$result = $this->db->query($query_get);
	return $result ->result_array();
}

/**/
function update_nota_escenario_artista($param){

	$query_update =  "update escenario_artista 
	set nota ='". $param["nota_artista"] ."'
	where 
	idartista = '". $param["artista"] ."' 
	and  
	idescenario = '". $param["escenario"] ."'  "; 
	return  $this->db->query($query_update);
	
	
	
}
/**/
function record_log($actividad , $idusuario , $idempresa , $id_evento ,  $accion , $id_escenario ){

	$query_insert="INSERT INTO log_evento(
				actividad  , 
				id_usuario , 
				idempresa , 
				id_evento  , 
				tipo , 
				accion ,
				id_escenario ) 
				VALUES(
					'". $actividad."' , 
					'". $idusuario  ."' ,  
					'". $idempresa ."' , 
					'". $id_evento ."' , 
					'2' , 
					'". $accion ."' , 
					'". $id_escenario ."' )";

	$this->db->query($query_insert);						
}	


/*Termina modelo */
}