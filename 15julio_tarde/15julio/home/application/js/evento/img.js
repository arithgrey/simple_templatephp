function carga_img_portada(){
    
    url = now +  "index.php/api/event/form_evento/format/json/";  
    evento =  $("#evento").val();
    $.ajax({
            url : url ,
            data : {evento :  evento },
            beforeSend : function(){
                show_load_enid(".place_form_portada", "Cargando formulario " , 1); 
            }
        }).done(function(data){

            $(".place_form_portada").empty();
            llenaelementoHTML(".seccion_form_portada" , data);
            $(".imagen_portada_evento").change(upload_imgs_portada_evento);

        }).fail(function(){
            show_error_enid(".place_form_portada" , "Falla al actualizar al cargar el formulario para la carga de la portada, reporte al administrador " );   
        });    
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
               show_load_enid(".place_form_portada", "Cargando portada al evento" , 1);                 
            }
    }).done(function(data){

        show_response_ok_enid(".place_form_portada" , "Imagen cargada al evento con éxito.! " );             
        $('#modal-img-evento-section').modal('hide');       
        load_data_slider();           
    }).fail(function(){
        show_error_enid(".place_form_portada" , "Falla al actualizar al cargar el formulario para la carga de la portada, reporte al administrador " );   
    });
    $.removeData(formData);
}        
/**/     
function load_data_slider(){
    
    id_evento =  $("#evento").val();
    url =  now + "index.php/api/event/imagenes/format/json/";
    nombre_evento =  $("#nombre_evento_val").val();
        
    $.ajax({
        url :  url , 
        type :  "GET", 
        data: {"id_evento" : id_evento , "nombre_evento" : nombre_evento } , 
        beforeSend : function(){            
            show_load_enid(".place_slider_portada", "Cargando portada del evento" , 1); 
        }
    }).done(function(data){        
        
        $(".place_slider_portada").empty();
        llenaelementoHTML(".portada_evento_section" , data );
    }).fail(function(){
        show_error_enid(".place_slider_portada" , "Falla al actualizar la portada del evento, reporte al administrador " );   
    });    

}    