<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

/**/

/**/
function validate_info_emp($val, $in_session  ,  $class ){


  $msj =  ""; 
  $msj_text =  "";
  $mensaje ="";    
  

  if($in_session == 1){

    $class =  $class; 
  }else{
    $class =  ""; 
  }


  if (trim( strlen($val)) > 300 ){


      $primer_part = "<span class='hiddden_descripcion'>
                            ".$val."
                          </span>";

        $part_descripcion =  substr($val, 0 ,  300);  
        $new_text = $primer_part ."<span class='show_descripcion ".$class." '>
                              ". $part_descripcion ."
                            </span>
                            <center>
                              <span class='row more-info-f more-info-f-down'>
                                <i class='fa fa-chevron-down' aria-hidden='true'>
                                </i>
                              </span>
                              <span class='row more-info-f more-info-f-up'>
                                <i class='fa fa-chevron-up' aria-hidden='true'>
                                </i>
                              </span>
                            </center>";  
    
  }else{

      if(trim( strlen($val)) == 0 ){
        $new_text =  "<span class='".$class ."'> La historia de la empresa. </span>";
      }else{
        $new_text =  "<span class='".$class ."'>" . $val ."</span>";
      }

  }


  return $new_text;
  
}
/**/
function get_select_paises($paises, $class , $id, $name ){

    
  $select =  "<select class='form-control ".$class." ' id='". $id ."' name='".$name ."'>";
  foreach ($paises as $row) {
    
    $select .=  "<option value='".$row["idCountry"]."' >".$row["countryName"] ."</option>";  
  }
  $select .= "</select>";
  return $select;

}
/**/
function modal_localizacion($in_session,  $localizacion){


  $text =  ""; 
  if ($in_session ==  1 ) {
      $text = "<label class='lb-pais' data-toggle='modal' data-target='#modal-locacion' >  
                ". $localizacion ."
                </label>";
  }else{
    $text = "<label class='lb-pais'>  
                ". $localizacion ."
              </label>";
  }
  return $text;
    

}
/**/
function edita_section_mensaje_comunidad($val, $session , $class=""){      
    $mensaje ="";    
    $new_text = "";
    if($session ==  1 ){
        $class =  $class; 
    }else{
      $class =  ""; 
    }

    if(strlen($val) > 700 ){      

          $primer_part = "<span class='hiddden_descripcion'>
                            ".$val."
                          </span>";

              $part_descripcion =  substr($val, 0 ,  690);  
              $new_text = $primer_part ."<span class='show_descripcion ".$class." '>
                              ". $part_descripcion ."
                            </span>
                            <center>
                              <span class='row more-info-f more-info-f-down'>
                                <i class='fa fa-chevron-down' aria-hidden='true'>
                                </i>
                              </span>
                              <span class='row more-info-f more-info-f-up'>
                                <i class='fa fa-chevron-up' aria-hidden='true'>
                                </i>
                              </span>
                            </center>";       




      }else{

          if (trim( strlen($val) ) == 0 ){
              $new_text = "<span class='".$class."'> 
                            Mensaje para tu comunidad 
                         </span>";
          }else{
              $new_text = "<span class='".$class."'> 
                            ".$val."
                            </span>";

          }        
      }


    if ($session == 1){     

        $mensaje .= $new_text;           
        $mensaje .="<textarea rows='5' 
                    style='display:none;'                     
                    class='form-control' 
                    id='comunidad-mensaje-input'     
                    name='mensaje-comunidad' 
                    placeholder='Mensaje para tu comunidad'>
                      ".$val."
                    </textarea>'";                           
    }else{
      $mensaje = $new_text; 
    }
    return $mensaje; 
    /**/
}




