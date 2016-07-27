function carga_form_imagenes_escenario(){
    url =  now + "index.php/api/escenario/form_escenario/format/json/";
    escenario =  $("#id_escenario").val();    
    $.ajax({
        url : url , 
        type : "GET" ,
        data :  {"escenario" :  escenario },
        beforeSend: function(){            
            show_load_enid(".place_img_escenario" , "Cargando formulario" , 1 ); 
        }
    }).done(function(data){        
        llenaelementoHTML(".imagenes_escenario_form" , data);    
        llenaelementoHTML(".place_img_escenario" ,  "");
        carga_imgs_escenario();
    }).fail(function(){
        show_error_enid(".place_img_escenario" , "Error al cargar la sección de imagenes para el esceario" ); 
    });

}
/**/
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
        
        /**/
        $("#guardar_img_escenario").hide();
        $(".response_img_portada_escenario").html(data);

        muestra_alert_segundos(".response_img_portada_escenario"); 
        $('#modal-img-escenario-principal').modal('hide');        
        $("#lista_imagenes_esceario").html("");        
        carga_slider_admin();
    }).fail(function(){        
        show_error_enid(".response_img_portada_escenario" , "Error al registrar imagenes " ); 
        alert("Error");
    });
    $.removeData(formData);
}

/****************************************************************/
function  carga_form_imagenes_artista(e){

    artista = e.target.id;
    escenario =  $("#id_escenario").val();    
    url =  now + "index.php/api/escenario/form_artista/format/json/";

    $.ajax({
        url : url , 
        type : "GET" ,
        data :  {"escenario" :  escenario ,  "artista"  :   artista },
        beforeSend: function(){            
            show_load_enid(".place_img_artista" , "Cargando formulario para cargar las imagenes del escenario" , 1 );             
        }
    }).done(function(data){        

        llenaelementoHTML(".imagenes_artista_form" , data);            
        $(".place_img_artista").empty();        
        $("#guardar_img_artista").hide();
        $(".imagen_artista").change(upload_imgs_enid_artista);
        
    }).fail(function(){
        show_error_enid(".place_img_artista" , "Error al cargar la sección de imagenes para el artista" ); 
    });

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
        show_response_ok_enid( ".place_img_artista", "Portada del artista registrada con éxito.!");
        $('#modal-img-artista-evento').modal('hide');                    
        load_data_escenario_artista();        
    }).fail(function(){
        show_error_enid(".place_img_artista" , "Error al cargar la imagen del artista reporte al administrador" ); 
    });
    $.removeData(formData);
}

