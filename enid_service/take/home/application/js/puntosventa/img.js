function upload_main_imgs(){

    
    var formdata = false; 
    var i = 0, len = this.files.length , img, reader, file;
    
    if(window.FormData){

        formdata = new FormData();        
    }                    
    $('#response_img_punto_venta').html('Subiendo...');
        
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
            base_path =  $("#base_path").val();
            dinamic_punto_venta =  $("#dinamic_punto_venta").val();
            url =  $("#form_imgs_contacto").attr("action")+ "?base_path="+base_path+"&punto_venta="+ dinamic_punto_venta;          

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

        dinamic_punto_venta = $("#dinamic_punto_venta").val();



        base_path_img = $("#base_path_img").val();
        url = now + "index.php/api/img_controller/punto_venta/format/json/";

        $.post(url , { "punto_venta" : dinamic_punto_venta , "name_img" : res["name_img"] , "type" : res["type"] , "size" : res["size"] , "base_path_img" : base_path_img , "base_path" : base_path } ).done(function(data){

            
                         
                if (data ==  true) {
                    
                    llenaelementoHTML("#response_img_punto_venta" , "Imagen cargada.");
                    load_data_puntos_venta(null);

                }
            

        }).fail(function(){
            
        });
        
        

    }else{
        
        llenaelementoHTML(".respuesta-img-upload", "Error al subir imagen intente de nuevo si el error persiste, comunicar al adinistrador");
    }

}/*Termina la función*/

function mostrarImagenSubida(source){
        var list = document.getElementById('lista-imagenes'),
            li   = document.createElement('li'),
            img  = document.createElement('img');
            img.setAttribute('width', '100%');
            img.setAttribute('height', '100%');

        
        img.src = source;
        li.appendChild(img);
        list.appendChild(li);
}
