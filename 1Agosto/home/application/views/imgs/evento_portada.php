<form accept-charset="utf-8" method="POST" id="form_img_portada_evento"  class="form_img_portada_evento" enctype="multipart/form-data" >      
  <input type="file" id='imagen_portada_evento' class='imagen_portada_evento' name="imagen"/>
  <input type='hidden' name='q' value='portada_evento'>     
  <input type='hidden' name='evento_portada' value="<?=$id_evento?>">
  <input class='dinamic_evento_portada' id='dinamic_evento_portada' name='dinamic_evento_portada' type='hidden'>
  <center>
    <br>        
    <div class='lista_imagenes_portada' id='lista_imagenes_portada'>
    </div>    
    <br>
    <button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_portada' style='color:white;'>
          Cargar ahora.!
    </button>     
  </center>         
</form>


<style type="text/css">
.guardar_img_enid{
  display: none;
}
</style>