function contruye_iconos_experiencia_cliente($data){

        /*7,1,2 artistas  , evetos, escenarios  */        
        $f_artistas =  0;         
        $f_eventos =  0; 
        $f_escenarios =  0; 
        $clases = ''; 
        $nombre =''; 
        $imgs =  ''; 


                
        
        $links = '';
        if (count($data)> 0){
          $links = '
                <li>
                    <a  class="tag-enid-galery" href="#" data-filter="*"> 
                        + 
                    </a>
                </li>
                ';     
        }
        
        
        

        foreach ($data as $row){

            $idimagen =  $row["idimagen"];
            $nombre_imagen =  $row["nombre_imagen"];
            $type  =  $row["type"]; 
            $img  =  $row["img"]; 
            $extension =  $row["extension"];

            switch ($type) {
                case 7:
                    $clases = '.artistas';
                    $nombre = 'artistas';    
                    if ($f_artistas == 0 ) {
                         $links .= '
                                    <li>
                                        <a class="tag-enid-galery"  href="#" data-filter="'.$clases.'">
                                            '.$nombre.'
                                        </a>
                                    </li>
                                    ';

                    }
                    $f_artistas++; 


                    break;

                case 1:
                    $clases = '.eventos';
                    $nombre = 'eventos';
                    if ($f_eventos == 0 ) {
                         $links .= '
                                <li>
                                    <a class="tag-enid-galery"  href="#" data-filter="'.$clases.'">
                                        '.$nombre.'
                                    </a>
                                </li>
                                ';
                    }
                    $f_eventos ++; 
                    break;

                case 2:
                    $clases = '.escenarios';                    
                    $nombre = 'escenarios';

                    if ($f_escenarios == 0 ) {
                         $links .= '
                                <li>
                                    <a class="tag-enid-galery"  href="#" data-filter="'.$clases.'">
                                        '.$nombre.'
                                    </a>
                                </li>
                                ';    
                    }
                    $f_escenarios ++; 
                    break;        
                
                default:
                    
                    break;
            }


            $img =  create_icon_img($row , ' ', ' '  ); 

            $imgs .= '
                    <div class=" '. $nombre .' item " >
                        <a href="#myModal" data-toggle="modal">
                            '. $img .'
                        </a>
                        <!--<p>
                            img01.jpg 
                        </p>-->
                    </div>            
                    ';
           
           
        }
        
        $icons["links"] = $links; 
        $icons["imagenes"] = $imgs;
        return $icons;
    }

/**/
function evalua_msj_solicitudes($public ){

  
}

/**/
function valida_seccion_config_expericia($seccion ,  $status , $idexperiencia){

  $extra =  "";
  if ($seccion == 3){    
    $extra .=  "<label class='lb-estado-comentario'>Estado actual del comentario</label><br>";     
    $extra .= "<div class='select_update_status'>" . get_select_tipo_comentario($status,  $idexperiencia ) . "</div>"; 
  }
  return $extra;
}
/**/
function get_select_tipo_comentario($tipo, $idexperiencia){

  $tipo_comentario = array("Comentario registrado sin ser aún aprobado pera ser público." ,
                           "Comentario publico para todos los espectadores." , 
                           "Comentario público soló para los administradores" );

  $d_class  =  "status_" . $idexperiencia; 
  $select =  "<select class='select-estado-exp form-control ".$d_class ." ' id=''>";  
    for ($x=0; $x <count($tipo_comentario) ; $x++) { 

      if ($tipo ==  $x ) {
          $select .=  "<option value='$x' selected>". $tipo_comentario[$x] ."</option>";    
      }else{
        $select .=  "<option value='$x'>". $tipo_comentario[$x] ."</option>";    
      }

    }
  $select .=  "</select>";  
  $select .=  "
              <br>                                                
              <button id='$idexperiencia' class='btn-estado-exp btn btn-default btn_save btn-registrar-cambios'>
                Registrar cambios
              </button>";  
  return $select; 
}
/**/
function get_tipo_comentario($tipo){
  $msj =  ""; 
  switch ($tipo){
    case 0:
      $msj =  "Comentario registrado sin ser aún aprobado pera ser público.";
      break;
    case 1:
      $msj =  "Comentario publico para todos los espectadores.";
      break;
    case 1:
      $msj =  "Comentario público soló para los administradores";
      break;
    default:      
      break;
  }
  return $msj;
}

