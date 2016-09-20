function edita_logo_empresa(){
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
                show_load_enid(".response_img_logo_empresa" , "Cargando ..." , 1 ); 
            }

    }).done(function(data){
        
        $(".guardar_img_enid").hide();                       
        show_response_ok_enid(".response_img_logo_empresa" ,  data);
        $('#modal-logo-empresa').modal('hide');        
        $("#lista_imagenes_logo").empty();
        $("#guardar_img_logo").hide();
         
    }).fail(function(){        
        show_error_enid(".response_img_logo_empresa" , "Problemas al cargar imagen, reporte al administrador");
    });
    $.removeData(formData);
}