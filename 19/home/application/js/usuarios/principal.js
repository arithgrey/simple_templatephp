$(document).on("ready" , function(){
        
    $(".sednewsolicitud").click(sed_mail_request);    
    $(".img_user").click(carga_imagen_user);
    $(".botonExcel").click(exporta_excel);
    $(".editar_permisos_miembro").click(set_user_id);
    $("#form-integrante-edicion").submit(update_data_user);
    $("#btn-nuevo-integrante").click(set_config_user_record);
    $(".edit-nota-user").click(load_data_nota_user);
    dinamic_user = 0;
    $("#descripcion-miembro").submit(update_descripcion_user);    
    $(".mas-info").click(dinamic_section);
    $(".menos-info").click(dinamic_section_info);
    $(".form-busqueda-user").submit(load_users_cuenta);
});
/*Termina la función*/
/*Invitación al nuevo usuario*/
function sed_mail_request(){

    idperfil = $("#newperfil").val();
    mailnewcontact  =  $("#mailnewcontact").val();
    nombre = $("#nombre").val();

    url =  now + "index.php/api/mailrest/send_mail_gmail_invitaticon/format/json/";
    $.post( url  , {"idperfil" : idperfil , "mailnewcontact" : mailnewcontact , "nombre" : nombre} ).done(function(data){
        
        if (data ==  true ) {
            llenaelementoHTML("#clientresponse" , " Los datos de acceso han sido enviados a al correo del nuevo miembro");
        }else{

            llenaelementoHTML("#clientresponse" , "Error al enviar el mail, intentar nuevamente, si el error persiste reportar al administrador del sistema");
        }     


        

    }).fail(function(){
        alert("un error se produjo....");
    });
}
/*Termina la función */

function exporta_excel(){
    $("#datos_a_enviar").val( $("<div>").append( $("#print-section").eq(0).clone()).html());
    $("#FormularioExportacion").submit();
}
/**/
function set_user_id(e){
    $("#modal-title-user").text("Configuración del usuario ");
    id_usuario = e.target.id;
    $("#id_usuario").val(id_usuario);
    $("#email-section").hide();
    reset_form_user();

    /*Mandamos a llamar los datos del usuario */
    load_data_user(id_usuario);
}


function set_config_user_record(){

    $("#modal-title-user").text(" + Registra un nuevo integrante a la cuenta ");
    $("#id_usuario").val(0);   
    valor = $("#email").val()
    $("#email-section").show();    
    reset_form_user();
}
/**/
function reset_form_user(){
    $("#response-update-insert").text("");
    var  inputs_reset = ["#apellido_paterno" , "#apellido_materno"  , "#nombres" , "#email" , "#email_alterno" , "#tel_contacto"  , "#tel_contacto_alterno" , "#inicio_labor" , "#fin_labor" , "#rfc"];
    reset_fields(inputs_reset);     
}


/******************LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS LOADS */

/**/
function load_data_nota_user(e){

    var  alerts =  [".alert-ok" , ".alert-fail"];
    ocualta_elementos_array(alerts);
    url = now + "index.php/api/user/miembro/format/json/";
    user = e.target.id;    
    dinamic_user = user;
    $.get( url , {"id_usuario" : user } ).done(function(data){
        /**/
        descripcion = data[0].descripcion; 
        $(".nota-user-text").val(descripcion);
    }).fail(function(){
        alert("Errror");
    });
}
/*Carga los usuarios de la cuenta*/
function load_users_cuenta(){

    url =  $(".form-busqueda-user").attr("action");
    var clientresponse = ["Error al cargar los colaboradores, reporte al administrador"];    
    $.get(url, $(".form-busqueda-user").serialize()  + "&" + $.param({"flag" : 1}) ).done(function(data){        
        /**/
        llenaelementoHTML("#integrantes-table-info" , data);        
        load_resumen_usuarios();    
    }).fail(function(){
        alert("Falla");
        llenaelementoHTML( "#listausuariosempresa", clientresponse[0]);
    });
    
    return false;
}

/**/
function load_resumen_usuarios(){    
    url = now + "index.php/api/cuentageneralrest/integranteescuentaresumen/format/json";    
    $.get(url).done(function(data){    
        
        llenaelementoHTML("#resumen-section" , data);
        $(".edit-nota-user").click(load_data_nota_user);
        $(".editar_permisos_miembro").click(set_user_id);    
        $(".mas-info").click(dinamic_section);
        $(".menos-info").click(dinamic_section_info);

    }).fail(function(){    
        alert("Error");
    });

}
/**/
function load_data_user(id_usuario){

   url = now + "index.php/api/user/miembro/format/json/";      
   $.get(url, {"id_usuario" : id_usuario } ).done(function(data){
            
        /**/    
        $("#apellido_paterno" ).val(data[0].apellido_paterno);
        $("#apellido_materno").val(data[0].apellido_materno);
        $("#nombres").val(data[0].nombre);        
        $("#email_alterno").val(data[0].email_alterno);
        $("#tel_contacto" ).val(data[0].tel_contacto);
        $("#tel_contacto_alterno" ).val(data[0].tel_contacto_alterno);
        $("#inicio_labor").val(data[0].inicio_labor);
        $("#fin_labor").val(data[0].fin_labor);
        $("#rfc").val(data[0].rfc);
        $("#email").val(data[0].email);



   }).fail(function(){
        alert("Error ");
   });
}
/**/
/*UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES UPDATES */

/**/
function try_update_perfil_usuario(e){

    usuario = e.target.id;
    url = now + "index.php/api/cuentageneralrest/integrantescuentaperfil/format/json";    
    $(".repo-edith").hide();    

    $("#edit-perfil-select").change(function(){

        perfil = $(this).val();
        actualiza_data(url , {"usuario" : usuario , "perfil" : perfil } );
        $(".repo-edith").show();
        

        
    }

    ); 
}
/**/
function update_data_user(){    

    /**/   
    email = $("#email").val();
    if (valEmail(email) !=  true ) {    
        /**/
        $("#response-update-insert").html(" <div class='panel  alert-fail' id='error-correo'><em> Registre un correo electrónico correcto .! </em> </div>");                  
        $("#error-correo").show();
        return false;
    }else{

        url =  $("#form-integrante-edicion").attr("action");    
        
        actualiza_data(url , $("#form-integrante-edicion").serialize());                
        llenaelementoHTML( "#response-insert-user" , "<div class='alert-ok' id='alert-ok-usr'><em> Datos actualizados correctamente.!</em></div>");
        complete_alert_ok_modal( "#alert-ok-usr",  "#edit-usuario-perfil");   
        
        return false;
    }   

}
/**/
function update_descripcion_user(){    
    url = now + "index.php/api/user/miembro_descripcion/format/json/";
    data_send =  $("#descripcion-miembro").serialize() + "&" + $.param({"usuario" : dinamic_user });        
    actualiza_data(url , data_send);
    /**/

    llenaelementoHTML( "#response-insert-user" , "<div class='alert-ok' id='alert-ok-nota'><em> Datos actualizados correctamente.!</em></div>");
    
    complete_alert_ok_modal("#alert-ok-nota",  "#edit-nota-user-modal");
    return false;
}