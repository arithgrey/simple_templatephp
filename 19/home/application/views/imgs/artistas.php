<div class="modal-body">    
    <form accept-charset="utf-8" method="POST" id="form_img_enid_artista"  class="form_img_enid_artista" enctype="multipart/form-data" >      
        <input type="file" id='imagen_artista' class='imagen_artista' name="imagen"/>
        <input type='hidden' name='q' value='artista'>         
        <input type='hidden' name='dinamic_artista_img' id='dinamic_artista_img' class='dinamic_artista_img'>
        <center>
            <br>    
            
            <div class='lista_imagenes_artista' id='lista_imagenes_artista'>
            </div>      
            <br>
            <button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_artista' style='color:white;'>
                Cargar ahora.!
            </button>           
        </center>           
    </form>
</div>                
<!--
<div class="modal-body">            
                <div class='response-img-artista' id='response-img-artista'>
                </div>
                <div class='col-lg-12 col-md-12 col-sm-12'>

                    <div class='lista-imagenes-artista' id='lista-imagenes-artista'>
                    </div>
                </div>
                <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post"  enctype="multipart/form-data" id='formulario-artista' >
                    <div class="form-group">
                        Foto del artista:
                        <input type="file" name="imagesartista[]"  id="imgs-arista">
                        <input type='hidden' name="e" value='1'>
                    </div>                      
                </form>
            </div>                    -->
