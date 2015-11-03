<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){
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
		$list .=  "<tr><td>".$b."   </td><td>  ". $nombre."</td><td>". $input ."</td><tr>";
		$b++;

	}

	return $list;

}
/*********************************************************************************+*/
function get_list_objpermitidos( $array_objpermitidos ){

	$list_objpermitidos ='';
	$delay = 100;
	foreach ($array_objpermitidos as $row) {
		$list_objpermitidos .= '<li class="object-non-visible animated object-visible fadeIn" data-animation-effect="fadeIn" data-effect-delay="'.$delay.'"><i class="fa fa-check text-default"></i> '. $row["nombre"] .'</li>';

		if ($delay < 600) {
			$delay = $delay + 100;	
		}else{
			$delay = $delay - 100;	

		}
		
	}
    return $list_objpermitidos;								
}

/****************************+ Pagination  **********************************/

function get_paginarion_principal($limit_display){

	$anterior = "";
			switch ($limit_display) {
				case 3:
					$anterior = '<li class="active"><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 10:
					$anterior = '<li><a href="'. base_url('index.php/inicio/eventos/') .'">ANTERIOR</a></li>
					<li><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;
				case 50:
					$anterior = '<li><a href="'. base_url('index.php/inicio/eventos/10') .'">ANTERIOR</a></li>
					<li ><a href="'. base_url('index.php/inicio/eventos/') .'">3</a></li>
                    <li><a href="'. base_url('index.php/inicio/eventos/10') .'">10</a></li>
                    <li class="active"><a href="'. base_url('index.php/inicio/eventos/50').'">50</a></li>                    
                    <li><a href="'. base_url('index.php/inicio/eventos/1000').'">TODOS</a></li>';
					break;

				break;
				case 1000:
					$anterior = '<li><a href="'. base_url('index.php/inicio/eventos/50') .'">ANTERIOR</a></li>
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


function get_last_events_empresa($ultimos_eventos, $limit_text= 270 ,  $show_edit=0 , $show_delete = 0 ){
		$elements ="";
		
		if (count($ultimos_eventos) == 0 ) {

			$elements.= default_template_eventos();
		}

        foreach ($ultimos_eventos as $row){
			
			$urlnext = base_url('index.php/eventos/nuevo/'.$row["idevento"]."?start=".$row["fecha_inicio"] ."&end=".$row["fecha_termino"]."&status=".$row["status"] );
			$id_evento = $row["idevento"];
			
			
			$img = "<img src='". base_url($row["portada"])."' class='media-object'> ";

			$estadoevento = get_statusevent($row["status"]);			 
			$elements .="<div class='panel'>
                                    <div class='panel-body ' style='' >

                                        <div class='media blog-cmnt'>
                                                <a href='$urlnext' class='pull-left'>
                                                    ".$img."
                                                </a>
                                                <div class='media-body'>
                                                    <h4 class='media-heading' >
                                                        <a  href='$urlnext'> <label>".$row["nombre_evento"] ."</label>
                                                        ".  $row["edicion"] ." </a>

                                                    </h4>
                                                    <span style='font-size: 1em;' class='mp-less'>
                                                        ". substr ($row["descripcion_evento"] , 0, $limit_text) ."...
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                            <ul class='revenue-nav'>		                                        
		                                        <li>

		                                        <div class='btn-group-vertical' aria-label='Vertical button group'>
											      

											      <div class='escenarios_evento btn-group'    role='group'>
											        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>											          
											          <li>
											          <a href='#'><i class='fa fa-play'></i> </a></li> Escenarios ". $row["escenarios"]."
											          <span class='caret'></span>

											        </button>

											        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          
											          <div class='escenarios_in_event_".$id_evento."'  id='escenarios_in_event_".$id_evento." '></div>											          
											        </ul>

											      </div>											      
											    </div>


											    
											    <button  type='button' class='btn btn-default dropdown-toggle' 
											        style='background:#586D74 !important;' >											          
											          <li>
											          
											          <i class='fa fa-headphones'></i>
 													  </li> ". $row["artistas"]." Artistas

											          <span class='caret'></span>
											    </button>
											    



												<div class='btn-group-vertical' aria-label='Vertical button group'>											      
											      <div class='acceso_evento btn-group'    role='group'>
											        <button id='". $id_evento ."' type='button' class='btn btn-default dropdown-toggle' 
											        data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background:#0D6B8A !important;' >											          
											          <li>
											          <a style='background: #10382E !important' href='#'>
											          <i class='fa fa-money'></i>
 													  </a></li> ". $row["accesos"]." Accesos

											          <span class='caret'></span>
											        </button>
											        <ul class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>											          
											         
											          <div class='acceso_in_event_".$id_evento."'  id='acceso_in_event_".$id_evento." '></div>											          

											        </ul>
											      </div>											      
											    </div>


											   	
											   	
											    <button   type='button' class='btn btn-default dropdown-toggle puntos_venta_next' 
											        style='background:rgb(23, 78, 96) !important;' id='".$id_evento ."' >											          
											          
											          <li>
											          
											          <i class='fa fa-credit-card'></i>
 													  </li> ". $row["evento_punto_venta"]." puntos venta

											          <span class='caret'></span>
											    </button>
											    






		                                        <a class='edith-fecha-evento'  data-toggle='modal' data-target='#modal-update-evento'   id='". $row["idevento"]  ."'>
		                                        		<i class='fa fa-calendar-o'></i>
	                                                     ".  $row["fecha_inicio"]." -
	                                                     ".$row["fecha_termino"] ."
	                                            </a>
                                                </li>";

                                                if ($show_edit == 1 ){
                                                	$elements .="<li class='active' ><a href='#'>". $estadoevento ."</a></li>";
                                                }if ($show_delete == 1) {
                                               		$elements .=" <li class=''> <a class='delete_evento' id='".$id_evento. "'  ><i class='delete_evento fa fa-trash-o' id='".$id_evento."'></i></a></li>";		 	
                                                }
                                                
                                                $elements.="
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
	
/**/
function get_slider_img_evento($data){


    $slider = '<div class="row" style="padding:5%; background: #069F89; border-radius: 10px;" ><div id="Carousel-escenario" class="carousel slide" data-ride="carousel">';
    $slider .= '<div class="row"><ol class="carousel-indicators">';

    for ($a=0; $a <count($data); $a++) {                 
        if($a < 1 ){
            $slider .= '<li data-target="#Carousel-escenario" data-slide-to="'.$a.'" class="active"></li>';                
        }else{
            $slider .= '<li data-target="#Carousel-escenario" data-slide-to="'.$a.'" ></li>';        

        }        
    }
    $slider .= '</ol><div>';    
    $slider .='<div class="row"><div class="carousel-inner" role="listbox">';
    $flag =0;
    foreach ($data as $row) {   

        $path_img = $row["base_path_img"]. $row["nombre_imagen"]; 

        if ($flag < 1 ) {
            
            $slider .= '<div class="item active">
                      <img src="'. base_url($path_img) .'" alt="">
                    </div>';            
        }else{
            $slider .= '<div class="item">
                      <img src="'. base_url($path_img) .'" alt="">
                    </div>';        
        }        
        $flag ++;
    }
    $slider .= '</div></div>';

    $slider .= '<div class="row">  <a class="left carousel-control" href="#Carousel-escenario" role="button" data-slide="prev">
                <span class="fa fa-chevron-left  fa-3x" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="right carousel-control" href="#Carousel-escenario" role="button" data-slide="next">
                <span class="fa fa-chevron-right  fa-3x" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a></div>';
    $slider .= '</div></div></div></div>';
    return $slider;
}


	
	/***********************************************************************************/


	function get_slider_principal_evento($data){

		$b =0;
		$slider= '<div class="banner clearfix">              
        <div class="slideshow">          
          <div class="slider-banner-container">
            <div class="slider-banner-fullwidth-big-height">
              <ul class="slides">';

		foreach($data as $row){

			$imagen_evento =   $row["base_path_img"].$row["nombre_imagen"];
			
			if ($b%2 != 0) {
				$slider .='
			<li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="500" data-saveperformance="on" data-title="Next Generation Template">

                <img src="'. base_url($imagen_evento) .'" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">
                
              
                <div class="tp-caption dark-translucent-bg"
                  data-x="center"
                  data-y="bottom"
                  data-speed="600"
                  data-start="0">
                </div>

                <div class="tp-caption sfb fadeout large_white"
                  data-x="left"
                  data-y="150"
                  data-speed="500"
                  data-start="1000"
                  data-easing="easeOutQuad"
                  data-end="10000">Next Generation Template
                </div>  

               
                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="230" 
                  data-speed="500"
                  data-start="1300"
                  data-easing="easeOutQuad"
                  data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="fa fa-laptop"></i></span> 100% Responsive
                </div>

                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="290" 
                  data-speed="500"
                  data-start="1600"
                  data-easing="easeOutQuad"
                  data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-check"></i></span> Bootstrap Based
                </div>

               
                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="350" 
                  data-speed="500"
                  data-start="1900"
                  data-easing="easeOutQuad"
                  data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-gift"></i></span> Packed Full of Features
                </div>

                <div class="tp-caption sfb fadeout text-left medium_white"
                  data-x="left"
                  data-y="410" 
                  data-speed="500"
                  data-start="2200"
                  data-easing="easeOutQuad"
                  data-endspeed="600"><span class="icon default-bg circle small hidden-xs"><i class="icon-hourglass"></i></span> Very Easy to Customize
                </div>

                
                <div class="tp-caption sfb fadeout small_white"
                  data-x="left"
                  data-y="480"
                  data-speed="500"
                  data-start="2500"
                  data-easing="easeOutQuad"
                  data-endspeed="600"><a href="#" class="btn btn-default-transparent btn-lg btn-animated">Purchase <i class="fa fa-cart-arrow-down"></i></a>
                </div>

                </li>';                




			}else{

				$slider .= '<li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Inteligencia de negocio para tus eventos">
                
                
                <img src="'. base_url($imagen_evento)  .'" alt="slidebg1" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover">
                
                
                <div class="tp-caption dark-translucent-bg"
                  data-x="center"
                  data-y="bottom"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="0">
                </div>

                
                <div class="tp-caption sfr stl xlarge_white"
                  data-x="center"
                  data-y="70"
                  data-speed="200"
                  data-easing="easeOutQuad"
                  data-start="1000"
                  data-end="2500"
                  data-splitin="chars"
                  data-elementdelay="0.1"
                  data-endelementdelay="0.1"
                  data-splitout="chars">Eventos
                </div>

                
                <div class="tp-caption sfl str xlarge_white"
                  data-x="center"
                  data-y="70"
                  data-speed="200"
                  data-easing="easeOutQuad"
                  data-start="2500"
                  data-end="4000"
                  data-splitin="chars"
                  data-elementdelay="0.1"
                  data-endelementdelay="0.1"
                  data-splitout="chars">innovación
                </div>

                
                <div class="tp-caption sfr stt xlarge_white"
                  data-x="center"
                  data-y="70"
                  data-speed="200"
                  data-easing="easeOutQuad"
                  data-start="4000"
                  data-end="6000"
                  data-splitin="chars"
                  data-elementdelay="0.1"
                  data-endelementdelay="0.1"
                  data-splitout="chars"
                  data-endspeed="400">Sucesos
                </div>          

                
                <div class="tp-caption sft fadeout text-center large_white"
                  data-x="center"
                  data-y="70"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="6400"
                  data-end="10000"><span class="logo-font">El<span class="text-default">proyecto</span></span> <br> que cambiará la forma de organizar eventos
                </div>  

                
                <div class="tp-caption sfr fadeout"
                  data-x="center"
                  data-y="210"
                  data-hoffset="-232"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="1000"
                  data-end="5500"><span class="icon large circle"><i class="circle fa fa-play-circle-o"></i></span>
                </div>

                
                <div class="tp-caption sfl fadeout"
                  data-x="center"
                  data-y="210"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="2500"
                  data-end="5500"><span class="icon large circle"><i class="circle fa fa-line-chart"></i></span>
                </div>

                
                <div class="tp-caption sfr fadeout"
                  data-x="center"
                  data-y="210"
                  data-hoffset="232"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="4000"
                  data-end="5500"><span class="icon large circle"><i class="circle fa fa-globe"></i></span>
                </div>

                
                <div class="tp-caption ZoomIn fadeout text-center tp-resizeme large_white"
                  data-x="center"
                  data-y="170"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="6400"
                  data-end="10000"><div class="separator light"></div>
                </div>  

                
                <div class="tp-caption sft fadeout medium_white text-center"
                  data-x="center"
                  data-y="210"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="5800"
                  data-end="10000"
                  data-endspeed="600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Nesciunt, maiores, aliquid. Repellat eum numquam aliquid culpa offici, <br> tenetur fugiat dolorum sapiente eligendi...
                </div>

                
                <div class="tp-caption fade fadeout"
                  data-x="center"
                  data-y="bottom"
                  data-voffset="100"
                  data-speed="500"
                  data-easing="easeOutQuad"
                  data-start="2000"
                  data-end="10000"
                  data-endspeed="200">
                  <a href="#page-start" class="btn btn-lg moving smooth-scroll"><i class="icon-down-open-big"></i><i class="icon-down-open-big"></i><i class="icon-down-open-big"></i></a>
                </div>
                </li>
                ';
			}

			










			$b++;


		}


		$slider .= '</ul>
              <div class="tp-bannertimer"></div>
            </div>
          </div>
        
        </div>
        
</div>';
		return $slider;
	}




}/*Termina el helper*/