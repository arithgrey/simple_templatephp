function upload_imgs_enid_contacto(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_contacto');            
        $("#guardar_img_contacto").show();
        $("#form_img_enid_contacto").submit(registra_img_contacto);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_contacto(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_enid_contacto"));    
    url =  now + "index.php/api/archivo/imgs";
    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false

    }).done(function(data){
        
        $(".response_img_contacto").html(data);
        muestra_alert_segundos(".response_img_contacto"); 
        $('#contact-imagen-modal').modal('hide');        
        $("#lista_imagenes_contacto").html("");
        $("#guardar_img_contacto").hide();
        load_contactos_dinamic();
        
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}