/**/
function valida_title_experiencia($seccion){

  $title = '';
  switch ($seccion) {
    case 1:

      $title .=  '
                  <h2 class="title-exp">      
                    La experiencia de otras personas.
                  </h2>
                  ';
      break;
    case 2:
      $title .=  '<div class="ver-public-lg-emp">
                      Lo que la comunidad opina.
                  </div>
                  ';
      break;    
      case 3:

        $title .=  "<h2 class='title-exp-all'>
                      La experiencia de tu comunidad. 
                    </h2>";  
        break;
      
    default:
      
      break;
  }
  return $title; 
}

/*
function experiencias($data){

  $bloque = ""; 
  foreach ($data["experiencias"] as $row) {

      $id_empresa =  $row["idempresa"];        
      $calificacion =  $row["calificacion"];
      $nombre =  $row["nombre"];      
      $fecha_registro =  $row["fecha_registro"];
      $descripcion =   $row["descripcion"];      
      $bloque .= '
                <section class="blurb">
                  <div class="row">

                    <div class="title-autor">
                      '.$nombre.' 
                    </div>
                    <div class="calificaciones-info">                    
                      '.$fecha_registro.' | '. create_start($calificacion).'                                          
                    </div>

                  </div>                  
                  <div class="seccion-descripcion">                    
                      <span>
                        '.$descripcion .'
                      </span>                    
                  </div>                
              </section>
              ';
  }
  return $bloque;
}
*/
function create_start($num){
  
  $starts =""; 
  $default_start = "&#9733;";   
  for ($x=1; $x <= $num; $x++){ 
    $starts .= "<span> " . $default_start . "</span>";         
  }
  return $starts;

}
/**/
function get_inputs_starts($limit){
  $inputs  = '';
  for ($x=1; $x <=$limit ; $x++ ){     
          $inputs .= "
                  <input id='$x' class='input-start' type='radio' name='calificacion' value='$x'>
                  <label for='$x'> &#9733;
                  </label>
                ";     
  }
  return $inputs;
}
/**/
function comentarios_administrador($data){
  
  $comentarios = "";               
  $dinamic_class="";                
  $flag =0;
  foreach ($data as $row) {

      $text_comentario  =    $row["descripcion_contenido"];
      $calificacion = $row["calificacion"];
      $nombre_user_commnet  =  $row["nombre"];   
      $nombre_contenido =  $row["nombre_contenido"];     
      $fecha_registro =  $row["fecha_registro"];

      $mail  =  $row["mail"]; 
      $tel =  $row["tel"];

      $starts =  get_starts($calificacion); 

      if ($flag %2 == 0 ){
        $dinamic_class="in";
      }else{
        $dinamic_class="out";
      }

      $comentarios .='
        <li class="'.$dinamic_class.'">
            <img src="images/photos/user1.png" alt="" class="avatar">
            <div class="message ">
                <span class="arrow">
                </span>
                <a  href="#">
                  '. $nombre_user_commnet .'
                </a>
                <span class="datetime">
                  '. $fecha_registro .'
                </span>
                <span>
                  '.$starts.'
                </span>

                <span class="body">
                  '. $text_comentario  .'
                </span>
                <a class="pull-right">
                  '.$tel .' | '.$mail .'
                </a>

            </div>
        </li>
        ';
     $flag ++; 
    }
    return $comentarios;
}


