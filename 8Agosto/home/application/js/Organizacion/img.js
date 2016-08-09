function edita_logo_empresa(){
    /**/
    $(".guardar_img_enid").hide();
    $(".imagen_logo_empresa").change(upload_imgs_enid_logo);

}
/**/
function upload_imgs_enid_logo(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_logo');            
        $(".guardar_img_enid").show();
        $("#form_img_logo_empresa").submit(registra_img_logo);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_logo(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_logo_empresa"));    
    url =  now + "index.php/api/archivo/imgs";
    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false, 
            beforeSend: function(){
                llenaelementoHTML(".response_img_logo_empresa" ,  "Cargando imagen ... ");
                   
            }

    }).done(function(data){
        
        $(".guardar_img_enid").hide();
        $(".response_img_logo_empresa").html(data);
        muestra_alert_segundos(".response_img_logo_empresa"); 
        $('#modal-logo-empresa').modal('hide');        
        $("#lista_imagenes_logo").html("");
        $("#guardar_img_logo").hide();

         
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}

