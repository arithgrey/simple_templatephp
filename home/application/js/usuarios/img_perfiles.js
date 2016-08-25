function  carga_imagen_user(e){	
	user =  e.target.id; 
	$(".dinamic_user").val(user);
	$(".guardar_img_enid").hide();
    $(".imagen_upload_perfiles_user").change(upload_imgs_perfil_img);
}
function upload_imgs_perfil_img(){        

    var i = 0, len = this.files.length , img, reader, file;        
    file = this.files[i];
    reader = new FileReader();
    reader.onloadend = function(e){
        mostrar_img_upload(e.target.result , 'lista_imagenes_user');            
        $(".guardar_img_enid").show();
        $("#form_img_perfil_user").submit(registra_img_perfil_user);            
    };
    reader.readAsDataURL(file);
}
/**/
function registra_img_perfil_user(e){
    e.preventDefault();
    var formData = new FormData(document.getElementById("form_img_perfil_user"));    
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
		
        $(".guardar_img_enid").hide();
        $(".response_img_perfil_user").html(data);
        muestra_alert_segundos(".response_img_perfil_user"); 
        $('#img_user_modal').modal('hide');        
        $("#lista_imagenes_use").html("");
        $("#guardar_img_logo").hide();
		load_users_cuenta();	
        
    }).fail(function(){
        alert("Error ");
    });
    $.removeData(formData);
}

