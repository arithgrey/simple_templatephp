(function(){
    var input = document.getElementById('imgs-escenario'),
        formdata = false;
    
    function mostrarImagenSubida(source){
        var list = document.getElementById('lista-imagenes'),
            li   = document.createElement('li'),
            img  = document.createElement('img');
        
        img.src = source;
        li.appendChild(img);
        list.appendChild(li);
    }

    if(window.FormData){

        formdata = new FormData();        
    }    
    if(input.addEventListener){
        input.addEventListener('change', function(evt){
            var i = 0, len = this.files.length, img, reader, file;
            
            document.getElementById('response').innerHTML = 'Subiendo...';
            
            //Si hay varias imágenes, las obtenemos una a una
            for( ; i < len; i++){
                file = this.files[i];
                
                //Una pequeña validación para subir imágenes
                if(!!file.type.match(/image.*/)){
                    //Si el navegador soporta el objeto FileReader
                    if(window.FileReader){
                        reader = new FileReader();
                        //Llamamos a este evento cuando la lectura del archivo es completa
                        //Después agregamos la imagen en una lista
                        reader.onloadend = function(e){
                            mostrarImagenSubida(e.target.result);
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
            
            //Por último hacemos uso del método proporcionado por jQuery para hacer la petición ajax
            //Como datos a enviar, el objeto FormData que contiene la información de las imágenes
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






        }, false);
    }


}());
/*record in db*/
function update_status_in_db(res , base_path ){
    
    
    respuesta = res["respuesta"]; 
    if (respuesta ==  1 ){

        
        id_escenario  = $("#id_escenario").val();
        

        /*********insertamos en la base de datos el registro y la referencia**************/
        base_path_img = $("#base_path_img").val();
        url = now + "index.php/api/img_controller/principal_escenario/format/json/";

        $.post(url , {"id_escenario" :  id_escenario ,    "name_img" : res["name_img"] , "type" : res["type"] , "size" : res["size"] , "base_path_img" : base_path_img , "base_path" : base_path } ).done(function(data){



            if (data ==  true) {
                
                llenaelementoHTML("#response" , "Imagen cargada.");

            }
            
        }).fail(function(){
            
        });
        
        /*****************************************************************/        
        

    }else{
        
        llenaelementoHTML(".respuesta-img-upload", "Error al subir imagen intente de nuevo si el error persiste, comunicar al adinistrador");
    }


}/*Termina la función*/





