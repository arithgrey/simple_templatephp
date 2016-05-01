function upload_main_imgs_escenario(){
    var formdata = false;
    if(window.FormData){
        formdata = new FormData();        
    }        
    var i = 0, len = this.files.length, img, reader, file;                
    $("#response").html("Subiendo...");
            
            
            for( ; i < len; i++){
                file = this.files[i];
                
                //Una validación para subir imágenes
                if(!!file.type.match(/image.*/)){
                    //Si el navegador soporta el objeto FileReader
                    if(window.FileReader){
                        reader = new FileReader();
                        //Llamamos a este evento cuando la lectura del archivo es completa
                        //Después agregamos la imagen en una lista
                        reader.onloadend = function(e){                            
                            mostrar_img_upload(e.target.result , "lista-imagenes"); 
                        };
                        //Comienza a leer el archivo
                        //Cuando termina el evento onloadend es llamado
                        reader.readAsDataURL(file);
                    }
                    
                    //Si existe una instancia de FormData
                    if(formdata)
                        //Usamos el método append, cuyos parámetros son:
                            //name : El nombre del campo
                            //value: El valor del campo (puede ser de tipo Blob, File e incluso string)
                        formdata.append('images[]', file);
                }
            }
            
            base_path =  $("#base_path").val();            
            url =  $("#form_imgs_escenario").attr("action")+ "?base_path="+base_path+"&action=upload_principal_img_escenario";  
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
    
/******************************** *Para los artistas ***********************/
function upload_main_imgs_artista(){
    var formdata = false;
    if(window.FormData){

        formdata = new FormData();        
    }    
    
    var i = 0, len = this.files.length, img, reader, file;                
    $("#response-img-artista").html("Subiendo...");
            
            
            for( ; i < len; i++){
                file = this.files[i];
                
                //Una validación para subir imágenes
                if(!!file.type.match(/image.*/)){
                    //Si el navegador soporta el objeto FileReader
                    if(window.FileReader){
                        reader = new FileReader();
                        //Llamamos a este evento cuando la lectura del archivo es completa
                        //Después agregamos la imagen en una lista
                        reader.onloadend = function(e){
                            mostrar_img_upload(e.target.result , "lista-imagenes-artista");
                        };                        
                        reader.readAsDataURL(file);
                    }
                    
                    //Si existe una instancia de FormData
                    if(formdata)
                        //Usamos el método append, cuyos parámetros son:
                            //name : El nombre del campo
                            //value: El valor del campo (puede ser de tipo Blob, File e incluso string)
                        formdata.append('imagesartista[]', file);
                }
            }
            
            base_path =  $("#base_path_artista").val();            
            url =  $("#formulario-artista").attr("action")+ "?base_path="+base_path+"&action=";  
            
            if(formdata){
                $.ajax({
                   url : url,
                   type : 'POST',
                   data : formdata,
                   processData : false, 
                   contentType : false,                
                   success : function(res){                                                    
                       
                        update_status_in_db_artista(res , base_path);
                   }                
                });
            }





}




/*record in db*/
function update_status_in_db_artista(res , base_path ){

    respuesta = res["respuesta"]; 
    if (respuesta ==  1 ){

        
        id_escenario  = $("#id_escenario").val();        
        id_artista =  $("#dinamic_artista").val();
        /*********insertamos en la base de datos el registro y la referencia**************/
        base_path_img_artista = $("#base_path_img_artista").val();
        url = now + "index.php/api/img_controller/escenario_artista/format/json/";
        $.post(url , {"id_escenario" :  id_escenario ,   "artista" :  id_artista  ,  "name_img" : res["name_img"] , "type" : res["type"] , "size" : res["size"] , "base_path_img" : base_path_img_artista , "base_path" : base_path } ).done(function(data){

            if (data ==  true) {                
                llenaelementoHTML("#response-img-artista" , "Imagen cargada.");
            }
            load_data_escenario_artista();    
        }).fail(function(){
            
        });
        
        /*****************************************************************/                

    }else{
        
        llenaelementoHTML(".respuesta-img-upload", "Error al subir imagen intente de nuevo si el error persiste, comunicar al adinistrador");
    }

}/*Termina la función*/







/**************************************Termina para los artistas  ******************/


/*record in db*/
function update_status_in_db(res , base_path ){
    
    respuesta = res["respuesta"]; 
    if (respuesta ==  1 ){

        id_escenario  = $("#id_escenario").val();        
        /*********insertamos en la base de datos el registro y la referencia**************/
        base_path_img = $("#base_path_img").val();
        url = now + "index.php/api/img_controller/principal_escenario/format/json/";
        $.post(url , {"id_escenario" :  id_escenario ,    "name_img" : res["name_img"] , "type" : res["type"] , "size" : res["size"] , "base_path_img" : base_path_img , "base_path" : base_path } ).done(function(data){
        
            llenaelementoHTML("#slider-principal-escenario" , data["slider_principal_escenario"]);
            llenaelementoHTML(".response"   , "<div class='alert-ok' id='alert-img-ok'><em>imagen cargada correctamente</em></div>");        
            $("#alert-img-ok").show();
            muestra_alert_segundos("#alert-img-ok");            
            
        }).fail(function(){
            llenaelementoHTML(".response"   , "<div class='alert-fail' id='alert-img-fail' ><em>Error al cargar la imganen</em></div>");        
            $("#alert-img-fail").show();

            alert("Error al cargar la imganen");
        });
        
        /*****************************************************************/                
    }else{        
        llenaelementoHTML(".respuesta-img-upload", "Error al subir imagen intente de nuevo si el error persiste, comunicar al adinistrador");
    }

}/*Termina la función*/


    
