<form accept-charset="utf-8" method="POST" id="form_img_enid_escenario"  class="form_img_enid_escenario" enctype="multipart/form-data" >      
    <input type="file" id='imagen_img_escenario' class='imagen_img_escenario' name="imagen"/>
    <input type='hidden' name='q' value='portada_escenario'>         
    <input class='dinamic_img_escenario' id='dinamic_img_escenario' name='dinamic_img_escenario' type='hidden' value="<?=$id_escenario;?>">
    <center>
        <br>                
        <div class='lista_imagenes_esceario' id='lista_imagenes_esceario'>
        </div>      
        <br>
        <button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_escenario' style='color:white;'>
            Cargar ahora.!
        </button>           
    </center>           
</form>


