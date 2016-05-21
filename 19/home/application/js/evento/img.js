function carga_img_portada(){
    $("#guardar_img_portada").hide();
    $(".imagen_portada_evento").change(upload_imgs_portada_evento);
}
/**/
/**/
function upload_imgs_portada_evento(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_portada');            
        $("#guardar_img_portada").show();
        $("#form_img_portada_evento").submit(registra_img_portada);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_portada(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_portada_evento"));    
    url =  now + "index.php/api/archivo/imgs";
    
    $.ajax({
            url: url,
            type: "POST",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false , 
            beforeSend : function(){
               
                $("#load_imgs_portada").show();
            }


    }).done(function(data){
        
        
        $("#guardar_img_portada").hide();
        $(".response_img_portada").html(data);
        muestra_alert_segundos(".response_img_portada"); 
        $('#modal-img-evento-section').modal('hide');        
        $("#lista_imagenes_portada").html("");
        $("#guardar_img_portada").hide();
        load_data_slider();
        $("#load_imgs_portada").hide();
        
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}
/**/
function load_data_slider(){
    id_evento =  $("#evento").val();
    url =  now + "index.php/api/event/imagenes/format/json/";
    $.get(url, {"id_evento" : id_evento }).done(function(data){        
        llenaelementoHTML(".section-ev" , data);
        $("#img-button-more-imgs").click(carga_img_portada);     
        
    }).fail(function(){
        alert("Error al cargar slider ");
    });
}    

