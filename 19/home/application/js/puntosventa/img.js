function upload_imgs_enid_punto_venta(){    
    
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    //if(window.FileReader){
        reader = new FileReader();
        reader.onloadend = function(e){
            mostrar_img_upload(e.target.result , 'lista_imagenes_punto_venta');            
            $("#guardar_img_enid").show();
            $("#form_img_enid_pv").submit(registra_img_pv);            
        };
        reader.readAsDataURL(file);
//    }                                
}
/**/
function registra_img_pv(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_enid_pv"));    
    url =  now + "index.php/api/archivo/imgs";

    $.ajax({
            url: url,
            type: "POST",
            dataType: "HTML",
            data: formData,
            cache: false,
            contentType: false,
            processData: false

    }).done(function(data){

        $(".msj_upload").html(data);
        muestra_alert_segundos(".msj_upload"); 
        $('#punto-venta-imagen-modal').modal('hide');
        load_data_puntos_venta(null);
        $("#lista_imagenes_punto_venta").html("");
        $("#guardar_img_enid").hide();

    }).fail(function(){
        alert("Error ");
    });

    $.removeData(formData);
}
