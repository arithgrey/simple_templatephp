function carga_imagen_acceso(e){
    acceso =e.target.id;

    $(".dinamic_acceso_img").val(acceso);
    $("#imgs-acceso").attr("value" , "");
    $("#lista_imagenes_acceso").html("");
    $("#guardar_img_acceso").hide();
    $("#imagen_acceso").change(upload_imgs_enid_acceso);
}
/**/
function upload_imgs_enid_acceso(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_acceso');            
        $("#guardar_img_acceso").show();
        $("#form_img_enid_acceso").submit(registra_img_acceso);            
    };
    reader.readAsDataURL(file);
}

function registra_img_acceso(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_enid_acceso"));    
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
        
        
        $(".response_img_acceso").html(data);
        muestra_alert_segundos(".response_img_acceso"); 
        $('#acceso-imagen-modal').modal('hide');        
        $("#lista_imagenes_contacto").html("");
        $("#guardar_img_contacto").hide();
        load_data_accesos();
        
        
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}




