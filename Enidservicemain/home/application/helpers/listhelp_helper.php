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


	/*RETORNA LA PLANTILLA EN CASO DE QUE EL CLIENTE AÚN NO HAYA REGISTRADO EVENTOS */
	function default_template_eventos(){
					$elements = "
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
                                                   <i class='fa fa-calendar-o'></i> 07/02/2015 - 07/04/2015 
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
		return $elements;

	}
	
	function getLastEventsEstratega($ultimos_eventos){
		$elements ="";
		
		if (count($ultimos_eventos) == 0 ) {

			$elements.= default_template_eventos();
		}

        foreach ($ultimos_eventos as $row){
			
			$urlnext = base_url('index.php/eventos/nuevo/'.$row["idevento"]."?start=".$row["fecha_inicio"] ."&end=".$row["fecha_termino"] );
			$id_evento = $row["idevento"];
			if (strlen(getimg_event($id_evento)) > 0){

				$portada = base_url()."application/uploads/uploads/".$id_evento."/" . getimg_event($id_evento);
			}else{
				$portada = base_url("application/img/example.jpg");					
			}

			
			$estadoevento = get_statusevent($row["estadoevento"]);			 
			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >

                                        <div class='media blog-cmnt'>
                                                <a href='$urlnext' class='pull-left'>
                                                    <img src='$portada' class='media-object'>
                                                </a>
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='$urlnext'> <label>".$row["nombre_evento"] ."</label>
                                                        ".  $row["edicion"] ." </a>

                                                    </h4>
                                                    <p class='mp-less'>
                                                        ". substr ($row["descripcion_evento"] , 0, 270) ."...
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                            <ul class='revenue-nav'>
		                                        <li><a href='#'><i class='fa fa-play'></i> Escenarios ". $row["totalescenarios"]."</a></li>		                                        
		                                        <li >
		                                        <a href='#'>
		                                        		<i class='fa fa-calendar-o'></i>
	                                                     ".  $row["fecha_inicio"]." -
	                                                     ".$row["fecha_termino"] ."
	                                            </a>
                                                </li>
                                                <li class='active' ><a href='#'>". $estadoevento ."</a></li>
                                                <li class=''> <a class='delete_evento' id='".$id_evento. "'  ><i class='delete_evento fa fa-trash-o' id='".$id_evento."'></i></a></li>
		                                    </ul>

                                        </div>

                                    </div>";
        }                            
		return $elements;                                    	
	}


/*****************************************************************************************/
	function get_statusevent($status){

			switch ($status) {
						case 0:
							$estado_evento = "En edición";
							break;
						case 1:
							$estado_evento = "Visible para el público";
							break;
						case 2:
							$estado_evento = "Pospuesto";
							break;

						case 2:
							$estado_evento = "Pasado";
							break;

						default:

							break;
					}

		return $estado_evento;			

	}		
/*************************************************** ******************************************/

	

	function getimg_event($id_event){


        $ds = "/";  
        $storeFolder = 'uploads';           
        $directorio = dirname(dirname(__FILE__)). "/". $storeFolder."/".$storeFolder."/".$id_event."/";
        
        
       
        $result  = array();        
        $files = scandir($directorio);     
        $img_name ="";
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['name'] = $file;                
                $img_name = $file;
                $result[] = $obj;
            }
        }
  



        
  		return $img_name;


	}




}/*Termina el helper*/
 