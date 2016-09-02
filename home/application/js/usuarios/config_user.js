$("#form-integrante-edicion").submit(update_data_user);
$("#form_estatus").submit(actualiza_estado_usuario);
$("#btn_cancelar").click(cancelar_modificacion);
$(".nueva_busqueda").click(carga_form_busqueda);
function update_data_user(e){    
    /**/   
    id_usuario =  $("#id_usuario").val();
    flag = 0; 
    flag2 = 0; 
    msj_user =  "<br> Información del usuario actualizada.!";

    if (id_usuario  ==  0 ) {msj_user = "<br> Usuario registrado con éxito.!";}    
    flag  =  valida_email_form("#email" ,  ".place_mail_vali");      
    if (flag == 1  ) { flag2 =  valida_text_form("#nombres" , ".place_nombre_vali"  , 4 , " Nombre del integrante " ); }

    if (flag2 == 1){

        url =  $("#form-integrante-edicion").attr("action");                  
        $.ajax({
            url :  url, 
            data:  $("#form-integrante-edicion").serialize() , 
            type :  "PUT", 
            beforeSend: function(){
                llenaelementoHTML( ".integrantes-table-info" , "Cargando ..");        
            }
        }).done(function(data){

            llenaelementoHTML( ".integrantes-table-info" , msj_user);
            $(".seccion-busqueda").show();            
            $(".nueva_busqueda").hide();

        }).fail(function(){            
            llenaelementoHTML( ".integrantes-table-info" , "<br> Error al actualizar los datos del usuarios reportar al administrador");                        
        });

    }
    e.preventDefault();
}
/**/
function actualiza_estado_usuario(e){

    url =  $("#form_estatus").attr("action" ); 
    $.ajax({
        url :  url , 
        type : "PUT", 
        data :  $("#form_estatus").serialize() , 
        beforeSend :  function(){
            llenaelementoHTML( ".integrantes-table-info" , "Registrando cambios ..");     
        }
    }).done(function(data){                
        llenaelementoHTML( ".integrantes-table-info" , "<br>"  + data);     
    }).fail(function(){
        llenaelementoHTML( ".integrantes-table-info" ,  " Error al modificar el estatus del usuario, reporte al administrador ");     
    });
    $(".seccion-busqueda").show();
    e.preventDefault();
}
/**/
function cancelar_modificacion(){
    $(".seccion-busqueda").show();
    llenaelementoHTML( ".integrantes-table-info" , "");    
}

