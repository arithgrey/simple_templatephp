<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time')){

/*******************************************************************************************************/
/*Retornamos la vista que desplegará  en principal*/
	
	/*Get lista reportes del sistema Enid service */
	function getListrepo($list_repo_system )
	{
		$list ="";
		foreach ($list_repo_system as $key => $row) {
				
				$list .= "<tr><td class=''>". $row["idreportesystema"] ."</td>";
	            $list .= "<td class='blue-col-enid'>". $row["reporte"] ."</td>";
	            $list .= "<td>". $row["descripcionreporte"]."</td>";

	            
	            $update_text_status="update-text-status-". $row["idreportesystema"];                     
	            $list .= "<td class='update-status-repo' id='". $row["idreportesystema"] . "' data-toggle='modal' data-target='#basicModalupdatestatus'  >	            
	            <div id='".$update_text_status."'> "  .$row["status_repo"] ." </div> </td>";
	            $list .= "<td>". $row["tiporeporte"]."</td>";
	            $list .= "<td>". getTimeFormat3( $row["fecha_registro"])  ."</td></tr>";
			

			}	
		return  $list;
	}/*Termina función*/


	function getLastEventsEstratega($ultimos_eventos){
		$elements ="";



		if (count($ultimos_eventos) == 0 ) {
			$elements .= "
								<div class='panel'>
                                    <div class='panel-body ' style='' >
                                        <div class='media blog-cmnt'>
                                                <a href='javascript:;' class='pull-left'>
                                                    <img alt='' src='". base_url('application/img/example.jpg') ."' class='media-object'>
                                                </a>
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='#'>Fantastic event (ejemplo)</a>
                                                    </h4>
                                                    <p class='mp-less'>
                                                        Celebrando un exitoso año y cumpliendo ya 15 años haciendo historia de la música electrónica en México, nos enorgullecemos en presentar nuestra tercera edición del Festival I love this generation ...
                                                    </p>
                                                    07/02/2015 - 07/04/2015 
                                                </div>
                                            </div>
                                        </div>
                                    </div>";


		}


		
        foreach ($ultimos_eventos as $row){
			
			$urlnext = base_url('index.php/eventos/nuevo?evento='.$row["idevento"]."&start=".$row["fecha_inicio"] ."&end=".$row["fecha_termino"] );
			$portada = "";
			if(validatenotnullnotspace($row["portada"])){
				
				$portada =  $row["portada"];	

			}else{
				
				$portada = base_url('application/img/example.jpg');
			}

			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >
                                        <div class='media blog-cmnt'>
                                                <a href='$urlnext' class='pull-left'>
                                                    <img src='$portada' class='media-object'>
                                                </a>
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='$urlnext'> <label>".$row["nombre_evento"] ."</label>
                                                        ".$row["edicion"]."</a>

                                                    </h4>
                                                    <p class='mp-less'>
                                                        ".$row["descripcion_evento"]."
                                                    </p>
                                                     ".$row["fecha_inicio"]." -
                                                     ".$row["fecha_termino"] ."
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
        }                            
		return $elements;                                    	
	}



}/*Termina el helper*/
 