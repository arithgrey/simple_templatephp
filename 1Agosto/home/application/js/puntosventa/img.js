function carga_form_img(e){
    url = now +  "index.php/api/puntosventa/form_imgs/format/json"; 
    punto_venta =  e.target.id;
    $.ajax({
        url : url , 
        type: "GET",
        data : {punto_venta :  punto_venta }, 
        beforeSend: function(){        
            show_load_enid(".place_img_form"  , "Cargando formulario.. " , 1); 
        }
    }).done(function(data){        
        $(".place_img_form").empty();    
        llenaelementoHTML(".img_form" , data );
        $(".imagen_upload_punto_venta").change(upload_imgs_enid_punto_venta);

    }).fail(function(){
        show_error_enid(".place_img_form" , "Error al cargar formulario, para la carga de la imagen, reporte al administrador"); 
    });
}   
/**/
function upload_imgs_enid_punto_venta(){    
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
        reader = new FileReader();
        reader.onloadend = function(e){
            mostrar_img_upload(e.target.result , 'lista_imagenes_punto_venta');            
            $("#guardar_img_enid").show();
            $("#form_img_enid_pv").submit(registra_img_pv);            
        };
        reader.readAsDataURL(file);
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
            processData: false,
            beforeSend: function(){
                show_load_enid(".place_img_form" , "Cargando imagen ... " ,  1);
            }

    }).done(function(data){
        $('#punto-venta-imagen-modal').modal('hide');
        load_data_puntos_venta();        
        show_response_ok_enid(".place_puntos_venta", "Imagen cargada al contacto con éxito");

    }).fail(function(){
        show_error_enid(".place_img_form" , "Error al cargar imagen, reporte al administrador");
    });
    $.removeData(formData);
}
