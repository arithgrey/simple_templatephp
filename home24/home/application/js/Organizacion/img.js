function upload_main_imgs(){
    var formdata = false;
    var i = 0, len = this.files.length, img, reader, file;
    if(window.FormData){

        formdata = new FormData();        
    }            
    $('#response_img').html('Subiendo...');
            for( ; i < len; i++){
                file = this.files[i];            
                if(!!file.type.match(/image.*/)){
                    //Si el navegador soporta el objeto FileReader
                    if(window.FileReader){
                        reader = new FileReader();
                        //Llamamos a este evento cuando la lectura del archivo es completa
                        //Después agregamos la imagen en una lista
                        reader.onloadend = function(e){                            
                            mostrar_img_upload( e.target.result , 'lista-imagene');
                        };
                        //Comienza a leer el archivo
                        //Cuando termina el evento onloadend es llamado
                        reader.readAsDataURL(file);
                    }                
                    
                    if(formdata)
                        formdata.append('images[]', file);
                }
            }                        
                
            base_path =  $("#base_path").val();            
            url =   $("#formulario-logo").attr("action")+ "?base_path="+base_path+"&action=upload_img_contacto";              
            if(formdata){
                $.ajax({
                   url : url,
                   type : 'POST',
                   data : formdata,
                   processData : false, 
                   contentType : false,                
                   success : function(res){                            
                                        
                        update_status_in_db(res, base_path);                        
                   }                
                });
            }
}            
/*record in db*/
function update_status_in_db(res , base_path ){

    respuesta = res["respuesta"]; 
    if (respuesta ==  1 ){

        base_path_img = $("#base_path_img").val();
        url = now + "index.php/api/img_controller/logo_empresa/format/json/";        
        $.post(url , {  "name_img" : res["name_img"] , "type" : res["type"] , "size" : res["size"] , "base_path_img" : base_path_img , "base_path" : base_path } ).done(function(data){
        
                if (data ==  true) {                    
                    llenaelementoHTML("#response_img" , "Imagen cargada.");
                    load_data_empresa();

                }    
        }).fail(function(){
            
        });

    }else{    
        llenaelementoHTML(".respuesta-img", "Error al subir imagen intente de nuevo si el error persiste, comunicar al adinistrador");
    }
}/*Termina la función*/
/**/
function delete_in_server_img(){

    url = now + "index.php/api/img_controller/logo_empresa/format/json/";    
    eliminar_data_test(url , {"deleteimg" :  "deleteimg"});
}
/**/

