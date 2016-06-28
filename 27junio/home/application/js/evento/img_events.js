$(document).ready(function(){    
    var myDropzone = new Dropzone("#event-img");    
    id_evento =  $("#evento").val();
    
    url = $(".now").val() + "application/uploads/upload.php?e="+id_evento;
    $.get(url).done(function(data){
          url_folder = $(".now").val() + "/application/uploads/uploads/" +id_evento + "/";
          
           $.each(data, function(key,value){                 

                    var mockFile = { name: value.name, size: value.size };                 
                    myDropzone.options.addedfile.call(myDropzone , mockFile);
                    myDropzone.options.thumbnail.call(myDropzone, mockFile, url_folder+value.name);                 
                });

    }).fail(function(){
      alert("false");
    });   
});