/**/
function comentarios_clientes($data){ 

  $comentarios =  "<div>
      <h2 class='page-header'>La experiencia en nuestros eventos </h2>
        <section class='comment-list'>";  
       $flag=0; 
  foreach ($data as $row) {

      $text_comentario  =    $row["descripcion_contenido"];
      $calificacion = $row["calificacion"];
      $nombre_user_commnet  =  $row["nombre"];   
      $nombre_contenido =  $row["nombre_contenido"];     
      $fecha_registro =  $row["fecha_registro"];


      $starts =  get_starts($calificacion); 
     
         $comentarios .= '<article class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail">
                <center>
                  '. $starts .'
                </center>
                <figcaption class="text-center">                  
                  Puntuación
                </figcaption>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">              
                <div class="panel-heading right">
                  Reply
                </div>              
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"  style="font-size:.9em !important;">
                      <i class="fa fa-user">
                      </i>
                      '.$nombre_user_commnet.'
                    </div>
                    <time class="comment-date" style="font-size:.8em !important;">
                      <i class="fa fa-clock-o">
                      </i> 
                      '. $fecha_registro .'
                    </time>
                  </header>
                  <div class="comment-post">
                    <p>
                    '.$text_comentario.'
                    </p>
                  </div>   
                  <!--              
                  <p class="text-right">                  
                    <a href="#" class="btn btn-default btn-sm">
                      <i class="fa fa-reply">
                      </i> 
                      reply
                    </a>
                  </p>
                  -->                  
                </div>
              </div>
            </div>
          </article>
          '; 



      

    $flag++;
  }
  
  $comentarios .=  "  
        </section>
    </div>
  "; 

  return $comentarios;
}

/**/
function carga_logo_empresa($data_empresa , $in_session ){
  /*Cuendo se tiene imagen*/
  $img = ''; 
  $path_img  = ''; 
  $modal = "";
  if ($in_session == 1 ) {    
      $modal = "data-toggle='modal' data-target='#modal-logo-empresa' ";   
  }
  if (strlen($data_empresa["nombre_imagen"]) > 4 ){    
    $img =  '<img id="img-logo-emp" class="img-tmp-empresa" title="Logo de la empresa"   '. $modal .'  src="data:image/jpeg;base64, '. base64_encode($data_empresa["img"])  .'  " />';
  }else{
    /*Creamos la simulación de la imagen */
    $img = '<div id="img-logo-emp" class="img-tmp-empresa" title="Logo de la empresa" '. $modal .'>              
              <center> 
                <span class="text-logo-img"> 
                  + Nuestro logo
                </span>
              </center> 
            </div>'; 
  }    

  return $img;
  
  
}

/**/
function get_iconos_sociales($id_empresa , $in_session , $fb , $tw , $gp , $www ){

    $iconos_sociales = '<ul class="p-social-link pull-right">';


      if (strlen($fb)> 4 && $fb != null ){
                        $iconos_sociales .= '<li>                              
                          <a href="'.$fb.'">
                            <i class="fa fa-facebook">
                            </i>                                
                          </a>  
                        </li>';           
      }                
      if (strlen($tw) >4  && $tw != null ){          
        $iconos_sociales .= '<li>                                
                            <a href="'.$tw.'">
                              <i class="fa fa-twitter">
                              </i>   
                            </a>
                          </li>';                                
      }if (strlen($gp) > 4 && $gp != null) {
        $iconos_sociales .= ' <li>                                
                    <a href="'.$gp.'">
                      <i class="fa fa-google-plus">
                      </i>                              
                    </a>  
                  </li>';
      }
      if (strlen($www) > 4 && $www != null  ) {
        $iconos_sociales .= ' <li>                                
                    <a href="'.$www.'">
                      www
                    </a>  
                  </li>'; 
      }
      $iconos_sociales .='</ul>';



  if ($in_session ==  1 ){
    
    $iconos_sociales = '
      <ul class="p-social-link pull-right">                          
        <li class="social-fb" id="'.$id_empresa.'" data-toggle="modal" data-target="#modal-social-empresa">                              
          <i class="fa fa-facebook">
          </i>                                
        </li>
        <li class="social-tw" id="'.$id_empresa.'" data-toggle="modal" data-target="#modal-social-empresa"  >                                
            <i class="fa fa-twitter">
            </i>                                
        </li>
        <li class="social-gp" id="'.$id_empresa.'" data-toggle="modal" data-target="#modal-social-empresa" >                                
            <i class="fa fa-google-plus">
            </i>                              
        </li>        
        <li class="social-www" id="'.$id_empresa.'" data-toggle="modal" data-target="#modal-social-empresa" >                                
           www
        </li>
      </ul>';
  
  }
  
  return $iconos_sociales;
}
/**/
function select_country($data){

  $select =""; 
  foreach ($data as $row) {
      $select .= "<option value='". $row["idCountry"]."'>". $row["countryName"]."</option>";
  }
  

  return $select;
}

