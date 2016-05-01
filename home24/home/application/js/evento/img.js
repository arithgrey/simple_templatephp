function upload_main_imgs_evento(){
    var formdata = false;
    if(window.FormData){

        formdata = new FormData();        
    }    
    
    var i = 0, len = this.files.length, img, reader, file;                
    $("#response-img-upload").html("Subiendo...");
            
            
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
            url =  $("#form_imgs_evento").attr("action")+ "?base_path="+base_path+"&action=";  
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
  

/**************************************Termina para los artistas  ******************/


/*record in db*/
function update_status_in_db(res , base_path ){
    
    respuesta = res["respuesta"]; 
    if (respuesta ==  1 ){
        
        id_evento  = $("#evento").val();        
        /*********insertamos en la base de datos el registro y la referencia**************/
        base_path_img = $("#base_path_img").val();
        url = now + "index.php/api/img_controller/upload_img_evento/format/json/";
        $.post(url , {"id_evento" :  id_evento ,    "name_img" : res["name_img"] , "type" : res["type"] , "size" : res["size"] , "base_path_img" : base_path_img , "base_path" : base_path } ).done(function(data){
            $("#response-img-upload").html("Imagen cargada!");
            load_data_slider();

        }).fail(function(){
            alert("Error al cargar la imgane del evento ");
        });
        
        /*****************************************************************/                
    }else{
        
        llenaelementoHTML(".respuesta-img-upload", "Error al subir imagen intente de nuevo si el error persiste, comunicar al adinistrador");
    }

}/*Termina la función*/

function load_data_slider(){

    id_evento =  $("#evento").val();
    url =  now + "index.php/api/event/imagenes/format/json/";
    $.get(url, {"id_evento" : id_evento }).done(function(data){
        
        llenaelementoHTML(".section-ev" , data);

    }).fail(function(){
        alert("Error al cargar slider ");
    });
}    
