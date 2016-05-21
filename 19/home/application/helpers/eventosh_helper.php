<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
/**/
function load_complete_genero($data){
	    $table = "";
	    $table .= '<table class="table table-bordered">
	    	<tr class="text-center enid-header-table">';
	    $table .= get_td("#" , "");  
	    $table .= get_td("Genero musical" , "");	   
	    
	    $table .= '</tr>';            
	    $flag =  1;
	    foreach ($data as $row) {

	        $table .=  "<tr>"; 
	        $table .= get_td($flag , "");
	        $table .= get_td($row["nombre"], "");
	        
	        $table .=  "</tr>"; 
	        $flag ++; 
	    }
	    return $table; 
}
/**/
function proximos_eventos($data){
	$proximos_eventos =  "";  
	foreach ($data as $row){
		
		$id_evento		=  $row["idevento"];
		$nombre_evento	=  $row["nombre_evento"];
		$fecha_inicio =  $row["fecha_inicio"];	
		$url = base_url('index.php/eventos/visualizar/')."/" .  $id_evento;
		$proximos_eventos .=  "<a href='". $url ."'><button style='background:#093245; color:white;' class='btn btn-default'>". $nombre_evento ."</button></a>";
	}
	return $proximos_eventos;
}

/**/
function listobjetosp( $arreglo ){ 	
	
	$list ="";
	$b =1;
	foreach ( $arreglo as $row) {		  		   
		$idobjetopermitido = $row["idobjetopermitido"];
		$nombre = $row["nombre"];
		$descripcion = $row["descripcion"];
		$idevento = $row["idevento"];
		

		if ($idevento != null  ) {
			$input ="<input type='checkbox' class='objpermitido' id='". $idobjetopermitido ."' checked >";	
		}else{
			$input ="<input type='checkbox' class='objpermitido' id='".$idobjetopermitido ."' >";
		}		


		$list .=  "<tr>";
			$list .= get_td($b , ""); 
			$list .= get_td($nombre, ""); 
			$list .= get_td($input  , ""); 
		$list .= "<tr>";
		$b++;
	}
	return $list;

}
/*********************************************************************************+*/
function get_list_objpermitidos( $data ){


	$list_objpermitidos ='<div>
								<ul>';
	foreach ($data as $row) {
		$list_objpermitidos .= '<li class="objeto-permitido-evento">
									<i class="fa fa-check text-default">
									</i> '
									. $row["nombre"].'
										<div class="descripcion-objeto-permitido" >'.								
											$row["descripcion"]
											.
										'</div>
									</li>';

		
	}
	$list_objpermitidos .='</ul></div>';
    return $list_objpermitidos;								
}

/****************************+ Pagination  **********************************/

function get_pagination_principal($limit_display){

	$anterior = "";
			switch ($limit_display) {
				case 3:
					$anterior = '<li class="active" title="Mostrar"><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 10:
					$anterior = '<li title="Mostrar" ><a href="'. base_url('index.php/inicio/eventos/') .'">ANTERIOR</a></li>
					<li><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 50:
					$anterior = '<li title="Mostrar"><a href="'. base_url('index.php/inicio/eventos/10') .'">ANTERIOR</a></li>
					<li ><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;

				break;
				case 1000:
					$anterior = '<li title="Mostrar" ><a href="'. base_url('index.php/inicio/eventos/50') .'">ANTERIOR</a></li>
					<li ><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li ><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
						

				default:
					$anterior = "";
					break;
			}


		$dinamic_pagination = '<div class="text-center">
                <ul class="pagination blog-pagination">                    
                	'. $anterior.'	
                </ul>

            </div>';
            return  $dinamic_pagination;

}

