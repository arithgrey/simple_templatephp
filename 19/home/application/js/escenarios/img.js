function carga_imgs_escenario(){
    $("#guardar_img_escenario").hide();
    $(".imagen_img_escenario").change(upload_imgs_enid_escenario);
}
/**/
function upload_imgs_enid_escenario(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_esceario');            
        $("#guardar_img_escenario").show();
        $("#form_img_enid_escenario").submit(registra_img_escenario);            
    };
    reader.readAsDataURL(file);
}
function registra_img_escenario(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_enid_escenario"));    
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
        
                
        $("#guardar_img_escenario").hide();
        $(".response_img_portada_escenario").html(data);
        muestra_alert_segundos(".response_img_portada_escenario"); 
        $('#modal-img-escenario-principal').modal('hide');        
        $("#lista_imagenes_esceario").html("");        
        carga_slider_admin();
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}

/****************************************************************/
function try_upload_img_artistas(e){
    
    artista = e.target.id;
    $("#guardar_img_artista").hide();
    $("#lista-imagenes-artista").html("");
    $("#imgs-arista").attr("value" , "");   
    $(".dinamic_artista_img").val(artista);
    /**/
    $(".imagen_artista").change(upload_imgs_enid_artista);
}
/**/
function upload_imgs_enid_artista(){        
    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_artista');            
        $("#guardar_img_artista").show();
        $("#form_img_enid_artista").submit(registra_img_artista);            
    };
    reader.readAsDataURL(file);
}

function registra_img_artista(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_enid_artista"));    
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
            
        $("#guardar_img_artista").hide();
        $(".response_img_artista").html(data);
        muestra_alert_segundos(".response_img_artista"); 
        $('#modal-img-artista-evento').modal('hide');        
        $("#lista_imagenes_artista").html("");                
        load_data_escenario_artista();
        
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}
