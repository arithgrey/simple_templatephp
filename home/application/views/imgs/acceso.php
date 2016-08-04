<form accept-charset="utf-8" method="POST" id="form_img_enid_acceso"  class="form_img_enid_acceso" enctype="multipart/form-data" >      
    <input type="file" id='imagen_acceso' class='imagen_acceso ' name="imagen"/>
    <input type='hidden' name='q' value='acceso' >    
    <input name='id_acceso' type='hidden' value="<?=$param["id_acceso"]?>">         
    <center>
        <br>                
        <div class='lista_imagenes_acceso' id='lista_imagenes_acceso'>
        </div>      
        <br>
        <button type="submit" class='btn btn btn-sm guardar_img_enid '  id='guardar_img_acceso' style='color:white;'>
                Cargar ahora.!
        </button>           
    </center>           
</form>


<style type="text/css">
.guardar_img_enid{
    display: none;
}
</style>