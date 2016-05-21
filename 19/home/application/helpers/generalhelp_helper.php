<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){



  /**/
  function genera_color_notificacion_admin($tipo){

      switch ($tipo) {
        case 1:
          return "background: rgb(174, 13, 80);";
          break;
        case 2:
          return "background: black;";
          break;

        case 3:
          return "background : rgba(3, 125, 255, 0.82);";
          break;
          
        case 4:
          return "background:#F15B4F;";
          break;
              
        default:
          
          break;
      }

  }

  /**/
        
  function create_icon_img($row , $class, $id , $extra= '' ,  $letra ='[Img]' ){      

    
    $color_random = 'background : rgb(174, 13, 80); color:white;';  
    if (strlen($row["nombre_imagen"]) > 2  ){        
      $img =  '<img '. $extra .' class="'. $class .'" id="'.$id.'"   src="data:image/jpeg;base64, '. base64_encode($row["img"])  .'  " />';
      return $img;      
    }else{
      /*Generamos color al de fondo */           
      return  "<div ". $extra."  style = '". $color_random."' class='img-icon-enid text-center ". $class ." ' id='".$id  ."'  >". $letra ."</div>";
    }    
  }
  
 /**/
  function simula_img($url , $class, $id , $title , $flag , $letra ='A' ){      
    $color_random = 'background : rgb(174, 13, 80); color:white; padding:50px;';    
    return  "<div style = '". $color_random."' class='img-icon-enid". $class ." ' id='".$id  ."'  title='". $title ."' >". $letra ."</div>";
    
  }
     


  /*
  */

  function filtro_enid($data,  $class , $id ,  $tupla , $in , $end , $msj  ){    
    
    $filtro ="<div class='panel-heading blue-col-enid text-center' >
                ". $msj ."
                <hr>
              ";    
    $filtro .= "<h5 class='text-center'>Secciona para añadir</h5>";           
    $filtro .= "</div>";           
    $filtro .= "<div class='panel panel-body-enid'>               
               <ul>";        

    $b = 0;            
      foreach ($data as $row){
          /* Tupla de indormación */
          $filtro .= "<li class='".$class." enid-filtro-busqueda' id='". $row[$id] ."'>";                    

          foreach ($tupla as $key => $value){

            $param   =  $tupla[$key];  
            $valor   =  $row[$param]; 

              if($b == 0 ){                            
                $filtro .= create_icon_img($row , " ", " " ); 
                $b ++; 

              }elseif($param == "nombre"){
                  $filtro .=  $valor;                                     
              }elseif($param ==  $in ){              
                $filtro .= "(" . $valor . " ) "; 
              }elseif ($param ==  $end) {
                  $filtro .= " - " . $valor ;   
              }else{
                
              }            
              /**/  

          } 
          $b = 0;         
          $filtro .= "</li>";
      } 

      /****************************************************************************************/      
      if (count($data) == 0 ){

          $filtro .=  "<em style='color:white; text-align:center;' >Sin resultados</em>"; 
      }
      $filtro .="</ul>";
      $filtro .="</div>";
      return $filtro; 
  }
  /**/
  function get_dias_restantes_evento($data){

    $dias_restantes  = $data[0]["dias"];
    if ($dias_restantes  == 0 ) {
      $dias_restantes = "Hoy es el evento"; 
    }elseif ($dias_restantes  == 1 ) {      
      $dias_restantes = "Falta un día para el evento";  
    }elseif ($dias_restantes > 0 &&  $dias_restantes != 1   ) {
      $dias_restantes = "Falta " . $dias_restantes . " días";  
    }else{
     $dias_restantes = "El evento sucedío hace " . abs($dias_restantes) . " días"; 
    }
    return $dias_restantes;
  }
  function get_starts($val){

    $l =  "";
    for ($a=0; $a < $val; $a++) { 
      $l .=  "<i class='fa fa-star text-default'></i>";
    }
    return $l; 
  }
  /**/
  function get_start($val , $comparacion ){
    
      if ($val ==  $comparacion ) {
        return  $val . " <i class='fa fa-star'></i>"; 
      }else{
        return  $val;
      }
  }
  /**/
  function create_data_list($data  , $value  ,  $id_data_list){

    $data_list =  "<datalist id='". $id_data_list."'>"; 
    foreach ($data as $row) {
      $data_list .=  "<option value='". $row[$value]."' >";
    }
    $data_list .=  "</datalist>"; 
    return $data_list; 
  }
  /*Crea select*/
  function create_select($data , $name , $class , $id , $text_option , $val ){

    $select ="<select name='". $name ."'  class='".$class ."'  id='". $id ."'> ";

      foreach ($data as $row) {      
        $select .=  "<option value='". $row[$val] ."'>". $row[$text_option]." </option>";
      }

    $select .="</select>";
    return $select;
  }
  /**/
  function get_td($val , $extra){
    return "<td style='font-size:.71em !important; text-align:center !important;' ". $extra .">". $val ."</td>";
  }

  function get_td_val($val , $extra){
    if ($val!="" ) {
      return "<td style='font-size:.71em !important; text-align:center !important;' ". $extra .">". $val ."</td>";  
    }else{
      return "<td style='font-size:.71em !important; text-align:center !important;' ". $extra .">0</td>";
    }
    
  }
/**/
  function get_count_select($inicio, $fin , $text_intermedio , $selected){


      $options ="";
      while ($inicio <= $fin) {
        
        if ($selected ==  $inicio ) {
          $options .="<option  selected value='". $inicio ."'>". $inicio ."</option>";
        }else{
          $options .="<option value='". $inicio ."'>". $inicio ."</option>";  
        }
        

        $inicio ++;    
      }

      
      return  $options;

  }
	/*Mes en letras*/
  
	function validatenotnullnotspace($cadena){	

		if (strlen($cadena )>0  ) {
			if ($cadena == null ) {
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}


	}/*End function*/




function get_tags_generos($arreglo_generos){  
    $tags_generos ='<ul class="revenue-nav">';
    foreach ($arreglo_generos as $row) {      
      $tags_generos .='<li>
                          <a style="text-decoration:none;" href="#">'.
                            $row["nombre"].'
                          </a>
                        </li>';
    }
    $tags_generos .="</ul>";
    return $tags_generos;

}

  /*Filtros */

  function validate_text($texto){

       $texto = str_replace('"','', strip_tags($texto ));  
       $texto = str_replace("'",'', strip_tags($texto ));   
       return $texto;

  }


  /**/

  function valida_text_replace($texto_a_validar, $null_msj , $sin_text_msj, $class="" ){

    $dinamic_text =""; 
        if ($texto_a_validar == null ) {                   
            $dinamic_text=  $null_msj;
        }else if( strlen($texto_a_validar) ==  0 ){                  
            $dinamic_text=  $sin_text_msj;
        }else if( trim($texto_a_validar) ==  "" ){                  
            $dinamic_text=  $sin_text_msj;
        }else{
            $dinamic_text=   $texto_a_validar;
        }
        /*Mandamos scroll si es necesario*/
        if (strlen($dinamic_text)> 400 ) {

            $dinamic_text ="<div class='scroll-vertical-enid' style='height:250px;'>
                              <span class='$class'>" . 
                                $dinamic_text . 
                              "</span>
                            </div>";
        }else{
            $dinamic_text ="<div>
                              <span class='".$class."'  >
                              " . $dinamic_text . "
                              </span>
                            </div>";
        }
        
        return $dinamic_text;
}
function get_statusevent($status){

      $estado_evento ="";
      switch ($status) {
            case 0:
              $estado_evento = "Edición";
              break;
            case 1:
              $estado_evento = "Visible";
              break;
            case 2:
              $estado_evento = "Visible cancelado";
              break;            
            case 3:
              $estado_evento = "Visible pospuesto";
              break;            
            case 4:
              $estado_evento = "Cancelado";             
              break;                            
            case 5:
              $estado_evento = "Programado";              
              break;                              
            default:

              break;
          }

    return $estado_evento;      

  } 
  /**/
  /***/
  function dias_evento($dias_evento){
    /**/
    $response =  ""; 
    if ($dias_evento < 0 ){
      $response =  "El evento ya ha sucedido"; 
    }else if($dias_evento == 0 ){
      $response =  "Éste día es el evento";           
    }else{
      $response =   "Días para el evento " .  $dias_evento;
    }

    return $response;
  }
  /**/
  function now_enid(){
    return  date('Y-m-d');
  }

  function create_select_num($name){
      $select = "<select name='". $name ."' id='". $name   ."' class='form-control ". $name   ."'>";

        for ($i=1; $i < 700; $i++) {           
            $select .= "<option value='". $i ."'>". $i ." artistas  </option> ";
        } 
        
      $select .= "<select>";
      return $select;
  }
  /*Select que general la edad*/
  function create_select_edad_form($name){
      $select = "<select name='". $name ."' id='". $name   ."' class='form-control ". $name   ."'>";

        for ($i=15; $i < 70; $i++) {           
            $select .= "<option value='". $i ."'>". $i ." Años </option> ";
        } 
        
      $select .= "<select>";
      return $select;
  }
  /**/

  function limits_tables($url_base , $limit){



      if ($limit ==  10){
        $next = '<ul class="pagination blog-pagination">                          
                  <li title="Mostrar" class="active">
                    <a href="'. base_url($url_base).'/10">10</a>
                  </li>
                  <li>
                    <a href="'.base_url($url_base).'/30">30</a>
                  </li>
                  <li>
                    <a href="'.base_url($url_base ).'/50">50</a>
                  </li>                    
                  <li>
                    <a href="'.base_url($url_base).'/all">TODOS</a>
                  </li> 
                </ul>';        
        }elseif ($limit ==  30 ) {
          $next = '<ul class="pagination blog-pagination">                          
                  <li title="Mostrar" >
                    <a href="'. base_url($url_base).'/10">10</a>
                  </li>
                  <li class="active">
                    <a href="'.base_url($url_base).'/30">30</a>
                  </li>
                  <li>
                    <a href="'.base_url($url_base ).'/50">50</a>
                  </li>                    
                  <li>
                    <a href="'.base_url($url_base).'/all">TODOS</a>
                  </li> 
                </ul>';        
        }elseif ($limit == 50) {
          $next = '<ul class="pagination blog-pagination">                          
                  <li title="Mostrar" >
                    <a href="'. base_url($url_base).'/10">10</a>
                  </li>
                  <li >
                    <a href="'.base_url($url_base).'/30">30</a>
                  </li>
                  <li class="active">
                    <a href="'.base_url($url_base ).'/50">50</a>
                  </li>                    
                  <li>
                    <a href="'.base_url($url_base).'/all">TODOS</a>
                  </li> 
                </ul>';        
        }else{
           $next = '<ul class="pagination blog-pagination">                          
                  <li title="Mostrar" >
                    <a href="'. base_url($url_base).'/10">10</a>
                  </li>
                  <li >
                    <a href="'.base_url($url_base).'/30">30</a>
                  </li>
                  <li >
                    <a href="'.base_url($url_base ).'/50">50</a>
                  </li>                    
                  <li class="active">
                    <a href="'.base_url($url_base).'/all">TODOS</a>
                  </li> 
                </ul>';     
        }
      
      return $next;          
  }

  /**/
  function fechas_enid_format($f_inicio , $f_termino ){
      
    if ($f_inicio !=  $f_termino) {
      $f_inicio = $f_inicio  . " al " . $f_termino ;
    }
    return $f_inicio;
  }
  /**/
  function dinamic_class_table($a){
    $style ="";
    if ($a%2 == 0) {
      $style = "style='background:#F7F8F0;' ";   
    }
    return $style;
  }
  /*Construimos la url de l evento público */
  function create_url_evento_public($nombre, $id_evento , $extra='' ){

    $url =  base_url('/index.php/eventos/visualizar') . "/". $id_evento;
    return "<a href='". $url ."'  $extra >" . $nombre ."</a>";
  }
  /**/  
  function url_edit_user($url ,  $text ){

    $url_next =  "<a href='".$url."' style='color:white;'>
                    ". $text."
                    <i class='fa fa-pencil-square-o'>
                    </i>
                  </a>";  
    return $url_next;                
  }

  /**/
  function edita_section_mensaje_comunidad($val ,  $session , $class='' ){  

    /*mensaje más  editar */    
    $mensaje =  "<p>". $val ."</p>"; 
    if ($session == 1 ){
        $mensaje =  "<p $class >". $val ."</p>"; 
        $mensaje .="<textarea rows='5' style='display:none;' cols='20' class='form-control' id='comunidad-mensaje-input' name='mensaje-comunidad' placeholder='Cómo la comunidad de tu organización'>".$val."</textarea>'";         
        $mensaje .="<div  style ='display:none;' class='mensaje-comunidad-response' id='mensaje-comunidad-response'>
                  La descripción de la comunidad ha sido actualizada correnctamente .! 
                </div>
                <div  style ='display:none;'  class='alert-fail-mensaje-comunidad' id='alert-fail-mensaje-comunidad'>
                  Error al actualizar el mensaje para la comunidad, reporte al administrador
                </div>";
    }
    return $mensaje; 
    /**/
  }
  /**/
  function editar_btn($session , $href ){
      if ($session ==  1 ) {        
          return '  
                    <li>
                      <a href="'.$href.'" >
                        <i class="fa fa fa-pencil-square-o">
                        </i> 
                     
                      </a>
                    </li>               
          ';
      }else{
        return ""; 
      }
  }

}/*Termina el helper*/