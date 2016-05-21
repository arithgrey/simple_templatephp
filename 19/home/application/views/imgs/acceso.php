<div class="modal-body">
    <form accept-charset="utf-8" method="POST" id="form_img_enid_acceso"  class="form_img_enid_acceso" enctype="multipart/form-data" >      
        <input type="file" id='imagen_acceso' class='imagen_acceso' name="imagen"/>
        <input type='hidden' name='q' value='acceso'>         
        <input class='dinamic_acceso_img' id='dinamic_acceso_img' name='dinamic_acceso_img' type='hidden'>
        <center>
            <br>                
            <div class='lista_imagenes_acceso' id='lista_imagenes_acceso'>
            </div>      
            <br>
            <button type="submit" class='btn btn btn-sm guardar_img_enid' id='guardar_img_acceso' style='color:white;'>
                Cargar ahora.!
            </button>           
        </center>           
    </form>
</div>                
<!--
<div class="modal-body">            
                <div class='row'>
                    <form action ='<?=base_url("application/controllers/api/imgs_controller.php")?>'  method="post" id="form_imgs_accesos" enctype="multipart/form-data" >
                             <div class="form-group">
                                <span>Imagen:</span>
                                <input type="file" name="images[]"  id="imgs-acceso" class='imgs-acceso'>                                       
                             </div>                      

                             <div class='askmks'></div>
                             <div class='row'>
                                <div class='col-sm-1 col-md-1 col-lg-1'></div>    
                                <div class='col-sm-10 col-lg-10 col-md-10 '>
                                    <div class='response_img_contacto' id='response_img_contacto'></div>
                                    <div class='lista-imagenes' id='lista-imagenes'></div>
                                </div>
                                <div class='col-sm-1 col-lg-1  col-md-1'></div>    
                             </div>

                    </form>
                </div>
            </div>
            -->