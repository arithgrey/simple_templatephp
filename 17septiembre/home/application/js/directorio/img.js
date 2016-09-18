/**/
function carga_formulario_imagenes(e){
    contacto = e.target.id;    
    url =  now  + "index.php/api/contactos/form_img/format/json/"; 
    $.ajax({
        url :  url  ,
        type : "GET", 
        data :  {contacto : contacto}, 
        beforeSend: function(){            
            show_load_enid(".place_form_img" , "Cargando formulario para la carga de imagenes " , 1 );    
        }
    }).done(function(data){

        $(".place_form_img").empty();
        llenaelementoHTML(".form_img" , data );
        $(".imagen_contacto").change(upload_imgs_enid_contacto);

    }).fail(function(){        
        show_error_enid(".place_form_img" , "Se presentaron errores al cargar formulario, reporte al administrador.!");
    });
}
/**/
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
    
    /**/
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
            processData: false ,
            beforeSend : function(){
                show_load_enid(".place_form_img" , "Cargando imagen a contacto" , 1 );       
            }
    }).done(function(data){


        $('#contact-imagen-modal').modal('hide');                
        cargar_seccion_contactos();
        show_response_ok_enid(".place_contactos" , "Portada del contacto cargada con éxito.!");    

    }).fail(function(){        
        show_error_enid(".place_form_img" , "Se presentaron errores al cargar la imagen del contacto, reporte al administrador");
    });
    $.removeData(formData);
}