/***********************************END PAGINATION ****************************/
function get_experiencia_last_events_by_empresa($data_eventos){
$elements ="";


	foreach ($data_eventos as $row){
			
			$urlnext = base_url();
			$id_evento = $row["idevento"];			
			
			$estadoevento = get_statusevent($row["estadoevento"]);			 
			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >

                                        <div class='media blog-cmnt'>
                                                
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='$urlnext'> <label>".$row["nombre_evento"] ."</label>
                                                        ".  $row["edicion"] ." </a>

                                                    </h4>
                                                      <ul class='revenue-nav'>
				                                        <li><a href='#'><i class='fa fa-play'></i> Escenarios ". $row[""]."</a></li>		                                        		                                        
				                                    </ul>
                                                    
                                                </div>
                                            </div>
                                          

                                        </div>

                                    </div>";
        }                            
		return $elements;                                    	
}	
/**/
function get_date_event_format($inicio , $termino){

	$date="";
	if ($inicio == $termino) {
		$date = $inicio;		
	}else{
		$date = $inicio ." al " . $termino;
	}
	return $date;
}
/*Últimos eventos */
function get_last_events_empresa($ultimos_eventos, $limit_text= 270 ,  $show_edit=0 , $show_delete = 0 , $show_view_like_public = 0){
		$elements ="";		
		if (count($ultimos_eventos) == 0 ) {
			$elements.= default_template_eventos();
		}
        foreach ($ultimos_eventos as $row){
			
			$urlnext = base_url('index.php/eventos/nuevo/'.$row["idevento"]);
			$id_evento = $row["idevento"];
			
			
			$img  = create_icon_img($row ,  " " , " " ); 			
			//$img =  '<img  src="data:image/jpeg;base64, '. base64_encode($row["img"])  .'  " />';

			$estadoevento = get_statusevent($row["status"]);			 
			$view_like= "";
			$estado_event =  "";
			$delete_event  =  ""; 	

			if ($show_view_like_public ==  1 ) {

				$view_like  .="<a title='Ver como el público'  class='view-event ' href='". base_url('index.php/eventos/visualizar/') ."/". $id_evento."'> 
							 	<i class='fa  fa-arrow-circle-o-right fa-2x'></i>					          
							   </a>";
			}
			if ($show_edit == 1 ){
				$estado_event .="<a href='#'>". $estadoevento ."</a>";
			}if ($show_delete == 1) {
				$delete_event  .="<a class='delete_evento' id='".$id_evento. "'  >
									<i class='delete_evento fa fa-trash-o fa-2x' id='".$id_evento."'></i>
								  </a>";		 	
			}
                                                


			$elements .="<div class='panel'>
                                    <div class='panel-body '>
                                        <div class='media blog-cmnt'>
                                                <a href='$urlnext' class='pull-left'>
                                                    ".$img."
                                                </a>
                                                <div class='media-body'>
                                                    <h4>
                                                        <a style='color: black !important; ' href='$urlnext'> 
                                                        <label>".$row["nombre_evento"] ."</label>
                                                        ".  $row["edicion"] ." </a>
                                                    </h4>
                                                    <span style='font-size: .9em; color: #7E908A' class='mp-less'>
                                                        ". substr ($row["descripcion_evento"] , 0, $limit_text) ."...	                                                    
		                                                    <div class='pull-right'>	                                                  	
			                                                  	
			                                                  	$delete_event
			                                                  	$view_like   
			                                                    <a  class='edith-fecha-evento'  data-toggle='modal' data-target='#modal-update-evento'   id='". $row["idevento"]  ."'>
					                                        		<i class='fa fa-calendar-o fa-2x'></i> ".  $row["fecha_inicio"]." - ".$row["fecha_termino"] ."
				                                            	</a>
			                                            	<div>
                                                    </span>                                                                                                        
                                                </div>
                                            </div>
                                        </div>    
                                    </div>    


                                            
                                     <ul class='revenue-nav'>		                                        
		                                <li>
		                                        <div class='btn-group-vertical'>											      
											      	<div class='escenarios_evento btn-group' role='group' >
												        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  >											          
												          	<li>
												          		<a style='background:black; color:white;' href='#'>
												          			<i class='fa fa-play'></i>
												          		</a>
												          	</li> 
												          	Escenarios ". $row["escenarios"]."
												          	<span class='caret'></span>
												        </button>

												        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1' >											          
												          <div class='escenarios_in_event_".$id_evento." '   id='escenarios_in_event_".$id_evento." '></div>											          
												        </ul>

											      	</div>											      
											    </div>


											    <div class='btn-group-vertical'>											      
											      	<div class='escenarios_artistas_principal btn-group' role='group'>
												        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'  >											          
												          	<li>
												          		<a style='background:black; color:white;' href='#'>
												          			<i class='fa fa-headphones'></i> 	
												          		</a>
												          	</li> Artistas  ". $row["artistas"]." 
												          	<span class='caret'></span>
												        </button>

												        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1' >											          
												          <div class='artistas_in_event_".$id_evento."'  id='artistas_in_event_".$id_evento." '></div>											          
												        </ul>
											      	</div>											      
											    </div>


												<div class='btn-group-vertical' aria-label='Vertical button group'>											      
												    <div class='acceso_evento btn-group'    role='group'>
												        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle'  data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >											          
												          <li>
													          <a style='background:black; color:white;' href='#'>
													          	<i class='fa fa-money'></i>
		 													  </a>
	 													  </li> ". $row["accesos"]." Accesos
												          <span class='caret'></span>
												        </button>
												        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          												         
												         	<div class='acceso_in_event_".$id_evento."'  id='acceso_in_event_".$id_evento." '></div>											          
												        </ul>
												    </div>											      
											    </div>


											

												<div class='btn-group-vertical' aria-label='Vertical button group'>											      
												    <div class='puntos_venta_principal btn-group'    role='group'>
												        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle '   data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' >											          
												          <li>
													          <a style='background:black; color:white;' href='#'>
													          	<i class='fa fa-credit-card'></i> 
		 													  </a>
	 													  </li> ". $row["evento_punto_venta"]." Puntos venta
												          <span class='caret'></span>
												         </button>
												          <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          												         
												         	<div class='puntos_venta_in_event_".$id_evento."'  id='puntos_venta_in_event_".$id_evento." '></div>											          
												          </ul>

												       
												        
												    </div>											      
											    </div>
															   	
											   
											    

                                                </li>

                                                
                                                
		                                    </ul>		                                    
                                        </div>
                                        
                                    </div>";
        }                            
		return $elements;                                    	
	}



