<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
 