/**/
function select_pais($data){
  
  $options ="";
  foreach ($data as $row) {
    
    if ($row["nombreempresa"] != null ) {

      $options .="<option value='". $row["idCountry"] ."' selected>". $row["countryName"] . "</option>";  
    }else{
      $options .="<option value='". $row["idCountry"] ."'>". $row["countryName"] . "</option>";
    }
    
  }
  return $options;


}

/**/
function usuarios_reportados($data){

  $options ="";
  $options .= "<select class='form-control usuario_reportado' id='usuario_reportado' name='usuario_reportado'>";
    foreach ($data as $row) {

      $options .="<option value='".$row["idusuario"]. "' >". $row["nombre"]  ."   (" .$row["email"] .")" ."</option>";
    }

  $options .=  "</select>";  
  return $options;
}
function sub_tipos_inicidencia_options($data){

  $options ="";
  $options .= "<select class='form-control sub-tipo' id='sub-tipo' name='sub-tipo'>";
    foreach ($data as $row) {

      $options .="<option value='".$row["idsub_tipo_incidencia"]. "' >". $row["subtipo"] ."</option>";
    }

  $options .=  "</select>";  
  return $options;
}

/**/
function tipos_inicidencia_options($data){

  $options = "";

    foreach ($data as $row) {
      $options .="<option value='". $row["idtipo_incidencia"]  . "' >". $row["tipo_incidencia"] ."</option>";
    }

  return $options;
}

/**/
function data_contactos_empresa($data){
  $list ="<table class='table table-bordered'>";
    $list .="<tr class='text-center enid-header-table'>";
            $list .=  get_td(" IMG" , "");
            $list .= get_td("Contacto", "");
            $list .= get_td("Organización  ", "");
            $list .= get_td("Tel <", "");
            $list .= get_td("Móvil ", "");
            $list .= get_td("Página web ", "");
            $list .= get_td(" +agregar </", "");
    $list.=  "</tr>";
    $flag=0;
    $contacos_asociados =0;

    foreach ($data as $row) {
      
      $nombre  = $row["nombre"];
      $organizacion  =  $row["organizacion"];     
      $tel =  $row["tel"];
      $movil  = $row["movil"];
      $pagina_web = $row["pagina_web"];

      $contactoemp =  $row["contactoemp"];
      $input ="";
      $id_contacto  =  $row["idcontacto"];
      if ($contactoemp != null ){
        
        $input ="<input type='checkbox' id='". $id_contacto ."' class='contactos_asociados' checked>";
        $contacos_asociados ++;
      }else{
        $input ="<input type='checkbox' id='".$id_contacto."' class='contactos_asociados'>";
        
      }

      $list.="<tr class='text-center media usr-info' >";
          if ($row["nombre_imagen"] != null ){

            $img = base_url( $row["base_path_img"].$row["nombre_imagen"]);

            $list.="<td class='prog-avatar'>          
                      <img style='width:35px !important; height:35px !important;'  class='thumb'  src='".$img ."'>            
                    </td>";       
          }else{
            $list.="<td class='prog-avatar'> 
                      <i class='fa fa-picture-o fa-2x'   ></i>
                    </td>";

          }


      $list.="<td class='franja-vertical'>".$nombre."</td><td>".$organizacion ."</td>";
          

      $list.="<td>".$tel."</td> 
            <td>".$movil ."</td>
            <td>".$pagina_web ."</td>
            <td>". $input ."</td>
            </tr>";

      $flag++;        
    }

    $list .="</table>
    <div><span>Contactos disponibles: ". $flag.", asociados a la empresa: ". $contacos_asociados  ."</span></div>
    <div>

      <div id='response_contacto_empresa' class='response_contacto_empresa' ></div>
      <span><a href='". base_url('index.php/directorio/contactos') ."'><button class='btn btn-block btn-info'>+ir  a la sección de contactos</button></a></span>
    </div>";
    return $list;
  }
}/*Termina el helper*/