/*****************************************************************************************/
/*RETORNA LA PLANTILLA EN CASO DE QUE EL CLIENTE AÚN NO HAYA REGISTRADO EVENTOS */
	function default_template_eventos(){
					$elements = "
								<div class='panel' title='Ejemplo' >
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

/**/
function get_slider_img_evento($data){

	$slider = '<div class="carousel-inner">'; 
	$flag = 0; 
	$class =''; 



	if (count($data) ==  0 ){

			
			$slider .=  '
	            <div class="item  active ">
	                <div class="row">
	                    <div class="col-xs-6 col-sm-5 col-md-5">
	                        <a href=""> 
	                         <img src="" class="thumbnail">
	                        </a>
	                    </div>
	                    <div class="col-xs-6 col-sm-7 col-md-7">
	                        Registra images al evento.!
	                    </div>
	                </div>                    
	            </div>
	            ';
	}		
    foreach ($data as $row) {    		
	   	$img =  create_icon_img($row , 'thumbnail' , ' ' );  	
	   	if ($flag == 0 ) {
	   		$class= ' active ';
	   		$flag++;
	   	}else{
	   		$class= '';
	   	}
	   	$slider .=  '
	            <div class="item  '. $class .' ">
	                <div class="row">
	                    <div class="col-xs-6 col-sm-5 col-md-5">
	                        <a href=""> 
	                          '. $img .'
	                        </a>
	                    </div>
	                    <div class="col-xs-6 col-sm-7 col-md-7">
	                              Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
	                              euismod tincidunt ut laoreet..
	                    </div>
	                </div>                    
	            </div>
	            ';
	}

	    $slider .= '</div>';     
    return $slider;
}


	
	/***********************************************************************************/
	function get_slider_principal_evento($imgs , $data_evento){
		$imgs_evento ="";
		$class_extra ="";
		$flags ="";
		$flag =1; 
		$imgs_evento .= '<div class="item active">

								<div style="height:750px;">
									<center>
							            <label style="font-size:4em;" class="text-center">
							                	'. $data_evento["nombre_evento"]  .'
							            </label>				                
						            </center>
					            </div>
				                <div class="carousel-caption">
				                    <h3>
				                   	'. $data_evento["eslogan"] .'
				                    </h3>				                   
				                </div>
				            </div>';

		
		$flags .= '<li data-target="#myCarousel" data-slide-to="0" class="active">
		                <a href="#">		                    
		                    <small>
		                    La experiencia 
		                    </small>
		                </a>
		            </li>
           			'; 		            

			            

		foreach($imgs as $row){

			$img =  create_icon_img($row , " "  , " " ); 
			
			$imgs_evento .= '<div class="item ">
				                '. $img .'
				                <div class="carousel-caption">
				                    <h3>
				                        Headline</h3>
				                    <p>
				                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
				                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem
				                        ipsum dolor sit amet, consetetur sadipscing elitr.</p>
				                </div>
				            </div>';

			$flags .= '<li data-target="#myCarousel" data-slide-to="'.$flag.'" class="">
		                <a href="#">
		                    About
		                    <small>Lorem ipsum dolor sit
		                    </small>
		                </a>
		            </li>
           			'; 		            


			$flag ++;			            
		}

		$slider["imagenes"] =  $imgs_evento; 
		$slider["flags"] =  $flags;
		return $slider;
	}

}/*Termina el helper*/

