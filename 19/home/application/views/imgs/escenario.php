<div class="modal-body">    
    <form accept-charset="utf-8" method="POST" id="form_img_enid_escenario"  class="form_img_enid_escenario" enctype="multipart/form-data" >      
        <input type="file" id='imagen_img_escenario' class='imagen_img_escenario' name="imagen"/>
        <input type='hidden' name='q' value='portada_escenario'>         
        <input class='dinamic_img_escenario' id='dinamic_img_escenario' name='dinamic_img_escenario' type='hidden' value="<?=$data_escenario['idescenario'];?>">
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
</div>                

<!--
<div class="modal-body">                        
                <div class='col-lg-12 col-md-12 col-sm-12'>                            
                    <div class='response' id="response">
                    </div>        
                    <div id='lista-imagenes'></div>
                </div>
                <div class='row'>
                    <div class='col-lg-12 col-md-12 col-sm-12'>
                        <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_escenario" enctype="multipart/form-data" id='formulario-principal-img' >
                            <div class="form-group">
                                <input type="file" name="images[]"  id="imgs-escenario">
                                <input type='hidden' name="e" value='1'>
                            </div>                      
                        </form>
                    </div>        
                </div>
            </div>            
            -->