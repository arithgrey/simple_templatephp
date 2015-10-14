<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('invierte_date_time')){

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
  $list ="<table class='table display table table-bordered dataTable' border='1'>";
    $list .="<tr class='text-center enid-header-table'><td>IMG</td> <td class='text-center'>Contacto</td><td class='text-center' >Organización  </td> <td class='text-center' >Tel </td> <td class='text-center'>Móvil </td><td class='text-center'>Página web </td>
    <td class='text-center'> +agregar </td>  </tr>";
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